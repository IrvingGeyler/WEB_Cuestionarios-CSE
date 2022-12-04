<?php
session_start();

if (!isset($_SESSION['Admin'])) { //Si nunca se creado una sesion de admin
    header("Location: index.php");
}
include "Controladores/Instrumento_controlador.php";

$Control = new Instrumento_controlador();
$instrumentos = $Control->obtenerIntrumentos();


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
        <label for="">Usuario: <?php echo $_SESSION['Usuario'] ?> </label>
        <label for="">Nombre: <?php echo  $_SESSION['Nombre'] ?></label>
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
                        <th>Creador</th>
                        <th>Autor</th>
                        <th>Fecha de creacion</th>
                        <th>Eliminar</th>
                        <th>Editar preguntas</th>
                        <th>Vista previa</th>
                    </tr>
                </thead>
                <!-- Contenido de los instrumentos-->
                <tbody>

                <?php foreach ($instrumentos as $instrumento) : ?>
                    <tr>
                    <td><?php echo $instrumento['idInstrumento'] ?></td>
                    <td><?php echo $instrumento['titulo'] ?></td>
                    <td><?php echo $instrumento['primerNombre'] ?></td>
                    <td><?php echo $instrumento['autor']?></td>
                    <td><?php echo $instrumento['fechaCreacion']?></td>
                    <td> <a href="Instrumento_Proceso_Eliminacion.php?Id=<?php echo $instrumento['idInstrumento'] ?>">Eliminar</td>
                    <td> <a href="Vista_Instrumento_Edicion.php?Id=<?php echo $instrumento['idInstrumento'] ?>">Editar</a></td>
                    <td> <a href="">VistaPrevia</a></td>
                    </tr>
                <?php endforeach ?>

                </tbody>
                
            </table>

        </div>

    </div>


 <?php include_once "layouts/footer_pagina.php";?>