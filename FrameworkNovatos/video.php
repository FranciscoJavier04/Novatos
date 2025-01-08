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
    <div id="custom-controls">
        <button id="play-btn">Play</button>
        <button id="pause-btn">Pause</button>
    </div>

    <!-- Script para la API de YouTube -->
    <script src="https://www.youtube.com/iframe_api"></script>
    <script>
        let player;

        function onYouTubeIframeAPIReady() {
            player = new YT.Player('youtube-player', {
                events: {
                    'onReady': onPlayerReady
                }
            });
        }

        function onPlayerReady(event) {
            document.getElementById('play-btn').addEventListener('click', () => {
                player.playVideo();
            });

            document.getElementById('pause-btn').addEventListener('click', () => {
                player.pauseVideo();
            });

            document.getElementById('stop-btn').addEventListener('click', () => {
                player.stopVideo();
            });
        }
    </script>
    <?php include("includes/footer.php"); ?>
</body>

</html>