<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juego de Laberinto</title>
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
    <script>
        // Crear el escenario
        const stage = new Konva.Stage({
            container: 'container',
            width: 800,
            height: 600,
        });

        // Crear una capa
        const layer = new Konva.Layer();
        stage.add(layer);

        // Crear el laberinto (usando rectángulos como muros)
        const maze = [
            { x: 0, y: 0, width: 800, height: 20 },   // Pared superior
            { x: 0, y: 580, width: 800, height: 20 }, // Pared inferior
            { x: 0, y: 0, width: 20, height: 600 },   // Pared izquierda
            { x: 780, y: 0, width: 20, height: 600 }, // Pared derecha
            { x: 200, y: 0, width: 20, height: 500 }, // Primera barrera
            { x: 375, y: 200, width: 50, height: 400 }, // Segunda barrera
            { x: 625, y: 0, width: 20, height: 600 }, // Tercera barrera
        ];

        maze.forEach((wall) => {
            const rect = new Konva.Rect({
                x: wall.x,
                y: wall.y,
                width: wall.width,
                height: wall.height,
                fill: 'black',
            });
            layer.add(rect);
        });

        // Crear el jugador (cuadrado)
        const player = new Konva.Rect({
            x: 40,
            y: 40,
            width: 30,
            height: 30,
            fill: 'blue',
        });
        layer.add(player);

        // Crear obstáculos móviles (verticales)
        const obstacles = [
            //Primeros 3 obstaculos
            { x: 250, y: 300, radius: 15, dx: 0, dy: 5 },
            { x: 300, y: 300, radius: 15, dx: 0, dy: -5 },
            { x: 350, y: 300, radius: 15, dx: 0, dy: 5 },
            // Obstaculos de 2 en 2
            { x: 450, y: 200, radius: 15, dx: 0, dy: 5 },
            { x: 500, y: 200, radius: 15, dx: 0, dy: 5 },
            { x: 550, y: 400, radius: 15, dx: 0, dy: -5 },
            { x: 600, y: 400, radius: 15, dx: 0, dy: -5 },
        ];

        const obstacleShapes = obstacles.map((obstacle) => {
            const circle = new Konva.Circle({
                x: obstacle.x,
                y: obstacle.y,
                radius: obstacle.radius,
                fill: 'red',
            });
            layer.add(circle);
            return { shape: circle, ...obstacle };
        });

        // Meta
        const goal = new Konva.Rect({
            x: 740,
            y: 520,
            width: 40,
            height: 40,
            fill: 'green',
        });
        layer.add(goal);

        // Variables para el estado de las teclas
        const keysPressed = {
            ArrowUp: false,
            ArrowDown: false,
            ArrowLeft: false,
            ArrowRight: false,
        };

        const step = 5; // Paso del jugador

        // Función para manejar el movimiento continuo
        const coins = [
            { x: 100, y: 100 },
            { x: 300, y: 150 },
            { x: 500, y: 300 },
            { x: 600, y: 500 },
        ];

        const coinShapes = coins.map((coin) => {
            const circle = new Konva.Circle({
                x: coin.x,
                y: coin.y,
                radius: 10,
                fill: 'gold',
            });
            layer.add(circle);
            return circle;
        });

        let collectedCoins = 0;

        function checkCoinCollection() {
            coinShapes.forEach((coin, index) => {
                if (coin.visible() && Konva.Util.haveIntersection(player.getClientRect(), coin.getClientRect())) {
                    coin.hide(); // Ocultar la moneda
                    collectedCoins++;
                    if (collectedCoins === coins.length) {
                        openBarrier();
                    }
                }
            });
        }

        // Función para abrir el hueco en la tercera barrera
        function openBarrier() {
            // Encontrar la tercera barrera en el array de muros
            const barrier = maze.find(
                (wall) => wall.x === 625 && wall.y === 0 && wall.width === 20 && wall.height === 600
            );

            if (barrier) {
                // Reducir la altura del muro y crear el hueco
                barrier.height = 250; // La parte superior
                const lowerBarrier = {
                    x: barrier.x,
                    y: barrier.height + 150, // Espacio para el hueco
                    width: barrier.width,
                    height: 200, // La parte inferior
                };
                maze.push(lowerBarrier);

                // Actualizar los rectángulos en la capa
                const rect = layer.findOne((node) => node.x() === barrier.x && node.y() === barrier.y);
                if (rect) {
                    rect.height(barrier.height); // Reducir la parte superior
                }

                // Añadir la parte inferior del muro como un nuevo rectángulo
                const lowerRect = new Konva.Rect({
                    x: lowerBarrier.x,
                    y: lowerBarrier.y,
                    width: lowerBarrier.width,
                    height: lowerBarrier.height,
                    fill: 'black',
                });
                layer.add(lowerRect);
                layer.batchDraw();
            }
        }


        // Actualizar el movimiento del jugador y comprobar colisiones con monedas
        function movePlayer() {
            const oldX = player.x();
            const oldY = player.y();

            if (keysPressed.ArrowUp) player.y(player.y() - step);
            if (keysPressed.ArrowDown) player.y(player.y() + step);
            if (keysPressed.ArrowLeft) player.x(player.x() - step);
            if (keysPressed.ArrowRight) player.x(player.x() + step);

            // Comprobar colisión con las paredes
            const collision = maze.some((wall) => {
                const rect = new Konva.Rect(wall);
                return Konva.Util.haveIntersection(player.getClientRect(), rect.getClientRect());
            });

            if (collision) {
                player.x(oldX);
                player.y(oldY);
            }

            // Comprobar colisiones con monedas
            checkCoinCollection();

            layer.batchDraw();
            requestAnimationFrame(movePlayer);
        }

        // Escuchar cuando las teclas se presionan
        window.addEventListener('keydown', (e) => {
            if (keysPressed.hasOwnProperty(e.key)) {
                keysPressed[e.key] = true;
            }
        });

        // Escuchar cuando las teclas se liberan
        window.addEventListener('keyup', (e) => {
            if (keysPressed.hasOwnProperty(e.key)) {
                keysPressed[e.key] = false;
            }
        });

        // Iniciar la animación
        requestAnimationFrame(movePlayer);


        // Animar obstáculos
        function animateObstacles() {
            obstacleShapes.forEach((obstacle) => {
                const shape = obstacle.shape;

                shape.y(shape.y() + obstacle.dy);

                // Rebotar en los bordes superior e inferior
                if (shape.y() + obstacle.radius > 580 || shape.y() - obstacle.radius < 20) {
                    obstacle.dy = -obstacle.dy;
                }

                // Comprobar colisión con el jugador
                if (Konva.Util.haveIntersection(player.getClientRect(), shape.getClientRect())) {
                    alert('¡Perdiste! Has tocado un obstáculo.');
                    player.x(40);
                    player.y(40);
                }
            });

            layer.batchDraw();
            requestAnimationFrame(animateObstacles);
        }

        animateObstacles();

        // Comprobar si el jugador llega a la meta
        function checkWin() {
            if (Konva.Util.haveIntersection(player.getClientRect(), goal.getClientRect())) {
                alert('¡Ganaste!');
                player.x(40);
                player.y(40);
                layer.batchDraw();
            }
        }

        layer.on('draw', checkWin);
    </script>
</body>

</html>