<?php include("includes/a_config.php"); ?>
<!DOCTYPE html>
<html>

<head>
    <?php include("includes/head-tag-contents.php"); ?>
</head>

<body id="bodyDReserva">
    <?php include("includes/navigation.php"); ?>
    <main class="align-items-center">
        <div class="container text-center">
            <div class="row">
                <div class="col-12">
                    <h1>DATOS DE LA RESERVA</h1>
                </div>
            </div>
            <!-- Selección de Fecha -->
            <div class="row">
                <div class="col align-items-center">
                    <h2>Elige tu día</h2>
                    <img src="/assets/img/LogoSinFondo.png" style="filter: brightness(0.3);">
                </div>
                <div class="col">
                    <div class="container mt-5">
                        <div class="mb-3">
                            <h2 for="dateInput" class="form-label">Selecciona una fecha</h2>
                            <input type="date" class="form-control custom-date-input" id="dateInput">
                        </div>
                    </div>
                    <div class="container">
                <div class="row mt-3">
                    <div class="col">
                        <div class="mb-3">
                            <h2 for="timeSelect" class="form-label">Hora</h2>
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
                    </div>
                </div>
                <!-- Selección de Número de Personas -->
                <div class="row mt-3">
                    <div class="col">
                        <div class="mb-3">
                            <h2 for="numPersonas" class="form-label">Número de personas</h2>
                            <input type="number" id="numPersonas" class="form-control" min="1" max="20"
                                placeholder="Número de personas">
                        </div>
                    </div>
                </div>
            </div>
                </div>
            </div>
            
            <!-- Información adicional -->
            <div class="row mt-3">
                <div class="col-12 align-items-center">
                    <h2>Información adicional que desee añadir</h2>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12 align-items-center">
                    <h2>PanelInfo</h2>
                </div>
            </div>
            <div class="d-flex justify-content-center mt-3">
                <a href="confirmaReserva.php" class="btn btn-comun">SIGUIENTE</a>
            </div>
        </div>
    </main>
    <?php include("includes/footer.php"); ?>
</body>

</html>