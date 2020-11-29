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
	
	if(isset($_POST['guardar'])){
		$instalacion=$_POST['instalacion'];
		$cantidad=$_POST['cantidad'];
		
		if(!empty($instalacion) && !empty($cantidad) ){

				$consulta_insert=$con->prepare('INSERT INTO instalaciones(instalacion,cantidad) VALUES(:instalacion,:cantidad)');
				$consulta_insert->execute(array(
					':instalacion' =>$instalacion,
					':cantidad' =>$cantidad
				));
				header('Location: instalaciones.php');
			}
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
		<h2>NUEVA INSTALACION</h2>
		<form action="" method="post">
			<div class="form-group">
				<input type="text" name="instalacion" placeholder="INSTALACION" class="input__text">
				<input type="text" name="cantidad" placeholder="CANTIDAD" class="input__text">
			</div>
			<div class="btn__group">
				<a href="instalaciones.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>
</body>
</html>
