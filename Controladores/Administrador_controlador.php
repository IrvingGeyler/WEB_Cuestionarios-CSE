<?php

require_once("Modelos/Administrador_modelo.php");

class Administrador_Controlador
{
    //Construcctor
    function __construct()
    {
    }


    /**
     * Metodo para buscar aun admiministrador
     */
     


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
                $nuevoAdmin = new Administrador_Modelo();
                $nuevoAdmin->setPrimerNombre($nombre);
                $nuevoAdmin->setApellidoPaterno($apellido);
                $nuevoAdmin->setUsuario($usuario);
                $nuevoAdmin->setContraseña($password);
                $conseguido = $nuevoAdmin->guardar_Admin(); //obtener un resultado
            }
        }
        return $conseguido;
    }


    /**
     * Metodo para el login de administrador
     */
    public function login_Admin()
    {
        $LoginFallido = -1; //ID si no existe
        if (isset($_POST)) { //Si fue mandado algo por post

            if (isset($_POST['usuario']) && isset($_POST['contrasenia'])) { //comprobar que no esten vacios

                $Admin = new Administrador_Modelo(); //Creacion de modelo para verificar login
                $usuario = $_POST['usuario'];
                $contraseña = $_POST['contrasenia'];
                $IDAdmin = $Admin->login($usuario, $contraseña);

                if ($IDAdmin !== $LoginFallido) {//si existe
                    $_SESSION['Admin'] = true;
                    $_SESSION['IdAdmin'] = $IDAdmin;
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