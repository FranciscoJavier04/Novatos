<?php
class Usuario
{
    private $id_user;
    private $email;
    private $password;
    private $nombre;
    private $apellidos;
    private $fechaNac;
    private $pais;
    private $codPostal;
    private $telefono;
    private $rol;

    private $imagen;

    public function __construct($email, $password, $nombre, $apellidos, $fechaNac, $pais, $codPostal, $telefono, $rol, $imagen)
    {
        $this->email = $email;
        $this->password = $password;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->fechaNac = $fechaNac;
        $this->pais = $pais;
        $this->codPostal = $codPostal;
        $this->telefono = $telefono;
        $this->rol = $rol;
        $this->imagen = $imagen;
    }

    public function __get($name)
    {
        return $this->$name;
    }

    public function __set($name, $value)
    {
        return $this->$name = $value;
    }

    // Getters
    public function getId()
    {
        return $this->id_user;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getApellidos()
    {
        return $this->apellidos;
    }

    public function getFechaNac()
    {
        return $this->fechaNac;
    }

    public function getPais()
    {
        return $this->pais;
    }

    public function getCodPostal()
    {
        return $this->codPostal;
    }

    public function getTelefono()
    {
        return $this->telefono;
    }
    public function getRol()
    {
        return $this->rol;
    }

    // Setters
    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;
    }

    public function setFechaNac($fechaNac)
    {
        $this->fechaNac = $fechaNac;
    }

    public function setPais($pais)
    {
        $this->pais = $pais;
    }

    public function setCodPostal($codPostal)
    {
        $this->codPostal = $codPostal;
    }

    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    }

    public function setRol($rol)
    {
        $this->rol = $rol;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function toString()
    {
        return $this->email . " " . $this->password . " " . $this->nombre . " " . $this->apellidos . " " . $this->fechaNac . " " . $this->pais . " " . $this->codPostal . " " . $this->telefono . " " . $this->rol;
    }

    // Métodos adicionales
    /*
    public function saveToDatabase($conn) {
        $passwordHashed = md5($this->password); 
        $sql = "INSERT INTO usuarios (email, password, nombre, apellidos, fecha_nac, pais, cod_postal, telefono, rol) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param(
            "sssssssss",
            $this->email,
            $passwordHashed,
            $this->nombre,
            $this->apellidos,
            $this->fechaNac,
            $this->pais,
            $this->codPostal,
            $this->telefono,
            $this->rol
        );

        if ($stmt->execute()) {
            $this->id = $conn->insert_id; // Obtener el ID generado
            return true;
        } else {
            return false;
        }
    }

    public static function findByEmail($email, $conn) {
        $sql = "SELECT * FROM usuarios WHERE email = ? LIMIT 1";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $data = $result->fetch_assoc();
            $usuario = new Usuario(
                $data['email'],
                $data['password'],
                $data['nombre'],
                $data['apellidos'],
                $data['fecha_nac'],
                $data['pais'],
                $data['cod_postal'],
                $data['telefono'],
                $data['rol']
            );
            $usuario->id = $data['id_user'];
            return $usuario;
        } else {
            return null;
        }
    }
    */
}
?>