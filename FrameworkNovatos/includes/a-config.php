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
?>