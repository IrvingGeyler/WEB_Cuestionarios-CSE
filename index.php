<?php
session_start();
session_destroy();
include_once "layouts/head_pagina.php";
?>
<title>Cuestionarios-CSE</title>
</head>

<body>
    <div id="Contenido" style="border:1px solid black;">
        <div id="Cont-cabecera">
            <div id="titulo-pag">
                <label>Cuestionarios-CSE</label>
            </div>
            <a href='<?php HOME ?>Vista_Paciente_login.php'><button>Paciente</button></a> 

            <a href='<?php HOME ?>Vista_Admin_login.php'><button>Administrador</button></a>
        </div>

        <div id="info-pagina" style="border:1px solid black;">
           <label>Informacion de la info-pagina</label>
        </div>

    </div>

<?php include_once "layouts/footer_pagina.php"; ?>