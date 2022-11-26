<?php

require_once("Modelos/Paciente_modelo.php");

class Paciente_Controlador
{

    public function __construct()
    {
    }

    public function login()
    {
        if (isset($_POST['usuario']) && isset($_POST['contraseña'])) {
            $Paciente = new Paciente_Modelo();
            $usuario = $_POST['usuario'];
            $contraseña = $_POST['contraseña'];
            //En tratamiento
            $IDPaciente = $Paciente->login($usuario, $contraseña);

            if ($IDPaciente !== -1) {
                $_SESSION['Paciente'] = true;
                $_SESSION['IdPaciente'] = $IDPaciente;
                header('Location: principal_Paciente.php');
                echo "aqui";
            } else {
                echo "fallo";
            }
        }
    }

    public function registrar()
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
            isset($_POST['contraseñaNuevo'])
        ) {
            $NuevoPaciente = new Paciente_Modelo();
            $nacimiento=date("Ymd",strtotime($_POST['Fecha_naci']));
            //En tratamiento
            $NuevoPaciente -> setNombre_Paciente($_POST['nombreNuevo']);
            $NuevoPaciente -> setApellidoPaterno($_POST['apellidoPaterno']);
            $NuevoPaciente -> setEstadoCivil($_POST['estadoCivil']);
            $NuevoPaciente -> setFechaNacimiento($nacimiento);
            $NuevoPaciente -> setSexo($_POST['sexo']);
            $NuevoPaciente -> setEscolaridad($_POST['escolaridad']);
            $NuevoPaciente -> setOcupacion($_POST['ocupacion']);
            $NuevoPaciente -> setUsuario($_POST['usuario']);
            $NuevoPaciente -> setConstraseña($_POST['contraseñaNuevo']);

            $IDPaciente = $NuevoPaciente->registrar();//registrar

            if ($IDPaciente !== -1) {
                $_SESSION['Paciente'] = true;
                $_SESSION['IdPaciente'] = $IDPaciente;
                header('Location: principal_Paciente.php');
                echo "aqui";
            } else {
                echo "fallo";
            }
        }
    }
}
