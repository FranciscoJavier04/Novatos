<?php
require 'vendor/autoload.php';
include("includes/a-config.php");
include("includes/loginGoogle.php");
if (isset($_SESSION['user'])) {
    header('location: index.php');
}
if ($_COOKIE['aceptarCookie'] == "false") {
    header("Location:index.php");
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <?php include("includes/head-tag-contents.php"); ?>
</head>

<body>
    <?php include("includes/navigation.php"); ?>
    <main class="m-0 container-fluid">
        <div class="row min-vh-100">

            <div class="p-0 container-fluid col-md-6 d-none d-md-block">
                <div class="d-none bg-login h-100 rounded-3 rounded-start d-md-block"></div>
            </div>

            <div class="my-5 col-md-6 d-flex align-items-center justify-content-center">
                <div class="text-left login-container">
                    <div class="mt-4">
                        <img class="rounded-4 w-100" src="/assets/img/logo-login.png" alt="">
                    </div>
                    <div class="text-center">

                        <h1 class="mt-2 fw-bold">REGISTRARSE</h1>
                        <p class="mt-3">Introduce tus datos para disfrutar de todas nuestras funciones.</p>
                        <?php
                        if (isset($_GET['error'])) {
                            switch ($_GET['error']) {
                                case '111':
                                    echo '<p class="error">Las contraseñas no coinciden </p>';
                                    break;
                                case '101':
                                    echo '<p class="error">Ese correo ya esta registrado </p>';
                                    break;
                                case '999':
                                    echo '<p class="error">No se pudo completar el registro. Por favor, inténtalo más tarde.</p>';
                                    break;
                                case '232':
                                    echo '<p class="error">El captcha no coincide</p>';
                                    break;
                            }
                        }
                        ?>
                    </div>
                    <form method="POST" action="controllers/registrarse.php">
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre*</label>
                            <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Manuel"
                                value="<?php if (isset($_SESSION['user_first_name'])) {
                                    echo $_SESSION['user_first_name'];
                                } ?>" aria-label="Nombre">
                        </div>
                        <div class="mb-3">
                            <label for="apellidos" class="form-label">Apellidos*</label>
                            <input type="text" class="form-control" name="apellidos" id="apellidos"
                                placeholder="Romero Reyes" value="<?php if (isset($_SESSION['user_last_name'])) {
                                    echo $_SESSION['user_last_name'];
                                } ?>" aria-label="Apellidos">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Correo Electrónico*</label>
                            <input type="email" class="form-control" name="email" id="email"
                                placeholder="fran@gmail.com" value="<?php if (isset($_SESSION['user_email_address'])) {
                                    echo $_SESSION['user_email_address'];
                                } ?>" aria-label="Email">
                        </div>
                        <div class="mb-3 password-container">
                            <label for="password" class="form-label">Contraseña*</label>
                            <input type="password" class="form-control" name="password" id="password"
                                placeholder="********" aria-label="Contraseña">
                            <i class="fas fa-eye password-icon" id="togglePassword"
                                onclick="mostrarPass('password','togglePassword')"></i>
                        </div>
                        <div class="mb-3 password-container">
                            <label for="conf_password" class="form-label">Confirmar Contraseña*</label>
                            <input type="password" class="form-control" name="conf_password" id="conf_password"
                                placeholder="********" aria-label="Confirmar Contraseña">
                            <i class="fas fa-eye password-icon" id="togglePasswordConfirm"
                                onclick="mostrarPass('conf_password','togglePasswordConfirm')"></i>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-6">
                                <label for="telefono" class="form-label">Teléfono*</label>
                                <input type="text" class="form-control" name="telefono" id="telefono"
                                    placeholder="000000000" aria-label="Teléfono">
                            </div>
                            <div class="col-6">
                                <label for="fecha_nac" class="form-label">Fecha Nacimiento*</label>
                                <input type="date" class="form-control" name="fecha_nac" id="fecha_nac"
                                    aria-label="Fecha Nacimiento">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-6">
                                <label for="pais" class="form-label">Pais*</label>
                                <input type="text" class="form-control" name="pais" id="pais" placeholder="España"
                                    aria-label="Pais">
                            </div>
                            <div class="col-6">
                                <label for="cod_postal" class="form-label">Código Postal*</label>
                                <input type="text" class="form-control" name="cod_postal" id="cod_postal"
                                    placeholder="14900" aria-label="Código Postal">
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="col-6">
                                <label for="captcha">Introduce el CAPTCHA:</label>
                                <div class="d-flex align-items-center">
                                    <img src="generatecaptcha.php" alt="CAPTCHA" class="captcha-image img-fluid w-50" />
                                    <button type="button" id="refreshCaptcha" class="btn btn-comun ms-2"
                                        aria-label="RefreshCaptcha">
                                        <i class="fas fa-redo"></i>
                                    </button>
                                </div>
                                <input type="text" id="captcha" name="captcha_challenge" pattern="[A-Z]{6}"
                                    class="mt-2 form-control" aria-label="Captcha">
                            </div>
                        </div>

                        <button type="submit" id="submitBtn" class="mt-3 btn btn-comun w-100"
                            value="Registrarse">Registrarse</button>

                        <p class="mt-3">¿Ya tienes cuenta? <a href="login.php">Iniciar Sesión</a></p>

                    </form>
                </div>
            </div>
        </div>
    </main>
    <?php include("includes/footer.php"); ?>
    <script src="/controllers/formularios.js"></script>
</body>

</html>