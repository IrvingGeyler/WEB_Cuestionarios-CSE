<?php
session_start();
error_reporting(0); //evitar mensajes de error en la pagina
include_once "Controladores/Admnistrador_controlador.php";
$ControlAdministrador = new Administrador_Constrolador(); //creacion del controlador

if ($_POST) {//logear cuando se active el submit
    $ControlAdministrador->login();
}

if ($_SESSION['Admin']) {

    header('Location: principal_Admin.php');
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
<a href='<?php HOME ?>index.php'><button>Regresar</button></a>

<?php

include_once "layouts/footer_pagina.php";
?>