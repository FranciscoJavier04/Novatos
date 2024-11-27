<?php include("includes/a-config.php"); ?>
<!DOCTYPE html>
<html>

<head>
    <?php include("includes/head-tag-contents.php"); ?>
</head>

<body>
    <?php include("includes/navigation.php"); ?>
    <main class="container-fluid m-0">
        <div class="row min-vh-md-100">
            <div class="col-md-6 d-flex justify-content-center align-items-center">
                <div class="login-container text-left">
                    <div class="logo-login mt-4">
                        <img class="rounded-4" src="/assets/img/logo-login.png" alt="Logo Óneo">
                    </div>
                    <h2 class="fw-bold text-center mt-4">BIENVENIDO DE NUEVO!</h2>
                    <p class="mt-4">Introduce tus datos para disfrutar de todas nuestras funciones.</p>
                    <form method="POST" action="user.php">
                        <div class="mb-3 mt-3">
                            <label for="email" class="form-label">Correo Electrónico</label>
                            <input type="email" class="form-control" id="email" required placeholder="fran@gmail.com">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" required id="password" placeholder="********">
                        </div>
                        <div class="mb-3 text-end">
                            <input type="checkbox" id="rememberMe">
                            <label>Recuérdame</label>
                        </div>
                        <button type="submit" class="btn btn-comun w-100 mb-2">Iniciar Sesión</button>
                        <div class="text-center">
                            <button type="button" class="btn btn-google m-3 p-2">
                                <i class="fab fa-google"></i></i> Sign in with Google
                            </button>
                        </div>

                        <p>¿No tienes cuenta? <a href="registro.php">Regístrate</a></p>
                    </form>
                </div>
            </div>

            <div class="container-fluid col-md-6 d-none d-md-block p-0">
                <div class="d-none bg-login rounded-3 rounded-end d-md-block"></div>
            </div>
        </div>
    </main>
    <?php include("includes/footer.php"); ?>
</body>

</html>