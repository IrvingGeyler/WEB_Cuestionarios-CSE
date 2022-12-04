<?php

class Administrador_Modelo
{

    //atributos
    private $idAdministrador;
    private $primerNombre;
    private $apellidoPaterno;
    private $usuario;
    private $contraseña;
    private $baseDatos;

    //constructor

    public function __construct()
    {
        require_once("Conexion.php");
        $this->baseDatos = BaseDatos::conectar();
    }


    //getters
    function getIdAdmin()
    {
        return $this->idAdministrador;
    }

    function getPrimerNombre()
    {
        return $this->primerNombre;
    }

    function getApellidoPaterno()
    {
        return $this->apellidoPaterno;
    }

    function getUsuario()
    {
        return $this->usuario;
    }

    function getContraseña()
    {
        return $this->contraseña;
    }


    //setters
    function setPrimerNombre($Nombre)
    {
        $this->primerNombre = $this->baseDatos->real_escape_string($Nombre);
    }

    function setApellidoPaterno($ApellidoPaterno)
    {
        $this->apellidoPaterno = $this->baseDatos->real_escape_string($ApellidoPaterno);
    }

    function setUsuario($Usuario)
    {
        $this->usuario = $this->baseDatos->real_escape_string($Usuario);
    }

    function setContraseña($Contraseña)
    {
        $this->contraseña = $this->baseDatos->real_escape_string($Contraseña);
    }


    //Funcion para buscar la inforamacion del administrador
    function getAdministrador()
    {
    }


    //funcion para registrar a un administrador
    public function guardar_Admin()
    {
        $guardado = false;
        $sql = "INSERT INTO administradores(primerNombre ,  apellidoPaterno , usuario,contraseña) VALUES
         ('{$this->getPrimerNombre()}','{$this->getApellidoPaterno()}','{$this->getUsuario()}','{$this->getContraseña()}')";
        $guardado = $this->baseDatos->query($sql);
        return $guardado;
    }




    //Funcion para logear al administrador
    public function login($usuario, $contraseña)
    {
        $AdminEncontrado = false;
        $sql = "SELECT * FROM administradores WHERE usuario = '$usuario' AND contraseña ='$contraseña'";
        $login = $this->baseDatos->query($sql);
        if ($login && $login->num_rows == 1) {
            $AdminEncontrado = $login ->fetch_object(); //administrador recuperado
        }
        return $AdminEncontrado;
    }
}
?>