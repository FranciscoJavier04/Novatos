<?php

include("../includes/a-config.php");
include("conexion.php");

// controlador eliminarUsuarios
function eliminarUsuarios($id)
{
    try {
        $db = new ConexionDB();

        $sql = "DELETE FROM usuarios WHERE id_user = ?";
        $stmt = $db->getConexion()->prepare($sql);
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            echo "<p>Usuario eliminado exitosamente.</p>";
        } else {
            echo "<p>Error al eliminar el usuario: " . $stmt->error . "</p>";
        }

        $stmt->close();
        $db->cerrarConexion();
    } catch (Exception $e) {
        echo '<p>Error: ' . $e->getMessage() . '</p>';
    }
}

// Manejo de la solicitud POST
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['eliminar_id'])) {
    $id = intval($_POST['eliminar_id']);
    eliminarUsuarios($id);
    // Redirigir a la página de gestión de usuarios para mostrar la lista actualizada
    header("Location: ../backend.php");
    exit();
}
?>