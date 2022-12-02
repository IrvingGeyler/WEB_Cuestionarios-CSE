<?php
session_start();

$Usuario = $_GET['User'];

function logout_Admin()
{   
    unset($_SESSION['Nombre']);
    unset($_SESSION['Usuario']);
    unset($_SESSION['Admin']);
    unset($_SESSION['IdAdmin']);
    session_destroy();
    header("Location: index.php");
}

function logout_Paciente()
{   
    unset($_SESSION['Paciente']);
    unset($_SESSION['IdPaciente']);
    session_destroy();
    header("Location: index.php");
}


if ($Usuario === 'Admin') {
    logout_Admin();
} else {
    logout_Paciente();
}
?>
