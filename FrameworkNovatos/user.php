<?php
require 'vendor/autoload.php';
include("includes/a-config.php");
if (!isset($_SESSION['user']) || $_SESSION['user'] == null) {
    header('location: login.php');
}

$imagen_base64 = base64_encode($_SESSION['user']->imagen);
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <?php include("includes/head-tag-contents.php"); ?>
</head>

<body>
    <?php include("includes/navigation.php"); ?>
    <main class="p-0 container-fluid">
        <header>
            <div class="mt-2 container-fluid">
                <div class="d-flex justify-content-center align-items-center">
                    <div class="col-md-12 col-8 row">
                        <div class="text-center col-md-2 text-md-start">
                            <div class="profile-pic">
                                <?php echo "<img src='data:image/png;base64,{$imagen_base64}' class='w-100 rounded-circle' alt='Imagen del Usuario' />"; ?>
                                <div class="text-center text-md-start">
                                    <p class="my-0 fs-2 fw-bold">
                                        <?php echo $_SESSION['user']->getNombre() . ' ' . $_SESSION['user']->getApellidos(); ?>
                                    </p>
                                    <p class="opacity-75 fs-4 fw-bold fst-italic">
                                        <?php echo ($_SESSION['user']->getRol() == 'user') ? "Cliente" : "Administrador"; ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7 justify-content-md-end justify-content-end ">
                            <input type="file" id="fileInput" accept="image/*" class="d-none" aria-labelledby="fileInput">

                            <button class="btn btn-primary"
                                onclick="document.getElementById('fileInput').click()">Seleccionar Foto</button>
                            <p id="fileName" class="mt-2"></p>
                            <button class="mt-3 btn btn-success" onclick="uploadImage()">Subir Foto</button>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <section>
            <div class="p-3 my-3 border row justify-content-center border-dark mx-md-1">
                <div class="col-md-8">
                    <form action="controllers/insertarModificarUsuario.php" method="POST">
                        <h5 class="text-center">Información Personal</h5>
                        <div class="mb-3 separador-user"></div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="nombre" class="form-label">Nombre</label>
                                    <input type="text" class="form-control" id="nombre" name="nombre"
                                        value="<?php echo $_SESSION['user']->getNombre(); ?>" aria-label="Nombre">
                                </div>
                                <div class="mb-3">
                                    <label for="apellidos" class="form-label">Apellidos</label>
                                    <input type="text" class="form-control" id="apellidos" name="apellidos"
                                        value="<?php echo $_SESSION['user']->getApellidos(); ?>" aria-label="Apellidos">
                                </div>
                                <div class="mb-3">
                                    <label for="fecha_nac" class="form-label">Fecha nacimiento</label>
                                    <input type="date" class="form-control" id="fecha_nac" name="fecha_nac"
                                        value="<?php echo $_SESSION['user']->getFechaNac(); ?>" aria-label="Fecha_nacimiento">
                                </div>
                                <div class="mb-3">
                                    <label for="telefono" class="form-label">Teléfono</label>
                                    <input type="tel" class="form-control" id="telefono" name="telefono"
                                        value="<?php echo $_SESSION['user']->getTelefono(); ?>" aria-label="Telefono">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        value="<?php echo $_SESSION['user']->getEmail(); ?>" aria-label="Email">
                                </div>
                                <div class="mb-3">
                                    <label for="pais" class="form-label">País</label>
                                    <input type="text" class="form-control" id="pais" name="pais"
                                        value="<?php echo $_SESSION['user']->getPais(); ?>" aria-label="Pais">
                                </div>
                                <div class="mb-3">
                                    <label for="codPostal" class="form-label">Código Postal</label>
                                    <input type="text" class="form-control" id="codPostal" name="cod_postal"
                                        value="<?php echo $_SESSION['user']->getCodPostal(); ?>" aria-label="Codigo Postal">
                                </div>
                                <input type="hidden" id="modificarId" name="modificar_id"
                                    value="<?php echo $_SESSION['user']->id_user; ?>">
                                <div class="text-center">
                                    <button type="submit" name="modificar2" class="btn btn-comun">Guardar</button>
                                </div>
                                <?php
                                if (isset($_GET['cc']) && $_GET['cc'] == 66) {
                                    echo '<p class="success">Datos del Usuario Guardados</p>';
                                } else if (isset($_GET['error']) && $_GET['error'] == 662) {
                                    echo '<p class="error">Ese email ya esta registrado, no se pueden modificar los datos</p>';
                                }
                                ?>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-1 d-flex justify-content-center align-items-center">
                    <div class="separador-pass"></div>
                </div>

                <div class="col-md-3">
                    <form method="POST" action="./controllers/insertarModificarUsuario.php">
                        <h5 class="text-center">Cambiar Contraseña</h5>
                        <div class="mb-3 separador-user"></div>
                        <div class="mb-3 text-center password-container">
                            <label for="current_password" class="form-label">Contraseña actual</label>
                            <input type="password" class="form-control" id="current_password" name="current_password"
                                required aria-label="Contraseña Actual">
                            <i class="fas fa-eye password-icon" id="togglePasswordCurrent"
                                onclick="mostrarPass('current_password','togglePasswordCurrent')"></i>
                        </div>
                        <div class="mb-3 text-center password-container">
                            <label for="new_password" class="form-label">Nueva contraseña</label>
                            <input type="password" class="form-control" id="new_password" name="new_password" required aria-label="Nueva Contraseña">
                            <i class="fas fa-eye password-icon" id="togglePasswordNew"
                                onclick="mostrarPass('new_password','togglePasswordNew')"></i>
                        </div>
                        <div class="mb-3 text-center password-container">
                            <label for="confirm_new_password" class="form-label">Repite nueva contraseña</label>
                            <input type="password" class="form-control" id="confirm_new_password"
                                name="confirm_new_password" required aria-label="Repite Nueva Contraseña">
                            <i class="fas fa-eye password-icon" id="togglePasswordConfirm"
                                onclick="mostrarPass('confirm_new_password','togglePasswordConfirm')"></i>
                        </div>
                        <div class="text-center">
                            <button name="modificarContraseña" type="submit" class="btn btn-comun">Guardar</button>
                        </div>
                        <?php
                        if (isset($_GET['error'])) {
                            switch ($_GET['error']) {
                                case '22':
                                    echo '<p class="error">Las nuevas contraseñas no coinciden</p>';
                                    break;
                                case '21':
                                    echo '<p class="error">Esa no es tu contraseña Actualmente</p>';
                                    break;
                            }
                        }
                        if (isset($_GET['cc']) && $_GET['cc'] == 77) {
                            echo '<p class="success">Contraseña cambiada con exito</p>';
                        }
                        ?>
                    </form>
                </div>
            </div>
        </section>
    </main>
    <script src="juegos/scripts/subirFoto.js"></script>
    <script src="/controllers/formularios.js"></script>
    <?php include("includes/footer.php"); ?>
</body>

</html>