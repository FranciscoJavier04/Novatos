<?php

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../controllers/conexion.php';


if (isset($_GET["code"])) {
  session_start();

  $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);


  if (!isset($token['error'])) {

    $google_client->setAccessToken($token['access_token']);


    $_SESSION['access_token'] = $token['access_token'];


    $google_service = new Google_Service_Oauth2($google_client);



    $data = $google_service->userinfo->get();

    if (!empty($data['given_name'])) {
      $_SESSION['user_first_name'] = $data['given_name'];
    }

    if (!empty($data['family_name'])) {
      $_SESSION['user_last_name'] = $data['family_name'];
    }

    if (!empty($data['email'])) {
      $_SESSION['user_email_address'] = $data['email'];
    }
    $email = $data['email'];


    $conn = new ConexionDB();
    $sql = "SELECT id_user FROM usuarios WHERE email = '$email'";

    if (!$resultado = $conn->ejecutarConsulta($sql)) {

      echo "Lo sentimos, este sitio web está experimentando problemas.";


      echo "Error: La ejecución de la consulta falló debido a: \n";
      echo "Query: " . $sql . "\n";
      echo "Errno: " . $conn->errno . "\n";
      echo "Error: " . $conn->error . "\n";
      $conn->close();
      exit();
    } else {

      if ($resultado->num_rows > 0) {
        $usuario = $resultado->fetch_assoc();
        $_SESSION['id'] = $usuario['id_user'];
        header("Location: ../controllers/cargarSesion.php");
      } else {

        $resultado->free();
        header("Location: registro.php");
        exit();
      }
    }
  }
}

// If the user is not authenticated, show the login button to redirect them to Google
if (!isset($_SESSION['access_token'])) {
  // Create a URL to obtain user authorization
  $login_button = $google_client->createAuthUrl();
}
