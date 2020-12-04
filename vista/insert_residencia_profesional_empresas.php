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
		$empresas=$_POST['empresas'];
		$nombre_proyecto=$_POST['nombre_proyecto'];
		$creacion=$_POST['creacion'];
		$hombres_total=$_POST['hombres_total'];
        $mujeres_total=$_POST['mujeres_total'];
        $total=$_POST['total'];

		if(!empty($empresas) && !empty($nombre_proyecto) && !empty($creacion) && !empty($hombres_total) && !empty($mujeres_total) && !empty($total) ){

				$consulta_insert=$con->prepare('INSERT INTO residencia_profesional_empresas(empresas,nombre_proyecto,creacion,hombres_total,mujeres_total,total) VALUES(:empresas,:nombre_proyecto,:creacion,:hombres_total,:mujeres_total,:total)');
				$consulta_insert->execute(array(
					':empresas' =>$empresas,
					':nombre_proyecto' =>$nombre_proyecto,
					':creacion' =>$creacion,
					':hombres_total' =>$hombres_total,
                    ':mujeres_total' =>$mujeres_total,
                    ':total' =>$total
				));
				header('Location: servicio_social_residencia_profesional.php');
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
		<h2>RESIDENCIA PROFESIONAL EMPRESAS</h2>
		<form action="" method="post">
			<div class="form-group">
				<input type="text" name="empresas" placeholder="EMPRESAS PARTICIPANTES" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="nombre_proyecto" placeholder="NOMBRE DEL PROYECTO" class="input__text">
				<input type="text" name="creacion" placeholder="AÑO DE CREACION EMPRESA" class="input__text">
            </div>
            <div class="form-group">
				<input type="text" name="hombres_total" placeholder="TOTAL HOMBRES" class="input__text">
                <input type="text" name="mujeres_total" placeholder="TOTAL MUJERES" class="input__text">
                <input type="text" name="total" placeholder="TOTAL" class="input__text">
			</div>
			<div class="btn__group">
				<a href="servicio_social_residencia_profesional.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>
</body>
</html>
