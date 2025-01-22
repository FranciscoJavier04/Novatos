<?php include("includes/a-config.php"); ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <?php include("includes/head-tag-contents.php"); ?>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 5px;
            text-align: center;
        }

        th {
            background-color: #f4f4f4;
        }

        .btn {
            padding: 5px 10px;
            text-decoration: none;
            color: white;
            border-radius: 5px;
            margin: 2px;
        }

        .btn-modificar {
            background-color: #007bff;
        }

        .btn-eliminar {
            background-color: #dc3545;
        }

        .btn-insertar {
            background-color: #28a745;
        }
    </style>
</head>

<body class="body-AL ">
    <?php include("includes/navigation.php"); ?>

    <div class="container">
        <!-- Gestión de Usuarios -->
        <h1>Gestión de Usuarios</h1>
        <a href="insertar_usuario.php" class="btn btn-insertar">Insertar Usuario</a>
        <?php
        try {
            include("controllers/conexion.php");
            $db = new ConexionDB();

            $sql = "SELECT * FROM usuarios";
            $resultado = $db->ejecutarConsulta($sql);

            if ($resultado->num_rows > 0) {
                echo '<table>';
                echo '<thead>';
                echo '<tr>';
                echo '<th>ID</th>';
                echo '<th>Email</th>';
                echo '<th>Nombre</th>';
                echo '<th>Apellidos</th>';
                echo '<th>País</th>';
                echo '<th>Teléfono</th>';
                echo '<th>Rol</th>';
                echo '<th>Acciones</th>';
                echo '</tr>';
                echo '</thead>';
                echo '<tbody>';

                while ($fila = $resultado->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>' . $fila['id_user'] . '</td>';
                    echo '<td>' . $fila['email'] . '</td>';
                    echo '<td>' . $fila['nombre'] . '</td>';
                    echo '<td>' . $fila['apellidos'] . '</td>';
                    echo '<td>' . $fila['pais'] . '</td>';
                    echo '<td>' . $fila['telefono'] . '</td>';
                    echo '<td>' . $fila['rol'] . '</td>';
                    echo '<td>';
                    echo '<a href="modificar_usuario.php?id=' . $fila['id_user'] . '" class="btn btn-modificar">Modificar</a> ';
                    echo '<form action="controllers/eliminarUsuario.php" method="POST">';
                    echo '<input type="hidden" name="eliminar_id" value="' . $fila['id_user'] . '">';
                    echo '<button type="submit">Eliminar</button>';
                    echo '</form>';
                    echo '</td>';
                    echo '</td>';
                    echo '</tr>';
                }

                echo '</tbody>';
                echo '</table>';
            } else {
                echo '<p>No se encontraron usuarios en la base de datos.</p>';
            }

            $db->cerrarConexion();
        } catch (Exception $e) {
            echo '<p>Error: ' . $e->getMessage() . '</p>';
        }
        ?>

        <!-- Gestión de Platos -->
        <h1>Gestión de Platos</h1>
        <a href="insertar_plato.php" class="btn btn-insertar">Insertar Plato</a>
        <?php
        try {
            $db = new ConexionDB();

            $sql = "SELECT * FROM platos";
            $resultado = $db->ejecutarConsulta($sql);

            if ($resultado->num_rows > 0) {
                echo '<table>';
                echo '<thead>';
                echo '<tr>';
                echo '<th>ID</th>';
                echo '<th>Nombre</th>';
                echo '<th>Categoría</th>';
                echo '<th>Precio</th>';
                echo '<th>Imagen</th>';
                echo '<th>Acciones</th>';
                echo '</tr>';
                echo '</thead>';
                echo '<tbody>';

                while ($fila = $resultado->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>' . $fila['id_plato'] . '</td>';
                    echo '<td>' . $fila['nombre_plato'] . '</td>';
                    echo '<td>' . $fila['categoria'] . '</td>';
                    echo '<td>' . number_format($fila['precio'], 2) . ' €</td>';
                    echo '<td><img src="images/' . $fila['imagen'] . '" alt="Imagen de ' . $fila['nombre_plato'] . '" class="imagen-plato"></td>';
                    echo '<td>';
                    echo '<a href="modificar_plato.php?id=' . $fila['id_plato'] . '" class="btn btn-modificar">Modificar</a> ';
                    echo '<form action="controllers/eliminarPlato.php" method="POST">';
                    echo '<input type="hidden" name="eliminar_id_plato" value="' . $fila['id_plato'] . '">';
                    echo '<button type="submit">Eliminar</button>';
                    echo '</form>';
                    echo '</td>';
                    echo '</tr>';
                }

                echo '</tbody>';
                echo '</table>';
            } else {
                echo '<p>No se encontraron platos en la base de datos.</p>';
            }

            $db->cerrarConexion();
        } catch (Exception $e) {
            echo '<p>Error: ' . $e->getMessage() . '</p>';
        }
        ?>

        <!-- Gestión de Valoraciones -->
        <h1>Gestión de Valoraciones</h1>
        <a href="insertar_valoracion.php" class="btn btn-insertar">Insertar Valoración</a>
        <?php
        try {
            $db = new ConexionDB();

            $sql = "SELECT * FROM valoraciones";
            $resultado = $db->ejecutarConsulta($sql);

            if ($resultado->num_rows > 0) {
                echo '<table>';
                echo '<thead>';
                echo '<tr>';
                echo '<th>ID</th>';
                echo '<th>ID Usuario</th>';
                echo '<th>ID Plato</th>';
                echo '<th>Comentario</th>';
                echo '<th>Valoración</th>';
                echo '<th>Acciones</th>';
                echo '</tr>';
                echo '</thead>';
                echo '<tbody>';

                while ($fila = $resultado->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>' . $fila['id_valoracion'] . '</td>';
                    echo '<td>' . $fila['id_user'] . '</td>';
                    echo '<td>' . $fila['id_plato'] . '</td>';
                    echo '<td>' . $fila['comentario'] . '</td>';
                    echo '<td>' . $fila['valoracion'] . '/10</td>';
                    echo '<td>';
                    echo '<a href="modificar_valoracion.php?id=' . $fila['id_valoracion'] . '" class="btn btn-modificar">Modificar</a> ';
                    echo '<form action="controllers/eliminarValoracion.php" method="POST">';
                    echo '<input type="hidden" name="eliminar_id_valoracion" value="' . $fila['id_valoracion'] . '">';
                    echo '<button type="submit">Eliminar</button>';
                    echo '</form>';
                    echo '</td>';
                    echo '</tr>';
                }

                echo '</tbody>';
                echo '</table>';
            } else {
                echo '<p>No se encontraron valoraciones en la base de datos.</p>';
            }

            $db->cerrarConexion();
        } catch (Exception $e) {
            echo '<p>Error: ' . $e->getMessage() . '</p>';
        }
        ?>
    </div>

    <?php include("includes/footer.php"); ?>
</body>

</html>