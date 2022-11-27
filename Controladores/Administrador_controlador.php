<?php

require_once("Modelos/Administrador_modelo.php");

class Administrador_Controlador
{

    function __construct()
    {
    }

    /**
     * Metodo para registrar un nuevo administrador
     */

    public function registrar_Admin()
    {
        if (isset($_POST)) { // se recibe algo por post

            $nombre   = isset($_POST['nombre'])   ? $_POST['nombre']   : false;
            $email    = isset($_POST['email'])    ? $_POST['email']    : false;
            $password = isset($_POST['password']) ? $_POST['password'] : false;

            if ($nombre && $email && $password) {
               // $usuario = new Usuario();
               // $usuario->setNombre_usuario($nombre);
               // $usuario->setEmail_usuario($email);
               // $usuario->setPassword_usuario($password);
               // $save = $usuario->save();
               // if ($save) {
                //}
            }
        }
    }


    /**
     * Metodo para el login de administrador
     */
    public function login_Admin()
    {
        $IDAdmin = -1;
        if (isset($_POST)) { //Si fue mandado algo por post
            if (isset($_POST['usuario']) && isset($_POST['contrasenia'])) { //comprobar que no esten vacios

                $Admin = new Administrador_Modelo(); //Creacion de modelo para verificar login
                $usuario = $_POST['usuario'];
                $contraseña = $_POST['contrasenia'];

                $IDAdmin = $Admin->login($usuario, $contraseña);

                if ($IDAdmin !== -1) {
                    $_SESSION['Admin'] = true;
                    $_SESSION['IdAdmin'] = $IDAdmin;
                    header('Location: Vista_Principal_Admin.php');
                } else {
                    header("Location: Vista_login_Admin.php");
                }
            } else {
                echo "Usuario incorrecto";
                header("Location: Vista_login_Admin.php");
            }
        } else {
            echo "Usuario incorrecto";
            header("Location: Vista_login_Admin.php");
        }
    }


    /**
     * Funcion para la cerrar sesion de un administrador
     */
    public function logout_Admin()
    {
        unset($_SESSION['Admin']);
        unset($_SESSION['IdAdmin']);
        session_destroy();
        header("Location:" . HOME . "");
    }
}
