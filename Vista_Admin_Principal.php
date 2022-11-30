<?php
session_start();

if (!isset($_SESSION['Admin'])) { //Si nunca se creado una sesion de admin
    header("Location: index.php");
}

include_once "layouts/head_pagina.php";
?>
<style>
    th{
        border: 1px solid black;
    }
</style>
<title>Administrador</title>
</head>

<body>

    <div id="banner_Admin" style="border: 1px solid black;">
        <a href="Vista_Admin_Registro.php"><button type="">Agregar administrador</button> </a>
        <a href="Vista_Historial_Instrumentos.php"><button type="">Ver historial de instrumentos</button> </a>
        <label for="">Pagina principal de administracion</label>
        <a href="Proceso_logout_Usuarios.php?<?php echo 'User=Admin' ?>"><button type="">Cerrar Sesion</button> </a>
    </div>

    <div id="datos_admin" style="border: 1px solid black;">
        <label for="">Usuario: </label>
        <label for="">Nombre: </label>
    </div>

    <div id="Contenido_admin">

        <div id="apartado_agregar_instrumento">
            <a href="Vista_Instrumento_Creacion.php?<?php echo 'IdAdmin='.$_SESSION['IdAdmin'];  ?>"><button type="">Crear instrumento</button> </a>
        </div>

        <div id="instrumentos_registrados" style="border: 1px solid black;">
            <!--Tabla de los instrumentos-->
            <table style="border: 1px solid black;">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre del instrumento</th>
                        <th>Autor</th>
                        <th>Fecha de creacion</th>
                        <th>Eliminar</th>
                        <th>Editar</th>
                        <th>Vista previa</th>
                    </tr>
                </thead>
                <!-- Contenido de los instrumentos-->
                <tbody>

                </tbody>
                
            </table>

        </div>

    </div>


 <?php include_once "layouts/footer_pagina.php";?>