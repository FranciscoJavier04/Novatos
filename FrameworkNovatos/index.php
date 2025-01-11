<?php include("includes/a-config.php"); ?>
<!DOCTYPE html>
<html>

<head>
    <?php include("includes/head-tag-contents.php"); ?>
</head>

<body>
    <?php include("includes/navigation.php"); ?>
    <!--CF2: El container lo tiene que englobar todo-->
    <main class="bg-info text-white fs-4 text-center">

        <div class="portfolio-main p-5">
            <button class="btn-xl rounded-3"><a href="descubrenos.php">DESCÚBRENOS</a></button>
        </div>

        <div class="container py-5 ">
            <!-- Primera tarjeta -->
            <div class="row align-items-center mb-3">
                <div class="col-md-6 p-0 d-flex flex-column align-items-center">
                    <iframe id="youtube-player-1" class="video"
                        src="https://www.youtube.com/embed/nSHrVn5ANZo?enablejsapi=1&controls=0"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen>
                    </iframe>
                    <div id="controls-1"
                        class="px-1 controles my-0 d-flex align-items-center gap-2 flex-wrap bg-secondary text-primary">
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
                </div>
                <div class="col-md-6 p-0">
                    <p>
                        Estoy seguro de que has visto el Padrino, uno de los nuestros o cualquier película de Mafiosos.
                        Pues hoy os traigo Comiendo en el RESTAURANTE DE LA MAFIA en Marbella.
                    </p>
                </div>
            </div>
            <div class="separator"></div>

            <!-- Segunda tarjeta (invertida) -->
            <div class="row align-items-center my-3">
                <div class="col-md-6 p-0 d-flex flex-column align-items-center order-md-1">
                    <iframe id="youtube-player-2" class="video"
                        src="https://www.youtube.com/embed/nSHrVn5ANZo?enablejsapi=1&controls=0"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen>
                    </iframe>
                    <div id="controls-2"
                        class="px-1 controles my-0 d-flex align-items-center gap-2 flex-wrap bg-secondary text-primary">
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
                </div>
                <div class="col-md-6 p-0 order-md-0">
                    <p>
                        Estoy seguro de que has visto el Padrino, uno de los nuestros o cualquier película de Mafiosos.
                        Pues hoy os traigo Comiendo en el RESTAURANTE DE LA MAFIA en Marbella.
                    </p>
                </div>

            </div>
            <div class="separator"></div>

            <!-- Tercera tarjeta -->
            <div class="row align-items-center my-3">
                <div class="col-md-6 p-0 d-flex flex-column align-items-center">
                    <iframe id="youtube-player-3" class="video"
                        src="https://www.youtube.com/embed/nSHrVn5ANZo?enablejsapi=1&controls=0"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen>
                    </iframe>
                    <div id="controls-3"
                        class="px-1 controles my-0 d-flex align-items-center gap-2 flex-wrap bg-secondary text-primary">
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
                </div>
                <div class="col-md-6 p-0">
                    <p>
                        Estoy seguro de que has visto el Padrino, uno de los nuestros o cualquier película de Mafiosos.
                        Pues hoy os traigo Comiendo en el RESTAURANTE DE LA MAFIA en Marbella.
                    </p>
                </div>
            </div>
            <div class="separator"></div>
        </div>
    </main>
    <?php include("includes/footer.php"); ?>
    <script src="https://www.youtube.com/iframe_api"></script>
    <script src="juegos/scripts/videos.js"></script>
</body>

</html>