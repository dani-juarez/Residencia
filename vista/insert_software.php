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
		$nombre=$_POST['nombre'];
		$tipo=$_POST['tipo'];
		$n_licencias=$_POST['n_licencias'];

		if(!empty($nombre) && !empty($tipo) && !empty($n_licencias) ){
			
				$consulta_insert=$con->prepare('INSERT INTO software(nombre,tipo,n_licencias) VALUES(:nombre,:tipo,:n_licencias)');
				$consulta_insert->execute(array(
					':nombre' =>$nombre,
					':tipo' =>$tipo,
					':n_licencias' =>$n_licencias
				));
				header('Location: software.php');
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
		<h2>NUEVO SOFTWARE</h2>
		<form action="" method="post">
			<div class="form-group">
				<input type="text" name="nombre" placeholder="NOMBRE" class="input__text">
				<input type="text" name="tipo" placeholder="TIPO" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="n_licencias" placeholder="NUMERO DE LICENCIA" class="input__text">
			</div>
			<div class="btn__group">
				<a href="software.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>
</body>
</html>