<?php

namespace App\Views;

class FormSuccessView extends TemplateView
{
	public function render()
	{
		$page = "contactformsuccess";
		$page_title = "Thanks for the message!";
		include "templates/master.inc.php";
	}
	protected function content() 
	{
		include "templates/formsuccess.inc.php";
	}
	


}