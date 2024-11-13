<?php include("includes/a_config.php"); ?>
<!DOCTYPE html>
<html>

<head>
    <?php include("includes/head-tag-contents.php"); ?>
</head>

<body>
    <?php include("includes/navigation.php"); ?>
    <main class="container">
        <div class="container-fluid">
            <div class="row min-vh-100">
                <div class="col-md-6 d-flex align-items-center justify-content-center">
                    <div class="login-container text-center">
                        <div class="logo-login">
                            <img src="/assets/img/Logo.png" alt="Logo Óneo">
                        </div>
                        <h2 class="fw-bold">BIENVENIDO DE NUEVO!</h2>
                        <p>Introduce tus datos para disfrutar de todas nuestras funciones.</p>
                        <form>
                            <div class="mb-3">
                                <label for="email" class="form-label">Correo Electrónico</label>
                                <input type="email" class="form-control" id="email" placeholder="fran@gmail.com">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Contraseña</label>
                                <input type="password" class="form-control" id="password" placeholder="********">
                            </div>
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="rememberMe">
                                <label class="form-check-label" for="rememberMe">Recuérdame</label>
                            </div>
                            <button type="submit" class="btn btn-primary w-100 mb-2"
                                style="background-color: #D5BA86; border-color: #D5BA86;">Iniciar Sesión</button>
                            <button type="button" class="btn btn-google text-center m-3 p-2">
                                <i class="fab fa-google"></i></i> Sign in with Google
                            </button>
                            <p>¿No tienes cuenta? <a href="#">Regístrate</a></p>
                        </form>
                    </div>
                </div>

                <div class="col-md-6 bg-login d-none d-md-block"></div>
            </div>
        </div>
    </main>
    <?php include("includes/footer.php"); ?>
</body>

</html>