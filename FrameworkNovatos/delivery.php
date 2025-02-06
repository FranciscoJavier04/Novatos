<?php
require 'vendor/autoload.php';
include("includes/a-config.php");
include("controllers/conexion.php");
?>
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
                <h1 class="mb-4 text-center titulo-sidebar">Categorías</h1>
                <nav class="nav flex-column align-items-center">
                    <a class="mb-4 menu-item-del fs-5 text-dark rounded-3" href="#entrantes">Entrantes</a>
                    <a class="mb-4 menu-item-del fs-5 text-dark rounded-3" href="#principales">Principales</a>
                    <a class="mb-4 menu-item-del fs-5 text-dark rounded-3" href="#especialidades">Especialidades</a>
                    <a class="menu-item-del fs-5 text-dark" href="#postres">Postres</a>
                </nav>
            </div>

            <!-- Contenido Principal -->
            <div class="w-5 p-3 mx-auto text-justify carta-del col-md-9 bg-info rounded-3 text-paragraph">
                <?php
                $db = new ConexionDB();

                // Consulta para obtener los entrantes
                $sql = "SELECT id_plato, nombre_plato, precio, imagen, descripcion FROM platos WHERE categoria = 'Entrantes'";
                $resultado = $db->ejecutarConsulta($sql);
                ?>

                <h1 class="mb-5 text-center subtitulo-carta" id="entrantes">Entrantes</h1>
                <div class="row">
                    <?php while ($fila = $resultado->fetch_assoc()) { ?>
                        <div class="mb-4 row align-items-start ms-3">
                            <div class="col-md-4">
                                <button class="btn p-0" data-bs-toggle="modal"
                                    onclick="mostrarModalValoracion('<?php echo $_SESSION['user']->getId(); ?>', '<?php echo $fila['id_plato']; ?>', '', '')"
                                    data-bs-target="#modalValoracion">
                                    <img src="<?php echo $fila['imagen']; ?>" alt="<?php echo $fila['nombre_plato']; ?>"
                                        class="img-fluid">
                                </button>
                            </div>
                            <div class="col-md-6 fs-5">
                                <span class="fw-bold"><?php echo $fila['nombre_plato'] . ". " . $fila['precio']; ?>€</span>
                                <p><?php echo $fila['descripcion']; ?></p>
                            </div>
                            <div class="col-md-2">
                                <a href="carrito.php" class="btn btn-del">AÑADIR</a>
                            </div>
                        </div>
                    <?php } ?>
                </div>
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
                            <form id="formValoracion" action="controllers/valoracion.php" method="POST">
                                <div class="modal-body">
                                    <input type="hidden" value="<?php echo $_SESSION['user']->getId(); ?>" id="id_user"
                                        name="id_user">
                                    <input type="hidden" id="id_plato" name="id_plato">

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

                <?php
                $db->cerrarConexion();
                ?>

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

                    function mostrarModalValoracion(id_user, id_plato, comentario, valoracion) {
                        console.log("ID Usuario:", id_user);
                        console.log("ID Plato:", id_plato);
                        console.log("Comentario:", comentario);
                        console.log("Valoración:", valoracion);

                        document.getElementById('id_user').value = id_user;
                        document.getElementById('id_plato').value = id_plato;
                        document.getElementById('comentario').value = comentario;
                        document.getElementById('valoracion').value = valoracion;
                    }
                </script>

                <!-- ESPECIALIDADES -->
                <?php
                $db = new ConexionDB();

                // Consulta para obtener las especialidades
                $sql = "SELECT nombre_plato, precio, imagen, descripcion FROM platos WHERE categoria = 'Especialidad'";
                $resultado = $db->ejecutarConsulta($sql);
                ?>

                <h1 class="mt-5 mb-5 text-center subtitulo-carta" id="especialidades">Especialidades</h1>
                <div class="row">
                    <?php while ($fila = $resultado->fetch_assoc()) { ?>
                        <div class="mb-4 row align-items-start ms-3">
                            <div class="col-md-4">
                                <img src="<?php echo $fila['imagen']; ?>" alt="<?php echo $fila['nombre_plato']; ?>">
                            </div>
                            <div class="col-md-6 fs-5">
                                <span class="fw-bold"><?php echo $fila['nombre_plato'] . ". " . $fila['precio']; ?>€</span>
                                <p><?php echo $fila['descripcion']; ?></p>
                            </div>
                            <div class="col-md-2">
                                <a href="carrito.php" class="btn btn-del">AÑADIR</a>
                            </div>
                        </div>
                    <?php } ?>
                </div>

                <?php
                // Cerrar conexión
                $db->cerrarConexion();
                ?>

                <!-- POSTRES -->
                <?php
                $db = new ConexionDB();

                // Consulta para obtener los postres
                $sql = "SELECT nombre_plato, precio, imagen, descripcion FROM platos WHERE categoria = 'Postre'";
                $resultado = $db->ejecutarConsulta($sql);
                ?>

                <h1 class="mt-5 mb-5 text-center subtitulo-carta" id="postres">Postres</h1>
                <div class="row">
                    <?php while ($fila = $resultado->fetch_assoc()) { ?>
                        <div class="mb-4 row align-items-start ms-3">
                            <div class="col-md-4">
                                <img src="<?php echo $fila['imagen']; ?>" alt="<?php echo $fila['nombre_plato']; ?>">
                            </div>
                            <div class="col-md-6 fs-5">
                                <span class="fw-bold"><?php echo $fila['nombre_plato'] . ". " . $fila['precio']; ?>€</span>
                                <p><?php echo $fila['descripcion']; ?></p>
                            </div>
                            <div class="col-md-2">
                                <a href="carrito.php" class="btn btn-del">AÑADIR</a>
                            </div>
                        </div>
                    <?php } ?>
                </div>

                <?php
                // Cerrar conexión
                $db->cerrarConexion();
                ?>
            </div>
        </div>
    </div>

    <?php include("includes/footer.php"); ?>
</body>

</html>