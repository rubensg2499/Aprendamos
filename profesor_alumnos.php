<?php
session_start();
include("conexion.php");
if (isset($_SESSION['usuario'])) {
    $usuario = $_SESSION['usuario'];
    //echo $usuario;
    $llave = 'llave';
    $consulta = $conexion->prepare("SELECT * FROM profesor_materia,materia 
    WHERE profesor_materia.clave = materia.clave and profesor_materia.nick_profesor = AES_ENCRYPT('$usuario','$llave')");

    $consulta->execute();
    $materias = $consulta->fetchAll();
    //var_dump($grupos);
    require "views/profesor_alumnos.view.php";
} else {
    header('Location: index.php');
    die();
}