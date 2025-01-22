<?php
session_start();
include("conexion.php");
try {

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        // Obtener los datos del formulario
        print_r($_POST);
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Preparar consulta para verificar el usuario
        $sql = "SELECT id_user, password, nombre, rol FROM usuarios WHERE email = '$email' LIMIT 1";

        $conn = new ConexionDB();

        if ($result = $conn->ejecutarConsulta($sql)) {
            $conn->cerrarConexion();
            if ($result->num_rows === 1) {
                $user = $result->fetch_assoc();
                // Verificar la contraseña
                if (md5($password) === $user["password"]) {
                    // Iniciar sesión
                    $_SESSION['user_id'] = $user['id_user'];
                    $_SESSION['nombre'] = $user['nombre'];
                    $_SESSION['rol'] = $user['rol'];

                    // Redirigir al usuario autenticado
                    header("Location: ../index.php");
                    exit();
                } else {
                    header("Location: ../login.php?error=202");
                    exit();
                }
            } else {
                header("Location: ../login.php?error=202");
                exit();
            }
        } else {
            header("Location: ../login.php?error=999");
            exit();
        }
    }

    //Si no se accede por Post se redirige a Login
    header("Location: ../login.php");
    exit();

} catch (Exception $e) {
    header("Location: ../login.php?error=999");
    exit();
}
?>