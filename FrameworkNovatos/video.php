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
    <iframe id="youtube-player-1" width="560" height="315"
        src="https://www.youtube.com/embed/nSHrVn5ANZo?enablejsapi=1&controls=0" title="YouTube video player"
        frameborder="0"
        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
        allowfullscreen>
    </iframe>

    <!-- Controles personalizados -->
    <div id="controls-1" class="px-1 my-0 d-flex align-items-center gap-2 flex-wrap bg-secondary text-primary"
        style="width: 560px">
        <button class="toggle-btn btn btn-primary d-flex align-items-center">
            <i class="play-icon fas fa-play"></i>
        </button>


        <button class="rewind-btn btn-secondary d-flex align-items-center">
            <i class="fas fa-backward"></i>
        </button>
        <label>15s</label>


        <button class="forward-btn btn-secondary d-flex align-items-center">
            <i class="fas fa-forward"></i>
        </button>


        <section class="progress-container d-flex align-items-center flex-grow-1 gap-2">
            <span class="current-time text-nowrap">0:00</span>
            <input type="range" class="progress-bar form-range flex-grow-1" min="0" max="100" value="0">
            <span class="total-time text-nowrap">0:00</span>
        </section>


        <section class="d-flex align-items-center gap-2">
            <i class="fas fa-volume-up"></i>
            <input type="range" class="volume-control form-range" min="0" max="100" value="50">
        </section>
    </div>




    <script src="https://www.youtube.com/iframe_api"></script>
    <script src="juegos/scripts/videos.js"></script>


    <?php include("includes/footer.php"); ?>
</body>

</html>s