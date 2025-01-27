<?php
switch ($_SERVER["SCRIPT_NAME"]) {
	case "/index.php":
		$CURRENT_PAGE = "Inicio";
		$PAGE_TITLE = "Inicio";
		break;
	case "/carta.php":
		$CURRENT_PAGE = "Cata";
		$PAGE_TITLE = "Carta";
		break;
	case "/laberinto.php":
		$CURRENT_PAGE = "Juego del Laberinto";
		$PAGE_TITLE = "Juego del Laberinto";
		break;
	case "/mapaInteractivo.php":
		$CURRENT_PAGE = "Diseña tu sala";
		$PAGE_TITLE = "Diseña tu sala";
		break;
	case "/avisoLegal.php":
		$CURRENT_PAGE = "Aviso Legal";
		$PAGE_TITLE = "Aviso Legal Óneo";
		break;
	case "/confReserva.php":
		$CURRENT_PAGE = "Confirmar Reserva";
		$PAGE_TITLE = "Confirmar Reserva";
		break;
	case "/datosReserva.php":
		$CURRENT_PAGE = "Datos de la reserva";
		$PAGE_TITLE = "Reservar";
		break;
	case "/reservas.php":
		$CURRENT_PAGE = "Reserva";
		$PAGE_TITLE = "Reserva";
		break;
	case "/login.php":
		$CURRENT_PAGE = "Inicio de Sesión";
		$PAGE_TITLE = "Iniciar Sesión";
		break;
	case "/registro.php":
		$CURRENT_PAGE = "Registro";
		$PAGE_TITLE = "Registrarse";
		break;
	case "/user.php":
		$CURRENT_PAGE = "Usuario";
		$PAGE_TITLE = "Usuario";
		break;
	case "/delivery.php":
		$CURRENT_PAGE = "Delivery";
		$PAGE_TITLE = "Delivery";
		break;
	case "/politicaCookies.php":
		$CURRENT_PAGE = "Politica de Cookies";
		$PAGE_TITLE = "Politica de Cookies";
		break;
	case "/politicaPrivacidad.php":
		$CURRENT_PAGE = "Politica de privacidad";
		$PAGE_TITLE = "Politica de Privacidad";
		break;
	default:
		$CURRENT_PAGE = "ÓNEO";
		$PAGE_TITLE = "ÓNEO";
		break;
}

//Include Google Client Library for PHP autoload file
//require 'vendor/autoload.php';

//Make object of Google API Client for call Google API
$google_client = new Google_Client();

//Set the OAuth 2.0 Client ID
$google_client->setClientId('213764320892-hha7vahf4tdjgu50so0hr6pfv801bk9s.apps.googleusercontent.com');

//Set the OAuth 2.0 Client Secret key
$google_client->setClientSecret('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');

//Set the OAuth 2.0 Redirect URI
$google_client->setRedirectUri('http://' . $_SERVER['SERVER_NAME'] . '/index.php');


$google_client->addScope('email');

$google_client->addScope('profile');

Session_start();
$login_button = '';
