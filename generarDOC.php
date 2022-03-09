<?php
    session_start();
    header("Content-type: application/vnd.ms-word");
    header("Content-Disposition: attachment; Filename=nombreDelArchivo.doc");


    if( isset($_SESSION['usuario']) )
    {
        
        $usuario = $_SESSION['usuario'];

            try
            {
                $conexion = new PDO('mysql:host=localhost;dbname=aplicacion_web','root','');

                $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $sql="SELECT m.nombre AS nombre_mat FROM cuestionario c, materia m WHERE id_cuestionario=:id_cue AND c.clave=m.clave;";
                
                $statement = $conexion->prepare($sql);

                $statement->execute(array(':id_cue'=>$_SESSION['id_cue']));

                $registro_mat = $statement->fetch();
                $numero_registro = $statement->rowCount();

                if(!$numero_registro) 
                {
                    echo "No se encuentró registro";
                }
                
                $statement->closeCursor();
                
                $sql="SELECT enunciado, inciso_a_texto, inciso_b_texto, inciso_c_texto, 
                inciso_d_texto, respuesta FROM reactivo WHERE id_reactivo IN 
                (SELECT id_reactivo FROM cuestionario_reactivo WHERE 
                id_cuestionario=:id_cue);";
                
                $statement = $conexion->prepare($sql);

                $statement->execute(array(':id_cue'=>$_SESSION['id_cue']));

                $registro_cr = $statement->fetchAll();
                $numero_registro = $statement->rowCount();

                if(!$numero_registro) 
                {
                    echo "No se encuentró registro";
                }
                
                $statement->closeCursor();
                
                
            }   
            catch(PDOException $e)
            {
                die("La página está experimentando unos problemas..." . $e->getMessage());
            }    

                   
    
    }
    else    {   
                header('Location: index.php'); 
                die();
            }

     switch (strftime("%m")) {
		case '01':
			$mess= "enero";
			break;
		case '02':
			$mess= "febrero";
			break;
		case '03':
			$mess= "marzo";
			break;
		case '04':
			$mess= "abril";
			break;	
		case '05':
			$mess= "mayo";
			break;
		case '06':
			$mess= "junio";
			break;
		case '07':
			$mess= "julio";
			break;
		case '08':
			$mess= "agosto";
			break;
		case '09':
			$mess= "septiembre";
			break;
		case '10':
			$mess= "octubre";
			break;
		case '11':
			$mess= "noviembre";
			break;
		case '12':
			$mess= "diciembre";
			break;
		} 

    
    echo "Santo Domingo Tehuantepec Oax., a ".strftime("%d de ").$mess.strftime(" del %Y")."<br>";
    echo "Asignatura: ".$registro_mat['nombre_mat']."<br>";
    echo utf8_decode("Profesor: ")."<br>";
    echo utf8_decode("Alumno: ")."<br>";
    $i = 1;
    foreach($registro_cr as $reg_rea)
    {
        echo utf8_decode($i.". ".$reg_rea['enunciado'])."<br>";
        echo utf8_decode("1).-".$reg_rea['inciso_a_texto'])."<br>";
        echo utf8_decode("RESPUESTA CORRECTA-> ".$reg_rea['respuesta'])."<br>";
        echo utf8_decode("2).-".$reg_rea['inciso_b_texto'])."<br>";
        echo utf8_decode("3).-".$reg_rea['inciso_c_texto'])."<br>";
        echo utf8_decode("4).-".$reg_rea['inciso_d_texto'])."<br>";
        $i++;
    }
?>