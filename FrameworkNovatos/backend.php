<?php include("includes/a-config.php"); ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <?php include("includes/head-tag-contents.php"); ?>
</head>

<body class="body-AL align-items-center">
    <?php include("includes/navigation.php"); ?>

    <?php
    try {
        include("includes/conexion.php");
        $db = new ConexionDB();

        $sql = "SELECT * FROM usuarios";
        $resultado = $db->ejecutarConsulta($sql);

        while ($fila = $resultado->fetch_assoc()) {
            echo "ID: " . $fila['id_user'] . " - Nombre: " . $fila['nombre'] . "<br>";
        }

        // Cerrar la conexión
        $db->cerrarConexion();
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ?>

    <!-- GESTION DE USUARIOS , COMENTARIOS Y PLATOS-->



    <?php include("includes/footer.php"); ?>
</body>

</html>