<?php
include_once("conexion.php");
include_once("Usuario.php");
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Verificar si se subió correctamente el archivo
if ($_FILES['image']['error'] !== UPLOAD_ERR_OK) {
    die("Error al subir el archivo.");
}

// Verificar tamaño del archivo (Máx: 2MB)
$maxSize = 2 * 1024 * 1024; // 2MB
if ($_FILES['image']['size'] > $maxSize) {
    die("Error: La imagen es demasiado grande (máx. 2MB).");
}

// Leer la imagen como binario
$imageData = file_get_contents($_FILES['image']['tmp_name']);

// Preparar la consulta para actualizar la imagen en la base de datos
$conn = new ConexionDB();
$stmt = $conn->prepare("UPDATE usuarios SET imagen = ? WHERE id_user = ?");
$sql_insert = "UPDATE usuarios SET imagen = ? WHERE id_user = ?";
$stmt = $conn->getConexion()->prepare($sql_insert);
$stmt->send_long_data(1, $imageData);
$stmt->bind_param(
    "i",
    $_SESSION['user']->id_user
);

// Ejecutar consulta
if ($stmt->execute()) {
    echo "Imagen Insertada correctamente";
    //header("Location: ../index.php");

} else {
    echo "Imagen NO Insertada correctamente";
}

$stmt->close();
$conn->close();
?>