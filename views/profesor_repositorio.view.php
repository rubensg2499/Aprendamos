<?php
        if (isset($_GET['materia'])) {
            $_SESSION['materia'] = filter_var($_GET['materia'], FILTER_SANITIZE_STRING);
            header("Location: profesor_repositoriomateria.php");
            $_GET = array();
        }
    ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Repositorio</title>
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
                <div class="sidebar-brand-text mx-3"><?php echo $usuario?></div>
            </a>
            <!--
            <div class="text-center mb-4"><a href="index.php">cerrar sesión</a></div>-->
            <hr>
            <!-- Divider -->
            <hr class="sidebar-divider d-md-block">
            <!-- Heading --
            <div class="sidebar-heading">Interfaz</div>-->

            <li class="nav-item active">
                <a class="nav-link" href="profesor_repositorio.php"><i class="fas fa-fw fa-book "></i>
                    <span>Repositorio</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="profesor_alumnos.php"><i class="fas fa-fw fa-users"></i>
                    <span id="letbar">Alumnos</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="profesor_cuestionarios.php"><i class="fas fa-fw fa-align-justify"></i>
                    <span>Cuestionarios</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="profesor_avisos.php"><i class="fas fa-fw fa-bell"></i>
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
                        <h5><i class="fas fa-book fa-sm"></i> Repositorio</h5>

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
                        <div class="col ">
                            <div class="card shadow">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header">
                                    <h5 class="m-0 text-gray-800">Materias</h5>
                                </div>
                                <!-- Card Body -->
                                <?php
                                    $semestres = array(false,false,false,false,false,false,false,false,false,false);
                                    $i=0;
                                    while ($fila = $statement1->fetch()) {
                                        switch ($fila['semestre']) {
                                            case '1': $semestres[0]=true; break;
                                            case '2': $semestres[1]=true; break;
                                            case '3': $semestres[2]=true; break;
                                            case '4': $semestres[3]=true; break;
                                            case '5': $semestres[4]=true; break;
                                            case '6': $semestres[5]=true; break;
                                            case '7': $semestres[6]=true; break;
                                            case '8': $semestres[7]=true; break;
                                            case '9': $semestres[8]=true; break;
                                            case '10': $semestres[9]=true; break;
                                        }
                                    }
                                    try {
                                        for ($i=0;$i<10;$i++) {
                                            if ($semestres[$i]) {
                                                $sem=$i+1;
                                                echo "<div class='card border-left-success m-3'>
                                                                <div class='card-header'>Semestre $sem</div>
                                                                <div class='card-body'>
                                                                    <ul class='list-group'>";
                                                $statement2 = $conexion->prepare("SELECT nick_profesor, materia.clave, nombre, semestre FROM profesor_materia,materia WHERE profesor_materia.clave=materia.clave AND AES_DECRYPT(nick_profesor,'$llave') = :usuario ;");
                                                $statement2->execute(array(':usuario' => $usuario));
                                                while ($reg = $statement2->fetch()) {
                                                    $nom = $reg['nombre'];
                                                    $id = $reg['clave'];
                                                    if ($reg['semestre']==$sem) {
                                                        $statement3 = $conexion->prepare("SELECT count(*) as num FROM reactivo WHERE clave = :id;");
                                                        $statement3->execute(array(':id' => $id));
                                                        $reg2 = $statement3->fetch();
                                                        $num = $reg2['num'];
                                                        echo "<a id='$id' onclick='obtenerid(this);' href='#'>";
                                                        echo "<li class='list-group-item d-flex justify-content-between list-group-item-action align-items-center list-group-item-success'>";
                                                        echo $nom;
                                                        echo "<span class='badge badge-primary badge-pill'>$num</span>";
                                                        echo "</li>";
                                                        echo "</a>";
                                                    }
                                                }
                                                echo "</ul></div></div>";
                                            }
                                        }
                                    } catch (PDPException $e) {
                                        echo $e->getMessage();
                                    }

                                ?>
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

    <!-- VENTANAS EMERGENTES  ------------------------------------------------------------------------------->

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


    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>


    <script>
        function obtenerid(a){
            var opcion = a.id;
            window.location.href = "?materia="+opcion;
        }
    </script>

</body>

</html>
