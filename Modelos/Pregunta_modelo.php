<?php 

    class Pregunta_modelo{
       private $idPregunta;
       private $idInstru;
       private $tipo;
       private $ordenPregunta;
       private $descripcion;
       private $requerido;
       private $baseDatos;

       public function __construct()
       {
           require_once("Conexion.php");
           $this->baseDatos = BaseDatos::conectar();
       }
   
       
       //getters
       function getIdPregunta()
       {
           return $this->idPregunta;
       }
   
       function getIdInstrumento()
       {
           return $this->idInstru;
       }
   
       function getTipo()
       {
           return $this->tipo;
       }
   
       function getOrdenPregunta()
       {
           return $this->ordenPregunta;
       }
   
       function getDescripcion()
       {
           return $this->descripcion;
       }
   
   
       function getRequerido()
       {
           return $this->requerido;
       }
   
   
       //setters
       function setIdInstrumento($idInstru)
       {
           $this->idInstru =$idInstru;
       }
   
       function setTipo($tipo)
       {
           $this->tipo = $tipo;
       }
   
       function setOrdenPregunta($ordenPregunta)
       {
         $this->ordenPregunta = $ordenPregunta;
       }
   
       function setDescripcion($descripcion)
       {
            $this->descripcion = $descripcion;
       }
   
       function setRequerido($requerido)
       {
           $this->requerido = $requerido;
       }
   
       function getPregunta(){
        
       }
       

       /**
        * Metodo para requperar las preguntas de un instrumento
        */
       function getPreguntas($idInstru)
       {    
            $preguntas = false;
            $sql = "SELECT idPregunta,ordenPregunta,tipo,descripcion,requerido from preguntas where idInstru = '$idInstru'";
            $preguntas = $this->baseDatos->query($sql);
            return $preguntas;
       }
   
   
       /**
        * Funcion para guardar un instrumento
        */
       function guardarPregunta(){
           $instrumentoCreado= false;
           $sql = "INSERT INTO instrumentos (idCreador,titulo,autor,descripcion)";
            $registro = $this->baseDatos->query($sql);
            if ($registro) {
                $instrumentoCreado = true;
            }
            return $instrumentoCreado;
       }


    }

 
?>