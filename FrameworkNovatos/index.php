<?php
require 'vendor/autoload.php';
include("includes/a-config.php"); ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <?php include("includes/head-tag-contents.php"); ?>
</head>

<body>
    <?php include("includes/navigation.php"); ?>
    <!--CF2: El container lo tiene que englobar todo-->
    <div class="modal fade" id="modalNovedades" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="modalNovedadesLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalNovedadesLabel">Novedades</h5>
                </div>
                <div class="modal-body">
                    <!-- Carrusel de Novedades -->
                    <div id="carouselNovedades" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <!-- Primera novedad -->
                            <div class="carousel-item active">
                                <img src="assets/img/carta/tartaSantiago.png" class="d-block w-100 img-fluid"
                                    alt="Tarta Santiago">
                                <p class="mt-2 text-center">Postres al 50% de descuento esta semana</p>
                            </div>
                            <!-- Segunda novedad -->
                            <div class="carousel-item">
                                <img src="assets/img/carta/Carrillera.png" class="d-block w-100 img-fluid"
                                    alt="Café Especial">
                                <p class="mt-2 text-center">Prueba nuestro nuestra carrillera de ternera al vino tinto
                                </p>
                            </div>
                            <!-- Tercera novedad -->
                            <div class="carousel-item">
                                <img src="assets/img/carta/Merluza.png" class="d-block w-100 img-fluid"
                                    alt="Promo Desayuno">
                                <p class="mt-2 text-center"> Merluza a la Koskera rebajada por temporada ¡Aprovecha!</p>
                            </div>
                        </div>
                        <!-- Controles del carrusel -->
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselNovedades"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Anterior</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselNovedades"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Siguiente</span>
                        </button>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="aceptarNovedades"
                        data-bs-dismiss="modal">Aceptar</button>
                </div>
            </div>
        </div>
    </div>

    <script src="../controllers/novedades.js"></script>
    <main class="text-center text-white bg-info fs-4">

        <div class="p-5 portfolio-main">
            <button class="btn-xl rounded-3"><a href="descubrenos.php">DESCÚBRENOS</a></button>
        </div>

        <div class="container py-5 ">
            <!-- Primera tarjeta -->
            <div class="mb-3 row align-items-center">
                <div class="p-0 col-md-6 d-flex flex-column align-items-center">
                    <iframe id="youtube-player-1" class="video"
                        src="https://www.youtube.com/embed/nSHrVn5ANZo?enablejsapi=1&controls=0"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen>
                    </iframe>
                    <div id="controls-1"
                        class="flex-wrap gap-2 px-1 my-0 video-controls d-flex align-items-center bg-secondary text-primary">
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
                        <section class="gap-2 progress-container d-flex align-items-center flex-grow-1">
                            <span class="current-time text-nowrap">0:00</span>
                            <input type="range" class="progress-bar form-range flex-grow-1" min="0" max="100" value="0">
                            <span class="total-time text-nowrap">0:00</span>
                        </section>
                        <section class="gap-2 d-flex align-items-center">
                            <i class="fas fa-volume-up"></i>
                            <input type="range" class="volume-control form-range" min="0" max="100" value="50">
                        </section>
                    </div>
                </div>
                <div class="p-0 col-md-6">
                    <p>
                        Estoy seguro de que has visto el Padrino, uno de los nuestros o cualquier película de Mafiosos.
                        Pues hoy os traigo Comiendo en el RESTAURANTE DE LA MAFIA en Marbella.
                    </p>
                </div>
            </div>
            <div class="separator"></div>

            <!-- Segunda tarjeta (invertida) -->
            <div class="my-3 row align-items-center">
                <div class="p-0 col-md-6 d-flex flex-column align-items-center order-md-1">
                    <iframe id="youtube-player-2" class="video"
                        src="https://www.youtube.com/embed/nSHrVn5ANZo?enablejsapi=1&controls=0"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen>
                    </iframe>
                    <div id="controls-2"
                        class="flex-wrap gap-2 px-1 video-controls d-flex align-items-center bg-secondary text-primary">
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
                        <section class="gap-2 progress-container d-flex align-items-center flex-grow-1">
                            <span class="current-time text-nowrap">0:00</span>
                            <input type="range" class="progress-bar form-range flex-grow-1" min="0" max="100" value="0">
                            <span class="total-time text-nowrap">0:00</span>
                        </section>
                        <section class="gap-2 d-flex align-items-center">
                            <i class="fas fa-volume-up"></i>
                            <input type="range" class="volume-control form-range" min="0" max="100" value="50">
                        </section>
                    </div>
                </div>
                <div class="p-0 col-md-6 order-md-0">
                    <p>
                        Estoy seguro de que has visto el Padrino, uno de los nuestros o cualquier película de Mafiosos.
                        Pues hoy os traigo Comiendo en el RESTAURANTE DE LA MAFIA en Marbella.
                    </p>
                </div>

            </div>
            <div class="separator"></div>

            <!-- Tercera tarjeta -->
            <div class="my-3 row align-items-center">
                <div class="p-0 col-md-6 d-flex flex-column align-items-center">
                    <iframe id="youtube-player-3" class="video"
                        src="https://www.youtube.com/embed/nSHrVn5ANZo?enablejsapi=1&controls=0"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen>
                    </iframe>
                    <div id="controls-3"
                        class="flex-wrap gap-2 px-1 video-controls d-flex align-items-center bg-secondary text-primary">
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
                        <section class="gap-2 progress-container d-flex align-items-center flex-grow-1">
                            <span class="current-time text-nowrap">0:00</span>
                            <input type="range" class="progress-bar form-range flex-grow-1" min="0" max="100" value="0">
                            <span class="total-time text-nowrap">0:00</span>
                        </section>
                        <section class="gap-2 d-flex align-items-center">
                            <i class="fas fa-volume-up"></i>
                            <input type="range" class="volume-control form-range" min="0" max="100" value="50">
                        </section>
                    </div>
                </div>
                <div class="p-0 col-md-6">
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