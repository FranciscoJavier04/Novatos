<?php

use phpseclib3\Math\BinaryField\Integer;

require '../vendor/autoload.php';
include_once("Usuario.php");
include_once("conexion.php");
session_start();

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

function comprobarEmailRepetido($email)
{
    try {
        if ($email == $_SESSION['user']->email) {
            return false;
        }
        $db = new ConexionDB();
        $sql = "SELECT * FROM usuarios WHERE email = ?";
        $stmt = $db->getConexion()->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            return true;
        } else {
            return false;
        }
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
    } elseif (isset($_POST['modificar2'])) {
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
        if (comprobarEmailRepetido($email)) {
            header("Location: ../user.php?error=662");
            exit();
        }

        modificarUsuario($id, $email, $nombre, $apellidos, $pais, $telefono, $fecha_nacimiento, $codigo_postal, $rol);
        header('Location: cargarSesion.php?cc=66');
        exit();
    } elseif (isset($_POST['modificarContraseña'])) {
        // Asegúrate de que la clase ConexionDB esté incluida correctamente y funcionando.

        $contraseña_actual = $_POST['current_password'];
        $nueva_contraseña = $_POST['new_password'];
        $confirmar_nueva_contraseña = $_POST['confirm_new_password'];

        $id = $_SESSION['user']->id_user; // Asegúrate de que el ID del usuario esté en la sesión.

        // Crear instancia de la conexión
        $db = new ConexionDB();
        $sql = "SELECT password FROM usuarios WHERE id_user = ?";

        // Preparar y ejecutar la consulta
        $stmt = $db->getConexion()->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result(); // Obtener el resultado de la consulta

        // Verificar si se obtuvo un resultado
        if ($result->num_rows > 0) {
            $usuario = $result->fetch_assoc(); // Obtener la fila del usuario

            $stmt->close();

            // Verificar la contraseña actual
            if (md5($contraseña_actual) === $usuario['password']) {

                // Verificar si las nuevas contraseñas coinciden
                if ($nueva_contraseña === $confirmar_nueva_contraseña) {
                    $nueva_contraseña_hash = md5($nueva_contraseña);

                    // Actualizar la contraseña en la base de datos
                    $sql_update = "UPDATE usuarios SET password = ? WHERE id_user = ?";
                    $stmt_update = $db->getConexion()->prepare($sql_update);
                    $stmt_update->bind_param("si", $nueva_contraseña_hash, $id);

                    if ($stmt_update->execute()) {
                        echo "<p>Contraseña modificada exitosamente.</p>";
                    } else {
                        echo "<p>Error al modificar la contraseña: " . $stmt_update->error . "</p>";
                    }

                    $stmt_update->close();

                } else {
                    header("Location: ../user.php?error=22");
                    exit();
                }
            } else {
                header("Location: ../user.php?error=21");
                exit();
            }
        } else {
            echo "<p>Usuario no encontrado.</p>";
        }

        $db->cerrarConexion();
        header('Location: cargarSesion.php?cc=77');
        exit();
    }
}

?>