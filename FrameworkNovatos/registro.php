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
                <div class="d-none bg-login h-100 rounded-3 rounded-start d-md-block"></div>
            </div>

            <div class="col-md-6 d-flex align-items-center justify-content-center my-5">
                <div class="login-container text-left">
                    <div class="mt-4">
                        <img class="rounded-4 w-100" src="/assets/img/logo-login.png" alt="Logo Óneo">
                    </div>
                    <div class="text-center">

                        <h2 class="fw-bold mt-2">REGISTRARSE</h2>
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
                            }
                        }
                        ?>
                    </div>
                    <form method="POST" action="controllers/registrarse.php">
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Manuel">
                        </div>
                        <div class="mb-3">
                            <label for="apellidos" class="form-label">Apellidos</label>
                            <input type="text" class="form-control" name="apellidos" id="apellidos"
                                placeholder="Romero Reyes">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Correo Electrónico</label>
                            <input type="email" class="form-control" name="email" id="email"
                                placeholder="fran@gmail.com">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" name="password" id="password"
                                placeholder="********">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Confirmar Contraseña</label>
                            <input type="password" class="form-control" name="conf_password" id="conf_password"
                                placeholder="********">
                        </div>
                        <div class="mb-3 row">
                            <div class="col-6">
                                <label for="telefono" class="form-label">Teléfono</label>
                                <input type="text" class="form-control" name="telefono" id="telefono"
                                    placeholder="000000000">
                            </div>
                            <div class="col-6">
                                <label for="fecha_nac" class="form-label">Fecha Nacimiento</label>
                                <input type="date" class="form-control" name="fecha_nac" id="fecha_nac">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-6">
                                <label for="pais" class="form-label">Pais</label>
                                <input type="text" class="form-control" name="pais" id="pais" placeholder="España">
                            </div>
                            <div class="col-6">
                                <label for="cod_postal" class="form-label">Código Postal</label>
                                <input type="text" class="form-control" name="cod_postal" id="cod_postal"
                                    placeholder="14900">
                            </div>
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