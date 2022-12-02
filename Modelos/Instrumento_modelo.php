<?php

class Instrumento_Modelo{
    private $idInstrumentos;
    private $idCreador;
    private $titulo;
    private $autor;
    private $descripcion;
    private $fechaCreacion;
    private $imagen;
    private $baseDatos;


    public function __construct()
    {
        require_once("Conexion.php");
        $this->baseDatos = BaseDatos::conectar();
    }

    
    //getters
    function getIdInstrumento()
    {
        return $this->idInstrumentos;
    }

    function getIdCreador()
    {
        return $this->idCreador;
    }

    function getTitulo()
    {
        return $this->titulo;
    }

    function getAutor()
    {
        return $this->autor;
    }

    function getDescripcion()
    {
        return $this->descripcion;
    }

    function getFechaCreacion()
    {
        return $this->fechaCreacion;
    }


    function getImagen()
    {
        return $this->imagen;
    }



    //setters

    function setIdCreador($idCreador)
    {
       $this->idCreador = $idCreador;
    }

    function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    }

    function setAutor($autor)
    {
       $this->autor = $autor;
    }

    function setDescripcion($descripcion)
    {
         $this->descripcion = $descripcion;
    }

    function setFechaCreacion($fechaCreacion)
    {
         $this->fechaCreacion = $fechaCreacion;
    }


    function setImagen($imagen)
    {
         $this->imagen = $imagen;
    }

    function buscarInstrumento()
    {
    }


    /**
     * Funcion para guardar un instrumento
     */
    function guardarInstrumento(){
        $instrumentoCreado= false;
        $sql = "INSERT INTO instrumentos (idCreador,titulo,autor,descripcion)
        VALUES ({$this->getIdCreador()},'{$this->getTitulo()}','{$this->getAutor()}','{$this->getDescripcion()}')";
         $registro = $this->baseDatos->query($sql);
         if ($registro) {
             $instrumentoCreado = true;
         }
         return $instrumentoCreado;
    }

}

?>