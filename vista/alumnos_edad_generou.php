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

	$sentencia_select=$con->prepare('SELECT *FROM gestion_empresarial ORDER BY id ASC');
	$sentencia_select->execute();
	$resultado=$sentencia_select->fetchAll();

	// metodo buscar
	if(isset($_POST['btn_buscar'])){
		$buscar_text=$_POST['buscar'];
		$select_buscar=$con->prepare('
			SELECT *FROM gestion_empresarial WHERE edad LIKE :campo;'
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
		<h2>INGENIERIA EN GESTION EMPRESARIAL <br> AGOSTO - DICIEMBRE</h2>
		<div class="barra__buscador">
			<form action="" class="formulario" method="post">
				<input type="text" name="buscar" placeholder="Buscar por Edad" 
				value="<?php if(isset($buscar_text)) echo $buscar_text; ?>" class="input__text">
				<input type="submit" class="btn" name="btn_buscar" value="Buscar">
				<a href="insert_gestion.php" class="btn btn__nuevo">Nuevo</a>
			</form>
		</div>
		<table>
			<tr class="head">
				<td>EDAD</td>
				<td>HOMBRES</td>
				<td>MUJERES</td>
				<td colspan="2">CON DISCAPACIDAD</td>
				<td colspan="3">TOTAL</td>
				<td colspan="2">Acción</td>
            </tr>
            
            <tr class="head">
				<td></td>
				<td></td>
				<td></td>
				<td>HOMBRES</td>
				<td>MUJERES</td>
                <td>TOTAL HOMBRES</td>
                <td>TOTAL MUJERES</td>
                <td>TOTAL</td>
                <td></td>
                <td></td>
			</tr>

			<?php foreach($resultado as $fila):?>
				<tr >
					<td><?php echo $fila['edad']; ?></td>
					<td><?php echo $fila['hombres']; ?></td>
					<td><?php echo $fila['mujeres']; ?></td>
					<td><?php echo $fila['hombres_dis']; ?></td>
					<td><?php echo $fila['mujeres_dis']; ?></td>
                    <td><?php echo $fila['hombres_total']; ?></td>
                    <td><?php echo $fila['mujeres_total']; ?></td>
                    <td><?php echo $fila['total']; ?></td>
					<td><a href="update_gestion.php?id=<?php echo $fila['id']; ?>"  class="btn__update" >Editar</a></td>
					<td><a href="delete_gestion.php?id=<?php echo $fila['id']; ?>" class="btn__delete">Eliminar</a></td>
				</tr>
			<?php endforeach ?>

		</table>
    </div>
<br><br>
                                                <!--Segunda Tabla-->
<?php
	include_once 'conexion.php';

	$sentencia_select=$con->prepare('SELECT *FROM tics ORDER BY id ASC');
	$sentencia_select->execute();
	$resultado=$sentencia_select->fetchAll();

	// metodo buscar
	if(isset($_POST['btn_buscar'])){
		$buscar_text=$_POST['buscar'];
		$select_buscar=$con->prepare('
			SELECT *FROM tics WHERE edad LIKE :campo;'
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
		<h2>INGENIERIA EN TECNOLOGIAS DE LA INFORMACION Y COMUNICACION <br> AGOSTO - DICIEMBRE</h2>
		<div class="barra__buscador">
			<form action="" class="formulario" method="post">
				<input type="text" name="buscar" placeholder="Buscar por Edad" 
				value="<?php if(isset($buscar_text)) echo $buscar_text; ?>" class="input__text">
				<input type="submit" class="btn" name="btn_buscar" value="Buscar">
				<a href="insert_tics.php" class="btn btn__nuevo">Nuevo</a>
			</form>
		</div>
		<table>
			<tr class="head">
				<td>EDAD</td>
				<td>HOMBRES</td>
				<td>MUJERES</td>
				<td colspan="2">CON DISCAPACIDAD</td>
				<td colspan="3">TOTAL</td>
				<td colspan="2">Acción</td>
            </tr>
            
            <tr class="head">
				<td></td>
				<td></td>
				<td></td>
				<td>HOMBRES</td>
				<td>MUJERES</td>
                <td>TOTAL HOMBRES</td>
                <td>TOTAL MUJERES</td>
                <td>TOTAL</td>
                <td></td>
                <td></td>
			</tr>

			<?php foreach($resultado as $fila):?>
				<tr >
					<td><?php echo $fila['edad']; ?></td>
					<td><?php echo $fila['hombres']; ?></td>
					<td><?php echo $fila['mujeres']; ?></td>
					<td><?php echo $fila['hombres_dis']; ?></td>
					<td><?php echo $fila['mujeres_dis']; ?></td>
                    <td><?php echo $fila['hombres_total']; ?></td>
                    <td><?php echo $fila['mujeres_total']; ?></td>
                    <td><?php echo $fila['total']; ?></td>
					<td><a href="update_tics.php?id=<?php echo $fila['id']; ?>"  class="btn__update" >Editar</a></td>
					<td><a href="delete_tics.php?id=<?php echo $fila['id']; ?>" class="btn__delete">Eliminar</a></td>
				</tr>
			<?php endforeach ?>

		</table>
    </div>
<br><br>
                                            <!--Tercera Tabla-->
<?php
	include_once 'conexion.php';

	$sentencia_select=$con->prepare('SELECT *FROM diseño ORDER BY id ASC');
	$sentencia_select->execute();
	$resultado=$sentencia_select->fetchAll();

	// metodo buscar
	if(isset($_POST['btn_buscar'])){
		$buscar_text=$_POST['buscar'];
		$select_buscar=$con->prepare('
			SELECT *FROM diseño WHERE edad LIKE :campo;'
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
		<h2>INGENIERIA EN DISEÑO INDUSTRIAL <br> AGOSTO - DICIEMBRE</h2>
		<div class="barra__buscador">
			<form action="" class="formulario" method="post">
				<input type="text" name="buscar" placeholder="Buscar por Edad" 
				value="<?php if(isset($buscar_text)) echo $buscar_text; ?>" class="input__text">
				<input type="submit" class="btn" name="btn_buscar" value="Buscar">
				<a href="insert_diseño.php" class="btn btn__nuevo">Nuevo</a>
			</form>
		</div>
		<table>
			<tr class="head">
				<td>EDAD</td>
				<td>HOMBRES</td>
				<td>MUJERES</td>
				<td colspan="2">CON DISCAPACIDAD</td>
				<td colspan="3">TOTAL</td>
				<td colspan="2">Acción</td>
            </tr>
            
            <tr class="head">
				<td></td>
				<td></td>
				<td></td>
				<td>HOMBRES</td>
				<td>MUJERES</td>
                <td>TOTAL HOMBRES</td>
                <td>TOTAL MUJERES</td>
                <td>TOTAL</td>
                <td></td>
                <td></td>
			</tr>

			<?php foreach($resultado as $fila):?>
				<tr >
					<td><?php echo $fila['edad']; ?></td>
					<td><?php echo $fila['hombres']; ?></td>
					<td><?php echo $fila['mujeres']; ?></td>
					<td><?php echo $fila['hombres_dis']; ?></td>
					<td><?php echo $fila['mujeres_dis']; ?></td>
                    <td><?php echo $fila['hombres_total']; ?></td>
                    <td><?php echo $fila['mujeres_total']; ?></td>
                    <td><?php echo $fila['total']; ?></td>
					<td><a href="update_diseño.php?id=<?php echo $fila['id']; ?>"  class="btn__update" >Editar</a></td>
					<td><a href="delete_diseño.php?id=<?php echo $fila['id']; ?>" class="btn__delete">Eliminar</a></td>
				</tr>
			<?php endforeach ?>

		</table>
    </div>
<br><br>
                                        <!--Alumnos Edad Genero-->
<?php
	include_once 'conexion.php';

	$sentencia_select=$con->prepare('SELECT *FROM alumnos_edad_genero ORDER BY id ASC');
	$sentencia_select->execute();
	$resultado=$sentencia_select->fetchAll();

	// metodo buscar
	if(isset($_POST['btn_buscar'])){
		$buscar_text=$_POST['buscar'];
		$select_buscar=$con->prepare('
			SELECT *FROM alumnos_edad_genero WHERE programa LIKE :campo;'
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
		<h2>ALUMNOS, EDAD, GENERO <br> AGOSTO - DICIEMBRE</h2>
		<div class="barra__buscador">
			<form action="" class="formulario" method="post">
				<input type="text" name="buscar" placeholder="Buscar Programa" 
				value="<?php if(isset($buscar_text)) echo $buscar_text; ?>" class="input__text">
				<input type="submit" class="btn" name="btn_buscar" value="Buscar">
				<a href="insert_alumnos_edad_genero.php" class="btn btn__nuevo">Nuevo</a>
			</form>
		</div>
		<table>
			<tr class="head">
				<td>PROGRAMA</td>
				<td>MODALIDAD</td>
				<td colspan="2">NUEVO INGRESO</td>
				<td colspan="2">REINGRESO</td>
				<td>TOTAL</td>
                <td colspan="2">CON DISCAPACIDAD</td>
                <td colspan="2">HABLANTES DE UNA LENGUA</td>
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
					<td><?php echo $fila['hombres_nuevos']; ?></td>
					<td><?php echo $fila['mujeres_nuevos']; ?></td>
					<td><?php echo $fila['hombres_re']; ?></td>
                    <td><?php echo $fila['mujeres_re']; ?></td>
                    <td><?php echo $fila['total']; ?></td>
                    <td><?php echo $fila['hombres_dis']; ?></td>
                    <td><?php echo $fila['mujeres_dis']; ?></td>
                    <td><?php echo $fila['hombres_lengua']; ?></td>
                    <td><?php echo $fila['mujeres_lengua']; ?></td>
					<td><a href="update_alumnos_edad_genero.php?id=<?php echo $fila['id']; ?>"  class="btn__update" >Editar</a></td>
					<td><a href="delete_alumnos_edad_genero.php?id=<?php echo $fila['id']; ?>" class="btn__delete">Eliminar</a></td>
				</tr>
			<?php endforeach ?>

		</table>
	</div>
<br><br>
											<!--Gestion Empresarial 2-->
<?php
	include_once 'conexion.php';

	$sentencia_select=$con->prepare('SELECT *FROM gestion_empresarial2 ORDER BY id ASC');
	$sentencia_select->execute();
	$resultado=$sentencia_select->fetchAll();

	// metodo buscar
	if(isset($_POST['btn_buscar'])){
		$buscar_text=$_POST['buscar'];
		$select_buscar=$con->prepare('
			SELECT *FROM gestion_empresarial2 WHERE edad LIKE :campo;'
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
		<h2>INGENIERIA EN GESTION EMPRESARIAL <br> ENERO - JUNIO</h2>
		<div class="barra__buscador">
			<form action="" class="formulario" method="post">
				<input type="text" name="buscar" placeholder="Buscar por Edad" 
				value="<?php if(isset($buscar_text)) echo $buscar_text; ?>" class="input__text">
				<input type="submit" class="btn" name="btn_buscar" value="Buscar">
				<a href="insert_gestion2.php" class="btn btn__nuevo">Nuevo</a>
			</form>
		</div>
		<table>
			<tr class="head">
				<td>EDAD</td>
				<td>HOMBRES</td>
				<td>MUJERES</td>
				<td colspan="2">CON DISCAPACIDAD</td>
				<td colspan="3">TOTAL</td>
				<td colspan="2">Acción</td>
            </tr>
            
            <tr class="head">
				<td></td>
				<td></td>
				<td></td>
				<td>HOMBRES</td>
				<td>MUJERES</td>
                <td>TOTAL HOMBRES</td>
                <td>TOTAL MUJERES</td>
                <td>TOTAL</td>
                <td></td>
                <td></td>
			</tr>

			<?php foreach($resultado as $fila):?>
				<tr >
					<td><?php echo $fila['edad']; ?></td>
					<td><?php echo $fila['hombres']; ?></td>
					<td><?php echo $fila['mujeres']; ?></td>
					<td><?php echo $fila['hombres_dis']; ?></td>
					<td><?php echo $fila['mujeres_dis']; ?></td>
                    <td><?php echo $fila['hombres_total']; ?></td>
                    <td><?php echo $fila['mujeres_total']; ?></td>
                    <td><?php echo $fila['total']; ?></td>
					<td><a href="update_gestion2.php?id=<?php echo $fila['id']; ?>"  class="btn__update" >Editar</a></td>
					<td><a href="delete_gestion2.php?id=<?php echo $fila['id']; ?>" class="btn__delete">Eliminar</a></td>
				</tr>
			<?php endforeach ?>

		</table>
    </div>
<br><br>
											<!-- Tics 2 -->
<?php
	include_once 'conexion.php';

	$sentencia_select=$con->prepare('SELECT *FROM tics2 ORDER BY id ASC');
	$sentencia_select->execute();
	$resultado=$sentencia_select->fetchAll();

	// metodo buscar
	if(isset($_POST['btn_buscar'])){
		$buscar_text=$_POST['buscar'];
		$select_buscar=$con->prepare('
			SELECT *FROM tics2 WHERE edad LIKE :campo;'
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
		<h2>INGENIERIA EN TECNOLOGIAS DE LA INFORMACION Y COMUNICACION <br> ENERO - JUNIO</h2>
		<div class="barra__buscador">
			<form action="" class="formulario" method="post">
				<input type="text" name="buscar" placeholder="Buscar por Edad" 
				value="<?php if(isset($buscar_text)) echo $buscar_text; ?>" class="input__text">
				<input type="submit" class="btn" name="btn_buscar" value="Buscar">
				<a href="insert_tics2.php" class="btn btn__nuevo">Nuevo</a>
			</form>
		</div>
		<table>
			<tr class="head">
				<td>EDAD</td>
				<td>HOMBRES</td>
				<td>MUJERES</td>
				<td colspan="2">CON DISCAPACIDAD</td>
				<td colspan="3">TOTAL</td>
				<td colspan="2">Acción</td>
            </tr>
            
            <tr class="head">
				<td></td>
				<td></td>
				<td></td>
				<td>HOMBRES</td>
				<td>MUJERES</td>
                <td>TOTAL HOMBRES</td>
                <td>TOTAL MUJERES</td>
                <td>TOTAL</td>
                <td></td>
                <td></td>
			</tr>

			<?php foreach($resultado as $fila):?>
				<tr >
					<td><?php echo $fila['edad']; ?></td>
					<td><?php echo $fila['hombres']; ?></td>
					<td><?php echo $fila['mujeres']; ?></td>
					<td><?php echo $fila['hombres_dis']; ?></td>
					<td><?php echo $fila['mujeres_dis']; ?></td>
                    <td><?php echo $fila['hombres_total']; ?></td>
                    <td><?php echo $fila['mujeres_total']; ?></td>
                    <td><?php echo $fila['total']; ?></td>
					<td><a href="update_tics2.php?id=<?php echo $fila['id']; ?>"  class="btn__update" >Editar</a></td>
					<td><a href="delete_tics2.php?id=<?php echo $fila['id']; ?>" class="btn__delete">Eliminar</a></td>
				</tr>
			<?php endforeach ?>

		</table>
    </div>
<br><br>
											<!-- Diseño 2 -->
<?php
	include_once 'conexion.php';

	$sentencia_select=$con->prepare('SELECT *FROM diseño2 ORDER BY id ASC');
	$sentencia_select->execute();
	$resultado=$sentencia_select->fetchAll();

	// metodo buscar
	if(isset($_POST['btn_buscar'])){
		$buscar_text=$_POST['buscar'];
		$select_buscar=$con->prepare('
			SELECT *FROM diseño2 WHERE edad LIKE :campo;'
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
		<h2>INGENIERIA EN DISEÑO INDUSTRIAL <br> ENERO - JUNIO</h2>
		<div class="barra__buscador">
			<form action="" class="formulario" method="post">
				<input type="text" name="buscar" placeholder="Buscar por Edad" 
				value="<?php if(isset($buscar_text)) echo $buscar_text; ?>" class="input__text">
				<input type="submit" class="btn" name="btn_buscar" value="Buscar">
				<a href="insert_diseño2.php" class="btn btn__nuevo">Nuevo</a>
			</form>
		</div>
		<table>
			<tr class="head">
				<td>EDAD</td>
				<td>HOMBRES</td>
				<td>MUJERES</td>
				<td colspan="2">CON DISCAPACIDAD</td>
				<td colspan="3">TOTAL</td>
				<td colspan="2">Acción</td>
            </tr>
            
            <tr class="head">
				<td></td>
				<td></td>
				<td></td>
				<td>HOMBRES</td>
				<td>MUJERES</td>
                <td>TOTAL HOMBRES</td>
                <td>TOTAL MUJERES</td>
                <td>TOTAL</td>
                <td></td>
                <td></td>
			</tr>

			<?php foreach($resultado as $fila):?>
				<tr >
					<td><?php echo $fila['edad']; ?></td>
					<td><?php echo $fila['hombres']; ?></td>
					<td><?php echo $fila['mujeres']; ?></td>
					<td><?php echo $fila['hombres_dis']; ?></td>
					<td><?php echo $fila['mujeres_dis']; ?></td>
                    <td><?php echo $fila['hombres_total']; ?></td>
                    <td><?php echo $fila['mujeres_total']; ?></td>
                    <td><?php echo $fila['total']; ?></td>
					<td><a href="update_diseño2.php?id=<?php echo $fila['id']; ?>"  class="btn__update" >Editar</a></td>
					<td><a href="delete_diseño2.php?id=<?php echo $fila['id']; ?>" class="btn__delete">Eliminar</a></td>
				</tr>
			<?php endforeach ?>

		</table>
    </div>
<br><br>
											<!--Alumnos Edad Genero 2 -->
<?php
	include_once 'conexion.php';

	$sentencia_select=$con->prepare('SELECT *FROM alumnos_edad_genero2 ORDER BY id ASC');
	$sentencia_select->execute();
	$resultado=$sentencia_select->fetchAll();

	// metodo buscar
	if(isset($_POST['btn_buscar'])){
		$buscar_text=$_POST['buscar'];
		$select_buscar=$con->prepare('
			SELECT *FROM alumnos_edad_genero2 WHERE programa LIKE :campo;'
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
		<h2>ALUMNOS, EDAD, GENERO <br> ENERO - JUNIO</h2>
		<div class="barra__buscador">
			<form action="" class="formulario" method="post">
				<input type="text" name="buscar" placeholder="Buscar Programa" 
				value="<?php if(isset($buscar_text)) echo $buscar_text; ?>" class="input__text">
				<input type="submit" class="btn" name="btn_buscar" value="Buscar">
				<a href="insert_alumnos_edad_genero2.php" class="btn btn__nuevo">Nuevo</a>
			</form>
		</div>
		<table>
			<tr class="head">
				<td>PROGRAMA</td>
				<td>MODALIDAD</td>
				<td colspan="2">NUEVO INGRESO</td>
				<td colspan="2">REINGRESO</td>
				<td>TOTAL</td>
                <td colspan="2">CON DISCAPACIDAD</td>
                <td colspan="2">HABLANTES DE UNA LENGUA</td>
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
					<td><?php echo $fila['hombres_nuevos']; ?></td>
					<td><?php echo $fila['mujeres_nuevos']; ?></td>
					<td><?php echo $fila['hombres_re']; ?></td>
                    <td><?php echo $fila['mujeres_re']; ?></td>
                    <td><?php echo $fila['total']; ?></td>
                    <td><?php echo $fila['hombres_dis']; ?></td>
                    <td><?php echo $fila['mujeres_dis']; ?></td>
                    <td><?php echo $fila['hombres_lengua']; ?></td>
                    <td><?php echo $fila['mujeres_lengua']; ?></td>
					<td><a href="update_alumnos_edad_genero2.php?id=<?php echo $fila['id']; ?>"  class="btn__update" >Editar</a></td>
					<td><a href="delete_alumnos_edad_genero2.php?id=<?php echo $fila['id']; ?>" class="btn__delete">Eliminar</a></td>
				</tr>
			<?php endforeach ?>

		</table>
	</div>
</body>
</html>