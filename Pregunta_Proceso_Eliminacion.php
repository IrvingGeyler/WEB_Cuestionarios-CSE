<?php 
include("Controladores/Preguntas_controlador.php");
include("conexion.php");
$baseDatos = BaseDatos::conectar();
$controlPreguntas = new Preguntas_controlador();
//datos necesario
$idPregunta = $_GET['IdPregunta'];
$idInstrumento = $_GET['IdInst'];
$posicion =$_GET['posicion'];


//ajustando las preguntas posteriores
$posicioPosterior = $posicion + 1;//posicion del que ser correra
$posicionExistente = $controlPreguntas->comprobarPosicionExistente($idInstrumento,$posicioPosterior);//posicion ocupada

if ($posicionExistente!=false) {
    $controlPreguntas->ajustarOrdenPreguntas($idInstrumento,$posicioPosterior,$posicion);//realizando ajustes
}

$resultado = $baseDatos->query("DELETE from preguntas where idPregunta=$idPregunta");

header("Location: Vista_Instrumento_Edicion_Preguntas.php?Id=$idInstrumento");
?>