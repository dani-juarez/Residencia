<?php include 'partials/head.php';?>
<?php
if (isset($_SESSION["usuario"])) {
    if ($_SESSION["usuario"]["privilegio"] == 1) {
        header("location:usuario.php");
    }
} else {
    header("location:index.php");
}
?>
<?php include 'partials/menu.php';?>	
<div class="container">
	<div class="starter-template">
		<div class="jumbotron">
			<div class="container text-center">
				<h2><strong>Bienvenido</strong> <?php echo $_SESSION["usuario"]["nombre"]; ?></h2>
				<p><span class="label label-info"><?php echo $_SESSION["usuario"]["privilegio"] == 1 ? 'Administrador' : 'Usuario'; ?></span></p>
				
			</div>
		</div>
	</div>
</div>

<?php include 'partials/footer.php';?>

<?php
	include_once 'conexion.php';

	$sentencia_select=$con->prepare('SELECT *FROM pdi ORDER BY id ASC');
	$sentencia_select->execute();
	$resultado=$sentencia_select->fetchAll();

	// metodo buscar
	if(isset($_POST['btn_buscar'])){
		$buscar_text=$_POST['buscar'];
		$select_buscar=$con->prepare('
			SELECT *FROM pdi WHERE area_responsable LIKE :campo;'
		);

		$select_buscar->execute(array(
			':campo' =>"%".$buscar_text."%"
		));

		$resultado=$select_buscar->fetchAll();

	}

?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Inicio</title>
	<link rel="stylesheet" href="../CSS/style.css">
</head>
<body>
	<div class="contenedor">
		<h2>MODULO PDI TECNM</h2>
		
		<table>
			<tr class="head">
				<td>Eje Estratégico/Eje Transversal (ET)</td>
				<td>Objetivo</td>
				<td>N° Línea de Acción</td>
				<td>Línea de Acción</td>
				<td>N° Proyecto</td>
				<td>Proyecto</td>
				<td>Indicador</td>
				<td>Unidad de Medida</td>
				<td>N° Acción</td>
				<td>Acción Comprometida</td>
				<td>Meta</td>
				<td>Indicador Interno (ITs)</td>
				<td>Medio de Verificación</td>
				<td>Área Responsable</td> 
			</tr>

            <?php
            
                  $query="SELECT PDI.eje, PDI.objetivo, PDI.numero_linea_accion, PDi.linea_accion, PDI.numero_proyecto, PDI.proyecto, PDI.indicador, PDI.unidad_medida, PDI.numero_accion, PDI.accion_comprometida, PDI.meta, PDI.indicador_interno, PDI.medio_verificacion, PDI.area_responsable,
				                 US.nombre
                             FROM pdi PDI
                             INNER JOIN usuarios US ON US.nombre = PDI.area_responsable ";
                 $consulta=$con->query($query);
				 while ($fila=$consulta->fetch(PDO::FETCH_ASSOC))
                 {
                    echo'
                         <tr>
                         <td>'.$fila['eje'].'</td>
                         <td>'.$fila['objetivo'].'</td>
                         <td>'.$fila['numero_linea_accion'].'</td>
                         <td>'.$fila['linea_accion'].'</td>
                         <td>'.$fila['numero_proyecto'].'</td>
                         <td>'.$fila['proyecto'].'</td>
                         <td>'.$fila['indicador'].'</td>
                         <td>'.$fila['unidad_medida'].'</td>
                         <td>'.$fila['numero_accion'].'</td>
                         <td>'.$fila['accion_comprometida'].'</td>
                         <td>'.$fila['meta'].'</td>
                         <td>'.$fila['indicador_interno'].'</td>
                         <td>'.$fila['medio_verificacion'].'</td>
                         <td>'.$fila['area_responsable'].'</td>
                         </tr>
                         ';
                 }
?>
		</table>
	</div>
</body>
</html>