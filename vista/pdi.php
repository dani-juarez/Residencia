<?php include 'partials/head.php';?>
<?php
if (isset($_SESSION["usuario"])) {
    if ($_SESSION["usuario"]["privilegio"] == 2) {
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
				<h1><strong>Bienvenido</strong> <?php echo $_SESSION["usuario"]["nombre"]; ?></h1>
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
		<div class="barra__buscador">
			<form action="" class="formulario" method="post">
				<input type="text" name="buscar" placeholder="Buscar por Area Responsable" 
				value="<?php if(isset($buscar_text)) echo $buscar_text; ?>" class="input__text">
				<input type="submit" class="btn" name="btn_buscar" value="Buscar">
				<a href="insertpdi.php" class="btn btn__nuevo">Nuevo PDI</a>
			</form>
		</div>
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
				<td colspan="2">Acción</td>
			</tr>
			<?php foreach($resultado as $fila):?>
				<tr >
					<td><?php echo $fila['eje']; ?></td>
					<td><?php echo $fila['objetivo']; ?></td>
					<td><?php echo $fila['numero_linea_accion']; ?></td>
					<td><?php echo $fila['linea_accion']; ?></td>
					<td><?php echo $fila['numero_proyecto']; ?></td>
					<td><?php echo $fila['proyecto']; ?></td>
					<td><?php echo $fila['indicador']; ?></td>
					<td><?php echo $fila['unidad_medida']; ?></td>
					<td><?php echo $fila['numero_accion']; ?></td>
					<td><?php echo $fila['accion_comprometida']; ?></td>
					<td><?php echo $fila['meta']; ?></td>
					<td><?php echo $fila['indicador_interno']; ?></td>
					<td><?php echo $fila['medio_verificacion']; ?></td>
					<td><?php echo $fila['area_responsable']; ?></td>
					<td><a href="updatepdi.php?id=<?php echo $fila['id']; ?>"  class="btn__update" >Editar</a></td>
					<td><a href="deletepdi.php?id=<?php echo $fila['id']; ?>" class="btn__delete">Eliminar</a></td>
				</tr>
			<?php endforeach ?>

		</table>
	</div>
</body>
</html>