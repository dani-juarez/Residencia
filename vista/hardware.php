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

	$sentencia_select=$con->prepare('SELECT *FROM hardware ORDER BY id ASC');
	$sentencia_select->execute();
	$resultado=$sentencia_select->fetchAll();

	// metodo buscar
	if(isset($_POST['btn_buscar'])){
		$buscar_text=$_POST['buscar'];
		$select_buscar=$con->prepare('
			SELECT *FROM hardware WHERE marca LIKE :campo;'
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
<h2>HARDWARE</h2>
<!-- Tabla Primera-->
<div class="contenedor">
		<div class="barra__buscador">
			<form action="" class="formulario" method="post">
				<input type="text" name="buscar" placeholder="Buscar Hardware" 
				value="<?php if(isset($buscar_text)) echo $buscar_text; ?>" class="input__text">
				<input type="submit" class="btn" name="btn_buscar" value="Buscar">
				<a href="insert_hardware.php" class="btn btn__nuevo">Nuevo Hardware</a>
			</form>
		</div>
		<table>
			<tr class="head">
				<td>MARCA</td>
				<td>MODELO</td>
                <td>PLATAFORMA</td>
                <td>ARQUITECTURA</td>
                <td>PROCESADOR</td>
                <td>MEMORIA</td>
                <td>DISCO DURO</td>
                <td>MONITOR</td>
                <td>CACHE</td>
                <td>TIPO</td>
                <td>RED</td>
                <td>SONIDO</td>
                <td>VIDEO</td>
                <td>RATON</td>
                <td>TECLADO</td>
				<td colspan="2">Acción</td>
			</tr>

			<?php foreach($resultado as $fila):?>
				<tr >
					<td><?php echo $fila['marca']; ?></td>
					<td><?php echo $fila['modelo']; ?></td>
                    <td><?php echo $fila['plataforma']; ?></td>
                    <td><?php echo $fila['arquitectura']; ?></td>
                    <td><?php echo $fila['procesador']; ?></td>
                    <td><?php echo $fila['memoria']; ?></td>
                    <td><?php echo $fila['disco_duro']; ?></td>
                    <td><?php echo $fila['monitor']; ?></td>
                    <td><?php echo $fila['cache']; ?></td>
                    <td><?php echo $fila['tipo']; ?></td>
                    <td><?php echo $fila['red']; ?></td>
                    <td><?php echo $fila['sonido']; ?></td>
                    <td><?php echo $fila['video']; ?></td>
                    <td><?php echo $fila['raton']; ?></td>
                    <td><?php echo $fila['teclado']; ?></td>
					<td><a href="update_hardware.php?id=<?php echo $fila['id']; ?>"  class="btn__update" >Editar</a></td>
					<td><a href="delete_hardware.php?id=<?php echo $fila['id']; ?>" class="btn__delete">Eliminar</a></td>
				</tr>
			<?php endforeach ?>

		</table>
</div>
<br><br><br>
</body>
</html>