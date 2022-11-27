<?php
session_start();
include_once "layouts/head_pagina.php";

if (!isset($_SESSION['Admin'])) { //Si nunca se creado una sesion de admin
    header("Location: index.php");
}

?>
</head>
<body>

    <div>
        <a href="Vista_Registro_Admin.php"><button type="">Agregar administrador</button> </a>
        <a href="Vista_Historial_Instrumentos.php"><button type="">Ver historial de instrumentos</button> </a>
        <a href="Proceso_logout_Usuarios.php?<?php echo 'User=Admin' ?>"><button type="">Cerrar Sesion</button> </a>
    </div>


    <?php
    include_once "layouts/footer_pagina.php";
    ?>