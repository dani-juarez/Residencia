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
	
	if(isset($_POST['guardar'])){
		$personal=$_POST['personal'];
		$hombres=$_POST['hombres'];
		$mujeres=$_POST['mujeres'];

		if(!empty($personal) && !empty($hombres) && !empty($mujeres) ){

				$consulta_insert=$con->prepare('INSERT INTO r_humanos_personal(personal,hombres,mujeres) VALUES(:personal,:hombres,:mujeres)');
				$consulta_insert->execute(array(
					':personal' =>$personal,
					':hombres' =>$hombres,
					':mujeres' =>$mujeres
				));
				header('Location: r_humanos2u.php');
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
		<h2>NUEVO PERSONAL</h2>
		<form action="" method="post">
			<div class="form-group">
				<input type="text" name="personal" placeholder="PERSONAL" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="hombres" placeholder="HOMBRES" class="input__text">
				<input type="text" name="mujeres" placeholder="MUJERES" class="input__text">
			</div>
			<div class="btn__group">
				<a href="r_humanos2u.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>
</body>
</html>
