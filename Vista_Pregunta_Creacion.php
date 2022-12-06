<?php
include_once "layouts/head_pagina.php";

$idInstrumento = $_GET['IdInst'];
$ordenPre = $_GET['ordenPre'];
$idPregunta = $_GET['IdPregunta'];

?>
<title>Creacion de pregunta</title>
</head>

<body>

    <div id="Contenido">

        <a href="Vista_Instrumento_Edicion_Preguntas.php?<?php echo "Id=" . $idInstrumento; ?> "><button>Regresar</button></a>

        <form action="Pregunta_Proceso_Creacion.php" method="post" id="cargaDatosPregunta" >

            <select name="tipo_pregunta" id="tipo_pregunta" required>
                <option value=-1>Elija un tipo de pregunta</option>
                <option value=0>Respuesta corta</option>
                <option value=1>Respuesta larga</option>
                <option value=2>Lineal</option>
            </select>

            <div id="apartado_datos" onsubmit="comprobarTipo(); return false">

            </div>
            <input type="hidden" name="idInstru" value=<?php echo $idInstrumento ?>>
            <input type="hidden" name="ordenPre" value=<?php echo $ordenPre ?>>
            <input type="submit" value="Crear" name="crear" onclick=" return comprobarTipo()">
        </form>

        <a href= <?php echo 'Pregunta_Proceso_Duplicacion.php?IdInst='.$idInstrumento.'&ordenPre='.$ordenPre.'&IdPregunta='.$idPregunta.'';?>><button>Duplicar pregunta <?php echo $ordenPre ?></button></a>

    </div>

    <script type="text/javaScript">

        function comprobarTipo() {
            let tipoPregunta = document.getElementById("tipo_pregunta"); //tipo pregunta
            if (tipoPregunta.value == -1) {
                alert("Elija un tipo de pregunta");
                return false;
	        }else{
                return true;
            }
        }
    </script>

    <script src="js/creacion_datos_pregunta.js"></script>

</body>

</html>