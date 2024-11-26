<?php include("includes/a-config.php"); ?>
<!DOCTYPE html>
<html>

<head>
    <?php include("includes/head-tag-contents.php"); ?>
</head>

<body id="bodyReserva">
    <?php include("includes/navigation.php"); ?>
    <main class="d-flex justify-content-center align-items-center my-3">
        <div class="card" id="cardFormulario">
            <div class="card-body d-flex flex-column justify-content-between p-4">
                <div class="text-center">
                    <img src="/assets/img/LogoSinFondo.png">
                    <h1 class="card-title">Resumen de la Reserva</h1>
                </div>
                <hr class="my-4">

                <div class="container text-center">
                    <div class="row">
                        <div class="col-md">
                            <div class="mb-4">
                                <!--Nombre-->
                                <label class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="nombreInput" value="Francisco" disabled>
                            </div>
                            <div class="mb-4">
                                <!--Apellidos-->
                                <label class="form-label">Apellidos</label>
                                <input type="text" class="form-control" id="apellidosInput" value="Martin Corredera"
                                    disabled>
                            </div>
                            <div class="mb-4">
                                <!--Fecha Y Hora-->
                                <label class="form-label">Fecha Y Hora</label>
                                <input type="text" class="form-control" id="telefonoInput" value="15/12/2024 - 2:00PM"
                                    disabled>
                            </div>
                            <div class="mb-4">
                                <!--Ubicación-->
                                <label class="form-label">Ubicación</label>
                                <input type="text" class="form-control" id="nombreInput" value="Ubicación" disabled>
                            </div>
                            <div class="mb-4">
                                <!--Nombre-->
                                <label class="form-label">Número de Personas</label>
                                <input type="number" id="numPersonas" class="form-control" min="1" max="20" value="10"
                                    disabled>
                            </div>


                        </div>
                    </div>
                    <!-- Información adicional -->
                    <div class="mt-4">
                        <label for="areaInput" class="form-label">Información adicional que desee añadir</label>
                        <textarea id="areaInput" class="form-control" rows="4" placeholder="" disabled>
Quisiera solicitar, por favor, una mesa cercana al balcón, acompañada de una botella de vino colocada en la mesa al momento de nuestra llegada. Agradezco de antemano su atención y consideración.
                        </textarea>
                    </div>

                </div>

                <!-- Botón Siguiente -->
                <div class="d-flex justify-content-center mt-3">
                    <a href="#" class="btn btn-comun">EDITAR</a>
                </div>
                <div class="d-flex justify-content-center mt-3">
                    <a href="#" class="btn btn-secondary">CONFIRMAR RESERVA</a>
                </div>
                <div class="d-flex justify-content-center mt-3">
                    <a href="#" class="btn btn-tertiary">CANCELAR RESERVA</a>
                </div>

            </div>
        </div>
    </main>
    <?php include("includes/footer.php"); ?>
</body>

</html>