<?php
function mostrarFormularioUsuario($usuario = null) {
    $nombre = $usuario ? $usuario['nombre'] : '';
    $email = $usuario ? $usuario['email'] : '';
    $accion = $usuario ? 'Modificar' : 'Insertar';
    ?>
    <form method="post" action="procesarUsuario.php">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" value="<?php echo $nombre; ?>" required>
        <br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $email; ?>" required>
        <br>
        <button type="submit" name="accion" value="<?php echo $accion; ?>"><?php echo $accion; ?></button>
    </form>
    <?php
}
?>