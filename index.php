<?php

    include("conexion.php");
    session_start();
    if (isset($_SESSION['usuario'])) {
        //header('Location: alumno_materia.php');
    }
    if (isset($_POST['usuario'])) {
        $usuario = filter_var($_POST['usuario'], FILTER_SANITIZE_STRING);
        $password = $_POST['pass'];
        //$password = hash('sha512', $password);
        $llave = 'llave';
        $statement = $conexion->prepare("SELECT AES_DECRYPT(nick_usuario,'$llave'),
        AES_DECRYPT(pass,'$llave'),tipo FROM usuario WHERE AES_DECRYPT(nick_usuario,'$llave') =
        :usuario AND AES_DECRYPT(pass,'$llave') = :pass AND estado = 1");
        $statement->execute(array(
                ':usuario' => $usuario,
                ':pass' => $password
        ));
        $resultado = $statement->fetch();
        if ($resultado !== false) {
            $_SESSION['usuario'] = $usuario;
            if ($resultado['tipo']==='alumno') {
                header('Location: alumno_materia.php');
            } elseif ($resultado['tipo']==='profesor') {
                header('Location: profesor_repositorio.php');
            } elseif ($resultado['tipo']==='administrador') {
                header('Location: administrador_alumnos.php');
            }
        }
    }
    $_POST=array();
    require "views/login.view.php";
