<?php

include("Controladores/Preguntas_controlador.php");
include("Modelos/Respuesta_modelo.php");

$idInstrumento = $_GET['IdInst'];
$ordenPre = $_GET['ordenPre'];
$idPregunta = $_GET['IdPregunta'];

$controlPreguntas = new Preguntas_controlador();
$modeloRespuestas = new Respuesta_modelo();

//ajustando las preguntas posteriores
$posicionPreguntaCreada = $ordenPre + 1;//posicion que se encontraria la creada
$nuevaPosicionPosterior = $posicionPreguntaCreada + 1;//posicion que se encontrara la siguiente

$posicionOcupada = $controlPreguntas->comprobarPosicionExistente($idInstrumento,$posicionPreguntaCreada);//posicion ocupada


//proceso de duplicacion 
$pregunta = $controlPreguntas->recuperarPreguntaTotal($idPregunta);//pregunta como objeto

//duplicado de informacion segun el tipo
$tipo = $pregunta->tipo;

//ajustar orden para las preguntas
if ($posicionOcupada!=false) {
    $controlPreguntas->ajustarOrdenPreguntas($idInstrumento,$posicionOcupada,$nuevaPosicionPosterior);//realizando ajustes
}

//Proceso de de duplicacion
switch ($tipo) {

    case '0'://si quiere duplicar una pregunta de texto corta
        
        $descripcionPreguta =$pregunta->descripcion;
        $requerido =$pregunta->requerido;

        $controlPreguntas->crearNuevaPregunta($idInstrumento,$posicionPreguntaCreada,$tipo,$descripcionPreguta,$requerido);
        header("Location: Vista_Instrumento_Edicion_Preguntas.php?Id=$idInstrumento");
        break;

    case '1': //si quiere duplicar una pregunta de texto larga
        $descripcionPreguta =$pregunta->descripcion;
        $requerido =$pregunta->requerido;

        $controlPreguntas->crearNuevaPregunta($idInstrumento,$posicionPreguntaCreada,$tipo,$descripcionPreguta,$requerido);
        header("Location: Vista_Instrumento_Edicion_Preguntas.php?Id=$idInstrumento");
        break;

    case '2'://si quiere duplicar una pregunta escalar

        $descripcionPreguta =$pregunta->descripcion;
        $requerido =$pregunta->requerido;

        $controlPreguntas->crearNuevaPregunta($idInstrumento,$posicionPreguntaCreada,$tipo,$descripcionPreguta,$requerido);

        $pregunta =  $controlPreguntas->recuperaPregunta($idInstrumento,$posicionPreguntaCreada,$tipo);//recuperar la pregunta
        $idPreguntaCreada =$pregunta->idPregunta;//recuperando el ide de la pregunta creada

        $respuestasRecuperadas = null;
        $respuestasRecuperadas = $modeloRespuestas->recueperarRespuestas($idPregunta);//recuperacion de las respuestas
        foreach ($respuestasRecuperadas  as $respuestaRecuperada) {
           $datoRes = $respuestaRecuperada['respuesta'];
           $datoValor = $respuestaRecuperada['valor'];
           $datoEti =  $respuestaRecuperada['etiqueta'];

            $respuestaDuplicada = new Respuesta_modelo();
            $respuestaDuplicada->setIdPregunta($idPreguntaCreada);
            $respuestaDuplicada->setRespuesta($datoRes);
            $respuestaDuplicada->setValor($datoValor);
            $respuestaDuplicada->setEtiqueta($datoEti);
            $respuestaDuplicada->guardarRespuesta();
        }
        header("Location: Vista_Instrumento_Edicion_Preguntas.php?Id=$idInstrumento");
        break;

    default:
        # code...
        break;
}



?>