<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Editar Perfil</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <!-- Custom styles for this template-->
    <link rel="stylesheet" href="css/sb-admin.css">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-success sidebar sidebar-dark" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center mr-4 " href="alumno_materia.php">
                <img src="<?php echo $img['imagen_perfil'];?>" width="60" height="60" class="img-profile rounded-circle ml-4 mt-4" alt="avatar">
            </a>
            <div class="col-auto ">
                <div class="sidebar-brand d-flex align-items-center justify-content-center"><?php echo $usuario ?></div>
            </div>


            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="alumno_materia.php">
                    <i class="fas fa-fw fa-book"></i>
                    <span>Materias</span></a>
            </li>


            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="alumno_estadistica.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Estad&iacute;sticas</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->


        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand topbar mb-2 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn  d-md-none mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Page Heading -->
                    <div class="collapse text-gray-900 navbar-collapse" id="navbarNavDropdown">
                        <h5><i class="fas fa-pen fa-sm"></i> Editar perfil</h5>
                    </div>


                    <button class="btn btn-sm btn-outline-danger" type="button" data-toggle="modal"
                        data-target="#logoutModal">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-1"></i>Cerrar sesión</button>

                </nav>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Content Row -->

                    <div class="row pl-md-3 pr-md-3  ">

                        <!-- Area Chart -->
                        <div class="col">
                            <div class="card shadow mb-4">

                                <!-- Card Body -->
                                <div class="card border-left-success m-3">
                                    <form method="POST" action="alumno_editar_perfil.php" enctype="multipart/form-data">
                                        <!-- Card Header - Dropdown -->
                                        <div
                                            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                            <div class="row m-2">
                                                <div class="ml-5 col-3 text-center">

                                                    <img src="<?php echo $img['imagen_perfil'];?>" width="100" height="100" class="img-profile rounded-circle" alt="avatar">

                                                </div>
                                                <div class="col-xl-7 col-lg-5 text-gray-800">
                                                    <a>Cargar imagen...</a><input type="file" name="imagen" id="imagen">
                                                </div>
                                            </div>

                                        </div>


                                        <div class="row justify-content-center">

                                            <div class="col-xl-10 col-lg-12 col-md-10">

                                                <div class="card o-hidden shadow-lg my-4 border-left-success m-3">


                                                    <div class="card-body p-0">

                                                        <div class="row">

                                                            <div class="col-lg-7 col-md-12">

                                                                <div class="m-4">
                                                                    <form>

                                                                        <div class="form-group">
                                                                            <div class="text">
                                                                                <h2 class="h4 mb-2 text-gray-800 font-weight-bold"><?php echo $usuario ?></h2>
                                                                                <br>
                                                                                <h2 class="h6 mb-2 text-gray-800"><strong>Nombre:</strong> <?php echo $alumno['nombre'] .' '. $alumno['ape_pat'] .' '. $alumno['ape_mat']; ?></h2>
                                                                                <h2 class="h6 mb-2 text-gray-800"><strong>Correo electr&oacute;nico:</strong> <?php echo $alumno['correo']; ?></h2>
                                                                                <h2 class="h6 mb-2 text-gray-800"><strong>Fecha nacimiento:</strong> <?php echo $alumno['fecha_nacimiento']; ?></h2>
                                                                                <h2 class="h6 mb-2 text-gray-800"><strong>Escuela de procedencia:</strong> <?php echo $alumno['escuela_procedencia']; ?></h2>
                                                                                <?php if (!empty($alumno['matricula'])) { ?>
                                                                                    <h2 class="h6 mb-5 text-gray-800"><strong>Matr&iacute;cula:</strong> <?php echo $alumno['matricula']; ?></h2>
                                                                                <?php } ?>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card o-hidden shadow-lg my-4 border-left-success m-3">


                                                    <div class="card-body p-0">

                                                        <div class="row">

                                                            <div class="m-auto  col-lg-8">

                                                                <div class="m-4">

                                                                    <div class="form-group">

                                                                        <div class="text-center"><br>
                                                                            <h4 class="h5 mb-1 text-gray-800">Cambiar
                                                                                grupo</h4>
                                                                        </div>

                                                                        <select class="form-control" id="grupo" name="grupo">
                                                                            <option value="">Seleccionar grupo</option>
                                                                            <option value="104">104</option>
                                                                            <option value="204">204</option>
                                                                            <option value="304">304</option>
                                                                            <option value="404">404</option>
                                                                            <option value="504">504</option>
                                                                            <option value="604">604</option>
                                                                            <option value="704">704</option>
                                                                            <option value="804">804</option>
                                                                            <option value="904">904</option>
                                                                            <option value="1004">1004</option>
                                                                        </select>
                                                                    </div>

                                                                    <div class="text-center"><br>
                                                                        <h4 class="h5 mb-1 text-gray-800">Cambiar correo</h4>
                                                                    </div>
                                                                    <div class="form-group">

                                                                        <div class="form-label-group mb-5">
                                                                            <input type="email" id="exampleInputEmail"
                                                                                class="form-control"
                                                                                placeholder="Correo electrónico nuevo"
                                                                                name="correo">
                                                                            <label for="exampleInputEmail">Correo
                                                                                electr&oacute;nico nuevo</label>

                                                                        </div>

                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>

                                                </div>

                                                <div class="row m-2">
                                                    <?php if (empty($alumno['matricula']) && (($fechahoy >= $fechainicio) && ($fechahoy <= $fechafinal))) { ?>
                                                        <a href="#actualizacion" data-toggle="modal">Actualización al curso normal</a>
                                                    <?php } ?>
                                                </div>

                                                <div class="text-right mb-2">
                                                    <input type="submit" name="guardar" value="Guardar cambios" class="btn btn-success">
                                                    <a id="m1" href="#guardar" data-toggle="modal"></a>
                                                </div>

                                            </div>

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>


                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                    <span>Cloud Seven Soft S. de R.L.</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal                 Cerrar Sesión-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-gray-900">
                    <h5 class="modal-title" id="exampleModalLabel">¿Está seguro de cerrar la sesión?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body text-gray-900">Seleccione "Cerrar sesión" para salir de la plataforma.</div>
                <div class="modal-footer">
                    <button class="btn btn-danger" type="button" data-dismiss="modal">Cancelar</button>
                    <a href="cerrar_sesion.php" class="btn btn-success">Cerrar sesión</a>
                </div>
            </div>
        </div>
    </div>


    <!---------------------------Guardar cambios----------------------------->
        <div class="modal fade" id="guardar">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Header de la ventana -->
                    <div class="modal-header text-gray-900">
                        <h4 class="modal-title">Información</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <!-- Contenido de la ventana -->
                    <div class="modal-body">
                        <div class="text-body text-gray-900">
                            <p>Información actualizada</p>
                        </div>
                    </div>
                    <!-- Foooter de la ventana -->
                    <div class="modal-footer m-0">
                        <a class="btn btn-success" href="alumno_editar_perfil.php">Aceptar</a>
                    </div>
                </div>
            </div>
        </div>

    <!---------------------------Actualización al curso normal----------------------------->
<form method="POST" name="form_matricula" action="alumno_editar_perfil.php">
    <div class="modal fade" id="actualizacion">

        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Header de la ventana -->
                <!-- Header de la ventana -->
                <div class="modal-header text-gray-900">
                    <h4 class="modal-title">Información</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <!-- Contenido de la ventana -->
                <div class="modal-body">
                    <div class="text-body text-gray-900">
                        <h6> Para actualizar tu perfil al curso normal necesitamos su matr&iacute;cula</h6>
                    </div>

                        <div class="form-group">
                            <div class="form-label-group">
                                <input type="text" name="matricula" id="matricula" class="form-control"
                                    placeholder="matricula" autofocus="autofocus" maxlength="10" required pattern="[0-9]+">
                                    <label for="matricula">Matr&iacute;cula</label>
                            </div>
                        </div>


                </div>

                <!-- Foooter de la ventana -->
                <div class="modal-footer">

                    <button type="reset" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <input type="submit" name="btn_matri" href="alumno_editar_perfil.php" value="Enviar" class="btn btn-success">
                    <a id="m2" href="alumno_editar_perfil.php"></a>
                </div>
            </div>
        </div>

    </div>
</form>



    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <?php
        if (isset($_POST['guardar'])) {
            $email = $_POST['correo'];
            if (filter_var($email, FILTER_VALIDATE_EMAIL) || !empty($grupo) || !empty($imgFile)) {
                echo "<script>";
                echo 'document.getElementById("m1").click();';
                echo "</script>";
            }
        }

        if (isset($_POST['btn_matri'])) {
            echo "<script>";
            echo 'document.getElementById("m2").click();';
            echo "</script>";
        }
    ?>

</body>

</html>
