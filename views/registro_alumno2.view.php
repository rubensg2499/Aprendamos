<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Registro</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="css/sb-admin.css" rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style2.css" />

</head>

<body class="bg-gradient-success">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-10">

                <div class="card o-hidden border-0 shadow-lg my-4">
                    <div class="card-body p-0">

                        <div class="text-center">
                            <br>
                            <h1 class="h4 mb-2">Alumno</h1>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <div class="m-4">
                                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                                        <div class="form-group">
                                            <div class="form-label-group">
                                                <input type="email" name="correo" class="form-control"
                                                    placeholder="Correo electrónico" required
                                                    autofocus="autofocus" value="<?php echo isset($_POST['correo']) ? $_POST['correo'] : '';?>">
                                                <label for="correo">Correo electrónico</label>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <div class="form-label-group">
                                                <input type="text" name="nick" class="form-control"
                                                    placeholder="Usuario" maxlength="16" minlength="5" required value="<?php echo isset($_POST['nick']) ? $_POST['nick'] : '';?>">
                                                <label for="usuario">Usuario</label>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="form-label-group">
                                                <input type="password" name="inputPassword" class="form-control"
                                                    placeholder="Contraseña" maxlength="16" minlength="8" required>
                                                <label for="inputPassword">Contraseña</label>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="form-label-group">
                                                <input type="password" name="confirmPassword" class="form-control"
                                                    placeholder="Repetir contraseña" required>
                                                <label for="confirmPassword">Repetir contraseña</label>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <select class="form-control" name="pregunta" id="combo">
                                                <option value="1">¿Cuál es el nombre de tu mejor amigo(a)?</option>
                                                <option value="2">¿Cuál es el nombre de tu primera mascota?</option>
                                                <option value="3">¿Cuál es el nombre de tu mamá?</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-label-group">
                                                <input type="text" name="respuesta" class="form-control"
                                                    placeholder="Respuesta" required value="<?php echo isset($_POST['respuesta']) ? $_POST['respuesta'] : '';?>">
                                                <label for="respuesta">Respuesta</label>
                                            </div>
                                        </div>
                                        <div class="text-right">
                                            <a href="index.php" class="btn btn-danger"> Cancelar </a>
                                            <a href="registro_alumno1.php" class="btn btn-success "> Regresar </a>
                                            <input type="submit" value="Registrarse" class="btn btn-success">
                                            <a id="m1" href="#mensaje1" data-toggle="modal"></a>
                                            <a id="m2" href="#mensaje2" data-toggle="modal"></a>
                                            <a id="m3" href="#mensaje3" data-toggle="modal"></a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-lg-6 text-center">
                                <img src="recursos/images/img-alum.jpg" class=" img-center">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="mensaje1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <!-- Header de la ventana -->
                <div class="modal-header  text-gray-900">
                    <h5 class="modal-title">Información</h5>
                    <button tyle="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <!-- Contenido de la ventana -->
                <div class="modal-body text-gray-900">Registro exitoso.</div>
                <!-- Foooter de la ventana -->
                <div class="modal-footer">
                    <a href="index.php" class="btn btn-success "> Aceptar </a>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="mensaje2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <!-- Header de la ventana -->
                <div class="modal-header  text-gray-900">
                    <h5 class="modal-title">Información</h5>
                    <button tyle="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <!-- Contenido de la ventana -->
                <div class="modal-body text-gray-900">Las contraseñas no coinciden, por favor intente de nuevo.</div>
                <!-- Foooter de la ventana -->
                <div class="modal-footer">
                <button class="btn btn-success" data-dismiss="modal">Aceptar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="mensaje3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <!-- Header de la ventana -->
                <div class="modal-header  text-gray-900">
                    <h5 class="modal-title">Información</h5>
                    <button tyle="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <!-- Contenido de la ventana -->
                <div class="modal-body text-gray-900">Ya existe un usuario con ese nick, pruebe uno diferente.</div>
                <!-- Foooter de la ventana -->
                <div class="modal-footer">
                <button class="btn btn-success" data-dismiss="modal">Aceptar</button>
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
    <?php
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if($_SESSION['inputPassword']!==$_SESSION['confirmPassword']){
                echo "<script>";
                echo 'document.getElementById("m2").click();';
                echo "</script>";
            }
            if($finalizo){
                echo "<script>";
                echo 'document.getElementById("m1").click();';
                echo "</script>";
            }
            if ($resultado != false) {
                echo "<script>";
                echo 'document.getElementById("m3").click();';
                echo "</script>";
            }
        }
        if(isset($_POST['pregunta'])){
            echo "<script>";
            echo 'document.getElementById("combo").selectedIndex = ' . $_POST['pregunta'];
            echo "</script>";
        }else{
            echo "<script>";
            echo 'document.getElementById("combo").selectedIndex = 0';
            echo "</script>";
        }
    ?>
</body>

</html>