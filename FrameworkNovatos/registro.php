<?php include("includes/a-config.php"); ?>
<!DOCTYPE html>
<html>

<head>
    <?php include("includes/head-tag-contents.php"); ?>
</head>

<body>
    <?php include("includes/navigation.php"); ?>
    <main class="container-fluid m-0">
        <div class="row min-vh-100">

            <div class="container-fluid col-md-6 d-none d-md-block p-0">
                <div class="d-none bg-login rounded-3 rounded-start d-md-block"></div>
            </div>

            <div class="col-md-6 d-flex align-items-center justify-content-center my-5">
                <div class="login-container text-left">
                    <div class="logo-login">
                        <img class="rounded-4" src="/assets/img/logo-login.png" alt="Logo Óneo">
                    </div>
                    <div class="text-center">

                        <h2 class="fw-bold mt-2">REGISTRARSE</h2>
                        <p class="mt-3">Introduce tus datos para disfrutar de todas nuestras funciones.</p>
                    </div>
                    <form action="">
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombre" placeholder="Manuel">
                        </div>
                        <div class="mb-3">
                            <label for="apellidos" class="form-label">Apellidos</label>
                            <input type="text" class="form-control" id="apellidos" placeholder="Romero Reyes">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Correo Electrónico</label>
                            <input type="email" class="form-control" id="email" placeholder="fran@gmail.com">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" id="password" placeholder="********">
                        </div>
                        <div class="mb-3 row">
                            <div class="col-6">
                                <label for="telefono" class="form-label">Teléfono</label>
                                <input type="text" class="form-control" id="telefono" placeholder="000000000">
                            </div>
                            <div class="col-6">
                                <label for="dni" class="form-label">DNI</label>
                                <input type="text" class="form-control" id="dni" placeholder="12345678A">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="direccion" class="form-label">Dirección</label>
                            <input type="text" class="form-control" id="direccion" placeholder="Calle, número, ciudad">
                        </div>
                        <button type="submit" class="btn btn-comun w-100 mt-3">Registrarse</button>
                        <p class="mt-3">¿Ya tienes cuenta? <a href="login.php">Iniciar Sesión</a></p>

                    </form>
                </div>
            </div>
        </div>
    </main>
    <?php include("includes/footer.php"); ?>
</body>

</html>