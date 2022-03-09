<?php
    include("conexion.php");
    session_start();
    if(isset($_SESSION['usuario'])){
        //header('Location: alumno_materia.php');
    }
    if (isset($_POST['usuario'])) {
        $usuario = utf8_decode(filter_var($_POST['usuario'], FILTER_SANITIZE_STRING));
        $password = utf8_decode($_POST['pass']);
        $statement = $conexion->prepare("SELECT nick_usuario,pass,tipo FROM usuario WHERE nick_usuario = :usuario AND pass = :pass AND estado = 1");
        $statement->execute(array(
                ':usuario' => $usuario,
                ':pass' => $password
        ));
        $resultado = $statement->fetch();
        if ($resultado !== false) {
            $_SESSION['usuario'] = $usuario;
            if($resultado['tipo']==='alumno'){
                header('Location: alumno_materia.php');
            }elseif($resultado['tipo']==='profesor'){
                header('Location: profesor_repositorio.php');
            }elseif($resultado['tipo']==='administrador'){
                header('Location: administrador_alumnos.php');
            }
        }
    }
    $_POST=array();
    require "views/login.view.php";
?>
