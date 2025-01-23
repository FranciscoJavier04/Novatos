<?php include("includes/a-config.php"); ?>
<!DOCTYPE html>
<html>

<head>
    <?php include("includes/head-tag-contents.php"); ?>
</head>

<body class="body-descubrenos">
    <?php include("includes/navigation.php"); ?>
    <div class="p-3 mx-auto mt-2 mb-2 text-justify descubrenos-fon bg-info rounded-3 text-paragraph">
        <section id="acercaDe mb-5">
            <div class="container">
                <h1 class="h1-Pol text-warning">Acerca de Óneo</h1>

                <p class="fs-5">Óneo es un restaurante moderno y lujoso ubicado en el corazón de Marbella, donde
                    fusionamos lo mejor de la
                    alta cocina con un diseño elegante y contemporáneo. Nuestro objetivo es ofrecer una experiencia
                    gastronómica
                    exclusiva que despierte los sentidos, creando momentos inolvidables para cada uno de nuestros
                    clientes.
                </p>

                <p class="fs-5">En Óneo, nos enorgullece ofrecer una cocina innovadora y de alta calidad, elaborada con
                    ingredientes frescos
                    y de primera, combinados con un ambiente sofisticado y acogedor. Cada plato está diseñado para ser
                    una
                    obra
                    de arte que no solo satisface el paladar, sino que también deleita la vista.</p>

                <p class="fs-5">Nuestro restaurante es mucho más que un lugar donde comer, es un espacio donde la
                    gastronomía se convierte en
                    una experiencia sensorial completa. Queremos que cada visita a Óneo sea una ocasión especial, una
                    oportunidad para disfrutar de un servicio impecable y una atmósfera única.</p>

                <p class="fs-5">Lo que buscamos en Óneo es redefinir el concepto de restauración de lujo,
                    convirtiéndonos en un referente en
                    Marbella y más allá. Nuestro compromiso con la excelencia nos impulsa a seguir innovando y superando
                    las
                    expectativas de nuestros clientes. Queremos ser un lugar donde los momentos importantes de la vida
                    se
                    celebran con el sabor y la elegancia que merecen.</p>
            </div>
        </section>

        <section class="mt-5 juegos">
            <div class="container">
                <h1 class="h2-Pol text-warning">Juegos Óneo</h1>

                <div class="juegos-botones">
                    <div class="juego-item">
                        <p class="fs-3">Laberinto</p>
                        <button class="juego-boton" onclick="window.location.href='laberinto.php'">
                            <img src="juegos/img/juego1.png" alt="Laberinto Juego">
                        </button>
                    </div>

                    <div class="juego-item">
                        <p class="fs-3">Crear Pizza</p>
                        <button class="juego-boton" onclick="window.location.href='juegoPlato.php'">
                            <img src="juegos/img/juego2.png" alt="Juego Plato">
                        </button>
                    </div>
                    <div class="juego-item">
                        <p class="fs-3">Diseña tu sala</p>
                        <button class="juego-boton" onclick="window.location.href='mapaInteractivo.php'">
                            <img src="juegos/img/juego3.png" alt="Juego Plato">
                        </button>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <?php include("includes/footer.php"); ?>
</body>

</html>