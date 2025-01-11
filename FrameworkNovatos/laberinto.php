<?php include("includes/a-config.php"); ?>
<!DOCTYPE html>
<html>

<head>
    <?php include("includes/head-tag-contents.php"); ?>
    <script src="https://cdn.jsdelivr.net/npm/konva@9.3.0/konva.min.js"></script>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f0f0f0;
        }
    </style>
</head>

<body>
    <div id="container"></div>
    <script src="juegos/scripts/laberinto.js"></script>
</body>

</html>