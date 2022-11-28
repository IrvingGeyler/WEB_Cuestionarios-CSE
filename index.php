<?php
session_start();
session_destroy();
include_once "layouts/head_pagina.php";
?>

</head>


<body>
    <div id="Contenido">
        <div id="Cont-cabecera">
            <!--Dirigir a los distintos logins-->
            <a href='<?php HOME ?>Vista_Paciente_login.php'><button>Paciente</button></a> 

            <a href='<?php HOME ?>Vista_Admin_login.php'><button>Administrador</button></a>
        </div>

        <div id="info-pagina">
            Informacion de la info-pagina
        </div>


    </div>
</body>

<?php include_once "layouts/footer_pagina.php"; ?>