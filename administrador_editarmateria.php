<?php

    session_start();
    include("conexion.php");
    if (isset($_SESSION['usuario'])) {
        $id = $_SESSION['idMateria'];
        $llave = 'llave';
        $statement1 = $conexion->prepare("SELECT clave, nombre, horas, creditos, semestre, grupo FROM materia WHERE clave=:idMateria;");
        $statement1->execute(array(':idMateria' => $id));
        $materia = $statement1->fetch();
        $clave = $materia['clave'];
        $nombre = $materia['nombre'];
        $horas = $materia['horas'];
        $creditos = $materia['creditos'];
        $semestre = $materia['semestre'];
        $grupo = $materia['grupo'];
        $statement2 = $conexion->prepare("SELECT AES_DECRYPT(nick_profesor,'llave') as nombreP FROM profesor_materia WHERE clave=:idMateria;");
        $statement2->execute(array(':idMateria' => $id));
        $profe = $statement2->fetch();
        $nombreP=null;
        if ($profe) {
            $nombreP = $profe['nombreP'];
        }
        //var_dump($profe);
        $sql="SELECT AES_DECRYPT(p.nick_profesor,'llave') as nick_profesor, u.nombre as nombreP, u.ape_pat as ape_patP,u.ape_mat as ape_matP FROM profesor as p, usuario as u WHERE u.nick_usuario=p.nick_profesor AND u.estado = 1";
        $statement = $conexion->prepare($sql);
        $statement->execute();
        $nombreProf = $statement->fetchAll();

        require "views/administrador_editarmateria.view.php";
    } else {
        header('Location: index.php');
        die();
    }
