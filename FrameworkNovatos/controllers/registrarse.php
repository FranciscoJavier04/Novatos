<?php
session_start();
include("conexion.php");

try {
    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        print_r($_POST);

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

        if ($password !== $confirm_password) {
            header("Location: ../registro.php?error=111");
            exit();
        }

        // Preparar consulta para verificar si el correo ya está registrado

        $conn = new ConexionDB();
        $sql_check = "SELECT id_user FROM usuarios WHERE email = '$email' LIMIT 1";

        $result = $conn->ejecutarConsulta($sql_check);
        if ($result->num_rows > 0) {
            $conn->cerrarConexion();
            header("Location: ../registro.php?error=101");
            exit();
        }
        $conn = new ConexionDB();
        // Insertar nuevo usuario
        echo "Preparando la insercion";
        $password_hashed = md5($password); // Encriptar contraseña
        $sql_insert = "INSERT INTO usuarios (email, password, nombre, apellidos, fecha_nac, pais, cod_postal, telefono, rol) 
                       VALUES ('$email', '$password_hashed', '$nombre', '$apellidos', '$fecha_nac', '$pais', '$cod_postal', '$telefono', 'user')";
        echo $sql_insert;
        if ($conn->ejecutarConsulta($sql_insert)) {
            header("Location: ../login.php");
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