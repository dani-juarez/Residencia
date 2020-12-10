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

	$sentencia_select=$con->prepare('SELECT *FROM r_humanos ORDER BY id ASC');
	$sentencia_select->execute();
	$resultado=$sentencia_select->fetchAll();

	// metodo buscar
	if(isset($_POST['btn_buscar'])){
		$buscar_text=$_POST['buscar'];
		$select_buscar=$con->prepare('
			SELECT *FROM r_humanos WHERE prof_tiempo_completo LIKE :campo;'
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
		<h2>NUMERO DE PROFESORES - TIEMPO COMPLETO</h2>
		<div class="barra__buscador">
			<form action="" class="formulario" method="post">
				<input type="text" name="buscar" placeholder="Buscar Profesor" 
				value="<?php if(isset($buscar_text)) echo $buscar_text; ?>" class="input__text">
				<input type="submit" class="btn" name="btn_buscar" value="Buscar">
				<a href="insert_r_humanos.php" class="btn btn__nuevo">Nuevo Profesor</a>
			</form>
		</div>
		<table>
			<tr class="head">
				<td>TOTAL DE PROFESORES TIEMPO COMPLETO</td>
				<td>LICENCIATURA</td>
				<td>ESPECIALIDAD</td>
				<td>MAESTRIA (CON GRADO ACADEMICO)</td>
				<td>MAESTRIA (SIN GRADO ACADEMICO)</td>
                <td>DOCTORADO (CON GRADO ACADEMICO)</td>
                <td>DOCTORADO (SIN GRADO ACADEMICO)</td>
				<td colspan="2">Acción</td>
			</tr>
			<?php foreach($resultado as $fila):?>
				<tr >
					<td><?php echo $fila['prof_tiempo_completo']; ?></td>
					<td><?php echo $fila['licenciatura']; ?></td>
					<td><?php echo $fila['especialidad']; ?></td>
					<td><?php echo $fila['maestria']; ?></td>
					<td><?php echo $fila['maestria_s_a']; ?></td>
                    <td><?php echo $fila['doctorado']; ?></td>
                    <td><?php echo $fila['doctorado_s_a']; ?></td>
					<td><a href="update_r_humanos.php?id=<?php echo $fila['id']; ?>"  class="btn__update" >Editar</a></td>
					<td><a href="delete_r_humanos.php?id=<?php echo $fila['id']; ?>" class="btn__delete">Eliminar</a></td>
				</tr>
			<?php endforeach ?>

		</table>
	</div>
	<br><br>
<!--Segunda Tabla-->
<?php
	include_once 'conexion.php';

	$sentencia_select=$con->prepare('SELECT *FROM r_humanos_1 ORDER BY id ASC');
	$sentencia_select->execute();
	$resultado=$sentencia_select->fetchAll();

	// metodo buscar
	if(isset($_POST['btn_buscar'])){
		$buscar_text=$_POST['buscar'];
		$select_buscar=$con->prepare('
			SELECT *FROM r_humanos_1 WHERE prof_3/4_tiempo LIKE :campo;'
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
		<h2>NUMERO DE PROFESORES - 3/4 DE TIEMPO</h2>
		<div class="barra__buscador">
			<form action="" class="formulario" method="post">
				<input type="text" name="buscar" placeholder="Buscar Profesor" 
				value="<?php if(isset($buscar_text)) echo $buscar_text; ?>" class="input__text">
				<input type="submit" class="btn" name="btn_buscar" value="Buscar">
				<a href="insert_r_humanos_1.php" class="btn btn__nuevo">Nuevo Profesor</a>
			</form>
		</div>
		<table>
			<tr class="head">
				<td>TOTAL DE PROFESORES 3/4 DE TIEMPO</td>
				<td>LICENCIATURA</td>
				<td>ESPECIALIDAD</td>
				<td>MAESTRIA (CON GRADO ACADEMICO)</td>
				<td>MAESTRIA (SIN GRADO ACADEMICO)</td>
                <td>DOCTORADO (CON GRADO ACADEMICO)</td>
                <td>DOCTORADO (SIN GRADO ACADEMICO)</td>
				<td colspan="2">Acción</td>
			</tr>
			<?php foreach($resultado as $fila):?>
				<tr >
					<td><?php echo $fila['prof_trescuartos_tiempo']; ?></td>
					<td><?php echo $fila['licenciatura']; ?></td>
					<td><?php echo $fila['especialidad']; ?></td>
					<td><?php echo $fila['maestria']; ?></td>
					<td><?php echo $fila['maestria_s_a']; ?></td>
                    <td><?php echo $fila['doctorado']; ?></td>
                    <td><?php echo $fila['doctorado_s_a']; ?></td>
					<td><a href="update_r_humanos_1.php?id=<?php echo $fila['id']; ?>"  class="btn__update" >Editar</a></td>
					<td><a href="delete_r_humanos_1.php?id=<?php echo $fila['id']; ?>" class="btn__delete">Eliminar</a></td>
				</tr>
			<?php endforeach ?>

		</table>
	</div>
	<br><br>
<!--Tercera Tabla-->
<?php
	include_once 'conexion.php';

	$sentencia_select=$con->prepare('SELECT *FROM r_humanos_2 ORDER BY id ASC');
	$sentencia_select->execute();
	$resultado=$sentencia_select->fetchAll();

	// metodo buscar
	if(isset($_POST['btn_buscar'])){
		$buscar_text=$_POST['buscar'];
		$select_buscar=$con->prepare('
			SELECT *FROM r_humanos_2 WHERE prof_medio_tiempo LIKE :campo;'
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
		<h2>NUMERO DE PROFESORES - MEDIO TIEMPO</h2>
		<div class="barra__buscador">
			<form action="" class="formulario" method="post">
				<input type="text" name="buscar" placeholder="Buscar Profesor" 
				value="<?php if(isset($buscar_text)) echo $buscar_text; ?>" class="input__text">
				<input type="submit" class="btn" name="btn_buscar" value="Buscar">
				<a href="insert_r_humanos_2.php" class="btn btn__nuevo">Nuevo Profesor</a>
			</form>
		</div>
		<table>
			<tr class="head">
				<td>TOTAL DE PROFESORES MEDIO TIEMPO</td>
				<td>LICENCIATURA</td>
				<td>ESPECIALIDAD</td>
				<td>MAESTRIA (CON GRADO ACADEMICO)</td>
				<td>MAESTRIA (SIN GRADO ACADEMICO)</td>
                <td>DOCTORADO (CON GRADO ACADEMICO)</td>
                <td>DOCTORADO (SIN GRADO ACADEMICO)</td>
				<td colspan="2">Acción</td>
			</tr>
			<?php foreach($resultado as $fila):?>
				<tr >
					<td><?php echo $fila['prof_medio_tiempo']; ?></td>
					<td><?php echo $fila['licenciatura']; ?></td>
					<td><?php echo $fila['especialidad']; ?></td>
					<td><?php echo $fila['maestria']; ?></td>
					<td><?php echo $fila['maestria_s_a']; ?></td>
                    <td><?php echo $fila['doctorado']; ?></td>
                    <td><?php echo $fila['doctorado_s_a']; ?></td>
					<td><a href="update_r_humanos_2.php?id=<?php echo $fila['id']; ?>"  class="btn__update" >Editar</a></td>
					<td><a href="delete_r_humanos_2.php?id=<?php echo $fila['id']; ?>" class="btn__delete">Eliminar</a></td>
				</tr>
			<?php endforeach ?>

		</table>
	</div>
	<br><br>
<!--Cuarta Tabla-->
<?php
	include_once 'conexion.php';

	$sentencia_select=$con->prepare('SELECT *FROM r_humanos_3 ORDER BY id ASC');
	$sentencia_select->execute();
	$resultado=$sentencia_select->fetchAll();

	// metodo buscar
	if(isset($_POST['btn_buscar'])){
		$buscar_text=$_POST['buscar'];
		$select_buscar=$con->prepare('
			SELECT *FROM r_humanos_3 WHERE prof_hora_tiempo LIKE :campo;'
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
		<h2>NUMERO DE PROFESORES - HORAS ASIGNADAS</h2>
		<div class="barra__buscador">
			<form action="" class="formulario" method="post">
				<input type="text" name="buscar" placeholder="Buscar Profesor" 
				value="<?php if(isset($buscar_text)) echo $buscar_text; ?>" class="input__text">
				<input type="submit" class="btn" name="btn_buscar" value="Buscar">
				<a href="insert_r_humanos_3.php" class="btn btn__nuevo">Nuevo Profesor</a>
			</form>
		</div>
		<table>
			<tr class="head">
				<td>TOTAL DE PROFESORES HORAS ASIGNADAS</td>
				<td>LICENCIATURA</td>
				<td>ESPECIALIDAD</td>
				<td>MAESTRIA (CON GRADO ACADEMICO)</td>
				<td>MAESTRIA (SIN GRADO ACADEMICO)</td>
                <td>DOCTORADO (CON GRADO ACADEMICO)</td>
                <td>DOCTORADO (SIN GRADO ACADEMICO)</td>
				<td colspan="2">Acción</td>
			</tr>
			<?php foreach($resultado as $fila):?>
				<tr >
					<td><?php echo $fila['prof_hora_tiempo']; ?></td>
					<td><?php echo $fila['licenciatura']; ?></td>
					<td><?php echo $fila['especialidad']; ?></td>
					<td><?php echo $fila['maestria']; ?></td>
					<td><?php echo $fila['maestria_s_a']; ?></td>
                    <td><?php echo $fila['doctorado']; ?></td>
                    <td><?php echo $fila['doctorado_s_a']; ?></td>
					<td><a href="update_r_humanos_3.php?id=<?php echo $fila['id']; ?>"  class="btn__update" >Editar</a></td>
					<td><a href="delete_r_humanos_3.php?id=<?php echo $fila['id']; ?>" class="btn__delete">Eliminar</a></td>
				</tr>
			<?php endforeach ?>

		</table>
	</div>
	<br><br>
<!--Quinta Tabla-->
<?php
	include_once 'conexion.php';

	$sentencia_select=$con->prepare('SELECT *FROM r_humanos_funciones ORDER BY id ASC');
	$sentencia_select->execute();
	$resultado=$sentencia_select->fetchAll();

	// metodo buscar
	if(isset($_POST['btn_buscar'])){
		$buscar_text=$_POST['buscar'];
		$select_buscar=$con->prepare('
			SELECT *FROM r_humanos_funciones WHERE estudios LIKE :campo;'
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
		<h2>FUNCIONES PROFESORES</h2>
		<div class="barra__buscador">
			<form action="" class="formulario" method="post">
				<input type="text" name="buscar" placeholder="Buscar Grado Maximo de Estudios" 
				value="<?php if(isset($buscar_text)) echo $buscar_text; ?>" class="input__text">
				<input type="submit" class="btn" name="btn_buscar" value="Buscar">
				<a href="insert_r_humanos_funciones.php" class="btn btn__nuevo">Nuevo Grado</a>
			</form>
		</div>
		<table>
			<tr class="head">
				<td>GRADO MAXIMO DE ESTUDIOS</td>
				<td colspan="2">SERVICIOS</td>
				<td colspan="2">ADMINISTRATIVAS</td>
				<td colspan="2">ANALISTAS</td>
				<td colspan="2">DOCENCIA</td>
                <td colspan="3">TOTALES</td>
				<td colspan="2">Acción</td>
			</tr>

			<tr class="head">
				<td></td>
				<td>HOMBRES</td>
				<td>MUJERES</td>
				<td>HOMBRES</td>
				<td>MUJERES</td>
				<td>HOMBRES</td>
				<td>MUJERES</td>
				<td>HOMBRES</td>
				<td>MUJERES</td>
				<td>HOMBRES</td>
				<td>MUJERES</td>
				<td>TOTAL</td>
				<td></td>
				<td></td>
			</tr>

			<?php foreach($resultado as $fila):?>
				<tr >
					<td><?php echo $fila['estudios']; ?></td>
					<td><?php echo $fila['hombres_servicio']; ?></td>
					<td><?php echo $fila['mujeres_servicio']; ?></td>
					<td><?php echo $fila['hombres_administrativas']; ?></td>
					<td><?php echo $fila['mujeres_administrativas']; ?></td>
                    <td><?php echo $fila['hombres_analistas']; ?></td>
					<td><?php echo $fila['mujeres_analistas']; ?></td>
					<td><?php echo $fila['hombres_docencia']; ?></td>
					<td><?php echo $fila['mujeres_docencia']; ?></td>
					<td><?php echo $fila['hombres_total']; ?></td>
					<td><?php echo $fila['mujeres_total']; ?></td>
					<td><?php echo $fila['total']; ?></td>
					<td><a href="update_r_humanos_funciones.php?id=<?php echo $fila['id']; ?>"  class="btn__update" >Editar</a></td>
					<td><a href="delete_r_humanos_funciones.php?id=<?php echo $fila['id']; ?>" class="btn__delete">Eliminar</a></td>
				</tr>
			<?php endforeach ?>

		</table>
	</div>
	<br><br>
<!--Sexta Tabla-->
<?php
	include_once 'conexion.php';

	$sentencia_select=$con->prepare('SELECT *FROM r_humanos_total ORDER BY id ASC');
	$sentencia_select->execute();
	$resultado=$sentencia_select->fetchAll();

	// metodo buscar
	if(isset($_POST['btn_buscar'])){
		$buscar_text=$_POST['buscar'];
		$select_buscar=$con->prepare('
			SELECT *FROM r_humanos_total WHERE tipo LIKE :campo;'
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
		<h2>TOTAL PROFESORES</h2>
		<div class="barra__buscador">
			<form action="" class="formulario" method="post">
				<input type="text" name="buscar" placeholder="Buscar Tipo" 
				value="<?php if(isset($buscar_text)) echo $buscar_text; ?>" class="input__text">
				<input type="submit" class="btn" name="btn_buscar" value="Buscar">
				<a href="insert_r_humanos_total.php" class="btn btn__nuevo">Nuevo Tipo</a>
			</form>
		</div>
		<table>
			<tr class="head">
				<td>TIPO DE</td>
				<td colspan="2">MENOS DE 20</td>
				<td colspan="2">20 A 24</td>
				<td colspan="2">25 A 29</td>
				<td colspan="2">30 A 34</td>
                <td colspan="2">35 A 39</td>
				<td colspan="2">40 A 44</td>
				<td colspan="2">45 A 49</td>
				<td colspan="2">50 A 54</td>
				<td colspan="2">55 A 59</td>
				<td colspan="2">60 A 64</td>
				<td colspan="2">65 O MAS</td>
				<td colspan="3">TOTAL</td>
				<td colspan="2">Acción</td>
			</tr>

			<tr class="head">
				<td></td>
				<td>H</td>
				<td>M</td>
				<td>H</td>
				<td>M</td>
				<td>H</td>
				<td>M</td>
				<td>H</td>
				<td>M</td>
				<td>H</td>
				<td>M</td>
				<td>H</td>
				<td>M</td>
				<td>H</td>
				<td>M</td>
				<td>H</td>
				<td>M</td>
				<td>H</td>
				<td>M</td>
				<td>H</td>
				<td>M</td>
				<td>H</td>
				<td>M</td>
				<td>H TOTAL</td>
				<td>M TOTAL</td>
				<td>TOTAL</td>
				<td></td>
				<td></td>
			</tr>

			<?php foreach($resultado as $fila):?>
				<tr >
					<td><?php echo $fila['tipo']; ?></td>
					<td><?php echo $fila['hombres_20']; ?></td>
					<td><?php echo $fila['mujeres_20']; ?></td>
					<td><?php echo $fila['hombres_24']; ?></td>
					<td><?php echo $fila['mujeres_24']; ?></td>
                    <td><?php echo $fila['hombres_29']; ?></td>
					<td><?php echo $fila['mujeres_29']; ?></td>
					<td><?php echo $fila['hombres_34']; ?></td>
					<td><?php echo $fila['mujeres_34']; ?></td>
					<td><?php echo $fila['hombres_39']; ?></td>
					<td><?php echo $fila['mujeres_39']; ?></td>
					<td><?php echo $fila['hombres_44']; ?></td>
					<td><?php echo $fila['mujeres_44']; ?></td>
					<td><?php echo $fila['hombres_49']; ?></td>
					<td><?php echo $fila['mujeres_49']; ?></td>
					<td><?php echo $fila['hombres_54']; ?></td>
					<td><?php echo $fila['mujeres_54']; ?></td>
					<td><?php echo $fila['hombres_59']; ?></td>
					<td><?php echo $fila['mujeres_59']; ?></td>
					<td><?php echo $fila['hombres_64']; ?></td>
					<td><?php echo $fila['mujeres_64']; ?></td>
					<td><?php echo $fila['hombres_65']; ?></td>
					<td><?php echo $fila['mujeres_65']; ?></td>
					<td><?php echo $fila['hombres_total']; ?></td>
					<td><?php echo $fila['mujeres_total']; ?></td>
					<td><?php echo $fila['total']; ?></td>
					<td><a href="update_r_humanos_total.php?id=<?php echo $fila['id']; ?>"  class="btn__update" >Editar</a></td>
					<td><a href="delete_r_humanos_total.php?id=<?php echo $fila['id']; ?>" class="btn__delete">Eliminar</a></td>
				</tr>
			<?php endforeach ?>

		</table>
	</div>
</body>
</html>