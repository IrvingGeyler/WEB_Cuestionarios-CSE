<?php 


class Respuesta_modelo{
    private $idRespuesta;
    private $idPregunta;
    private $respuesta;
    private $valor; 
    private $etiqueta;
    private $baseDatos;

    public function __construct()
    {
        require_once("Conexion.php");
        $this->baseDatos = BaseDatos::conectar();
    }

    
    //getters
    function getIdRespuesta()
    {
        return $this->idRespuesta;
    }

    function getIdPregunta()
    {
        return $this->idPregunta;
    }


    function getRespuesta()
    {
        return $this->respuesta;
    }

    function getValor()
    {
        return $this->valor;
    }

    function getEtiqueta()
    {
        return $this->etiqueta;
    }



    //setters
    
    function setIdPregunta($idPregunta)
    {
       $this->idPregunta = $idPregunta;
    }

    function setRespuesta($respuesta)
    {
        $this->respuesta = $respuesta;
    }

    function setValor($valor)
    {
        $this->valor = $valor;
    }

    function setEtiqueta($etiqueta)
    {
         $this->etiqueta = $etiqueta;
    }


    //Metodos

    /**
     * Funcion para guardar respuesta
     */
    public function guardarRespuesta(){
        $respuestaCreada= false;
        $sql = "INSERT INTO respuestas (idPregunta,respuesta,valor,etiqueta) values({$this->getIdPregunta()},'{$this->getRespuesta()}',{$this->getValor()},'{$this->getEtiqueta()}')";
        $respuestaCreada = $this->baseDatos->query($sql);
        return $respuestaCreada;
    }

    /**
     * Funcion para recupearar las respuesta de una pregunta en concreto
     */
    public function recueperarRespuestas($idPregunta){
        $respuestas = false;
        $sql = "SELECT * FROM respuestas WHERE idPregunta = '$idPregunta' ";
        $respuestas = $this->baseDatos->query($sql);
        return  $respuestas;
    }

}


?>