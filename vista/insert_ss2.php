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
		$hombres_solicitantes=$_POST['hombres_solicitantes'];
		$mujeres_solicitantes=$_POST['mujeres_solicitantes'];
        $hombres_aceptados=$_POST['hombres_aceptados'];
        $mujeres_aceptados=$_POST['mujeres_aceptados'];

		if(!empty($programa) && !empty($modalidad) && !empty($hombres_solicitantes) && !empty($mujeres_solicitantes) && !empty($hombres_aceptados) && !empty($mujeres_aceptados) ){

				$consulta_insert=$con->prepare('INSERT INTO servicio_social2(programa,modalidad,hombres_solicitantes,mujeres_solicitantes,hombres_aceptados,mujeres_aceptados) VALUES(:programa,:modalidad,:hombres_solicitantes,:mujeres_solicitantes,:hombres_aceptados,:mujeres_aceptados)');
				$consulta_insert->execute(array(
					':programa' =>$programa,
					':modalidad' =>$modalidad,
					':hombres_solicitantes' =>$hombres_solicitantes,
					':mujeres_solicitantes' =>$mujeres_solicitantes,
                    ':hombres_aceptados' =>$hombres_aceptados,
                    ':mujeres_aceptados' =>$mujeres_aceptados
				));
				header('Location: servicio_social_residencia_profesionalu.php');
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
		<h2>SERVICIO SOCIAL</h2>
		<form action="" method="post">
			<div class="form-group">
				<input type="text" name="programa" placeholder="PROGRAMA" class="input__text">
				<input type="text" name="modalidad" placeholder="MODALIDAD" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="hombres_solicitantes" placeholder="HOMBRES SOLICITANTES" class="input__text">
				<input type="text" name="mujeres_solicitantes" placeholder="MUJERES SOLICITANTES" class="input__text">
            </div>
            <div class="form-group">
				<input type="text" name="hombres_aceptados" placeholder="HOMBRES ACEPTADOS" class="input__text">
				<input type="text" name="mujeres_aceptados" placeholder="MUJERES ACEPTADOS" class="input__text">
			</div>
			<div class="btn__group">
				<a href="servicio_social_residencia_profesionalu.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>
</body>
</html>
