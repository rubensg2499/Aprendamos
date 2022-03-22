<?php

session_start();
include("conexion.php");

if (isset($_SESSION['usuario'])) {
    $llave = 'llave';

    if ($_POST['estado_cuestionario']==0) {
        $estado_cuestionario=2;
    } else {
        $estado_cuestionario=$_POST['estado_cuestionario'];
    }
    $id_cuest = $_SESSION['id_cuest'];


    try {
        $statement = $conexion->prepare("INSERT INTO cuestionario VALUES(null,:nombre,:complejidad,:fecha,:fecha_inicio,:fecha_fin,
        :estado,:id_materia,AES_ENCRYPT(:usuario,'$llave'));");

        $statement = $conexion->prepare("UPDATE cuestionario SET estado = :estado WHERE id_cuestionario= :id_cuest;");

        $statement->execute(array(
            ':estado' => $estado_cuestionario,
            ':id_cuest' => $id_cuest
        ));
    } catch (PDOExeption $e) {
        echo $e->getMessage();
    }


    header("Location: profesor_cuestionarios.php");
} else {
    header('Location: index.php');
    die();
}
