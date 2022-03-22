<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Cuestionario</title>
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link rel="stylesheet" href="../css/sb-admin.css">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body>

    <!-- Topbar -->
    <nav class="navbar navbar-expand topbar mb-2 static-top shadow">
        <div class="collapse text-gray-900 navbar-collapse" id="navbarNavDropdown">
            <!--Poner código para encontrar el nombre de la materia.-->
            <?php
                $consultamateria = $conexion->prepare("SELECT * FROM
                cuestionario WHERE id_cuestionario='$id_cuestionario'");
                $consultamateria->execute();
                $mate = $consultamateria->fetch();
                $consulta7= $conexion->prepare("SELECT * FROM cuestionario NATURAL JOIN cuestionario_reactivo WHERE cuestionario.id_cuestionario=$id_cuestionario;");
                $consulta7->execute();
                $y = $consulta7->fetchAll();
                $consulta8 = $conexion->prepare("SELECT * FROM alumno_cuestionario_reactivo WHERE id_cuestionario=$id_cuestionario AND nick_alumno=AES_ENCRYPT('$usuario','$llave')");
                $consulta8->execute();
                $x = $consulta8->fetchAll();
                $preguntas_contestadas = $consulta8->rowCount();
                $preguntasxcuestionario = $consulta7->rowCount();
            ?>
            <h5><i class="fas fa-book fa-sm"></i> Nombre del Cuestionario:
                <?php echo $mate['nombre']; if ($preguntas_contestadas==$preguntasxcuestionario) {
                echo ' (Concluido)';
            }?>
            </h5>
        </div>
    </nav>

    <div class="container ">


        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-9 col-lg-9 col-md-9">

                <div class="card o-hidden shadow-lg my-4  m-3 border-left-success">
                    <div class="card-body p-0">

                        <?php foreach ($preguntas as $pregunta): ?>
                        <?php $_SESSION['id_reactivo'] = $pregunta['id_reactivo'];?>
                        <?php
                            $id = $pregunta['id_reactivo'];
                            $consulta5=$conexion->prepare("SELECT * FROM alumno_cuestionario_reactivo WHERE id_reactivo=$id AND nick_alumno=AES_ENCRYPT('$usuario','$llave');");
                            $consulta6=$conexion->prepare("SELECT alumno_cuestionario_reactivo.nick_alumno,
                            alumno_cuestionario_reactivo.id_cuestionario, reactivo.id_reactivo,
                            reactivo.respuesta, alumno_cuestionario_reactivo.respuesta_alumno
                            FROM alumno_cuestionario_reactivo,reactivo WHERE alumno_cuestionario_reactivo.id_reactivo=reactivo.id_reactivo
                            AND reactivo.id_reactivo=$id AND alumno_cuestionario_reactivo.nick_alumno=AES_ENCRYPT('$usuario','$llave');");
                            $consulta6->execute();

                        ?>
                        <div class="row">

                            <div class="col">
                                <form action="verificar_pregunta.php" method="post">
                                    <div class="m-5 text-gray-900">

                                        <div class="card">

                                            <div class="pregresp">
                                                <div class="h5 mb-0 pregunta mb-4">
                                                    <?php echo $pregunta['enunciado']; ?><br /></div>
                                                <div class="respuestas row">
                                                    <div class="col">
                                                        <?php
                                                        $var=$consulta6->fetch();

                                                        if (!$var):?>
                                                        <ol type="a">
                                                            <li>
                                                                <input type="radio" name="preg" value="a"
                                                                    checked /><?php echo $pregunta['inciso_a_texto']; ?>
                                                                <!---->
                                                            </li>
                                                            <li>
                                                                <input type="radio" name="preg" value="b" />
                                                                <?php echo $pregunta['inciso_b_texto']; ?>
                                                            </li>
                                                            <li>
                                                                <input type="radio" name="preg" value="c" />
                                                                <?php echo $pregunta['inciso_c_texto']; ?>
                                                            </li>
                                                            <li>
                                                                <input type="radio" name="preg" value="d" />
                                                                <?php echo $pregunta['inciso_d_texto']; ?>
                                                                <!--<i class="fas fa-fw fa-check"></i></li>-->
                                                            </li>
                                                        </ol>
                                                        <?php else:?>
                                                        <?php
                                                            $a = $pregunta['inciso_a_texto'];
                                                            $b = $pregunta['inciso_b_texto'];
                                                            $c = $pregunta['inciso_c_texto'];
                                                            $d = $pregunta['inciso_d_texto'];
                                                            ?>
                                                        <?php if ($var['respuesta']==$var['respuesta_alumno']):?>
                                                        <ol type="a">
                                                            <?php
                                                                    switch ($var['respuesta']) {
                                                                        case 'a':
                                                                        echo "<li>
                                                                            <input type='radio' name='preg' value='a' checked disabled />
                                                                            $a
                                                                            <i class='fas fa-fw fa-check'></i></li>
                                                                        </li>
                                                                        <li>
                                                                            <input type='radio' name='preg' value='b' disabled />
                                                                            $b
                                                                        </li>
                                                                        <li>
                                                                            <input type='radio' name='preg' value='c' disabled />
                                                                            $c
                                                                        </li>
                                                                        <li>
                                                                            <input type='radio' name='preg' value='d' disabled />
                                                                            $d
                                                                        </li>";
                                                                        break;

                                                                        case 'b':
                                                                        echo "<li>
                                                                            <input type='radio' name='preg' value='a' disabled/>
                                                                            $a
                                                                        </li>
                                                                        <li>
                                                                            <input type='radio' name='preg' value='b' checked disabled />
                                                                            $b
                                                                            <i class='fas fa-fw fa-check'></i></li>
                                                                        </li>
                                                                        <li>
                                                                            <input type='radio' name='preg' value='c' disabled />
                                                                            $c
                                                                        </li>
                                                                        <li>
                                                                            <input type='radio' name='preg' value='d' disabled />
                                                                            $d
                                                                        </li>";
                                                                        break;

                                                                        case 'c':
                                                                        echo "<li>
                                                                            <input type='radio' name='preg' value='a' disabled/>
                                                                            $a
                                                                        </li>
                                                                        <li>
                                                                            <input type='radio' name='preg' value='b' disabled />
                                                                            $b
                                                                        </li>
                                                                        <li>
                                                                            <input type='radio' name='preg' value='c' checked disabled />
                                                                            $c
                                                                            <i class='fas fa-fw fa-check'></i></li>
                                                                        </li>
                                                                        <li>
                                                                            <input type='radio' name='preg' value='d' disabled />
                                                                            $d
                                                                        </li>";
                                                                        break;

                                                                        case 'd':
                                                                        echo "<li>
                                                                            <input type='radio' name='preg' value='a' disabled/>
                                                                            $a
                                                                        </li>
                                                                        <li>
                                                                            <input type='radio' name='preg' value='b' disabled />
                                                                            $b
                                                                        </li>
                                                                        <li>
                                                                            <input type='radio' name='preg' value='c' disabled/>
                                                                            $c
                                                                        </li>
                                                                        <li>
                                                                            <input type='radio' name='preg' value='d' checked disabled />
                                                                            $d
                                                                            <i class='fas fa-fw fa-check'></i></li>
                                                                        </li>";
                                                                        break;
                                                                    }
                                                                    ?>
                                                        </ol>
                                                        <?php else:?>
                                                        <ol type="a">
                                                            <?php
                                                                    switch ($var['respuesta']) {
                                                                        //Respuesta A
                                                                        case 'a':
                                                                        echo "<li>
                                                                                <input type='radio' name='preg' value='a' disabled />
                                                                                $a
                                                                                <i class='fas fa-fw fa-check'></i></li>
                                                                            </li>";
                                                                            switch ($var['respuesta_alumno']) {
                                                                                case 'b':
                                                                                    echo    "<li>
                                                                                                <input type='radio' name='preg' value='b' checked disabled />
                                                                                                $b
                                                                                                <i class='fas fa-fw fa-times'></i>
                                                                                            </li>
                                                                                            <li>
                                                                                                <input type='radio' name='preg' value='c' disabled />
                                                                                                $c
                                                                                            </li>
                                                                                            <li>
                                                                                                <input type='radio' name='preg' value='d' disabled />
                                                                                                $d
                                                                                            </li>";
                                                                                break;

                                                                                case 'c':
                                                                                    echo    "<li>
                                                                                                <input type='radio' name='preg' value='b' disabled />
                                                                                                $b
                                                                                            </li>
                                                                                            <li>
                                                                                                <input type='radio' name='preg' value='c' checked disabled />
                                                                                                $c
                                                                                                <i class='fas fa-fw fa-times'></i>
                                                                                            </li>
                                                                                            <li>
                                                                                                <input type='radio' name='preg' value='d' disabled />
                                                                                                $d
                                                                                            </li>";
                                                                                break;

                                                                                case 'd':
                                                                                    echo    "<li>
                                                                                                <input type='radio' name='preg' value='b' disabled />
                                                                                                $b
                                                                                            </li>
                                                                                            <li>
                                                                                                <input type='radio' name='preg' value='c' disabled />
                                                                                                $c
                                                                                            </li>
                                                                                            <li>
                                                                                                <input type='radio' name='preg' value='d' checked disabled />
                                                                                                $d
                                                                                                <i class='fas fa-fw fa-times'></i>
                                                                                            </li>";
                                                                                break;

                                                                            }

                                                                        break;
                                                                        //Respuesta B
                                                                        case 'b':
                                                                            if ($var['respuesta_alumno']=='a') {
                                                                                echo "<li>
                                                                                    <input type='radio' name='preg' value='a' checked disabled />
                                                                                    $a
                                                                                    <i class='fas fa-fw fa-times'></i>
                                                                                </li>";
                                                                            } else {
                                                                                echo "<li>
                                                                                <input type='radio' name='preg' value='a' disabled/>
                                                                                $a
                                                                             </li>";
                                                                            }

                                                                        echo "<li>
                                                                            <input type='radio' name='preg' value='b' disabled />
                                                                            $b
                                                                            <i class='fas fa-fw fa-check'></i></li>
                                                                        </li>";
                                                                        if ($var['respuesta_alumno']=='c') {
                                                                            echo "<li>
                                                                            <input type='radio' name='preg' value='c' checked disabled />
                                                                            $c
                                                                            <i class='fas fa-fw fa-times'></i>
                                                                            </li>";
                                                                        } else {
                                                                            echo "<li>
                                                                            <input type='radio' name='preg' value='c' disabled />
                                                                            $c
                                                                            </li>";
                                                                        }
                                                                        if ($var['respuesta_alumno']=='d') {
                                                                            echo "<li>
                                                                            <input type='radio' name='preg' value='d' checked disabled />
                                                                            $d
                                                                            <i class='fas fa-fw fa-times'></i>
                                                                            </li>";
                                                                        } else {
                                                                            echo "<li>
                                                                            <input type='radio' name='preg' value='d' disabled />
                                                                            $d
                                                                            </li>";
                                                                        }

                                                                        break;
                                                                        //Respuesta C
                                                                        case 'c':
                                                                            if ($var['respuesta_alumno']=='a') {
                                                                                echo "<li>
                                                                                        <input type='radio' name='preg' value='a' disabled checked/>
                                                                                        $a
                                                                                        <i class='fas fa-fw fa-times'></i>
                                                                                    </li>";
                                                                            } else {
                                                                                echo "<li>
                                                                                    <input type='radio' name='preg' value='a' disabled/>
                                                                                    $a
                                                                                 </li>";
                                                                            }
                                                                            if ($var['respuesta_alumno']=='b') {
                                                                                echo "<li>
                                                                                <input type='radio' name='preg' value='b' checked disabled />
                                                                                $b
                                                                                <i class='fas fa-fw fa-times'></i>
                                                                                </li>";
                                                                            } else {
                                                                                echo "<li>
                                                                                <input type='radio' name='preg' value='b' disabled />
                                                                                $b
                                                                                </li>";
                                                                            }

                                                                            echo "<li>
                                                                                <input type='radio' name='preg' value='c' disabled />
                                                                                $c
                                                                                <i class='fas fa-fw fa-check'></i></li>
                                                                                </li>";

                                                                            if ($var['respuesta_alumno']=='d') {
                                                                                echo "<li>
                                                                                <input type='radio' name='preg' value='d' checked disabled />
                                                                                $d
                                                                                <i class='fas fa-fw fa-times'></i>
                                                                                </li>";
                                                                            } else {
                                                                                echo "<li>
                                                                                <input type='radio' name='preg' value='d' disabled />
                                                                                $d
                                                                                </li>";
                                                                            }
                                                                        break;
                                                                        //Respuesta D
                                                                        case 'd':

                                                                            switch ($var['respuesta_alumno']) {
                                                                                case 'a':
                                                                                    echo    "<li>
                                                                                                <input type='radio' name='preg' value='a' checked disabled />
                                                                                                $a
                                                                                                <i class='fas fa-fw fa-times'></i>
                                                                                            </li>
                                                                                            <li>
                                                                                                <input type='radio' name='preg' value='b' disabled />
                                                                                                $b
                                                                                            </li>
                                                                                            <li>
                                                                                                <input type='radio' name='preg' value='c' disabled />
                                                                                                $c
                                                                                            </li>";
                                                                                break;

                                                                                case 'b':
                                                                                    echo    "<li>
                                                                                                <input type='radio' name='preg' value='a' disabled />
                                                                                                $a

                                                                                            </li>
                                                                                            <li>
                                                                                                <input type='radio' name='preg' value='b' checked disabled />
                                                                                                $b
                                                                                                <i class='fas fa-fw fa-times'></i>
                                                                                            </li>
                                                                                            <li>
                                                                                                <input type='radio' name='preg' value='c' disabled />
                                                                                                $c
                                                                                            </li>";
                                                                                break;

                                                                                case 'c':
                                                                                    echo    "<li>
                                                                                                <input type='radio' name='preg' value='a' disabled />
                                                                                                $a
                                                                                            </li>
                                                                                            <li>
                                                                                                <input type='radio' name='preg' value='b' disabled />
                                                                                                $b

                                                                                            </li>
                                                                                            <li>
                                                                                                <input type='radio' name='preg' value='c' checked disabled />
                                                                                                $c
                                                                                                <i class='fas fa-fw fa-times'></i>
                                                                                            </li>";
                                                                                break;
                                                                            }
                                                                            echo "<li>
                                                                                <input type='radio' name='preg' value='d' disabled />
                                                                                $d
                                                                                <i class='fas fa-fw fa-check'></i></li>
                                                                            </li>";
                                                                        break;
                                                                    }
                                                                    ?>
                                                        </ol>
                                                        <?php endif?>
                                                        <?php endif?>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="text-left col">

                                                <a href="alumno_materiacuestionario.php" class="btn btn-danger">
                                                    Salir
                                                </a>
                                                <?php
                                                $consulta5->execute();
                                                if (!$consulta5->fetch()):?>
                                                <input type="submit" class="btn btn-success ml-2" value="Verificar">
                                                <?php else:?>
                                                <input type="submit" class="btn btn-secondary ml-2" disabled
                                                    value="Verificar">
                                                <?php endif?>


                                            </div>
                                            <div class="col text-right">
                                                <?php if ($preguntas_contestadas==$preguntasxcuestionario):?>
                                                <a id="mensaje" class="btn btn-info" href="#info1"
                                                    data-toggle="modal">Resultados</a>
                                                <?php endif?>
                                            </div>
                                        </div>

                                    </div>
                                </form>

                            </div>
                        </div>

                        <?php endforeach?>

                        <div class="row">
                            <div class="col offset-md-3">
                                <nav aria-label="Page navigation">
                                    <ul class="pagination ">
                                        <li class=" page-item
                                        <?php echo $_GET['pagina']<=1 ? 'disabled' : ''?>">
                                            <a class="page-link"
                                                href="alumno_cuestionario.php?pagina=<?php echo $_GET['pagina']-1;  $_SESSION['num_preg'] = $_GET['pagina']-1;?>"
                                                aria-label="Previous">
                                                <span aria-hidden="true">&laquo;</span>
                                            </a>
                                        </li>

                                        <?php for ($i=0;$i<$paginas;$i++):?>
                                        <li class="page-item <?php echo $_GET['pagina']==$i+1 ? 'active' : ''?>">
                                            <a class="page-link"
                                                href="alumno_cuestionario.php?pagina=<?php echo $i+1; $_SESSION['num_preg'] = $i+1;?>">
                                                <?php echo $i+1;?>
                                            </a>
                                        </li>
                                        <?php endfor?>

                                        <li class="page-item
                                        <?php echo $_GET['pagina']>=$paginas ? 'disabled' : ''?>">
                                            <a class="page-link"
                                                href="alumno_cuestionario.php?pagina=<?php echo $_GET['pagina']+1;  $_SESSION['num_preg'] = $_GET['pagina']+1;?>"
                                                aria-label="Next">
                                                <span aria-hidden="true">&raquo;</span>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>
    <?php
        $aciertos=0;
        $errores=0;
        if ($preguntas_contestadas==$preguntasxcuestionario) {
            $consulta9= $conexion->prepare("SELECT reactivo.id_reactivo, reactivo.respuesta,
            alumno_cuestionario_reactivo.nick_alumno, alumno_cuestionario_reactivo.respuesta_alumno,
            alumno_cuestionario_reactivo.id_cuestionario FROM reactivo NATURAL JOIN
            alumno_cuestionario_reactivo WHERE alumno_cuestionario_reactivo.nick_alumno=
            AES_ENCRYPT('$usuario','$llave') AND alumno_cuestionario_reactivo.id_cuestionario=$id_cuestionario;");
            $consulta9->execute();
            $resultados = $consulta9->fetchAll();
            //var_dump($resultados);
            foreach ($resultados as $resultado) {
                if ($resultado['respuesta']==$resultado['respuesta_alumno']) {
                    $aciertos++;
                } else {
                    $errores++;
                }
            }
            $insercion = $conexion->prepare("UPDATE alumno_realiza_cuestionario SET aciertos = $aciertos,
            errores = $errores WHERE id_cuestionario = $id_cuestionario AND nick_alumno=AES_ENCRYPT('$usuario','$llave');");
            $insercion->execute();
            $insercion2 = $conexion->prepare("UPDATE alumno_solicita_cuestionario SET estado='Concluido'
            WHERE id_cuestionario = $id_cuestionario AND nick_alumno=AES_ENCRYPT('$usuario','$llave');");
            $insercion2->execute();
        }

    ?>
    <div class="modal fade" id="info1">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Header de la ventana -->
                <div class="modal-header text-gray-900">
                    <h5 class="modal-title">Cuestionario finalizado</h5>
                    <button tyle="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <!-- Contenido de la ventana -->
                <div class="modal-body row mr-0 ml-0 ">
                    <div class="text-center text-gray-900 col">
                        <h6>Total de reactivos:</h6>
                    </div>
                    <div class="text-center text-gray-900 col">
                        <h6><?php echo $preguntasxcuestionario;?></h6>
                    </div>
                </div>
                <div class="modal-body row mr-0 ml-0 ">
                    <div class="text-center text-gray-900 col">
                        <h6>Aciertos totales:</h6>
                    </div>
                    <div class="text-center text-gray-900 col">
                        <h6><?php echo $aciertos;?></h6>
                    </div>
                </div>

                <div class="modal-body row  mr-0 ml-0">
                    <div class="text-center text-gray-900  col">
                        <h6>Errores totales:</h6>
                    </div>
                    <div class="text-center text-gray-900  col">
                        <h6><?php echo $errores;?></h6>
                    </div>
                </div>

                <!-- Foooter de la ventana -->
                <div class="modal-footer container my-auto">
                    <div cl></div>
                    <button tyle="button" class="btn btn-success" data-dismiss="modal">Aceptar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script>
    function darclick() {
        document.getElementById('mensaje').click();
    }
    </script>

</body>

</html>
