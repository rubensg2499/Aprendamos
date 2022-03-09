<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Añadir materia</title>

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
            <li class="nav-item active">
                <a class="nav-link" href="administrador_planestudios.php">
                    <i class="fas fa-fw fa-book"></i>
                    <span>Materias</span></a>
            </li>

            <li class="nav-item">
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
                        <h5><i class="fas fa-book  fa-sm"></i> Materias <i
                                class="fas ml-2 mr-2 fa-arrow-right  fa-sm"></i> Añadir materia</h5>
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
                                    <div class="col-lg">

                                        <div class="m-4">

                                            <form action="agregarM.php" method="POST">
                                                <div class="form-group">
                                                    <div class="form-label-group">
                                                        <input type="text" id="NombreM" class="form-control" name="NombreM"
                                                            placeholder="Nombre de la materia" required value="<?php echo isset($_POST['NombreM']) ? $_POST['NombreM'] : '';?>"
                                                            autofocus="autofocus">
                                                        <label for="NombreM">Nombre de la materia</label>

                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="form-label-group">
                                                        <input type="text" id="ClaveMateria" class="form-control" name="ClaveM" 
                                                            placeholder="Clave de la materia" required="required"
                                                            autofocus="autofocus">
                                                        <label for="ClaveMateria">Clave de la materia</label>

                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="form-label-group">
                                                        <input type="number" id="CreditosMateria" class="form-control" name="CreditoMateria" 
                                                            placeholder="Créditos de la materia" required="required"
                                                            autofocus="autofocus">
                                                        <label for="CreditosMateria">Créditos de la materia</label>

                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="form-label-group">
                                                        <input type="number" id="HorasMateria" class="form-control" name="HorasMateria" 
                                                            placeholder="Horas totales de la materia"
                                                            required="required" autofocus="autofocus">
                                                        <label for="HorasMateria">Horas totales de la materia</label>

                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="form-label-group">

                                                        <select id="ProfAsig" class="form-control" required="required"
                                                            name="ProfeAsig" size="1">
                                                            <option value="0">Profesor asignado</option>
                                                            <?php
                                                            $indice=1; 
                                                            foreach ($nombreProf as $regs) {
                                                                echo "<option value='".utf8_encode($regs['nick_profesor'])."'>".utf8_encode($regs['nombreP'])." ".utf8_encode($regs['ape_patP'])." ".utf8_encode($regs['ape_matP'])."</option>";    
                                                                $indice++;
                                                            }


                                                            ?>
                                                            
                                                            
                                                        </select>

                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="form-label-group">

                                                        <select id="Grupo" class="form-control" required="required"
                                                            name="Grupo" size="1">
                                                            <option value="0">Grupo</option>
                                                            <option value="4">4</option>
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
                                                </div>
                                                <div class="form-group">
                                                    <div class="form-label-group">

                                                        <select id="Semestre" class="form-control" required="required"
                                                            name="Semestre" size="1">
                                                            <option value="0">Semestre</option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                            <option value="6">6</option>
                                                            <option value="7">7</option>
                                                            <option value="8">8</option>
                                                            <option value="9">9</option>
                                                            <option value="10">10</option>
                                                        </select>

                                                    </div>
                                                </div>

                                                <div class="text-right">
                                                    <a href="administrador_planestudios.php" class="btn btn-danger">
                                                        Cancelar </a>
                                                    <input type="submit" class="btn btn-success" name="Agregar" value="Agregar">
                                                    <!-- MODAL PARA LA NOTIFICACIÓN 
                                                    <div class="modal fade" id="actualizar">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                Header de la ventana 
                                                                <div class="modal-header text-gray-900">
                                                                    <h5 class="modal-title">Información</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal"
                                                                        aria-hidden="true">&times;</button>
                                                                </div>
                                                                Contenido de la ventana 
                                                                <div class="modal-body text-gray-900">
                                                                    <div class="text-left">
                                                                        <h6>Materia actualizada con éxito.</h6>
                                                                    </div>
                                                                </div>
                                                                 Foooter de la ventana 
                                                                <div class="modal-footer">
                                                                    <button href="administrador_planestudios.php"
                                                                        type="button" class="btn btn-success"
                                                                        data-dismiss="modal">Aceptar</button>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    -->

                                                </div>

                                            </form>

                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>

                    <!-- Modal / Ventana / Overlay en HTML -->
                    <div class="modal fade" id="error">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <!-- Header de la ventana -->
                                <div class="modal-header text-gray-900">
                                    <h5 class="modal-title">Error</h5>
                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-hidden="true">&times;</button>
                                </div>
                                <!-- Contenido de la ventana -->
                                <div class="modal-body text-gray-900">
                                    <div class="text-left">
                                        <h6>Hubo un error al guardar la materia.</h6>
                                    </div>
                                </div>
                                <!-- Foooter de la ventana -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-success" data-dismiss="modal">Aceptar</button>
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
                <div class="modal-body text-gray-900 text-left">Seleccione "Cerrar sesión" para salir de la plataforma.</div>
                <div class="modal-footer">
                    <button class="btn btn-danger" type="button" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-success" href="cerrar_sesion.php">Cerrar sesión</a>
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