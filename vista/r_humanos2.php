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

	$sentencia_select=$con->prepare('SELECT *FROM r_humanos_personal ORDER BY id ASC');
	$sentencia_select->execute();
	$resultado=$sentencia_select->fetchAll();

	// metodo buscar
	if(isset($_POST['btn_buscar'])){
		$buscar_text=$_POST['buscar'];
		$select_buscar=$con->prepare('
			SELECT *FROM r_humanos_personal WHERE personal LIKE :campo;'
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
		<h2>PERSONAL POR CATEGORIA</h2>
		<div class="barra__buscador">
			<form action="" class="formulario" method="post">
				<input type="text" name="buscar" placeholder="Buscar Personal" 
				value="<?php if(isset($buscar_text)) echo $buscar_text; ?>" class="input__text">
				<input type="submit" class="btn" name="btn_buscar" value="Buscar">
				<a href="insert_r_humanos_personal.php" class="btn btn__nuevo">Nuevo Personal</a>
			</form>
		</div>
		<table>
			<tr class="head">
				<td>PERSONAL</td>
				<td>HOMBRES</td>
				<td>MUJERES</td>
				<td colspan="2">Acción</td>
			</tr>
			<?php foreach($resultado as $fila):?>
				<tr >
					<td><?php echo $fila['personal']; ?></td>
					<td><?php echo $fila['hombres']; ?></td>
					<td><?php echo $fila['mujeres']; ?></td>
					<td><a href="update_r_humanos_personal.php?id=<?php echo $fila['id']; ?>"  class="btn__update" >Editar</a></td>
					<td><a href="delete_r_humanos_personal.php?id=<?php echo $fila['id']; ?>" class="btn__delete">Eliminar</a></td>
				</tr>
			<?php endforeach ?>

		</table>
	</div>
<br><br>
<!--Segunda Tabla-->
<?php
	include_once 'conexion.php';

	$sentencia_select=$con->prepare('SELECT *FROM r_humanos_docentes ORDER BY id ASC');
	$sentencia_select->execute();
	$resultado=$sentencia_select->fetchAll();

	// metodo buscar
	if(isset($_POST['btn_buscar'])){
		$buscar_text=$_POST['buscar'];
		$select_buscar=$con->prepare('
			SELECT *FROM r_humanos_docentes WHERE docentes LIKE :campo;'
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
		<h2>DOCENTES</h2>
		<div class="barra__buscador">
			<form action="" class="formulario" method="post">
				<input type="text" name="buscar" placeholder="Buscar Docente" 
				value="<?php if(isset($buscar_text)) echo $buscar_text; ?>" class="input__text">
				<input type="submit" class="btn" name="btn_buscar" value="Buscar">
				<a href="insert_r_humanos_docente.php" class="btn btn__nuevo">Nuevo Docente</a>
			</form>
		</div>
		<table>
			<tr class="head">
				<td>DOCENTE</td>
				<td>HOMBRES</td>
				<td>MUJERES</td>
				<td colspan="2">Acción</td>
			</tr>
			<?php foreach($resultado as $fila):?>
				<tr >
					<td><?php echo $fila['docentes']; ?></td>
					<td><?php echo $fila['hombres']; ?></td>
					<td><?php echo $fila['mujeres']; ?></td>
					<td><a href="update_r_humanos_docente.php?id=<?php echo $fila['id']; ?>"  class="btn__update" >Editar</a></td>
					<td><a href="delete_r_humanos_docente.php?id=<?php echo $fila['id']; ?>" class="btn__delete">Eliminar</a></td>
				</tr>
			<?php endforeach ?>

		</table>
	</div>
<br><br>
<!--Tercera Tabla-->
<?php
	include_once 'conexion.php';

	$sentencia_select=$con->prepare('SELECT *FROM r_humanos_funcionarios ORDER BY id ASC');
	$sentencia_select->execute();
	$resultado=$sentencia_select->fetchAll();

	// metodo buscar
	if(isset($_POST['btn_buscar'])){
		$buscar_text=$_POST['buscar'];
		$select_buscar=$con->prepare('
			SELECT *FROM r_humanos_funcionarios WHERE funcionarios LIKE :campo;'
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
		<h2>FUNCIONARIOS DOCENTES</h2>
		<div class="barra__buscador">
			<form action="" class="formulario" method="post">
				<input type="text" name="buscar" placeholder="Buscar Funcionario" 
				value="<?php if(isset($buscar_text)) echo $buscar_text; ?>" class="input__text">
				<input type="submit" class="btn" name="btn_buscar" value="Buscar">
				<a href="insert_r_humanos_funcionario.php" class="btn btn__nuevo">Nuevo Funcionario</a>
			</form>
		</div>
		<table>
			<tr class="head">
				<td>FUNCIONARIO DOCENTE</td>
				<td>HOMBRES</td>
				<td>MUJERES</td>
				<td colspan="2">Acción</td>
			</tr>
			<?php foreach($resultado as $fila):?>
				<tr >
					<td><?php echo $fila['funcionarios']; ?></td>
					<td><?php echo $fila['hombres']; ?></td>
					<td><?php echo $fila['mujeres']; ?></td>
					<td><a href="update_r_humanos_funcionario.php?id=<?php echo $fila['id']; ?>"  class="btn__update" >Editar</a></td>
					<td><a href="delete_r_humanos_funcionario.php?id=<?php echo $fila['id']; ?>" class="btn__delete">Eliminar</a></td>
				</tr>
			<?php endforeach ?>

		</table>
	</div>
<br><br>
<!--Cuarta Tabla-->
<?php
	include_once 'conexion.php';

	$sentencia_select=$con->prepare('SELECT *FROM r_humanos_personal_cap ORDER BY id ASC');
	$sentencia_select->execute();
	$resultado=$sentencia_select->fetchAll();

	// metodo buscar
	if(isset($_POST['btn_buscar'])){
		$buscar_text=$_POST['buscar'];
		$select_buscar=$con->prepare('
			SELECT *FROM r_humanos_personal_cap WHERE capacitado LIKE :campo;'
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
		<h2>PERSONAL CAPACITADO</h2>
		<div class="barra__buscador">
			<form action="" class="formulario" method="post">
				<input type="text" name="buscar" placeholder="Buscar Personal Capacitado" 
				value="<?php if(isset($buscar_text)) echo $buscar_text; ?>" class="input__text">
				<input type="submit" class="btn" name="btn_buscar" value="Buscar">
				<a href="insert_r_humanos_capacitado.php" class="btn btn__nuevo">Nuevo Personal Capacitado</a>
			</form>
		</div>
		<table>
			<tr class="head">
				<td>PERSONAL CAPACITADO</td>
				<td>HOMBRES</td>
				<td>MUJERES</td>
				<td colspan="2">Acción</td>
			</tr>
			<?php foreach($resultado as $fila):?>
				<tr >
					<td><?php echo $fila['capacitado']; ?></td>
					<td><?php echo $fila['hombres']; ?></td>
					<td><?php echo $fila['mujeres']; ?></td>
					<td><a href="update_r_humanos_capacitado.php?id=<?php echo $fila['id']; ?>"  class="btn__update" >Editar</a></td>
					<td><a href="delete_r_humanos_capacitado.php?id=<?php echo $fila['id']; ?>" class="btn__delete">Eliminar</a></td>
				</tr>
			<?php endforeach ?>

		</table>
	</div>
<br><br>
<!--Quinta Tabla-->
<?php
	include_once 'conexion.php';

	$sentencia_select=$con->prepare('SELECT *FROM r_humanos_capacitacion ORDER BY id ASC');
	$sentencia_select->execute();
	$resultado=$sentencia_select->fetchAll();

	// metodo buscar
	if(isset($_POST['btn_buscar'])){
		$buscar_text=$_POST['buscar'];
		$select_buscar=$con->prepare('
			SELECT *FROM r_humanos_capacitacion WHERE capacitacion LIKE :campo;'
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
		<h2>CAPACITACION</h2>
		<div class="barra__buscador">
			<form action="" class="formulario" method="post">
				<input type="text" name="buscar" placeholder="Buscar Capacitacion" 
				value="<?php if(isset($buscar_text)) echo $buscar_text; ?>" class="input__text">
				<input type="submit" class="btn" name="btn_buscar" value="Buscar">
				<a href="insert_r_humanos_capacitacion.php" class="btn btn__nuevo">Nueva Capacitacion</a>
			</form>
		</div>
		<table>
			<tr class="head">
				<td>CAPACITACION</td>
				<td>NUMERO</td>
				<td colspan="2">Acción</td>
			</tr>
			<?php foreach($resultado as $fila):?>
				<tr >
					<td><?php echo $fila['capacitacion']; ?></td>
					<td><?php echo $fila['numero']; ?></td>
					<td><a href="update_r_humanos_capacitacion.php?id=<?php echo $fila['id']; ?>"  class="btn__update" >Editar</a></td>
					<td><a href="delete_r_humanos_capacitacion.php?id=<?php echo $fila['id']; ?>" class="btn__delete">Eliminar</a></td>
				</tr>
			<?php endforeach ?>

		</table>
	</div>
</body>
</html>