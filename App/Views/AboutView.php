<?php

namespace App\Views;

class AboutView extends TemplateView
{
	public function render(){
		// extract($this->$data);
		$page = "about";
		$page_title = "About page";
		include "templates/master.inc.php";
	}
	protected function content() {
		include "templates/about.inc.php";
	}
}