<?php
require '../vendor/autoload.php';
//include("../includes/a-config.php");
include("conexion.php");

// controlador eliminarValoraciones
function eliminarValoraciones($id_valoracion)
{
    try {
        $db = new ConexionDB();

        $sql = "DELETE FROM valoraciones WHERE id_valoracion = ?";
        $stmt = $db->getConexion()->prepare($sql);
        $stmt->bind_param("i", $id_valoracion);

        if ($stmt->execute()) {
            echo "<p>Valoración eliminada exitosamente.</p>";
        } else {
            echo "<p>Error al eliminar la valoración: " . $stmt->error . "</p>";
        }

        $stmt->close();
        $db->cerrarConexion();
    } catch (Exception $e) {
        echo '<p>Error: ' . $e->getMessage() . '</p>';
    }
}

// archivo eliminar_valoracion.php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['eliminar_id_valoracion'])) {
    $id_valoracion = intval($_POST['eliminar_id_valoracion']);
    eliminarValoraciones($id_valoracion);
    // Redirigir a la página de gestión de valoraciones para mostrar la lista actualizada
    header("Location: ../backend.php");
    exit();
}
?>