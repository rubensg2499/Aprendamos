<?php

    include("Conexion.php");
    session_start();
    $id_cuestionario = $_SESSION['resolver'];
    $llave = 'llave';
    $usuario = $_SESSION['usuario'];
    $sql = "SELECT cuestionario.nombre, reactivo.enunciado,
    reactivo.inciso_a_texto, reactivo.inciso_b_texto, reactivo.inciso_c_texto,
    reactivo.inciso_d_texto, reactivo.respuesta from alumno, alumno_realiza_cuestionario,
    cuestionario, reactivo, cuestionario_reactivo WHERE alumno.nick_alumno=
    alumno_realiza_cuestionario.nick_alumno AND alumno_realiza_cuestionario.id_cuestionario=
    cuestionario.id_cuestionario AND cuestionario_reactivo.id_reactivo=reactivo.id_reactivo
    AND cuestionario_reactivo.id_cuestionario=cuestionario.id_cuestionario
    AND cuestionario.id_cuestionario=$id_cuestionario;";
    $sentencia = $conexion->prepare($sql);
    $sentencia->execute();
    $resultado = $sentencia->fetchAll();

    if (!$resultado) {
        echo "<link href='css/sb-admin-2.min.css' rel='stylesheet'>";
        echo "<div style='margin-left: 50px; margin-top: 50px;'><strong>Aún no hay preguntas.</strong></div>";
        echo "<a class='btn btn-success' style='margin-left: 50px;' href='alumno_materiacuestionario.php'>Regresar</a>";
        die();
    }

    $preguntasxpagina = 1;
    $total_preguntas = $sentencia->rowCount();

    $paginas = $total_preguntas/$preguntasxpagina;
    if (!$_GET) {
        header("Location: alumno_cuestionario.php?pagina=1");
        $_SESSION['num_preg'] = 1;
    }
    if ($_GET['pagina']>$paginas || $_GET['pagina']<1) {
        header("Location: alumno_cuestionario.php?pagina=1");
        $_SESSION['num_preg'] = 1;
    }
    $iniciar = ($_GET['pagina']-1)*$preguntasxpagina;
    $sql_pregunta =  "SELECT cuestionario.nombre,
    reactivo.id_reactivo, reactivo.enunciado,
    reactivo.inciso_a_texto, reactivo.inciso_b_texto,
    reactivo.inciso_c_texto, reactivo.inciso_d_texto,
    reactivo.respuesta from alumno, alumno_realiza_cuestionario,
    cuestionario, reactivo, cuestionario_reactivo WHERE alumno.nick_alumno=
    alumno_realiza_cuestionario.nick_alumno AND alumno_realiza_cuestionario.id_cuestionario=
    cuestionario.id_cuestionario AND cuestionario_reactivo.id_reactivo=reactivo.id_reactivo
    AND cuestionario_reactivo.id_cuestionario=cuestionario.id_cuestionario AND cuestionario_reactivo.id_cuestionario=$id_cuestionario LIMIT $iniciar,1;";
    $sentencia2 = $conexion->prepare($sql_pregunta);
    $sentencia2->execute();
    $preguntas = $sentencia2->fetchAll();
    require "views/alumno_cuestionario.view.php";
