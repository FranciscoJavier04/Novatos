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
                                echo '<button type="button" class="btn-modificar" onclick="abrirModalModificarUsuario('
                                    . $fila['id_user'] . ', \'' . $fila['email'] . '\', \'' . $fila['nombre'] . '\', \'' . $fila['apellidos']
                                    . '\', \'' . $fila['pais'] . '\', \'' . $fila['telefono'] . '\', \'' . $fila['fecha_nac'] . '\', \''
                                    . $fila['cod_postal'] . '\', \'' . $fila['rol'] . '\', \'' . $fila['password'] . '\')">Modificar</button>';
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

                    <!-- Modal Usuario -->
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
                                        <input type="hidden" id="modificarId" name="modificar_id">

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
                                            <label for="fecha_nac" class="form-label">Fecha de Nacimiento</label>
                                            <input type="date" class="form-control" id="fecha_nac" name="fecha_nac"
                                                required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="cod_postal" class="form-label">Código Postal</label>
                                            <input type="text" class="form-control" id="cod_postal" name="cod_postal"
                                                required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="rol" class="form-label">Rol</label>
                                            <select class="form-select" id="rol" name="rol" required>
                                                <option value="user">Usuario</option>
                                                <option value="admin">Admin</option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="password" class="form-label" required>Contraseña</label>
                                            <input type="password" class="form-control" id="password" name="password">
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

                            <!-- Script de Validación -->
                            <script>
                                document.getElementById("formUsuario").addEventListener("submit", function (event) {
                                    let valid = true;

                                    // Validar Email
                                    const email = document.getElementById("email").value;
                                    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                                    if (!emailRegex.test(email)) {
                                        alert("Por favor, introduce un correo electrónico válido.");
                                        valid = false;
                                    }

                                    // Validar Fecha de Nacimiento
                                    const fechaNac = document.getElementById("fecha_nac").value;
                                    const fechaActual = new Date().toISOString().split("T")[0];
                                    if (fechaNac >= fechaActual) {
                                        alert("La fecha de nacimiento debe ser anterior a la fecha actual.");
                                        valid = false;
                                    }

                                    // Validar Código Postal (solo números)
                                    const codPostal = document.getElementById("cod_postal").value;
                                    if (!/^\d+$/.test(codPostal)) {
                                        alert("El código postal solo puede contener números.");
                                        valid = false;
                                    }

                                    // Validar Teléfono (solo números)
                                    const telefono = document.getElementById("telefono").value;
                                    if (!/^\d+$/.test(telefono)) {
                                        alert("El teléfono solo puede contener números.");
                                        valid = false;
                                    }

                                    if (!valid) {
                                        event.preventDefault();
                                    }
                                });

                                const modalTitle = document.getElementById('modalUsuarioLabel');
                                const formUsuario = document.getElementById('formUsuario');
                                const modificarId = document.getElementById('modificarId');
                                const submitBtn = document.getElementById('submitBtn');
                                const passwordInput = document.getElementById('password');

                                // Función para abrir el modal en modo modificar
                                function abrirModalModificarUsuario(id, email, nombre, apellidos, pais, telefono, fechaNacimiento, codigoPostal, rol) {
                                    modalTitle.textContent = 'Modificar Usuario';
                                    modificarId.value = id;
                                    document.getElementById('email').value = email;
                                    document.getElementById('nombre').value = nombre;
                                    document.getElementById('apellidos').value = apellidos;
                                    document.getElementById('pais').value = pais;
                                    document.getElementById('telefono').value = telefono;
                                    document.getElementById('fecha_nac').value = fechaNacimiento;
                                    document.getElementById('cod_postal').value = codigoPostal;
                                    document.getElementById('rol').value = rol;

                                    // Deshabilitar el campo de contraseña
                                    passwordInput.value = "";
                                    passwordInput.disabled = true;

                                    submitBtn.name = 'modificar';
                                    const modal = new bootstrap.Modal(document.getElementById('modalUsuario'));
                                    modal.show();
                                }

                                // Restablecer el modal cuando se abre para insertar usuario
                                document.getElementById('modalUsuario').addEventListener('show.bs.modal', function () {
                                    if (modalTitle.textContent === 'Insertar Usuario') {
                                        passwordInput.disabled = false;
                                    }
                                });
                            </script>
                        </div>
                    </div>


                    <!-- GESTIÓN DE PLATOS -->
                    <h1 class="mt-3" id="platos">Gestión de Platos</h1>
                    <!-- Botón para abrir el modal de Insertar Usuario -->
                    <button type="button" class="btn btn-insertar" id="abrirModalInsertar" data-bs-toggle="modal"
                        data-bs-target="#modalPlato">
                        Insertar Plato
                    </button>
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
                                echo '<button type="button" class="btn-modificar" onclick="abrirModalModificarPlato(' . $fila['id_plato'] . ', \'' . $fila['nombre_plato'] . '\', \'' . $fila['categoria'] . '\', ' . $fila['precio'] . ', \'' . $fila['imagen'] . '\')">Modificar</button>';
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

                    <!-- Modal Plato -->
                    <div class="modal fade" id="modalPlato" tabindex="-1" aria-labelledby="modalPlatoLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalPlatoLabel">Insertar Plato</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form id="formPlato" action="controllers/insertarModificarPlato.php" method="POST"
                                    enctype="multipart/form-data">
                                    <div class="modal-body">
                                        <input type="hidden" id="modificarId" name="modificar_id">

                                        <div class="mb-3">
                                            <label for="nombre_plato" class="form-label">Nombre del Plato</label>
                                            <input type="text" class="form-control" id="nombre_plato"
                                                name="nombre_plato" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="categoria" class="form-label">Categoría</label>
                                            <select class="form-select" id="categoria" name="categoria" required>
                                                <option value="Entrantes">Entrantes</option>
                                                <option value="Principal">Principal</option>
                                                <option value="Especialidad">Especialidad</option>
                                                <option value="Postre">Postre</option>
                                                <option value="Bebidas">Bebidas</option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="precio" class="form-label">Precio (€)</label>
                                            <input type="number" class="form-control" id="precio" name="precio"
                                                step="0.01" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="imagen" class="form-label">Imagen</label>
                                            <input type="file" class="form-control" id="imagen" name="imagen"
                                                accept="image/*">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Cerrar</button>
                                        <button type="submit" id="submitBtnP" name="insertar"
                                            class="btn btn-primary">Guardar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Script de Validación -->
                    <script>
                        document.getElementById("formPlato").addEventListener("submit", function (event) {
                            let valid = true;

                            // Validar Nombre del Plato
                            const nombrePlato = document.getElementById("nombre_plato").value.trim();
                            if (nombrePlato.length < 3) {
                                alert("El nombre del plato debe tener al menos 3 caracteres.");
                                valid = false;
                            }

                            // Validar Precio
                            const precio = parseFloat(document.getElementById("precio").value);
                            if (isNaN(precio) || precio <= 0) {
                                alert("Introduce un precio válido.");
                                valid = false;
                            }

                            if (!valid) {
                                event.preventDefault();
                            }
                        });

                        const modalTitleP = document.getElementById('modalPlatoLabel');
                        const formPlato = document.getElementById('formPlato');
                        const modificarIdP = document.getElementById('modificarId');
                        const submitBtnP = document.getElementById('submitBtnP');

                        function abrirModalModificarPlato(id, nombre, categoria, precio, imagen) {
                            modalTitleP.textContent = 'Modificar Plato';
                            modificarIdP.value = id;
                            document.getElementById('nombre_plato').value = nombre;
                            document.getElementById('categoria').value = categoria;
                            document.getElementById('precio').value = precio;

                            submitBtnP.name = 'modificar';
                            const modal = new bootstrap.Modal(document.getElementById('modalPlato'));
                            modal.show();
                        }
                    </script>


                    <!-- GESTIÓN DE VALORACIONES -->
                    <h1 class="mt-3" id="valoraciones">Gestión de Valoraciones</h1>
                    <button type="button" class="btn btn-insertar" id="abrirModalInsertarValoracion"
                        data-bs-toggle="modal" data-bs-target="#modalValoracion">
                        Insertar Valoración
                    </button>
                    <?php
                    try {
                        $db = new ConexionDB();

                        $sqlUsuarios = "SELECT id_user, email FROM usuarios";
                        $resultadoUsuarios = $db->ejecutarConsulta($sqlUsuarios);

                        $sqlPlatos = "SELECT id_plato, nombre_plato FROM platos";
                        $resultadoPlatos = $db->ejecutarConsulta($sqlPlatos);

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

                                echo '<button type="button" class="btn-modificar" onclick="abrirModalModificarValoracion(' . $fila['id_valoracion'] . ', ' . $fila['id_user'] . ', ' . $fila['id_plato'] . ', \'' . $fila['comentario'] . '\', ' . $fila['valoracion'] . ')">Modificar</button>';
                                echo '<form action="controllers/eliminarPlato.php" method="POST">';
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
                    <!-- Modal Valoración -->
                    <div class="modal fade" id="modalValoracion" tabindex="-1" aria-labelledby="modalValoracionLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalValoracionLabel">Insertar Valoración</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form id="formValoracion" action="controllers/insertarModificarValoracion.php"
                                    method="POST">
                                    <div class="modal-body">
                                        <input type="hidden" id="modificarIdValoracion" name="modificar_id_valoracion">

                                        <div class="mb-3">
                                            <label for="id_user" class="form-label">Usuario</label>
                                            <select class="form-control" id="id_user" name="id_user" required>
                                                <option value="">Seleccione un usuario</option>
                                                <?php while ($usuario = $resultadoUsuarios->fetch_assoc()) {
                                                    echo '<option value="' . $usuario['id_user'] . '">' . $usuario['email'] . '</option>';
                                                } ?>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="id_plato" class="form-label">Plato</label>
                                            <select class="form-control" id="id_plato" name="id_plato" required>
                                                <option value="">Seleccione un plato</option>
                                                <?php while ($plato = $resultadoPlatos->fetch_assoc()) {
                                                    echo '<option value="' . $plato['id_plato'] . '">' . $plato['nombre_plato'] . '</option>';
                                                } ?>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="comentario" class="form-label">Comentario</label>
                                            <textarea class="form-control" id="comentario" name="comentario"
                                                required></textarea>
                                        </div>

                                        <div class="mb-3">
                                            <label for="valoracion" class="form-label">Valoración (1-10)</label>
                                            <input type="number" class="form-control" id="valoracion" name="valoracion"
                                                min="1" max="10" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Cerrar</button>
                                        <button type="submit" id="submitBtnV" name="insertar"
                                            class="btn btn-primary">Guardar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Script de Validación -->
                    <script>
                        document.getElementById("formValoracion").addEventListener("submit", function (event) {
                            let valid = true;

                            const valoracion = parseFloat(document.getElementById("valoracion").value);
                            if (isNaN(valoracion) || valoracion < 1 || valoracion > 10) {
                                alert("La valoración debe estar entre 1 y 10.");
                                valid = false;
                            }

                            if (!valid) {
                                event.preventDefault();
                            }
                        });

                        function abrirModalModificarValoracion(id, user, plato, comentario, valoracion) {
                            document.getElementById('modalValoracionLabel').textContent = 'Modificar Valoración';
                            document.getElementById('modificarIdValoracion').value = id;
                            document.getElementById('id_user').value = user;
                            document.getElementById('id_plato').value = plato;
                            document.getElementById('comentario').value = comentario;
                            document.getElementById('valoracion').value = valoracion;
                            document.getElementById('submitBtnV').name = 'modificar';

                            const modal = new bootstrap.Modal(document.getElementById('modalValoracion'));
                            modal.show();
                        }
                    </script>


                </div>

            </div>
        </div>
    </div>



    <?php include("includes/footer.php"); ?>
</body>

</html>