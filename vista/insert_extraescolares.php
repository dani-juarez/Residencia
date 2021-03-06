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
		$actividad=$_POST['actividad'];
		$hombres=$_POST['hombres'];
		$mujeres=$_POST['mujeres'];
		$total=$_POST['total'];

		if(!empty($actividad) && !empty($hombres) && !empty($mujeres) && !empty($total) ){
			
				$consulta_insert=$con->prepare('INSERT INTO extraescolares(actividad,hombres,mujeres,total) VALUES(:actividad,:hombres,:mujeres,:total)');
				$consulta_insert->execute(array(
					':actividad' =>$actividad,
					':hombres' =>$hombres,
					':mujeres' =>$mujeres,
					':total' =>$total
				));
				header('Location: extraescolares.php');
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
		<h2>NUEVA ACTIVIDAD</h2>
		<form action="" method="post">
			<div class="form-group">
				<input type="text" name="actividad" placeholder="ACTIVIDAD" class="input__text">
				<input type="text" name="hombres" placeholder="HOMBRES" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="mujeres" placeholder="MUJERES" class="input__text">
				<input type="text" name="total" placeholder="TOTAL" class="input__text">
			</div>
			<div class="btn__group">
				<a href="extraescolares.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>
</body>
</html>
