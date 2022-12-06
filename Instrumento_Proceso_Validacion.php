<?php
require("Controladores/Instrumento_controlador.php");
require("Controladores/Preguntas_controlador.php");


$controlInstrumento = new Instrumento_controlador();
$controlPregunta = new Preguntas_controlador();

$idInstrumento = $_GET['Id'];

$controlInstrumento->validarInstrumento($idInstrumento);
$controlPregunta->crearPreguntaDefault($idInstrumento);

header("Location: Vista_Admin_Principal.php");
?>