<footer class="footer text-warning pt-5 pb-5 bg-secondary">
    <div class="container">
        <div class="row justify-content-between">
            <!-- ÓNEO y Dirección -->
            <div class="col-lg-5">
                <div class="d-flex justify-content-center mb-3">
                    <img src="assets/img/LogoSinFondo.png" class="logo me-2" alt="Imagen del Logo">
                    <h1 class="fs7 mb-0">ÓNEO</h1>
                </div>
                <p class="descFooter text-justify">
                    Óneo es un restaurante moderno y lujoso que ofrece una experiencia gastronómica exclusiva,
                    fusionando alta cocina con un diseño elegante y contemporáneo para crear un ambiente sofisticado.
                </p>
                <div class="d-flex">
                    <i class="fas fa-map-marker-alt"></i>
                    <p class="mb-0 ms-2">Dirección: Calle Francisco Villalón nº9, Marbella/España</p>
                </div>
            </div>

            <div class="linea col-lg-3 mx-4">
            </div>

            <!-- Redes Sociales e Información -->
            <div class="col-lg-3">
                <h2 class="fs-4">Redes Sociales</h2>

                <div class="d-flex mb-2">
                    <span class="social-icon me-3 fs-6"><i class="fab fa-instagram"></i> Óneo_Official</span>
                </div>
                <div class="d-flex mb-2">
                    <span class="social-icon fs-6"><i class="fab fa-facebook"></i> Óneo_Official</span>
                </div>
                <div class="d-flex mb-2">
                    <span class="social-icon me-3 fs-6"><i class="fab fa-telegram"></i> Óneo_Official</span>
                </div>
                <div class="d-flex mb-4">
                    <span class="social-icon fs-6"><i class="fab fa-twitter"></i> Óneo_Official</span>
                </div>

                <h2 class="fs-4">Información</h2>

                <div class="d-flex mb-2">
                    <span><i class="fas fa-phone-alt"></i> 635582372</span>
                </div>
                <div class="d-flex">
                    <span><i class="fas fa-envelope"></i> informacion.óneo@gmail.com</span>
                </div>
            </div>

            <!-- Aviso Legal y Políticas -->
            <div class="col-lg-3">
                <a class="fs-4 nav-link " id="avisoLegal" href="avisoLegal.php">Aviso Legal</a>
                <a class="fs-4 nav-link" id="polPri" href="politicaPrivacidad.php">Política de Privacidad</a>
                <a class="fs-4 nav-link" id="polCo" href="politicaCookies.php">Política de Cookies</a>
                <?php
                if (isset($_SESSION['user']) && $_SESSION['user']->getRol() === 'admin') {
                    echo '<div class="mt-4">';
                    echo '<div class="lineao"></div>';
                    echo '<a class="fs-4 nav-link mt-4" id="backend" href="backend.php">Backend</a>';
                    echo '</div>';
                }
                ?>
            </div>


        </div>
    </div>
</footer>