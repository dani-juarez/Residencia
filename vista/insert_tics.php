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
		$edad=$_POST['edad'];
		$hombres=$_POST['hombres'];
		$mujeres=$_POST['mujeres'];
		$hombres_dis=$_POST['hombres_dis'];
        $mujeres_dis=$_POST['mujeres_dis'];
        $hombres_total=$_POST['hombres_total'];
        $mujeres_total=$_POST['mujeres_total'];
        $total=$_POST['total'];

		if(!empty($edad) && !empty($hombres) && !empty($mujeres) && !empty($hombres_dis) && !empty($mujeres_dis) && !empty($hombres_total) && !empty($mujeres_total) && !empty($total) ){

				$consulta_insert=$con->prepare('INSERT INTO tics(edad,hombres,mujeres,hombres_dis,mujeres_dis,hombres_total,mujeres_total,total) VALUES(:edad,:hombres,:mujeres,:hombres_dis,:mujeres_dis,:hombres_total,:mujeres_total,:total)');
				$consulta_insert->execute(array(
					':edad' =>$edad,
					':hombres' =>$hombres,
					':mujeres' =>$mujeres,
					':hombres_dis' =>$hombres_dis,
                    ':mujeres_dis' =>$mujeres_dis,
                    ':hombres_total' =>$hombres_total,
                    ':mujeres_total' =>$mujeres_total,
                    ':total' =>$total
				));
				header('Location: alumnos_edad_genero.php');
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
		<h2>INGENIERIA EN TECNOLOGIAS DE LA INFORMACION Y LA COMUNICACION</h2>
		<form action="" method="post">
			<div class="form-group">
				<input type="text" name="edad" placeholder="EDAD" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="hombres" placeholder="HOMBRES" class="input__text">
				<input type="text" name="mujeres" placeholder="MUJERES" class="input__text">
			</div>
			<div class="form-group">
                <input type="text" name="hombres_dis" placeholder="HOMBRES CON DISCAPACIDAD" class="input__text">
                <input type="text" name="mujeres_dis" placeholder="MUJERES CON DISCAPACIDAD" class="input__text">
            </div>
            <div class="form-group">
                <input type="text" name="hombres_total" placeholder="HOMBRES TOTAL" class="input__text">
                <input type="text" name="mujeres_total" placeholder="MUJERES TOTAL" class="input__text">
                <input type="text" name="total" placeholder="TOTAL" class="input__text">
			</div>
			<div class="btn__group">
				<a href="alumnos_edad_genero.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>
</body>
</html>
