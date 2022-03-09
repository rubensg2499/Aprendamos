<?php
    session_start();
    include("conexion.php");
    if (isset($_SESSION['usuario'])) {
        $usuario = $_SESSION['usuario'];
        $id = $_SESSION['reactivo'];
        $enunciado = utf8_decode(filter_var($_POST['contenido_reactivo'],FILTER_SANITIZE_STRING));
        $a = utf8_decode(filter_var($_POST['respuesta1'],FILTER_SANITIZE_STRING));
        $b = utf8_decode(filter_var($_POST['respuesta2'],FILTER_SANITIZE_STRING));
        $c = utf8_decode(filter_var($_POST['respuesta3'],FILTER_SANITIZE_STRING));
        $d = utf8_decode(filter_var($_POST['respuesta4'],FILTER_SANITIZE_STRING));
        $respuesta = utf8_decode(filter_var($_POST['respuesta_correcta'],FILTER_SANITIZE_STRING));
        $estado = utf8_decode(filter_var($_POST['estado_reactivo'],FILTER_SANITIZE_STRING));
        print_r($_SESSION);
        echo "<br>";
        print_r($_POST);
        $statement1 = $conexion->prepare("UPDATE reactivo SET estado=:estado, enunciado=:enunciado,
        inciso_a_texto = :a, inciso_b_texto = :b, inciso_c_texto = :c, inciso_d_texto = :d,
        respuesta=:respuesta WHERE id_reactivo=:id;");
        $statement1->execute(array(
            ':estado' => $estado,
            ':enunciado' => $enunciado,
            ':a' => $a,
            ':b' => $b,
            ':c' => $c,
            ':d' => $d,
            ':respuesta' => $respuesta,
            ':id' => $id
        ));
        header("Location: profesor_repositoriomateria.php");
    }else {
        header('Location: index.php');
        die();
    }
?>