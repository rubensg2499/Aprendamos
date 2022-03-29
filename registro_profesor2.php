<?php

    session_start();
    include("conexion.php");
    if (isset($_SESSION['usuario'])) {
        header('Location: index.php');
        die();
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $_SESSION['correo'] = $_POST['correo'];
        $_SESSION['nick'] = $_POST['nick'];
        $_SESSION['inputPassword'] = $_POST['inputPassword'];
        $_SESSION['confirmPassword'] = $_POST['confirmPassword'];
        $_SESSION['pregunta'] = $_POST['pregunta'];
        $_SESSION['respuesta'] = $_POST['respuesta'];

        $nick = filter_var($_SESSION['nick'], FILTER_SANITIZE_STRING);
        $pass = filter_var($_SESSION['inputPassword'], FILTER_SANITIZE_STRING);
        $nombre = filter_var($_SESSION['nombre'], FILTER_SANITIZE_STRING);
        $ape_pat = filter_var($_SESSION['ape_pat'], FILTER_SANITIZE_STRING);
        $ape_mat = filter_var($_SESSION['ape_mat'], FILTER_SANITIZE_STRING);
        $correo = filter_var($_SESSION['correo'], FILTER_SANITIZE_STRING);
        $grado = filter_var($_SESSION['grado'], FILTER_SANITIZE_STRING);
        $pregunta =  filter_var($_SESSION['pregunta'], FILTER_SANITIZE_STRING);
        $respuesta = filter_var($_SESSION['respuesta'], FILTER_SANITIZE_STRING);
        $resultado = false;
        $statement = $conexion->prepare('SELECT * FROM usuario WHERE nick_usuario = :usuario LIMIT 1');
        $statement->execute(array(':usuario' => $nick));
        $resultado = $statement->fetch();
        $finalizo=false;
        $llave = 'llave';
        if ($_SESSION['inputPassword']===$_SESSION['confirmPassword']) {
            if (!$resultado) {
                $statement = $conexion->prepare("INSERT INTO usuario VALUES
                (AES_ENCRYPT(:nick_usuario,'$llave'), AES_ENCRYPT(:pass,'$llave'),
                'profesor',:nombre,:ape_pat,:ape_mat,:correo,1)");
                $statement->execute(array(
                    ':nick_usuario' => $nick,
                    ':pass' => $pass,
                    ':nombre' => $nombre,
                    ':ape_pat' => $ape_pat,
                    ':ape_mat' => $ape_mat,
                    ':correo' => $correo
                ));
                $statement = $conexion->prepare("INSERT INTO profesor
                VALUES(AES_ENCRYPT(:nick_usuario,'$llave'), null,
                :grado, :pregunta, :respuesta,null)");
                $statement->execute(array(
                    ':nick_usuario' => $nick,
                    ':grado' => $grado,
                    ':pregunta' => $pregunta,
                    ':respuesta' => $respuesta
                ));
                session_destroy();
                $finalizo=true;
            }
        }
    }
    require "views/registro_profesor2.view.php";
