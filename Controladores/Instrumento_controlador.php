<?php

require_once("Modelos/Instrumento_modelo.php");

class Instrumento_controlador
{    
    private $Instrumento;

    public function __construct() {
        $this->Instrumento = new Instrumento_Modelo();
    }

    /**
     * Funcion para recuparar los instrumentos
     */
    function obtenerIntrumentos(){
        $instrumentos = $this->Instrumento->obtenerIntrumentos();
        return $instrumentos;
    }

}

?>