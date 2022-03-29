<?php

include("conexion.php");
session_start();
$llave = 'llave';
$usuario = $_SESSION['usuario'];
$cuestionario = $_SESSION['cuestionario'];
$fecha = getdate();
$anyo = $fecha['year'];
$mes = $fecha['mon'];
$dia = $fecha['mday'];
$consulta = $conexion->prepare("INSERT INTO alumno_solicita_cuestionario
values(AES_ENCRYPT('$usuario','$llave'),'$cuestionario','Esperando','$anyo-$mes-$dia');");
if ($consulta->execute()) {
    header("Location: alumno_materiacuestionario.php");
} else {
    $consulta = $conexion->prepare("UPDATE alumno_solicita_cuestionario SET estado = 'Esperando' where
    nick_alumno = AES_ENCRYPT('$usuario','$llave') and id_cuestionario = $cuestionario;");
    $consulta->execute();
    //echo $cuestionario;
    header("Location: alumno_materiacuestionario.php");
}
