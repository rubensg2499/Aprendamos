<?php
session_start();
include("conexion.php");
if (isset($_SESSION['usuario'])) {
    $usuario = $_SESSION['usuario'];
    $llave = 'llave';
	//$_SESSION['materia']="null";
	/*
    $statement1 = $conexion->prepare("SELECT * FROM profesor_materia,materia WHERE profesor_materia.clave=materia.clave AND AES_DECRYPT(nick_profesor,'$llave') = :usuario ;");
	//$statement1 = $conexion->prepare("SELECT * FROM profesor_materia,materia WHERE profesor_materia.clave=materia.clave AND nick_profesor = :usuario ;");
    $statement1->execute(array(':usuario' => $usuario));
*/
	
	

    require "views/profesor_cuestionarios.view.php";
} else {
    header('Location: index.php');
    die();
}
?>