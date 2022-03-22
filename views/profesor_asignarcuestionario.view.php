<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Asignar cuestionario</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link rel="stylesheet" href="css/sb-admin.css">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">


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
                                class="fas ml-2 mr-2 fa-arrow-right  fa-sm"></i> Asignar cuestionario</h5>
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


<?php
    $statement0 = $conexion->prepare("SELECT nombre,grupo FROM materia WHERE clave = :id_mat;");
    $statement0->execute(array(':id_mat'=>$_SESSION['id_mat']));
    $mat = $statement0->fetch();
    $nom_mat = $mat['nombre'];
    $grupo_mat = $mat['grupo'];

?>


                                <div class="card-header">
                                    <h5 class="m-0 text-gray-800"><?php echo $nom_mat; ?></h5>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">

                                <form action="profesor_asig_cuest.php" method="post">

                                    <div class="row">

                                        <div class="col-xl-6 col-xs-12">
                                            <div class="card shadow">
                                                <div class="row">
                                                    <div class="col text-center pt-2"><b>Cuestionarios Habilitados</b></div>
                                                </div>
                                                <div class="row m-2">
                                                	<div class="col">Nombre Cuestionario</div>
                                                	<div class="col">Complejidad</div>
                                                </div>

                                                <div class="row">
                                                    <div class="col m-3">
                                                        <div class="card">
                                                            <ul class="list-group list-group-flush ">

<?php
    $i=0;
    $aux=null;
    while ($cuest = $statement1->fetch()) {
        $id_cuest = $cuest['id_cuestionario'];
        $nombre_cuest = $cuest['nombre'];
        $complej = $cuest['complejidad'];
        $aux[$i]=$id_cuest;

        echo "
		<li class='list-group-item'>
			<div class='row'>
				<div class='col pl-4 custom-control custom-checkbox'>
					<input type='checkbox' class='custom-control-input' id='$id_cuest' name='$id_cuest'>
					<label class='custom-control-label' for='$id_cuest'>$nombre_cuest</label>
				</div>
				<div class='col'>$complej</div>
			</div>
		</li>";
        $i++;
    }
    if ($aux!=null) {
        $_SESSION['reg_cue'] = $aux;
    }
?>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-xs-12">
                                            <div class="card shadow">

                                                <div class="row">
                                                    <div class="col text-center pt-2"><b>Grupos</b></div>
                                                </div>

                                                <div class="row">
                                                    <div class="col m-3">
                                                    <div class="card">



<?php

$grupo= $registro_mat['grupo'];

echo "
<ul class='list-group'>

	<li class='list-group-item '>

		<div class='custom-control custom-checkbox'>
		<input type='checkbox' class='custom-control-input' id='exampleCheck1' >
		<label class='custom-control-label' for='exampleCheck1'><a data-toggle='collapse' href='#collapse1'>$grupo</a></label>
		</div>

		<ul id='collapse1' class='collapse custom-control custom-checkbox ml-3'>";

        $i=0;
        $aux1=null;
        while ($fila = $statement3->fetch()) {
            $nick = $fila['nick_alum'];
            $nombre = $fila['nombre'];
            $ape_pat = $fila['ape_pat'];
            $ape_mat = $fila['ape_mat'];
            $aux1[$i]=$nick;
            echo "
			<li>
				<input type='checkbox' class='custom-control-input chk1' id='chk1$nick' name='$nick'>
				<label class='custom-control-label' for='chk1$nick'>$nombre $ape_pat $ape_mat</label>
			</li>";
            $i++;
        }
        if ($aux1!=null) {
            $_SESSION['reg_alum']= $aux1;
        }


echo"
		</ul>
	</li>


</ul>	";

?>
													</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row m-2">
                                        <div class="col text-right">
                                            <a href="#cancel" class="btn btn-danger" data-toggle="modal">
                                                Cancelar</a>
                                            <a href="#guar" class="btn btn-success " data-toggle="modal">Asignar
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
                    <div class="text-body text-gray-900">¿Está seguro de asignar este cuestionario?</div>
                </div>

                <!-- Foooter de la ventana -->
                <div class="modal-footer">
                    <button tyle="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <button tyle="button" class="btn btn-danger" data-dismiss="modal">No</button>
                    <input type='submit' class='btn btn-success' value='Sí'>
                    <!--<a href="#guar1" class="btn btn-success" data-toggle="modal" data-dismiss="modal"> Sí </a>-->
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
                <div class="modal-body text-gray-900">Cuestionario asignado con éxito.</div>
                <!-- Foooter de la ventana -->
                <div class="modal-footer">
                    <a href="profesor_cuestionarios.php" class="btn btn-success"> Aceptar </a>
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
                <div class="modal-body text-gray-900">¿Está seguro de cancelar la asignacion de este cuestionario?<br>No
                    se guardará el trabajo realizado.</div>
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
		$("#exampleCheck1").on("click",function(){
			$(".chk1").prop("checked",this.checked);
		});

		$(".chk1").on("click",function(){
			if($(".chk1").length==$(".chk1:checked").length){
				$("#exampleCheck1").prop("checked",true);
			}else{
				$("#exampleCheck1").prop("checked",false);
			}
		});
	</script>

</body>

</html>
