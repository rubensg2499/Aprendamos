<?php

session_start();
include("conexion.php");

if (isset($_SESSION['usuario'])) {
    $llave = 'llave';
    $enunciado = filter_var($_POST['contenido_reactivo'], FILTER_SANITIZE_STRING);
    $respuesta1 = null;
    $respuesta2 = null;
    $respuesta3 = null;
    $respuesta4 = null;
    $correcta =  filter_var($_POST['respuesta_correcta'], FILTER_SANITIZE_STRING);
    $estado = filter_var($_POST['estado_reactivo'], FILTER_SANITIZE_STRING);
    $tipo = filter_var($_SESSION['tipo_reactivo'], FILTER_SANITIZE_STRING);
    $complejidad = filter_var($_SESSION['complejidad_reactivo'], FILTER_SANITIZE_STRING);
    if (isset($_POST['respuesta1'])) {
        $respuesta1 = filter_var($_POST['respuesta1'], FILTER_SANITIZE_STRING);
    }

    if (isset($_POST['respuesta2'])) {
        $respuesta2 = filter_var($_POST['respuesta2'], FILTER_SANITIZE_STRING);
    }

    if (isset($_POST['respuesta3'])) {
        $respuesta3 = filter_var($_POST['respuesta3'], FILTER_SANITIZE_STRING);
    }

    if (isset($_POST['respuesta4'])) {
        $respuesta4 = filter_var($_POST['respuesta4'], FILTER_SANITIZE_STRING);
    }
    $usuario = filter_var($_SESSION['usuario'], FILTER_SANITIZE_STRING);
    $materia = filter_var($_SESSION['materia'], FILTER_SANITIZE_STRING);
    $fecha_actual = getdate();
    $creacion = "";
    $creacion = $fecha_actual['year']."-".$fecha_actual['mon']."-".$fecha_actual['mday'];
    echo $creacion;
    try {
        $statement = $conexion->prepare("INSERT INTO reactivo VALUES(null,:estado,:complejidad,:tipo,:enunciado,:respuesta1,
        :respuesta2,:respuesta3,:respuesta4,null,null,null,null,:correcta,:fecha,AES_ENCRYPT(:usuario,'$llave'),:materia);");
        $statement->execute(array(
            ':estado' => $estado,
            ':complejidad' => $complejidad,
            ':tipo' => $tipo,
            ':enunciado' => $enunciado,
            ':respuesta1' => $respuesta1,
            ':respuesta2' => $respuesta2,
            ':respuesta3' => $respuesta3,
            ':respuesta4' => $respuesta4,
            ':correcta' => $correcta,
            ':fecha' => $creacion,
            ':usuario' => $usuario,
            ':materia' => $materia
        ));
        echo "Hola";
    } catch (PDOExeption $e) {
        echo $e->getMessage();
    }

    header("Location: profesor_repositorio.php");
} else {
    header('Location: index.php');
    die();
}
