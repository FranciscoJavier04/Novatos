<?php include("includes/a-config.php"); ?>
<!DOCTYPE html>
<html>

<head>
    <?php include("includes/head-tag-contents.php"); ?>
</head>

<body>
    <?php include("includes/navigation.php"); ?>
    <h1>Video con Controles Personalizados</h1>

    <!-- Video de YouTube -->
    <iframe id="youtube-player" width="560" height="315"
        src="https://www.youtube.com/embed/nSHrVn5ANZo?enablejsapi=1&controls=0" title="YouTube video player"
        frameborder="0"
        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
        allowfullscreen>
    </iframe>

    <!-- Controles personalizados -->
    <div id="custom-controls" class="w-50 d-flex align-items-center gap-3 flex-wrap">
        <button id="toggle-btn" class="btn btn-primary d-flex align-items-center">
            <i id="play-icon" class="fas fa-play"></i>
        </button>
        <section id="progress-container" class="d-flex align-items-center flex-grow-1 gap-2">
            <span id="current-time" class="text-nowrap">0:00</span>
            <input type="range" id="progress-bar" class="form-range flex-grow-1" min="0" max="100" value="0">
            <span id="total-time" class="text-nowrap">0:00</span>
        </section>
        <div class="d-flex align-items-center gap-2">
            <label for="volume-control" class="form-label mb-0">Volumen:</label>
            <input type="range" id="volume-control" class="form-range" min="0" max="100" value="50">
        </div>
    </div>


    <!-- Script para la API de YouTube -->
    <script src="https://www.youtube.com/iframe_api"></script>
    <script>
        let player;
        let updateInterval;

        function onYouTubeIframeAPIReady() {
            player = new YT.Player('youtube-player', {
                events: {
                    'onReady': onPlayerReady,
                    'onStateChange': onPlayerStateChange
                }
            });
        }

        function onPlayerReady(event) {
            const toggleBtn = document.getElementById('toggle-btn');
            const volumeControl = document.getElementById('volume-control');
            const progressBar = document.getElementById('progress-bar');
            const currentTime = document.getElementById('current-time');
            const totalTime = document.getElementById('total-time');
            let isPlaying = false;

            // Mostrar duración total del video
            const duration = player.getDuration();
            totalTime.textContent = formatTime(duration);
            progressBar.max = duration;

            // Control de reproducción (play/pause)
            toggleBtn.addEventListener('click', () => {
                const icon = document.getElementById("play-icon");
                if (!icon) {
                    console.error("No se encontró el icono dentro del botón.");
                    return;
                }

                if (isPlaying) {
                    player.pauseVideo();
                    icon.classList.remove('fa-pause');
                    icon.classList.add('fa-play');
                } else {
                    player.playVideo();
                    icon.classList.remove('fa-play');
                    icon.classList.add('fa-pause');
                }

                isPlaying = !isPlaying;
            });

            // Control de volumen
            volumeControl.addEventListener('input', (event) => {
                const volume = event.target.value; // Valor del slider (0-100)
                player.setVolume(volume); // Ajustar el volumen en el reproductor
            });

            // Control de progreso
            progressBar.addEventListener('input', (event) => {
                const seekTime = event.target.value; // Tiempo seleccionado por el usuario
                player.seekTo(seekTime, true); // Saltar al tiempo seleccionado
            });

            // Actualizar progreso y tiempo actual
            updateInterval = setInterval(() => {
                if (player && player.getCurrentTime) {
                    const current = player.getCurrentTime();
                    progressBar.value = current;
                    currentTime.textContent = formatTime(current);
                }
            }, 500);
        }

        function onPlayerStateChange(event) {
            if (event.data == YT.PlayerState.ENDED) {
                const icon = document.getElementById("play-icon");
                icon.classList.remove('fa-pause');
                icon.classList.add('fa-play');
            }
        }

        function formatTime(seconds) {
            const minutes = Math.floor(seconds / 60);
            const secs = Math.floor(seconds % 60);
            return `${minutes}:${secs < 10 ? '0' + secs : secs}`;
        }

        window.onYouTubeIframeAPIReady = onYouTubeIframeAPIReady;
    </script>
    <?php include("includes/footer.php"); ?>
</body>

</html>