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
            <div class="row justify-content-start">
                <div class="col-md-2 text-start">
                    <div class="profile-pic mb-3">
                        <img src="/assets/img/Logo.png" alt="Imagen Usuario">
                    </div>
                    <h4>Manuel Romero</h4>
                    <p class="text-muted">Cliente</p>
                </div>
                <div class="col-md-6">
                    <button class="btn btn-comun px-4">Cargar Foto</button>
                </div>
            </div>

            <!-- Sección de información -->
            <div class="row justify-content-center info-section">
                <div class="col-md-10">
                    
                    <form class="my-3">
                    <h5>INFO</h5>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="nombre" value="Manuel">
                            </div>
                            <div class="col-md-6">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" value="Fran@gmail.com">
                            </div>
                            <div class="col-md-6">
                                <label for="apellidos" class="form-label">Apellidos</label>
                                <input type="text" class="form-control" id="apellidos" value="Romero Reyes">
                            </div>
                            <div class="col-md-6">
                                <label for="contraseña" class="form-label">Contraseña</label>
                                <input type="password" class="form-control" id="contraseña" value="********">
                            </div>
                            <div class="col-md-6">
                                <label for="direccion" class="form-label">Dirección</label>
                                <input type="text" class="form-control" id="direccion" value="C/ Correos nº8 2º">
                            </div>
                            <div class="col-md-6">
                                <label for="telefono" class="form-label">Teléfono</label>
                                <input type="tel" class="form-control" id="telefono" value="665588377">
                            </div>
                            <div class="col-md-6">
                                <label for="dni" class="form-label">DNI</label>
                                <input type="text" class="form-control" id="dni" value="51188977F">
                            </div>
                            <div class="col-md-6">
                                <label for="sobre-mi" class="form-label">Sobre Mí</label>
                                <textarea class="form-control" id="sobre-mi"
                                    rows="3">Me gusta que los comercios se sepan mi nombre y se dirijan a mí con el para un mejor trato.</textarea>
                            </div>
                        </div>
                        <div class="text-end mt-4">
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