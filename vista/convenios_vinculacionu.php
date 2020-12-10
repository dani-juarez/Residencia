<?php include 'partials/menu_lateral_se.php';?>
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

	$sentencia_select=$con->prepare('SELECT *FROM convenios_vinculacion ORDER BY id ASC');
	$sentencia_select->execute();
	$resultado=$sentencia_select->fetchAll();

	// metodo buscar
	if(isset($_POST['btn_buscar'])){
		$buscar_text=$_POST['buscar'];
		$select_buscar=$con->prepare('
			SELECT *FROM convenios_vinculacion WHERE nombre_empresa LIKE :campo;'
		);

		$select_buscar->execute(array(
			':campo' =>"%".$buscar_text."%"
		));

		$resultado=$select_buscar->fetchAll();

	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
<h2>CONVENIOS DE VINCULACION <br> AGOSTO - DICIEMBRE</h2>
<!-- Tabla Primera-->
<div class="contenedor">
		<div class="barra__buscador">
			<form action="" class="formulario" method="post">
				<input type="text" name="buscar" placeholder="Buscar Programa" 
				value="<?php if(isset($buscar_text)) echo $buscar_text; ?>" class="input__text">
				<input type="submit" class="btn" name="btn_buscar" value="Buscar">
				<a href="insert_convenios_vinculacion.php" class="btn btn__nuevo">Nuevo Convenio</a>
			</form>
		</div>
		<table>
			<tr class="head">
				<td>NOMBRE DE LA EMPRESA</td>
				<td>UBICACION</td>
				<td>AÑO DE CREACION</td>
				<td>SECTOR</td>
				<td>GIRO</td>
				<td>TAMAÑO</td>
				<td>N° DE EMPLEADOS</td>
				<td>TIPO</td>
				<td>MODALIDAD</td>
				<td>ALCANCE</td>
				<td>AREA DEL CONOCIMIENTO</td>
				<td colspan="2" scope="colgroup">VIGENCIA</td>
				<td colspan="2">Acción</td>
			</tr>
            <tr class="head">
			<td scope="col"></td>
			<td scope="col"></td>
			<td scope="col"></td>
			<td scope="col"></td>
			<td scope="col"></td>
			<td scope="col"></td>
			<td scope="col"></td>
			<td scope="col"></td>
			<td scope="col"></td>
			<td scope="col"></td>
			<td scope="col"></td>
            <td scope="col">INICIO</td>
            <td scope="col">TERMINO</td>
            <td scope="col"></td>
			<td scope="col"></td></tr>

			<?php foreach($resultado as $fila):?>
				<tr >
					<td><?php echo $fila['nombre_empresa']; ?></td>
					<td><?php echo $fila['ubicacion']; ?></td>
                    <td><?php echo $fila['ano_creacion']; ?></td>
                    <td><?php echo $fila['sector']; ?></td>
                    <td><?php echo $fila['giro']; ?></td>
                    <td><?php echo $fila['tamano']; ?></td>
                    <td><?php echo $fila['n_empleados']; ?></td>
                    <td><?php echo $fila['tipo']; ?></td>
                    <td><?php echo $fila['modalidad']; ?></td>
                    <td><?php echo $fila['alcance']; ?></td>
                    <td><?php echo $fila['area_conocimiento']; ?></td>
					<td><?php echo $fila['inicio']; ?></td>
					<td><?php echo $fila['termino']; ?></td>
					<td><a href="update_convenios_vinculacion.php?id=<?php echo $fila['id']; ?>"  class="btn__update" >Editar</a></td>
					<td><a href="delete_convenios_vinculacion.php?id=<?php echo $fila['id']; ?>" class="btn__delete">Eliminar</a></td>
				</tr>
			<?php endforeach ?>

		</table>
</div>
<br><br><br>

<!-- Busqueda Tabla2-->

</body>
</html>