<?php include("includes/a_config.php"); ?>
<!DOCTYPE html>
<html>

<head>
    <?php include("includes/head-tag-contents.php"); ?>
</head>

<body>
    <?php include("includes/navigation.php"); ?>
    <main class="container-fluid m-0">
            <div class="row min-vh-100">
                <div class="col-md-6 d-flex align-items-center justify-content-center ">
                    <div class="login-container text-left">
                        <div class="logo-login">
                            <img src="/assets/img/Logo.png" alt="Logo Óneo">
                        </div>
                        <h2 class="fw-bold text-center mt-4">BIENVENIDO DE NUEVO!</h2>
                        <p class="mt-4">Introduce tus datos para disfrutar de todas nuestras funciones.</p>
                        <form>
                            <div class="mb-3 mt-3">
                                <label for="email" class="form-label">Correo Electrónico</label>
                                <input type="email" class="form-control" id="email" placeholder="fran@gmail.com">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Contraseña</label>
                                <input type="password" class="form-control" id="password" placeholder="********">
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
                            
                            <p>¿No tienes cuenta? <a href="">Regístrate</a></p>
                        </form>
                    </div>
                </div>
<!-- ESTO ES EL FONDO DEL LOGIN -->
                <div class="col-md-6 bg-login d-none d-md-block text-end"></div>
            </div>
    </main>
    <?php include("includes/footer.php"); ?>
</body>

</html>