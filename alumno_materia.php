<?php

    include("conexion.php");
    session_start();
    if (isset($_SESSION['usuario'])) {
        $llave = 'llave';
        $usuario = $_SESSION['usuario'];

        $consulta1 = $conexion->prepare("SELECT DISTINCT materia.semestre
        FROM alumno,alumno_materia,materia WHERE alumno.nick_alumno=alumno_materia.nick_alumno
        AND alumno_materia.clave=materia.clave AND AES_DECRYPT(alumno.nick_alumno,'$llave')=
        :usuario ORDER BY materia.semestre ASC;");
        $consulta1->execute(array(
            ":usuario" => $usuario
        ));
        $semestres = $consulta1->fetchAll();
        //var_dump($semestres);

        //----------------imagen de perfil--------------------
        $img_sta = $conexion->prepare("SELECT imagen_perfil FROM alumno WHERE
        AES_DECRYPT(nick_alumno,'$llave') = :usuario;");
        $img_sta -> execute(array(':usuario'=>$usuario));
        $img = $img_sta -> fetch();



        require "views/alumno_materia.view.php";
    } else {
        header('Location: index.php');
        die();
    }
