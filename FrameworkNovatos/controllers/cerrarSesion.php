<?php
session_start();
// Destruye todas las variables de sesión
$_SESSION = [];

// Finalmente destruye la sesión
session_destroy();

// Redirige al usuario a la página de inicio de sesión u otra página deseada
header("Location: ../login.php");
exit;
?>