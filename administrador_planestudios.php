<?php
    session_start();
    if (isset($_SESSION['usuario'])) {
    	try {
			$conexion = new PDO('mysql:host=localhost;dbname=aplicacion_web', 'root', '');

			$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            /*$sql="SELECT m.nombre as nombreM, m.clave as claveM, m.creditos as creditosM, m.horas as horasM,
             u.nombre as nombreP, u.ape_pat as ape_patP,u.ape_mat as ape_matP, semestre, grupo FROM profesor_materia as pm, profesor as p, materia as m, usuario as u WHERE
m.clave=pm.clave AND p.nick_profesor=pm.nick_profesor AND u.nick_usuario=p.nick_profesor";*/
            $sql = "SELECT * FROM materia";
            
            $statement = $conexion->prepare($sql);
            
            $statement->execute();
            
            $valores = $statement->fetchAll();
			
		} catch (PDOException $e) {
			echo "Error:" . $e->getMessage();
		}
        require "views/administrador_planestudios.view.php";
    } else {
        header('Location: index.php');
        die();
    }

?>