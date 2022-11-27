<?php
session_start();
error_reporting(0);

include_once "Controladores/Admnistrador_controlador.php";

$ControlAdmin = new Administrador_Constrolador();

if ($_POST) {
}

include_once "layouts/head_pagina.php";
?>

</head>

<body>

    <form action="" method="post">
        <input type="text" name="nombre" placeholder="Primer nombre" required><br>
        <input type="text" name="apellido" placeholder="Primer apellido" required><br>
        <input type="text" name="usuario" placeholder="Nombre de usuario" required><br>
        <input type="password" name="contra" placeholder="Contraseña" required><br>
        <input type="password" name="confirmContra" placeholder="Confirmar contraseña" required><br>
        <input type="submit" value="Registrar">
    </form>
    <a href="index.php"><button>Volver al inicio</button></a>


    <?php
    include_once "layouts/footer_pagina.php";
    ?>