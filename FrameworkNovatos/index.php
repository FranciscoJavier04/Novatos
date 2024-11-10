<?php include("includes/a_config.php");?>
<!DOCTYPE html>
<html>
<head>
<?php include("includes/head-tag-contents.php");?>
</head>
<body>
<?php include("includes/navigation.php");?>
<main>
    <div class="portfolio-main">
        <button class="btn btn-lg btn-light">DESCÚBRENOS</button>
    </div>

    <div class="container py-5">
        <!-- Primera tarjeta -->
        <div class="row align-items-center mb-3">
            <div class="col-md-4">
                <img src="assets/img/Logo.png" alt="Imagen 1" class="img-fluid video">
            </div>
            <div class="col-md-8">
                <p>
                    Estoy seguro de que has visto el Padrino, uno de los nuestros o cualquier película de Mafiosos. Pues hoy os traigo Comiendo en el RESTAURANTE DE LA MAFIA en Benidorm.
                </p>
            </div>
        </div>
        <div class="separator"></div>

        <!-- Segunda tarjeta (invertida) -->
        <div class="row align-items-center mb-3">
            <div class="col-md-8 order-md-1">
                <p>
                    Así es comer en uno de los restaurantes más lujosos de España, probamos todos los platos para dar nuestra opinión más sincera.
                </p>
            </div>
            <div class="col-md-4 order-md-0">
                <img src="assets/img/Logo.png" alt="Imagen 2" class="img-fluid video">
            </div>
        </div>
        <div class="separator"></div>

        <!-- Tercera tarjeta -->
        <div class="row align-items-center mb-3">
            <div class="col-md-4">
                <img src="assets/img/Logo.png" alt="Imagen 3" class="img-fluid video">
            </div>
            <div class="col-md-8">
                <p>
                    La calidad y el buen servicio son nuestra razón de ser para que un cliente nos elija como su restaurante de referencia. Una filosofía llevada a nuestro día a día.
                </p>
            </div>
        </div>
        <div class="separator"></div>
    </div>
</main>

<?php include("includes/footer.php");?>
</body>
</html>