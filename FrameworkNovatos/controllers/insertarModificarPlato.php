<?php
require '../vendor/autoload.php';
include("../includes/a-config.php");
include("conexion.php");

function insertarPlato($nombre, $descripcion, $categoria, $precio, $imagen)
{
    try {
        $db = new ConexionDB();

        $sql = "INSERT INTO platos (nombre_plato, descripcion, categoria, precio, imagen) VALUES (?, ?, ?, ?, ?)";
        $stmt = $db->getConexion()->prepare($sql);
        $stmt->bind_param("sssds", $nombre, $descripcion, $categoria, $precio, $imagen);

        if ($stmt->execute()) {
            echo "<p>Plato insertado exitosamente.</p>";
        } else {
            echo "<p>Error al insertar el plato: " . $stmt->error . "</p>";
        }

        $stmt->close();
        $db->cerrarConexion();
    } catch (Exception $e) {
        echo '<p>Error: ' . $e->getMessage() . '</p>';
    }
}

function modificarPlato($id, $nombre, $descripcion, $categoria, $precio, $imagen)
{
    try {
        $db = new ConexionDB();

        $sql = "UPDATE platos SET nombre_plato = ?, descripcion = ?, categoria = ?, precio = ?, imagen = ? WHERE id_plato = ?";
        $stmt = $db->getConexion()->prepare($sql);
        $stmt->bind_param("sssdsi", $nombre, $descripcion, $categoria, $precio, $imagen, $id);

        if ($stmt->execute()) {
            echo "<p>Plato modificado correctamente.</p>";
        } else {
            echo "Error en la actualización: " . $stmt->error;
        }

        $stmt->close();
        $db->cerrarConexion();
    } catch (Exception $e) {
        echo '<p>Error: ' . $e->getMessage() . '</p>';
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['insertar'])) {
        $nombre = $_POST['nombre_plato'] ?? 'Nuevo Plato';
        $descripcion = $_POST['descripcion'] ?? 'Descripcion del Plato';
        $categoria = $_POST['categoria'] ?? 'Entrante';
        $precio = $_POST['precio'] ?? 0.00;

        $imagen = "";
        if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] == 0) {
            $imagen = "assets/img/carta/" . basename($_FILES['imagen']['name']);
            move_uploaded_file($_FILES['imagen']['tmp_name'], "../" . $imagen);
        }

        insertarPlato($nombre, $descripcion, $categoria, $precio, $imagen);
        header('Location: ../backend.php');
        exit();
    } elseif (isset($_POST['modificarP'])) {
        $id = intval($_POST['modificar_id']);
        $nombre = $_POST['nombre_plato'] ?? 'Plato Modificado';
        $descripcion = $_POST['descripcion'] ?? 'Descripcion del Plato';
        $categoria = $_POST['categoria'] ?? 'Entrante';
        $precio = $_POST['precio'] ?? 0.00;

        $imagen = "";
        if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] == 0) {
            $imagen = "assets/img/carta/" . basename($_FILES['imagen']['name']);
            move_uploaded_file($_FILES['imagen']['tmp_name'], "../" . $imagen);
        } else {
            // Si no se sube una nueva imagen, mantener la imagen existente
            $imagen = $_POST['imagen_actual'];
        }

        modificarPlato($id, $nombre, $descripcion, $categoria, $precio, $imagen);
        header('Location: ../backend.php');
        exit();
    }
}