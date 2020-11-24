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

	$sentencia_select=$con->prepare('SELECT *FROM software ORDER BY id ASC');
	$sentencia_select->execute();
	$resultado=$sentencia_select->fetchAll();

	// metodo buscar
	if(isset($_POST['btn_buscar'])){
		$buscar_text=$_POST['buscar'];
		$select_buscar=$con->prepare('
			SELECT *FROM hardware WHERE nombre LIKE :campo;'
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
<h2>SOFTWARE</h2>
<!-- Tabla Primera-->
<div class="contenedor">
		<div class="barra__buscador">
			<form action="" class="formulario" method="post">
				<input type="text" name="buscar" placeholder="Buscar Software" 
				value="<?php if(isset($buscar_text)) echo $buscar_text; ?>" class="input__text">
				<input type="submit" class="btn" name="btn_buscar" value="Buscar">
				<a href="insert_software.php" class="btn btn__nuevo">Nuevo Software</a>
			</form>
		</div>
        <center><p>NOTA: AGREGAR LICENCIAS CON LAS QUE CUENTE EL CENTRO DE COMPUTO O ELIMINAR LAS LICENCIAS QUE YA NO EXISTAN</p></center>
		<table>
			<tr class="head">
				<td>NOMBRE</td>
				<td>TIPO</td>
                <td>N° DE LICENCIAS</td>
				<td colspan="2">Acción</td>
			</tr>

			<?php foreach($resultado as $fila):?>
				<tr >
					<td><?php echo $fila['nombre']; ?></td>
					<td><?php echo $fila['tipo']; ?></td>
                    <td><?php echo $fila['n_licencias']; ?></td>
					<td><a href="update_software.php?id=<?php echo $fila['id']; ?>"  class="btn__update" >Editar</a></td>
					<td><a href="delete_software.php?id=<?php echo $fila['id']; ?>" class="btn__delete">Eliminar</a></td>
				</tr>
			<?php endforeach ?>

		</table>
</div>
<br><br><br>
</body>
</html>