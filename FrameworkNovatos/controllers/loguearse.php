<?php
session_start();
include("conexion.php");


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Obtener los datos del formulario
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Preparar consulta para verificar el usuario
    $sql = "SELECT id_user, password, nombre, rol FROM usuarios WHERE email = ? LIMIT 1";

    $conn = new ConexionDB();
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();

            // Verificar la contraseña
            if (password_verify($password, $user['password'])) {
                // Iniciar sesión
                $_SESSION['user_id'] = $user['id_user'];
                $_SESSION['nombre'] = $user['nombre'];
                $_SESSION['rol'] = $user['rol'];

                // Redirigir al usuario autenticado
                header("Location: ../autenticado.php");
                exit();
            } else {
                $_SESSION['error'] = "Contraseña incorrecta.";
            }
        } else {
            $_SESSION['error'] = "Correo electrónico no registrado.";
        }

        $stmt->close();
    } else {
        $_SESSION['error'] = "Error en la consulta. Por favor, inténtalo más tarde.";
    }

    header("Location: ../login.php");
    exit();
}


header("Location: ../login.php");
exit();
?>