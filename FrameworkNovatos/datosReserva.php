<?php include("includes/a_config.php"); ?>
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
                    <h1 class="card-title">DATOS DE LA RESERVA</h1>
                </div>
                <hr class="my-4">
                <!-- Selección de Fecha -->

                <div class="row">
                    <div class="col-md align-items-center text-center">
                        <h2>Elige tu día</h2>
                        <img src="/assets/img/LogoSinFondo.png">
                    </div>
                    <div class="col-md">
                        <div class="mb-4">
                            <label for="dateInput" class="form-label">Selecciona una fecha</label>
                            <input type="date" class="form-control custom-date-input" id="dateInput">
                        </div>
                        <!-- Selección de hora -->
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
                    </div>
                </div>
                <!-- Información adicional -->
                <div class="mt-4">
                    <label for="areaInput" class="form-label">Información adicional que desee añadir</label>
                    <textarea id="areaInput" class="form-control" rows="4" placeholder="Escribe aquí..."></textarea>
                </div>
                <!-- Botón Siguiente -->
                <div class="d-flex justify-content-center mt-3">
                    <a href="confReserva.php" class="btn btn-comun">RESERVAR</a>
                </div>

            </div>
        </div>
    </main>
    <?php include("includes/footer.php"); ?>
</body>

</html>