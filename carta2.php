<?php include("includes/a_config.php"); ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <?php include("includes/head-tag-contents.php"); ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #333;
            color: #eee;
        }
        .navbar, .footer {
            background-color: #1f1f1f;
        }
        .navbar-brand, .nav-link {
            color: #e0c070 !important;
        }
        .hero-logo {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 300px;
            background-color: #222;
        }
        .logo-img {
            max-width: 200px;
        }
        .menu-section {
            background-color: #444;
            padding: 2rem;
            border-radius: 8px;
        }
        .menu-section h2 {
            color: #e0c070;
            font-weight: bold;
        }
        .menu-item {
            display: flex;
            justify-content: space-between;
            font-size: 1.1rem;
            padding: 0.5rem 0;
            border-bottom: 1px solid #666;
        }
        main {
            background-image: url('assets/img/carta-fondo.png');
            background-size: cover;
            background-position: center;
            padding: 2rem;
        }
    </style>
</head>

<body>
    <?php include("includes/navigation.php"); ?>
    
    <!-- Main Section -->
    <main class="text-center">
        <div class="hero-logo">
            <img src="assets/img/logo.png" alt="ONEO Logo" class="logo-img">
        </div>

        <!-- Menu Section -->
        <div class="container my-5">
            <div class="menu-section">
                <h2 class="text-center">CARTA</h2>
                <div class="d-flex justify-content-center mb-4">
                    <img src="assets/img/jamon.jpg" alt="Jamon" class="img-fluid rounded" style="max-width: 200px; margin-right: 1rem;">
                    <div class="bg-warning" style="width: 200px; height: 150px;"></div>
                </div>
                <h3 class="text-center text-warning">ENTRANTES</h3>
                <div class="menu-item">
                    <span>Jamón Ibérico de Bellota</span>
                    <span>25€</span>
                </div>
                <div class="menu-item">
                    <span>Tortilla de mano, acompañada de pan con tomate</span>
                    <span>18€</span>
                </div>
                <div class="menu-item">
                    <span>Ensalada de Atún Rojo del Mediterráneo</span>
                    <span>16€</span>
                </div>
                <div class="menu-item">
                    <span>Carpaccio de Wagyu con Vinagreta de Sésamo</span>
                    <span>20€</span>
                </div>
                <div class="menu-item">
                    <span>Vieiras con Hinojo, emulsionadas con Vino Blanco</span>
                    <span>22€</span>
                </div>
                <div class="menu-item">
                    <span>Paleta de Bellota, mantecosa y sabor intenso</span>
                    <span>24€</span>
                </div>
                <div class="menu-item">
                    <span>Croquetas de Jamón y Morcilla</span>
                    <span>12€</span>
                </div>
                <div class="menu-item">
                    <span>Con leche de tigre y matiz crujiente</span>
                    <span>18€</span>
                </div>
            </div>
        </div>
    </main>
    
    <?php include("includes/footer.php"); ?>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
