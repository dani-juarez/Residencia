<?php include 'partials/menu_lateral.php';?>
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
				<h2><strong>Bienvenido</strong> <?php echo $_SESSION["usuario"]["nombre"]; ?></h2>
				<p><span class="label label-info"><?php echo $_SESSION["usuario"]["privilegio"] == 1 ? 'Administrador' : 'Usuario'; ?></span></p>
				
			</div>
		</div>
	</div>
</div>

<?php include 'partials/footer.php';?>

<?php
	include_once 'conexion.php';

	$sentencia_select=$con->prepare('SELECT *FROM becas ORDER BY id ASC');
	$sentencia_select->execute();
	$resultado=$sentencia_select->fetchAll();

	// metodo buscar
	if(isset($_POST['btn_buscar'])){
		$buscar_text=$_POST['buscar'];
		$select_buscar=$con->prepare('
			SELECT *FROM becas WHERE programa LIKE :campo;'
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
	<link rel="stylesheet" href="css/estilo.css">
</head>
<body>
	<div class="contenedor">
		<h2>BECAS <br> PERIODO AGOSTO - DICIEMBRE</h2>
		<div class="barra__buscador">
			<form action="" class="formulario" method="post">
				<input type="text" name="buscar" placeholder="Buscar Programa" 
				value="<?php if(isset($buscar_text)) echo $buscar_text; ?>" class="input__text">
				<input type="submit" class="btn" name="btn_buscar" value="Buscar">
				<a href="insert_becas.php" class="btn btn__nuevo">Nuevo Programa</a>
			</form>
		</div>
		<table>
			<tr class="head">
				<td>PROGRAMA</td>
				<td colspan="2">1ER SEMESTRE</td>
				<td colspan="2">2DO SEMESTRE</td>
				<td colspan="2">3ER SEMESTRE</td>
				<td colspan="2">4TO SEMESTRE</td>
				<td colspan="2">5TO SEMESTRE</td>
				<td colspan="2">6TO SEMESTRE</td>
				<td colspan="2">7MO SEMESTRE</td>
				<td colspan="2">8VO SEMESTRE</td>
				<td colspan="2">9NO SEMESTRE</td>
				<td>TOTAL HOMBRES</td>
				<td>TOTAL MUJERES</td>
				<td colspan="2">Acción</td>
			</tr>

			<tr class="head">
			<td scope="col"></td>
			<td scope="col">H</td>
			<td scope="col">M</td>
			<td scope="col">H</td>
			<td scope="col">M</td>
			<td scope="col">H</td>
			<td scope="col">M</td>
			<td scope="col">H</td>
			<td scope="col">M</td>
			<td scope="col">H</td>
			<td scope="col">M</td>
			<td scope="col">H</td>
			<td scope="col">M</td>
			<td scope="col">H</td>
			<td scope="col">M</td>
			<td scope="col">H</td>
			<td scope="col">M</td>
			<td scope="col">H</td>
			<td scope="col">M</td>
			<td scope="col"></td>
			<td scope="col"></td>
			<td scope="col"></td>
			<td scope="col"></td>
			</tr>

			<?php foreach($resultado as $fila):?>
				<tr >
					<td><?php echo $fila['programa']; ?></td>
					<td><?php echo $fila['hombres_primero']; ?></td>
					<td><?php echo $fila['mujeres_primero']; ?></td>
					<td><?php echo $fila['hombres_segundo']; ?></td>
					<td><?php echo $fila['mujeres_segundo']; ?></td>
					<td><?php echo $fila['hombres_tercero']; ?></td>
					<td><?php echo $fila['mujeres_tercero']; ?></td>
					<td><?php echo $fila['hombres_cuarto']; ?></td>
					<td><?php echo $fila['mujeres_cuarto']; ?></td>
					<td><?php echo $fila['hombres_quinto']; ?></td>
					<td><?php echo $fila['mujeres_quinto']; ?></td>
					<td><?php echo $fila['hombres_sexto']; ?></td>
					<td><?php echo $fila['mujeres_sexto']; ?></td>
					<td><?php echo $fila['hombres_septimo']; ?></td>
					<td><?php echo $fila['mujeres_septimo']; ?></td>
					<td><?php echo $fila['hombres_octavo']; ?></td>
					<td><?php echo $fila['mujeres_octavo']; ?></td>
					<td><?php echo $fila['hombres_noveno']; ?></td>
					<td><?php echo $fila['mujeres_noveno']; ?></td>
					<td><?php echo $fila['hombres_total']; ?></td>
					<td><?php echo $fila['mujeres_total']; ?></td>
					<td><a href="update_becas.php?id=<?php echo $fila['id']; ?>"  class="btn__update" >Editar</a></td>
					<td><a href="delete_becas.php?id=<?php echo $fila['id']; ?>" class="btn__delete">Eliminar</a></td>
				</tr>
			<?php endforeach ?>
		</table>
	</div>

	<br><br><br>

<!-- Busqueda Tabla2-->
<?php
	include_once 'conexion.php';

	$sentencia_select=$con->prepare('SELECT *FROM becas2 ORDER BY id ASC');
	$sentencia_select->execute();
	$resultado=$sentencia_select->fetchAll();

	// metodo buscar
	if(isset($_POST['btn_buscar'])){
		$buscar_text=$_POST['buscar'];
		$select_buscar=$con->prepare('
			SELECT *FROM becas2 WHERE programa LIKE :campo;'
		);

		$select_buscar->execute(array(
			':campo' =>"%".$buscar_text."%"
		));

		$resultado=$select_buscar->fetchAll();

	}
?>

<!-- Tabla 2 -->
<h2>BECAS <br> ENERO - JUNIO</h2>
<div class="contenedor">
		<div class="barra__buscador">
			<form action="" class="formulario" method="post">
				<input type="text" name="buscar" placeholder="Buscar Programa" 
				value="<?php if(isset($buscar_text)) echo $buscar_text; ?>" class="input__text">
				<input type="submit" class="btn" name="btn_buscar" value="Buscar">
				<a href="insert_becas2.php" class="btn btn__nuevo">Nuevo Programa</a>
			</form>
		</div>
		<table>
			<tr class="head">
				<td>PROGRAMA</td>
				<td colspan="2">1ER SEMESTRE</td>
				<td colspan="2">2DO SEMESTRE</td>
				<td colspan="2">3ER SEMESTRE</td>
				<td colspan="2">4TO SEMESTRE</td>
				<td colspan="2">5TO SEMESTRE</td>
				<td colspan="2">6TO SEMESTRE</td>
				<td colspan="2">7MO SEMESTRE</td>
				<td colspan="2">8VO SEMESTRE</td>
				<td colspan="2">9NO SEMESTRE</td>
				<td>TOTAL HOMBRES</td>
				<td>TOTAL MUJERES</td>
				<td colspan="2">Acción</td>
			</tr>

			<tr class="head">
			<td scope="col"></td>
			<td scope="col">H</td>
			<td scope="col">M</td>
			<td scope="col">H</td>
			<td scope="col">M</td>
			<td scope="col">H</td>
			<td scope="col">M</td>
			<td scope="col">H</td>
			<td scope="col">M</td>
			<td scope="col">H</td>
			<td scope="col">M</td>
			<td scope="col">H</td>
			<td scope="col">M</td>
			<td scope="col">H</td>
			<td scope="col">M</td>
			<td scope="col">H</td>
			<td scope="col">M</td>
			<td scope="col">H</td>
			<td scope="col">M</td>
			<td scope="col"></td>
			<td scope="col"></td>
			<td scope="col"></td>
			<td scope="col"></td>
			</tr>

			<?php foreach($resultado as $fila):?>
				<tr >
					<td><?php echo $fila['programa']; ?></td>
					<td><?php echo $fila['hombres_primero']; ?></td>
					<td><?php echo $fila['mujeres_primero']; ?></td>
					<td><?php echo $fila['hombres_segundo']; ?></td>
					<td><?php echo $fila['mujeres_segundo']; ?></td>
					<td><?php echo $fila['hombres_tercero']; ?></td>
					<td><?php echo $fila['mujeres_tercero']; ?></td>
					<td><?php echo $fila['hombres_cuarto']; ?></td>
					<td><?php echo $fila['mujeres_cuarto']; ?></td>
					<td><?php echo $fila['hombres_quinto']; ?></td>
					<td><?php echo $fila['mujeres_quinto']; ?></td>
					<td><?php echo $fila['hombres_sexto']; ?></td>
					<td><?php echo $fila['mujeres_sexto']; ?></td>
					<td><?php echo $fila['hombres_septimo']; ?></td>
					<td><?php echo $fila['mujeres_septimo']; ?></td>
					<td><?php echo $fila['hombres_octavo']; ?></td>
					<td><?php echo $fila['mujeres_octavo']; ?></td>
					<td><?php echo $fila['hombres_noveno']; ?></td>
					<td><?php echo $fila['mujeres_noveno']; ?></td>
					<td><?php echo $fila['hombres_total']; ?></td>
					<td><?php echo $fila['mujeres_total']; ?></td>
					<td><a href="update_becas2.php?id=<?php echo $fila['id']; ?>"  class="btn__update" >Editar</a></td>
					<td><a href="delete_becas2.php?id=<?php echo $fila['id']; ?>" class="btn__delete">Eliminar</a></td>
				</tr>
			<?php endforeach ?>
		</table>
    </div>
</body>
</html>