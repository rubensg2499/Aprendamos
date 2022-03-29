<?php

session_start();


include("conexion.php");
/*
if(!isset($_SESSION['id_cuest'])){
    header('Location: profesor_cuestionarios.php');
}
*/
if (isset($_SESSION['usuario'])) {
    //if(isset($_POST['nombre_cuestionario']) && isset($_POST['complejidad_cuestionario']) && isset($_POST['fecha_inicio']) && isset($_POST['fecha_fin'])){
    //if($_POST['complejidad_cuestionario']!='0'){
    $usuario = $_SESSION['usuario'];
    $llave = 'llave';
    if (isset($_SESSION)) {
        $statement1 = $conexion->prepare("SELECT id_cuestionario,cuestionario.nombre, cuestionario.complejidad
		FROM cuestionario, materia WHERE cuestionario.clave = materia.clave AND materia.clave = :id_mat AND cuestionario.estado = '1' AND AES_DECRYPT(nick_profesor,'$llave') = :usuario ;");
        $statement1->execute(array(':id_mat'=>$_SESSION['id_mat'],':usuario' => $usuario));

        $statement2 = $conexion->prepare("SELECT nombre, grupo FROM materia WHERE clave=:id_mat ;");
        $statement2->execute(array(':id_mat'=>$_SESSION['id_mat']));

        $registro_mat = $statement2->fetch();


        //print_r($registro_mat);

        $statement3 = $conexion->prepare("SELECT nombre,  ape_pat, ape_mat,AES_DECRYPT(a.nick_alumno,'$llave') AS nick_alum
		FROM alumno a, usuario u WHERE grupo=:grupo AND u.nick_usuario=a.nick_alumno;");
        $statement3->execute(array(':grupo'=>$registro_mat['grupo']));

        //	$_SESSION['reg_alum'] = $statement3->fetchAll();

        /*
        while($fila = $statement3->fetch()){
            $nick = $fila['nick_alum'];
            $nombre = $fila['nombre'];
            $ape_pat = $fila['ape_pat'];
            $ape_mat = $fila['ape_mat'];

            echo "$nick - $nombre - $ape_pat - $ape_mat <br>" ;

        }*/




    //	$registro_gru = $statement3->fetchAll();
    /*	foreach($registro_gru as $reg)
        {
            $nombre = $reg['nick_alum'];
            echo $nombre."<br>" ;
        }
*/

        //$registro_usu = $statement3->fetchAll();

        //print_r($registro_mat);

                /*
                $id_mat = $_SESSION['id_cuest'];

                ///////////////////////////////////////
                //	Selecciona (id, nombre, complejidad y estado) de cuestionario y clave de materia
                $statement0 = $conexion->prepare("SELECT c.id_cuestionario,c.nombre,complejidad,fecha_inicio,fecha_fin,estado,m.clave
                FROM cuestionario AS c , materia AS m WHERE c.clave = m.clave AND c.id_cuestionario = :id_cuest;");
                $statement0->execute(array(':id_cuest'=>$id));
                $mat = $statement0->fetch();
                $_SESSION['id_asignatura'] = utf8_encode($mat['clave']);
                $_SESSION['nombre_cuestionario'] = utf8_encode($mat['nombre']);
                $_SESSION['complejidad_cuestionario'] = utf8_encode($mat['complejidad']);
                //$_SESSION['fecha_inicio'] = utf8_encode($mat['fecha_inicio']);
                //$_SESSION['fecha_fin'] = utf8_encode($mat['fecha_fin']);
                $_SESSION['estado'] = utf8_encode($mat['estado']);


                $codigo_materia = $_SESSION['id_asignatura'];

                ///////////////////////////////////////
                //	Selecciona todos los reactivos asosiciados al id_materia

                $statement1 = $conexion->prepare("SELECT materia.clave,materia.nombre,reactivo.id_reactivo,reactivo.estado,reactivo.complejidad,reactivo.tipo,reactivo.enunciado,reactivo.inciso_a_texto,
                reactivo.inciso_b_texto,reactivo.inciso_c_texto,reactivo.inciso_d_texto, reactivo.respuesta,reactivo.fecha_adicion, AES_DECRYPT(reactivo.nick_profesor,'llave') as u FROM materia,reactivo WHERE materia.clave = reactivo.clave
                AND materia.clave = :materia ;");
                $statement1->execute(array(':materia'=>$codigo_materia));
                $nombre_materia = $statement1->fetch();
                $_SESSION['nombre_asignatura'] = utf8_encode($nombre_materia['nombre']);
                $statement1->execute(array(':materia'=>$codigo_materia));


                ///////////////////////////////////////
                // Selecciona todos los id_reactivos asociados con id_cuestionario

                $statement2 = $conexion->prepare("SELECT id_reactivo, estado,complejidad, tipo, enunciado,inciso_a_texto,
                inciso_b_texto,inciso_c_texto,inciso_d_texto, respuesta
                FROM cuestionario_reactivo NATURAL JOIN reactivo WHERE id_cuestionario = :id_cuest;");

                $statement2->execute(array(':id_cuest'=>$id));
                */
    }

    require "views/profesor_asignarcuestionario.view.php";

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
