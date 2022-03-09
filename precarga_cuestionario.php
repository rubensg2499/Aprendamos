<?php
session_start();
include("conexion.php");

if (isset($_SESSION['usuario'])) {
    $llave = 'llave';
		
	$nombre = utf8_decode(filter_var($_POST['nombre_cuestionario'],FILTER_SANITIZE_STRING));
    
	
	switch($_POST['complejidad_cuestionario']){
		case "1":
			$_SESSION['complejidad_cuestionario'] = "Básico";
			echo " Básico";
		break;
		case "2":
			$_SESSION['complejidad_cuestionario'] = "Medio";
			echo " Medio";
		break;
		case "3":
			$_SESSION['complejidad_cuestionario'] = "Avanzado";
			echo " Avanzado";
		break;
	}
	$complejidad = utf8_decode(filter_var($_SESSION['complejidad_cuestionario'],FILTER_SANITIZE_STRING));
	
	$fecha_inicio = utf8_decode(filter_var($_POST['fecha_inicio'],FILTER_SANITIZE_STRING));
	$fecha_fin = utf8_decode(filter_var($_POST['fecha_fin'],FILTER_SANITIZE_STRING));
	
	$estado_cuestionario = 2;
    

    $usuario = utf8_decode(filter_var($_SESSION['usuario'],FILTER_SANITIZE_STRING));
    $id_materia = $_POST['id_mat'];
	$_SESSION['cod_mat'] = $id_materia;
	
    $fecha_actual = getdate();
    $creacion = "";
    $creacion = $fecha_actual['year']."-".$fecha_actual['mon']."-".$fecha_actual['mday'];
	
	$_SESSION['nombre_asignatura'] =$_POST['nombre_mat'];
	$_SESSION['nombre_cuestionario'] = $_POST['nombre_cuestionario'];
	
	
	
    try{
		$statement = $conexion->prepare("INSERT INTO cuestionario VALUES(null,:nombre,:complejidad,:fecha,:fecha_inicio,:fecha_fin,
        :estado,:id_materia,AES_ENCRYPT(:usuario,'$llave'));");
		
        $statement->execute(array(
			':nombre' => $nombre,
			':complejidad' => $complejidad,
			':fecha' => $creacion,
			':fecha_inicio' => $fecha_inicio,
			':fecha_fin' => $fecha_fin,
			':estado' => $estado_cuestionario,
			':id_materia' => $id_materia,
			':usuario' => $usuario
        ));
        
    }catch(PDOExeption $e){
        echo $e->getMessage();
    }
	
		$statement2 = $conexion->prepare("SELECT * from cuestionario WHERE AES_DECRYPT(nick_profesor,'$llave') = :usuario order by id_cuestionario DESC LIMIT 1;");
	
		$statement2->execute(array(':usuario' => $usuario));
		$reg = $statement2->fetch();
			
		$_SESSION['id_cuest']=utf8_encode($reg['id_cuestionario']);
	
	
    header("Location: profesor_editarcuestionario.php");
} else {
    header('Location: index.php');
    die();
}

?>