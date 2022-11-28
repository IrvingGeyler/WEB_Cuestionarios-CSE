<?php
session_start();
include_once "layouts/head_pagina.php";

if (!isset($_SESSION['Admin'])) { //Si nunca se creado una sesion de admin
    header("Location: index.php");
}

?>
</head>

<body>

    <div id="banner_Admin">
        <a href="Vista_Admin_Registro.php"><button type="">Agregar administrador</button> </a>
        <a href="Vista_Historial_Instrumentos.php"><button type="">Ver historial de instrumentos</button> </a>
        <a href="Proceso_logout_Usuarios.php?<?php echo 'User=Admin' ?>"><button type="">Cerrar Sesion</button> </a>
    </div>

    <div id="datos_admin">


    </div>

    <div id="Contenido_admin">

        <div id="apartado_agregar_instrumento">
            <a href="Vista_Instrumento_Creacion.php"><button type="">Crear instrumento</button> </a>
        </div>

        <div id="instrumentos_registrados">
            <!--Tabla de los instrumentos-->
            <table>


            </table>

        </div>

    </div>


    <?php
    include_once "layouts/footer_pagina.php";
    ?>