<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Recuperar contraseña</title>

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
                        <div class="row">
                            <div class="col"></div>
                            <div class="col-lg-7 col-md-12">
                                <div class="m-5">
                                    <div class="text-center">
                                        <h1 class="h4 mb-2 text-success">Recuperar contraseña</h1>
                                        <p class="mb-4"></p>
                                    </div>

                                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                                        <div class="form-label-group">
                                            <input type="text" name="usuario" class="form-control form-control-user"
                                                placeholder="Usuario" required="required" autofocus="autofocus">
                                            <label for="usuario">Nombre de usuario</label>
                                        </div><br>

                                        <select class="form-control" name="pregunta">
                                            <option value="0">Elegir pregunta</option>
                                            <option value="1">¿Cuál es el nombre de tu mejor amigo(a)?</option>
                                            <option value="2">¿Cuál es el nombre de tu primera mascota?</option>
                                            <option value="3">¿Cuál es el nombre de tu mamá?</option>
                                        </select>
                                        <br>

                                        <div class="form-label-group">
                                            <input type="texto" name="respuesta" class="form-control"
                                                placeholder="Respuesta" required="required">
                                            <label for="respuesta">Respuesta</label>
                                        </div>
                                        <br>
                                        <div class="text-right">
                                            <a href="index.php" class="btn btn-success"> Regresar </a>
                                            <input type="submit" class="btn btn-success" data-toggle="modal"
                                                name="submit" value="Enviar">
                                            <a id="usuarioInhabilitado" href="#mensaje1" data-toggle="modal"></a>
                                            <a id="datosEnviados" href="#mensaje2" data-toggle="modal"></a>
                                            <a id="respIncorrecta" href="#mensaje3" data-toggle="modal"></a>
                                            <a id="pregIncorrecta" href="#mensaje4" data-toggle="modal"></a>
                                            <a id="pregNovalida" href="#mensaje5" data-toggle="modal"></a>
                                            <a id="usuarioInvalido" href="#mensaje6" data-toggle="modal"></a>
                                            <a id="mailerError" href="#mensaje7" data-toggle="modal"></a>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="col"></div>

                        </div>


                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Mensajes emergentes -->
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
                <div class="modal-body text-gray-900">Usuario no habilitado.</div>
                <!-- Foooter de la ventana -->
                <div class="modal-footer">
                    <a href="recuperar_contrasena.php" class="btn btn-success "> Aceptar </a>
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
                <div class="modal-body text-gray-900">Datos de inicio de sesión enviados, revise la bandeja de entrada
                    del correo asociado a la cuenta.</div>
                <!-- Foooter de la ventana -->
                <div class="modal-footer">
                    <a href="index.php" class="btn btn-success "> Aceptar </a>
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
                <div class="modal-body text-gray-900">Respuesta incorrecta.</div>
                <!-- Foooter de la ventana -->
                <div class="modal-footer">
                    <a href="recuperar_contrasena.php" class="btn btn-success "> Aceptar </a>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="mensaje4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <!-- Header de la ventana -->
                <div class="modal-header  text-gray-900">
                    <h5 class="modal-title">Información</h5>
                    <button tyle="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <!-- Contenido de la ventana -->
                <div class="modal-body text-gray-900">Pregunta de seguridad incorrecta.</div>
                <!-- Foooter de la ventana -->
                <div class="modal-footer">
                    <a href="recuperar_contrasena.php" class="btn btn-success "> Aceptar </a>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="mensaje5" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <!-- Header de la ventana -->
                <div class="modal-header  text-gray-900">
                    <h5 class="modal-title">Información</h5>
                    <button tyle="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <!-- Contenido de la ventana -->
                <div class="modal-body text-gray-900">Debe colocar una pregunta válida.</div>
                <!-- Foooter de la ventana -->
                <div class="modal-footer">
                    <a href="recuperar_contrasena.php" class="btn btn-success "> Aceptar </a>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="mensaje6" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <!-- Header de la ventana -->
                <div class="modal-header  text-gray-900">
                    <h5 class="modal-title">Información</h5>
                    <button tyle="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <!-- Contenido de la ventana -->
                <div class="modal-body text-gray-900">El usuario no existe en el sistema.</div>
                <!-- Foooter de la ventana -->
                <div class="modal-footer">
                    <a href="recuperar_contrasena.php" class="btn btn-success "> Aceptar </a>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="mensaje6" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <!-- Header de la ventana -->
                <div class="modal-header  text-gray-900">
                    <h5 class="modal-title">Información</h5>
                    <button tyle="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <!-- Contenido de la ventana -->
                <div class="modal-body text-gray-900">Lo sentimos, en estos momentos no podemos enviar correos
                    electrónicos. Por favor intente más tarde.</div>
                <!-- Foooter de la ventana -->
                <div class="modal-footer">
                    <a href="recuperar_contrasena.php" class="btn btn-success "> Aceptar </a>
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
        if($banderaMsg != NULL){
            if($banderaMsg === 'pregNovalida'){
                echo "<script>";         
                echo 'document.getElementById("pregNovalida").click();';
                echo "</script>";
                $banderaMsg = '';
            }else if($banderaMsg === 'usuarioInhabilitado'){
                echo "<script>";         
                echo 'document.getElementById("usuarioInhabilitado").click();';
                echo "</script>";
                $banderaMsg = '';
            }else if($banderaMsg === 'respIncorrecta'){
                echo "<script>";         
                echo 'document.getElementById("respIncorrecta").click();';
                echo "</script>";
                $banderaMsg = '';
            }else if($banderaMsg === 'pregIncorrecta'){
                echo "<script>";         
                echo 'document.getElementById("pregIncorrecta").click();';
                echo "</script>";
                $banderaMsg = '';
            }else if($banderaMsg === 'datosEnviados'){
                echo "<script>";         
                echo 'document.getElementById("datosEnviados").click();';
                echo "</script>";
                $banderaMsg = '';
            }
            else if($banderaMsg === 'usuarioInvalido'){
                echo "<script>";         
                echo 'document.getElementById("usuarioInvalido").click();';
                echo "</script>";
                $banderaMsg = '';
            }
            else if($banderaMsg === 'mailerError'){
                echo "<script>";         
                echo 'document.getElementById("mailerError).click();';
                echo "</script>";
                $banderaMsg = '';
            }
        }
       
    ?>
</body>

</html>