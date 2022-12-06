<?php

class Instrumento_Modelo{
    private $idInstrumento;
    private $idCreador;
    private $titulo;
    private $autor;
    private $descripcion;
    private $fechaCreacion;
    private $imagen;
    private $valido;
    private $baseDatos;


    public function __construct()
    {
        require_once("Conexion.php");
        $this->baseDatos = BaseDatos::conectar();
    }

    
    //getters
    function getIdInstrumento()
    {
        return $this->idInstrumento;
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

    function getValido(){
        return $this->valido;
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

    function setValido($valido){
        $this->valido = $valido;
    }

    function setImagen($imagen)
    {
         $this->imagen = $imagen;
    }


    /**
     * Funcion para validar un instrumento
     */
    public function validarInstrumento($idInstrumento){
        $instrumentoValido = false;
        $sql = "UPDATE instrumentos SET valido = 1 WHERE idInstrumento = '$idInstrumento'";
        $instrumentoValido = $this->baseDatos->query($sql);
        return $instrumentoValido;
    }

    /**
     * Funcion para recuperar los instrumentos
     */
    public function obtenerIntrumentos()
    {   
        $instrumentos = null;
        $sql = "SELECT * from instrumentos INNER JOIN administradores ON instrumentos.idCreador =administradores.idAdministrador";
        $instrumentos= $this->baseDatos->query($sql);
        return  $instrumentos;
    }


    /**
     * Funcion para guardar un instrumento
     */
    public function guardarInstrumento(){
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