<?php

session_start();


include("conexion.php");

if (!isset($_SESSION['id_cuest'])) {
    header('Location: profesor_cuestionarios.php');
}

if (isset($_SESSION['usuario'])) {
    //if(isset($_POST['nombre_cuestionario']) && isset($_POST['complejidad_cuestionario']) && isset($_POST['fecha_inicio']) && isset($_POST['fecha_fin'])){
    //if($_POST['complejidad_cuestionario']!='0'){
    $usuario = $_SESSION['usuario'];
    $llave = 'llave';
    if (isset($_SESSION)) {
        $id = $_SESSION['id_cuest'];

        ///////////////////////////////////////
        //	Selecciona (id, nombre, complejidad y estado) de cuestionario y clave de materia
        $statement0 = $conexion->prepare("SELECT c.id_cuestionario,c.nombre,complejidad,fecha_inicio,fecha_fin,estado,m.clave
				FROM cuestionario AS c , materia AS m WHERE c.clave = m.clave AND c.id_cuestionario = :id_cuest;");
        $statement0->execute(array(':id_cuest'=>$id));
        $mat = $statement0->fetch();
        $_SESSION['id_asignatura'] = $mat['clave'];
        $_SESSION['nombre_cuestionario'] = $mat['nombre'];
        $_SESSION['complejidad_cuestionario'] = $mat['complejidad'];
        //$_SESSION['fecha_inicio'] = utf8_encode($mat['fecha_inicio']);
        //$_SESSION['fecha_fin'] = utf8_encode($mat['fecha_fin']);
        $_SESSION['estado'] = $mat['estado'];


        $codigo_materia = $_SESSION['id_asignatura'];

        ///////////////////////////////////////
        //	Selecciona todos los reactivos asosiciados al id_materia

        $statement1 = $conexion->prepare("SELECT materia.clave,materia.nombre,reactivo.id_reactivo,reactivo.estado,reactivo.complejidad,reactivo.tipo,reactivo.enunciado,reactivo.inciso_a_texto,
				reactivo.inciso_b_texto,reactivo.inciso_c_texto,reactivo.inciso_d_texto, reactivo.respuesta,reactivo.fecha_adicion, AES_DECRYPT(reactivo.nick_profesor,'llave') as u FROM materia,reactivo WHERE materia.clave = reactivo.clave
				AND materia.clave = :materia ;");
        $statement1->execute(array(':materia'=>$codigo_materia));
        $nombre_materia = $statement1->fetch();
        $_SESSION['nombre_asignatura'] = $nombre_materia['nombre'];
        $statement1->execute(array(':materia'=>$codigo_materia));


        ///////////////////////////////////////
        // Selecciona todos los id_reactivos asociados con id_cuestionario

        $statement2 = $conexion->prepare("SELECT id_reactivo, estado,complejidad, tipo, enunciado,inciso_a_texto,
				inciso_b_texto,inciso_c_texto,inciso_d_texto, respuesta
				FROM cuestionario_reactivo NATURAL JOIN reactivo WHERE id_cuestionario = :id_cuest;");

        $statement2->execute(array(':id_cuest'=>$id));
    }

    require "views/profesor_editarcuestionario.view.php";
//}else{
            //echo "No elegiste opciones correctas";
        //}
    //}else{
        //echo "NO puedes acceder a esta página";
    //}
} else {
    header('Location: index.php');
    die();
}
