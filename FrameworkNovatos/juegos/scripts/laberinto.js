let player; // Para la referencia del jugador
let obstacleShapes = []; // Para los obstáculos en movimiento
let coinShapes = []; // Para las monedas
let goal; // Para el objetivo
let maze = []; // Para las paredes del laberinto
let collectedCoins = 0;

// Crear el escenario
const stage = new Konva.Stage({
    container: 'container',
    width: 800,
    height: 600,
});

// Crear una capa
const layer = new Konva.Layer();
stage.add(layer);

// Configuración de los niveles
const levels = [
    {             
            name: "Nivel 1",
            maze: [
                { x: 0, y: 0, width: 800, height: 20 },
                { x: 0, y: 580, width: 800, height: 20 },
                { x: 0, y: 0, width: 20, height: 600 },
                { x: 780, y: 0, width: 20, height: 600 },
            ],
            obstacles: [
                { x: 250, y: 110, radius: 20, dx: 0, dy: -5 },
                { x: 300, y: 130, radius: 20, dx: 0, dy: -5 },
                { x: 350, y: 150, radius: 20, dx: 0, dy: -5 },
                { x: 400, y: 170, radius: 20, dx: 0, dy: -5 },
                { x: 450, y: 190, radius: 20, dx: 0, dy: -5 },
                { x: 500, y: 210, radius: 20, dx: 0, dy: -5 },
                { x: 550, y: 230, radius: 20, dx: 0, dy: -5 },
                { x: 600, y: 250, radius: 20, dx: 0, dy: -5},
                { x: 650, y: 270, radius: 20, dx: 0, dy: -5 },

            ],
            coins: [
                { x: 200, y: 200 },
                { x: 400, y: 300 },
            ],
            goal: { x: 720, y: 520, width: 50, height: 50 },
            startPosition: { x: 50, y: 50 },
        },
        {
        name: "Nivel 2",
        maze: [
            { x: 0, y: 0, width: 800, height: 20 },   // Pared superior
            { x: 0, y: 580, width: 800, height: 20 }, // Pared inferior
            { x: 0, y: 0, width: 20, height: 600 },   // Pared izquierda
            { x: 780, y: 0, width: 20, height: 600 }, // Pared derecha
            { x: 200, y: 0, width: 20, height: 500 }, // Primera barrera
            { x: 375, y: 200, width: 50, height: 400 }, // Segunda barrera
            { x: 625, y: 0, width: 20, height: 600 }, // Tercera barrera
        ],
        obstacles: [
            { x: 250, y: 300, radius: 15, dx: 0, dy: 5 },
            { x: 300, y: 300, radius: 15, dx: 0, dy: -5 },
            { x: 350, y: 300, radius: 15, dx: 0, dy: 5 },
            { x: 450, y: 200, radius: 15, dx: 0, dy: 5 },
            { x: 500, y: 200, radius: 15, dx: 0, dy: 5 },
            { x: 550, y: 400, radius: 15, dx: 0, dy: -5 },
            { x: 600, y: 400, radius: 15, dx: 0, dy: -5 },
        ],
        coins: [
            { x: 100, y: 100 },
            { x: 300, y: 150 },
            { x: 500, y: 300 },
            { x: 600, y: 500 },
        ],
        goal: { x: 740, y: 520, width: 40, height: 40 },
        startPosition: { x: 40, y: 40 },
    },
    
];

let currentLevelIndex = 0;

// Función para cargar un nivel
function loadLevel(index) {
    if (index < 0 || index >= levels.length) return;

    currentLevelIndex = index;
    const level = levels[index];

    layer.destroyChildren(); // Limpiar la capa

    // Dibujar el fondo
    layer.add(new Konva.Rect({
        x: 0,
        y: 0,
        width: stage.width(),
        height: stage.height(),
        fill: '#f0f0f0',
    }));

    // Dibujar el laberinto y actualizar `maze`
    maze = level.maze.map((wall) => {
        const rect = new Konva.Rect({
            x: wall.x,
            y: wall.y,
            width: wall.width,
            height: wall.height,
            fill: 'black',
        });
        layer.add(rect);
        return wall; // Retener la información original
    });

    // Dibujar las monedas y actualizar `coinShapes`
    coinShapes = level.coins.map((coin) => {
        const circle = new Konva.Circle({
            x: coin.x,
            y: coin.y,
            radius: 10,
            fill: 'gold',
        });
        layer.add(circle);
        return circle; // Guardar la referencia para colisiones
    });

    // Dibujar los obstáculos y actualizar `obstacleShapes`
    obstacleShapes = level.obstacles.map((obstacle) => {
        const circle = new Konva.Circle({
            x: obstacle.x,
            y: obstacle.y,
            radius: obstacle.radius,
            fill: 'red',
        });
        layer.add(circle);
        return { shape: circle, ...obstacle }; // Guardar referencia y datos
    });

    // Dibujar la meta y actualizar `goal`
    goal = new Konva.Rect({
        x: level.goal.x,
        y: level.goal.y,
        width: level.goal.width,
        height: level.goal.height,
        fill: 'green',
    });
    layer.add(goal);

    // Dibujar al jugador y actualizar `player`
    player = new Konva.Rect({
        x: level.startPosition.x,
        y: level.startPosition.y,
        width: 30,
        height: 30,
        fill: 'blue',
    });
    layer.add(player);

    // Dibujar todo
    layer.batchDraw();
}

// Cambiar al nivel anterior
document.querySelector('header button:nth-child(1)').onclick = () => {
    if (currentLevelIndex > 0) {
        loadLevel(currentLevelIndex - 1);
    } else {
        alert("Este es el primer nivel.");
    }
};

// Cambiar al siguiente nivel
document.querySelector('header button:nth-child(3)').onclick = () => {
    if (currentLevelIndex < levels.length - 1) {
        loadLevel(currentLevelIndex + 1);
    } else {
        alert("¡Has completado todos los niveles!");
    }
};

// Variables para las teclas
const keysPressed = {
    ArrowUp: false,
    ArrowDown: false,
    ArrowLeft: false,
    ArrowRight: false,
};

const step = 5; // Paso del jugador

function checkCoinCollection() {
    coinShapes.forEach((coin, index) => {
        if (coin.visible() && Konva.Util.haveIntersection(player.getClientRect(), coin.getClientRect())) {
            coin.hide(); // Ocultar la moneda
            collectedCoins++;
            if (collectedCoins === coinShapes.length) {
                openBarrier();
            }            
        }
    });
}

// Función para abrir el hueco en la tercera barrera
function openBarrier() {
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

        // Actualizar la altura del muro existente
        const rect = layer.findOne((node) => node.x() === barrier.x && node.y() === barrier.y);
        if (rect) {
            rect.height(barrier.height); 
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

function resetKeysPressed() {
    for (const key in keysPressed) {
        keysPressed[key] = false;
    }
}


function movePlayer() {
    const oldX = player.x();
    const oldY = player.y();

    if (keysPressed.ArrowUp) player.y(player.y() - step);
    if (keysPressed.ArrowDown) player.y(player.y() + step);
    if (keysPressed.ArrowLeft) player.x(player.x() - step);
    if (keysPressed.ArrowRight) player.x(player.x() + step);

    // Comprobar colisión con las paredes
    const collision = maze.some((wall) => {
        const rect = new Konva.Rect({
            x: wall.x,
            y: wall.y,
            width: wall.width,
            height: wall.height,
        });
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


// Presionar las teclas
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

let gameRunning = true; 
// Animar obstáculos
function animateObstacles() {
    if (!gameRunning) return; // Detener la animación si el juego ha terminado

    obstacleShapes.forEach((obstacle) => {
        const shape = obstacle.shape;

        // Mover el obstáculo
        shape.y(shape.y() + obstacle.dy);

        // Rebotar en los bordes superior e inferior
        if (shape.y() + obstacle.radius > 580 || shape.y() - obstacle.radius < 20) {
            obstacle.dy = -obstacle.dy;
        }

        // Comprobar colisión con el jugador
        if (Konva.Util.haveIntersection(player.getClientRect(), shape.getClientRect())) {
            gameRunning = false; // Detener el juego
            alert('¡Perdiste! Has tocado un obstáculo.');
            location.reload(); // Reiniciar la página
        }
    });

    layer.batchDraw();
    if (gameRunning) requestAnimationFrame(animateObstacles);
}


// Comprobar si el jugador llega a la meta
// Comprobar si el jugador llega a la meta
// Comprobar si el jugador llega a la meta
function checkWin() {
    if (!gameRunning) return;

    if (Konva.Util.haveIntersection(player.getClientRect(), goal.getClientRect())) {
        gameRunning = false;
        alert('¡Ganaste!');

        // Si estamos en el último nivel, recargar el nivel actual
        if (currentLevelIndex === 1) {
            loadLevel(currentLevelIndex);  
            collectedCoins = 0; // Restablecer las monedas recolectadas
            gameRunning = true; 
            alert("¡Has completado todos los niveles!");
        } else if (currentLevelIndex < levels.length - 1) {
            // Si no es el último nivel, cargar el siguiente nivel
            loadLevel(currentLevelIndex + 1);
            collectedCoins = 0; // Restablecer las monedas recolectadas
            gameRunning = true; // Continuar el juego
        } else {
            alert("¡Has completado todos los niveles!");
        }
        resetKeysPressed();

    }
}




layer.on('draw', checkWin);

loadLevel(0);

// Iniciar la animación del jugador
requestAnimationFrame(movePlayer);

// Iniciar la animación de obstáculos
requestAnimationFrame(animateObstacles);