<?php
include_once("./controllers/Usuario.php");
?>
<nav class="navbar navbar-expand-md sticky-top bg-secondary fs-4 fw-bold text-danger">
  <div class="container-fluid">
    <a class="navbar-brand me-auto fs-4 text-danger" href="Index.php">
      <img src="assets/img/LogoSinFondo.png" alt="Logo" id="logo" class="d-none d-md-inline">
      <span id="titulo" class="d-inline d-md-none">ÓNEO</span>
    </a>
    <button class="navbar-toggler border-0 fs-4 text-danger" type="button" data-bs-toggle="collapse"
      data-bs-target="#navbar"><span class="d-none">Hamburguesa</span>
      <i class="fas fa-bars"></i>
    </button>

    <div class="collapse navbar-collapse text-end" id="navbar">
      <ul class="navbar-nav ms-auto me-2">
        <li class="nav-item">
          <a class="nav-link ms-3 me-3 fs-43 text-warning" href="carta.php">Carta</a>
        </li>
        <li class="nav-item">
          <a class="nav-link ms-3 me-3 fs-4 text-warning" href="reservas.php">Reservas</a>
        </li>
        <li class="nav-item">
          <a class="nav-link ms-3 me-3 fs-4 text-warning" href="delivery.php">Delivery</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link ms-3 me-3 dropdown-toggle fs-4 text-danger" id="languageDropdown" role="button"
            data-bs-toggle="dropdown">
            <i class="fas fa-globe-europe"></i> / ES
          </a>
          <ul class="dropdown-menu fs-4 bg-secondary">
            <li><a class="dropdown-item text-danger">Español</a></li>
            <li><a class="dropdown-item text-danger">Inglés</a></li>
            <li><a class="dropdown-item text-danger">Francés</a></li>
            <li><a class="dropdown-item text-danger">Alemán</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <?php

          if (!isset($_SESSION['user'])) {
            ?>
            <a class="nav-link ms-3 me-3 fs-4 text-danger" href="login.php"><span class="d-none">Inicio
                Sesion/Login</span><i class="fas fa-user"></i></a><?php
          } else {
            $imagen_base64 = base64_encode($_SESSION['user']->imagen);

            echo "
              <div class='dropdown'>
                  <button class='btn btn-secondary dropdown-toggle' type='button' id='dropdownMenuButton' data-bs-toggle='dropdown' aria-expanded='false'>
                      <img src='data:image/png;base64,{$imagen_base64}' class='img-nav rounded-circle' alt='Imagen del Usuario' style='width: 40px; height: 40px;' />
                  </button>
                  <ul class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
                      <li><a class='dropdown-item' href='../user.php'>Perfil</a></li>
                      <li><a class='dropdown-item' href='../controllers/cerrarSesion.php'>Cerrar sesión</a></li>
                  </ul>
              </div>";
          }
          ?>
        </li>
        <li class="nav-item">
          <a class="nav-link ms-3 me-3 fs-4 text-danger" href="carrito.php"><span class="d-none">Carro</span><i
              class="fas fa-cart-plus"></i></a>
        </li>
      </ul>
    </div>
  </div>
</nav>