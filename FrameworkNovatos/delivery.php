<?php include("includes/a-config.php"); ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <?php include("includes/head-tag-contents.php"); ?>
</head>

<body class="body-del align-items-center text-warning ">

    <?php include("includes/navigation.php"); ?>
    <div class="container-del p-4 d-flex mb-4">
        <div class="row">
            <!-- Sidebar de Categorías -->
            <div class="sidebar-del col-md-3 bg-warning p-3 rounded-3 text-dark d-md-block d-none">
                <h1 class="titulo-sidebar text-center mb-4">Categorías</h1>
                <nav class="nav flex-column align-items-center">
                    <a class="menu-item-del fs-5 text-dark mb-4 rounded-3" href="#entrantes">Entrantes</a>
                    <a class="menu-item-del fs-5 text-dark mb-4 rounded-3" href="#principales">Principales</a>
                    <a class="menu-item-del fs-5 text-dark mb-4 rounded-3" href="#especialidades">Especialidades</a>
                    <a class="menu-item-del fs-5 text-dark" href="#postres">Postres</a>
                </nav>
            </div>

            <!-- Contenido Principal -->
            <div class="carta-del col-md-9 text-justify bg-info w-5 mx-auto rounded-3 text-paragraph p-3">
                <!-- ENTRANTES -->
                <h1 class="subtitulo-carta text-center mb-5" id="entrantes" >Entrantes</h1>
                <div class="row">
                    <div class="row align-items-start mb-4 ms-3 ">
                        <div class="col-md-4">
                            <img src="assets/img/carta/ENTRANTES.webp">
                        </div>
                        <div class="col-md-6 fs-5">
                            <span class="fw-bold">Jamón Ibérico de Bellota. 35€</span>
                            <p>Cortado a mano, acompañado de pan con tomate.</p>
                        </div>
                        <div class="col-md-2">
                            <a href="carrito.php" class="btn btn-del ">AÑADIR</a>
                        </div>
                    </div>

                    <div class="row align-items-start mb-4 ms-3">
                        <div class="col-md-4">
                            <img src="assets/img/carta/Tartar.png">
                        </div>
                        <div class="col-md-6 fs-5">
                            <span class="fw-bold">Tartar de Atún Rojo del Mediterráneo. 28€</span>
                            <p>Con aguacate, sésamo y emulsión de wasabi.</p>
                        </div>
                        <div class="col-md-2 ml-md-3">
                            <a href="carrito.php" class="btn btn-del">AÑADIR</a>
                        </div>
                    </div>

                    <div class="row align-items-start mb-4 ms-3">
                        <div class="col-md-4">
                            <img src="assets/img/carta/Carpaccio.png" alt="Carpaccio de Wagyu">
                        </div>
                        <div class="col-md-6 fs-5">
                            <span class="fw-bold">Carpaccio de Wagyu con Trufa Negra. 32€</span>
                            <p>Aliñado con aceite de oliva virgen extra y parmesano.</p>
                        </div>
                        <div class="col-md-2">
                            <a href="carrito.php" class="btn btn-del">AÑADIR</a>
                        </div>
                    </div>

                    <div class="row align-items-start mb-4 ms-3">
                        <div class="col-md-4">
                            <img src="assets/img/carta/Vieiras.png" alt="Vieiras a la Plancha">
                        </div>
                        <div class="col-md-6 fs-5">
                            <span class="fw-bold">Vieiras a la Plancha. 29€</span>
                            <p>Con puré de coliflor, mantequilla noisette y caviar.</p>
                        </div>
                        <div class="col-md-2">
                            <a href="carrito.php" class="btn btn-del">AÑADIR</a>
                        </div>
                    </div>

                    <div class="row align-items-start mb-4 ms-3">
                        <div class="col-md-4">
                            <img src="assets/img/carta/Foie.png" alt="Foie Gras Mi-cuit">
                        </div>
                        <div class="col-md-6 fs-5">
                            <span class="fw-bold">Foie Gras Mi-cuit. 29€</span>
                            <p>Servido con chutney de higos y brioche tostado.</p>
                        </div>
                        <div class="col-md-2">
                            <a href="carrito.php" class="btn btn-del">AÑADIR</a>
                        </div>
                    </div>

                    <div class="row align-items-start mb-4 ms-3">
                        <div class="col-md-4">
                            <img src="assets/img/carta/Pulpo.png" alt="Pulpo a la Brasa">
                        </div>
                        <div class="col-md-6 fs-5">
                            <span class="fw-bold">Pulpo a la Brasa. 27€</span>
                            <p>Con puré de patatas ahumadas y pimentón de la Vera.</p>
                        </div>
                        <div class="col-md-2">
                            <a href="carrito.php" class="btn btn-del">AÑADIR</a>
                        </div>
                    </div>

                    <div class="row align-items-start mb-4 ms-3">
                        <div class="col-md-4">
                            <img src="assets/img/carta/Ceviche.webp" alt="Ceviche de Lubina y Maracuyá">
                        </div>
                        <div class="col-md-6 fs-5">
                            <span class="fw-bold">Ceviche de Lubina y Maracuyá. 26€</span>
                            <p>Con leche de tigre y maíz crujiente.</p>
                        </div>
                        <div class="col-md-2">
                            <a href="carrito.php" class="btn btn-del">AÑADIR</a>
                        </div>
                    </div>
                </div>

                <!-- PRINCIPALES -->
                <h1 class="subtitulo-carta mt-5 text-center mb-5" id="principales">Principales</h1>
                <div class="row">

                    <div class="row align-items-start mb-4 ms-3">
                        <div class="col-md-4">
                            <img src="assets/img/carta/ESPECIALIDAD.webp" alt="Cochinillo Asado">
                        </div>
                        <div class="col-md-6 fs-5">
                            <span class="fw-bold">Cochinillo Asado a Baja Temperatura. 45€</span>
                            <p>Con puré de boniato y jugo de su asado.</p>
                        </div>
                        <div class="col-md-2">
                            <a href="carrito.php" class="btn btn-del">AÑADIR</a>
                        </div>
                    </div>

                    <div class="row align-items-start mb-4 ms-3">
                        <div class="col-md-4">
                            <img src="assets/img/carta/Solomillo.webp" alt="Solomillo de Buey">
                        </div>
                        <div class="col-md-6 fs-5">
                            <span class="fw-bold">Solomillo de Buey con Salsa de Oporto. 48€</span>
                            <p>Acompañado de papas gratinadas y espárragos verdes.</p>
                        </div>
                        <div class="col-md-2">
                            <a href="carrito.php" class="btn btn-del">AÑADIR</a>
                        </div>
                    </div>

                    <div class="row align-items-start mb-4 ms-3">
                        <div class="col-md-4">
                            <img src="assets/img/carta/Merluza.webp" alt="Merluza a la Koskera">
                        </div>
                        <div class="col-md-6 fs-5">
                            <span class="fw-bold">Merluza a la Koskera. 42€</span>
                            <p>Con almejas, espárragos y guisantes frescos.</p>
                        </div>
                        <div class="col-md-2">
                            <a href="carrito.php" class="btn btn-del">AÑADIR</a>
                        </div>
                    </div>

                    <div class="row align-items-start mb-4 ms-3">
                        <div class="col-md-4">
                            <img src="assets/img/carta/arroz.webp" alt="Arroz Negro">
                        </div>
                        <div class="col-md-6 fs-5">
                            <span class="fw-bold">Arroz Negro con Calamar y Alioli de Ajo Negro. 38€</span>
                            <p>Cremoso y con sabores profundos de tinta de calamar.</p>
                        </div>
                        <div class="col-md-2">
                            <a href="carrito.php" class="btn btn-del">AÑADIR</a>
                        </div>
                    </div>

                    <div class="row align-items-start mb-4 ms-3">
                        <div class="col-md-4">
                            <img src="assets/img/carta/Carrillera.webp" alt="Carrilleras de Ternera">
                        </div>
                        <div class="col-md-6 fs-5">
                            <span class="fw-bold">Carrilleras de Ternera al Vino Tinto. 44€</span>
                            <p>Con parmentier de patata trufada.</p>
                        </div>
                        <div class="col-md-2">
                            <a href="carrito.php" class="btn btn-del">AÑADIR</a>
                        </div>
                    </div>

                    <div class="row align-items-start mb-4 ms-3">
                        <div class="col-md-4">
                            <img src="assets/img/carta/Ravioli.webp" alt="Ravioli de Bogavante">
                        </div>
                        <div class="col-md-6 fs-5">
                            <span class="fw-bold">Ravioli de Bogavante. 40€</span>
                            <p>Con bisque de marisco y chips de zanahoria.</p>
                        </div>
                        <div class="col-md-2">
                            <a href="carrito.php" class="btn btn-del">AÑADIR</a>
                        </div>
                    </div>
                </div>

                <!-- ESPECIALIDADES -->
                <h1 class="subtitulo-carta mt-5 text-center mb-5" id="especialidades">Especialidades</h1>
                <div class="row">
                    <div class="row align-items-start mb-4 ms-3">
                        <div class="col-md-4">
                            <img src="assets/img/carta/Principal.webp" alt="Paella de Mariscos Tradicional">
                        </div>
                        <div class="col-md-6 fs-5">
                            <span class="fw-bold">Paella de Mariscos Tradicional. 50€</span>
                            <p>Con gambas, mejillones, cigalas y azafrán.</p>
                        </div>
                        <div class="col-md-2">
                            <a href="carrito.php" class="btn btn-del">AÑADIR</a>
                        </div>
                    </div>

                    <div class="row align-items-start mb-4 ms-3">
                        <div class="col-md-4">
                            <img src="assets/img/carta/Lubina.webp" alt="Lubina Salvaje al Horno">
                        </div>
                        <div class="col-md-6 fs-5">
                            <span class="fw-bold">Lubina Salvaje al Horno. 55€</span>
                            <p>Servida con hinojo asado y salsa de limón.</p>
                        </div>
                        <div class="col-md-2">
                            <a href="carrito.php" class="btn btn-del">AÑADIR</a>
                        </div>
                    </div>

                    <div class="row align-items-start mb-4 ms-3">
                        <div class="col-md-4">
                            <img src="assets/img/carta/Presa.webp" alt="Presa Ibérica con Glaseado de Miel y Mostaza">
                        </div>
                        <div class="col-md-6 fs-5">
                            <span class="fw-bold">Presa Ibérica con Glaseado de Miel y Mostaza. 46€</span>
                            <p>Acompañada de puré de batata y espárragos.</p>
                        </div>
                        <div class="col-md-2">
                            <a href="carrito.php" class="btn btn-del">AÑADIR</a>
                        </div>
                    </div>

                    <div class="row align-items-start mb-4 ms-3">
                        <div class="col-md-4">
                            <img src="assets/img/carta/Cordero.webp" alt="Cordero Lechal Confitado">
                        </div>
                        <div class="col-md-6 fs-5">
                            <span class="fw-bold">Cordero Lechal Confitado. 52€</span>
                            <p>Con reducción de vino de Rioja y espinacas salteadas.</p>
                        </div>
                        <div class="col-md-2">
                            <a href="carrito.php" class="btn btn-del">AÑADIR</a>
                        </div>
                    </div>

                    <div class="row align-items-start mb-4 ms-3">
                        <div class="col-md-4">
                            <img src="assets/img/carta/Bacalao.webp" alt="Bacalao a la Brasa con Crema de Guisantes">
                        </div>
                        <div class="col-md-6 fs-5">
                            <span class="fw-bold">Bacalao a la Brasa con Crema de Guisantes. 47€</span>
                            <p>Con cebollas caramelizadas y un toque de jamón ibérico.</p>
                        </div>
                        <div class="col-md-2">
                            <a href="carrito.php" class="btn btn-del">AÑADIR</a>
                        </div>
                    </div>
                </div>

                <!-- POSTRES -->
                <h1 class="subtitulo-carta mt-5 text-center mb-5" id="postres">Postres</h1>
                <div class="row">
                    <div class="row align-items-start mb-4 ms-3">
                        <div class="col-md-4">
                            <img src="assets/img/carta/tartaSantiago.webp" alt="Paella de Mariscos Tradicional">
                        </div>
                        <div class="col-md-6 fs-5">
                            <span class="fw-bold">Tarta de Santiago. 15€</span>
                            <p>Con helado de vainilla y crema de almendras.</p>
                        </div>
                        <div class="col-md-2">
                            <a href="carrito.php" class="btn btn-del">AÑADIR</a>
                        </div>
                    </div>

                    <div class="row align-items-start mb-4 ms-3">
                        <div class="col-md-4">
                            <img src="assets/img/carta/Coulant.webp" alt="Lubina Salvaje al Horno">
                        </div>
                        <div class="col-md-6 fs-5">
                            <span class="fw-bold">Coulant de Chocolate Negro. 16€</span>
                            <p>Con helado de frambuesa y crumble de avellanas.</p>
                        </div>
                        <div class="col-md-2">
                            <a href="carrito.php" class="btn btn-del">AÑADIR</a>
                        </div>
                    </div>

                    <div class="row align-items-start mb-4 ms-3">
                        <div class="col-md-4">
                            <img src="assets/img/carta/CremaCatalana.webp" alt="Presa Ibérica con Glaseado de Miel y Mostaza">
                        </div>
                        <div class="col-md-6 fs-5">
                            <span class="fw-bold">Crema Catalana con Toffee Salado. 14€</span>
                            <p>Crujiente y suave a la vez.</p>
                        </div>
                        <div class="col-md-2">
                            <a href="carrito.php" class="btn btn-del">AÑADIR</a>
                        </div>
                    </div>

                    <div class="row align-items-start mb-4 ms-3">
                        <div class="col-md-4">
                            <img src="assets/img/carta/Milhojas.webp" alt="Cordero Lechal Confitado">
                        </div>
                        <div class="col-md-6 fs-5">
                            <span class="fw-bold">Milhojas de Crema de Mascarpone. 14€</span>
                            <p>Con Frutos Rojos.</p>
                        </div>
                        <div class="col-md-2">
                            <a href="carrito.php" class="btn btn-del">AÑADIR</a>
                        </div>
                    </div>

                    <div class="row align-items-start mb-4 ms-3">
                        <div class="col-md-4">
                            <img src="assets/img/carta/Helado.webp" alt="Bacalao a la Brasa con Crema de Guisantes">
                        </div>
                        <div class="col-md-6 fs-5">
                            <span class="fw-bold">Helados Artesanales. 12€</span>
                            <p>Variedad de sabores de temporada.</p>
                        </div>
                        <div class="col-md-2">
                            <a href="carrito.php" class="btn btn-del">AÑADIR</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include("includes/footer.php"); ?>
</body>
</html>
