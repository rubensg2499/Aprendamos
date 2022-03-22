<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Editar reactivo</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link rel="stylesheet" href="css/sb-admin.css">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body>

    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand topbar mb-2 static-top shadow">
                    <div class="collapse text-gray-900 navbar-collapse" id="navbarNavDropdown">

                        <h5><i class="fas fa-book fa-sm"></i> Repositorio <i
                                class="fas ml-2 mr-2 fa-arrow-right  fa-sm"></i>Materia <i
                                class="fas ml-2 mr-2 fa-arrow-right  fa-sm"></i> Editar reactivo</h5>
                    </div>
                </nav>
                <!-- End of Topbar -->


                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Content Row -->

                    <div class="row pl-md-3 pr-md-3">

                        <div class="col-xl-9 col-xs-12">

                            <div class="card shadow border-left-success">
                                <!-- Card Header - Dropdown -->

                                <div class="card-header">
                                    <h5 class="m-0 text-gray-800"><?php echo $_SESSION['nombre_asignatura']; ?></h5>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">

                                    <div class="row pl-3">
                                        <h5>Tipo de Reactivo : <?php echo $tipo; ?></h5>
                                    </div>
                                    <div class="row pl-3">
                                        <h5>Complejidad: <?php echo $complejidad; ?></h5>
                                    </div>
                                    <form action="actualizar_reactivo.php" method="POST">
                                        <div class="flex-row">
                                            <div class="form-group pl-2 pr-5 pt-3">
                                                <textarea class="form-control rounded-2" rows="5"
                                                    placeholder="Escriba el enunciado de la reactivo..." required
                                                    name='contenido_reactivo'><?php echo $enunciado; ?></textarea>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-xl-6 col-xs-12">

                                                <h5>Ingrese las posibles respuestas </h5>

                                                <div class="form-group row pl-4">
                                                    <h5>a)</h5>
                                                    <div class="col-sm-8">
                                                        <?php echo "<input id='1' class='form-control' type='text'
                                                        placeholder='Respuesta 1' value='$a' name='respuesta1'>";?>
                                                    </div>
                                                </div>
                                                <div class="form-group row pl-4">
                                                    <h5>b)</h5>
                                                    <div class="col-sm-8">
                                                        <?php echo "<input id='2' class='form-control' type='text'
                                                        placeholder='Respuesta 2' value='$b' name='respuesta2'>";?>
                                                    </div>
                                                </div>
                                                <div class="form-group row pl-4">
                                                    <h5>c)</h5>
                                                    <div class="col-sm-8">
                                                        <?php echo "<input id='3' class='form-control' type='text'
                                                        placeholder='Respuesta 3' value='$c' name='respuesta3'>";?>
                                                    </div>
                                                </div>
                                                <div class="form-group row pl-4">
                                                    <h5>d)</h5>
                                                    <div class="col-sm-8">
                                                        <?php echo "<input id='4' class='form-control' type='text'
                                                        placeholder='Respuesta 4' value='$d' name='respuesta4'>";?>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-7">
                                                        <h5>Seleccione la respuesta correcta :</h5>
                                                    </div>

                                                    <div class="form-group">
                                                        <select class="form-control" name="respuesta_correcta">
                                                            <?php
                                                            switch ($respuesta) {
                                                                case "a":
                                                                    echo "<option selected>a)</option><option>b)</option><option>c)</option><option>d)</option>";
                                                                break;
                                                                case "b":
                                                                    echo "<option>a)</option><option selected>b)</option><option>c)</option><option>d)</option>";
                                                                break;
                                                                case "c":
                                                                    echo "<option>a)</option><option>b)</option><option selected>c)</option><option>d)</option>";
                                                                break;
                                                                case "d":
                                                                    echo "<option>a)</option><option>b)</option><option>c)</option><option selected>d)</option>";
                                                                break;
                                                            }
                                                        ?>
                                                        </select>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="col">
                                                <div class="form-group row">
                                                    <h5>Estado del reactivo :</h5>

                                                    <div class="form-group col-5">
                                                        <select class="form-control " name="estado_reactivo">
                                                            <?php
                                                            switch ($estado) {
                                                                case "A medio terminar":
                                                                    echo "<option selected>A medio terminar</option><option>Disponible</option><option>Obsoleto</option>";
                                                                break;
                                                                case "Disponible":
                                                                    echo "<option>A medio terminar</option><option selected>Disponible</option><option>Obsoleto</option>";
                                                                break;
                                                                case "Obsoleto":
                                                                    echo "<option>A medio terminar</option><option>Disponible</option><option selected>Obsoleto</option>";
                                                                break;
                                                            }
                                                        ?>

                                                        </select>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                        <div class="text-right">
                                            <a href="#cancel" class="btn btn-danger" data-toggle="modal">
                                                Cancelar</a>
                                            <a href="#edit" class="btn btn-success " data-toggle="modal"> Editar
                                                reactivo</a>
                                        </div>

                                        <div class="modal fade" id="edit" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <!-- Header de la ventana -->
                                                    <div class="modal-header text-gray-900">
                                                        <h5 class="modal-title">Advertencia</h5>
                                                        <button tyle="button" class="close" data-dismiss="modal"
                                                            aria-hidden="true">&times;</button>
                                                    </div>
                                                    <!-- Contenido de la ventana -->
                                                    <div class="modal-body">
                                                        <div class="text-body text-gray-900">
                                                            <p>¿Está seguro de guardar cambios en este reactivo?</p>
                                                        </div>
                                                    </div>
                                                    <!-- Foooter de la ventana -->
                                                    <div class="modal-footer">
                                                        <button tyle="button" class="btn btn-danger"
                                                            data-dismiss="modal">Cancelar</button>
                                                        <button tyle="button" class="btn btn-success"
                                                            data-dismiss="modal">No</button>
                                                        <input type="submit" value="Sí" class="btn btn-success" data-toggle="modal">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>


                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-xs-0">
                            <div class="card shadow border-left-info">
                                <div class="card-header"><i class="fas ml-2 mr-2 fa-info-circle fa-sm"></i>Información
                                </div>
                                <div class="card-body">
                                    <?php
                                            switch ($tipo) {
                                                case "Directo":
                                                    echo " <p>Las preguntas directas se construyen de la siguiente manera. Escriba la pregunta y dentro de los cuadros de texto coloqué una única respuesta por cada opción.
                                                    <br>Ejemplo:
                                                    <br>¿En qué año ocurri&oacute; la ca&iacute;da de Tenochtitlan?
                                                    <br>a) 1521
                                                    <br>b) 1251
                                                    <br>c) 1608
                                                    <br>d) 1624</p>";
                                                break;
                                                case "Conjuntos":
                                                    echo " <p>Las preguntas de conjuntos se construyen de la siguiente manera. Escriba la pregunta y dentro de los cuadros de texto coloqué un conjunto de respuestas separadas por comas por cada opción.
                                                    <br>Ejemplo:
                                                    <br>¿Cúal de los siguientes conjuntos es un conjunto de frutas?
                                                    <br>a) Elotes, peras, naranjas.
                                                    <br>b) Aguacates, uvas, melones.
                                                    <br>c) Naranjas, pasas, zanahorias, papas.
                                                    <br>d) Apio, uvas, naranjas, piñas.";
                                                break;
                                                case "Complemento":
                                                    echo " <p>Las preguntas de complemento se construyen de la siguiente manera. Escriba la pregunta con los signos ¿? donde quiere que vaya un espacio en blanco. Dentro de los cuadros de texto coloque una respuesta o un conjunto de respuestas separadas por comas que satisface la pregunta.
                                                    <br>Ejemplo:
                                                    <br>El notorio ¿? escribi&oacute; el libro 'El amor en los tiempos del c&oacute;lera'.
                                                    <br>a) Stephen King
                                                    <br>b) Gabriel Garc&iacute;a M&aacute;rquez
                                                    <br>c) Plat&oacute;n
                                                    <br>d) Antonio Malpica";
                                                break;
                                            }
                                        ?>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                <!-- /.container-fluid -->


            </div>
        </div>
    </div>

    <!-- VENTANAS EMERGENTES  ------------------------------------------------------------------------------->



    <div class="modal fade" id="edit1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <!-- Header de la ventana -->
                <div class="modal-header  text-gray-900">
                    <h5 class="modal-title">Información</h5>
                    <button tyle="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <!-- Contenido de la ventana -->
                <div class="modal-body">
                    <div class="text-body text-gray-900">Reactivo editado con éxito.</div>
                </div>
                <!-- Foooter de la ventana -->
                <div class="modal-footer">
                    <a href="profesor-repositorio.php" class="btn btn-success "> Aceptar </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Advertencia - cancelar Cuestionario -->
    <div class="modal fade" id="cancel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <!-- Header de la ventana -->
                <div class="modal-header text-gray-900">
                    <h5 class="modal-title">Advertencia</h5>
                    <button tyle="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <!-- Contenido de la ventana -->
                <div class="modal-body">
                    <div class="text-body text-gray-900">¿Está seguro de cancelar la edición de este reactivo?<br>No se
                        guardarán los cammbios realizados.</div>
                </div>
                <!-- Foooter de la ventana -->
                <div class="modal-footer">
                    <button tyle="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <button tyle="button" class="btn btn-danger" data-dismiss="modal">No</button>
                    <a href="profesor_repositoriomateria.php" class="btn btn-success"> Sí </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>


</body>

</html>
