<?php

class BaseDatos{ 
    public static function conectar(){
        require_once("configBD.php");

        try {
            $conexion = new mysqli(SERVER, USUARIO, CONTRASEÑA, BASEDATOS);
            $conexion->query("SET CHARACTER SET UTF8");

        } catch (Exception $th) {
            die("Error " . $th->getMessage());
            echo "Linea del error ". $th->getLine();
            
        }
        
        return $conexion;
    }
}