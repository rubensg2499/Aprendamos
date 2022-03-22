<!-- Código HTML -->
<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="css/sb-admin.css" rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style2.css" />
    <title>Iniciar sesi&oacuten</title>
</head>
<body>

    <div class="container">
        <div class="row align-items-center">
            <div class="col">
                <h1 class="display-3 text-success">¡Bienvenido!</h1><br>
                <p class="lead">Esta plataforma ofrece una variedad de cuestionarios para ayudar a estudiar en
                    las materias que generen dificultad en los alumnos.</p>
                <hr class="my-4">
                <ul>
                    <li class="mb-3">Exámenes personalizados de acuerdo a la dificultad deseada.</li>
                    <li class="mb-3">Estadísticas del desempeño del alumno a través de gráficas.</li>
                </ul>
                <div class="text-center d-flex justify-content-between my-4">
                    <a href="http://www.unistmo.edu.mx"><img src="recursos/images/logo1.png" class="rounded float-left"
                            alt="unistmo"></a>
                    <a href="http:/www.unistmo.edu.mx/~computacion"><img src="recursos/images/comp.png"
                            class="rounded float-right" alt="computacion"></a>

                </div>

            </div>


            <div class="col">
                <div class="login-container d-flex align-items-center justify-content-center">
                    <form class="login-form" method="POST" name="loginform" onsubmit="return validateForm(this);"
                        action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                        <h1 class="display-4 mb-2">Iniciar sesi&oacuten</h1>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Usuario" required name="usuario">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Contraseña" required name="pass">
                        </div>
                        <div class="forgot-link d-flex justify-content-between">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input " id="recordar">
                                <label for="recordar">Recordar contraseña</label>
                            </div>
                            <p><a href="recuperar_contrasena.php">Olvid&eacute mi contraseña</a></p>

                        </div>
                        <div class="row">
                            <div class="col-md-8 col-sm-6 text-left">
                                <p class="font-weight-bold"><a href="registro.php" class="text-success">
                                    <strong>Reg&iacutestrate aquí</strong></a>
                                </p>

                            </div>
                            <div class="col-md-4 col-sm-6 text-right">
                                <input type="submit" value="Ingresar" class="btn btn-success">
                                <a id="m1" href="#mensaje1"data-toggle="modal"></a>
                            </div>
                        </div>
                    </form>
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

                <div class="modal-body">
                    <div class="text-body text-gray-900">Es proabable que haya ingresado un suario o contraseña incorrectos o que usted haya sido deshabilitado del sistema.</div>
                </div>
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
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if ($resultado === false) {
            echo "<script>";
            echo 'document.getElementById("m1").click();';
            echo "</script>";
        }
    }
    ?>
</body>
</html>
