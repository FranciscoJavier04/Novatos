<?php
require 'vendor/autoload.php';
include("includes/a-config.php"); ?>
<!DOCTYPE html>
<html>

<head>
    <?php include("includes/head-tag-contents.php"); ?>
</head>

<body class="body-carta align-items-center text-warning">
    <?php include("includes/navigation.php"); ?>

    <!-- MAIN -->
    <!--CF2: ¿Dónde está el container?-->
    <main class="main-carta">
        <div class="container">
            <div class="hero-logo-carta d-flex justify-content-center align-items-center mb-n3">
                <img src="assets/img/logo.png" class="logo-carta rounded-circle ">
            </div>


            <!-- CARTA -->
            <div class="mx-auto my-5 overflow-hidden carta-res w-70 bg-info rounded-3 ">
                <div class="menu-section-carta">
                    <h1 class="text-center h1-Pol title-carta fw-bold">CARTA</h1>


                    <!-- ENTRANTES -->
                    <div class="gap-2 mt-5 mb-4 d-flex justify-content-center">
                        <img src="assets/img/carta/ENTRANTES.png" class="mt-5 imagen-tipo-plato">
                        <div class="h-auto mt-5 section-background-carta w-50"></div>
                    </div>

                    <h2 class="mt-5 mb-3 text-center subtitle-carta fw-bold fs-1">ENTRANTES</h2>
                    <div class="items-carta d-flex align-items-center flex-column">
                        <div class="item-carta fs-5">
                            <span class="item-titulo">- Jamón Ibérico de Bellota. . . . . . . . . . . . . . . . . . . .
                                . .
                                . . . . . . . . . . . . . 35€ </span>
                            <p class="description-carta">Cortado a mano, acompañado de pan con tomate.</p>
                        </div>
                        <div class="item-carta fs-5">
                            <span class="item-titulo">- Tartar de Atún Rojo del Mediterráneo. . . . . . . . . . . . . .
                                . .
                                . . . . . . . . . 28€</span>
                            <p class="description-carta">Con aguacate, sésamo y emulsión de wasabi.</p>
                        </div>
                        <div class="item-carta fs-5">
                            <span class="item-titulo">- Carpaccio de Wagyu con Trufa Negra . . . . . . . . . . . . . . .
                                . .
                                . . . . . . . . 32€</span>
                            <p class="description-carta">Aliñado con aceite de oliva virgen extra y parmesano.</p>
                        </div>
                        <div class="item-carta fs-5">
                            <span class="item-titulo">- Vieiras a la Plancha . . . . . . . . . . . . . . . . . . . . . .
                                . .
                                . . . . . . . . . . . . . . . 30€</span>
                            <p class="description-carta">Con puré de coliflor, mantequilla noisette y caviar.</p>
                        </div>
                        <div class="item-carta fs-5">
                            <span class="item-titulo">- Foie Gras Mi-cuit . . . . . . . . . . . . . . . . . . . . . . .
                                . .
                                . . . . . . . . . . . . . . . . 29€</span>
                            <p class="description-carta">Servido con chutney de higos y brioche tostado.</p>
                        </div>
                        <div class="item-carta fs-5">
                            <span class="item-titulo">- Pulpo a la Brasa . . . . . . . . . . . . . . . . . . . . . . . .
                                . .
                                . . . . . . . . . . . . . . . . 27€</span>
                            <p class="description-carta">Con puré de patatas ahumadas y pimentón de la Vera.</p>
                        </div>
                        <div class="item-carta fs-5">
                            <span class="item-titulo">- Ceviche de Lubina y Maracuyá . . . . . . . . . . . . . . . . . .
                                . .
                                . . . . . . . . . . 26€</span>
                            <p class="description-carta">Con leche de tigre y maíz crujiente.</p>
                        </div>
                    </div>


                    <!-- PRINCIPALES -->
                    <div class="gap-2 mt-5 mb-4 d-flex justify-content-center">
                        <img src="assets/img/carta/Principal.png" class="mt-5 imagen-tipo-plato">
                        <div class="h-auto mt-5 section-background-carta w-50"></div>
                    </div>

                    <h2 class="mt-5 mb-3 text-center subtitle-carta fw-bold fs-1">PLATOS PRINCIPALES</h2>
                    <div class="items-carta d-flex align-items-center flex-column">
                        <div class="item-carta fs-5">
                            <span>- Cochinillo Asado a Baja Temperatura . . . . . . . . . . . . . . . . . . . . . . . .
                                .
                                45€</span>
                            <p class="description-carta">Con puré de boniato y jugo de su asado.</p>
                        </div>
                        <div class="item-carta fs-5">
                            <span>- Solomillo de Buey con Salsa de Oporto . . . . . . . . . . . . . . . . . . . . . . .
                                48€</span>
                            <p class="description-carta">Acompañado de papas gratinadas y espárragos verdes.</p>
                        </div>
                        <div class="item-carta fs-5">
                            <span>- Merluza a la Koskera . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . .
                                . .
                                . . . . 42€</span>
                            <p class="description-carta">Con almejas, espárragos y guisantes frescos.</p>
                        </div>
                        <div class="item-carta fs-5">
                            <span>- Arroz Negro con Calamar y Alioli de Ajo Negro . . . . . . . . . . . . . . . .
                                38€</span>
                            <p class="description-carta">Cremoso y con sabores profundos de tinta de calamar.</p>
                        </div>
                        <div class="item-carta fs-5">
                            <span>- Carrilleras de Ternera al Vino Tinto . . . . . . . . . . . . . . . . . . . . . . . .
                                . .
                                44€</span>
                            <p class="description-carta">Con parmentier de patata trufada.</p>
                        </div>
                        <div class="item-carta fs-5">
                            <span>- Ravioli de Bogavante . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . .
                                . .
                                . . . . 40€</span>
                            <p class="description-carta">Con bisque de marisco y chips de zanahoria.</p>
                        </div>
                    </div>

                    <!-- ESPECIALIDADES -->
                    <div class="gap-2 mt-5 mb-4 d-flex justify-content-center">
                        <img src="assets/img/carta/Especialidad.png" class="mt-5 imagen-tipo-plato">
                        <div class="h-auto mt-5 section-background-carta w-50"></div>
                    </div>

                    <h2 class="mt-5 mb-3 text-center subtitle-carta fw-bold fs-1">ESPECIALIDADES</h2>
                    <div class="items-carta d-flex align-items-center flex-column">
                        <div class="item-carta fs-5 ">
                            <span>- Paella de Mariscos Tradicional </span><span>. . . . . . . . . . . . . . . . . . . .
                                . .
                                . . . . . . . . 50€</span>
                            <p class="description-carta">Con gambas, mejillones, cigalas y azafrán.</p>
                        </div>
                        <div class="item-carta fs-5">
                            <span>- Lubina Salvaje al Horno . . . . . . . . . . . . . . . . . . . . . . . . . . . . . .
                                . .
                                . . .55€</span>
                            <p class="description-carta">Servida con hinojo asado y salsa de limón.</p>
                        </div>
                        <div class="item-carta fs-5">
                            <span>- Presa Ibérica con Glaseado de Miel y Mostaza . . . . . . . . . . . . . . . . . .
                                46€</span>
                            <p class="description-carta">Acompañada de puré de batata y espárragos.</p>
                        </div>
                        <div class="item-carta fs-5">
                            <span>- Cordero Lechal Confitado . . . . . . . . . . . . . . . . . . . . . . . . . . . . . .
                                . .
                                . . 52€</span>
                            <p class="description-carta">Con reducción de vino de Rioja y espinacas salteadas.</p>
                        </div>
                        <div class="item-carta fs-5">
                            <span>- Bacalao a la Brasa con Crema de Guisantes . . . . . . . . . . . . . . . . . . . .
                                47€</span>
                            <p class="description-carta">Con cebollas caramelizadas y un toque de jamón ibérico.</p>
                        </div>
                    </div>

                    <!-- POSTRES -->
                    <h2 class="mt-6 mb-3 text-center subtitle-carta-postre fw-bold fs-1">POSTRES</h2>
                    <div class="row">
                        <div class="flex-wrap gap-5 items-carta-postre d-flex justify-content-center">
                            <div class="item-carta-postre fs-6 d-flex flex-column">
                                <img src="assets/img/carta/tartaSantiago.png" class="img-postres w-100 h-100">
                                <p>Tarta de Santiago.</p>
                                <p>Con helado de vainilla y crema de almendras.</p>
                                <p>Precio . . . . . . . . . . . . . . . . . . . . . . . . . . . . 15 €</p>
                            </div>
                            <div class="item-carta-postre fs-6 d-flex flex-column">
                                <img src="assets/img/carta/Coulant.png" class="img-postres">
                                <p>Coulant de Chocolate Negro.</p>
                                <p>Con helado de frambuesa y crumble.</p>
                                <p>Precio . . . . . . . . . . . . . . . . . . . . . . . . . . . . 16 €</p>
                            </div>
                            <div class="item-carta-postre fs-6 d-flex flex-column">
                                <img src="assets/img/carta/CremaCatalana.png" class="img-postres">
                                <p>Crema Catalana con Toffee Salado.</p>
                                <p>Crujiente y suave a la vez.</p>
                                <p>Precio . . . . . . . . . . . . . . . . . . . . . . . . . . . . 14€</p>
                            </div>
                        </div>
                        <div class="my-5 row justify-content-center">
                            <div class="item-carta-postre fs-6 d-flex flex-column ">
                                <img src="assets/img/carta/Milhojas.png" class="img-postres">
                                <span>Milhojas de Crema de Mascarpone y Frutos Rojas.</span>
                                <p>Precio . . . . . . . . . . . . . . . . . . . . . . . . . . . . 14€</p>
                            </div>
                            <div class="item-carta-postre fs-6 d-flex flex-column">
                                <img src="assets/img/carta/Helado.png" class="img-postres">
                                <p>Helados Artesanales.</p>
                                <p>Variedad de sabores de temporada.</p>
                                <p>Precio . . . . . . . . . . . . . . . . . . . . . . . . . . . . 12€</p>
                            </div>
                        </div>

                        <!-- BEBIDAS -->
                        <h2 class="mt-6 mb-3 text-center subtitle-carta-bebidas fw-bold fs-1">BEBIDAS</h2>
                        <div class="items-carta d-flex align-items-center flex-column">
                            <div class="item-carta-bebida fs-5">
                                <span>Agua Mineral Premium . . . . . . . . . . . . . . . . . . . . . . . 6€</span>
                            </div>
                            <div class="item-carta-bebida fs-5">
                                <span>Refrescos . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . .
                                    6€</span>
                            </div>
                            <div class="item-carta-bebida fs-5">
                                <span>Cerveza Artesanal . . . . . . . . . . . . . . . . . . . . . . . . . . . 8€</span>
                            </div>
                            <div class="item-carta-bebida fs-5">
                                <span>Cerveza Internacional . . . . . . . . . . . . . . . . . . . . . . . . 7€</span>
                            </div>
                        </div>

                        <!-- VINOS BLANCOS -->
                        <h2 class="mt-5 mb-3 text-center subtitle-carta fw-bold fs-1">VINO BLANCO</h2>
                        <div class="items-carta d-flex align-items-center flex-column">
                            <div class="item-carta-bebida fs-5">
                                <span>Albariño Rías Baixas . . . . . . . . . . . . . . . . . . . . . . . . 24€</span>
                            </div>
                            <div class="item-carta-bebida fs-5">
                                <span>Chardonnay Penedés . . . . . . . . . . . . . . . . . . . . . . . . 28€</span>
                            </div>
                            <div class="item-carta-bebida fs-5">
                                <span>Verdejo Rueda . . . . . . . . . . . . . . . . . . . . . . . . . . . . . 22€</span>
                            </div>
                        </div>

                        <!-- VINOS TINTOS -->
                        <h2 class="mt-5 mb-3 text-center subtitle-carta fw-bold fs-1">VINO TINTO</h2>
                        <div class="items-carta d-flex align-items-center flex-column">
                            <div class="item-carta-bebida fs-5">
                                <span>Rioja Reserva . . . . . . . . . . . . . . . . . . . . . . . . . . . . . .
                                    30€</span>
                            </div>
                            <div class="item-carta-bebida fs-5">
                                <span>Ribera del Duero Crianza . . . . . . . . . . . . . . . . . . . . . 32€</span>
                            </div>
                            <div class="item-carta-bebida fs-5">
                                <span>Garnacha Priorat IV . . . . . . . . . . . . . . . . . . . . . . . . . 35€</span>
                            </div>
                        </div>

                        <!-- ALERGENOS -->
                        <h3 class="mb-3 text-center subtitle-carta-alergeno fw-bold fs-4 mt-7">ALÉRGENOS</h3>
                        <div class="items-carta d-flex align-items-center flex-column">
                            <p class="mb-5 alergeno-item-carta fs-6">Informamos a nuestros clientes que algunos de
                                nuestros
                                platos contienen alérgenos tales como gluten, mariscos, frutos secos, lácteos, y otros.
                                Por favor, consulte con nuestro personal antes de realizar su pedido, y asegurese si
                                tiene
                                alguna alergia o intolerancia.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php include("includes/footer.php"); ?>

</body>

</html>