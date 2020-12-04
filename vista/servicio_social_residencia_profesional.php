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

	$sentencia_select=$con->prepare('SELECT *FROM servicio_social ORDER BY id ASC');
	$sentencia_select->execute();
	$resultado=$sentencia_select->fetchAll();

	// metodo buscar
	if(isset($_POST['btn_buscar'])){
		$buscar_text=$_POST['buscar'];
		$select_buscar=$con->prepare('
			SELECT *FROM servicio_social WHERE programa LIKE :campo;'
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
		<h2>SERVICIO SOCIAL <br> AGOSTO - DICIEMBRE</h2>
		<div class="barra__buscador">
			<form action="" class="formulario" method="post">
				<input type="text" name="buscar" placeholder="Buscar Programa" 
				value="<?php if(isset($buscar_text)) echo $buscar_text; ?>" class="input__text">
				<input type="submit" class="btn" name="btn_buscar" value="Buscar">
				<a href="insert_ss.php" class="btn btn__nuevo">Nuevo Programa</a>
			</form>
		</div>
		<table>
			<tr class="head">
				<td>PROGRAMA</td>
				<td>MODALIDAD</td>
				<td colspan="2">SOLICITANTES</td>
				<td colspan="2">ACEPTADOS</td>
				<td colspan="2">Acción</td>
            </tr>
            
            <tr class="head">
				<td></td>
				<td></td>
				<td>HOMBRES</td>
                <td>MUJERES</td>
                <td>HOMBRES</td>
				<td>MUJERES</td>
                <td></td>
                <td></td>
			</tr>

			<?php foreach($resultado as $fila):?>
				<tr >
					<td><?php echo $fila['programa']; ?></td>
					<td><?php echo $fila['modalidad']; ?></td>
					<td><?php echo $fila['hombres_solicitantes']; ?></td>
					<td><?php echo $fila['mujeres_solicitantes']; ?></td>
					<td><?php echo $fila['hombres_aceptados']; ?></td>
					<td><?php echo $fila['mujeres_aceptados']; ?></td>
					<td><a href="update_ss.php?id=<?php echo $fila['id']; ?>"  class="btn__update" >Editar</a></td>
					<td><a href="delete_ss.php?id=<?php echo $fila['id']; ?>" class="btn__delete">Eliminar</a></td>
				</tr>
			<?php endforeach ?>

		</table>
	</div>
	<br><br>
										<!--Servicio Social Empresas Agosto - Diciembre-->
<?php
	include_once 'conexion.php';

	$sentencia_select=$con->prepare('SELECT *FROM servicio_social_empresas ORDER BY id ASC');
	$sentencia_select->execute();
	$resultado=$sentencia_select->fetchAll();

	// metodo buscar
	if(isset($_POST['btn_buscar'])){
		$buscar_text=$_POST['buscar'];
		$select_buscar=$con->prepare('
			SELECT *FROM servicio_social_empresas WHERE empresas LIKE :campo;'
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
		<h2>SERVICIO SOCIAL EMPRESAS <br> AGOSTO - DICIEMBRE</h2>
		<div class="barra__buscador">
			<form action="" class="formulario" method="post">
				<input type="text" name="buscar" placeholder="Buscar Empresa" 
				value="<?php if(isset($buscar_text)) echo $buscar_text; ?>" class="input__text">
				<input type="submit" class="btn" name="btn_buscar" value="Buscar">
				<a href="insert_ss_empresas.php" class="btn btn__nuevo">Nueva Empresa</a>
			</form>
		</div>
		<table>
			<tr class="head">
				<td>EMPRESAS PARTICIPANTES</td>
				<td>HOMBRES</td>
				<td>MUJERES</td>
				<td>TOTAL HOMBRES</td>
				<td>TOTAL MUJERES</td>
				<td>TOTAL</td>
				<td colspan="2">Acción</td>
            </tr>

			<?php foreach($resultado as $fila):?>
				<tr >
					<td><?php echo $fila['empresas']; ?></td>
					<td><?php echo $fila['hombres']; ?></td>
					<td><?php echo $fila['mujeres']; ?></td>
					<td><?php echo $fila['hombres_total']; ?></td>
					<td><?php echo $fila['mujeres_total']; ?></td>
					<td><?php echo $fila['total']; ?></td>
					<td><a href="update_ss_empresas.php?id=<?php echo $fila['id']; ?>"  class="btn__update" >Editar</a></td>
					<td><a href="delete_ss_empresas.php?id=<?php echo $fila['id']; ?>" class="btn__delete">Eliminar</a></td>
				</tr>
			<?php endforeach ?>

		</table>
	</div>
	<br><br>
														<!--Tercera Tabla-->
<?php
	include_once 'conexion.php';

	$sentencia_select=$con->prepare('SELECT *FROM servicio_social2 ORDER BY id ASC');
	$sentencia_select->execute();
	$resultado=$sentencia_select->fetchAll();

	// metodo buscar
	if(isset($_POST['btn_buscar'])){
		$buscar_text=$_POST['buscar'];
		$select_buscar=$con->prepare('
			SELECT *FROM servicio_social2 WHERE programa LIKE :campo;'
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
		<h2>SERVICIO SOCIAL <br> ENERO - JUNIO</h2>
		<div class="barra__buscador">
			<form action="" class="formulario" method="post">
				<input type="text" name="buscar" placeholder="Buscar Programa" 
				value="<?php if(isset($buscar_text)) echo $buscar_text; ?>" class="input__text">
				<input type="submit" class="btn" name="btn_buscar" value="Buscar">
				<a href="insert_ss2.php" class="btn btn__nuevo">Nuevo Programa</a>
			</form>
		</div>
		<table>
			<tr class="head">
				<td>PROGRAMA</td>
				<td>MODALIDAD</td>
				<td colspan="2">SOLICITANTES</td>
				<td colspan="2">ACEPTADOS</td>
				<td colspan="2">Acción</td>
            </tr>
            
            <tr class="head">
				<td></td>
				<td></td>
				<td>HOMBRES</td>
                <td>MUJERES</td>
                <td>HOMBRES</td>
				<td>MUJERES</td>
                <td></td>
                <td></td>
			</tr>

			<?php foreach($resultado as $fila):?>
				<tr >
					<td><?php echo $fila['programa']; ?></td>
					<td><?php echo $fila['modalidad']; ?></td>
					<td><?php echo $fila['hombres_solicitantes']; ?></td>
					<td><?php echo $fila['mujeres_solicitantes']; ?></td>
					<td><?php echo $fila['hombres_aceptados']; ?></td>
					<td><?php echo $fila['mujeres_aceptados']; ?></td>
					<td><a href="update_ss2.php?id=<?php echo $fila['id']; ?>"  class="btn__update" >Editar</a></td>
					<td><a href="delete_ss2.php?id=<?php echo $fila['id']; ?>" class="btn__delete">Eliminar</a></td>
				</tr>
			<?php endforeach ?>

		</table>
	</div>
	<br><br>
											<!--Servicio Social Empresas Enero - Junio-->
<?php
	include_once 'conexion.php';

	$sentencia_select=$con->prepare('SELECT *FROM servicio_social_empresas2 ORDER BY id ASC');
	$sentencia_select->execute();
	$resultado=$sentencia_select->fetchAll();

	// metodo buscar
	if(isset($_POST['btn_buscar'])){
		$buscar_text=$_POST['buscar'];
		$select_buscar=$con->prepare('
			SELECT *FROM servicio_social_empresas2 WHERE empresas LIKE :campo;'
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
		<h2>SERVICIO SOCIAL EMPRESAS <br> ENERO - JUNIO</h2>
		<div class="barra__buscador">
			<form action="" class="formulario" method="post">
				<input type="text" name="buscar" placeholder="Buscar Empresa" 
				value="<?php if(isset($buscar_text)) echo $buscar_text; ?>" class="input__text">
				<input type="submit" class="btn" name="btn_buscar" value="Buscar">
				<a href="insert_ss_empresas2.php" class="btn btn__nuevo">Nueva Empresa</a>
			</form>
		</div>
		<table>
			<tr class="head">
				<td>EMPRESAS PARTICIPANTES</td>
				<td>HOMBRES</td>
				<td>MUJERES</td>
				<td>TOTAL HOMBRES</td>
				<td>TOTAL MUJERES</td>
				<td>TOTAL</td>
				<td colspan="2">Acción</td>
            </tr>

			<?php foreach($resultado as $fila):?>
				<tr >
					<td><?php echo $fila['empresas']; ?></td>
					<td><?php echo $fila['hombres']; ?></td>
					<td><?php echo $fila['mujeres']; ?></td>
					<td><?php echo $fila['hombres_total']; ?></td>
					<td><?php echo $fila['mujeres_total']; ?></td>
					<td><?php echo $fila['total']; ?></td>
					<td><a href="update_ss_empresas2.php?id=<?php echo $fila['id']; ?>"  class="btn__update" >Editar</a></td>
					<td><a href="delete_ss_empresas2.php?id=<?php echo $fila['id']; ?>" class="btn__delete">Eliminar</a></td>
				</tr>
			<?php endforeach ?>

		</table>
	</div>
	<br><br>
													<!--Residencia Profesional-->
<?php
	include_once 'conexion.php';

	$sentencia_select=$con->prepare('SELECT *FROM residencia_profesional ORDER BY id ASC');
	$sentencia_select->execute();
	$resultado=$sentencia_select->fetchAll();

	// metodo buscar
	if(isset($_POST['btn_buscar'])){
		$buscar_text=$_POST['buscar'];
		$select_buscar=$con->prepare('
			SELECT *FROM residencia_profesional WHERE programa LIKE :campo;'
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
		<h2>RESIDENCIA PROFESIONAL <br> AGOSTO - DICIEMBRE</h2>
		<div class="barra__buscador">
			<form action="" class="formulario" method="post">
				<input type="text" name="buscar" placeholder="Buscar Programa" 
				value="<?php if(isset($buscar_text)) echo $buscar_text; ?>" class="input__text">
				<input type="submit" class="btn" name="btn_buscar" value="Buscar">
				<a href="insert_residencia_profesional.php" class="btn btn__nuevo">Nuevo Programa</a>
			</form>
		</div>
		<table>
			<tr class="head">
				<td>PROGRAMA</td>
				<td>MODALIDAD</td>
				<td colspan="2">SOLICITANTES</td>
				<td colspan="2">ACEPTADOS</td>
				<td colspan="2">Acción</td>
            </tr>
            
            <tr class="head">
				<td></td>
				<td></td>
				<td>HOMBRES</td>
                <td>MUJERES</td>
                <td>HOMBRES</td>
				<td>MUJERES</td>
                <td></td>
                <td></td>
			</tr>

			<?php foreach($resultado as $fila):?>
				<tr >
					<td><?php echo $fila['programa']; ?></td>
					<td><?php echo $fila['modalidad']; ?></td>
					<td><?php echo $fila['hombres_solicitantes']; ?></td>
					<td><?php echo $fila['mujeres_solicitantes']; ?></td>
					<td><?php echo $fila['hombres_aceptados']; ?></td>
					<td><?php echo $fila['mujeres_aceptados']; ?></td>
					<td><a href="update_residencia_profesional.php?id=<?php echo $fila['id']; ?>"  class="btn__update" >Editar</a></td>
					<td><a href="delete_residencia_profesional.php?id=<?php echo $fila['id']; ?>" class="btn__delete">Eliminar</a></td>
				</tr>
			<?php endforeach ?>

		</table>
	</div>
	<br><br>
													<!--Residencia Profesional Empresas-->
<?php
	include_once 'conexion.php';

	$sentencia_select=$con->prepare('SELECT *FROM residencia_profesional_empresas ORDER BY id ASC');
	$sentencia_select->execute();
	$resultado=$sentencia_select->fetchAll();

	// metodo buscar
	if(isset($_POST['btn_buscar'])){
		$buscar_text=$_POST['buscar'];
		$select_buscar=$con->prepare('
			SELECT *FROM residencia_profesional_empresas WHERE empresas LIKE :campo;'
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
		<h2>RESIDENCIA PROFESIONAL EMPRESAS <br> AGOSTO - DICIEMBRE</h2>
		<div class="barra__buscador">
			<form action="" class="formulario" method="post">
				<input type="text" name="buscar" placeholder="Buscar Empresa" 
				value="<?php if(isset($buscar_text)) echo $buscar_text; ?>" class="input__text">
				<input type="submit" class="btn" name="btn_buscar" value="Buscar">
				<a href="insert_residencia_profesional_empresas.php" class="btn btn__nuevo">Nueva Empresa</a>
			</form>
		</div>
		<table>
			<tr class="head">
				<td>EMPRESAS PARTICIPANTES</td>
				<td>NOMBRE PROYECTO</td>
				<td>AÑO DE CREACION EMPRESA</td>
				<td>TOTAL HOMBRES</td>
				<td>TOTAL MUJERES</td>
				<td>TOTAL</td>
				<td colspan="2">Acción</td>
            </tr>

			<?php foreach($resultado as $fila):?>
				<tr >
					<td><?php echo $fila['empresas']; ?></td>
					<td><?php echo $fila['nombre_proyecto']; ?></td>
					<td><?php echo $fila['creacion']; ?></td>
					<td><?php echo $fila['hombres_total']; ?></td>
					<td><?php echo $fila['mujeres_total']; ?></td>
					<td><?php echo $fila['total']; ?></td>
					<td><a href="update_residencia_profesional_empresas.php?id=<?php echo $fila['id']; ?>"  class="btn__update" >Editar</a></td>
					<td><a href="delete_residencia_profesional_empresas.php?id=<?php echo $fila['id']; ?>" class="btn__delete">Eliminar</a></td>
				</tr>
			<?php endforeach ?>

		</table>
	</div>
	<br><br>
													<!--Segunda Tabla Residencia Profesional-->
<?php
	include_once 'conexion.php';

	$sentencia_select=$con->prepare('SELECT *FROM residencia_profesional2 ORDER BY id ASC');
	$sentencia_select->execute();
	$resultado=$sentencia_select->fetchAll();

	// metodo buscar
	if(isset($_POST['btn_buscar'])){
		$buscar_text=$_POST['buscar'];
		$select_buscar=$con->prepare('
			SELECT *FROM residencia_profesional2 WHERE programa LIKE :campo;'
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
		<h2>RESIDENCIA PROFESIONAL <br> ENERO - JUNIO</h2>
		<div class="barra__buscador">
			<form action="" class="formulario" method="post">
				<input type="text" name="buscar" placeholder="Buscar Programa" 
				value="<?php if(isset($buscar_text)) echo $buscar_text; ?>" class="input__text">
				<input type="submit" class="btn" name="btn_buscar" value="Buscar">
				<a href="insert_residencia_profesional2.php" class="btn btn__nuevo">Nuevo Programa</a>
			</form>
		</div>
		<table>
			<tr class="head">
				<td>PROGRAMA</td>
				<td>MODALIDAD</td>
				<td colspan="2">SOLICITANTES</td>
				<td colspan="2">ACEPTADOS</td>
				<td colspan="2">Acción</td>
            </tr>
            
            <tr class="head">
				<td></td>
				<td></td>
				<td>HOMBRES</td>
                <td>MUJERES</td>
                <td>HOMBRES</td>
				<td>MUJERES</td>
                <td></td>
                <td></td>
			</tr>

			<?php foreach($resultado as $fila):?>
				<tr >
					<td><?php echo $fila['programa']; ?></td>
					<td><?php echo $fila['modalidad']; ?></td>
					<td><?php echo $fila['hombres_solicitantes']; ?></td>
					<td><?php echo $fila['mujeres_solicitantes']; ?></td>
					<td><?php echo $fila['hombres_aceptados']; ?></td>
					<td><?php echo $fila['mujeres_aceptados']; ?></td>
					<td><a href="update_residencia_profesional2.php?id=<?php echo $fila['id']; ?>"  class="btn__update" >Editar</a></td>
					<td><a href="delete_residencia_profesional2.php?id=<?php echo $fila['id']; ?>" class="btn__delete">Eliminar</a></td>
				</tr>
			<?php endforeach ?>

		</table>
	</div>
	<br><br>
												<!--Segunda Residencia Profesional Empresas-->
<?php
	include_once 'conexion.php';

	$sentencia_select=$con->prepare('SELECT *FROM residencia_profesional_empresas2 ORDER BY id ASC');
	$sentencia_select->execute();
	$resultado=$sentencia_select->fetchAll();

	// metodo buscar
	if(isset($_POST['btn_buscar'])){
		$buscar_text=$_POST['buscar'];
		$select_buscar=$con->prepare('
			SELECT *FROM residencia_profesional_empresas2 WHERE empresas LIKE :campo;'
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
		<h2>RESIDENCIA PROFESIONAL EMPRESAS <br> ENERO - JUNIO</h2>
		<div class="barra__buscador">
			<form action="" class="formulario" method="post">
				<input type="text" name="buscar" placeholder="Buscar Empresa" 
				value="<?php if(isset($buscar_text)) echo $buscar_text; ?>" class="input__text">
				<input type="submit" class="btn" name="btn_buscar" value="Buscar">
				<a href="insert_residencia_profesional_empresas2.php" class="btn btn__nuevo">Nueva Empresa</a>
			</form>
		</div>
		<table>
			<tr class="head">
				<td>EMPRESAS PARTICIPANTES</td>
				<td>NOMBRE PROYECTO</td>
				<td>AÑO DE CREACION EMPRESA</td>
				<td>TOTAL HOMBRES</td>
				<td>TOTAL MUJERES</td>
				<td>TOTAL</td>
				<td colspan="2">Acción</td>
            </tr>

			<?php foreach($resultado as $fila):?>
				<tr >
					<td><?php echo $fila['empresas']; ?></td>
					<td><?php echo $fila['nombre_proyecto']; ?></td>
					<td><?php echo $fila['creacion']; ?></td>
					<td><?php echo $fila['hombres_total']; ?></td>
					<td><?php echo $fila['mujeres_total']; ?></td>
					<td><?php echo $fila['total']; ?></td>
					<td><a href="update_residencia_profesional_empresas2.php?id=<?php echo $fila['id']; ?>"  class="btn__update" >Editar</a></td>
					<td><a href="delete_residencia_profesional_empresas2.php?id=<?php echo $fila['id']; ?>" class="btn__delete">Eliminar</a></td>
				</tr>
			<?php endforeach ?>

		</table>
	</div>
</body>
</html>