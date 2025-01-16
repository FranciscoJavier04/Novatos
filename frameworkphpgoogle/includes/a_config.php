<?php

	switch ($_SERVER["SCRIPT_NAME"]) {
		case "/work.php":
			$CURRENT_PAGE = "Work"; 
			$PAGE_TITLE = "Work";
			break;
		case "/results.php":
			$CURRENT_PAGE = "Results"; 
			$PAGE_TITLE = "Results";
			break;
		case "/methods.php":
			$CURRENT_PAGE = "Methods"; 
			$PAGE_TITLE = "Methods";
			break;
		case "/about.php":
			$CURRENT_PAGE = "About"; 
			$PAGE_TITLE = "About Us";
			break;
		case "/contact.php":
			$CURRENT_PAGE = "Contact"; 
			$PAGE_TITLE = "Contact Us";
			break;
		default:
			$CURRENT_PAGE = "Index";
			$PAGE_TITLE = "Welcome to my homepage!";
	}

//Include Google Client Library for PHP autoload file
require_once 'vendor/autoload.php';

//Make object of Google API Client for call Google API
$google_client = new Google_Client();

//Set the OAuth 2.0 Client ID
$google_client->setClientId('213764320892-hha7vahf4tdjgu50so0hr6pfv801bk9s.apps.googleusercontent.com');

//Set the OAuth 2.0 Client Secret key
$google_client->setClientSecret('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');

//Set the OAuth 2.0 Redirect URI
$google_client->setRedirectUri('http://'.$_SERVER['SERVER_NAME'].'/index.php');


$google_client->addScope('email');

$google_client->addScope('profile');

//start session on web page
session_start();

$login_button = '';


?>