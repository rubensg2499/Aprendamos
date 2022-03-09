<?php 
                if(isset($_GET['reactivo'])){
                    $_SESSION['reactivo'] = filter_var($_GET['reactivo'],FILTER_SANITIZE_STRING);
                    
                    header('Location: profesor_editarreactivo.php');
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

    <title>Reactivos</title>
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
            <!-- Divider -->
            <hr>
            <!-- Divider -->
            <hr class="sidebar-divider d-md-block">
            <li class="nav-item active">
                <a id="a-sid" class="nav-link" href="profesor_repositorio.php">
                    <i class="fas fa-fw fa-book "></i>
                    <span>Repositorio</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="profesor_alumnos.php">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Alumnos</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="profesor-cuestionarios.php">
                    <i class="fas fa-fw fa-align-justify"></i>
                    <span>Cuestionarios</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="profesor-avisos.php">
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

                        <h5><i class="fas fa-book fa-sm"></i> Repositorio <i
                                class="fas ml-2 mr-2 fa-arrow-right  fa-sm"></i> Reactivos</h5>
                    </div>

                    <button class="btn btn-sm btn-outline-danger" type="button" data-toggle="modal"
                        data-target="#logoutModal">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-1"></i>Cerrar sesión</button>
                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <div class="row pl-md-3 pr-md-3">

                        <div class="col-md-7">
                            <a href="#reac1" class="btn btn-outline-success" data-toggle="modal"><i
                                    class="fas fa-fw fa-plus-square"></i>&nbsp;Agregar reactivo</a>

                        </div>
                        <div class="col-md-2">
                            <div class="text-center btn-group " role="group">
                                <button id="1" onclick="obtenerid(this);" class="btn btn-secondary active" value="Todos">Todos</button>
                                <button id="2" onclick="obtenerid(this);" class="btn btn-secondary active" value="Propios">Propios</button>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <select class="form-control">
                                    <option value="0">Fecha ascendente</option>
                                    <option value="1">Fecha descentente</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->

                    <div class="row pl-md-3 pr-md-3">

                        <!-- Area Chart -->
                        <div class="col ">
                            <div class="card shadow">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header">
                                    <h5 class="m-0 text-gray-800"><?php if(isset($_SESSION['nombre_asignatura'])){echo $_SESSION['nombre_asignatura']; if(isset($_GET['valor_filtro']) && $_GET['valor_filtro']=='Propios'){echo "<h6>(Propios)</h6>";}else{echo "<h6>(Todos)</h6>";}}else{echo "Todavía no tiene reactivos agregados para esta materia.";} ?>
                                    </h5>
                                </div>
                                <!-- Card Body -->

                                <?php 
                                    while($fila = $statement1->fetch()){
                                        $enunciado = utf8_encode($fila['enunciado']);
                                        $a = utf8_encode($fila['inciso_a_texto']);
                                        $b = utf8_encode($fila['inciso_b_texto']);
                                        $c = utf8_encode($fila['inciso_c_texto']);
                                        $d = utf8_encode($fila['inciso_d_texto']);
                                        $complejidad = utf8_encode($fila['complejidad']);
                                        $fecha = utf8_encode($fila['fecha_adicion']);
                                        $estado = utf8_encode($fila['estado']);
                                        $usuario = utf8_encode($fila['u']);
                                        $id_reactivo = utf8_encode($fila['id_reactivo']);
                                        if(isset($_GET['valor_filtro']) && $_GET['valor_filtro']=='Propios'){
                                            if($_SESSION['usuario']===$usuario){
                                                echo "<div class='card border-left-success  m-3'>
                                                <div class='card-body '>
                                                    <div class='row '>
                                                        <div class='col'>
                                                            <p>$enunciado</p>
                                                            <ol type='a'>
                                                                <li>$a</li>
                                                                <li>$b</li>
                                                                <li>$c</li>
                                                                <li>$d</li>
                                                            </ol>
                                                        </div>
                                                        <div class='col'>
                                                            <hr>
                                                            <ul style='list-style-type: none'>
                                                                <li>Complejidad : $complejidad</li>
                                                                <li>Fecha de adición : $fecha</li>
                                                                <li>Estado: $estado</li>
                                                                <li>CVU : XXXXXXXXXX</li>
                                                            </ul>
                                                            <hr>
                                                        </div>
                                                    </div>
                                                    <div class='text-right'>";
                                                echo "<a onclick='obtenerideditar(this);' href='profesor_editarreactivo.php' id='$id_reactivo'>Editar</a>";
                                                 echo "</div></div></div>";
                                            }
                                        }else{
                                            echo "<div class='card border-left-success  m-3'>
                                            <div class='card-body '>
                                                <div class='row '>
                                                    <div class='col'>
                                                        <p>$enunciado</p>
                                                        <ol type='a'>
                                                            <li>$a</li>
                                                            <li>$b</li>
                                                            <li>$c</li>
                                                            <li>$d</li>
                                                        </ol>
                                                    </div>
                                                    <div class='col'>
                                                        <hr>
                                                        <ul style='list-style-type: none'>
                                                            <li>Complejidad : $complejidad</li>
                                                            <li>Fecha de adición : $fecha</li>
                                                            <li>Estado: $estado</li>
                                                            <li>CVU : XXXXXXXXXX</li>
                                                        </ul>
                                                        <hr>
        
                                                    </div>
                                                </div>
                                                <div class='text-right'>";
                                                if($_SESSION['usuario']===$usuario){
                                                    echo "<a onclick='obtenerideditar(this);' id='$id_reactivo' href='#'>Editar</a>";
                                                }else{
                                                    echo "<p>No se puede editar.</p>";
                                                }
                                                echo "</div></div></div>";
                                        }
                                       
                                    }
                                ?>
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


        <!-- Agregar Reactivo -->
        <div class="modal fade" id="reac1">
            <div class="modal-dialog">
                <form action="profesor_crearreactivo.php" method="POST">
                    <div class="modal-content">
                        <!-- Header de la ventana -->
                        <div class="modal-header">
                            <h5 class="modal-title text-success">Agregar reactivo</h5>
                            <button tyle="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <!-- Contenido de la ventana -->
                        <div class="modal-body">

                            <div class="text-center">
                                <h6>Datos del reactivo</h6>
                            </div>
                            <div class="text-center m-4">
                                <select class="form-control" name="tipo_reactivo">
                                    <option value="0">Tipo de reactivo</option>
                                    <option value="1">Directo</option>
                                    <option value="2">Conjuntos</option>
                                    <option value="3">Complemento</option>
                                </select>
                            </div>
                            <div class="text-center m-4">
                                <select class="form-control" name="complejidad_reactivo">
                                    <option value="0">Complejidad</option>
                                    <option value="1">Básico</option>
                                    <option value="2">Intermedio</option>
                                    <option value="3">Avanzado</option>
                                </select>
                            </div>

                        </div>
                        <!-- Foooter de la ventana -->
                        <div class="modal-footer">
                            <input type="submit" class="btn btn-success" value="Aceptar">
                        </div>
                    </div>
                </form>

            </div>
        </div>


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
                if(opcion == '1'){
                    window.location.href = "?valor_filtro=Todos";
                }else{
                    window.location.href = "?valor_filtro=Propios";
                }
            }

            function obtenerideditar(a){
                var opcion = a.id;
                window.location.href = "?reactivo="+opcion;
            }
               
        </script> 
</body>

</html>