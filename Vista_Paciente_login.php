<?php
session_start();
error_reporting(0); //evitar mensajes de error en la pagina
include_once "Controladores/Paciente_controlador.php";

$ControlPaciente = new Paciente_Controlador(); //creacion del controlador

if ($_POST) {
    $ControlPaciente->login_Paciente();
}

if ($_SESSION['Paciente']) { //Si el de la sesion es un paciente
    header('Location: Vista_Paciente_Principal.php');
}

include_once "layouts/head_pagina.php";
?>
<title>Login paciente</title>
</head>

<body>
    <form action="" method="post">
        <label for="" id="respuesta"></label>
        <input type="text" name="usuario" required placeholder="Nombre de usuario"><br>
        <input type="password" name="contrasenia" required placeholder="Contraseña"><br>
        <input type="password" name="contrasenia_re" required placeholder="Confirmar contraseña"><br>
        <input type="submit" value="Iniciar sesión">

    </form>

    <div>
        <a href='<?php HOME ?>index.php'><button>Regresar</button></a>
        <p>¿Aun no posee un cuenta? <a href="Vista_Paciente_Registro.php">Registrarse</a></p>
    </div>


<?php
include_once "layouts/footer_pagina.php";
?>