<?php

    session_start();
    if (isset($_SESSION['usuario'])) {
        $conexion = new PDO('mysql:host=localhost;dbname=aplicacion_web', 'root', '');

        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $finalizo2 = false;
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_SESSION['inicio2'] = $_POST['inicio2'];
            $_SESSION['fin2'] = $_POST['fin2'];

            $tipo = "cambio curso";
            $inicio2 = utf8_decode(filter_var($_SESSION['inicio2'], FILTER_SANITIZE_STRING));
            $fin2 = utf8_decode(filter_var($_SESSION['fin2'], FILTER_SANITIZE_STRING));

            $llave = 'llave';
            $sql="SELECT AES_DECRYPT(nick_administrador,'llave') as nick_administrador FROM administrador LIMIT 1";

            $statement = $conexion->prepare($sql);
            $statement->execute();
            $administrador = $statement->fetch();

            $statement = $conexion->prepare("INSERT INTO periodo VALUES(NULL,:tipo,:fechaI,:fechaF,AES_ENCRYPT(:nick_admin,'$llave'))");
            $statement->execute(array(
                ':tipo' => $tipo,
                ':fechaI' => $inicio2,
                ':fechaF' => $fin2,
                ':nick_admin' => $administrador['nick_administrador']
            ));
            $sql2="SELECT AES_DECRYPT(nick_alumno,'$llave') as nick_alumno FROM alumno WHERE matricula = ''";

            $statement2 = $conexion->prepare($sql2);
            $statement2->execute();
            $alumnos = $statement2->fetchAll();
            var_dump($alumnos);
            $sql3="SELECT MAX(id_periodo) as id_periodo FROM periodo WHERE tipo = 'cambio curso' LIMIT 1";

            $statement3 = $conexion->prepare($sql3);
            $statement3->execute();
            $id_periodo = $statement3->fetch();
            var_dump($id_periodo);
            $id = $id_periodo['id_periodo'];

            if ($alumnos) {
                foreach ($alumnos as $alumno) {
                    $id_alumno=$alumno['nick_alumno'];
                    $statement = $conexion->prepare("UPDATE alumno SET id_periodo = :id_periodo WHERE nick_alumno = AES_ENCRYPT(:id_alumno,'llave');");
                    $statement->execute(array(
                        ':id_periodo' => $id,
                        ':id_alumno' => $id_alumno
                    ));
                }
            }
            $finalizo2 = true;
        }
        header('Location: administrador_periodos.php');
    //require "views/administrador_periodos.view.php";
    } else {
        header('Location: index.php');
        die();
    }
