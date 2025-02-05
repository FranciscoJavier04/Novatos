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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_user = intval($_POST['id_user']);
    $id_plato = intval($_POST['id_plato']);
    $comentario = $_POST['comentario'] ?? '';
    $valoracion = intval($_POST['valoracion']);

    // Validación de datos
    if ($id_user > 0 && $id_plato > 0 && !empty($comentario) && $valoracion >= 1 && $valoracion <= 10) {
        if (isset($_POST['insertar'])) {
            insertarValoracion($id_user, $id_plato, $comentario, $valoracion);
        }
    } else {
        echo "<p>Error: Datos inválidos.</p>";
    }

    header('Location: ../delivery.php');
    exit();
}
?>