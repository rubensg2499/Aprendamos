<?php
    session_start();
    include("conexion.php");

    if (isset($_SESSION['usuario'])) {
        $usuario = $_SESSION['usuario'];

        $llave = 'llave'; //---------------informacion del alumno------------------
        $alumno_sta = $conexion->prepare("SELECT usuario.nombre, usuario.ape_pat, usuario.ape_mat, usuario.correo, 
        alumno.fecha_nacimiento, alumno.escuela_procedencia, alumno.matricula FROM usuario INNER JOIN alumno ON 
        usuario.nick_usuario = alumno.nick_alumno WHERE AES_DECRYPT(usuario.nick_usuario,'$llave') = :usuario;");
        $alumno_sta -> execute(array(':usuario'=>$usuario));
        $alumno = $alumno_sta -> fetch();

        //--------------------periodo de cambio curso------------------
        $cambiocurso_sta = $conexion->prepare("SELECT periodo.fecha_inicio, periodo.fecha_fin FROM alumno INNER JOIN
        administrador ON alumno.nick_administrador = administrador.nick_administrador INNER JOIN periodo ON 
        administrador.nick_administrador = periodo.nick_administrador WHERE 
        AES_DECRYPT(alumno.nick_alumno,'$llave') = :usuario;");
        $cambiocurso_sta -> execute(array(':usuario'=>$usuario));
        $cambiocurso = $cambiocurso_sta -> fetch();

        $fechahoy = date('Y-m-d');
        $fechahoy = date('Y-m-d', strtotime($fechahoy));
        $fechainicio = date('Y-m-d', strtotime($cambiocurso['fecha_inicio']));
        $fechafinal = date('Y-m-d', strtotime($cambiocurso['fecha_fin']));

        //----------------imagen de perfil--------------------
        $img_sta = $conexion->prepare("SELECT imagen_perfil FROM alumno WHERE 
        AES_DECRYPT(nick_alumno,'$llave') = :usuario;");
        $img_sta -> execute(array(':usuario'=>$usuario));
        $img = $img_sta -> fetch();

        //----------- actualizar correo, grupo y foto-----------------
        if (isset($_POST['guardar'])) {
            $imgFile = $_FILES['imagen']['name'];
            $grupo = $_POST['grupo'];
            $correo = $_POST['correo'];
            
            if(!empty($imgFile)){
                $tmp_dir = $_FILES['imagen']['tmp_name'];
                $imgSize = $_FILES['imagen']['size'];

                $upload_dir = 'images/';
                $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION));
                $valid_extensions = array('jpeg', 'jpg', 'png');
                $userpic = rand(1000,1000000).".".$imgExt;
                if(in_array($imgExt, $valid_extensions)){ 
                    if($img['imagen_perfil']!="images/profile100x100.png"){
                        unlink($img['imagen_perfil']);
                    }
                    move_uploaded_file($tmp_dir,$upload_dir.$userpic);
                    $act_img = $conexion->prepare("UPDATE alumno SET imagen_perfil = :imagen_perfil 
                    WHERE AES_DECRYPT(nick_alumno,'$llave') = :usuario;");
                    $act_img -> execute(array(':usuario'=>$usuario, ':imagen_perfil'=>$upload_dir.$userpic));
                }
            }

            if(!empty($grupo)){
                $act_grupo = $conexion->prepare("UPDATE alumno SET grupo = :grupo WHERE 
                AES_DECRYPT(nick_alumno,'$llave') = :usuario;");
                $act_grupo -> execute(array(':usuario'=>$usuario, ':grupo'=>$grupo));
            }
            if(!empty($correo)){
                $act_correo = $conexion->prepare("UPDATE usuario SET correo = :correo 
                WHERE AES_DECRYPT(nick_usuario,'$llave') = :usuario;");
                $act_correo -> execute(array(':usuario'=>$usuario, ':correo'=>$correo));
            }                
        }
        
        if (isset($_POST['btn_matri'])) {
            $matricula = $_POST['matricula'];
            $act_matri = $conexion->prepare("UPDATE alumno SET matricula = :matricula 
            WHERE AES_DECRYPT(nick_alumno,'$llave') = :usuario;");
            $act_matri -> execute(array(':usuario'=>$usuario, ':matricula'=>$matricula));
        }

        require "views/alumno_editar_perfil.view.php";
    } else {
        header('Location: index.php');
        die();
    }
?>