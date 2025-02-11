<?php
// Include necessary files for Google OAuth and database connection
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../controllers/conexion.php';


// When the index.php is called from Google after authentication,
// the "code" parameter is passed via a GET request.
if (isset($_GET["code"])) {
  session_start();
  // Obtain the token object
  $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);

  // If there was no error in authentication, the associative array $token
  // will not contain the "error" key, meaning success.
  if (!isset($token['error'])) {
    // Set the access token for subsequent requests
    $google_client->setAccessToken($token['access_token']);

    // Store the access token in the session for future use
    $_SESSION['access_token'] = $token['access_token'];

    // Create an object of Google_Service_Oauth2 class
    $google_service = new Google_Service_Oauth2($google_client);


    // Retrieve user profile data from Google
    $data = $google_service->userinfo->get();

    // Store user profile information into session variables
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

    // Check the database for an existing user by email
    $conn = new ConexionDB();
    $sql = "SELECT id_user FROM usuarios WHERE email = '$email'";

    if (!$resultado = $conn->query($sql)) {
      // If the query fails, display an error message
      echo "Lo sentimos, este sitio web está experimentando problemas.";

      // Display error details (not recommended to show publicly)
      echo "Error: La ejecución de la consulta falló debido a: \n";
      echo "Query: " . $sql . "\n";
      echo "Errno: " . $conn->errno . "\n";
      echo "Error: " . $conn->error . "\n";
      mysqli_close($conn);
      exit();
    } else {
      // If a user is found, store the user ID in the session
      if ($resultado->num_rows > 0) {
        $usuario = $resultado->fetch_assoc();
        $_SESSION['user']->id_user = $usuario['id_user'];
      } else {
        // If no user is found, free the result and proceed to registration
        $resultado->free();
        header("Location: registro.php?email=" . $email .
          "&first_name=" . $first_name .
          "&last_name=" . $last_name);
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
