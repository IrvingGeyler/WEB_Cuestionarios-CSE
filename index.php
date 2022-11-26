<?php  
    session_start();
    session_destroy();
    include_once "layouts/head_pagina.php"; 
?>


</head>
<body>
<body>

    <body>
        <div id="Contenido">
            <div id="Cont-cabecera">

                <a href='<?php HOME?>login_Paciente.php'><button>Paciente</button></a>

                <a href='<?php HOME?>login_Admin.php'><button>Administrador</button></a>
            </div>

            <div id="info-pagina">
                Informacion de la info-pagina
            </div>


        </div>
    </body>

<?php include_once "layouts/footer_pagina.php"; ?>