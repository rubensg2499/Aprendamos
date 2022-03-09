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
        $_SESSION['grado'] = $_POST['grado'];
        $_POST = array();
        header('Location: registro_profesor2.php');
    }
    require "views/registro_profesor1.view.php";
?>