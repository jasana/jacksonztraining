<?php

namespace App\Views;

class ContactView extends TemplateView
{
	public function render(){
		extract($this->data);
		
		$page = "contact";
		$page_title = "Contact page";
		include "templates/master.inc.php";
	}
	protected function content() {
		extract($this->data);
		include "templates/contact.inc.php";
	}
}