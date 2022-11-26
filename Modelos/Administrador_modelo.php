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
    private $Administrador; 

    //constructor

    public function __construct()
    {
        require_once("Conexion.php");
        $this->Administrador = array();
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


    //getters
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
    function getAdministrador(){

    }


    //funcion para registrar a un administrador
    public function guardarAdmin() {
       
    }




    //Funcion para logear al administrador
    public function login($usuario, $contraseña)
    {
        $idEncontrado = -1;
        $sql = "SELECT * FROM administradores WHERE usuario = '$usuario' AND contraseña ='$contraseña'";
        $login = $this->baseDatos->query($sql);

        if ($login && $login->num_rows == 1) {
            $datosAdmin = mysqli_fetch_array($login);
           
            return $idEncontrado = $datosAdmin[0];
        }

        return $idEncontrado;
    }
}