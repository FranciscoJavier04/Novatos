<?php
// cerrarSesion.php
session_start(); // Inicia la sesión si no está iniciada

// Destruye todas las variables de sesión
$_SESSION = [];

// Finalmente destruye la sesión

session_destroy();

// Redirige al usuario a la página de inicio de sesión u otra página deseada
header("Location: ../index.php");
exit;
?>