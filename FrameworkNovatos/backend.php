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
        }

        .btn-modificar {
            background-color: #007bff;
        }

        .btn-eliminar {
            background-color: #dc3545;
        }
    </style>
</head>

<body class="body-AL ">
    <?php include("includes/navigation.php"); ?>

    <div class="container">
        <h1>Gestión de Usuarios</h1>

        <?php
        try {
            include("includes/conexion.php");
            $db = new ConexionDB();

            // Consulta para obtener los datos de la tabla usuarios
            $sql = "SELECT * FROM usuarios";
            $resultado = $db->ejecutarConsulta($sql);

            // Verificar si hay datos
            if ($resultado->num_rows > 0) {
                echo '<table>';
                echo '<thead>';
                echo '<tr>';
                echo '<th><input type="submit" name="insertar" value="Insertar" class="btn btn-modificar"></input> </th>';
                echo '<th>Nombre: <input type="text" name="nombre"></th>';
                echo '<th>Password: <input type="text" name="password"></th>';
                echo '<th>Apellidos: <input type="text" name="apellidos"></th>';
                echo '<th>Fecha de Nacimiento <input type="date" name="fecha_nacimiento"></th>';
                echo '<th>País <input type="text" name="pais"></th>';
                echo '<th>Código Postal <input type="text" name="cod_postal"></th>';
                echo '<th>Teléfono <input type="text" name="telefono"></th>';
                echo '<th>Rol <input type="text" name="rol"></th>';
                echo '</tr>';
                echo '<tr>';
                echo '<th>ID</th>';
                echo '<th>Nombre</th>';
                echo '<th>Password</th>';
                echo '<th>Apellidos</th>';
                echo '<th>Fecha de Nacimiento</th>';
                echo '<th>País</th>';
                echo '<th>Código Postal</th>';
                echo '<th>Teléfono</th>';
                echo '<th>Rol</th>';
                echo '<th>Acciones</th>';
                echo '</tr>';
                echo '</thead>';
                echo '<tbody>';

                // Iterar a través de los datos y mostrar cada fila
                while ($fila = $resultado->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>' . $fila['id_user'] . '</td>';
                    echo '<td>' . $fila['nombre'] . '</td>';
                    echo '<td>' . $fila['password'] . '</td>';
                    echo '<td>' . $fila['apellidos'] . '</td>';
                    echo '<td>' . $fila['fecha_nac'] . '</td>';
                    echo '<td>' . $fila['pais'] . '</td>';
                    echo '<td>' . $fila['cod_postal'] . '</td>';
                    echo '<td>' . $fila['telefono'] . '</td>';
                    echo '<td>' . $fila['rol'] . '</td>';
                    echo '<td>';
                    echo '<a href="modificar_usuario.php?id=' . $fila['id_user'] . '" class="btn btn-modificar">Modificar</a> ';
                    echo '<a href="eliminar_usuario.php?id=' . $fila['id_user'] . '" class="btn btn-eliminar" onclick="return confirm(\'¿Estás seguro de eliminar este usuario?\');">Eliminar</a>';
                    echo '</td>';
                    echo '</tr>';
                }

                echo '</tbody>';
                echo '</table>';
            } else {
                echo '<p>No se encontraron usuarios en la base de datos.</p>';
            }

            // Cerrar la conexión
            $db->cerrarConexion();
        } catch (Exception $e) {
            echo '<p>Error: ' . $e->getMessage() . '</p>';
        }
        ?>
    </div>

    <?php include("includes/footer.php"); ?>
</body>

</html>