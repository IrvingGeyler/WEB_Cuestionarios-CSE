<?php

require_once("Modelos/Paciente_modelo.php");

class Paciente_Controlador
{

    //Constructor
    public function __construct()
    {
    }

    /**
     * Funcion para registrar a un paciente
     */
    public function registrar_Paciente()
    {
        if (
            isset($_POST['nombreNuevo']) &&
            isset($_POST['apellidoPaterno']) &&
            isset($_POST['estadoCivil']) &&
            isset($_POST['Fecha_naci']) &&
            isset($_POST['sexo']) &&
            isset($_POST['escolaridad']) &&
            isset($_POST['ocupacion']) &&
            isset($_POST['usuario']) &&
            isset($_POST['contraseniaNuevo'])
        ) {
            $NuevoPaciente = new Paciente_Modelo();
            $nacimiento = date("Ymd", strtotime($_POST['Fecha_naci']));
            //En tratamiento
            $NuevoPaciente->setNombre_Paciente($_POST['nombreNuevo']);
            $NuevoPaciente->setApellidoPaterno($_POST['apellidoPaterno']);
            $NuevoPaciente->setEstadoCivil($_POST['estadoCivil']);
            $NuevoPaciente->setFechaNacimiento($nacimiento);
            $NuevoPaciente->setSexo($_POST['sexo']);
            $NuevoPaciente->setEscolaridad($_POST['escolaridad']);
            $NuevoPaciente->setOcupacion($_POST['ocupacion']);
            $NuevoPaciente->setUsuario($_POST['usuario']);
            $NuevoPaciente->setConstraseña($_POST['contraseniaNuevo']);

            $IDPaciente = $NuevoPaciente->registrar(); //registrar

            if ($IDPaciente !== -1) {
                $_SESSION['Paciente'] = true;
                $_SESSION['IdPaciente'] = $IDPaciente;

                header('Location: Vista_Principal_Paciente.php');
            } else {
                header('Location: Vista_login_Paciente.php');
            }
        }
    }

    /**
     * Funcion para login de un paciente
     */
    public function login_Paciente()
    {
        if (isset($_POST)) { //comprobar envio de post
            $usuario  = isset($_POST['usuario'])   ? $_POST['usuario']   : false;
            $contrasenia = isset($_POST['contrasenia']) ? $_POST['contrasenia'] : false;

            if ($usuario && $contrasenia) {
                $Paciente = new Paciente_Modelo();
                $IDPaciente = $Paciente->login($usuario, $contrasenia);

                if ($IDPaciente !== -1) {
                    $_SESSION['Paciente'] = true;
                    $_SESSION['IdPaciente'] = $IDPaciente;

                    header('Location: Vista_Principal_Paciente.php');
                } else {
                    echo "No existe el paciente";
                    header("Location: Vista_login_Paciente.php");
                }
            } else {
                echo "Usuario incorrecto";
                header("Location: Vista_login_Paciente.php");
            }
        } else {
            echo "Usuario incorrecto";
            header("Location: Vista_login_Paciente.php");
        }
    }

    /**
     * Funcion para la cerrar sesion de un paciente
     */
    public function logout_Paciente()
    {
        unset($_SESSION['Paciente']);
        unset($_SESSION['IdPaciente']);
        session_destroy();
        header("Location:" . HOME . "");
    }
}
