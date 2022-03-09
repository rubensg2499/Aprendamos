

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Crear cuestionario</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link rel="stylesheet" href="css/sb-admin.css">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <style>
	.txt-scroll {
	  width: 700px;
	  height: 350px;
	  padding: 15px;
	  overflow: auto;
	}
		
	a.custom-card,
	a.custom-card:hover {
  		
	}

	</style>


</head>

<body>

    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand topbar mb-2 static-top shadow">
                    <div class="collapse text-gray-900 navbar-collapse" id="navbarNavDropdown">

                        <h5><i class="fas fa-align-justify fa-sm"></i> Cuestionarios <i
                                class="fas ml-2 mr-2 fa-arrow-right  fa-sm"></i> Crear cuestionario</h5>
                    </div>
                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Content Row -->

                    <div class="row pl-md-3 pr-md-3">

                        <div class="col">

                            <div class="card shadow border-left-success">
                                <!-- Card Header - Dropdown -->

                                <div class="card-header">
                                    <h5 class="m-0 text-gray-800">Para: 
                                    <?php 
										if(isset($_SESSION['nombre_asignatura'])){		
										echo $_SESSION['nombre_asignatura']; }
									?>
                               		</h5>
                                </div>
                                <!-- Card Body -->

                                

                                    <div class="card-body">
										
                                        <div class="row pl-3">
                                            <div class="col-xl-3 col-xs-12">
                                                <h5>Nombre: <?php
													//$_SESSION['nombre_cuestionario'] = $_POST['nombre_cuestionario'];
                                                    echo $_SESSION['nombre_cuestionario'] ;/*
													echo $_POST['fecha_inicio'];
													echo $_POST['fecha_fin'];*/
                                        			?>                                                
                                                </h5>
                                            </div>
                                            <div class="col">
                                                <h5>Complejidad:
                                            <?php
											/*		
                                            switch($_POST['complejidad_cuestionario']){
                                                case "1":
                                                    $_SESSION['complejidad_cuestionario'] = "Básico";
                                                    echo " Básico";
                                                break;
                                                case "2":
                                                    $_SESSION['complejidad_cuestionario'] = "Medio";
                                                    echo " Medio";
                                                break;
                                                case "3":
                                                    $_SESSION['complejidad_cuestionario'] = "Avanzado";
                                                    echo " Avanzado";
                                                break;
                                            }*/
													echo 
														$_SESSION['complejidad_cuestionario'];
													
													//$_SESSION['fecha_inicio'] = $_POST['fecha_inicio'];
													//$_SESSION['fecha_fin'] = $_POST['fecha_fin'];
                                        ?>                                                
                                                </h5>
                                            </div>

                                        </div>
										
                                        
                                        <div class="row pt-1">
                                            <div class="col-xl-6 col-xs-12">
                                                <div class="card shadow">
                                                    <div class="row">
                                                        <div class="col text-center pt-2">Vista previa del cuestionario
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col m-3">
                                                            <div class="card ">
                                                                <ul class="list-group">
                                                                  
                                                                <!---
															<li class="list-group-item">
															    <div class="row m-2">
															    
																	<input type="checkbox"
																		class="form-check-input" id="vist1">
																	<label class="form-check-label  text-justify"
																		for="vist1">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur, maxime iusto possimus ad alias illo quo minima voluptates tempora quod fugiat, molestiae, dolorem dolorum vero repellat rerum. Labore numquam, neque.</label>	
																</div>
														    	<div class="row">
																	<div class="col-4">a) Respuesta1 <br> c) Respuesta3</div>
																	<div class="col-5">b) Respuesta2 <br> d) Respuesta4</div>
													    			<div class="col-3">Resp: a) <br> Tipo: Conjuntos</div>
														    	</div>
															</li>
																-->
																							
		   <?php 
																	
																	
				while($fila2 = $statement2->fetch()){
					$enunciado = utf8_encode($fila2['enunciado']);
					$a = utf8_encode($fila2['inciso_a_texto']);
					$b = utf8_encode($fila2['inciso_b_texto']);
					$c = utf8_encode($fila2['inciso_c_texto']);
					$d = utf8_encode($fila2['inciso_d_texto']);
					$resp = utf8_encode($fila2['respuesta']);
					$tipo = utf8_encode($fila2['tipo']);
					$complejidad = utf8_encode($fila2['complejidad']);
					$estado = utf8_encode($fila2['estado']);
					$id_reactivo = utf8_encode($fila2['id_reactivo']);

					
					echo "<li class='list-group-item'>
						  <div class='row m-2'>

							<input type='checkbox' class='form-check-input' onclick='obteneridreactivo(this);' id='$id_reactivo'>
							<label class='form-check-label text-justify' for='$id_reactivo'>$enunciado</label>	
						  </div>
							<div class='row'>
								<div class='col-4'>a) $a <br> c) $c</div>
								<div class='col-5'>b) $b <br> d) $d</div>
								<div class='col-3'>Resp: $resp) <br> Tipo: $tipo</div>
							</div>						  

						  </li>";
					


				}																	
																	
						/*										
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

					if($_SESSION['usuario']===$usuario){
						echo "<li class='list-group-item'>";
						echo "<div class='row'>";
						echo "<div class='col pl-4''>";
						echo "<input type='checkbox' class='form-check-input' id='vist1'>";
						echo "<label class='form-check-label' for='vist1'>$enunciado</label>";
						echo "					</div>
								</div>
								<div class='row pl-4'>
								a) $a  b) $b <br>
								c) $c  d) $d</div>
								<div class='row'>
									<div class='col text-right'>Tipo</div>
								</div>

							</li>";

					}
					

				}
																	*/
			?>                                                                                                                                       



                                                                </ul>
                                                                
                                                            </div>

                                                           
                                                           
                                                            <div class="row pt-2">

                                                                <div class="col text-right">
                                                                    <button tyle="button"
                                                                        class="btn btn-danger">Remover
                                                                        selección</button>
                                                                </div>
                                                            </div>


                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                           
                                        
                                        
                                            <div class="col-xl-6 col-xs-12">
                                                <div class="card shadow">
                                                    <div class="row pt-3 pl-3 pr-3">
                                                        <div class="col-6 text-center">Repositorio</div>
														
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <select class="form-control">
                                                                    <option value="0">Tipo de Reactivo</option>
                                                                    <option value="1">Directo</option>
                                                                    <option value="2">Complemento</option>
                                                                    <option value="3">Conjuntos</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                    
                                                        

                                                                 
													<?php 
													echo "
													<form action='vincular_cuestionario_reactivo.php' method='POST'>
                                                    <div class='row m-2'>
                                                        <div class='col txt-scroll'>";
															
													
													
													
													
															while($fila = $statement1->fetch()){
																$enunciado = utf8_encode($fila['enunciado']);
																$a = utf8_encode($fila['inciso_a_texto']);
																$b = utf8_encode($fila['inciso_b_texto']);
																$c = utf8_encode($fila['inciso_c_texto']);
																$d = utf8_encode($fila['inciso_d_texto']);
																$resp = utf8_encode($fila['respuesta']);
																$tipo = utf8_encode($fila['tipo']);
																$complejidad = utf8_encode($fila['complejidad']);
																$fecha = utf8_encode($fila['fecha_adicion']);
																$estado = utf8_encode($fila['estado']);
																$usuario = utf8_encode($fila['u']);
																$id_reactivo = utf8_encode($fila['id_reactivo']);

																if($_SESSION['usuario']===$usuario){
																	echo "<li class='list-group-item'>
																		  <div class='row m-2'>

																			<input type='checkbox' class='form-check-input' onclick='obteneridreactivo(this);' id='$id_reactivo'>
																			<label class='form-check-label text-justify' for='$id_reactivo'>$enunciado</label>	
																		  </div>
																			<div class='row'>
																				<div class='col-4'>a) $a <br> c) $c</div>
																				<div class='col-5'>b) $b <br> d) $d</div>
																				<div class='col-3'>Resp: $resp) <br> Tipo: $tipo</div>
																			</div>						  

																		  </li>";
																}


															}
															
													echo "
                                                        </div>
                                                    </div>

                                                    <div class='row'>

                                                        <div class='col m-2 text-right'>
                                                            <input type='submit' value='Agregar al cuestionario' class='btn btn-success'>    
                                                        </div>
                                                    </div>
													</form>";
													?>                                                                                             
                                     				

                                                </div>

                                            </div>


                                        </div>
                                        <!--wwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwww-->
                                        <form action="carga_cuestionario.php" method="POST">
                                        <div class="row m-2">
  
                                            	
                                            <div class="col-lg-6 col-sm-none"></div>
                                            <div class="col-lg-3 col-sm-5">
													<select class="form-control" name="estado_cuestionario">
														<option value="0">Estado</option>
														<option value="1">Habilitado</option>
														<option value="2">Deshabilitado</option>
														
													</select>   
											</div>
                                            <div class="col-lg-3 col-sm-6 text-right">                                            
                                                <a href="#cancel" class="btn btn-secondary" data-toggle="modal">
                                                    Cancelar</a>
                                                <a href="#guar" class="btn btn-success " data-toggle="modal"> Crear
                                                    cuestionario</a>
                                                
                                            </div>
                                        </div>
										
										
										<div class="modal fade" id="guar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
											aria-hidden="true">
											<div class="modal-dialog" role="document">
												<div class="modal-content">
													<!-- Header de la ventana -->
													<div class="modal-header text-gray-900">
														<h5 class="modal-title">Advertencia</h5>
														<button tyle="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
													</div>
													<!-- Contenido de la ventana -->

													<div class="modal-body">
														<div class="text-body text-gray-900">¿Está seguro de crear este cuestionario?</div>
													</div>

													<!-- Foooter de la ventana -->
													<div class="modal-footer">
														<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
														<button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
														<input type="submit" value="Sí" class="btn btn-success" data-toggle="modal">
													</div>
												</div>
											</div>
										</div>
                                        </form>
                                        <!--wwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwww-->
                                    </div>

                            

                            </div>


                        </div>

                    </div>
                    <!-- /.container-fluid -->

                </div>

            </div>
        </div>
    </div>




    <!-- VENTANAS EMERGENTES  ------------------------------------------------------------------------------->


    <div class="modal fade" id="guar1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" role="document">
                <!-- Header de la ventana -->
                <div class="modal-header text-gray-900">
                    <h5 class="modal-title">Información</h5>
                    <button tyle="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <!-- Contenido de la ventana -->
                <div class="modal-body">
                    <div class="text-body text-gray-900">Cuestionario creado con éxito.</div>
                </div>

                <!-- Foooter de la ventana -->
                <div class="modal-footer">
                    <a href="profesor-cuestionarios.php" class="btn btn-success"> Aceptar </a>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="cancel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <!-- Header de la ventana -->
                <div class="modal-header text-gray-900">
                    <h5 class="modal-title">Advertencia</h5>
                    <button tyle="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <!-- Contenido de la ventana -->

                <div class="modal-body">
                    <div class="text-body text-gray-900">¿Está seguro de cancelar la creación de este
                        cuestionario?<br>No se guardará el trabajo realizado</div>
                </div>
                <!-- Foooter de la ventana -->
                <div class="modal-footer">
                    <button tyle="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <button tyle="button" class="btn btn-danger" data-dismiss="modal">No</button>
                    <a href="profesor_cuestionarios.php" class="btn btn-success"> Sí </a>
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
		    function obteneridreactivo(a){
                var opcion = a.id;
                
            }
	
	</script>


</body>

</html>