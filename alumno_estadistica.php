<?php 
	session_start();
    include("conexion.php");

    if (isset($_SESSION['usuario'])) {
		$usuario = $_SESSION['usuario'];
		
		$llave = 'llave';
		//----------------imagen de perfil--------------------
        $img_sta = $conexion->prepare("SELECT imagen_perfil FROM alumno WHERE 
        AES_DECRYPT(nick_alumno,'$llave') = :usuario;");
        $img_sta -> execute(array(':usuario'=>$usuario));
        $img = $img_sta -> fetch();

		require "views/alumno_estadistica.view.php";
	} else {
        header('Location: index.php');
        die();
    }
	
 ?>