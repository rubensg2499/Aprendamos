

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Resultados</title>

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
            <a class="sidebar-brand align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon">
                    <i class="fas fa-user-tie"></i>
                </div>
                <div class="sidebar-brand-text mx-3"><?php echo $resultados[0]['nick_profesor']; ?></div>
            </a>

            <!-- Divider -->
            <hr>

            <!-- Divider -->
            <hr class="sidebar-divider d-md-block">

            <li class="nav-item">
                <a id="a-sid" class="nav-link" href="profesor_repositorio.php">
                    <i class="fas fa-fw fa-book "></i>
                    <span>Repositorio</span></a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="profesor_alumnos.php">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Alumnos</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="profesor_cuestionarios.php">
                    <i class="fas fa-fw fa-align-justify"></i>
                    <span>Cuestionarios</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="profesor_avisos.php">
                    <i class="fas fa-fw fa-bell"></i>
                    <span>Avisos</span></a>
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
                    <button id="sidebarToggleTop" class="btn d-md-none mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <div class="collapse text-gray-900 navbar-collapse" id="navbarNavDropdown">
                        <h5><i class="fas fa-align-justify fa-sm"></i> Resultados</h5>
                    </div>

                    <button class="btn btn-sm btn-outline-danger" type="button" data-toggle="modal"
                        data-target="#logoutModal">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-1"></i>Cerrar sesión</button>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Content Row -->
                    <div class="row pl-md-3 pr-md-3">
                        <!-- Area Chart -->
                        <div class="col">
                          <div class="card shadow border-left-success mb-4">
                            <div class="card-header">
                              <h5 class='m-0 text-gray-800'>Lista de cuestionarios del alumno <?php echo $resultados[0]['nombre'].' '.$resultados[0]['ape_pat']; ?> [<strong><?php echo $resultados[0]['nick_alumno']; ?></strong>] en la materia de <?php echo $resultados[0]['materia']; ?>.</h5>
                            </div>
                            <div class="card-body">
                              <div class='row pt-2 table-responsive'>
                                <table class='table table-striped'>
                                  <thead>
        														<tr>
        															<th scope='col'>Nombre del cuestionario</th>
        															<th scope='col'>Complejidad</th>
        															<th scope='col'>Aciertos</th>
        															<th scope='col'>Errores</th>
        															<th scope='col'>Calificación sobre 100%</th>
        														</tr>
        													</thead>
                                  <tbody>
                                    <?php foreach ($resultados as $resultado): ?>
                                      <tr>
                                        <th scope="row"><?php echo $resultado['cuestionario']; ?></th>
                                        <td><?php echo $resultado['complejidad']; ?></td>
                                        <td><?php echo $resultado['aciertos']; ?></td>
                                        <td><?php echo $resultado['errores']; ?></td>
                                        <td style="color:<?php echo $resultado['porcentaje'] <= 60 ? 'red' : 'blue'; ?>"><?php echo $resultado['porcentaje']; ?>%</td>
                                      </tr>
                                    <?php endforeach; ?>
                                  </tbody>
                                </table>
                              </div>
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


    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>





</body>

</html>
