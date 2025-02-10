<?php
require 'vendor/autoload.php';
include("controllers/conexion.php");
include("includes/a-config.php");
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
                <!-- ENTRANTES -->
                <?php
                $db = new ConexionDB();

                // Consulta para obtener los entrantes
                $sql = "SELECT id_plato, nombre_plato, precio, imagen, descripcion, (SELECT AVG(valoracion) FROM valoraciones WHERE valoraciones.id_plato = platos.id_plato) AS media_valoracion FROM platos WHERE categoria = 'Entrantes'";

                $resultado = $db->ejecutarConsulta($sql);
                ?>
                <div class="mb-4 row align-items-start ms-3 ">
                    <div class="col-md-2 ">
                        <h1 class="mb-5 me-4 text-center subtitulo-carta" id="valoracion">Valorar</h1>
                    </div>
                    <div class="col-md-7">
                        <h1 class="mb-5 text-center subtitulo-carta" id="entrantes">Entrantes</h1>
                    </div>
                    <div class="col-md-3">
                    </div>
                </div>
                <div class="row">
                    <?php while ($fila = $resultado->fetch_assoc()) { ?>
                        <div class="mb-4 row align-items-start ms-3">
                            <div class="col-md-4">
                                <button class="btn p-0" data-bs-toggle="modal"
                                    onclick="mostrarModalValoracion('<?php echo isset($_SESSION['user']) ? $_SESSION['user']->getId() : ''; ?>', '<?php echo $fila['id_plato']; ?>', '', '')"
                                    data-bs-target="#modalValoracion" <?php echo !isset($_SESSION['user']) ? 'disabled' : ''; ?>>
                                    <img src="<?php echo $fila['imagen']; ?>" alt="<?php echo $fila['nombre_plato']; ?>"
                                        class="img-fluid">
                                </button>
                                <p class="mt-1 ms-5">
                                    <?php echo number_format($fila['media_valoracion'], 1) ?? 'Sin valoraciones'; ?>/10
                                    <i class="fas fa-star text-warning"></i>
                                </p>
                            </div>
                            <div class="col-md-6 fs-5">
                                <span class="fw-bold"><?php echo $fila['nombre_plato'] . ". " . $fila['precio']; ?>€</span>
                                <p><?php echo $fila['descripcion']; ?></p>
                            </div>
                            <div class="col-md-2">
                                <a href="#" class="btn btn-del" onclick="verificarSesion()">AÑADIR</a>
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
                                <h5 class="modal-title" id="modalValoracionLabel">Realizar Valoración</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form id="formValoracion" action="controllers/valoracion.php" method="POST">
                                <div class="modal-body">
                                    <input type="hidden" id="id_user" name="id_user">
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



                        if (!valid) {
                            event.preventDefault();
                        }
                    });

                    function mostrarModalValoracion(id_user, id_plato, comentario, valoracion) {
                        document.getElementById('id_user').value = id_user;
                        document.getElementById('id_plato').value = id_plato;
                        document.getElementById('comentario').value = comentario;
                        document.getElementById('valoracion').value = valoracion;
                    }

                    function verificarSesion() {
                        <?php if (!isset($_SESSION['user'])) { ?>
                            alert("Debes iniciar sesión para añadir productos al carrito.");
                        <?php } else { ?>
                            window.location.href = "carrito.php";
                        <?php } ?>
                    }

                </script>

                <!-- PRINCIPALES -->
                <?php
                $db = new ConexionDB();

                // Consulta para obtener los principales
                $sql = "SELECT id_plato, nombre_plato, precio, imagen, descripcion, (SELECT AVG(valoracion) FROM valoraciones WHERE valoraciones.id_plato = platos.id_plato) AS media_valoracion FROM platos WHERE categoria = 'Principal'";

                $resultado = $db->ejecutarConsulta($sql);
                ?>
                <h1 class="mb-5 text-center subtitulo-carta" id="principales">Principales</h1>
                <div class="row">
                    <?php while ($fila = $resultado->fetch_assoc()) { ?>
                        <div class="mb-4 row align-items-start ms-3">
                            <div class="col-md-4">
                                <button class="btn p-0" data-bs-toggle="modal"
                                    onclick="mostrarModalValoracion('<?php echo isset($_SESSION['user']) ? $_SESSION['user']->getId() : ''; ?>', '<?php echo $fila['id_plato']; ?>', '', '')"
                                    data-bs-target="#modalValoracion" <?php echo !isset($_SESSION['user']) ? 'disabled' : ''; ?>>
                                    <img src="<?php echo $fila['imagen']; ?>" alt="<?php echo $fila['nombre_plato']; ?>"
                                        class="img-fluid">
                                </button>
                                <p class="mt-1 ms-5">
                                    <?php echo number_format($fila['media_valoracion'], 1) ?? 'Sin valoraciones'; ?>/10
                                    <i class="fas fa-star text-warning"></i>
                                </p>
                            </div>
                            <div class="col-md-6 fs-5">
                                <span class="fw-bold"><?php echo $fila['nombre_plato'] . ". " . $fila['precio']; ?>€</span>
                                <p><?php echo $fila['descripcion']; ?></p>
                            </div>
                            <div class="col-md-2">
                                <a href="#" class="btn btn-del" onclick="verificarSesion()">AÑADIR</a>
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
                                <h5 class="modal-title" id="modalValoracionLabel">Realizar Valoración</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form id="formValoracion" action="controllers/valoracion.php" method="POST">
                                <div class="modal-body">
                                    <input type="hidden" id="id_user" name="id_user">
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



                        if (!valid) {
                            event.preventDefault();
                        }
                    });

                    function mostrarModalValoracion(id_user, id_plato, comentario, valoracion) {
                        document.getElementById('id_user').value = id_user;
                        document.getElementById('id_plato').value = id_plato;
                        document.getElementById('comentario').value = comentario;
                        document.getElementById('valoracion').value = valoracion;
                    }

                    function verificarSesion() {
                        <?php if (!isset($_SESSION['user'])) { ?>
                            alert("Debes iniciar sesión para añadir productos al carrito.");
                        <?php } else { ?>
                            window.location.href = "carrito.php";
                        <?php } ?>
                    }

                </script>

                <!-- ESPECIALIDADES -->
                <?php
                $db = new ConexionDB();

                // Consulta para obtener las especialidades
                $sql = "SELECT id_plato, nombre_plato, precio, imagen, descripcion, (SELECT AVG(valoracion) FROM valoraciones WHERE valoraciones.id_plato = platos.id_plato) AS media_valoracion FROM platos WHERE categoria = 'Especialidad'";

                $resultado = $db->ejecutarConsulta($sql);
                ?>
                <h1 class="mb-5 text-center subtitulo-carta" id="especialidades">Especialidades</h1>
                <div class="row">
                    <?php while ($fila = $resultado->fetch_assoc()) { ?>
                        <div class="mb-4 row align-items-start ms-3">
                            <div class="col-md-4">
                                <button class="btn p-0" data-bs-toggle="modal"
                                    onclick="mostrarModalValoracion('<?php echo isset($_SESSION['user']) ? $_SESSION['user']->getId() : ''; ?>', '<?php echo $fila['id_plato']; ?>', '', '')"
                                    data-bs-target="#modalValoracion" <?php echo !isset($_SESSION['user']) ? 'disabled' : ''; ?>>
                                    <img src="<?php echo $fila['imagen']; ?>" alt="<?php echo $fila['nombre_plato']; ?>"
                                        class="img-fluid">
                                </button>
                                <p class="mt-1 ms-5">
                                    <?php echo number_format($fila['media_valoracion'], 1) ?? 'Sin valoraciones'; ?>/10
                                    <i class="fas fa-star text-warning"></i>
                                </p>
                            </div>
                            <div class="col-md-6 fs-5">
                                <span class="fw-bold"><?php echo $fila['nombre_plato'] . ". " . $fila['precio']; ?>€</span>
                                <p><?php echo $fila['descripcion']; ?></p>
                            </div>
                            <div class="col-md-2">
                                <a href="#" class="btn btn-del" onclick="verificarSesion()">AÑADIR</a>
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
                                <h5 class="modal-title" id="modalValoracionLabel">Realizar Valoración</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form id="formValoracion" action="controllers/valoracion.php" method="POST">
                                <div class="modal-body">
                                    <input type="hidden" id="id_user" name="id_user">
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



                        if (!valid) {
                            event.preventDefault();
                        }
                    });

                    function mostrarModalValoracion(id_user, id_plato, comentario, valoracion) {
                        document.getElementById('id_user').value = id_user;
                        document.getElementById('id_plato').value = id_plato;
                        document.getElementById('comentario').value = comentario;
                        document.getElementById('valoracion').value = valoracion;
                    }

                    function verificarSesion() {
                        <?php if (!isset($_SESSION['user'])) { ?>
                            alert("Debes iniciar sesión para añadir productos al carrito.");
                        <?php } else { ?>
                            window.location.href = "carrito.php";
                        <?php } ?>
                    }

                </script>

                <!-- POSTRES -->
                <?php
                $db = new ConexionDB();
                $sql = "SELECT id_plato, nombre_plato, precio, imagen, descripcion, (SELECT AVG(valoracion) FROM valoraciones WHERE valoraciones.id_plato = platos.id_plato) AS media_valoracion FROM platos WHERE categoria = 'Postre'";
                $resultado = $db->ejecutarConsulta($sql);
                ?>
                <h1 class="mb-5 text-center subtitulo-carta" id="postres">Postres</h1>
                <div class="row">
                    <?php while ($fila = $resultado->fetch_assoc()) { ?>
                        <div class="mb-4 row align-items-start ms-3">
                            <div class="col-md-4">
                                <button class="btn p-0" data-bs-toggle="modal"
                                    onclick="mostrarModalValoracion('<?php echo isset($_SESSION['user']) ? $_SESSION['user']->getId() : ''; ?>', '<?php echo $fila['id_plato']; ?>', '', '')"
                                    data-bs-target="#modalValoracion" <?php echo !isset($_SESSION['user']) ? 'disabled' : ''; ?>>
                                    <img src="<?php echo $fila['imagen']; ?>" alt="<?php echo $fila['nombre_plato']; ?>"
                                        class="img-fluid">
                                </button>
                                <p class="mt-1 ms-5">
                                    <?php echo number_format($fila['media_valoracion'], 1) ?? 'Sin valoraciones'; ?>/10
                                    <i class="fas fa-star text-warning"></i>
                                </p>
                            </div>
                            <div class="col-md-6 fs-5">
                                <span class="fw-bold"><?php echo $fila['nombre_plato'] . ". " . $fila['precio']; ?>€</span>
                                <p><?php echo $fila['descripcion']; ?></p>
                            </div>
                            <div class="col-md-2">
                                <a href="#" class="btn btn-del" onclick="verificarSesion()">AÑADIR</a>
                            </div>
                        </div>
                    <?php } ?>
                </div>

                <?php $db->cerrarConexion(); ?>

                <!-- Modal Valoración -->
                <div class="modal fade" id="modalValoracion" tabindex="-1" aria-labelledby="modalValoracionLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalValoracionLabel">Realizar Valoración</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form id="formValoracion" action="controllers/valoracion.php" method="POST">
                                <div class="modal-body">
                                    <input type="hidden" id="id_user" name="id_user">
                                    <input type="hidden" id="id_plato" name="id_plato">

                                    <div class="mb-3">
                                        <label for="editor-container" class="form-label">Comentario</label>
                                        <div id="editor-container" style="height: 150px;"></div>
                                        <input type="hidden" id="comentario" name="comentario">
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

                        if (!valid) {
                            event.preventDefault();
                        }
                    });

                    function mostrarModalValoracion(id_user, id_plato, comentario, valoracion) {
                        document.getElementById('id_user').value = id_user;
                        document.getElementById('id_plato').value = id_plato;
                        document.getElementById('comentario').value = comentario;
                        document.getElementById('valoracion').value = valoracion;
                    }

                    function verificarSesion() {
                        <?php if (!isset($_SESSION['user'])) { ?>
                            alert("Debes iniciar sesión para añadir productos al carrito.");
                        <?php } else { ?>
                            window.location.href = "carrito.php";
                        <?php } ?>
                    }

                </script>
            </div>
        </div>
    </div>

    <?php include("includes/footer.php"); ?>
</body>

</html>