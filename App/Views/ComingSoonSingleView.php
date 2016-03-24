<?php

namespace App\Views;

class ComingSoonSingleView extends TemplateView
{
	public function render()
	{
		extract($this->data);
		
		$page = "comingsoonsingle";
		$page_title = $songs->title;
		include "templates/master.inc.php";
	}
	protected function content() 
	{
		extract($this->data);
		include "templates/comingsoonsingle.inc.php";
	}
}