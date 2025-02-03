<?php
require '../vendor/autoload.php';
include("../includes/a-config.php");
include("conexion.php");

function insertarUsuario($email, $nombre, $apellidos, $pais, $telefono, $rol, $fecha_nacimiento, $password, $codigo_postal)
{
    try {
        $db = new ConexionDB();

        $sql = "INSERT INTO usuarios (email, nombre, apellidos, pais, telefono, rol, fecha_nac, password, cod_postal) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $db->getConexion()->prepare($sql);

        // Encriptar la contraseña con MD5 antes de insertarla
        $hashed_password = md5($password);

        $stmt->bind_param("sssssssss", $email, $nombre, $apellidos, $pais, $telefono, $rol, $fecha_nacimiento, $hashed_password, $codigo_postal);

        if ($stmt->execute()) {
            echo "<p>Usuario insertado exitosamente.</p>";
        } else {
            echo "<p>Error al insertar el usuario: " . $stmt->error . "</p>";
        }

        $stmt->close();
        $db->cerrarConexion();
    } catch (Exception $e) {
        echo '<p>Error: ' . $e->getMessage() . '</p>';
    }
}

function modificarUsuario($id, $email, $nombre, $apellidos, $pais, $telefono, $fechaNacimiento, $codigoPostal, $rol)
{
    try {
        $db = new ConexionDB();
        $sql = "UPDATE usuarios SET email = ?, nombre = ?, apellidos = ?, pais = ?, telefono = ?, fecha_nac = ?, cod_postal = ?, rol = ? WHERE id_user = ?";

        $stmt = $db->getConexion()->prepare($sql);
        $stmt->bind_param("ssssssssi", $email, $nombre, $apellidos, $pais, $telefono, $fechaNacimiento, $codigoPostal, $rol, $id);

        if ($stmt->execute()) {
            echo "<p>Usuario modificado exitosamente.</p>";
        } else {
            echo "<p>Error al modificar el usuario: " . $stmt->error . "</p>";
        }

        $stmt->close();
        $db->cerrarConexion();
    } catch (Exception $e) {
        echo '<p>Error: ' . $e->getMessage() . '</p>';
    }
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['insertar'])) {
        // Valores para insertar
        $email = $_POST['email'] ?? 'nuevo_email@ejemplo.com';
        $nombre = $_POST['nombre'] ?? 'Nuevo Nombre';
        $apellidos = $_POST['apellidos'] ?? 'Nuevos Apellidos';
        $pais = $_POST['pais'] ?? 'País';
        $telefono = $_POST['telefono'] ?? '123456789';
        $rol = $_POST['rol'] ?? 'Usuario';
        $fecha_nacimiento = $_POST['fecha_nac'] ?? '2000-01-01';
        $password = $_POST['password'] ?? 'contraseña123';
        $codigo_postal = $_POST['cod_postal'] ?? '00000';

        insertarUsuario($email, $nombre, $apellidos, $pais, $telefono, $rol, $fecha_nacimiento, $password, $codigo_postal);

        // Redirigir al backend tras insertar
        header('Location: ../backend.php');
        exit();
    } elseif (isset($_POST['modificar'])) {
        // Valores para modificar
        $id = intval($_POST['modificar_id']);
        $email = $_POST['email'] ?? 'modificado_email@ejemplo.com';
        $nombre = $_POST['nombre'] ?? 'Nombre Modificado';
        $apellidos = $_POST['apellidos'] ?? 'Apellidos Modificados';
        $pais = $_POST['pais'] ?? 'País Modificado';
        $telefono = $_POST['telefono'] ?? '987654321';
        $rol = $_POST['rol'] ?? 'Admin';
        $fecha_nacimiento = $_POST['fecha_nac'] ?? '1990-01-01';
        $codigo_postal = $_POST['cod_postal'] ?? '11111';

        modificarUsuario($id, $email, $nombre, $apellidos, $pais, $telefono, $fecha_nacimiento, $codigo_postal, $rol);

        // Redirigir al backend tras modificar
        header('Location: ../backend.php');
        exit();
    }
}
?>