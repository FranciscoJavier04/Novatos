<?php
require '../vendor/autoload.php';
include("../includes/a-config.php");
include("conexion.php");

function insertarValoracion($id_user, $id_plato, $comentario, $valoracion)
{
    try {
        $db = new ConexionDB();
        $sql = "INSERT INTO valoraciones (id_user, id_plato, comentario, valoracion) VALUES (?, ?, ?, ?)";
        $stmt = $db->getConexion()->prepare($sql);
        $stmt->bind_param("iisi", $id_user, $id_plato, $comentario, $valoracion);

        if ($stmt->execute()) {
            echo "<p>Valoración insertada exitosamente.</p>";
        } else {
            echo "<p>Error al insertar la valoración: " . $stmt->error . "</p>";
        }

        $stmt->close();
        $db->cerrarConexion();
    } catch (Exception $e) {
        echo '<p>Error: ' . $e->getMessage() . '</p>';
    }
}

function modificarValoracion($id_valoracion, $id_user, $id_plato, $comentario, $valoracion)
{
    try {
        $db = new ConexionDB();
        $sql = "UPDATE valoraciones SET id_user = ?, id_plato = ?, comentario = ?, valoracion = ? WHERE id_valoracion = ?";
        $stmt = $db->getConexion()->prepare($sql);
        $stmt->bind_param("iisii", $id_user, $id_plato, $comentario, $valoracion, $id_valoracion);

        if ($stmt->execute()) {
            echo "<p>Valoración modificada exitosamente.</p>";
        } else {
            echo "<p>Error al modificar la valoración: " . $stmt->error . "</p>";
        }

        $stmt->close();
        $db->cerrarConexion();
    } catch (Exception $e) {
        echo '<p>Error: ' . $e->getMessage() . '</p>';
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_user = intval($_POST['id_user']);
    $id_plato = intval($_POST['id_plato']);
    $comentario = $_POST['comentario'] ?? '';
    $valoracion = intval($_POST['valoracion']);

    if (isset($_POST['insertar'])) {
        insertarValoracion($id_user, $id_plato, $comentario, $valoracion);
    } elseif (isset($_POST['modificar'])) {
        $id_valoracion = intval($_POST['modificar_id_valoracion']);
        modificarValoracion($id_valoracion, $id_user, $id_plato, $comentario, $valoracion);
    }

    header('Location: ../backend.php');
    exit();
}
