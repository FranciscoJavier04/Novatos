let players = {}; // Objeto para almacenar los reproductores por su ID
    let updateIntervals = {}; // Objeto para almacenar los intervalos de actualización

    // Función global de la API de YouTube
    function onYouTubeIframeAPIReady() {
        // Inicializar múltiples reproductores
        initializePlayer('youtube-player-1', 'controls-1');
        initializePlayer('youtube-player-2', 'controls-2');
        initializePlayer('youtube-player-3', 'controls-3');
    }

    // Inicializar un reproductor con sus controles asociados
    function initializePlayer(playerId, controlsId) {
        players[playerId] = new YT.Player(playerId, {
            events: {
                'onReady': (event) => onPlayerReady(event, playerId, controlsId),
                'onStateChange': (event) => onPlayerStateChange(event, controlsId)
            }
        });
    }

    // Cuando un reproductor esté listo
    function onPlayerReady(event, playerId, controlsId) {
        const player = players[playerId];
        const controls = document.getElementById(controlsId);

        const toggleBtn = controls.querySelector('.toggle-btn');
        const rewindBtn = controls.querySelector('.rewind-btn');
        const forwardBtn = controls.querySelector('.forward-btn');
        const volumeControl = controls.querySelector('.volume-control');
        const progressBar = controls.querySelector('.progress-bar');
        const currentTime = controls.querySelector('.current-time');
        const totalTime = controls.querySelector('.total-time');

        let isPlaying = false;

        // Mostrar duración total
        const duration = player.getDuration();
        totalTime.textContent = formatTime(duration);
        progressBar.max = duration;

        // Reproducción/pausa
        toggleBtn.addEventListener('click', () => {
            const icon = toggleBtn.querySelector('.play-icon');
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

        // Retroceder 15 segundos
        rewindBtn.addEventListener('click', () => {
            const current = player.getCurrentTime();
            player.seekTo(Math.max(current - 15, 0), true);
        });

        // Avanzar 15 segundos
        forwardBtn.addEventListener('click', () => {
            const current = player.getCurrentTime();
            player.seekTo(Math.min(current + 15, player.getDuration()), true);
        });

        // Control de volumen
        volumeControl.addEventListener('input', (event) => {
            const volume = event.target.value;
            player.setVolume(volume);
        });

        // Control de progreso
        progressBar.addEventListener('input', (event) => {
            const seekTime = event.target.value;
            player.seekTo(seekTime, true);
        });

        // Actualizar progreso del video
        updateIntervals[playerId] = setInterval(() => {
            const current = player.getCurrentTime();
            progressBar.value = current;
            currentTime.textContent = formatTime(current);
        }, 500);
    }

    // Cuando cambia el estado del reproductor
    function onPlayerStateChange(event, controlsId) {
        if (event.data === YT.PlayerState.ENDED) {
            const controls = document.getElementById(controlsId);
            const icon = controls.querySelector('.play-icon');
            icon.classList.remove('fa-pause');
            icon.classList.add('fa-play');
        }
    }

    // Formatear tiempo
    function formatTime(seconds) {
        const minutes = Math.floor(seconds / 60);
        const secs = Math.floor(seconds % 60);
        return `${minutes}:${secs < 10 ? '0' + secs : secs}`;
    }