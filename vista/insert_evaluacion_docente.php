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
		$programa=$_POST['programa'];
		$modalidad=$_POST['modalidad'];
		$calif_promedio=$_POST['calif_promedio'];
		$total_docentes=$_POST['total_docentes'];

		if(!empty($programa) && !empty($modalidad) && !empty($calif_promedio) && !empty($total_docentes) ){
			
				$consulta_insert=$con->prepare('INSERT INTO evaluacion_docente(programa,modalidad,calif_promedio,total_docentes) VALUES(:programa,:modalidad,:calif_promedio,:total_docentes)');
				$consulta_insert->execute(array(
					':programa' =>$programa,
					':modalidad' =>$modalidad,
					':calif_promedio' =>$calif_promedio,
					':total_docentes' =>$total_docentes
				));
				header('Location: evaluacion_docenteu.php');
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
		<h2>NUEVA EVALUACION DOCENTE</h2>
		<form action="" method="post">
			<div class="form-group">
				<input type="text" name="programa" placeholder="PROGRAMA" class="input__text">
				<input type="text" name="modalidad" placeholder="MODALIDAD" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="calif_promedio" placeholder="CALIFICACION PROMEDIO" class="input__text">
				<input type="text" name="total_docentes" placeholder="TOTAL DE DOCENTES" class="input__text">
			</div>
			<div class="btn__group">
				<a href="evaluacion_docenteu.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>
</body>
</html>
