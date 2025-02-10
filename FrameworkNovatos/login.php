<?php
require 'vendor/autoload.php';
include("includes/a-config.php");
include("includes/loginGoogle.php");
if (isset($_SESSION['user'])) {
    header('location: index.php');
}
?>
<!DOCTYPE html>
<html>

<head>
    <?php include("includes/head-tag-contents.php"); ?>
</head>

<body>

    <?php include("includes/navigation.php"); ?>
    <main class="m-0 container-fluid">
        <div class="row min-vh-md-100">
            <div class="col-md-6 d-flex justify-content-center align-items-center">
                <div class="text-left login-container">
                    <div class="mt-4">
                        <img class="rounded-4 w-100" src="/assets/img/logo-login.png" alt="Logo Óneo">
                    </div>
                    <!--CF2: ¿Dónde está el h1?-->
                    <h2 class="mt-4 text-center fw-bold">BIENVENIDO DE NUEVO!</h2>
                    <p class="mt-4">Introduce tus datos para disfrutar de todas nuestras funciones.</p>
                    <?php
                    if (isset($_GET['error'])) {
                        switch ($_GET['error']) {
                            case '202':
                                echo '<p class="error">Credenciales incorrectas</p>';
                                break;
                            case '999':
                                echo '<p class="error">No se pudo completar el logueo. Por favor, inténtalo más tarde.</p>';
                                break;
                        }
                    }
                    ?>
                    <form method="POST" action="controllers/loguearse.php">
                        <div class="mt-3 mb-3">
                            <label for="email" class="form-label">Correo Electrónico</label>
                            <input type="email" class="form-control" name="email" id="email" value="<?php if (isset($_COOKIE['email'])) {
                                echo $_COOKIE['email'];
                            } ?>" required placeholder="fran@gmail.com">
                        </div>
                        <div class="mb-3 password-container">
                            <label for="password" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" required name="password" id="password" value="<?php if (isset($_COOKIE['pass']))
                                echo $_COOKIE['pass']; ?>" placeholder="********">
                            <i class="fas fa-eye password-icon" id="togglePassword"
                                onclick="mostrarPass('password')"></i>
                        </div>
                        <div class="mb-3 text-end">
                            <input type="checkbox" id="rememberMe" name="rememberMe" <?php if (isset($_COOKIE['rememberMe']))
                                echo "checked"; ?>>
                            <label>Recuérdame</label>
                        </div>
                        <button type="submit" class="mb-2 btn btn-comun w-100">Iniciar Sesión</button>
                        <div class="text-center">
                            <a href="<?php echo $login_button; ?>"><button type="button"
                                    class="p-2 m-3 btn rounded-3 btn-google">
                                    <i class="fab fa-google"></i></i> Sign in with Google
                                </button></a>
                        </div>

                        <p>¿No tienes cuenta? <a href="registro.php">Regístrate</a></p>
                    </form>
                </div>
            </div>

            <div class="p-0 container-fluid col-md-6 d-none d-md-block">
                <div class="d-none bg-login h-100 rounded-3 rounded-end d-md-block"></div>
            </div>
        </div>
    </main>
    <?php include("includes/footer.php"); ?>
    <script src="/controllers/formularios.js"></script>
</body>

</html>