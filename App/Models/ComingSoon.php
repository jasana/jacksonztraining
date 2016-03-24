<?php

namespace App\Models;
use PDO;

class ComingSoon extends DatabaseModel
{
	protected static $tableName = "comingsoon";
	protected static $columns = ['id','artist','title','date','description'];
	// protected static $fakeColumns = ['date'];
	protected static$fakeColumns = ['tags'];
	protected static $validationRules = [
					"artist" 		=> "minlength:1",
					"title" 		=> "minlength:1",
					"description" 	=> "minlength:10,maxlength:255"

	];
	public function comments()
	{
		$result = Comment::allBy('song_id', $this->id);
		return $result;
	}
	public function getTags()
	{
		$models = [];
		$db = static::getDatabaseConnection();

		$query = " SELECT id, tag FROM tags ";
		$query .= " JOIN song_tag ON id = tag_id";
		$query .= " WHERE song_id =:id";

		$statement = $db->prepare($query);
		$statement->bindValue(":id", $this->id);
		$statement->execute();

		while($record = $statement->fetch(PDO::FETCH_ASSOC)){
			$model = new Tags();
			$model->data = $record;
			array_push($models, $model);
		}
		return $models;

	}
	public function loadTags()
	{
		$tags = $this->getTags();
		$taglist = [];
		foreach ($tags as $tag) {
			array_push($taglist, $tag->tag);
		}
		// var_dump($taglist);
		$this->tags = implode(",", $taglist);
	}
	public function saveTags()
	{
		// take the string from tags property
		// explode it into an array
		$tags = explode(",", $this->tags);
		foreach ($tags as $tag) {
			$tag = trim($tag);
		}
		$db = static::getDatabaseConnection();
		$db->beginTransaction();

		try {
			$this->addNewTags($db, $tags);
			$tagIds = $this->getTagIds($db, $tags);
			$this->deleteAllTagsFromSong($db);
			$this->insertTagsForSong($db, $tagIds);

			$db->commit();

		} catch (Exception $e) {

			$db->rollback();
			throw $e;
		}
	}
	private function addNewTags($db, $tags)
	{
		// insert each tag into the tags table (ignore all duplicates)
		// ignore doesn't allow duplicates for the database
		$query = "INSERT IGNORE INTO tags (tag) VALUE ";

		$tagvalues = [];
		for ($i=0; $i < count($tags); $i++) { 
			// interpolation , changing the $tags to placeholder
			array_push($tagvalues, "(:tag{$i})");
		}
		$query .= implode(",", $tagvalues);
		$statement = $db->prepare($query);
		// makes :tag0 = woman , :tag1 = fantasy ... etc. inserts new tag into database
		for ($i=0; $i < count($tags); $i++) {
			$statement->bindValue(":tag{$i}", $tags[$i]);
		}
		$statement->execute();
	}
	private function getTagIds($db, $tags)
	{
		// getting the ids for each tags
		$query = "SELECT id FROM tags WHERE ";
		$tagvalues = [];
		for ($i=0; $i < count($tags) ; $i++) { 
			array_push($tagvalues, "tag=:tag{$i}");
		}
		$query .= implode(" OR ", $tagvalues);
		$statement = $db->prepare($query);
		for ($i=0; $i < count($tags) ; $i++) { 
			$statement->bindValue(":tag{$i}", $tags[$i]);
		}
		$statement->execute();

		$record = $statement->fetchAll(PDO::FETCH_COLUMN);
		return $record;
	}
	private function insertTagsForSong($db, $tagIds)
	{
		$query = "INSERT IGNORE INTO song_tag (song_id, tag_id) VALUES ";

		$tagvalues = [];
		for ($i=0; $i < count($tagIds); $i++) { 
			array_push($tagvalues, "(:song_id_{$i}, :tag_id_{$i})");
		}
		$query .= implode(",", $tagvalues);
		$statement = $db->prepare($query);
		for ($i=0; $i < count($tagIds); $i++) { 
			$statement->bindValue(":song_id_{$i}", $this->id);
			$statement->bindValue(":tag_id_{$i}", $tagIds[$i]);
		}
		$statement->execute();
	}
	private function deleteAllTagsFromSong($db)
	{
		$query = "DELETE FROM song_tag WHERE song_id= :song_id";
		$statement = $db->prepare($query);
		$statement->bindValue(":song_id", $this->id);
		$statement->execute();
	}
	public static function search($searchQuery)
	{
		$models = [];

		$db = static::getDatabaseConnection();
		
		$query = "SET @searchterm = :searchQuery ";
		$statement = $db->prepare($query);
		$statement->bindValue(":searchQuery", $searchQuery);
		$result = $statement->execute();

		$query = "
					SELECT comingsoon.id, title, artist, description, taglist, 
                        MATCH(title) AGAINST(@searchterm) * 2 AS score_title,
                        MATCH(artist) AGAINST(@searchterm) AS score_artist, 
                        MATCH(description) AGAINST(@searchterm) AS score_description,
                        MATCH(taglist) AGAINST(@searchterm IN BOOLEAN MODE) * 1.5 AS score_tag
                    FROM comingsoon
                    LEFT JOIN (
                        SELECT song_id, GROUP_CONCAT(tag SEPARATOR ' ') AS taglist FROM tags
                        RIGHT JOIN song_tag ON song_tag.tag_id = id
                        GROUP BY song_id) AS tags ON comingsoon.id = song_id
                    WHERE 
                        MATCH(title) AGAINST(@searchterm) OR
                        MATCH(artist) AGAINST(@searchterm) OR
                        MATCH(description) AGAINST(@searchterm) OR
                        MATCH(taglist) AGAINST(@searchterm IN BOOLEAN MODE)
                        ORDER BY (score_title + score_artist + score_description + score_tag) DESC";

        $querytag = "
                    SELECT comingsoon.id, taglist, MATCH(taglist) AGAINST(@searchterm IN BOOLEAN MODE) * 1.5 AS score_tag
                    FROM comingsoon LEFT JOIN ( SELECT song_id, GROUP_CONCAT(tag SEPARATOR ' ') AS taglist FROM tags
                        RIGHT JOIN song_tag ON song_tag.tag_id = id
                        GROUP BY song_id) AS tags ON comingsoon.id = song_id WHERE 
                            MATCH(taglist) AGAINST(@searchterm IN BOOLEAN MODE) ORDER BY (score_tag) DESC";  
        $querytagcheck = "
        					SELECT taglist, MATCH(taglist) AGAINST(@searchterm IN BOOLEAN MODE) * 1.5 AS score_tag FROM comingsoon
        					LEFT JOIN (
        					SELECT song_id, GROUP_CONCAT(tag SEPARATOR ' ') AS taglist FROM tags
        				    RIGHT JOIN song_tag ON song_tag.tag_id = id
                        GROUP BY song_id) AS tags
                         WHERE 
                            MATCH(taglist) AGAINST(@searchterm IN BOOLEAN MODE) ORDER BY (score_tag) DESC";              

		$statement = $db->prepare($query);
		// var_dump($statement);
		// die();
		$record = $statement->execute();
		// var_dump($record);
		while ($record = $statement->fetch(PDO::FETCH_ASSOC)) {
			$model = new ComingSoon();
			$model->data = $record;
			array_push($models, $model);
		}
		// var_dump($models);
		
		return $models;
	}

}