<?php

namespace App\Controllers;
use App\Models\Exceptions\ModelNotFoundException;

$page = isset($_GET['page']) ? $_GET['page'] : 'home';

try {

	switch ($page) {
		case 'home':
			$controller = new HomeController();
			$controller->show();
			break;

		case 'about':
			$controller = new AboutController();
			$controller->show();
			break;
			
		case 'contact':
			$controller = new ContactController();
			$controller->show();
			break;

		case "contactform":
			$controller = new ContactFormController();
			$controller->show();

			break;




		case 'register':
			$controller = new AuthenticationController();
			$controller->register();

			break;

		case 'auth.store':
			$controller = new AuthenticationController();
			$controller->store();

			break;

		case 'login':
			$controller = new AuthenticationController();
			$controller->login();

			break;

		case 'logout':
			$controller = new AuthenticationController();
			$controller->logout();

			break;

		case 'auth.attempt':
			$controller = new AuthenticationController();
			$controller->attempt();

			break;

		case 'comingsoon':
			$controller = new ComingSoonController();
			$controller->index();
			break;

		case 'comingsoon.create':
			$controller = new ComingSoonController();
			$controller->create();
			break;

		case 'comment.create':
			$controller = new CommentController();
			$controller->create();

			break;

		case 'comingsoon.store':
			$controller = new ComingSoonController();
			$controller->store();
			break;

		case 'comingsoon.edit':
			$controller = new ComingSoonController();
			$controller->edit();
			break;

		case 'comingsoon.update':
			$controller = new ComingSoonController();
			$controller->update();
			break;

		case 'comingsoon.destroy':
			$controller = new ComingSoonController();
			$controller->destroy();
			break;

		case 'comingsoonsingle':
			$controller = new ComingSoonController();
			$controller->show();
			break;

		case "search":
			$controller = new SearchController();
			$controller->search();

			break;
		
		default:
			throw new ModelNotFoundException();
			break;
			
	}

} catch(ModelNotFoundException $e)
{
	$controller = new ErrorController();
	$controller->error404();
}
 catch(InsufficientPrivilegesException $e)
{
	$controller = new ErrorController();
	$controller->error401();
}