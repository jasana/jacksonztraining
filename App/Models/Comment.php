<?php

namespace App\Models;

class Comment extends DatabaseModel
{
	protected static $columns = ['id','user_id','song_id','comment','timecreated'];
	protected static $tableName = "comments";
	protected static $validationRules = [
					"user_id" 		=> "numeric,exists:App\Models\User",
					"song_id" 		=> "numeric,exists:App\Models\ComingSoon",
					"comment"	 	=> "minlength:10,maxlength:300"	
	];
	public function user()
	{
		return new User($this->user_id);
	}
}