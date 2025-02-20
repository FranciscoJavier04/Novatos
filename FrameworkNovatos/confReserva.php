<?php
require 'vendor/autoload.php';
include("includes/a-config.php"); ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <?php include("includes/head-tag-contents.php"); ?>
</head>

<body id="bodyReserva">
    <?php include("includes/navigation.php"); ?>
    <!--CF2: ¿Dónde está el container?-->
    <main class="d-flex justify-content-center align-items-center my-3">
        <div class="card w-75 rounded-3 bg-light overflow-hidden fw-bold fst-italic" id="cardFormulario">
            <div class="card-body d-flex flex-column justify-content-between p-4">
                <section class="text-center">
                    <img src="/assets/img/LogoSinFondo.png" class="w-25" alt="">
                    <h1 class="card-title">Resumen de la Reserva</h1>
                </section>
                <hr class="my-4">

                <section class="container text-center">
                    <div class="row">
                        <div class="col-md">
                            <div class="mb-4">
                                <!--Nombre-->
                                <label for="nombreInput" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="nombreInput" value="Francisco" disabled>
                            </div>
                            <div class="mb-4">
                                <!--Apellidos-->
                                <label class="form-label" for="apellidosInput">Apellidos</label>
                                <input type="text" class="form-control" id="apellidosInput" value="Martin Corredera"
                                    disabled>
                            </div>
                            <div class="mb-4">
                                <!--Fecha Y Hora-->
                                <label class="form-label" for="fechaInput">Fecha Y Hora</label>
                                <input type="text" class="form-control" id="fechaInput" value="15/12/2024 - 2:00PM"
                                    disabled>
                            </div>
                            <div class="mb-4">
                                <!--Ubicación-->
                                <label class="form-label" for="ubicacionInput">Ubicación</label>
                                <input type="text" class="form-control" id="ubicacionInput" value="Ubicación" disabled>
                            </div>
                            <div class="mb-4">
                                <!--Número de Personas-->
                                <label class="form-label" for="numPersonas">Número de Personas</label>
                                <input type="number" id="numPersonas" class="form-control" min="1" max="20" value="10"
                                    disabled>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="mt-4">
                    <!-- Información adicional -->
                    <label for="areaInput" class="form-label">Información adicional que desee añadir</label>
                    <textarea id="areaInput" class="form-control" rows="4" placeholder="" disabled>
Quisiera solicitar, por favor, una mesa cercana al balcón, acompañada de una botella de vino colocada en la mesa al momento de nuestra llegada. Agradezco de antemano su atención y consideración.
                    </textarea>
                </section>

                <section class="d-flex flex-column align-items-center mt-3">
                    <a href="#" class="btn btn-comun mb-2 w-auto">EDITAR</a>
                    <a href="#" class="btn btn-secondary mb-2 w-auto">CONFIRMAR RESERVA</a>
                    <a href="#" class="btn btn-tertiary w-auto">CANCELAR RESERVA</a>
                </section>

            </div>
        </div>
    </main>
    <?php include("includes/footer.php"); ?>
</body>

</html>