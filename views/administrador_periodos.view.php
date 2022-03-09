<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Periodos</title>

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
        <ul class="nav navbar-nav bg-success sidebar sidebar-dark" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand align-items-center justify-content-center" href="#">
                <div class="sidebar-brand-icon">
                    <i class="fas fa-user-cog"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Administrador</div>
            </a>
            <br>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <!--
        <div class="sidebar-heading">
        Interfaz
      </div>
        -->

            <!-- Nav Item - Charts -->
            <li class="nav-item ">
                <a class="nav-link collapsed" data-toggle="collapse" href="#" data-target="#mini" aria-expanded="true"
                    aria-controls="mini">
                    <i class="fa fa-fw fa-users"></i>
                    <span id="letbar">Cuentas</span>
                </a>
                <div id="mini" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="administrador_alumnos.php">Alumnos</a>
                        <a class="collapse-item" href="administrador_profesor.php">Profesores</a>
                    </div>

                </div>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="administrador_planestudios.php">
                    <i class="fas fa-fw fa-book"></i>
                    <span>Materias</span></a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="administrador_periodos.php">
                    <i class="fas fa-fw fa-calendar"></i>
                    <span>Periodos</span></a>
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
                        <h5><i class="fas fa-fw fa-calendar"></i> Periodos</h5>
                    </div>

                    <button class="btn btn-sm btn-outline-danger" type="button" data-toggle="modal"
                        data-target="#logoutModal">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-1"></i>Cerrar sesión</button>

                </nav>
                <!-- End of Topbar -->
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Content Row -->

                    <div class="row pl-md-3 pr-md-3 ">

                        <!-- Area Chart -->
                        
                        <div class="col">
                        	
                            <div class="card shadow mb-4">
								
                                <!-- Card Body -->
                                <div class="card border-left-success m-3">
                                    <div class="card-header text-gray-800 ">
                                        <h5>Establecer periodo de captación</h5>
                                    </div>
                                    <div class="card-body">
                                        <form action="establecer_periodo.php" method="POST" class="row form-inline">
                                            <div class="col-md-6 text-center">Inicio
                                                <hr>
                                                <input id="inicio1" name="inicio1" required class="form-control text-center"
                                                    type="date" value="<?php echo $per1 ? $per1['fecha_inicio'] : '' ?>">
                                            </div>
                                            <div class="col-md-6 text-center">Fin
                                                <hr>
                                                <input id="fin1" name="fin1" required class="form-control text-center" 
                                                    type="date" value="<?php echo $per1 ? $per1['fecha_fin'] : '' ?>">
                                            </div>
                                            <div class="col-md-12 text-right ">
                                                <input href="#establecer1" type="submit" class="btn btn-success" name="establecer1" value="Establecer">
                                                <a id="m1" href="#mensaje1" data-toggle="modal"></a>
                                            </div>
                                        </form> 	 

                                    </div>

                                    
                                   
                                </div>

                            </div>
                            

                        </div>
                        
                        <div class="col-xl-12">
                            <div class="card shadow mb-4">

                                <!-- Card Body -->
                                <div class="card border-left-success m-3">
                                    <div class="card-header text-gray-800">
                                        <h5>Establecer cambio de curso</h5>
                                    </div>
                                    <div class="card-body">
                                    	<form action="establecer_periodo_cambio_curso.php" method="POST" class="row form-inline">
                                        <div class="col-md-6 text-center ">Inicio
                                            <hr>
                                            <input id="inicio2" name="inicio2" required class="form-control text-center" type="date"
                                                value="<?php echo $per2 ? $per2['fecha_inicio'] : '' ?>">
                                        </div>

                                        <div class="col-md-6 text-center">Fin
                                            <hr>
                                            <input id="fin2" name="fin2" required class="form-control text-center" type="date"
                                                value="<?php echo $per2 ? $per2['fecha_fin'] : '' ?>">
                                        </div>
                                        <div class="col-md-12 text-right ">
                                            <input href="#establecer2" type="submit" class="btn btn-success" name="establecer2" value="Establecer">
                                            <a id="m2" href="#mensaje2" data-toggle="modal"></a>
                                        </div>
                                    	</form> 	 

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

    <!-- Logout Modal-->
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
                    <a class="btn btn-success" href="cerrar_sesion.php">Cerrar sesión</a>
                </div>
            </div>
        </div>
    </div>
    <!-- MODALS DE NOTIFICACIÓN -->
    <div class="modal fade" id="mensaje1">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Header de la ventana -->
                <div class="modal-header text-gray-900">
                    <h5 class="modal-title">Información</h5>
                    <button type="button" class="close" data-dismiss="modal"
                        aria-hidden="true">&times;</button>
                </div>
                <!-- Contenido de la ventana -->
                <div class="modal-body">
                    <div class="text-left text-gray-900 text-left">
                        <p>Periodo de captación establecido.</p>
                    </div>
                </div>
                <!-- Foooter de la ventana -->
                <div class="modal-footer">
                        <a href="administrador_periodos.php" class="btn btn-success "> Aceptar </a>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="mensaje2">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Header de la ventana -->
                <div class="modal-header text-gray-900">
                    <h5 class="modal-title">Información</h5>
                    <button type="button" class="close" data-dismiss="modal"
                        aria-hidden="true">&times;</button>
                </div>
                <!-- Contenido de la ventana -->
                <div class="modal-body">
                    <div class="text-left text-gray-900 text-left">
                        <p>Periodo de cambio de curso establecido.</p>
                    </div>
                </div>
                <!-- Foooter de la ventana -->
                <div class="modal-footer">
                    <a href="administrador_periodos.php" class="btn btn-success "> Aceptar </a>
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
            
            if($finalizo1){
                echo "<script>";
                echo 'document.getElementById("m1").click();';
                echo "</script>";
            }
            /*if($finalizo2){
                echo "<script>";
                echo 'document.getElementById("m2").click();';
                echo "</script>";
            }*/
        }
    ?>

</body>

</html>