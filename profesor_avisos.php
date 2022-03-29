<?php

    session_start();
    include("conexion.php");
    if (isset($_SESSION['usuario'])) {
        $usuario = $_SESSION['usuario'];
        $llave = 'llave';
        $consulta = $conexion->prepare("SELECT AES_DECRYPT(alumno_solicita_cuestionario.nick_alumno,'llave') as nick_alumno,
         alumno_solicita_cuestionario.id_cuestionario, alumno_solicita_cuestionario.fecha,alumno_solicita_cuestionario.estado,
          cuestionario.nombre AS cuestionarion, usuario.nombre, usuario.ape_pat, usuario.ape_mat,
           alumno.imagen_perfil FROM alumno_solicita_cuestionario, cuestionario,usuario,alumno
            WHERE alumno_solicita_cuestionario.id_cuestionario=cuestionario.id_cuestionario
            AND cuestionario.nick_profesor=AES_ENCRYPT('francisco','llave') AND 
            alumno_solicita_cuestionario.nick_alumno = usuario.nick_usuario AND
            alumno.nick_alumno=usuario.nick_usuario ORDER BY fecha ASC;");
        $consulta->execute();
        $resultados = $consulta->fetchAll();
        //var_dump($resultados);
        require "views/profesor_avisos.view.php";
    } else {
        header('Location: index.php');
        die();
    }
