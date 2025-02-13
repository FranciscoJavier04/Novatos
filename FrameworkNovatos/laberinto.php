<?php
require 'vendor/autoload.php';
include("includes/a-config.php"); ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <?php include("includes/head-tag-contents.php"); ?>
    <script src="https://cdn.jsdelivr.net/npm/konva@9.3.0/konva.min.js"></script>
</head>

<body class="h-100 m-0 bg-secondary">
    <header class="container d-flex justify-content-center align-items-center">
        <button class="btn btn-comun my-auto px-5">Nivel Anterior</button>
        <a href="index.php" class="col-1 p-2"><img src="assets/img/LogoSinFondo.png" class="w-100" alt=""></a>
        <button class="btn btn-comun my-auto px-5">Siguiente Nivel</button>
    </header>

    <main class="d-flex justify-content-center align-items-center">
        <div id="container"></div>
    </main>
    <script src="juegos/scripts/laberinto.js"></script>
</body>

</html>