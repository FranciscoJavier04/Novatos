<?php
require 'vendor/autoload.php';
include("includes/a-config.php"); ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <?php include("includes/head-tag-contents.php"); ?>

</head>

<body class="body-del align-items-center text-warning ">

    <?php include("includes/navigation.php"); ?>
    <div class="p-4 mb-4 container-del d-flex">
        <div class="row">
            <!-- Sidebar de Categorías -->
            <div class="p-3 sidebar-del col-md-3 bg-warning rounded-3 text-dark d-md-block d-none">
                <h1 class="mb-4 text-center titulo-sidebar">Backend</h1>
                <nav class="nav flex-column align-items-center">
                    <a class="mb-4 menu-item-del fs-5 text-dark rounded-3" href="#usuarios">Usuarios</a>
                    <a class="mb-4 menu-item-del fs-5 text-dark rounded-3" href="#platos">Platos</a>
                    <a class="mb-4 menu-item-del fs-5 text-dark rounded-3" href="#valoraciones">Valoraciones</a>
                </nav>
            </div>

            <!-- Contenido Principal -->
            <div class="w-5 p-3 mx-auto text-justify carta-del col-md-9 bg-info rounded-3 text-paragraph">
                <div class="row">

                    <!-- GESTIÓN DE USUARIOS -->
                    <h1 class="mt-3" id="usuarios">Gestión de Usuarios</h1>

                    <!-- Botón para abrir el modal de Insertar Usuario -->
                    <button type="button" class="btn btn-insertar" id="abrirModalInsertar" data-bs-toggle="modal"
                        data-bs-target="#modalUsuario">
                        Insertar Usuario
                    </button>

                    <?php
                    try {
                        include("controllers/conexion.php");
                        $db = new ConexionDB();

                        $sql = "SELECT * FROM usuarios";
                        $resultado = $db->ejecutarConsulta($sql);

                        if ($resultado->num_rows > 0) {
                            echo '<table class="tabla-backend">';
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
                                echo '<button type="button" class="btn-modificar" onclick="abrirModalModificar('
                                    . $fila['id_user'] . ', \'' . $fila['email'] . '\', \'' . $fila['nombre'] . '\', \''
                                    . $fila['apellidos'] . '\', \'' . $fila['pais'] . '\', \'' . $fila['telefono'] . '\', \'' . $fila['rol']
                                    . '\')">Modificar</button>';
                                echo '<form action="controllers/eliminarUsuario.php" method="POST">';
                                echo '<input type="hidden" name="eliminar_id" value="' . $fila['id_user'] . '">';
                                echo '<button type="submit" class="btn-eliminar">Eliminar</button>';
                                echo '</form>';
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

                    <!-- Modal -->
                    <div class="modal fade" id="modalUsuario" tabindex="-1" aria-labelledby="modalUsuarioLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalUsuarioLabel">Insertar Usuario</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form id="formUsuario" action="controllers/insertarModificarUsuario.php" method="POST">
                                    <div class="modal-body">
                                        <input type="hidden" id="modificarId" name="modificar_id" value="">

                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" class="form-control" id="email" name="email" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="nombre" class="form-label">Nombre</label>
                                            <input type="text" class="form-control" id="nombre" name="nombre" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="apellidos" class="form-label">Apellidos</label>
                                            <input type="text" class="form-control" id="apellidos" name="apellidos"
                                                required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="pais" class="form-label">País</label>
                                            <input type="text" class="form-control" id="pais" name="pais" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="telefono" class="form-label">Teléfono</label>
                                            <input type="tel" class="form-control" id="telefono" name="telefono"
                                                required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="rol" class="form-label">Rol</label>
                                            <select class="form-select" id="rol" name="rol" required>
                                                <option value="Usuario">Usuario</option>
                                                <option value="Admin">Admin</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Cerrar</button>
                                        <button type="submit" id="submitBtn" name="insertar"
                                            class="btn btn-primary">Guardar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Bootstrap JS -->
                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
                    <script>
                        const modalTitle = document.getElementById('modalUsuarioLabel');
                        const formUsuario = document.getElementById('formUsuario');
                        const modificarId = document.getElementById('modificarId');
                        const submitBtn = document.getElementById('submitBtn');

                        // Función para abrir el modal en modo modificar
                        function abrirModalModificar(id, email, nombre, apellidos, pais, telefono, rol) {
                            modalTitle.textContent = 'Modificar Usuario';
                            modificarId.value = id;
                            document.getElementById('email').value = email;
                            document.getElementById('nombre').value = nombre;
                            document.getElementById('apellidos').value = apellidos;
                            document.getElementById('pais').value = pais;
                            document.getElementById('telefono').value = telefono;
                            document.getElementById('rol').value = rol;
                            submitBtn.name = 'modificar';
                            const modal = new bootstrap.Modal(document.getElementById('modalUsuario'));
                            modal.show();
                        }
                    </script>


                    <!-- GESTIÓN DE PLATOS -->
                    <h1 class="mt-3" id="platos">Gestión de Platos</h1>
                    <a href="insertar_plato.php" class="btn btn-insertar">Insertar Plato</a>
                    <?php
                    try {
                        $db = new ConexionDB();

                        $sql = "SELECT * FROM platos";
                        $resultado = $db->ejecutarConsulta($sql);

                        if ($resultado->num_rows > 0) {
                            echo '<table class="tabla-backend">';
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
                                echo '<button type="submit" class="btn-eliminar">Eliminar</button>';
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
                    <h1 class="mt-3" id="valoraciones">Gestión de Valoraciones</h1>
                    <a href="insertar_valoracion.php" class="btn btn-insertar">Insertar Valoración</a>
                    <?php
                    try {
                        $db = new ConexionDB();

                        $sql = "SELECT * FROM valoraciones";
                        $resultado = $db->ejecutarConsulta($sql);

                        if ($resultado->num_rows > 0) {
                            echo '<table class="tabla-backend">';
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
                                echo '<button type="submit" class="btn-eliminar">Eliminar</button>';
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

            </div>
        </div>
    </div>



    <?php include("includes/footer.php"); ?>
</body>

</html>