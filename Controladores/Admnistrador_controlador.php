<?php

require_once("Modelos/Administrador_modelo.php");

class Administrador_Constrolador
{

    function __construct()
    {
    }

    /**
     * Metodo para el login
     */
    function login()
    {
        if (isset($_POST)) {
            if (isset($_POST['usuario']) && isset($_POST['contraseña'])) {
                $Admin = new Administrador_Modelo();
                $usuario = $_POST['usuario'];
                $contraseña = $_POST['contraseña'];

                $IDAdmin = $Admin->login($usuario, $contraseña);

                if ($IDAdmin !== -1) {
                    $_SESSION['Admin'] = true;
                    $_SESSION['IdAdmin'] = $IDAdmin;
                    header('Location: principal_Admin.php');
                } else {
                    echo "fallo";
                }
            }
        }
    }
}
