<?php

require_once("Modelos/Administrador_modelo.php");

class Administrador_Controlador
{   
    private $Admin_modelo;
    //Construcctor
    function __construct()
    {
        $this->Admin_modelo = new Administrador_Modelo();
    }

    /**
     * Metodo para registrar un nuevo administrador
     */
    public function registrar_Admin()
    {
        $conseguido = false;
        if (isset($_POST)) { // se recibe algo por post

            $nombre = isset($_POST['nombre']) ? $_POST['nombre']   : false;
            $apellido = isset($_POST['apellido']) ? $_POST['usuario']    : false;
            $usuario = isset($_POST['usuario']) ? $_POST['usuario']    : false;
            $password = isset($_POST['contrasenia']) ? $_POST['contrasenia'] : false;

            if ($nombre && $apellido && $usuario && $password) {
                $this->Admin_modelo->setPrimerNombre($nombre);
                $this->Admin_modelo->setApellidoPaterno($apellido);
                $this->Admin_modelo->setUsuario($usuario);
                $this->Admin_modelo->setContraseña($password);
                $conseguido = $this->Admin_modelo->guardar_Admin(); //obtener un resultado
            }
        }
        return $conseguido;
    }


    /**
     * Metodo para el login de administrador
     */
    public function login_Admin()
    {
        $LoginFallido = false; //Admin no existe
        if (isset($_POST)) { //Si fue mandado algo por post

            if (isset($_POST['usuario']) && isset($_POST['contrasenia'])) { //comprobar que no esten vacios

                $nombreUsuario = $_POST['usuario'];
                $contraseña = $_POST['contrasenia'];
                $AdminEncontrado = $this->Admin_modelo->login($nombreUsuario, $contraseña);

                if ( $AdminEncontrado !== $LoginFallido) {//si existe
                    $_SESSION['Admin'] = true;
                    $_SESSION['IdAdmin'] = $AdminEncontrado->idAdministrador;
                    $_SESSION['Usuario'] = $AdminEncontrado->usuario;
                    $_SESSION['Nombre'] = $AdminEncontrado->primerNombre;
                    header('Location: Vista_Admin_Principal.php');
                } else {
                    header("Location: Vista_Admin_login.php");
                }

            } else {
                header("Location: Vista_Admin_login.php");
            }

        } else {
            header("Location: Vista_Admin_login.php");
        }
    }
}

?>