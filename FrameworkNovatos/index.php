<?php include("includes/a-config.php"); ?>
<!DOCTYPE html>
<html>

<head>
    <?php include("includes/head-tag-contents.php"); ?>
</head>

<body>
    <?php include("includes/navigation.php"); ?>
<!--CF2: El container lo tiene que englobar todo-->
    <main class="bg-info text-white fs-4 text-center">

       <div class="portfolio-main p-5">
            <button class="btn-xl rounded-3"><a href="video.php">DESCÚBRENOS</a></button>
        </div>

        <div class="container py-5 ">
            <!-- Primera tarjeta -->
            <div class="row align-items-center mb-3">
                <div class="col-md-4 p-0">
                    <img src="assets/img/Logo.png" alt="Imagen 1" class="w-75">
                </div>
                <div class="col-md-8 p-0">
                    <p>
                        Estoy seguro de que has visto el Padrino, uno de los nuestros o cualquier película de Mafiosos.
                        Pues hoy os traigo Comiendo en el RESTAURANTE DE LA MAFIA en Marbella.
                    </p>
                </div>
            </div>
            <div class="separator"></div>

            <!-- Segunda tarjeta (invertida) -->
            <div class="row align-items-center my-3">
                <div class="col-md-4 order-md-1 p-0">
                    <img src="assets/img/Logo.png" alt="Imagen 2" class="w-75">
                </div>
                <div class="col-md-8 order-md-0 p-0">
                    <p>
                        Así es comer en uno de los restaurantes más lujosos de España, probamos todos los platos para
                        dar nuestra opinión más sincera.
                    </p>
                </div>

            </div>
            <div class="separator"></div>

            <!-- Tercera tarjeta -->
            <div class="row align-items-center my-3">
                <div class="col-md-4 p-0">
                    <img src="assets/img/Logo.png" alt="Imagen 3" class="w-75">
                </div>
                <div class="col-md-8 p-0">
                    <p id="google_translate_element">
                        La calidad y el buen servicio son nuestra razón de ser para que un cliente nos elija como su
                        restaurante de referencia. Una filosofía llevada a nuestro día a día.
                    </p>
                </div>
            </div>
            <div class="separator"></div>
        </div>
    </main>
    <script type="text/javascript">
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({ pageLanguage: 'en' }, 'google_translate_element');
        }
    </script>
    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
    <?php include("includes/footer.php"); ?>
</body>

</html>