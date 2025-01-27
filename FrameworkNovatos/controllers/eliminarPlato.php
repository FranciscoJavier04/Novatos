<?php
require '../vendor/autoload.php';
include("../includes/a-config.php");
include("conexion.php");

// controlador eliminarPlatos
function eliminarPlatos($id_plato)
{
    try {
        $db = new ConexionDB();

        $sql = "DELETE FROM platos WHERE id_plato = ?";
        $stmt = $db->getConexion()->prepare($sql);
        $stmt->bind_param("i", $id_plato);

        if ($stmt->execute()) {
            echo "<p>Plato eliminado exitosamente.</p>";
        } else {
            echo "<p>Error al eliminar el plato: " . $stmt->error . "</p>";
        }

        $stmt->close();
        $db->cerrarConexion();
    } catch (Exception $e) {
        echo '<p>Error: ' . $e->getMessage() . '</p>';
    }
}

// archivo eliminar_plato.php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['eliminar_id_plato'])) {
    $id_plato = intval($_POST['eliminar_id_plato']);
    eliminarPlatos($id_plato);
    // Redirigir a la página de gestión de platos para mostrar la lista actualizada
    header("Location: ../backend.php");
    exit();
}
?>