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

	$sentencia_select=$con->prepare('SELECT *FROM recursos_financieros ORDER BY id ASC');
	$sentencia_select->execute();
	$resultado=$sentencia_select->fetchAll();

	// metodo buscar
	if(isset($_POST['btn_buscar'])){
		$buscar_text=$_POST['buscar'];
		$select_buscar=$con->prepare('
			SELECT *FROM recursos_financieros WHERE recurso LIKE :campo;'
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
<h2>RECURSOS FINANCIEROS</h2>
<!-- Tabla Primera-->
<div class="contenedor">
		<div class="barra__buscador">
			<form action="" class="formulario" method="post">
				<input type="text" name="buscar" placeholder="Buscar Recurso Financiero" 
				value="<?php if(isset($buscar_text)) echo $buscar_text; ?>" class="input__text">
				<input type="submit" class="btn" name="btn_buscar" value="Buscar">
				<a href="insert_recurso_financiero.php" class="btn btn__nuevo">Nuevo Recurso Financiero</a>
			</form>
		</div>
		<table>
			<tr class="head">
				<td>RECURSOS FINANCIEROS</td>
				<td colspan="12">POR MES</td>
                <td>TOTAL</td>
				<td colspan="2">Acción</td>
			</tr>

            <tr class="head">
			<td scope="col"></td>
			<td scope="col">ENERO</td>
			<td scope="col">FEBRERO</td>
			<td scope="col">MARZO</td>
			<td scope="col">ABRIL</td>
            <td scope="col">MAYO</td>
            <td scope="col">JUNIO</td>
            <td scope="col">JULIO</td>
            <td scope="col">AGOSTO</td>
            <td scope="col">SEPTIEMBRE</td>
            <td scope="col">OCTUBRE</td>
            <td scope="col">NOVIEMBE</td>
			<td scope="col">DICIEMBRE</td>
            <td scope="col"></td>
            <td scope="col"></td>
            <td scope="col"></td>
            </tr>

			<?php foreach($resultado as $fila):?>
				<tr >
					<td><?php echo $fila['recursos']; ?></td>
					<td><?php echo $fila['enero']; ?></td>
                    <td><?php echo $fila['febrero']; ?></td>
                    <td><?php echo $fila['marzo']; ?></td>
                    <td><?php echo $fila['abril']; ?></td>
                    <td><?php echo $fila['mayo']; ?></td>
                    <td><?php echo $fila['junio']; ?></td>
                    <td><?php echo $fila['julio']; ?></td>
                    <td><?php echo $fila['agosto']; ?></td>
                    <td><?php echo $fila['septiembre']; ?></td>
                    <td><?php echo $fila['octubre']; ?></td>
                    <td><?php echo $fila['noviembre']; ?></td>
                    <td><?php echo $fila['diciembre']; ?></td>
                    <td><?php echo $fila['total']; ?></td>
					<td><a href="update_recurso_financiero.php?id=<?php echo $fila['id']; ?>"  class="btn__update" >Editar</a></td>
					<td><a href="delete_recurso_financiero.php?id=<?php echo $fila['id']; ?>" class="btn__delete">Eliminar</a></td>
				</tr>
			<?php endforeach ?>

		</table>
</div>
<br><br><br>
</body>
</html>