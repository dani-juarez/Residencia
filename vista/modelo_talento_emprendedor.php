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

	$sentencia_select=$con->prepare('SELECT *FROM modelo_talento_emprendedor ORDER BY id ASC');
	$sentencia_select->execute();
	$resultado=$sentencia_select->fetchAll();

	// metodo buscar
	if(isset($_POST['btn_buscar'])){
		$buscar_text=$_POST['buscar'];
		$select_buscar=$con->prepare('
			SELECT *FROM modelo_talento_emprendedor WHERE indicador LIKE :campo;'
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
<h2>MODELO TALENTO EMPRENDEDOR</h2>
<!-- Tabla modelo-->
<div class="contenedor">
		<div class="barra__buscador">
			<form action="" class="formulario" method="post">
				<input type="text" name="buscar" placeholder="Buscar Programa" 
				value="<?php if(isset($buscar_text)) echo $buscar_text; ?>" class="input__text">
				<input type="submit" class="btn" name="btn_buscar" value="Buscar">
				<a href="insert_modelo_t_e.php" class="btn btn__nuevo">Nuevo Modelo</a>
			</form>
		</div>
		<table>
			<tr class="head">
				<td>INDICADOR</td>
				<td>RESULTADO</td>
				<td colspan="2">Acción</td>
			</tr>

			<?php foreach($resultado as $fila):?>
				<tr >
					<td><?php echo $fila['indicador']; ?></td>
					<td><?php echo $fila['resultado']; ?></td>
					<td><a href="update_modelo_t_e.php?id=<?php echo $fila['id']; ?>"  class="btn__update" >Editar</a></td>
					<td><a href="delete_modelo_t_e.php?id=<?php echo $fila['id']; ?>" class="btn__delete">Eliminar</a></td>
				</tr>
			<?php endforeach ?>

		</table>
</div>
</body>
</html>