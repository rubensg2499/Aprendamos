<?php
	if (isset($_SESSION['usuario'])) {
		header('Location: index.php');
		die();
	}	
	require "views/registro.view.php";
?>