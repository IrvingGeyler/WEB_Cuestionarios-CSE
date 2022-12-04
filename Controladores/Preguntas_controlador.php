<?php

require_once("Modelos/Pregunta_modelo.php");

class Preguntas_controlador{

    private $modeloPregunta;

    //Constructor
    public function __construct()
    {
        $this->modeloPregunta = new Pregunta_modelo();
    }

    /**
     * Metodo para recuperar la preguntas de un instrumento
     */
    public function recuperarPreguntas($idInstrumento){
        $preguntas = false;
        $preguntas= $this->modeloPregunta->getPreguntas($idInstrumento);
        return $preguntas;
    }


}