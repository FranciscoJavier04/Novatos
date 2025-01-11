<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crea tu pizza ideal - Oneo</title>
    <script src="https://unpkg.com/konva@8/konva.min.js"></script>
    <style>
        body {
            text-align: center;
            background-image: url('juegos/img/fondoP.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }

        #container {
            margin: 20px auto;
            border: 2px solid #ccc;
            display: inline-block;
            background-color: white;
        }

        #salsas {
            margin-top: 2%;
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

        h1 {
            color: white;
        }

        p {
            color: white;
        }

        .bReset {
            margin-top: 3%;
        }
    </style>
</head>

<body>
    <h1>Crea tu pizza ideal</h1>
    <p>Arrastra los ingredientes al plato y elige tu salsa favorita</p>

    <!-- Contenedor del canvas -->
    <div id="container"></div>

    <!-- Ingredientes disponibles -->
    <div id="ingredientes">
        <p>Ingredientes:</p>
        <div class="fila-ingredientes">
            <button onclick="addIngredient('🥩', 'Ternera')">Ternera</button>
            <button onclick="addIngredient('🧀', 'Queso')">Queso</button>
            <button onclick="addIngredient('🌽', 'Maíz')">Maíz</button>
            <button onclick="addIngredient('🌶️', 'Pimiento')">Pimiento</button>
            <button onclick="addIngredient('🍄', 'Champiñón')">Champiñón</button>
            <button onclick="addIngredient('🧅', 'Cebolla')">Cebolla</button>
        </div>
        <div class="fila-ingredientes">
            <button onclick="addIngredient('🫑', 'Pimientos Asados')">Pimientos Asados</button>
            <button onclick="addIngredient('🫒', 'Aceitunas')">Aceitunas</button>
            <button onclick="addIngredient('🥓', 'Bacon')">Bacon</button>
            <button onclick="addIngredient('🍗', 'Pollo')">Pollo</button>
            <button onclick="addIngredient('🍖', 'Jamón')">Jamón</button>
            <button onclick="addIngredient('🥔', 'Patatas')">Patatas</button>
        </div>
    </div>


    <!-- Salsas -->
    <div id="salsas">
        <p>Salsas:</p>
        <button onclick="changeSauce('juegos/img/s-tomate.webp', 'Salsa de Tomate')">Salsa de Tomate</button>
        <button onclick="changeSauce('juegos/img/s-barbacoa.jpg', 'Salsa Barbacoa')">Salsa Barbacoa</button>
        <button onclick="changeSauce('juegos/img/s-carbonara.jpg', 'Salsa Carbonara')">Salsa Carbonara</button>
    </div>

    <!-- Botón para reiniciar el juego -->
    <button class="bReset" onclick="resetPizza()">Empezar de 0</button>

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

        // Crear la imagen de fondo (mesa.png)
        const backgroundImage = new Konva.Image({
            x: 0,
            y: 0,
            width: stage.width(),
            height: stage.height()
        });

        // Cargar la imagen desde la fuente
        const bgImageObj = new Image();
        bgImageObj.src = 'juegos/img/mesa.png';
        bgImageObj.onload = () => {
            backgroundImage.image(bgImageObj);
            layer.draw();
        };

        // Agregar la imagen de fondo a la capa
        layer.add(backgroundImage);

        // Crear un grupo para clippear la imagen dentro del círculo
        const pizzaGroup = new Konva.Group({
            x: stage.width() / 2,
            y: stage.height() / 2,
            clipFunc: function (ctx) {
                ctx.arc(0, 0, 150, 0, Math.PI * 2, false);
            }
        });

        // Agregar el grupo a la capa
        layer.add(pizzaGroup);

        // Fondo de la pizza (marrón claro)
        const pizzaBase = new Konva.Circle({
            x: 0,
            y: 0,
            radius: 150,
            fill: '#D2B48C',
            stroke: '#8B4513',
            strokeWidth: 6
        });

        // Agregar la base de la pizza al grupo
        pizzaGroup.add(pizzaBase);

        // Imagen de la salsa
        let sauceImage = new Konva.Image({
            x: -150,
            y: -150,
            width: 300,
            height: 300
        });

        pizzaGroup.add(sauceImage);

        // Borde del plato (marrón oscuro)
        const plateBorder = new Konva.Circle({
            x: stage.width() / 2,
            y: stage.height() / 2,
            radius: 150,
            stroke: '#8B4513',
            strokeWidth: 6
        });

        layer.add(plateBorder);

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

        // Función para cambiar la salsa
        function changeSauce(imageSrc, sauceName) {
            const imageObj = new Image();
            imageObj.src = imageSrc;

            imageObj.onload = () => {
                sauceImage.image(imageObj);
                layer.draw();
            };

            selectedIngredients.push(sauceName);
        }

        // Función para reiniciar el juego
        function resetPizza() {
            // Eliminar todos los ingredientes (excepto el fondo y los elementos principales)
            layer.getChildren((node) => node !== pizzaGroup && node !== plateBorder && node !== backgroundImage).forEach((node) => node.destroy());

            // Reiniciar la salsa
            sauceImage.image(null);

            // Vaciar la lista de ingredientes seleccionados
            selectedIngredients = [];

            // Redibujar la capa
            layer.draw();
        }


        layer.draw();
    </script>
</body>

</html>