<?php
include("conexion.php");
$baseDatos = BaseDatos::conectar();

$idInstrumento = $_GET['Id'];
$resultado = $baseDatos->query("DELETE from instrumentos where idInstrumento='$idInstrumento'");

header("Location: Vista_Admin_Principal.php");