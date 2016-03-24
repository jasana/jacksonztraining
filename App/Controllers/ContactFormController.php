<?php

namespace App\Controllers;

use App\Views\FormSuccessView;

class ContactFormController extends Controller
{
	private $contactform = [];

	public function __construct()
	{
		$this->contactform = [
						'errors' => []
						];
	}
	public function resetSessionData()
	{

		// $_SESSION['formerror'] = NULL;
		$_SESSION['contactform'] = NULL;
	}
	public function getFormData() 
	{

		$expectedVariables = ['name', 'email', 'subject', 'message'];

		foreach ($expectedVariables as $variable) {

			// assume no errors
			$this->contactform['errors'][$variable]="";

			if(isset($_POST[$variable])){
				$this->contactform[$variable] = $_POST[$variable];
			}else {
				$this->contactform[$variable] = "";
			}
		}
		
	}
	public function isFormValid()
	{
		// validating form
		$valid = true;

		if(strlen($this->contactform['name']) == 0) {			
			$this->contactform['errors']['name']= "Enter your name";
			$valid = false;

		}

		if(! filter_var($this->contactform['email'], FILTER_VALIDATE_EMAIL)){
			$this->contactform['errors']['email']="Enter a vaild email address";
			$valid = false;

		}
		if(strlen($this->contactform['subject']) == 0) {
			$this->contactform['errors']['subject']= "Enter a subject";
			$valid = false;
		}
		if(strlen($this->contactform['message']) == 0) {
			$this->contactform['errors']['message']= "Enter a message";
			$valid = false;
		}

		return $valid;
	}
	public function show()
	{
		$this->resetSessionData();

		//capture suggester data
		$this->getFormData();

		// validate form data
		if (! $this->isFormValid() ){
			$_SESSION['contactform'] = $this->contactform;
			header("Location:.\?page=contact#contactform");
			return;
		}

		// once form is validated, get to the thanks page
		$view = new FormSuccessView;
		$view->render();
	}
}










