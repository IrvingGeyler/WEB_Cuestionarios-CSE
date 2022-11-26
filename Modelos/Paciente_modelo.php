<?php

class Paciente_Modelo
{

    //atributos
    private $idPaciente;
    private $primerNombre;
    private $apellidoPaterno;
    private $estadoCivil;
    private $fechaNacimiento;
    private $sexo;
    private $escolaridad;
    private $ocupacion;
    private $usuario;
    private $contraseña;
    private $baseDatos;
    private $Pacientes;


    //constructor
    public function __construct()
    {
        require_once("Conexion.php");

        $this->baseDatos = BaseDatos::conectar();
    }

    //getters
    function getId_Paciente()
    {
        return $this->idPaciente;
    }

    function getNombre_Paciente()
    {
        return $this->primerNombre;
    }

    function getApellidoPaterno()
    {
        return $this->apellidoPaterno;
    }

    function getEstadoCivil()
    {
        return $this->estadoCivil;
    }

    function getFechaNacimiento()
    {
        return $this->fechaNacimiento;
    }

    function getSexo()
    {
        return $this->sexo;
    }

    function getEscolaridad()
    {
        return $this->escolaridad;
    }

    function getOcupacion()
    {
        return $this->ocupacion;
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
    function setId_Paciente($idPaciente)
    {
        $this->idPaciente = $idPaciente;
    }

    function setNombre_Paciente($primerNombre)
    {
        $this->primerNombre = $primerNombre;
    }

    function setApellidoPaterno($apellidoPaterno)
    {
        $this->apellidoPaterno = $apellidoPaterno;
    }

    function setEstadoCivil($estadoCivil)
    {
        $this->estadoCivil = $estadoCivil;
    }

    function setFechaNacimiento($fechaNacimiento)
    {
        $this->fechaNacimiento = $fechaNacimiento;
    }

    function setSexo($sexo)
    {
        $this->sexo = $sexo;
    }

    function setEscolaridad($escolaridad)
    {
        $this->escolaridad = $escolaridad;
    }

    function setOcupacion($ocupacion)
    {
        $this->ocupacion = $ocupacion;
    }

    function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    }

    function setConstraseña($contraseña)
    {
        $this->contraseña = $contraseña;
    }


    //Funcion para registrar a un paciente
    public function registrar()
    {   
        $idPaciente = -1;
        $consulta = "INSERT INTO pacientes(primerNombre,apellidoPaterno,
        estadoCivil,fechaNacimiento,sexo,escolaridad,ocupacion, usuario ,contraseña) 
        values ('{$this->getNombre_Paciente()}','{$this->getApellidoPaterno()}','{$this->getEstadoCivil()}',
        '{$this->getFechaNacimiento()}','{$this->getSexo()}','{$this->getEscolaridad()}',
        '{$this->getOcupacion()}','{$this->getUsuario()}','{$this->getContraseña()}')";
        $registro = $this->baseDatos->query($consulta);

        if ($registro) {
            $idPaciente = $this->login($this->getUsuario(),$this->getContraseña());
           
        }
        return  $idPaciente;
    }

    //Metodo para bucar al paciente 
    public function buscarPaciente($idPaciente)
    {
    }

    //Funcion para logear
    public function login($usuario, $contraseña)
    {
        $idEncontrado = false;
        $sql = "SELECT * FROM pacientes WHERE usuario = '$usuario' AND contraseña ='$contraseña'";
        $login = $this->baseDatos->query($sql);

        if ($login && $login->num_rows == 1) {
            $datosPaciente = mysqli_fetch_array($login);

           $idEncontrado = $datosPaciente[0];
        }

        return $idEncontrado;
    }
}
