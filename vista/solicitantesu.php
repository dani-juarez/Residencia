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

	$sentencia_select=$con->prepare('SELECT *FROM solicitantes ORDER BY id ASC');
	$sentencia_select->execute();
	$resultado=$sentencia_select->fetchAll();

	// metodo buscar
	if(isset($_POST['btn_buscar'])){
		$buscar_text=$_POST['buscar'];
		$select_buscar=$con->prepare('
			SELECT *FROM solicitantes WHERE programa LIKE :campo;'
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
		<h2>SOLICITANTES <br> AGOSTO - DICIEMBRE</h2>
		<div class="barra__buscador">
			<form action="" class="formulario" method="post">
				<input type="text" name="buscar" placeholder="Buscar Programa" 
				value="<?php if(isset($buscar_text)) echo $buscar_text; ?>" class="input__text">
				<input type="submit" class="btn" name="btn_buscar" value="Buscar">
			</form>
		</div>
		<table>
			<tr class="head">
				<td>PROGRAMA</td>
				<td>MODALIDAD</td>
				<td>CAPACIDAD INSTALADA</td>
				<td colspan="2">SOLICITANTES</td>
				<td colspan="2">ACEPTADOS</td>
			</tr>
            
            <tr class="head">
				<td></td>
				<td></td>
				<td></td>
				<td>HOMBRES</td>
				<td>MUJERES</td>
                <td>HOMBRES</td>
                <td>MUJERES</td>
			</tr>

			<?php foreach($resultado as $fila):?>
				<tr >
					<td><?php echo $fila['programa']; ?></td>
					<td><?php echo $fila['modalidad']; ?></td>
					<td><?php echo $fila['capacidad_instalada']; ?></td>
					<td><?php echo $fila['hombres_solicitantes']; ?></td>
					<td><?php echo $fila['mujeres_solicitantes']; ?></td>
					<td><?php echo $fila['hombres_aceptados']; ?></td>
                    <td><?php echo $fila['mujeres_aceptados']; ?></td>
				</tr>
			<?php endforeach ?>

		</table>
	</div>
<br><br><br>

<!--Segunda Tabla-->
<?php
	include_once 'conexion.php';

	$sentencia_select=$con->prepare('SELECT *FROM solicitantes2 ORDER BY id ASC');
	$sentencia_select->execute();
	$resultado=$sentencia_select->fetchAll();

	// metodo buscar
	if(isset($_POST['btn_buscar'])){
		$buscar_text=$_POST['buscar'];
		$select_buscar=$con->prepare('
			SELECT *FROM solicitantes2 WHERE programa LIKE :campo;'
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
		<h2>SOLICITANTES <br> ENERO - JUNIO</h2>
		<div class="barra__buscador">
			<form action="" class="formulario" method="post">
				<input type="text" name="buscar" placeholder="Buscar Programa" 
				value="<?php if(isset($buscar_text)) echo $buscar_text; ?>" class="input__text">
				<input type="submit" class="btn" name="btn_buscar" value="Buscar">
			</form>
		</div>
		<table>
			<tr class="head">
				<td>PROGRAMA</td>
				<td>MODALIDAD</td>
				<td>CAPACIDAD INSTALADA</td>
				<td colspan="2">SOLICITANTES</td>
				<td colspan="2">ACEPTADOS</td>
			</tr>
            
            <tr class="head">
				<td></td>
				<td></td>
				<td></td>
				<td>HOMBRES</td>
				<td>MUJERES</td>
                <td>HOMBRES</td>
                <td>MUJERES</td>
			</tr>

			<?php foreach($resultado as $fila):?>
				<tr >
					<td><?php echo $fila['programa']; ?></td>
					<td><?php echo $fila['modalidad']; ?></td>
					<td><?php echo $fila['capacidad_instalada']; ?></td>
					<td><?php echo $fila['hombres_solicitantes']; ?></td>
					<td><?php echo $fila['mujeres_solicitantes']; ?></td>
					<td><?php echo $fila['hombres_aceptados']; ?></td>
                    <td><?php echo $fila['mujeres_aceptados']; ?></td>
				</tr>
			<?php endforeach ?>

		</table>
	</div>
</body>
</html>