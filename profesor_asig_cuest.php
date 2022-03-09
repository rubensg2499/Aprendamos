<?php
    session_start();

    if( isset($_SESSION['usuario']) )
    {
        
        $usuario = $_SESSION['usuario'];
        //$tipo = $_SESSION['tipo_us'];
 
            try
            {
                $conexion = new PDO('mysql:host=localhost;dbname=aplicacion_web','root','');

                $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                 
            //    print_r($_SESSION['reg_alum']);
			//	print_r($_SESSION['reg_cue']);
				$_registro_alum = $_SESSION['reg_alum'];
                $_registro_cue = $_SESSION['reg_cue'];
                
            //    print_r($_POST);
          //  print_r($_registro_alum);
           // print_r($_registro_cue);
				$i=0;
               foreach($_registro_alum as $regalum)
                {
                    foreach($_POST as $index => $post)
                    {
                        if($index == $regalum)
                        {
                            $registro_alum[$i++] = $regalum;
                        }
                    }
                }
                print_r($registro_alum);
                $i=0;
               foreach($_registro_cue as $regcue)
                {
                    foreach($_POST as $index => $post)
                    {
                        if($index == $regcue)
                        {
                            $registro_cue[$i++] = $regcue;
                        }
                    }
                }

                print_r($registro_cue);

                foreach($registro_cue as $reg_cue)
                {
                    foreach($registro_alum as $reg_alum)
                    {
                        $sql="INSERT INTO alumno_solicita_cuestionario(nick_alumno,id_cuestionario,estado,fecha)
                        VALUE(AES_ENCRYPT('$reg_alum','llave'),'$reg_cue','En curso',CURDATE());";
                        
                        $statement = $conexion->prepare($sql);

                        $statement->execute();
                        
                        $statement->closeCursor();
                        $sql="INSERT INTO alumno_realiza_cuestionario VALUES(AES_ENCRYPT('$reg_alum','llave'),'$reg_cue',null,null)";
                        $statement = $conexion->prepare($sql);

                        $statement->execute();
                        
                        $statement->closeCursor();
                    }
                }
                
                header('Location: profesor_cuestionarios.php');
              //  die();

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
?>