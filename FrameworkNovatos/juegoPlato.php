<?php
// Procesar los datos cuando se envía el plato
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos enviados
    $data = json_decode(file_get_contents("php://input"), true);
    $response = "Error al procesar los datos.";

    // Validar y guardar los ingredientes
    if (isset($data['ingredients'])) {
        $ingredients = implode(", ", $data['ingredients']);
        // Guardar en un archivo local
        file_put_contents("saved_pizzas.txt", "Nueva pizza: " . $ingredients . "\n", FILE_APPEND);
        $response = "¡Pizza guardada con éxito! Ingredientes: " . $ingredients;
    }
    echo $response;
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crea tu pizza ideal - Oneo</title>
    <script src="https://unpkg.com/konva@8/konva.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 0;
            background-color: #f7f7f7;
        }
        #container {
            margin: 20px auto;
            border: 2px solid #ccc;
            display: inline-block;
            background-color: white;
        }
        #ingredientes, #salsas {
            margin: 10px auto;
        }
        button {
            margin-top: 10px;
            padding: 10px 20px;
            font-size: 16px;
            background-color: #333;
            color: white;
            border: none;
            cursor: pointer;
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <h1>Crea tu pizza ideal 🍕</h1>
    <p>Arrastra los ingredientes al plato y elige tu salsa favorita</p>

    <!-- Contenedor del canvas -->
    <div id="container"></div>
    
    <!-- Ingredientes disponibles -->
    <div id="ingredientes">
        <h3>Ingredientes:</h3>
        <button onclick="addIngredient('🍅', 'Tomate')">Tomate</button>
        <button onclick="addIngredient('🥩', 'Carne')">Carne</button>
        <button onclick="addIngredient('🥦', 'Brócoli')">Brócoli</button>
        <button onclick="addIngredient('🧀', 'Queso')">Queso</button>
        <button onclick="addIngredient('🍤', 'Camarón')">Camarón</button>
    </div>

    <!-- Salsas -->
    <div id="salsas">
        <h3>Salsas:</h3>
        <button onclick="changeSauce('salsa_tomate.jpg', 'Salsa de Tomate')">Salsa de Tomate</button>
        <button onclick="changeSauce('salsa_bbq.jpg', 'Salsa Barbacoa')">Salsa Barbacoa</button>
        <button onclick="changeSauce('salsa_carbonara.jpg', 'Salsa Carbonara')">Salsa Carbonara</button>
        <button onclick="changeSauce('salsa_pesto.jpg', 'Salsa de Pesto')">Salsa de Pesto</button>

    </div>

    <!-- Botón para enviar el plato -->
    <button onclick="savePlate()">Guardar Pizza</button>

    <script>
        // Crear el escenario de Konva
        const stage = new Konva.Stage({
            container: 'container',
            width: 600,
            height: 400
        });

        // Capa principal
        const layer = new Konva.Layer();
        stage.add(layer);

        // Plato base
        const plate = new Konva.Circle({
            x: stage.width() / 2,
            y: stage.height() / 2,
            radius: 150,
            fill: '#eee', // Color inicial
            stroke: '#333',
            strokeWidth: 4
        });
        layer.add(plate);

        // Lista de ingredientes seleccionados
        let selectedIngredients = [];

        // Función para agregar ingredientes
        function addIngredient(emoji, name) {
            const ingredient = new Konva.Text({
                x: Math.random() * (stage.width() - 50),
                y: Math.random() * (stage.height() - 50),
                text: emoji,
                fontSize: 40,
                draggable: true
            });

            ingredient.on('dragend', () => {
                const pos = ingredient.position();
                console.log(`Ingrediente ${name} colocado en (${pos.x}, ${pos.y})`);
            });

            ingredient.on('click', () => {
                alert(`Este es ${name}`);
            });

            selectedIngredients.push(name);
            layer.add(ingredient);
            layer.draw();
        }

        // Función para cambiar la salsa (color del plato)
        function changeSauce(imageSrc, sauceName) {
            plateImageObj.src = imageSrc; // Cargar nueva imagen de salsa
            plateImageObj.onload = () => {
                plate.image(plateImageObj); // Actualizar imagen en Konva
                layer.draw();
            };

            selectedIngredients.push(sauceName); // Guardar la salsa seleccionada
        }

        // Guardar la pizza
        function savePlate() {
            fetch('', { // Mismo archivo PHP
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ ingredients: selectedIngredients })
            })
            .then(response => response.text())
            .then(data => {
                alert('Respuesta del servidor: ' + data);
            });
        }

        layer.draw();
    </script>
</body>
</html>
