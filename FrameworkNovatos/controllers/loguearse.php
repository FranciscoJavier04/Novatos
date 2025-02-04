<?php
include("conexion.php");
include_once("Usuario.php");
session_start();
try {

    if (empty($_POST['rememberMe'])) {
        setcookie("email", "", time() - 1, "/");
        setcookie("pass", "", time() - 1, "/");
        setcookie("rememberMe", "", time() - 1, "/");
    }

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        // Obtener los datos del formulario
        $email = $_POST['email'];
        setcookie('email', $email, time() + 3, "/");
        $password = $_POST['password'];
        setcookie('pass', $password, time() + 3, "/");

        // Preparar consulta para verificar el usuario
        $sql = "SELECT * FROM usuarios WHERE email = '$email' LIMIT 1";

        $conn = new ConexionDB();

        if ($result = $conn->ejecutarConsulta($sql)) {
            $conn->cerrarConexion();
            if ($result->num_rows === 1) {
                $user = $result->fetch_assoc();
                // Verificar la contraseña
                if (md5($password) === $user["password"]) {
                    // Iniciar sesión

                    $usuario = new Usuario($user['email'], $password, $user['nombre'], $user['apellidos'], $user['fechaNac'], $user['pais'], $user['codPostal'], $user['telefono'], $user['rol'], $user['imagen']);
                    $usuario->setId($user['id']);
                    $_SESSION['user'] = $usuario;

                    print_r($usuario);
                    print_r($_SESSION['user']);
                    if (!empty($_POST['rememberMe'])) {
                        setcookie('email', $usuario->getEmail(), time() + 31 * 24 * 3600, "/");
                        setcookie('pass', $password, time() + 31 * 24 * 3600, "/");
                        setcookie("rememberMe", true, time() + 31 * 24 * 3600, "/");
                    }
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
    echo $e->getMessage();
    header("Location: ../login.php?error=999");
    exit();
}
?>