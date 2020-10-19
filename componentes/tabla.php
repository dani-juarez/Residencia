<?php 
	session_start();
	require_once "../php/conexion.php";
	$conexion=conexion();
 ?>
<div class="row">
	<div class="col-sm-12">
	<center><h3>MODULO PDI TECNM</h3></center>
		<table class="table table-hover table-condensed table-bordered">
		<caption>
			<button class="btn btn-primary" data-toggle="modal" data-target="#modalNuevo">
				Agregar Nuevo PDI
				<span class="glyphicon glyphicon-plus"></span>
			</button>
		</caption>
			<tr>
				<td><center>Eje Estratégico / Eje Transversal (ET)</center></td>
				<td><center>Objetivo</center></td>
				<td><center>N° Línea de Acción</center></td>
				<td><center>Línea de Acción</center></td>
				<td><center>N° Proyecto</center></td>
				<td><center>Proyecto</center></td>
				<td><center>Indicador</center></td>
				<td><center>Unidad de Medida</center></td>
				<td><center>N° Acción</center></td>
				<td><center>Acción Comprometida</center></td>
				<td><center>Meta</center></td>
				<td><center>Indicador Interno (ITs)</center></td>
				<td><center>Medio de Verificación</center></td>
				<td><center>Área Responsable</center></td>
				
			</tr>

			<?php 

				if(isset($_SESSION['consulta'])){
					if($_SESSION['consulta'] > 0){
						$id=$_SESSION['consulta'];
						$sql="SELECT id,eje,objetivo,numero_linea_accion,linea_accion,numero_proyecto,proyecto,indicador,unidad_medida,numero_accion,accion_comprometida,meta,indicador_interno,medio_verificacion,area_responsable
						from pdi where id='$id'";
					}else{
						$sql="SELECT id,eje,objetivo,numero_linea_accion,linea_accion,numero_proyecto,proyecto,indicador,unidad_medida,numero_accion,accion_comprometida,meta,indicador_interno,medio_verificacion,area_responsable
						from pdi";
					}
				}else{
					$sql="SELECT id,eje,objetivo,numero_linea_accion,linea_accion,numero_proyecto,proyecto,indicador,unidad_medida,numero_accion,accion_comprometida,meta,indicador_interno,medio_verificacion,area_responsable
						from pdi";
				}

				$result=mysqli_query($conexion,$sql);
				while($ver=mysqli_fetch_row($result)){ 

					$datos=$ver[0]."||".
						   $ver[1]."||".
						   $ver[2]."||".
						   $ver[3]."||".
						   $ver[4]."||".
						   $ver[5]."||".
						   $ver[6]."||".
						   $ver[7]."||".
						   $ver[8]."||".
						   $ver[9]."||".
						   $ver[10]."||".
						   $ver[11]."||".
						   $ver[12]."||".
						   $ver[13]."||".
						   $ver[14];
			 ?>

			<tr>
				<td><?php echo $ver[1] ?></td>
				<td><?php echo $ver[2] ?></td>
				<td><?php echo $ver[3] ?></td>
				<td><?php echo $ver[4] ?></td>
				<td><?php echo $ver[5] ?></td>
				<td><?php echo $ver[6] ?></td>
				<td><?php echo $ver[7] ?></td>
				<td><?php echo $ver[8] ?></td>
				<td><?php echo $ver[9] ?></td>
				<td><?php echo $ver[10] ?></td>
				<td><?php echo $ver[11] ?></td>
				<td><?php echo $ver[12] ?></td>
				<td><?php echo $ver[13] ?></td>
				<td><?php echo $ver[14] ?></td>
				<td>
					<button class="btn btn-warning glyphicon glyphicon-pencil" data-toggle="modal" data-target="#modalEdicion" onclick="agregaform('<?php echo $datos ?>')">
						
					</button>
				</td>
				<td>
					<button class="btn btn-danger glyphicon glyphicon-remove" 
					onclick="preguntarSiNo('<?php echo $ver[0] ?>')">
						
					</button>
				</td>
			</tr>
			<?php 
		}
			 ?>
		</table>
	</div>
</div>