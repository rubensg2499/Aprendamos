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
    $estado = utf8_encode($registro['estado']);
    $complejidad = utf8_encode($registro['complejidad']);
    $tipo = utf8_encode($registro['tipo']);
    $enunciado = utf8_encode($registro['enunciado']);
    $a = utf8_encode($registro['inciso_a_texto']);
    $b = utf8_encode($registro['inciso_b_texto']);
    $c = utf8_encode($registro['inciso_c_texto']);
    $d = utf8_encode($registro['inciso_d_texto']);
    $respuesta = utf8_encode($registro['respuesta']);
    //print_r($_SESSION);
    require "views/profesor_editarreactivo.view.php";
}else {
    header('Location: index.php');
    die();
}
?>