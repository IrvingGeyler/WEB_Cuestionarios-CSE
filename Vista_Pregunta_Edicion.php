<?php
include_once "layouts/head_pagina.php";
include("Controladores/Preguntas_controlador.php");
include("Modelos/Respuesta_modelo.php");

$controlPreguntas = new Preguntas_controlador();
$modeloRespuestas = new Respuesta_modelo();
$idPregunta = $_GET['IdPregunta'];
$idInstrumento = $_GET['IdInst'];
$tipo = $_GET['tipo'];


//como objeto
$pregunta = $controlPreguntas->recuperarPreguntaTotal($idPregunta);





?>
<title>Creacion de pregunta</title>
</head>

<body>

    <div id="Contenido">

        <a href="Vista_Instrumento_Edicion_Preguntas.php?<?php echo "Id=" . $idInstrumento; ?> "><button>Regresar</button></a>

        <form action="Pregunta_Proceso_Modificacion.php" method="post" id="cargaDatosPregunta">
            <?php if ($tipo == 0) : ?>
                <div class="datos" style="border: 1px solid black;">

                    <div class="pregunta">
                        <p>Pregunta para respuesta corta</p>
                        <input type="text" name="text_C" id="text_C" value="<?= $pregunta->descripcion ?>" required>
                    </div>

                    <div class="reque">
                        <p>requerido</p>
                        <input type="checkbox" name="requerido" id="requerido">
                    </div>

                </div>
            <?php else : ?>
                <?php if ($tipo == 1) : ?>

                    <div class="datos" style="border: 1px solid black;">

                        <div class="pregunta">
                            <p>Pregunta para respuesta larga</p>
                            <input type="text" name="text_L" id="text_L" value="<?= $pregunta->descripcion ?>" required>
                        </div>

                        <div class="reque">
                            <p>requerido</p>
                            <input type="checkbox" name="requerido" id="requerido" >
                        </div>

                    </div>

                <?php else : ?>
                    <div id="datos" style="border: 1px solid black;">

                        <div class="pregunta">
                            <p>Pregunta</p>
                            <input type="text" name="descripcion" id="descripcion" value="<?= $pregunta->descripcion ?>" required>
                        </div>

                        <div class="valores">
                            <span id="Valor_incial">
                                <p>Valor inicial: 0</p>
                                <input type="text" name="etiqueta_inicial" id="etiqueta_inicial" placeholder="Etiqueta inicial opcional">
                            </span>

                            <span id="Valor_final">
                                <p>Valor final</p>
                                <select name="valorFinal" id="valorFinal" required>
                                    <option value=1>1</option>
                                    <option value=2>2</option>
                                    <option value=3>3</option>
                                    <option value=4>4</option>
                                    <option value=5>5</option>
                                    <option value=6>6</option>
                                    <option value=7>7</option>
                                    <option value=8>8</option>
                                    <option value=9>9</option>
                                    <option value=10>10</option>
                                </select>
                                <input type="text" name="etiqueta_final" id="etiqueta_final" placeholder="Etiqueta final opcional">
                            </span>


                        </div>

                        <div class="reque">
                            <p>requerido</p>
                            <input type="checkbox" name="requerido" id="requerido">
                        </div>

                    </div>
                <?php endif ?>
            <?php endif ?>


            <input type="hidden" name="idInstru" value=<?php echo $idInstrumento ?>>
            <input type="hidden" name="idPregunta" value=<?php echo $idPregunta  ?>>
            <input type="hidden" name="tipo" value=<?php echo $tipo ?>>
            <input type="submit" value="Modificar" name="modificar">
        </form>


    </div>

</body>

</html>