<?php
require 'vendor/autoload.php';
include("includes/a-config.php"); ?>
<!DOCTYPE html>

<head>
    <?php include("includes/head-tag-contents.php"); ?>
    <!-- Konva.js -->
    <script src="https://cdn.jsdelivr.net/npm/konva@9.2.0/konva.min.js"></script>
</head>

<body class="bg-info">
    <?php include("includes/navigation.php"); ?>
    <!-- Contenedor principal con diseño Bootstrap -->
    <div class="container mt-4">
        <h1 class="mb-4 text-center text-danger">Diseña tu sala</h1>
        <div class="row">
            <!-- Columna para el mapa interactivo -->
            <div class="col-md-8">
                <div id="contenedor-mapa"></div>
                <!-- Botón para cambiar el modo de dibujo (mesas o paredes) -->
                <button id="boton-cambiar-modo" class="mt-3 btn btn-primary">Modo Actual: Mesas</button>
            </div>
            <!-- Columna para los detalles de la sala -->
            <div class="col-md-4">
                <h2 class="text-danger">Detalles de la Sala</h2>
                <!-- Lista dinámica para mostrar elementos añadidos (mesas y paredes) -->
                <ul class="list-group" id="lista-elementos">
                    <li class="list-group-item">No hay elementos añadidos.</li>
                </ul>
                <!-- Botón para reiniciar el mapa -->
                <button id="boton-reiniciar" class="mt-3 btn btn-danger">Reiniciar Mapa</button>
            </div>
        </div>
    </div>

    <script>
        // Crear un escenario Konva (canvas interactivo) dentro del contenedor
        const escenario = new Konva.Stage({
            container: 'contenedor-mapa', // Elemento HTML donde se renderiza
            width: document.getElementById('contenedor-mapa').offsetWidth, // Ancho dinámico del contenedor
            height: document.getElementById('contenedor-mapa').offsetHeight, // Alto dinámico del contenedor
        });

        // Crear una capa dentro del escenario para manejar elementos gráficos
        const capa = new Konva.Layer();
        escenario.add(capa);

        // Referencias a elementos del DOM
        const listaElementos = document.getElementById('lista-elementos');
        const botonCambiarModo = document.getElementById('boton-cambiar-modo');

        // Variables para manejar el estado de los elementos y modo de dibujo
        let mesas = []; // Almacena mesas creadas
        let paredes = []; // Almacena paredes creadas
        let contadorMesas = 1; // Contador único para identificar mesas
        let modoDibujo = 'mesa'; // Modo actual ('mesa' o 'pared')

        // Actualiza la lista de elementos en el panel lateral
        function actualizarListaElementos() {
            listaElementos.innerHTML = '';
            if (mesas.length === 0 && paredes.length === 0) {
                listaElementos.innerHTML = '<li class="list-group-item">No hay elementos añadidos.</li>';
                return;
            }

            // Mostrar mesas en la lista
            if (mesas.length > 0) {
                const encabezadoMesas = document.createElement('li');
                encabezadoMesas.className = 'list-group-item active text-dark';
                encabezadoMesas.textContent = 'Mesas';
                listaElementos.appendChild(encabezadoMesas);

                mesas.forEach(mesa => {
                    const li = document.createElement('li');
                    li.className = 'list-group-item d-flex justify-content-between align-items-center';
                    li.textContent = `Mesa ${mesa.id}`;
                    // Botón para eliminar mesas
                    const botonEliminar = document.createElement('button');
                    botonEliminar.className = 'btn btn-sm btn-danger';
                    botonEliminar.textContent = 'Eliminar';
                    botonEliminar.addEventListener('click', () => {
                        const circulo = capa.findOne(`#mesa-${mesa.id}`);
                        circulo.destroy(); // Eliminar la mesa del canvas
                        mesas = mesas.filter(m => m.id !== mesa.id); // Quitar de la lista
                        actualizarListaElementos();
                        capa.draw();
                    });
                    li.appendChild(botonEliminar);
                    listaElementos.appendChild(li);
                });
            }

            // Mostrar paredes en la lista
            if (paredes.length > 0) {
                const encabezadoParedes = document.createElement('li');
                encabezadoParedes.className = 'list-group-item active text-dark';
                encabezadoParedes.textContent = 'Paredes';
                listaElementos.appendChild(encabezadoParedes);

                paredes.forEach((pared, indice) => {
                    const li = document.createElement('li');
                    li.className = 'list-group-item d-flex justify-content-between align-items-center';
                    li.textContent = `Pared ${indice + 1}`;
                    // Botón para eliminar paredes
                    const botonEliminar = document.createElement('button');
                    botonEliminar.className = 'btn btn-sm btn-danger';
                    botonEliminar.textContent = 'Eliminar';
                    botonEliminar.addEventListener('click', () => {
                        const linea = capa.findOne(`#pared-${indice}`);
                        linea.destroy(); // Eliminar la pared del canvas
                        paredes.splice(indice, 1); // Quitar de la lista
                        actualizarListaElementos();
                        capa.draw();
                    });
                    li.appendChild(botonEliminar);
                    listaElementos.appendChild(li);
                });
            }
        }

        // Maneja clics en el escenario para agregar mesas o paredes
        escenario.on('click', (e) => {
            if (e.target === escenario) {
                const posicion = escenario.getPointerPosition(); // Obtener posición del clic

                if (modoDibujo === 'mesa') {
                    // Crear una nueva mesa
                    const nuevaMesa = {
                        id: contadorMesas++,
                        x: posicion.x,
                        y: posicion.y,
                        radio: 30,
                        estado: 'libre',
                    };
                    mesas.push(nuevaMesa);

                    // Dibujar la mesa como un círculo
                    const circulo = new Konva.Circle({
                        id: `mesa-${nuevaMesa.id}`,
                        x: nuevaMesa.x,
                        y: nuevaMesa.y,
                        radius: nuevaMesa.radio,
                        fill: 'green', // Estado inicial: libre
                        stroke: 'black',
                        strokeWidth: 2,
                        draggable: true, // Permitir arrastrar
                    });

                    // Cambiar el estado de la mesa al hacer clic
                    circulo.on('click', () => {
                        if (nuevaMesa.estado === 'libre') {
                            nuevaMesa.estado = 'reservada';
                            circulo.fill('red'); // Estado: reservada
                        } else {
                            nuevaMesa.estado = 'libre';
                            circulo.fill('green'); // Estado: libre
                        }
                        circulo.draw();
                        actualizarListaElementos();
                    });

                    capa.add(circulo);
                } else if (modoDibujo === 'pared') {
                    // Crear una nueva pared (línea)
                    const inicioPared = posicion;
                    let linea = null;

                    escenario.on('mousemove.pared', (eventoMover) => {
                        if (!linea) {
                            // Dibujar línea inicial
                            linea = new Konva.Line({
                                id: `pared-${paredes.length}`,
                                points: [inicioPared.x, inicioPared.y, eventoMover.evt.offsetX, eventoMover.evt.offsetY],
                                stroke: 'black',
                                strokeWidth: 4,
                            });
                            capa.add(linea);
                        } else {
                            // Actualizar puntos de la línea
                            linea.points([inicioPared.x, inicioPared.y, eventoMover.evt.offsetX, eventoMover.evt.offsetY]);
                            linea.draw();
                        }
                    });

                    escenario.on('mouseup.pared', () => {
                        paredes.push({
                            id: paredes.length,
                            puntos: linea.points(),
                        });
                        escenario.off('.pared'); // Detener eventos adicionales
                        actualizarListaElementos();
                    });
                }

                capa.draw();
                actualizarListaElementos();
            }
        });

        // Cambiar entre modo "mesas" y "paredes"
        botonCambiarModo.addEventListener('click', () => {
            modoDibujo = modoDibujo === 'mesa' ? 'pared' : 'mesa';
            botonCambiarModo.textContent = `Modo Actual: ${modoDibujo === 'mesa' ? 'Mesas' : 'Paredes'}`;
        });

        // Reiniciar el mapa
        document.getElementById('boton-reiniciar').addEventListener('click', () => {
            mesas = [];
            paredes = [];
            contadorMesas = 1;
            capa.destroyChildren(); // Eliminar todos los elementos de la capa
            capa.draw();
            actualizarListaElementos();
        });

        // Inicializar la lista de elementos al cargar
        actualizarListaElementos();
    </script>
</body>

</html>