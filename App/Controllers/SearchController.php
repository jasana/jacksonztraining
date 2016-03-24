<?php

namespace App\Controllers;
use App\Models\ComingSoon;
use App\Views\SearchResultsView;

class SearchController extends Controller
{
	function search()
	{
		if(! isset($_GET['q'])){
			$q = "";
		} else {
			$q = $_GET['q'];
		}
		$songs = ComingSoon::search($q);

		$view = new SearchResultsView(compact('songs', 'q'));
		$view->render();
	}

}