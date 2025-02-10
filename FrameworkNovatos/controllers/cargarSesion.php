<?php
include_once("conexion.php");
include_once("Usuario.php");
session_start();


$id = $_SESSION['user']->id_user;
echo $id;
$sql = "SELECT * FROM usuarios WHERE id_user = $id";

$conn = new ConexionDB();
try {
    if ($result = $conn->ejecutarConsulta($sql)) {
        $conn->cerrarConexion();
        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();

            // Iniciar sesión

            $usuario = new Usuario(
                $user['email'],
                $user['password'],
                $user['nombre'],
                $user['apellidos'],
                $user['fecha_nac'],
                $user['pais'],
                $user['cod_postal'],
                $user['telefono'],
                $user['rol'],
                $user['imagen']
            );

            $usuario->id_user = $user['id_user'];
            $_SESSION['user'] = $usuario;
        }
    }
    header("Location: ../user.php");
    exit();
} catch (Exception $e) {
    echo $e->getMessage();
}


?>