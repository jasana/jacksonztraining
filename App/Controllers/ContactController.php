<?php 

namespace App\Controllers;

use App\Views\ContactView;

class ContactController extends Controller
{
	public function show() 
	{
		$contactform = $this->validateContactForm();

		$view = new ContactView(compact('contactform'));
		$view->render();	
	}
	public function validateContactForm()
	{
		if (isset($_SESSION['contactform'])) {
			$contactform = $_SESSION['contactform'];
		}else {
			$contactform = [
				'name' => "",
				'email'=> "",
				'subject'=> "",
				'message' => "",
				'errors'=> [
					'name' => "",
					'email'=> "",
					'subject'=> "",
					'message' => ""
				]
			];
		}
		return $contactform;
	}
}