<?php
require 'vendor/autoload.php';
include("includes/a-config.php");
if ($_SESSION['user'] == null) {
    header('location: login.php');
}

?>
<!DOCTYPE html>
<html>

<head>
    <?php include("includes/head-tag-contents.php"); ?>
</head>

<body>
    <?php include("includes/navigation.php"); ?>
    <main class="container-fluid p-0">
        <header>
            <div class="container-fluid mt-2">
                <div class="d-flex justify-content-center align-items-center">
                    <div class="col-md-12 col-8 row">
                        <div class="col-md-2 text-center text-md-start">
                            <div class="profile-pic">
                                <img src="/assets/img/Logo.png" alt="Imagen Usuario" class="w-100 rounded-circle">
                                <div class="text-center text-md-start">
                                    <p class="fs-2 fw-bold my-0">
                                        <?php
                                        echo $_SESSION['user']->getNombre() . ' ' . $_SESSION['user']->getApellidos();
                                        print_r($_SESSION['user']);

                                        ?>
                                    </p>
                                    <p class="fs-4 fw-bold fst-italic opacity-75">
                                        <?php
                                        if ($_SESSION['user']->getRol() == 'user') {
                                            echo "Cliente";
                                        } else
                                            echo "Administrador";
                                        ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7 justify-content-md-start justify-content-center d-flex ">
                            <button class="btn btn-comun my-auto px-5">Cargar Foto</button>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <section>
            <!-- Sección de información -->
            <div class="row justify-content-center border border-dark mx-md-1 my-3">
                <div class="col-md-12 ">

                    <form>
                        <h5>INFO</h5>
                        <div class="separador-user mb-3"></div>
                        <div class="row">
                            <div class="col-md-4 ">
                                <div class="row-md-4">
                                    <label for="nombre" class="form-label">Nombre</label>
                                    <input type="text" class="form-control" id="nombre"
                                        value="<?php echo $_SESSION['user']->getNombre(); ?>">
                                </div>
                                <div class="row-md-4">
                                    <label for="apellidos" class="form-label">Apellidos</label>
                                    <input type="text" class="form-control" id="apellidos"
                                        value="<?php echo $_SESSION['user']->getApellidos(); ?>">
                                </div>
                                <div class="row-md-4">
                                    <label for="direccion" class="form-label">Fecha nacimiento</label>
                                    <input type="date" class="form-control" id="direccion"
                                        value="<?php echo $_SESSION['user']->getFechaNac(); ?>">
                                </div>
                            </div>

                            <div class="col-md-4 ">
                                <div class="row-md-4">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email"
                                        value="<?php echo $_SESSION['user']->getEmail(); ?>">
                                </div>
                                <div class="row-md-4">
                                    <div>
                                        <label for="pais" class="form-label">Pais</label>
                                        <input type="text" class="form-control" id="pais"
                                            value="<?php echo $_SESSION['user']->getPais(); ?>">
                                    </div>
                                    <div>
                                        <label for="codPostal" class="form-label">Codigo Postal</label>
                                        <input type="text" class="form-control" id="codPostal"
                                            value="<?php echo $_SESSION['user']->getCodPostal(); ?>">
                                    </div>

                                </div>
                                <div class="row-md-4">
                                    <label for="telefono" class="form-label">Teléfono</label>
                                    <input type="tel" class="form-control" id="telefono"
                                        value="<?php echo $_SESSION['user']->getTelefono(); ?>">
                                </div>
                            </div>

                            <div class="col-md-4 ">
                                <div class="row-md-12">
                                    <label for="sobre-mi" class="form-label">Sobre Mí</label>
                                    <textarea class="form-control" id="sobre-mi"
                                        rows="3">Me gusta que los comercios se sepan mi nombre y se dirijan a mí con el para un mejor trato.</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="text-end my-3">
                            <button type="submit" class="btn btn-comun">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </main>
    <?php include("includes/footer.php"); ?>
</body>

</html>