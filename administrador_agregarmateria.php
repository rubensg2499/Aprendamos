<?php
    session_start();
    if (isset($_SESSION['usuario'])) {
    	
		try {
			$conexion = new PDO('mysql:host=localhost;dbname=aplicacion_web', 'root', '');

			$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $sql="SELECT AES_DECRYPT(p.nick_profesor,'llave') as nick_profesor, u.nombre as nombreP, u.ape_pat as ape_patP
            ,u.ape_mat as ape_matP FROM profesor as p, usuario as u WHERE u.nick_usuario=p.nick_profesor AND u.estado = 1";
            
            $statement = $conexion->prepare($sql);
            
            $statement->execute();
            
            $nombreProf = $statement->fetchAll();

			
		} catch (PDOException $e) {
			echo "Error:" . $e->getMessage();
		}

        require "views/administrador_agregarmateria.view.php";
    } else {
        header('Location: index.php');
        die();
    }

?>