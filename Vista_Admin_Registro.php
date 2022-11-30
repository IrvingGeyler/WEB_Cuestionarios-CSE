<?php
session_start();

include_once "Controladores/Administrador_controlador.php";
$ControlAdmin = new Administrador_Controlador();

if (!isset($_SESSION['Admin'])) { //Si nunca se creado una sesion de admin
 header("Location: index.php");
}

$registroExitoso = false;
if ($_POST) {
    $registroExitoso = $ControlAdmin->registrar_Admin();

    if ($registroExitoso) {
        echo ' <script type="text/javaScript">
         alert("Administrador agregado");
        window.location.href= "Vista_Admin_Principal.php";
         </script> ';
    } else {
        echo '<script type="text/javaScript">
         alert("Fallo al agregar administrador");
         </script> ';
    }
}

include_once "layouts/head_pagina.php";
?>
<title>Registro de administrador</title>
</head>


<body>

    <form action="" method="post">
        <input type="text" name="nombre" placeholder="Primer nombre" required><br>
        <input type="text" name="apellido" placeholder="Primer apellido" required><br>
        <input type="text" name="usuario" placeholder="Nombre de usuario" required><br>
        <input type="password" name="contrasenia" placeholder="Contraseña" required><br>
        <input type="password" name="contrasenia_re" placeholder="Confirmar contraseña" required><br>
        <input type="submit" value="Crear Cuenta">
    </form>
    <a href="Vista_Admin_Principal.php"><button>Cancelar</button></a>


<?php
include_once "layouts/footer_pagina.php";
?>