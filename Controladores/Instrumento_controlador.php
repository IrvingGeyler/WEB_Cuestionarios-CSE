<?php

require_once("Modelos/Instrumento_modelo.php");

class Instrumento_controlador
{    
    private $Instrumento;

    public function __construct() {
        $this->Instrumento = new Instrumento_Modelo();
    }

    /**
     * Funcion para recuperar los instrumentos
     */
    public function obtenerIntrumentos(){
        $instrumentos = $this->Instrumento->obtenerIntrumentos();
        return $instrumentos;
    }

    /**
     * Funcion para validar un instrumento
     */
    public function validarInstrumento($idInstrumento)
    {
        $instrumentoValido = false;
        $instrumentoValido = $this->Instrumento->validarInstrumento($idInstrumento);
        return $instrumentoValido;
    }


    /**
     * funcion para crear un instrumento
     */
    public function crearInstrumento(){
        if (
            isset($_POST["Titulo"]) &&
            isset($_POST["Autor"]) &&
            isset($_POST["Descripcion"]) &&
            isset($_POST["idAutor"])
        ) {
            $Conseguido = false;
            $this->Instrumento->setTitulo($_POST["Titulo"]);
            $this->Instrumento->setAutor($_POST["Autor"]);
            $this->Instrumento->setDescripcion($_POST["Descripcion"]);
            $this->Instrumento->setIdCreador($_POST["idAutor"]);
            $Conseguido = $this->Instrumento->guardarInstrumento();
        
            if ($Conseguido) {
             header('Location:Vista_Admin_Principal.php');
            }else{
             header("Location:Vista_Instrumento_Creacion.php");
            }
        } else {
            header("Location:Vista_Instrumento_Creacion.php");
        }
    }
}

?>