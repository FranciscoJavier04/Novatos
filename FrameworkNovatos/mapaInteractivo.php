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
        #map-container {
            width: 100%;
            height: 500px;
            border: 1px solid #ddd;
            background-color: #f8f9fa;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <h1 class="text-center mb-4">Reserva de Mesas</h1>
        <div class="row">
            <div class="col-md-8">
                <div id="map-container"></div>
            </div>
            <div class="col-md-4">
                <h3>Detalles de la Reserva</h3>
                <ul class="list-group" id="reservation-list">
                    <li class="list-group-item">No hay mesas añadidas.</li>
                </ul>
                <button id="reset-btn" class="btn btn-danger mt-3">Reiniciar Mapa</button>
            </div>
        </div>
    </div>

    <script>
        // Crear el escenario de Konva
        const stage = new Konva.Stage({
            container: 'map-container',
            width: document.getElementById('map-container').offsetWidth,
            height: document.getElementById('map-container').offsetHeight,
        });

        // Crear una capa
        const layer = new Konva.Layer();
        stage.add(layer);

        const reservationList = document.getElementById('reservation-list');

        // Almacén de mesas
        let tables = [];
        let tableCounter = 1;

        // Función para actualizar la lista de reservas
        function updateReservationList() {
            reservationList.innerHTML = '';
            if (tables.length === 0) {
                reservationList.innerHTML = '<li class="list-group-item">No hay mesas añadidas.</li>';
                return;
            }
            tables.forEach(table => {
                const li = document.createElement('li');
                li.className = 'list-group-item d-flex justify-content-between align-items-center';
                li.textContent = `Mesa ${table.id}`;
                const deleteBtn = document.createElement('button');
                deleteBtn.className = 'btn btn-sm btn-danger';
                deleteBtn.textContent = 'Eliminar';
                deleteBtn.addEventListener('click', () => {
                    // Eliminar mesa
                    const circle = layer.findOne(`#table-${table.id}`);
                    circle.destroy();
                    tables = tables.filter(t => t.id !== table.id);
                    updateReservationList();
                    layer.draw();
                });
                li.appendChild(deleteBtn);
                reservationList.appendChild(li);
            });
        }

        // Agregar una nueva mesa al hacer clic en el mapa
        stage.on('click', (e) => {
            // Comprobar si el clic es en el escenario (fondo)
            if (e.target === stage) {
                const pos = stage.getPointerPosition();
                const newTable = {
                    id: tableCounter++,
                    x: pos.x,
                    y: pos.y,
                    radius: 30,
                    status: 'free',
                };
                tables.push(newTable);

                const circle = new Konva.Circle({
                    id: `table-${newTable.id}`,
                    x: newTable.x,
                    y: newTable.y,
                    radius: newTable.radius,
                    fill: 'green',
                    stroke: 'black',
                    strokeWidth: 2,
                    draggable: true,
                });

                circle.on('click', () => {
                    if (newTable.status === 'free') {
                        newTable.status = 'reserved';
                        circle.fill('red');
                    } else {
                        newTable.status = 'free';
                        circle.fill('green');
                    }
                    circle.draw();
                    updateReservationList();
                });

                layer.add(circle);
                layer.draw();
                updateReservationList();
            }
        });

        // Botón para reiniciar el mapa
        document.getElementById('reset-btn').addEventListener('click', () => {
            tables = [];
            tableCounter = 1;
            layer.destroyChildren();
            layer.draw();
            updateReservationList();
        });

        updateReservationList();
    </script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
