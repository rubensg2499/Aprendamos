<?php
session_start();
include("conexion.php");
if (isset($_SESSION['usuario'])) {
    if(isset($_POST['tipo_reactivo']) && isset($_POST['complejidad_reactivo'])){
        if($_POST['tipo_reactivo']!= '0' && $_POST['complejidad_reactivo']!='0'){
            $usuario = $_SESSION['usuario'];
            $llave = 'llave';
            
            require "views/profesor_crearreactivo.view.php";
        }else{
            echo "No elegiste opciones correctas";
        }
    }else{
        echo "NO puedes acceder a esta página";
    }
} else {
    header('Location: index.php');
    die();
}
