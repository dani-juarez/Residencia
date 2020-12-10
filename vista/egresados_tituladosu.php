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

	$sentencia_select=$con->prepare('SELECT *FROM egresados_titulados ORDER BY id ASC');
	$sentencia_select->execute();
	$resultado=$sentencia_select->fetchAll();

	// metodo buscar
	if(isset($_POST['btn_buscar'])){
		$buscar_text=$_POST['buscar'];
		$select_buscar=$con->prepare('
			SELECT *FROM egresados_titulados WHERE programa LIKE :campo;'
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
<h2> EGRESADOS Y TITULADOS <br> AGOSTO - DICIEMBRE</h2>
<!-- Tabla Primera-->
<div class="contenedor">
		<div class="barra__buscador">
			<form action="" class="formulario" method="post">
				<input type="text" name="buscar" placeholder="Buscar Programa" 
				value="<?php if(isset($buscar_text)) echo $buscar_text; ?>" class="input__text">
				<input type="submit" class="btn" name="btn_buscar" value="Buscar">
				<a href="insert_egresados_titulados.php" class="btn btn__nuevo">Nuevo Egresado/Titulado</a>
			</form>
		</div>
		<table>
			<tr class="head">
				<td>PROGRAMA</td>
				<td>MODALIDAD</td>
				<td colspan="2">EGRESADOS</td>
				<td colspan="2">TITULADOS</td>
				<td colspan="2">Acción</td>
			</tr>
            <tr class="head">
			<td scope="col"></td>
			<td scope="col"></td>
			<td scope="col">HOMBRES</td>
			<td scope="col">MUJERES</td>
			<td scope="col">HOMBRES</td>
			<td scope="col">MUJERES</td>
			<td scope="col"></td>
			<td scope="col"></td>
			</tr>

			<?php foreach($resultado as $fila):?>
				<tr >
					<td><?php echo $fila['programa']; ?></td>
					<td><?php echo $fila['modalidad']; ?></td>
                    <td><?php echo $fila['hombres_egresados']; ?></td>
                    <td><?php echo $fila['mujeres_egresados']; ?></td>
                    <td><?php echo $fila['hombres_titulados']; ?></td>
                    <td><?php echo $fila['mujeres_titulados']; ?></td>
					<td><a href="update_egresados_titulados.php?id=<?php echo $fila['id']; ?>"  class="btn__update" >Editar</a></td>
					<td><a href="delete_egresados_titulados.php?id=<?php echo $fila['id']; ?>" class="btn__delete">Eliminar</a></td>
				</tr>
			<?php endforeach ?>

		</table>
</div>
<br><br><br>


<!--Segunda Tabla -->
<?php
	include_once 'conexion.php';

	$sentencia_select=$con->prepare('SELECT *FROM egresados_titulados2 ORDER BY id ASC');
	$sentencia_select->execute();
	$resultado=$sentencia_select->fetchAll();

	// metodo buscar
	if(isset($_POST['btn_buscar'])){
		$buscar_text=$_POST['buscar'];
		$select_buscar=$con->prepare('
			SELECT *FROM egresados_titulados2 WHERE programa LIKE :campo;'
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
<h2> EGRESADOS Y TITULADOS <br> ENERO - JUNIO</h2>
<!-- Tabla Segunda-->
<div class="contenedor">
		<div class="barra__buscador">
			<form action="" class="formulario" method="post">
				<input type="text" name="buscar" placeholder="Buscar Programa" 
				value="<?php if(isset($buscar_text)) echo $buscar_text; ?>" class="input__text">
				<input type="submit" class="btn" name="btn_buscar" value="Buscar">
				<a href="insert_egresados_titulados2.php" class="btn btn__nuevo">Nuevo Egresado/Titulado</a>
			</form>
		</div>
		<table>
			<tr class="head">
				<td>PROGRAMA</td>
				<td>MODALIDAD</td>
				<td colspan="2">EGRESADOS</td>
				<td colspan="2">TITULADOS</td>
				<td colspan="2">Acción</td>
			</tr>
            <tr class="head">
			<td scope="col"></td>
			<td scope="col"></td>
			<td scope="col">HOMBRES</td>
			<td scope="col">MUJERES</td>
			<td scope="col">HOMBRES</td>
			<td scope="col">MUJERES</td>
			<td scope="col"></td>
			<td scope="col"></td>
			</tr>

			<?php foreach($resultado as $fila):?>
				<tr >
					<td><?php echo $fila['programa']; ?></td>
					<td><?php echo $fila['modalidad']; ?></td>
                    <td><?php echo $fila['hombres_egresados']; ?></td>
                    <td><?php echo $fila['mujeres_egresados']; ?></td>
                    <td><?php echo $fila['hombres_titulados']; ?></td>
                    <td><?php echo $fila['mujeres_titulados']; ?></td>
					<td><a href="update_egresados_titulados2.php?id=<?php echo $fila['id']; ?>"  class="btn__update" >Editar</a></td>
					<td><a href="delete_egresados_titulados2.php?id=<?php echo $fila['id']; ?>" class="btn__delete">Eliminar</a></td>
				</tr>
			<?php endforeach ?>

		</table>
</div>

</body>
</html>