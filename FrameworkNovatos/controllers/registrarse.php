<?php
include("conexion.php");
include_once("Usuario.php");
session_start();

try {
    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        // Obtener y validar los datos del formulario
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);
        $confirm_password = trim($_POST['conf_password']);
        $nombre = trim($_POST['nombre']);
        $apellidos = trim($_POST['apellidos']);
        $fecha_nac = trim($_POST['fecha_nac']);
        $pais = trim($_POST['pais']);
        $cod_postal = trim($_POST['cod_postal']);
        $telefono = trim($_POST['telefono']);
        $rol = "user";

        // Verificar contraseñas
        if ($password !== $confirm_password) {
            header("Location: ../registro.php?error=111");
            exit();
        }

        // Cargar imagen predeterminada
        $imagen = file_get_contents("../assets/img/user.png");

        // Crear objeto usuario (opcional según tu lógica)
        $user = new Usuario($email, $password, $nombre, $apellidos, $fecha_nac, $pais, $cod_postal, $telefono, $rol, $imagen);

        // Verificar si el correo ya está registrado
        $conn = new ConexionDB();
        $sql_check = "SELECT id_user FROM usuarios WHERE email = ?";
        $stmt_check = $conn->getConexion()->prepare($sql_check);
        $stmt_check->bind_param("s", $email);
        $stmt_check->execute();
        $stmt_check->store_result();

        if ($stmt_check->num_rows > 0) {
            $stmt_check->close();
            $conn->cerrarConexion();
            header("Location: ../registro.php?error=101");
            exit();
        }
        $stmt_check->close();

        // Insertar nuevo usuario con imagen
        $password_hashed = md5($password); // Encriptar contraseña
        $sql_insert = "INSERT INTO usuarios (email, password, nombre, apellidos, fecha_nac, pais, cod_postal, telefono, rol, imagen) 
                       VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt_insert = $conn->getConexion()->prepare($sql_insert);
        $stmt_insert->bind_param(
            "sssssssssb",
            $email,
            $password_hashed,
            $nombre,
            $apellidos,
            $fecha_nac,
            $pais,
            $cod_postal,
            $telefono,
            $rol,
            $null // Se inicializa con un valor nulo temporalmente
        );

        // Enlazar el contenido binario usando send_long_data
        $stmt_insert->send_long_data(9, $imagen); // Índice 9 porque es la décima columna en la consulta

        // Ejecutar consulta
        if ($stmt_insert->execute()) {
            $_SESSION['user'] = $user;
            header("Location: ../index.php");
            exit();
        } else {
            throw new Exception("No se pudo completar el registro. Por favor, inténtalo más tarde.");
        }
    } else {
        // Redirigir al formulario de registro si no es un POST
        header("Location: ../registro.php");
        exit();
    }
} catch (Exception $e) {
    echo $e->getMessage();
    header("Location: ../registro.php?error=999");
    exit();
}
?>