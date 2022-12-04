<?php
session_start();

if (!isset($_SESSION['Admin'])) { //Si nunca se creado una sesion de admin
    header("Location: index.php");
}

$idInstrumento = $_GET['Id'];

include "Controladores/Preguntas_controlador.php";

$control = new Preguntas_controlador();
$Preguntas = $control->recuperarPreguntas($idInstrumento);

include_once "layouts/head_pagina.php";

?>
<title>Edicion</title>
<style>
    th{
        border: 1px solid black;
    }
</style>
</head>
<body>
<div id="contenido">

<a href="Vista_Admin_Principal.php"><button>Regresar</button></a>

    <div class="columna">
        <h2>Preguntas</h2>
        
        <table class="table">
            <thead>
                <tr>
                    <th>Orden</th>
                    <th>Tipo</th>
                    <th>Descripcion</th>
                    <th>Requerido</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <!-- Preguntas -->
                <tbody>
                <tr>
                <?php 
                 $Pregunta = mysqli_fetch_array($Preguntas,MYSQLI_ASSOC);
                 echo '<td> '.$Pregunta['ordenPregunta'].'</td>';

                 if($Pregunta['tipo'] == 0){
                  echo "<td>Texto corto</td>";
                 } else{
                    if ($Pregunta['tipo'] == 1) {
                        echo "<td>Texto Largo</td>";
                    }else{
                        echo "<td>Escalar</td>";
                    }
                 }

                 echo '<td> '.$Pregunta['descripcion'].'</td>';
                    if ($Pregunta['requerido'] == 0) {
                        echo '<td> No </td>';
                    }else{
                        echo '<td> Si </td>';
                    }
                 echo '<td> <a href="Vista_Pregunta_Creacion.php?IdInst='.$idInstrumento.'&ordenPre='.$Pregunta['ordenPregunta'].'">Agregar</a> </td>';
                ?>
                </tr>
                

                <?php  while ($Pregunta = mysqli_fetch_array($Preguntas,MYSQLI_ASSOC)): ?>
                    <tr>
                    <td><?php echo $Pregunta['ordenPregunta'] ?></td>

                    <?php if($Pregunta['tipo'] == 0) :?>
                        <td>Texto corto</td>
                    <?php else:?>
                        <?php if($Pregunta['tipo'] == 1) :?>
                            <td>Texto Largo</td>
                         <?php else:?>
                            <td>Escalar</td> 
                         <?php endif ?>
                    <?php endif ?>
                    
                    <td><?php echo  $Pregunta['descripcion'] ?></td>
                    
                    <?php if($Pregunta['requerido'] == 0) :?>
                        <td>No</td>
                    <?php else:?>
                        <td>Si</td>
                    <?php endif ?>
                    
                    <td>Agregar</td>
                    </tr>
                <?php endwhile ?>
                </tbody>

        </table>

    </div>


</div>



<?php include_once "layouts/footer_pagina.php"; ?>