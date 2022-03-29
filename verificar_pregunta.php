<?php

    include("conexion.php");
    session_start();
    $usario = $_SESSION['usuario'];
    $id_cuestionario = $_SESSION['resolver'];
    $id_reactivo = $_SESSION['id_reactivo'];
    $respuesta_alumno= $_POST['preg'];
    $numero_pregunta =  $_SESSION['num_preg'];
    $llave = 'llave';
    $consulta = $conexion->prepare("INSERT INTO alumno_cuestionario_reactivo
    VALUES(AES_ENCRYPT('$usario','$llave'),'$id_reactivo','$id_cuestionario','$respuesta_alumno');");
    if ($consulta->execute()) {
        $numero_pregunta=$numero_pregunta-1;
        header('Location: alumno_cuestionario.php?pagina='.$numero_pregunta);
    } else {
        echo "Pregunta ya respondida";
    }
