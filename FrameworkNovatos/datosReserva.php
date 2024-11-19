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
            <div class="row">
                <div class="col-6 align-items-center">
                    <h2>Elige tu dia</h2>
                    <img src="/assets/img/LogoSinFondo.png" style="filter: brightness(0.3);">
                </div>
                <div class="col-6">
                </div>
            </div>
            <div class="row">
                <div class="col-6 align-items-center">
                    <h2>Selecciona la hora de la reserva</h2>
                </div>
                <div class="col-6">
                    <p>Hora</p>
                </div>
            </div>
            <div class="row">
                <div class="col-6 align-items-center">
                    <h2>¿Cuántas personas acudirán?</h2>
                </div>
                <div class="col-6">
                    <p>NPersonas</p>
                </div>
            </div>
            <div class="row">
                <div class="col-12 align-items-center">
                    <h2>Información adicional que desee añadir</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-12 align-items-center">
                    <h2>PanelInfo</h2>
                </div>
            </div>
            <div class="d-flex justify-content-center mt-3"><a href="confirmaReserva.php"
                    class="btn btn-comun">SIGUIENTE</a>
            </div>
        </div>
    </main>
    <?php include("includes/footer.php"); ?>
</body>

</html>