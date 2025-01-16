<!DOCTYPE html>
<html>
<head>
	<?php include("includes/head-tag-contents.php");?>
</head>
<body>

<?php
//Este script crea la base de datos necesaria para probar el ejemplo.

$servername = "localhost"; //!NO CAMBIAR
$database = "googlelogin"; //!NO CAMBIAR
$username = "dwes"; //¿CAMBIAR?
$password = "abc123."; //¿CAMBIAR?

// Create connection

$conn = mysqli_connect($servername, $username, $password);

// Check connection

if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

$sql = "CREATE DATABASE IF NOT EXISTS $database";

if ($conn->query($sql) === TRUE) {
  echo "<p>Database created successfully</p>";
} else {
  die("Error creating database: " . $conn->error);
}

mysqli_select_db($conn, $database);

$sql = "CREATE TABLE user (".
    "iduser int NOT NULL AUTO_INCREMENT,".
    "firstname varchar(100) NOT NULL,".
    "lastname varchar(100) NOT NULL,".
    "email varchar(100) NOT NULL,".
    "birthdate date NOT NULL,".
    "postalcode varchar(20) NOT NULL,".
    "PRIMARY KEY (iduser),".
    "UNIQUE KEY email_UNIQUE (email)".
    ")";

if ($conn->query($sql) === TRUE) {
  echo "<p>Table user created successfully</p>";
} else {
  die("Error creating table user: " . $conn->error);
}

$conn->close();

?>
</body>
</html>