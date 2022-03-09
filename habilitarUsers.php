<?php
    session_start();
    if (isset($_SESSION['usuario'])) {
    	try {
			$conexion = new PDO('mysql:host=localhost;dbname=aplicacion_web', 'root', '');

			$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$_SESSION['nick_usuario'] = $_POST['checkSelect2'];
            
            $nick_usuario = $_SESSION['nick_usuario'];
            $llave = 'llave';
            foreach ($nick_usuario as $reg ) {
            	$statement = $conexion->prepare("UPDATE usuario SET estado = 1 WHERE AES_DECRYPT(nick_usuario,'llave') = :nick_usuario");
                $statement->execute(array(
                    ':nick_usuario' => $reg
                ));
            }
			
		} catch (PDOException $e) {
			echo "Error:" . $e->getMessage();
		}

        
        header('Location: administrador_alumnos.php');
    } else {
        header('Location: index.php');
        die();
    }

?>