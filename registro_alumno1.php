<?php
    session_start();
	if (isset($_SESSION['usuario'])) {
		header('Location: index.php');
		die();
	}
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $_SESSION['nombre'] = $_POST['nombre'];
        $_SESSION['ape_pat'] = $_POST['ape_pat'];
        $_SESSION['ape_mat'] = $_POST['ape_mat'];
        $_SESSION['fech_nac'] = $_POST['fech_nac'];
        $_SESSION['esc_proc'] = $_POST['esc_proc'];
        $_SESSION['grupo'] = $_POST['grupo'];
        $_SESSION['matricula'] = $_POST['matricula'];
        $_SESSION['prope'] = $_POST['prope'];
        $_POST = array();
        header('Location: registro_alumno2.php');
    }
    require "views/registro_alumno1.view.php";
?>

