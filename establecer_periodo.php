<?php
    session_start();
    if (isset($_SESSION['usuario'])) {
		$conexion = new PDO('mysql:host=localhost;dbname=aplicacion_web', 'root', '');

        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $finalizo1 = false;
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $_SESSION['inicio1'] = $_POST['inicio1'];
        $_SESSION['fin1'] = $_POST['fin1'];
    
        $tipo = "captacion";
        $inicio1 = utf8_decode(filter_var($_SESSION['inicio1'],FILTER_SANITIZE_STRING));
        $fin1 = utf8_decode(filter_var($_SESSION['fin1'],FILTER_SANITIZE_STRING));
        
        $llave = 'llave';
        $sql="SELECT AES_DECRYPT(nick_administrador,'llave') as nick_administrador FROM administrador LIMIT 1";
            
        $statement = $conexion->prepare($sql);
        $statement->execute();
        $administrador = $statement->fetch();

        $statement = $conexion->prepare("INSERT INTO periodo VALUES(NULL,:tipo,:fechaI,:fechaF,AES_ENCRYPT(:nick_admin,'$llave'))");
        $statement->execute(array(
            
            ':tipo' => $tipo,
            ':fechaI' => $inicio1,
            ':fechaF' => $fin1,
            ':nick_admin' => $administrador['nick_administrador']
        ));

        $sql1="SELECT MAX(id_periodo) as id_periodo  FROM periodo LIMIT 1";
            
        $statement1 = $conexion->prepare($sql1);
        $statement1->execute();
        $id_periodo = $statement1->fetch();

        $sql2="SELECT AES_DECRYPT(nick_profesor,'llave') as nick_profesor FROM profesor";
            
        $statement2 = $conexion->prepare($sql2);
        $statement2->execute();
        while ($profe = $statement2->fetch()) {
            $nick = utf8_encode($profe['nick_profesor']);
            $statement3 = $conexion->prepare("INSERT INTO profesor_periodo VALUES(AES_ENCRYPT(:nick_profesor,'$llave'), :id_periodo)");
            $statement3->execute(array(
                ':nick_profesor' => $profe['nick_profesor'],
                ':id_periodo' => $id_periodo['id_periodo']
                
                
            ));
        
        $finalizo1 = true;
        }
        
    }
        
    //header('Location: administrador_periodos.php');
    require "views/administrador_periodos.view.php";
    }else{

        header('Location: index.php');
        die();
    }
    
?>