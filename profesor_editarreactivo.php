<?php

session_start();
include("conexion.php");
if (isset($_SESSION['usuario'])) {
    $usuario = $_SESSION['usuario'];
    $id = $_SESSION['reactivo'];
    $llave = 'llave';
    $statement1 = $conexion->prepare("SELECT estado, complejidad, tipo, enunciado, inciso_a_texto, inciso_b_texto, inciso_c_texto, inciso_d_texto, respuesta FROM reactivo WHERE id_reactivo=:reactivo;");
    $statement1->execute(array(':reactivo' => $id));
    $registro = $statement1->fetch();
    $estado = $registro['estado'];
    $complejidad = $registro['complejidad'];
    $tipo = $registro['tipo'];
    $enunciado = $registro['enunciado'];
    $a = $registro['inciso_a_texto'];
    $b = $registro['inciso_b_texto'];
    $c = $registro['inciso_c_texto'];
    $d = $registro['inciso_d_texto'];
    $respuesta = $registro['respuesta'];
    //print_r($_SESSION);
    require "views/profesor_editarreactivo.view.php";
} else {
    header('Location: index.php');
    die();
}
