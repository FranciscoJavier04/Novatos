<?php include("includes/a-config.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("includes/head-tag-contents.php"); ?>
</head>
<body class="bg-warning ">
    <?php include("includes/navigation.php"); ?>
    <div class="container w-100 p-0 my-3">
        <h1 class="text-center fst-italic fw-bold mb-4">CARRITO</h1>
        <section class="container-fluid d-flex justify-content-center px-0 px-md-5">
            <div class="row w-100 text-primary mb-3">
                <div class="col-12 p-0">
                    <div class="bg-secondary w-100 fs-4 rounded-3 quitar-rounded p-3 p-md-4">
                        <div class="row align-items-center justify-content-center text-center text-md-start">
                            <!-- Imagen -->
                            <div class="col-6 col-md-2 mb-3 mb-md-0">
                                <img src="/assets/img/carta/Principal.png" class="img-fluid rounded-circle"
                                    alt="Jamón Ibérico">
                            </div>
                            <!-- Descripción -->
                            <div class="col-12 col-md-5 fw-bold fst-italic my-3">
                                <p class="mb-1">Especialidades</p>
                                <p class="mb-1">Paella de Mariscos Tradicional 
                                Con gambas, mejillones, cigalas y azafrán.
                                </p>
                            </div>
                            <!-- Botones -->
                            <div class="col-12 col-md-3 my-3 text-center">
                                <button type="submit" class="btn btn-comun fw-bold py-3">-</button>
                                <button type="submit" class="btn btn-comun fw-bold py-3">1</button>
                                <button type="submit" class="btn btn-comun fw-bold py-3">+</button>
                            </div>
                            <!-- Subtotal -->
                            <div class="col-12 col-md-2 fw-bold fst-italic text-center text-md-end mt-3">
                                <p class="subtotal m-0">SubTotal: 45€</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section class="container-fluid d-flex justify-content-center px-0 px-md-5">
            <div class="row w-100 text-primary mb-3">
                <div class="col-12 p-0">
                    <div class="bg-secondary w-100 fs-4 rounded-3 quitar-rounded p-3 p-md-4">
                        <div class="row align-items-center justify-content-center text-center text-md-start">
                            <div class="col-6 col-md-2 mb-3 mb-md-0">
                                <img src="/assets/img/carta/Cordero.png" class="img-fluid rounded-circle"
                                    alt="Jamón Ibérico">
                            </div>
                            <!-- Descripción -->
                            <div class="col-12 col-md-5 fw-bold fst-italic my-3">
                                <p class="mb-1">Especialidades</p>
                                <p class="mb-1">Cordero Lechal Confitado. Con reducción de vino de Rioja y espinacas salteadas.
                                </p>
                            </div>
                            <!-- Botones -->
                            <div class="col-12 col-md-3 my-3 text-center">
                                <button type="submit" class="btn btn-comun fw-bold py-3">-</button>
                                <button type="submit" class="btn btn-comun fw-bold py-3">1</button>
                                <button type="submit" class="btn btn-comun fw-bold py-3">+</button>
                            </div>
                            <!-- Subtotal -->
                            <div class="col-12 col-md-2 fw-bold fst-italic text-center text-md-end mt-3">
                                <p class="subtotal m-0">SubTotal: 45€</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="container-fluid d-flex justify-content-center px-0 px-md-5">
            <div class="row w-100 text-primary mb-3">
                <div class="col-12 p-0">
                    <div class="bg-secondary w-100 fs-4 rounded-3 quitar-rounded p-3 p-md-4">
                        <div class="row align-items-center justify-content-center text-center text-md-start">
                            <!-- Imagen -->
                            <div class="col-6 col-md-2 mb-3 mb-md-0">
                                <img src="/assets/img/carta/Bacalao.png" class="img-fluid rounded-circle"
                                    alt="Bacalao a la Brasa con Crema de Guisantes">
                            </div>
                            <!-- Descripción -->
                            <div class="col-12 col-md-5 fw-bold fst-italic my-3">
                                <p class="mb-1">Entrantes</p>
                                <p class="mb-1">Bacalao a la Brasa con Crema de Guisantes. Con cebollas caramelizadas y un toque de jamón ibérico.
                                </p>
                            </div>
                            <!-- Botones -->
                            <div class="col-12 col-md-3 my-3 text-center">
                                <button type="submit" class="btn btn-comun fw-bold py-3">-</button>
                                <button type="submit" class="btn btn-comun fw-bold py-3">1</button>
                                <button type="submit" class="btn btn-comun fw-bold py-3">+</button>
                            </div>
                            <!-- Subtotal -->
                            <div class="col-12 col-md-2 fw-bold fst-italic text-center text-md-end mt-3">
                                <p class="subtotal m-0">SubTotal: 45€</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="d-flex justify-content-center align-items-center">
                <div class="text-primary rounded-5 fw-bold quitar-rounded fs-2 bg-secondary w-50 vh-max-100 w-lg-50 p-4">
                    <div class="text-center">
                        <p class="my-2">
                            <span class="fst-italic">PRECIO FINAL: 140€</span>
                            <button class="btn btn-comun rounded-pill fs-4 fst-italic">PROCEDER AL PAGO</button>
                        </p>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <?php include("includes/footer.php"); ?>
</body>

</html>