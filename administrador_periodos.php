<?php

    session_start();
    include("conexion.php");

    if (isset($_SESSION['usuario'])) {
        $consulta1 = $conexion->prepare("SELECT MAX(id_periodo) as id_periodo FROM periodo WHERE tipo = 'captacion' LIMIT 1");
        $consulta1->execute();
        $registro1 = $consulta1->fetch();

        $consulta2 = $conexion->prepare("SELECT MAX(id_periodo) as id_periodo FROM periodo WHERE tipo = 'cambio curso' LIMIT 1");
        $consulta2->execute();
        $registro2 = $consulta2->fetch();
        $per1=false;
        $per2=false;

        if ($registro1['id_periodo']!=null) {
            $id = $registro1['id_periodo'];
            $periodo1 = $conexion->prepare("SELECT * FROM periodo WHERE id_periodo = $id;");
            $periodo1->execute();
            $per1 = $periodo1->fetch();
            //var_dump($per1);
        }

        if ($registro2['id_periodo']) {
            $id = $registro2['id_periodo'];
            $periodo2 = $conexion->prepare("SELECT * FROM periodo WHERE id_periodo = $id;");
            $periodo2->execute();
            $per2 = $periodo2->fetch();
            //var_dump($per2);
        }

        require "views/administrador_periodos.view.php";
    } else {
        header('Location: index.php');
        die();
    }
