<?php include("includes/a_config.php"); ?>
<!DOCTYPE html>
<html>

<head>
    <?php include("includes/head-tag-contents.php"); ?>
</head>

<body>
    <?php include("includes/navigation.php"); ?>
    <main class="container-fluid">
        <div class="container-fluid mt-5">
            <div class="col-12 row justify-content-md-start text-md-start justify-content-center">
                <div class="col-md-3 col-xl-2  text-center text-md-start">
                    <div class="profile-pic mb-3">
                        <img src="/assets/img/Logo.png" alt="Imagen Usuario" class="img-fluid">
                    </div>
                </div>
                <div class="col-md-7 m-1 order-1 order-md-0 justify-content-md-start justify-content-center d-flex ">
                    <button class="btn btn-comun mt-auto">Cargar Foto</button>
                </div>
                <div class="text-center order-0 order-md-1 text-md-start">
                    <h4>Manuel Romero</h4>
                    <p>Cliente</p>
                </div>
            </div>


            <!-- Sección de información -->
            <div class="row justify-content-center border my-3">
                <div class="col-md-12">
                <div class="separator-login"></div>
                    <form>
                        <h5>INFO</h5>

                        <div class="row">
                            <div class="col-md-4 row">
                                <div class="row-md-4">
                                    <label for="nombre" class="form-label">Nombre</label>
                                    <input type="text" class="form-control" id="nombre" value="Manuel">
                                </div>
                                <div class="row-md-4">
                                    <label for="apellidos" class="form-label">Apellidos</label>
                                    <input type="text" class="form-control" id="apellidos" value="Romero Reyes">
                                </div>
                                <div class="row-md-4">
                                    <label for="direccion" class="form-label">Dirección</label>
                                    <input type="text" class="form-control" id="direccion" value="C/ Correos nº8 2º">
                                </div>
                            </div>

                            <div class="col-md-4 row">
                                <div class="row-md-4">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" value="Fran@gmail.com">
                                </div>
                                <div class="row-md-4">
                                    <label for="contraseña" class="form-label">Contraseña</label>
                                    <input type="password" class="form-control" id="contraseña" value="********">
                                </div>
                                <div class="row-md-4">
                                    <label for="telefono" class="form-label">Teléfono</label>
                                    <input type="tel" class="form-control" id="telefono" value="665588377">
                                </div>
                            </div>

                            <div class="col-md-4 row">
                                <div class="row-md-4">
                                    <label for="dni" class="form-label">DNI</label>
                                    <input type="text" class="form-control" id="dni" value="51188977F">
                                </div>
                                <div class="row-md-8">
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
        </div>
    </main>

    <?php include("includes/footer.php"); ?>
</body>

</html>