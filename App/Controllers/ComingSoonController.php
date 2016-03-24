<?php 

namespace App\Controllers;

use App\Models\Comment;
use App\Views\ComingSoonView;
use App\Models\ComingSoon;
use App\Views\ComingSoonSingleView;
use App\Views\ComingSoonCreateView;

class ComingSoonController extends Controller
{
	public function index() 
	{
		$pageNumber = isset($_GET['p']) ? $_GET['p'] : 1;
		$pageSize = 5;
		$recordCount = ComingSoon::count();
		$songs = ComingSoon::all("title", true, $pageNumber, $pageSize);
		$view = new ComingSoonView(compact('songs', 'pageNumber', 'pageSize', 'recordCount'));
		$view->render();	
	}
	public function show()
	{
		$songs = new ComingSoon((int)$_GET['id']);
		$newcomment = $this->getCommentFormData();
		$comments = $songs->comments();
		$tags = $songs->getTags();

		$view = new ComingSoonSingleView(compact('songs', 'newcomment', 'comments', 'tags'));
		$view->render();
	}
	public function create()
	{
		static::$auth->mustBeAdmin();
		$songs = $this->getFormData();
		$view = new ComingSoonCreateView(compact('songs'));
		$view->render();
	}
	public function store()
	{
		static::$auth->mustBeAdmin();
		$songs = new ComingSoon($_POST);

		if(is_array($songs->tags)){
			$songs->tags = implode(",", $songs->tags);
		}
		
		if(! $songs->isValid()){
			$_SESSION['comingsoon.create'] = $songs;
			header("Location:.\?page=comingsoon.create");
			exit();
		}
		$songs->save();
		$songs->saveTags();
		$_SESSION['comingsoon.create'] = null;
		header("Location: .\?page=comingsoonsingle&id=" . $songs->id);
	}

	public function edit() 
	{
		static::$auth->mustBeAdmin();
		$songs = $this->getFormData($_GET['id']);
		$songs->loadTags();

		$view = new ComingSoonCreateView(compact('songs'));
		$view->render();
	}

	public function update()
	{
		static::$auth->mustBeAdmin();

		$songs = new ComingSoon($_POST['id']);
		$songs->processArray($_POST);

		if(is_array($songs->tags)){
			$songs->tags = implode(",", $songs->tags);

		}
		
		if(! $songs->isValid()){
			$_SESSION['comingsoon.create'] = $songs;
			header("Location: .\?page=comingsoon.edit&id=" .$_POST['id']);
			exit();
		}
		$songs->save();
		$songs->saveTags();
		header("Location: .\?page=comingsoonsingle&id=" . $songs->id);

	}

	public function destroy() 
	{
		static::$auth->mustBeAdmin();
		// var_dump($_POST);
		ComingSoon::destroy($_POST['id']);
		header("Location: .\?page=comingsoon");
	}

	public function getFormData($id = null)
	{
		
		if(isset($_SESSION['comingsoon.create'])){
			$songs = $_SESSION['comingsoon.create'];
			unset($_SESSION['comingsoon.create']);
		} else {
			$songs = new ComingSoon((int)$id);
		}
		return $songs;
	}
	public function getCommentFormData($id = null)
	{
		if(isset($_SESSION['comment.form'])){
			$newcomment = $_SESSION['comment.form'];
			unset($_SESSION['comment.form']);
		} else {
			$newcomment = new Comment((int)$id);
		}
		return $newcomment;
	}
}
