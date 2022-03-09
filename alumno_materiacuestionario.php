<?php
    session_start();
    include("conexion.php");
    if (isset($_SESSION['usuario']) && isset($_SESSION['materia'])) {
        $llave = 'llave';
        $usuario = $_SESSION['usuario']; 
        $clave = $_SESSION['materia'];
        $consulta1 = $conexion->prepare("SELECT cuestionario.id_cuestionario, 
        cuestionario.nombre, cuestionario.complejidad, cuestionario.fecha_inicio, 
        cuestionario.fecha_fin, cuestionario.clave, usuario.nombre, usuario.ape_pat,
         usuario.ape_mat,materia.nombre as nom_mat FROM cuestionario,usuario,materia 
         WHERE cuestionario.nick_profesor=usuario.nick_usuario AND cuestionario.clave=materia.clave 
         AND cuestionario.clave='$clave';");
        $consulta1->execute();
        $registros = $consulta1->fetchAll();

        $consulta2 = $conexion->prepare("SELECT DISTINCT usuario.nombre AS profe, 
        materia.nombre FROM usuario,materia,profesor_materia WHERE usuario.nick_usuario=
        profesor_materia.nick_profesor AND materia.clave=profesor_materia.clave 
        AND materia.clave='$clave';");
        $consulta2->execute();
        $datos= $consulta2->fetch();

        //----------------imagen de perfil--------------------
        $img_sta = $conexion->prepare("SELECT imagen_perfil FROM alumno WHERE 
        AES_DECRYPT(nick_alumno,'$llave') = :usuario;");
        $img_sta -> execute(array(':usuario'=>$usuario));
        $img = $img_sta -> fetch();
        
        require "views/alumno_materiacuestionario.view.php";
    } else {
        header('Location: index.php');
        die();
    }
?>