<?php
    session_start();
    if (isset($_SESSION['usuario'])) {
		$conexion = new PDO('mysql:host=localhost;dbname=aplicacion_web', 'root', '');

        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_SESSION['NombreM'] = $_POST['nombreMateria'];
            $_SESSION['ClaveM'] = $_POST['claveMateria'];
            $_SESSION['CreditoMateria'] = $_POST['CreditoMateria'];
            $_SESSION['HorasMateria'] = $_POST['HorasMateria'];
            $_SESSION['ProfeAsig'] = $_POST['ProfeAsig'];
            $_SESSION['Semestre'] = $_POST['Semestre'];
            $_SESSION['Grupo'] = $_POST['Grupo'];

            $NombreM = filter_var($_SESSION['NombreM'],FILTER_SANITIZE_STRING);
            $ClaveM = utf8_decode(filter_var($_SESSION['ClaveM'],FILTER_SANITIZE_STRING));
            $CreditoMateria = utf8_decode(filter_var($_SESSION['CreditoMateria'],FILTER_SANITIZE_STRING));
            $HorasM = utf8_decode(filter_var($_SESSION['HorasMateria'],FILTER_SANITIZE_STRING));
            $ProfeAsig = utf8_decode(filter_var($_SESSION['ProfeAsig'],FILTER_SANITIZE_STRING));
            $Semestre = utf8_decode(filter_var($_SESSION['Semestre'],FILTER_SANITIZE_STRING));
            $Grupo = utf8_decode(filter_var($_SESSION['Grupo'],FILTER_SANITIZE_STRING));
            $resultado = false;
            $llave = 'llave';
                $statement = $conexion->prepare("UPDATE materia SET nombre = :NombreM, horas = :HorasMateria, creditos = :CreditosMateria WHERE clave = :clave");
                $statement->execute(array(
                    ':clave' => $ClaveM,
                    ':NombreM' => $NombreM,
                    ':HorasMateria' => $HorasM,
                    ':CreditosMateria' => $CreditoMateria
                ));

                if (!($Semestre === '0')) {
                    $statement1 = $conexion->prepare("UPDATE materia SET semestre = :Semestre WHERE clave = :clave");
                    $statement1->execute(array(
                    ':clave' => $ClaveM,
                    ':Semestre' => $Semestre
                ));
                }
                if (!($ProfeAsig === '0')) {
                    echo "HOLA MUNDO";
                    $consulta = $conexion->prepare("SELECT * FROM profesor_materia where nick_profesor = AES_ENCRYPT(:nick_profesor,'$llave') AND clave =:clave");
                    $consulta->execute(array(
                        ':nick_profesor' => $ProfeAsig,
                        ':clave' => $ClaveM
                    ));
                    $busqueda = $consulta->fetch();
                    print_r($busqueda);
                    if($busqueda){
                        $statement2 = $conexion->prepare("UPDATE profesor_materia SET nick_profesor = AES_ENCRYPT(:nick_profesor,'$llave') WHERE clave = :clave");
                        $statement2->execute(array(
                            ':nick_profesor' => $ProfeAsig,
                            ':clave' => $ClaveM
                        ));
                    }else{
                        $statement6 = $conexion->prepare("INSERT INTO profesor_materia VALUES( AES_ENCRYPT(:nick_profesor,'$llave'), :clave)");
                        $statement6->execute(array(
                            ':nick_profesor' => $ProfeAsig,
                            ':clave' => $ClaveM
                        ));
                    }

                }

                if (!($Grupo === '0')) {

                    $statement2 = $conexion->prepare("UPDATE materia SET grupo = :Grupo WHERE clave = :clave");
                    $statement2->execute(array(
                    ':Grupo' => $Grupo,
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
