<?php
session_start();
include("conexion.php");

if (isset($_SESSION['usuario'])) {
    $llave = 'llave';
	
	$id_cuest = utf8_decode(filter_var($_SESSION['id_cuest'],FILTER_SANITIZE_STRING));
	$codigo_materia = $_SESSION['id_asignatura'];
	if(isset($_POST['add'])){
		///////////////////////////////////////
		//	Selecciona todos los reactivos asosiciados al id_materia
		$statement1 = $conexion->prepare("SELECT materia.clave, reactivo.id_reactivo, 
		AES_DECRYPT(reactivo.nick_profesor,'llave') as u FROM materia,reactivo 
		WHERE materia.clave = reactivo.clave 
		AND materia.clave = :materia ;");
		$statement1->execute(array(':materia'=>$codigo_materia));
		while($fila = $statement1->fetch()){
			$id_reactivo = utf8_encode($fila['id_reactivo']);
			if(isset($_POST[$id_reactivo])){
				$statement = $conexion->prepare("INSERT INTO cuestionario_reactivo 
				VALUES(:id_cuest,:id_react)");
				$statement->execute(array(':id_cuest' => $id_cuest,':id_react' => $id_reactivo));
			}
		}
		
	}else{
		///////////////////////////////////////
		// Selecciona todos los id_reactivos asociados con id_cuestionario
		$statement2 = $conexion->prepare("SELECT id_reactivo FROM cuestionario_reactivo 
		NATURAL JOIN reactivo WHERE id_cuestionario = :id_cuest;");
		$statement2->execute(array(':id_cuest'=>$id_cuest));
		while($fila2 = $statement2->fetch()){
			$id_reactivo = utf8_encode($fila2['id_reactivo']);
			if(isset($_POST[$id_reactivo])){
				$statement = $conexion->prepare("DELETE FROM cuestionario_reactivo 
				WHERE id_cuestionario=:id_cuest AND id_reactivo=:id_react;");
				$statement->execute(array(':id_cuest' => $id_cuest,':id_react' => $id_reactivo));
			}
		}		
	}
	
	$_POST['add']=null;
	
	

	header("Location: profesor_editarcuestionario.php");
} else {
    header('Location: index.php');
    die();
}

?>