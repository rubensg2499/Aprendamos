<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Registro</title>
    <!-- Custom styles for this template-->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style2.css" />
    <link rel="stylesheet" href="css/sb-admin.css" >
    <link rel="stylesheet" href="css/sb-admin-2.min.css">


</head>

<body class="bg-gradient-success">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-10">
                <div class="card o-hidden border-0 shadow-lg my-4">
                    <div class="card-body p-0">
                        <div class="text-center">
                            <br>
                            <h2 class="h4 mb-2">Alumno</h2>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <div class="m-4">
                                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                                        <div class="form-group">
                                            <div class="form-label-group">
                                                <input type="text" name="nombre" class="form-control"
                                                    required autofocus="autofocus" placeholder="">
                                                <label for="nombre">Nombre</label>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="form-label-group">
                                                <input type="text" name="ape_pat" class="form-control"
                                                    required>
                                                <label for="ape_paterno">Apellido paterno</label>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="form-label-group">
                                                <input type="text" name="ape_mat" class="form-control"
                                                    required>
                                                <label for="ape_materno">Apellido materno</label>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="form-label-group">

                                                <input type="date" name="fech_nac" class="form-control"
                                                  required>
                                                <label for="fech_nac">Fecha de nacimiento</label>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <div class="form-label-group">
                                                <input type="text" name="esc_proc" class="form-control"
                                                     required>
                                                <label for="esc_proc">Escuela de procedencia</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-label-group">
                                                <input type="number" name="grupo" class="form-control"
                                                    required>
                                                <label for="grupo">Grupo</label>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-label-group">
                                                        <input type="number" min="100000000" max="9999999999" name="matricula" class="form-control matricula">
                                                        <label for="matricula">Matrícula</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-check">
                                                        <input id="propede" type="checkbox" class="form-check-input" name="prope">
                                                        <label class="form-check-label" for="prope">Propedéutico</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-right">
                                            <a href="index.php" class="btn btn-danger">Cancelar</a>
                                            <input type="submit" value="Continuar" class="btn btn-success">
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="col-lg-6 text-center p-5">
                                <img src="recursos/images/img-alum.jpg" class=" img-center">
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
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    <script>
        var bandera=0;
        $("#propede").on("click", function(){
            if(bandera==0){
                $(".matricula").prop("disabled",true);
                bandera=1;
            }else{
                $(".matricula").prop("disabled",false);
                $(".matricula").prop("value");
                bandera=0;
            }
        });


    </script>

</body>

</html>
