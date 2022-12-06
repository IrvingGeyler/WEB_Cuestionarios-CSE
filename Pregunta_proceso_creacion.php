<?php
include("Controladores/Preguntas_controlador.php");
include("Modelos/Respuesta_modelo.php");

$controlPreguntas = new Preguntas_controlador();

$tipo = $_POST['tipo_pregunta']; //tipo de pregunta
$idInstrumento = $_POST['idInstru']; 


//ajustando las preguntas posteriores
$posicionPreguntaCreada = $_POST['ordenPre'] + 1;//posicion que se encontraria la creada
$nuevaPosicionPosterior = $posicionPreguntaCreada + 1;//posicion que se encontrara la siguiente

$posicionOcupada = $controlPreguntas->comprobarPosicionExistente($idInstrumento,$posicionPreguntaCreada);//posicion ocupada

//datos principales
$descripcionPreguta = "";
$requerido = 0;
if (isset($_POST['requerido'])) {
    $requerido = $_POST['requerido'];
}

//ajustar orden para las preguntas
if ($posicionOcupada!=false) {
    $controlPreguntas->ajustarOrdenPreguntas($idInstrumento,$posicionOcupada,$nuevaPosicionPosterior);//realizando ajustes
}

//Creacion de un tipo de pregunta
switch ($tipo) {

    case '0'://si quiere crear una pregunta de texto corta
        
        $descripcionPreguta = $_POST['text_C'];

        $controlPreguntas->crearNuevaPregunta($idInstrumento,$posicionPreguntaCreada,$tipo,$descripcionPreguta,$requerido);
        header("Location: Vista_Instrumento_Edicion_Preguntas.php?Id=$idInstrumento");
        break;

    case '1': //si quiere crear una pregunta de texto larga
        $descripcionPreguta = $_POST['text_L'];

        $controlPreguntas->crearNuevaPregunta($idInstrumento,$posicionPreguntaCreada,$tipo,$descripcionPreguta,$requerido);
        header("Location: Vista_Instrumento_Edicion_Preguntas.php?Id=$idInstrumento");
        break;

    case '2'://si quiere crear una pregunta escalar

        $descripcionPreguta = $_POST['descripcion'];
        $controlPreguntas->crearNuevaPregunta($idInstrumento,$posicionPreguntaCreada,$tipo,$descripcionPreguta,$requerido);

        $pregunta =  $controlPreguntas->recuperaPregunta($idInstrumento,$posicionPreguntaCreada,$tipo);//recuperar la pregunta
        $idPreguntaCreada =$pregunta->idPregunta;//recuperando el ide de la pregunta creada
    
        $etiquetaInicial = $_POST['etiqueta_Inicial'];
        $valorInicial = 0;
        $etiquetaFinal =$_POST['etiqueta_Final'];
        $valorFinal = $_POST['valorFinal'];


        //Creando las respuestas
        $primerRespueta = new Respuesta_modelo();
        $primerRespueta->setIdPregunta($idPreguntaCreada);
        $primerRespueta->setRespuesta($valorInicial);
        $primerRespueta->setValor($valorInicial);
        $primerRespueta->setEtiqueta($etiquetaInicial);
        $primerRespueta->guardarRespuesta();

        $segundaRespuesta = new Respuesta_modelo();
        $segundaRespuesta->setIdPregunta($idPreguntaCreada);
        $segundaRespuesta->setRespuesta($valorFinal);
        $segundaRespuesta->setValor($valorFinal);
        $segundaRespuesta->setEtiqueta($etiquetaFinal);
        $segundaRespuesta->guardarRespuesta();

        header("Location: Vista_Instrumento_Edicion_Preguntas.php?Id=$idInstrumento");
        break;

    default:
        # code...
        break;
}

?>