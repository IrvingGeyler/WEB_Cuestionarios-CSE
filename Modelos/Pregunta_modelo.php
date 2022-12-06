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

       /**
        * Funcion para recuperar pregunta por el id
        */
        public function recuperarPreguntaTotal($idPregunta)
        {
            $pregunta = false;
            $sql = "SELECT * FROM preguntas WHERE idPregunta = '$idPregunta'";
            $pregunta = $this->baseDatos->query($sql)->fetch_object();
            return $pregunta;
        }


       /**
        * Funcion para recuperar pregunta de un tipo, idIntrumento y posicion
        */
        public function recuperarPregunta($idInstru,$posicion,$tipo)
        {
            $pregunta = false;
            $sql = "SELECT idPregunta FROM preguntas WHERE (idInstru ='$idInstru') and (ordenPregunta ='$posicion') and (tipo='$tipo')";
            $pregunta = $this->baseDatos->query($sql)->fetch_object();
            return $pregunta;
        }


       /**
        * Funcion para guardar la pregunta creada
        */
        public function guardarPregunta(){
            $preguntaCreada= false;
           $sql = "INSERT INTO preguntas (idInstru,ordenPregunta,tipo,descripcion,requerido) values
           ({$this->getIdInstrumento()},{$this->getOrdenPregunta()},{$this->getTipo()},'{$this->getDescripcion()}', 
           {$this->getRequerido()})";
            $preguntaCreada = $this->baseDatos->query($sql);
            return $preguntaCreada;
        }
       
       /**
        * Funcion que devuelve las preguntas de un instrumento en orden
        */
       public function recuperar_Orden_Preguntas($idInstrumento){
         $preguntasOrden = false;
         $sql = "SELECT idPregunta,ordenPregunta FROM preguntas WHERE idInstru = '$idInstrumento' ORDER BY ordenPregunta ASC";
         $preguntasOrden = $this->baseDatos->query($sql);
         return $preguntasOrden;
       }


       /**
        * Funcion para modificar el orden de una pregunta
        */
        public function modificar_orden($idPregunta,$nuevaPosicion){
         $ordenModficado = false;
         $sql = "UPDATE preguntas SET ordenPregunta = '$nuevaPosicion' WHERE idPregunta = '$idPregunta'";
         $ordenModficado= $this->baseDatos->query($sql);
         return $ordenModficado;
       }


       /**
        * Funcion para requperar las preguntas de un instrumento
        */
        public function getPreguntas($idInstru)
       {    
            $preguntas = false;
            $sql = "SELECT idPregunta,ordenPregunta,tipo,descripcion,requerido from preguntas where idInstru = '$idInstru' ORDER BY ordenPregunta ASC";
            $preguntas = $this->baseDatos->query($sql);
            return $preguntas;
       }
   
   
       /**
        * Funcion para guardar una pregunta default
        */
        public function guardarPreguntaDefault($idInstru){
           $preguntaCreada= false;
           $sql = "INSERT INTO preguntas (idInstru,ordenPregunta,tipo,descripcion,requerido) values
            ($idInstru,1,0,'Ingresa tu edad',1)";
            $preguntaCreada = $this->baseDatos->query($sql);
            return $preguntaCreada;
       }

    } 
?>