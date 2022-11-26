<?php
session_start();
error_reporting(0); //evitar mensajes de error en la pagina
include_once "Controladores/Paciente_controlador.php";

$ControlPaciente = new Paciente_Controlador(); //creacion del controlador

if ($_POST) {//logear cuando se active el submit
    $ControlPaciente->login();
}

if ($_SESSION['Paciente']) { //Si ya existe una sesion de paciente, ir directo a la pag
    header('Location: principal_Paciente.php');
}

include_once "layouts/head_pagina.php";
?>

</head>
<body>
<form action="" method="post">
    <label for="" id="respuesta"></label>
    <input type="text" name="usuario" required placeholder="Nombre de usuario"><br>
    <input type="password" name="contraseña" required placeholder="Contraseña"><br>
    <input type="password" name="confirmContra" required placeholder="Confirmar contraseña"><br>
    <input type="submit" value="Iniciar sesión">

</form>

<div>
    <a href='<?php HOME ?>index.php'><button>Regresar</button></a>
    <p>¿Aun no posee un cuenta? <a href="registro_Paciente.php">Registrarse</a></p>
</div>


<?php
include_once "layouts/footer_pagina.php";
?>