<?php
session_start();
include_once "layouts/head_pagina.php"; 
?>
</head>
<body>
<a href="Proceso_logout_Usuarios.php?<?php echo 'User=Paciente' ?>"><button type="" >Cerrar Sesion</button> </a>
<?php
include_once "layouts/footer_pagina.php";
?>