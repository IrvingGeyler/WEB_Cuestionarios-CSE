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
     * Funcion para recuperar la preguntas de un instrumento
     */
    public function recuperarPreguntas($idInstrumento){
        $preguntas = false;
        $preguntas= $this->modeloPregunta->getPreguntas($idInstrumento);
        return $preguntas;
    }

    /**
     * Funcion para crear una pregunta
     */
    public function crearNuevaPregunta($idInstrumento,$orden,$tipo,$descripcion,$requerido){
        $completado = false;
        $this->modeloPregunta->setIdInstrumento($idInstrumento);
        $this->modeloPregunta->setOrdenPregunta($orden);
        $this->modeloPregunta->setTipo($tipo);
        $this->modeloPregunta->setDescripcion($descripcion);
        $this->modeloPregunta->setRequerido($requerido);
        $completado = $this->modeloPregunta->guardarPregunta();
        return $completado;
    }
    
    /**
     * Funcion para crear pregunta por default
     */
    public function crearPreguntaDefault($idInstrumento)
    {   
        $conseguido = false;
        $conseguido = $this->modeloPregunta->guardarPreguntaDefault($idInstrumento);
        return $conseguido;
    }


    /**
     * Funcion para comprobar la existencia de un pregunta en esa posicion
     */
    public function comprobarPosicionExistente($idInstrumento,$posicionDada)
    {   
        $poscionExiste= false;
        $listapreguntas = $this->modeloPregunta->recuperar_Orden_Preguntas($idInstrumento);
        foreach ($listapreguntas as $pregunta) {
            $orden = $pregunta['ordenPregunta'];
            if ($orden == $posicionDada) {//si existe una pregunta en esa posicion
                return  $poscionExiste= $orden;
            }
        }
        return $poscionExiste;
    }


    /**
     * Funcion para ajustar el orden de los datos de las preguntas
     */
    public function ajustarOrdenPreguntas($idInstrumento,$posicionActualCambiar,$nuevaPosicion){
        
        $listapreguntas = $this->modeloPregunta->recuperar_Orden_Preguntas($idInstrumento);
        $idPregunta = 0;
        $posicionActual = 0;

        foreach ($listapreguntas as $pregunta) {
            $posicionActual = $pregunta['ordenPregunta'];

            if ( $posicionActual >= $posicionActualCambiar) {
                $idPregunta =  $pregunta['idPregunta'];
                $this->modeloPregunta->modificar_orden($idPregunta,$nuevaPosicion);
                $nuevaPosicion++;
            }
        }
    }


    /**
     * Funcion para recuperar el id de una pregunta
     */
    public function recuperaPregunta($idInstrumento,$posicion,$tipo){
        $idPregunta = false;
        $idPregunta = $this->modeloPregunta->recuperarPregunta($idInstrumento,$posicion,$tipo);
        return  $idPregunta;
    }

    /**
     * Recuperar pregunta por el id
     */
    public function recuperarPreguntaTotal($idPregunta){
        $Pregunta = false;
        $Pregunta = $this->modeloPregunta->recuperarPreguntaTotal($idPregunta);
        return  $Pregunta;
    }

}