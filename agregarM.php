<?php
    session_start();
    if (isset($_SESSION['usuario'])) {
		$conexion = new PDO('mysql:host=localhost;dbname=aplicacion_web', 'root', '');

        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $_SESSION['NombreM'] = $_POST['NombreM'];
        $_SESSION['ClaveM'] = $_POST['ClaveM'];
        $_SESSION['CreditoMateria'] = $_POST['CreditoMateria'];
        $_SESSION['HorasMateria'] = $_POST['HorasMateria'];
        $_SESSION['ProfeAsig'] = $_POST['ProfeAsig'];
        $_SESSION['Semestre'] = $_POST['Semestre'];
        $_SESSION['Grupo'] = $_POST['Grupo'];
        
        $NombreM = utf8_decode(filter_var($_SESSION['NombreM'],FILTER_SANITIZE_STRING));
        $ClaveM = utf8_decode(filter_var($_SESSION['ClaveM'],FILTER_SANITIZE_STRING));
        $CreditoMateria = utf8_decode(filter_var($_SESSION['CreditoMateria'],FILTER_SANITIZE_STRING));
        $HorasM = utf8_decode(filter_var($_SESSION['HorasMateria'],FILTER_SANITIZE_STRING));
        $ProfeAsig = utf8_decode(filter_var($_SESSION['ProfeAsig'],FILTER_SANITIZE_STRING));
        $Semestre = utf8_decode(filter_var($_SESSION['Semestre'],FILTER_SANITIZE_STRING));
        $Grupo = utf8_decode(filter_var($_SESSION['Grupo'],FILTER_SANITIZE_STRING));
        $resultado = false;
        $llave = 'llave';
        $sql="SELECT AES_DECRYPT(nick_administrador,'llave') as nick_administrador FROM administrador LIMIT 1";
            
        $statement = $conexion->prepare($sql);
        $statement->execute();
        $administrador = $statement->fetch();

            $statement = $conexion->prepare("INSERT INTO materia VALUES(:clave,:NombreM,:HorasMateria,:CreditosMateria,:Semestre,:Grupo,AES_ENCRYPT(:nick_admin,'$llave'))");
            $statement->execute(array(
                ':clave' => $ClaveM,
                ':NombreM' => $NombreM,
                ':HorasMateria' => $HorasM,
                ':CreditosMateria' => $CreditoMateria,
                ':Semestre' => $Semestre,
                ':Grupo' => $Grupo,
                ':nick_admin' => $administrador['nick_administrador']
            ));
            echo $ProfeAsig;
            if($ProfeAsig!=0){
                $statement = $conexion->prepare("INSERT INTO profesor_materia VALUES( AES_ENCRYPT(:nick_profesor,'$llave'), :clave)");
                $statement->execute(array(
                    ':nick_profesor' => $ProfeAsig,
                    ':clave' => $ClaveM
                )); 
            }        
    }
    header('Location: administrador_planestudios.php');
    }else{

        header('Location: index.php');
        die();
    }
    
?>