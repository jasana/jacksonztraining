<?php

namespace App\Views;

class HomeView extends TemplateView
{
	public function render(){
		// extract($this->$data);
		$page = "";
		$page_title = "Home page";
		include "templates/master.inc.php";
	}
	protected function content() {
		include "templates/index.inc.php";
	}
}