<?php

class Instrumento_controlador
{
    private $baseDatos;

    public function __construct()
    {
        require_once("Conexion.php");
        $this->baseDatos = BaseDatos::conectar();
    }

    public function obtenerIntrumentos()
    {   
        $Instrumentos = null;
        $sql = "SELECT * from instrumentos INNER JOIN administradores ON instrumentos.idCreador =administradores.idAdministrador";
        $Instrumentos= $this->baseDatos->query($sql);
        return  $Instrumentos;
    }
}

?>