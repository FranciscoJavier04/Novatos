<?php
require '../vendor/autoload.php';
include("../includes/a-config.php");
include("conexion.php");

function insertarPlato($nombre, $categoria, $precio, $imagen)
{
    try {
        $db = new ConexionDB();
        $sql = "INSERT INTO platos (nombre_plato, categoria, precio, imagen) VALUES (?, ?, ?, ?)";
        $stmt = $db->getConexion()->prepare($sql);
        $stmt->bind_param("ssds", $nombre, $categoria, $precio, $imagen);

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

function modificarPlato($id, $nombre, $categoria, $precio, $imagen)
{
    try {
        $db = new ConexionDB();
        $sql = "UPDATE platos SET nombre_plato = ?, categoria = ?, precio = ?, imagen = ? WHERE id_plato = ?";
        $stmt = $db->getConexion()->prepare($sql);
        $stmt->bind_param("ssdsi", $nombre, $categoria, $precio, $imagen, $id);

        if ($stmt->execute()) {
            echo "<p>Plato modificado exitosamente.</p>";
        } else {
            echo "<p>Error al modificar el plato: " . $stmt->error . "</p>";
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
        $categoria = $_POST['categoria'] ?? 'Entrante';
        $precio = $_POST['precio'] ?? 0.00;

        $imagen = "";
        if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] == 0) {
            $imagen = "uploads/" . basename($_FILES['imagen']['name']);
            move_uploaded_file($_FILES['imagen']['tmp_name'], "../" . $imagen);
        }

        insertarPlato($nombre, $categoria, $precio, $imagen);
        header('Location: ../backend.php');
        exit();
    } elseif (isset($_POST['modificar'])) {
        $id = intval($_POST['modificar_id']);
        $nombre = $_POST['nombre_plato'] ?? 'Plato Modificado';
        $categoria = $_POST['categoria'] ?? 'Entrante';
        $precio = $_POST['precio'] ?? 0.00;

        $imagen = "";
        if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] == 0) {
            $imagen = "uploads/" . basename($_FILES['imagen']['name']);
            move_uploaded_file($_FILES['imagen']['tmp_name'], "../" . $imagen);
        }

        modificarPlato($id, $nombre, $categoria, $precio, $imagen);
        header('Location: ../backend.php');
        exit();
    }
}
