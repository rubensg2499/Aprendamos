<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Profesores</title>

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
            <li class="nav-item active">
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
                        <h5><i class="fas fa-users  fa-sm"></i> Cuentas <i
                                class="fas ml-2 mr-2 fa-arrow-right  fa-sm"></i> Profesores</h5>
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
                                    <div class="card-header">
                                        <!-- Page Heading -->
                                        <div
                                            class="d-sm-flex align-items-center justify-content-between mb-2 m-2 form-group">
                                            <h5 class=" mb-0 text-gray-800">Profesores habilitados</h5>
                                            <!--<a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>-->
                                            
                                            <div>
                                                <input type="checkbox" id="select1">
                                                <label for="select1" class="ml-1">Seleccionar todo</label>
                                            </div>
                                            <li class="sidebar-search" style="list-style:none;">
                                                <div class="input-group ">
                                                    <input id="Buscar" type="text"
                                                        class="form-control bg-ight border-dark small text-rigthd"
                                                        placeholder="Buscar" arial-label="Buscar"
                                                        aria-describedby="basic-addon2">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-success" disabled type="button">
                                                            <i class="fa fa-search"></i>
                                                        </button>
                                                    </div>

                                                </div>
                                                <!-- /input-group -->
                                            </li>
                                        </div>
                                    </div>
                                    <form method="post" action="deshabilitarUsers2.php">
                                    <div class="card-body table-responsive">
                                        <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th scope="col" class="text-center">Seleccionar</th>
                                                        <th scope="col" class="text-center">CVU</th>
                                                        <th scope="col" class="text-center">Nombre</th>
                                                        <th scope="col" class="text-center">Estudios</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="Tabla">
                                                    <?php

                                                    foreach ($registro as $fila) {
                                                            echo "
                                                            <tr>
                                                                <th scope='row' class='text-center'><input type='checkbox' class='chk1' id='".$fila['nick_usuario']."' name='checkSelect[]' value='".$fila['nick_usuario']."'></th>
                                                                <td class='text-center' for='".$fila['nick_usuario']."'>".$fila['cvu']."</td>
                                                                <td class='text-center'>".utf8_encode($fila['nombre'])." ".utf8_encode($fila['ape_pat'])." ".utf8_encode($fila['ape_mat'])."</td>
                                                                <td class='text-center'>".utf8_encode($fila['grado_maximo_estudios'])."</td>
                                                            </tr>";
                                                    }
                                                   
                                                    ?>

                                                    
                                                </tbody>
                                            </table>
                                    
                                    </div>
                                    <div class=" text-right m-2 ">
                                        <a href="#deshabilitar" role="button" lass="btn btn-large btn-primary"
                                            data-toggle="modal">
                                            <button type="button" class="btn btn-danger">Deshabilitar</button>
                                        </a>
                                        <!-- Modal / Ventana / Overlay en HTML -->
                                        <div id="deshabilitar" class="modal fade">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header text-gray-900">
                                                        <h4 class="modal-title">Advertencia</h4>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-hidden="true">&times;</button>

                                                    </div>
                                                    <div class="modal-body text-gray-900 text-left">
                                                        ¿Está seguro de deshabilitar lo seleccionado?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                                                        
                                                        <input type="submit" class="btn btn-danger" name="deshabilitar" value="Deshabilitar">
                                                        
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </form>
                                </div>

                            </div>

                        </div>

                    </div>
                    <div class="row pl-md-3 pr-md-3">
                        <!-- Area Chart -->
                        <div class="col">
                            <div class="card shadow mb-4">

                                <!-- Card Body -->
                                <div class="card border-left-success m-3">
                                    <div class="card-header">
                                        <!-- Page Heading -->
                                        <div
                                            class="d-sm-flex align-items-center justify-content-between mb-2 m-2 form-group">
                                            <h5 class=" mb-0 text-gray-800">Profesores deshabilitados</h5>
                                            <!--<a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>-->
                                            
                                            <div>
                                                <input type="checkbox" id="select2">
                                                <label for="select2" class="ml-1">Seleccionar todo</label>
                                            </div>
                                            <li class="sidebar-search" style="list-style:none;">
                                                <div class="input-group ">
                                                    <input id="Buscar2" type="text"
                                                        class="form-control bg-ight border-dark small text-rigthd"
                                                        placeholder="Buscar" arial-label="Buscar"
                                                        aria-describedby="basic-addon2">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-success" disabled type="button">
                                                            <i class="fa fa-search"></i>
                                                        </button>
                                                    </div>

                                                </div>
                                                <!-- /input-group -->
                                            </li>
                                        </div>
                                    </div>
                                    <form method="post" action="habilitarUsers2.php">
                                    <div class="card-body table-responsive">

                                        <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th scope="col" class="text-center">Seleccionar</th>
                                                        <th scope="col" class="text-center">CVU</th>
                                                        <th scope="col" class="text-center">Nombre</th>
                                                        <th scope="col" class="text-center">Estudios</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="Tabla2">
                                                    <?php

                                                    foreach ($registro2 as $fila2) {
                                                            echo "
                                                            <tr>
                                                                <th scope='row' class='text-center'><input type='checkbox' class='chk2' id='".$fila2['nick_usuario']."' name='checkSelect2[]' value='".$fila2['nick_usuario']."'></th>
                                                                <td class='text-center' for='".$fila2['nick_usuario']."'>".$fila2['cvu']."</td>
                                                                <td class='text-center'>".utf8_encode($fila2['nombre'])." ".utf8_encode($fila2['ape_pat'])." ".utf8_encode($fila2['ape_mat'])."</td>
                                                                <td class='text-center'>".utf8_encode($fila2['grado_maximo_estudios'])."</td>
                                                            </tr>";
                                                    }
                                                   
                                                    ?>

                                                    
                                                </tbody>
                                        </table>
                                    </div>
                                    <div class=" text-right m-2 ">
                                        <a href="#habilitar" role="button" lass="btn btn-large btn-primary"
                                            data-toggle="modal">
                                            <button type="button" class="btn btn-success">Habilitar</button>
                                        </a>
                                        <!-- Modal / Ventana / Overlay en HTML -->
                                        <div id="habilitar" class="modal fade">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header text-gray-900">
                                                        <h4 class="modal-title">Advertencia</h4>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-hidden="true">&times;</button>

                                                    </div>
                                                    <div class="modal-body text-gray-900 text-left">
                                                        ¿Está seguro de habilitar lo seleccionado?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                                                        <input type="submit" class="btn btn-success" name="habilitar" value="Habilitar">
                                                    </div>
                                                </div>
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

    <script>
        
        $("#select1").on("click", function() {
          $(".chk1").prop("checked", this.checked);
        });

        // if all checkbox are selected, check the selectall checkbox and viceversa
        $(".chk1").on("click", function() {
          if ($(".chk1").length == $(".chk1:checked").length) {
            $("#select1").prop("checked", true);
          } else {
            $("#select1").prop("checked", false);
          }
        });

        $("#select2").on("click", function() {
          $(".chk2").prop("checked", this.checked);
        });

        // if all checkbox are selected, check the selectall checkbox and viceversa
        $(".chk2").on("click", function() {
          if ($(".chk2").length == $(".chk2:checked").length) {
            $("#select2").prop("checked", true);
          } else {
            $("#select2").prop("checked", false);
          }
        });

    </script>

    <script>
        $(document).ready(function(){
          $("#Buscar").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#Tabla tr").filter(function() {
              $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
          });

          $("#Buscar2").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#Tabla2 tr").filter(function() {
              $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
          });


        });
    </script>
    


</body>

</html>