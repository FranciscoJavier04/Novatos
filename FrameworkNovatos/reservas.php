<?php include("includes/a_config.php"); ?>
<!DOCTYPE html>
<html>

<head>
    <?php include("includes/head-tag-contents.php"); ?>
</head>

<body id="bodyReserva">
    <?php include("includes/navigation.php"); ?>
    <main class="align-items-center">
        <!-- Contenedor de las tarjetas en una fila -->
        <div class="container mt-3">
            <div class="row justify-content-center">
                <!-- Primera tarjeta -->
                <div class="col-md-4 mb-3 d-flex">
                    <div class="card" id="cardReserva">
                        <img class="card-img-top" src="assets/img/Logo.png" alt="terraza">
                        <div class="card-body text-center mt-3">
                            <h1 class="card-title" id="titulo">Terraza</h1>
                            <p class="card-text">Una terraza elegante al aire libre, decorada con mesas de comedor
                                adornadas
                                con flores coloridas y rodeadas de velas. La terraza tiene una vista espectacular del
                                océano y
                                las montañas al fondo, enmarcada por un cielo al atardecer. La ambientación es romántica
                                y
                                acogedora, con iluminación suave y detalles lujosos, ideal para una cena íntima en un
                                entorno
                                paradisíaco.</p>
                        </div>
                        <div class="d-flex justify-content-center mt-3"><a href="datosReserva.php"
                                class="btn btn-comun">RESERVAR</a></div>
                    </div>
                </div>

                <!-- Segunda tarjeta -->
                <div class="col-md-4 mb-3 d-flex">
                    <div class="card" id="cardReserva">
                        <img class="card-img-top" src="assets/img/Logo.png" alt="terraza">
                        <div class="card-body text-center mt-3">
                            <h1 class="card-title" id="titulo">Comedor</h1>
                            <p class="card-text">Un comedor lujoso con grandes candelabros de cristal que iluminan el
                                espacio.
                                El techo está decorado con detalles ornamentales y columnas doradas rodean el salón. Las
                                mesas
                                están dispuestas con manteles elegantes y flores, mientras los comensales disfrutan de
                                una cena
                                formal. La iluminación cálida y suave resalta la opulencia del lugar, creando una
                                atmósfera
                                sofisticada y exclusiva.</p>
                        </div>
                        <div class="d-flex justify-content-center mt-3"><a href="datosReserva.php"
                                class="btn btn-comun">RESERVAR</a></div>
                    </div>
                </div>

                <!-- Tercera tarjeta -->
                <div class="col-md-4 mb-3 d-flex">
                    <div class="card" id="cardReserva">
                        <img class="card-img-top" src="assets/img/Logo.png" alt="terraza">
                        <div class="card-body text-center mt-3">
                            <h1 class="card-title" id="titulo">Salón</h1>
                            <p class="card-text">Un lujoso salón comedor con una gran mesa de madera oscura, rodeada de
                                elegantes sillas acolchadas. El techo tiene detalles decorativos y están colgados varios
                                candelabros de cristal que iluminan el espacio. Grandes ventanales ofrecen una vista a
                                un jardín
                                bien cuidado, y las cortinas de tela gruesa añaden un toque sofisticado al ambiente
                                clásico y
                                opulento.</p>
                        </div>
                        <div class="d-flex justify-content-center mt-3"><a href="datosReserva.php"
                                class="btn btn-comun">RESERVAR</a></div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php include("includes/footer.php"); ?>
</body>

</html>