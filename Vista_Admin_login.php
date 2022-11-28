<?php
session_start();
error_reporting(0); //evitar mensajes de error en la pagina
include_once "Controladores/Administrador_controlador.php";
$ControlAdministrador = new Administrador_Controlador(); //creacion del controlador

if ($_POST) { //logear cuando se active el submit
    $ControlAdministrador->login_Admin();
}

if ($_SESSION['Admin']) { //Si el de la sesion es un admin
    header('Location: Vista_Admin_Principal.php');
}

include_once "layouts/head_pagina.php";
?>

</head>

<body>

    <form action="" method="post">
        <label for="" id="respuesta"></label>
        <input type="text" name="usuario" required placeholder="Nombre de usuario"><br>
        <input type="password" name="contrasenia" required placeholder="Contraseña"><br>
        <input type="password" name="contrasenia_re" required placeholder="Confirmar contraseña"><br>
        <input type="submit" value="Iniciar sesión">

    </form>
    <a href='<?php HOME ?>index.php'><button>Regresar</button></a>

    <?php

    include_once "layouts/footer_pagina.php";
    ?>