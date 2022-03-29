<?php
    if (isset($_GET['materia'])) {
        $_SESSION['materia'] = filter_var($_GET['materia'], FILTER_SANITIZE_STRING);
        header("Location: alumno_materiacuestionario.php");
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

    <title>Materias</title>

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
        <ul class="navbar-nav bg-success sidebar sidebar-dark " id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center mr-4 " href="alumno_materia.php">
                <img  src="<?php echo $img['imagen_perfil'];?>" width="60" height="60" class="img-profile rounded-circle ml-4 mt-4" alt="avatar">
            </a>
            <div class="col-auto ">
                <div class="sidebar-brand d-flex align-items-center justify-content-center" href="alumno_materia.php">
                    <?php echo $usuario; ?></div>
            </div>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
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

                    <div class="collapse text-gray-900 navbar-collapse" id="navbarNavDropdown">
                        <h5><i class="fas fa-book  fa-sm"></i> Materias</h5>
                    </div>

                    <a href="alumno_editar_perfil.php"><button class="btn btn-sm btn-outline-success mr-2"
                            type="button">
                            <i class="fas fa-pen fa-sm fa-fw mr-1"></i>Editar perfil
                        </button></a>

                    <button class="btn btn-sm btn-outline-danger" type="button" data-toggle="modal"
                        data-target="#logoutModal">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-1"></i>Cerrar sesión</button>

                </nav>


                <!-- Begin Page Content -->
                <div class="container-fluid">


                    <!-- Content Row -->

                    <div class="row pl-md-3 pr-md-3 ">

                        <!-- Area Chart -->
                        <div class="col">
                        <?php $i=0;?>
                            <?php foreach ($semestres as $semestre):
                            $numero = $semestre['semestre'];
                            ?>

                            <div class="card shadow mb-4">

                                <!-- Card Header - Dropdown -->
                                <div class="card border-left-success m-3">


                                    <div id="accordion">
                                        <div class="card">
                                            <div class="card-header" id="heading<?php echo $i;?>">

                                                <a class="card-link" data-toggle="collapse" href="#collapse<?php echo $i;?>"
                                                    data-target="#collapse<?php echo $i;?>" aria-expanded="true"
                                                    aria-controls="collapse<?php echo $i;?>">
                                                    <div
                                                        class="d-sm-flex align-items-center justify-content-between mb-2 m-2 form-group">
                                                        <h5 class="mb-0 text-gray-800">Semestre <?php echo $numero;?></h5>
                                                    </div>
                                                </a>

                                            </div>
                                            <div id="collapse<?php echo $i;?>" class="collapse show" aria-labelledby="heading<?php echo $i;?>"
                                                data-parent="#accordion">
                                                <div class="card-body">
                                                    <!-- Content Row -->
                                                    <div class="row">
                                                        <?php
                                                            $consulta2 = $conexion->prepare("SELECT AES_DECRYPT(alumno.nick_alumno,'llave'),
                                                            alumno.grupo ,materia.clave,materia.nombre, materia.semestre, alumno_materia.estado
                                                            FROM alumno,alumno_materia,materia WHERE alumno.nick_alumno=alumno_materia.nick_alumno
                                                            AND alumno_materia.clave=materia.clave AND AES_DECRYPT(alumno.nick_alumno,'llave')='$usuario';");
                                                            $consulta2->execute();
                                                            $registros = $consulta2->fetchAll();
                                                        ?>
                                                        <!-- Earnings (Monthly) Card Example -->
                                                        <?php foreach ($registros as $registro):?>
                                                            <?php if ($registro['semestre']==$numero):?>
                                                                <div class="col-xl-2 col-md-6 mb-4 mr-4">
                                                                    <div class="card <?php echo $registro['estado']==0 ? 'border-left-secondary' : 'border-left-success'; ?>">
                                                                        <div class="card-body ">
                                                                            <div class="row no-gutters align-items-center">
                                                                                <div class="col mr-2">
                                                                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1 text-center">
                                                                                        <?php if ($registro['estado']!=0):?>
                                                                                            <a onclick="obtenerid(this);" id="<?php echo $registro['clave'];?>" class="text-success" href="#"><?php echo $registro['nombre'];?></a>
                                                                                        <?php else:?>
                                                                                        <p class="text-secondary">
                                                                                        <?php echo $registro['nombre'];?>
                                                                                        </p>
                                                                            <?php endif?>
                                                                                    </div>
                                                                                    <div
                                                                                        class="row no-gutters align-items-center">
                                                                                        <div class="col-auto">

                                                                                            <?php
                                                                                                $clave = $registro['clave'];
                                                                                                $totalcuest_sta = $conexion->prepare("SELECT cuestionario.clave,
                                                                                                COUNT(alumno_solicita_cuestionario.id_cuestionario) AS totalcues FROM
                                                                                                cuestionario INNER JOIN alumno_solicita_cuestionario ON cuestionario.id_cuestionario=
                                                                                                alumno_solicita_cuestionario.id_cuestionario
                                                                                                WHERE AES_DECRYPT(alumno_solicita_cuestionario.nick_alumno,'llave') = :usuario AND
                                                                                                (alumno_solicita_cuestionario.estado = 'En curso' OR alumno_solicita_cuestionario.estado
                                                                                                = 'Concluido') AND cuestionario.clave = $clave GROUP BY cuestionario.clave;");
                                                                                                $totalcuest_sta -> execute(array(':usuario'=>$usuario));
                                                                                                $totalcuest = $totalcuest_sta->fetch();
                                                                                                $totales=0;
                                                                                                $avanzados=0;

                                                                                                if ($totalcuest) {
                                                                                                    $totales = $totalcuest['totalcues'];
                                                                                                }


                                                                                                $avancuest_sta = $conexion->prepare("SELECT cuestionario.clave,COUNT(alumno_solicita_cuestionario.id_cuestionario) AS totalavan FROM
                                                                                                cuestionario INNER JOIN alumno_solicita_cuestionario ON cuestionario.id_cuestionario=alumno_solicita_cuestionario.id_cuestionario
                                                                                                WHERE AES_DECRYPT(alumno_solicita_cuestionario.nick_alumno,'$llave') = :usuario AND cuestionario.clave = :clave AND alumno_solicita_cuestionario.estado = 'concluido' GROUP BY cuestionario.clave;");
                                                                                                $avancuest_sta -> execute(array(':usuario'=>$usuario, ':clave'=>$registro['clave']));
                                                                                                $avancuest = $avancuest_sta->fetch();
                                                                                                //print_r($avancuest);
                                                                                                if ($avancuest) {
                                                                                                    $avanzados = $avancuest['totalavan'];
                                                                                                }

                                                                                                $porcentaje=0;
                                                                                                if ($totales!=0) {
                                                                                                    $porcentaje=(int)($avanzados*100/$totales);
                                                                                                }
                                                                                            ?>
                                                                                            <div
                                                                                                class="h6 mb-0 mr-1 font-weight-bold text-gray-900">
                                                                                                <?php echo $porcentaje;?>%</div>
                                                                                            </div>
                                                                                        <div class="col">
                                                                                            <div class="progress progress-sm">
                                                                                                <div class="progress-bar  <?php echo $registro['estado']==0 ? 'bg-secondary' : 'bg-success'?>"
                                                                                                    role="progressbar"
                                                                                                    style="width: <?php echo $porcentaje;?>%"
                                                                                                    aria-valuenow="50"
                                                                                                    aria-valuemin="0"
                                                                                                    aria-valuemax="100"></div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            <?php endif?>
                                                        <?php endforeach?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <?php $i++;?>
                            <?php endforeach?>
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
                    <a href="cerrar_sesion.php" class="btn btn-success">Cerrar sesión</a>
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
    function obtenerid(a) {
        var opcion = a.id;
        window.location.href = "?materia=" + opcion;
    }
    </script>
</body>

</html>
