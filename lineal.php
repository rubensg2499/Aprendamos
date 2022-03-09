<script type="text/javascript">
	function crearCadenaLineal(json){
		var parsed = JSON.parse(json);
		var arr = [];
		for(var x in parsed){
			arr.push(parsed[x]);
		}
		return arr;
	}

</script>
<?php 
	include("conexion.php"); 
	$statement0 = $conexion->prepare("SELECT DISTINCT materia.nombre 
	FROM alumno_realiza_cuestionario,cuestionario,materia WHERE 
	alumno_realiza_cuestionario.id_cuestionario=cuestionario.id_cuestionario 
	and cuestionario.clave=materia.clave");
	$statement0->execute();
	$datosX=null;
	$datosY=null;
	while ($registro = $statement0->fetch()) {
		$nombre = $registro['nombre'];
		echo "<div class='card shadow mb-4 ''>
				<div class='card border-left-success m-3'>
                	<div class='card-header py-3 text-gray-800'>
                    <h5>".utf8_encode($nombre)."</h5>";

		
		echo "</div>";
		echo "<div class='card-body'>";
		echo "<div>";
		$statement = $conexion->prepare("SELECT aciertos,errores,cuestionario.nombre FROM alumno_realiza_cuestionario,cuestionario,materia WHERE alumno_realiza_cuestionario.id_cuestionario=cuestionario.id_cuestionario and cuestionario.clave=materia.clave and materia.nombre='$nombre';");
		$statement->execute();
		$valoresX = array();
		$valoresY = array();
		$valoresX_e = array();
		$valoresY_e = array();
 		while($registro2 = $statement->fetch()){
			$aciertos = $registro2['aciertos'];
			$errores = $registro2['errores'];
			$cien = $aciertos+$errores;
			if($cien==0){
				$aciertos=0;
				$errores=0;
				$valoresY[]=0;
				$valoresY_e[]=0;
				$valoresX[]=$registro2['nombre'];
				$valoresX_e[]=$registro2['nombre'];
			}else{
				$progreso = $aciertos*100/$cien;
				$retraso = $errores*100/$cien;
				$valoresY[]=(int)$progreso;
				$valoresY_e[]=100-((int)$progreso);
				$valoresX[]=$registro2['nombre'];
				$valoresX_e[]=$registro2['nombre'];
			}
			
			
		}
		$datosX=json_encode($valoresX);
		$datosY=json_encode($valoresY);
		$datosX_e=json_encode($valoresX_e);
		$datosY_e=json_encode($valoresY_e);
		echo "<div id = '$nombre' style='width:100%'></div>";
		echo "<script>";
			echo "datosX = crearCadenaLineal('$datosX');";
			echo "datosY = crearCadenaLineal('$datosY');";
			echo "datosX_e = crearCadenaLineal('$datosX_e');";
			echo "datosY_e = crearCadenaLineal('$datosY_e');";
			echo "var aciertos = {
					x: datosX,
					y: datosY,
					name: '(%)Aciertos',
					type: 'scatter',
					line: {
			            color: '#5cb85c',
			            width: 2
			        },
			        marker: {
			            color: '#5cb85c',
			            size: 12,
			        }
				};";
			echo "var errores = {
					x: datosX_e,
					y: datosY_e,
					name: '(%)Errores',
					type: 'scatter',
					line: {
			            color: 'red',
			            width: 2
			        },
			        marker: {
			            color: 'red',
			            size: 12,
			        }
				};";
			echo "var layout = {
				        xaxis: {
				            title: 'Cuestionario'
				        },
				        yaxis: {
				            title: 'Progreso'
				        }
				    };";
			echo "var data = [aciertos,errores];
					Plotly.newPlot('$nombre',data,layout);";
		echo "</script>";
		echo "</div>";
        echo "</div></div></div>";
	}	
?>


<!--<script type="text/javascript">
	datosX = crearCadenaLineal('<?php echo $datosX?>');
	datosY = crearCadenaLineal('<?php echo $datosY?>');
	datosX_e = crearCadenaLineal('<?php echo $datosX_e?>');
	datosY_e = crearCadenaLineal('<?php echo $datosY_e?>');
	var trace1 = {
		x: datosX,
		y: datosY,
		type: 'scatter',
		line: {
            color: '#5cb85c',
            width: 2
        },
        marker: {
            color: '#5cb85c',
            size: 12,
        }
	};
	var trace2 = {
		x: datosX_e,
		y: datosY_e,
		type: 'scatter',
		line: {
            color: 'red',
            width: 2
        },
        marker: {
            color: 'red',
            size: 12,
        }
	};
	var layout = {
        xaxis: {
            title: 'Cuestionario'
        },
        yaxis: {
            title: 'Progreso'
        }
    };
	var data = [trace1,trace2];
	Plotly.newPlot('Estructura de datos',data,layout);
</script>-->