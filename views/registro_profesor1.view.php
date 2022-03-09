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

        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-10">

                <div class="card o-hidden border-0 shadow-lg my-4">
                    <div class="card-body p-0">

                        <div class="text-center">
                            <br>
                            <h2 class="h4 mb-2">Profesor</h2>
                        </div>

                        <div class="row">

                            <div class="col-lg-6 col-md-12">

                                <div class="m-4">

                                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                                        <div class="form-group">
                                            <div class="form-label-group">
                                                <input type="text" name="nombre" class="form-control" placeholder="Nombre"
                                                    required="required" autofocus="autofocus">
                                                <label for="nombre">Nombre</label>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <div class="form-label-group">
                                                <input type="text" name="ape_pat" class="form-control"
                                                    placeholder="Apellido paterno" required="required"
                                                    autofocus="autofocus">
                                                <label for="ape_paterno">Apellido paterno</label>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="form-label-group">
                                                <input type="text" name="ape_mat" class="form-control"
                                                    placeholder="Apellido materno" required="required"
                                                    autofocus="autofocus">
                                                <label for="ape_materno">Apellido materno</label>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <select class="form-control" name="grado">
                                                <option value="Licenciatura/Ingeniería">Licenciatura / Ingeniería</option>
                                                <option value="Maestría">Maestr&iacutea</option>
                                                <option value="Doctorado">Doctorado</option>
                                            </select>
                                        </div>

                                        <div class="text-right">
                                            <a href="index.php" class="btn btn-danger"> Cancelar </a>
                                            <input type="submit" class="btn btn-success" value="Continuar">
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="col-lg-6 text-center">
                                <img src="recursos/images/img-prof.jpg" class=" img-center p-2">
                            </div>
                        </div>
                    </div>
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