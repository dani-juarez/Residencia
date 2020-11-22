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

	$sentencia_select=$con->prepare('SELECT *FROM seguimiento_egresados ORDER BY id ASC');
	$sentencia_select->execute();
	$resultado=$sentencia_select->fetchAll();

	// metodo buscar
	if(isset($_POST['btn_buscar'])){
		$buscar_text=$_POST['buscar'];
		$select_buscar=$con->prepare('
			SELECT *FROM seguimiento_egresados WHERE programa LIKE :campo;'
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
<h2>SEGUIMIENTO DE EGRESADOS <br> AGOSTO - DICIEMBRE</h2>
<!-- Tabla egresados-->
<div class="contenedor">
		<div class="barra__buscador">
			<form action="" class="formulario" method="post">
				<input type="text" name="buscar" placeholder="Buscar Programa" 
				value="<?php if(isset($buscar_text)) echo $buscar_text; ?>" class="input__text">
				<input type="submit" class="btn" name="btn_buscar" value="Buscar">
				<a href="insert_seguimiento_egresados.php" class="btn btn__nuevo">Nuevo Seguimiento</a>
			</form>
		</div>
		<table>
			<tr class="head">
				<td>PROGRAMA</td>
				<td>NIVEL</td>
                <td colspan="4" scope="colgroup">SECTOR</td>
				<td colspan="2" scope="colgroup">INSTITUCION</td>
                <td colspan="3" scope="colgroup">A SU PERFIL</td>
				<td colspan="2">Acción</td>
			</tr>
            <tr class="head">
			<td scope="col"></td>
			<td scope="col"></td>
			<td scope="col">EDUCATIVO</td>
			<td scope="col">PRIMARIO</td>
			<td scope="col">SECUNDARIO</td>
            <td scope="col">TERCIARIO</td>
            <td scope="col">PUBLICA</td>
            <td scope="col">PRIVADA</td>
            <td scope="col">SI</td>
            <td scope="col">NO</td>
            <td scope="col">PARCIAL</td>
            <td scope="col"></td>
			<td scope="col"></td></tr>

			<?php foreach($resultado as $fila):?>
				<tr >
					<td><?php echo $fila['programa']; ?></td>
					<td><?php echo $fila['nivel']; ?></td>
                    <td><?php echo $fila['educativo']; ?></td>
                    <td><?php echo $fila['primario']; ?></td>
                    <td><?php echo $fila['secundario']; ?></td>
                    <td><?php echo $fila['terciario']; ?></td>
                    <td><?php echo $fila['publica']; ?></td>
                    <td><?php echo $fila['privada']; ?></td>
                    <td><?php echo $fila['si']; ?></td>
                    <td><?php echo $fila['noo']; ?></td>
                    <td><?php echo $fila['parcial']; ?></td>
					<td><a href="update_seguimiento_egresados.php?id=<?php echo $fila['id']; ?>"  class="btn__update" >Editar</a></td>
					<td><a href="delete_seguimiento_egresados.php?id=<?php echo $fila['id']; ?>" class="btn__delete">Eliminar</a></td>
				</tr>
			<?php endforeach ?>

		</table>
</div>
<br><br><br>

<!-- Busqueda Tabla2-->
<?php
	include_once 'conexion.php';

	$sentencia_select=$con->prepare('SELECT *FROM seguimiento_egresados2 ORDER BY id ASC');
	$sentencia_select->execute();
	$resultado=$sentencia_select->fetchAll();

	// metodo buscar
	if(isset($_POST['btn_buscar'])){
		$buscar_text=$_POST['buscar'];
		$select_buscar=$con->prepare('
			SELECT *FROM seguimiento_egresados2 WHERE programa LIKE :campo;'
		);

		$select_buscar->execute(array(
			':campo' =>"%".$buscar_text."%"
		));

		$resultado=$select_buscar->fetchAll();

	}
?>

<!-- Tabla egresados 2 -->
<h2>SEGUIMIENTO DE EGRESADOS <br> ENERO - JUNIO</h2>
<div class="contenedor">
		<div class="barra__buscador">
			<form action="" class="formulario" method="post">
				<input type="text" name="buscar" placeholder="Buscar Programa" 
				value="<?php if(isset($buscar_text)) echo $buscar_text; ?>" class="input__text">
				<input type="submit" class="btn" name="btn_buscar" value="Buscar">
				<a href="insert_seguimiento_egresados2.php" class="btn btn__nuevo">Nuevo Seguimiento</a>
			</form>
		</div>
		<table>
			<tr class="head">
				<td>PROGRAMA</td>
				<td>NIVEL</td>
                <td colspan="4" scope="colgroup">SECTOR</td>
				<td colspan="2" scope="colgroup">INSTITUCION</td>
                <td colspan="3" scope="colgroup">A SU PERFIL</td>
				<td colspan="2">Acción</td>
			</tr>
            <tr class="head">
			<td scope="col"></td>
			<td scope="col"></td>
			<td scope="col">EDUCATIVO</td>
			<td scope="col">PRIMARIO</td>
			<td scope="col">SECUNDARIO</td>
            <td scope="col">TERCIARIO</td>
            <td scope="col">PUBLICA</td>
            <td scope="col">PRIVADA</td>
            <td scope="col">SI</td>
            <td scope="col">NO</td>
            <td scope="col">PARCIAL</td>
            <td scope="col"></td>
			<td scope="col"></td></tr>

			<?php foreach($resultado as $fila):?>
				<tr >
					<td><?php echo $fila['programa2']; ?></td>
					<td><?php echo $fila['nivel2']; ?></td>
                    <td><?php echo $fila['educativo2']; ?></td>
                    <td><?php echo $fila['primario2']; ?></td>
                    <td><?php echo $fila['secundario2']; ?></td>
                    <td><?php echo $fila['terciario2']; ?></td>
                    <td><?php echo $fila['publica2']; ?></td>
                    <td><?php echo $fila['privada2']; ?></td>
                    <td><?php echo $fila['si2']; ?></td>
                    <td><?php echo $fila['noo2']; ?></td>
                    <td><?php echo $fila['parcial2']; ?></td>
					<td><a href="update_seguimiento_egresados2.php?id=<?php echo $fila['id']; ?>"  class="btn__update" >Editar</a></td>
					<td><a href="delete_seguimiento_egresados2.php?id=<?php echo $fila['id']; ?>" class="btn__delete">Eliminar</a></td>
				</tr>
			<?php endforeach ?>

		</table>
</div>
</body>
</html>