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
		$programa=$_POST['programa'];
		$modalidad=$_POST['modalidad'];
		$hombres_egresados=$_POST['hombres_egresados'];
		$mujeres_egresados=$_POST['mujeres_egresados'];
        $hombres_titulados=$_POST['hombres_titulados'];
        $mujeres_titulados=$_POST['mujeres_titulados'];

		if(!empty($programa) && !empty($modalidad) && !empty($hombres_egresados) && !empty($mujeres_egresados) && !empty($hombres_titulados) && !empty($mujeres_titulados) ){
			
				$consulta_insert=$con->prepare('INSERT INTO egresados_titulados(programa,modalidad,hombres_egresados,mujeres_egresados,hombres_titulados,mujeres_titulados) VALUES(:programa,:modalidad,:hombres_egresados,:mujeres_egresados,:hombres_titulados,:mujeres_titulados)');
				$consulta_insert->execute(array(
					':programa' =>$programa,
					':modalidad' =>$modalidad,
					':hombres_egresados' =>$hombres_egresados,
					':mujeres_egresados' =>$mujeres_egresados,
                    ':hombres_titulados' =>$hombres_titulados,
                    ':mujeres_titulados' =>$mujeres_titulados
				));
				header('Location: egresados_titulados.php');
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
		<h2>NUEVO EGRESADO/TITULADO</h2>
		<form action="" method="post">
			<div class="form-group">
				<input type="text" name="programa" placeholder="PROGRAMA" class="input__text">
				<input type="text" name="modalidad" placeholder="MODALIDAD" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="hombres_egresados" placeholder="HOMBRES EGRESADOS" class="input__text">
				<input type="text" name="mujeres_egresados" placeholder="MUJERES EGRESADAS" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="hombres_titulados" placeholder="HOMBRES TITULADOS" class="input__text">
                <input type="text" name="mujeres_titulados" placeholder="MUJERES TITULADAS" class="input__text">
			</div>
			<div class="btn__group">
				<a href="egresados_titulados.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>
</body>
</html>
