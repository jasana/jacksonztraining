<?php

namespace App\Views;

class ComingSoonCreateView extends TemplateView
{
	public function render()
	{
		extract($this->data);
		
		$page = "comingsoon.create";
		$page_title = "Add New Song";
		include "templates/master.inc.php";
	}
	protected function content() 
	{
		extract($this->data);
		include "templates/comingsooncreate.inc.php";
	}

}