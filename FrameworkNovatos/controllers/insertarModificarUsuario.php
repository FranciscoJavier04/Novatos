<?php
require '../vendor/autoload.php';
include("../includes/a-config.php");
include("conexion.php");

function insertarUsuario($email, $nombre, $apellidos, $pais, $telefono, $rol)
{
    try {
        $db = new ConexionDB();

        $sql = "INSERT INTO usuarios (email, nombre, apellidos, pais, telefono, rol) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $db->getConexion()->prepare($sql);
        $stmt->bind_param("ssssss", $email, $nombre, $apellidos, $pais, $telefono, $rol);

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

function modificarUsuario($id, $email, $nombre, $apellidos, $pais, $telefono, $rol)
{
    try {
        $db = new ConexionDB();

        $sql = "UPDATE usuarios SET email = ?, nombre = ?, apellidos = ?, pais = ?, telefono = ?, rol = ? WHERE id_user = ?";
        $stmt = $db->getConexion()->prepare($sql);
        $stmt->bind_param("ssssssi", $email, $nombre, $apellidos, $pais, $telefono, $rol, $id);

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

        insertarUsuario($email, $nombre, $apellidos, $pais, $telefono, $rol);

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

        modificarUsuario($id, $email, $nombre, $apellidos, $pais, $telefono, $rol);

        // Redirigir al backend tras modificar
        header('Location: ../backend.php');
        exit();
    }
}
?>