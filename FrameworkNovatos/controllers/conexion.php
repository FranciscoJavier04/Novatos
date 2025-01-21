<?php
class ConexionDB extends mysqli
{
    private $servidor = "localhost";
    private $usuario = "root";
    private $contrasena = "";
    private $nombre_base_de_datos = "oneo";
    private $conexion;

    public function __construct()
    {
        $this->conectar();
    }

    private function conectar()
    {
        $this->conexion = new mysqli(
            $this->servidor,
            $this->usuario,
            $this->contrasena,
            $this->nombre_base_de_datos
        );

        // Comprobar la conexión
        if ($this->conexion->connect_error) {
            die("Error en la conexión: " . $this->conexion->connect_error);
        }
    }

    public function ejecutarConsulta($sql)
    {
        $resultado = $this->conexion->query($sql);

        if ($this->conexion->error) {
            die("Error en la consulta: " . $this->conexion->error);
        }

        return $resultado;
    }

    public function cerrarConexion()
    {
        $this->conexion->close();
    }
}