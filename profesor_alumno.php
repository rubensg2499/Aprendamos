<?php

include("conexion.php");
if (isset($_GET['alumno'])) {
    $_SESSION['alumno'] = filter_var($_GET['alumno'], FILTER_SANITIZE_STRING);
    $_GET = array();
    $datos = explode(";", $_SESSION['alumno']);
    $consulta = $conexion->prepare("SELECT * FROM resultados_cuestionario WHERE nick_alumno='".$datos[0]."' AND clave_materia='".$datos[1]."'");
    $consulta->execute();
    $resultados = $consulta->fetchAll();
    //var_dump($resultados);
    if (empty($resultados)) {
        header("Location: profesor_repositorio.php");
    }
    require "views/profesor_alumno.view.php";
} else {
    header("Location: profesor_repositorio.php");
}
