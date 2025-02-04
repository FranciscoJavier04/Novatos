<?php
require 'vendor/autoload.php';
include("includes/a-config.php");
include("controllers/conexion.php"); // Asegúrate de que la ruta sea correcta
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
                                    data-bs-target="#modalOpinion<?php echo $fila['id_plato']; ?>">
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

                        <!-- Modal -->
                        <div class="modal fade" id="modalOpinion<?php echo $fila['id_plato']; ?>" tabindex="-1"
                            aria-labelledby="modalLabel<?php echo $fila['id_plato']; ?>" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalLabel<?php echo $fila['id_plato']; ?>">Opina sobre
                                            <?php echo $fila['nombre_plato']; ?>
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="insertarModificarValoracion.php" method="POST">
                                            <input type="hidden" name="id_plato" value="<?php echo $fila['id_plato']; ?>">
                                            <input type="hidden" name="id_user"
                                                value="<?php echo $_SESSION['user']->getId(); ?>">
                                            <div class="mb-3">
                                                <label for="opinion<?php echo $fila['id_plato']; ?>" class="form-label">Tu
                                                    opinión</label>
                                                <textarea class="form-control" name="comentario"
                                                    id="opinion<?php echo $fila['id_plato']; ?>" rows="3"></textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label for="valoracion<?php echo $fila['id_plato']; ?>"
                                                    class="form-label">Valoración (1-10)</label>
                                                <input type="number" class="form-control" name="valoracion"
                                                    id="valoracion<?php echo $fila['id_plato']; ?>" min="1" max="10">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Cerrar</button>
                                                <button type="submit" name="insertar"
                                                    class="btn btn-primary">Enviar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>

                <?php
                $db->cerrarConexion();
                ?>


                <!-- PRINCIPALES -->
                <?php
                $db = new ConexionDB();

                // Consulta para obtener los principales
                $sql = "SELECT nombre_plato, precio, imagen, descripcion FROM platos WHERE categoria = 'Principal'";
                $resultado = $db->ejecutarConsulta($sql);
                ?>

                <h1 class="mt-5 mb-5 text-center subtitulo-carta" id="principales">Principales</h1>
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