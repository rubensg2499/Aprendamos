

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> Cuestionarios</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link rel="stylesheet" href="css/sb-admin.css">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    	<script>
            function obtenerideditar(a){
                var opcion = a.id;
                window.location.href = "?id_cuest="+opcion;

            }
			function obtenerid_mat(a){
                var opcion = a.id;
                window.location.href = "?id_mat="+opcion;

            }
			function valorId2(a)
			{
				var id2=a.id;
				window.location.href="?id_cue="+id2;
			}

			function valorId3(a)
			{
				var id3=a.id;
				window.location.href="?id_cue2="+id3;
			}
            <?php
                if (isset($_GET['id_cuest'])) {
                    $_SESSION['id_cuest'] = filter_var($_GET['id_cuest'], FILTER_SANITIZE_STRING);
                    $_GET = array();
                    header("Location: profesor_editarcuestionario.php");
                }
                if (isset($_GET['id_mat'])) {
                    $_SESSION['id_mat'] = filter_var($_GET['id_mat'], FILTER_SANITIZE_STRING);
                    $_GET = array();
                    header("Location: profesor_asignarcuestionario.php");
                }

                if (isset($_GET['id_cue'])) {
                    $_SESSION['id_cue']=filter_var($_GET['id_cue'], FILTER_SANITIZE_STRING);
                    header("Location: generarPDF.php");
                    $_GET=array();
                }

                if (isset($_GET['id_cue2'])) {
                    $_SESSION['id_cue2']=filter_var($_GET['id_cue2'], FILTER_SANITIZE_STRING);
                    header("Location: generarDOC.php");
                    $_GET=array();
                }

            ?>
	</script>


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

            <li class="nav-item">
                <a id="a-sid" class="nav-link" href="profesor_repositorio.php">
                    <i class="fas fa-fw fa-book "></i>
                    <span>Repositorio</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="profesor_alumnos.php">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Alumnos</span></a>
            </li>

            <li class="nav-item active">
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
                        <h5><i class="fas fa-align-justify fa-sm"></i> Cuestionarios</h5>
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

<?php

  try {
      $statement1 = $conexion->prepare("SELECT nick_profesor, materia.clave, nombre, semestre FROM profesor_materia,materia WHERE profesor_materia.clave=materia.clave AND AES_DECRYPT(nick_profesor,'$llave') = :usuario ;");
      $statement1->execute(array(':usuario' => $usuario));

      while ($reg = $statement1->fetch()) {
          $nom_mat = $reg['nombre'];

          $id = $reg['clave'];

          echo "<div class='card shadow border-left-success mb-4'>";
          echo "<div class='card-header'><h5 class='m-0 text-gray-800'>$nom_mat </h5></div>";

          echo "<div class='card-body'>

                                    		<div class='row'>
												<div class='col-xs-12'>
                                            		<a href='#reac$id' class='btn btn-outline-success' data-toggle='modal'><i
                                                    class='fas fa-fw fa-plus-square'></i>&nbsp;Crear cuestionario</a>
                                        		</div>
                                        		<div class='col'>

													<a id='$id' onclick='obtenerid_mat(this);' href='#' class='btn btn-outline-success' ><i class='fas fa-fw fa-user-plus'></i>&nbsp;Asignar cuestionarios</a>
                                        		</div>
                                    		</div>";


          echo "<form action='precarga_cuestionario.php' method='POST'>

								  <div class='modal fade' id='reac$id' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel'
										aria-hidden='true'>
										<div class='modal-dialog' role='document'>
											<div class='modal-content'>
												<div class='modal-header text-gray-900'>
													<h5 class='modal-title'>Crear cuestionario:</h5>
													<button tyle='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
												</div>
												<div class='modal-body'>
													<div class='text-center'><h4>Datos del cuestionario</h4></div>
													<input type='hidden' name='nombre_mat' value='$nom_mat'></input>
													<input type='hidden' name='id_mat' value='$id'></input>

													<div class='row m-4 form-label-group'>
														<input type='text' id='nombrecuestionario' class='form-control' name='nombre_cuestionario' placeholder='Nombre del reactivo'
															required='required' autofocus='autofocus'>
														<label for='nombrecuestionario'>Nombre del cuestionario</label>
													</div>
													<div class='row m-4'>
														<select class='form-control' name='complejidad_cuestionario'>
															<option value='0'>Complejidad</option>
															<option value='1'>Básico</option>
															<option value='2'>Medio</option>
															<option value='3'>Avanzado</option>
														</select>
													</div>
													<div class='row pl-5'><p>Vigencia de :</p></div>
													<div class='row ml-3 mr-3 '>
														<div class='col-5'><input type='date' id='fecha_inicio' class='form-control' name='fecha_inicio' required='required'></div>
														<div class='col-2 text-center'><p>hasta</p></div>
														<div class='col-5'><input type='date' id='fecha_fin' class='form-control' name='fecha_fin' required='required'>
														</div>
													</div>
												</div>
												<div class='modal-footer'>
													<button tyle='button' class='btn btn-danger' data-dismiss='modal'>Cancelar</button>
													<input type='submit' class='btn btn-success' value='Aceptar'>
												</div>
											</div>
										</div>
									</div>
									</form>";

          echo "<div class='row pt-2 table-responsive'>
												<table class='table table-striped'>
													<thead>
														<tr>
															<th scope='col'>Nombre del cuestionario</th>
															<th scope='col'>Fecha de creación</th>
															<th scope='col'>Complejidad</th>
															<th scope='col'>Descargas</th>
															<th scope='col'>Estado</th>
															<th scope='col'>Edición</th>
														</tr>
													</thead>
													<tbody>";

          $statement2 = $conexion->prepare("SELECT nick_profesor, id_cuestionario, nombre, complejidad, fecha_creacion, estado, clave FROM cuestionario NATURAL JOIN  profesor WHERE AES_DECRYPT(nick_profesor,'$llave') = :usuario ;");
          $statement2->execute(array(':usuario' => $usuario));

          $c_cont=0;

          while ($reg2 = $statement2->fetch()) {
              $id_cuest = $reg2['id_cuestionario'];
              $nom_cue = $reg2['nombre'];
              $fech_creac = $reg2['fecha_creacion'];
              $complejidad = $reg2['complejidad'];
              $estado = $reg2['estado'];
              $clave = $reg2['clave'];

              if ($id == $clave) {
                  echo "   <tr>
													<th scope='row'>$nom_cue</th>
													<td>$fech_creac</td>
													<td>$complejidad</td>

													<td>[<a id='$id_cuest' href='#' onclick='valorId2(this)'>PDF</a>]</td>

													<td>";
                  switch ($estado) {
                    case 0: echo "No asignado"; break;
                    case 1: echo "Habilitado"; break;
                    case 2: echo "Deshabilitado"; break;
                 }

                  echo"		</td>
													<td><a id='$id_cuest' onclick='obtenerideditar(this);' href='#' >Editar</a></td>
												</tr>";
              }
          }

          echo	   		"</tbody>
												</table>
											</div>
									     </div>
									     </div>";
      }
  } catch (PDPException $e) {
      echo $e->getMessage();
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







    <div class="modal fade" id="des" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <!-- Header de la ventana -->
                <div class="modal-header text-gray-900">
                    <h5 class="modal-title">Advertencia</h5>
                    <button tyle="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <!-- Contenido de la ventana -->
                <div class="modal-body text-gray-900">¿Está seguro de deshabilitar este cuestionario?</div>
                <!-- Foooter de la ventana -->
                <div class="modal-footer">
                    <button tyle="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <button tyle="button" class="btn btn-danger" data-dismiss="modal">No</button>
                    <a href="#des1" class="btn btn-success" data-toggle="modal" data-dismiss="modal"> Sí </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Información - Habilitar Cuestionario -->
    <div class="modal fade" id="des1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <!-- Header de la ventana -->
                <div class="modal-header  text-gray-900">
                    <h5 class="modal-title">Información</h5>
                    <button tyle="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <!-- Contenido de la ventana -->
                <div class="modal-body text-gray-900">Cuestionario deshabilitado con éxito.</div>
                <!-- Foooter de la ventana -->
                <div class="modal-footer">
                    <a href="#" class="btn btn-success " data-dismiss="modal"> Aceptar </a>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="hab" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <!-- Header de la ventana -->
                <div class="modal-header text-gray-900">
                    <h5 class="modal-title">Advertencia</h5>
                    <button tyle="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <!-- Contenido de la ventana -->
                <div class="modal-body text-gray-900">¿Está seguro de habilitar este cuestionario?</div>
                <!-- Foooter de la ventana -->
                <div class="modal-footer">
                    <button tyle="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <button tyle="button" class="btn btn-danger" data-dismiss="modal">No</button>
                    <a href="#hab1" class="btn btn-success" data-toggle="modal" data-dismiss="modal"> Sí </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Información - Habilitar Cuestionario -->
    <div class="modal fade" id="hab1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <!-- Header de la ventana -->
                <div class="modal-header  text-gray-900">
                    <h5 class="modal-title">Información</h5>
                    <button tyle="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <!-- Contenido de la ventana -->
                <div class="modal-body text-gray-900">Cuestionario habilitado con éxito.</div>
                <!-- Foooter de la ventana -->
                <div class="modal-footer">
                    <a href="#" class="btn btn-success " data-dismiss="modal"> Aceptar </a>
                </div>
            </div>
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





</body>

</html>
