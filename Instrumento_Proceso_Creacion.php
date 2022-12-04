<?php

require_once("Modelos/Instrumento_modelo.php");


if (
    isset($_POST["Titulo"]) &&
    isset($_POST["Autor"]) &&
    isset($_POST["Descripcion"]) &&
    isset($_POST["idAutor"])
) {
    $Conseguido = false;
    $nuevoInstrumento = new Instrumento_modelo();
    $nuevoInstrumento->setTitulo($_POST["Titulo"]);
    $nuevoInstrumento->setAutor($_POST["Autor"]);
    $nuevoInstrumento->setDescripcion($_POST["Descripcion"]);
    $nuevoInstrumento->setIdCreador($_POST["idAutor"]);
    $Conseguido = $nuevoInstrumento->guardarInstrumento();

    if ($Conseguido) {
        header('Location: Vista_Admin_Principal.php');
    }else{
        header("Location: Vista_Instrumento_Creacion.php");
    }

    
} else {
    header("Location: Vista_Instrumento_Creacion.php");
}

?>