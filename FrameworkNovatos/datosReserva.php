<?php
require 'vendor/autoload.php';
include("includes/a-config.php");

if (!isset($_SESSION['user'])) {
    header('location: login.php?error=321');
}
?>
<!DOCTYPE html>
<html>

<head>
    <?php include("includes/head-tag-contents.php"); ?>
</head>

<body id="bodyReserva">
    <?php include("includes/navigation.php"); ?>
    <!--CF2: ¿Dónde está el container-->
    <main class="my-3 d-flex justify-content-center align-items-center">
        <div class="overflow-hidden card w-75 rounded-3 bg-light fw-bold fst-italic" id="cardFormulario">
            <div class="p-4 card-body d-flex flex-column justify-content-between">
                <div class="text-center">
                    <h1 class="card-title">DATOS DE LA RESERVA</h1>
                </div>
                <hr class="my-4">

                <!-- Selección de Fecha, Hora y Número de Personas -->
                <section class="container">
                    <div class="row">
                        <div class="text-center col-md align-items-center">
                            <h2>Elige tu día</h2>
                            <img src="/assets/img/LogoSinFondo.png" class="mt-4 w-25">
                        </div>
                        <div class="col-md">
                            <!-- Selección de Fecha -->
                            <div class="mb-4">
                                <label for="dateInput" class="form-label">Selecciona una fecha</label>
                                <input type="date" class="form-control custom-date-input" id="dateInput">
                            </div>
                            <!-- Selección de Hora -->
                            <div class="mb-4">
                                <label for="timeSelect" class="form-label">Hora</label>
                                <select id="timeSelect" class="form-select">
                                    <option selected>Selecciona una hora</option>
                                    <option value="12:00">12:00 PM</option>
                                    <option value="13:00">01:00 PM</option>
                                    <option value="14:00">02:00 PM</option>
                                    <option value="15:00">03:00 PM</option>
                                    <option value="20:00">08:00 PM</option>
                                    <option value="21:00">09:00 PM</option>
                                    <option value="22:00">10:00 PM</option>
                                    <option value="23:00">11:00 PM</option>
                                </select>
                            </div>
                            <!-- Selección de Número de Personas -->
                            <div>
                                <label for="numPersonas" class="form-label">Número de personas</label>
                                <input type="number" id="numPersonas" class="form-control" min="1" max="20"
                                    placeholder="Número de personas">
                            </div>
                            <div>
                                <label for="numPersonas" class="form-label">Diseña tu sala</label>
                                <a href="mapaInteractivo.php" class="btn btn-comun">Sala</a>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Información adicional -->
                <section class="mt-4">
                    <label for="areaInput" class="form-label">Información adicional que desee añadir</label>
                    <textarea id="areaInput" class="form-control" rows="4" placeholder="Escribe aquí..."></textarea>
                </section>

                <!-- Botón Siguiente -->
                <div class="mt-3 d-flex justify-content-center">
                    <a href="confReserva.php" class="btn btn-comun">SIGUIENTE</a>
                </div>
            </div>
        </div>
    </main>
    <?php include("includes/footer.php"); ?>
</body>

</html>