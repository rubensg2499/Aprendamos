<?php

session_start();
include("conexion.php");
if (isset($_SESSION['usuario'])) {
    $usuario = $_SESSION['usuario'];
    $llave = 'llave';
    if (isset($_SESSION)) {
        $codigo_materia = $_SESSION['materia'];
        $statement1 = $conexion->prepare("SELECT materia.clave,materia.nombre,reactivo.id_reactivo,
        reactivo.estado,reactivo.complejidad,reactivo.tipo,reactivo.enunciado,reactivo.inciso_a_texto,
        reactivo.inciso_b_texto,reactivo.inciso_c_texto,reactivo.inciso_d_texto, reactivo.respuesta,
        reactivo.fecha_adicion, AES_DECRYPT(reactivo.nick_profesor,'llave') as u FROM materia,reactivo WHERE materia.clave = reactivo.clave
        AND materia.clave = :materia ;");
        $statement1->execute(array(':materia'=>$codigo_materia));
        $nombre_materia = $statement1->fetch();
        $_SESSION['nombre_asignatura'] = $nombre_materia==false ? "" : $nombre_materia['nombre'];
        $statement1->execute(array(':materia'=>$codigo_materia));
    }

    require "views/profesor_repositoriomateria.view.php";
    $_POST = array();
} else {
    header('Location: index.php');
    die();
}
