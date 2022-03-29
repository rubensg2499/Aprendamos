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
        $nick = $_SESSION['nick'];
        $pass = filter_var($_SESSION['inputPassword'], FILTER_SANITIZE_STRING);
        $nombre = filter_var($_SESSION['nombre'], FILTER_SANITIZE_STRING);
        $ape_pat = filter_var($_SESSION['ape_pat'], FILTER_SANITIZE_STRING);
        $ape_mat = filter_var($_SESSION['ape_mat'], FILTER_SANITIZE_STRING);
        $correo = filter_var($_SESSION['correo'], FILTER_SANITIZE_STRING);
        $fecha_nac = filter_var($_SESSION['fech_nac'], FILTER_SANITIZE_STRING);
        $escuela = filter_var($_SESSION['esc_proc'], FILTER_SANITIZE_STRING);
        $grupo = filter_var($_SESSION['grupo'], FILTER_SANITIZE_STRING);
        $grupo = (string)$grupo;
        $matricula = filter_var($_SESSION['matricula'], FILTER_SANITIZE_STRING);
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
                'alumno',:nombre,:ape_pat,:ape_mat,:correo,1)");
                $statement->execute(array(
                    ':nick_usuario' => $nick,
                    ':pass' => $pass,
                    ':nombre' => $nombre,
                    ':ape_pat' => $ape_pat,
                    ':ape_mat' => $ape_mat,
                    ':correo' => $correo
                ));
                try {
                    $statement = $conexion->prepare("INSERT INTO alumno
                            VALUES(AES_ENCRYPT(:nick_usuario,'$llave'), :matricula, :grupo
                            ,:fecha_nac, :esc_proc, :pregunta, :respuesta, 'images/perfil.png', null, null)");
                    $statement->execute(array(
                            ':nick_usuario' => $nick,
                            ':matricula' => $matricula,
                            ':grupo' => $grupo,
                            ':fecha_nac' => $fecha_nac,
                            ':esc_proc' => $escuela,
                            ':pregunta' => $pregunta,
                            ':respuesta' => $respuesta
                         ));

                    $statement2 = $conexion->prepare("SELECT * FROM materia;");
                    $statement2->execute();
                    $materias = $statement2->fetchAll();
                    if ($materias) {
                        foreach ($materias as $materia) {
                            $m=$materia[0];
                            if ($materia[5]==$grupo) {
                                $statement3 = $conexion->prepare("INSERT INTO alumno_materia
                                    VALUES(AES_ENCRYPT('$nick','$llave'),'$m',1)");
                            } else {
                                $statement3 = $conexion->prepare("INSERT INTO alumno_materia
                                    VALUES(AES_ENCRYPT('$nick','$llave'), '$m',0)");
                            }

                            $statement3->execute();
                        }
                    }
                } catch (PDOException $e) {
                    echo $e->getMessage();
                }

                session_destroy();
                $finalizo=true;
            }
        }
    }
    require "views/registro_alumno2.view.php";
