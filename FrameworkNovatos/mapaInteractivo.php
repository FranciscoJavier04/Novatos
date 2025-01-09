<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mapa Interactivo de Restaurante</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Konva.js -->
    <script src="https://cdn.jsdelivr.net/npm/konva@9.2.0/konva.min.js"></script>
    <style>
        #contenedor-mapa {
            width: 100%;
            height: 500px;
            border: 1px solid #ddd;
            background-color: #f8f9fa;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <h1 class="mb-4 text-center">Diseña tu sala</h1>
        <div class="row">
            <div class="col-md-8">
                <div id="contenedor-mapa"></div>
                <button id="boton-cambiar-modo" class="mt-3 btn btn-primary">Modo Actual: Mesas</button>
            </div>
            <div class="col-md-4">
                <h3>Detalles de la Sala</h3>
                <ul class="list-group" id="lista-elementos">
                    <li class="list-group-item">No hay elementos añadidos.</li>
                </ul>
                <button id="boton-reiniciar" class="mt-3 btn btn-danger">Reiniciar Mapa</button>
            </div>
        </div>
    </div>

    <script>
        const escenario = new Konva.Stage({
            container: 'contenedor-mapa',
            width: document.getElementById('contenedor-mapa').offsetWidth,
            height: document.getElementById('contenedor-mapa').offsetHeight,
        });

        const capa = new Konva.Layer();
        escenario.add(capa);

        const listaElementos = document.getElementById('lista-elementos');
        const botonCambiarModo = document.getElementById('boton-cambiar-modo');

        let mesas = [];
        let paredes = [];
        let contadorMesas = 1;
        let modoDibujo = 'mesa'; // Alterna entre 'mesa' y 'pared'

        function actualizarListaElementos() {
            listaElementos.innerHTML = '';
            if (mesas.length === 0 && paredes.length === 0) {
                listaElementos.innerHTML = '<li class="list-group-item">No hay elementos añadidos.</li>';
                return;
            }

            if (mesas.length > 0) {
                const encabezadoMesas = document.createElement('li');
                encabezadoMesas.className = 'list-group-item active';
                encabezadoMesas.textContent = 'Mesas';
                listaElementos.appendChild(encabezadoMesas);

                mesas.forEach(mesa => {
                    const li = document.createElement('li');
                    li.className = 'list-group-item d-flex justify-content-between align-items-center';
                    li.textContent = `Mesa ${mesa.id}`;
                    const botonEliminar = document.createElement('button');
                    botonEliminar.className = 'btn btn-sm btn-danger';
                    botonEliminar.textContent = 'Eliminar';
                    botonEliminar.addEventListener('click', () => {
                        const circulo = capa.findOne(`#mesa-${mesa.id}`);
                        circulo.destroy();
                        mesas = mesas.filter(m => m.id !== mesa.id);
                        actualizarListaElementos();
                        capa.draw();
                    });
                    li.appendChild(botonEliminar);
                    listaElementos.appendChild(li);
                });
            }

            if (paredes.length > 0) {
                const encabezadoParedes = document.createElement('li');
                encabezadoParedes.className = 'list-group-item active';
                encabezadoParedes.textContent = 'Paredes';
                listaElementos.appendChild(encabezadoParedes);

                paredes.forEach((pared, indice) => {
                    const li = document.createElement('li');
                    li.className = 'list-group-item d-flex justify-content-between align-items-center';
                    li.textContent = `Pared ${indice + 1}`;
                    const botonEliminar = document.createElement('button');
                    botonEliminar.className = 'btn btn-sm btn-danger';
                    botonEliminar.textContent = 'Eliminar';
                    botonEliminar.addEventListener('click', () => {
                        const linea = capa.findOne(`#pared-${indice}`);
                        linea.destroy();
                        paredes.splice(indice, 1);
                        actualizarListaElementos();
                        capa.draw();
                    });
                    li.appendChild(botonEliminar);
                    listaElementos.appendChild(li);
                });
            }
        }

        escenario.on('click', (e) => {
            if (e.target === escenario) {
                const posicion = escenario.getPointerPosition();

                if (modoDibujo === 'mesa') {
                    const nuevaMesa = {
                        id: contadorMesas++,
                        x: posicion.x,
                        y: posicion.y,
                        radio: 30,
                        estado: 'libre',
                    };
                    mesas.push(nuevaMesa);

                    const circulo = new Konva.Circle({
                        id: `mesa-${nuevaMesa.id}`,
                        x: nuevaMesa.x,
                        y: nuevaMesa.y,
                        radius: nuevaMesa.radio,
                        fill: 'green',
                        stroke: 'black',
                        strokeWidth: 2,
                        draggable: true,
                    });

                    circulo.on('click', () => {
                        if (nuevaMesa.estado === 'libre') {
                            nuevaMesa.estado = 'reservada';
                            circulo.fill('red');
                        } else {
                            nuevaMesa.estado = 'libre';
                            circulo.fill('green');
                        }
                        circulo.draw();
                        actualizarListaElementos();
                    });

                    capa.add(circulo);
                } else if (modoDibujo === 'pared') {
                    const inicioPared = posicion;
                    let linea = null;

                    escenario.on('mousemove.pared', (eventoMover) => {
                        if (!linea) {
                            linea = new Konva.Line({
                                id: `pared-${paredes.length}`,
                                points: [inicioPared.x, inicioPared.y, eventoMover.evt.offsetX, eventoMover.evt.offsetY],
                                stroke: 'black',
                                strokeWidth: 4,
                            });
                            capa.add(linea);
                        } else {
                            linea.points([inicioPared.x, inicioPared.y, eventoMover.evt.offsetX, eventoMover.evt.offsetY]);
                            linea.draw();
                        }
                    });

                    escenario.on('mouseup.pared', () => {
                        paredes.push({
                            id: paredes.length,
                            puntos: linea.points(),
                        });
                        escenario.off('.pared');
                        actualizarListaElementos();
                    });
                }

                capa.draw();
                actualizarListaElementos();
            }
        });

        botonCambiarModo.addEventListener('click', () => {
            modoDibujo = modoDibujo === 'mesa' ? 'pared' : 'mesa';
            botonCambiarModo.textContent = `Modo Actual: ${modoDibujo === 'mesa' ? 'Mesas' : 'Paredes'}`;
        });

        document.getElementById('boton-reiniciar').addEventListener('click', () => {
            mesas = [];
            paredes = [];
            contadorMesas = 1;
            capa.destroyChildren();
            capa.draw();
            actualizarListaElementos();
        });

        actualizarListaElementos();
    </script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
