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
		$estudios=$_POST['estudios'];
		$hombres_servicio=$_POST['hombres_servicio'];
		$mujeres_servicio=$_POST['mujeres_servicio'];
		$hombres_administrativas=$_POST['hombres_administrativas'];
        $mujeres_administrativas=$_POST['mujeres_administrativas'];
        $hombres_analistas=$_POST['hombres_analistas'];
        $mujeres_analistas=$_POST['mujeres_analistas'];
        $hombres_docencia=$_POST['hombres_docencia'];
        $mujeres_doocencia=$_POST['mujeres_docencia'];
        $hombres_total=$_POST['hombres_total'];
        $mujeres_total=$_POST['mujeres_total'];
        $total=$_POST['total'];

		if(!empty($estudios) && !empty($hombres_servicio) && !empty($mujeres_servicio) && !empty($hombres_administrativas) && !empty($mujeres_administrativas) && !empty($hombres_analistas) && !empty($mujeres_analistas) && !empty($hombres_docencia) && !empty($mujeres_doocencia) && !empty($hombres_total) && !empty($mujeres_total) && !empty($total) ){

				$consulta_insert=$con->prepare('INSERT INTO r_humanos_funciones(estudios,hombres_servicio,mujeres_servicio,hombres_administrativas,mujeres_administrativas,hombres_analistas,mujeres_analistas,hombres_docencia,mujeres_docencia,hombres_total,mujeres_total,total) VALUES(:estudios,:hombres_servicio,:mujeres_servicio,:hombres_administrativas,:mujeres_administrativas,:hombres_analistas,:mujeres_analistas,:hombres_docencia,:mujeres_docencia,:hombres_total,:mujeres_total,:total)');
				$consulta_insert->execute(array(
					':estudios' =>$estudios,
					':hombres_servicio' =>$hombres_servicio,
					':mujeres_servicio' =>$mujeres_servicio,
					':hombres_administrativas' =>$hombres_administrativas,
                    ':mujeres_administrativas' =>$mujeres_administrativas,
                    ':hombres_analistas' =>$hombres_analistas,
                    ':mujeres_analistas' =>$mujeres_analistas,
                    ':hombres_docencia' =>$hombres_docencia,
                    ':mujeres_docencia' =>$mujeres_doocencia,
                    ':hombres_total' =>$hombres_total,
                    ':mujeres_total' =>$mujeres_total,
                    ':total' =>$total
				));
				header('Location: r_humanos.php');
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
		<h2>NUEVA FUNCION</h2>
		<form action="" method="post">
			<div class="form-group">
				<input type="text" name="estudios" placeholder="GRADO MAXIMO DE ESTUDIOS" class="input__text">
			</div>
			<div class="form-group">
            <input type="text" name="hombres_servicio" placeholder="SERVICIO HOMBRE" class="input__text">    
            <input type="text" name="mujeres_servicio" placeholder="SERVICIO MUJERES" class="input__text">
			</div>
			<div class="form-group">
            <input type="text" name="hombres_administrativas" placeholder="ADMINISTRATIVOS HOMBRES" class="input__text">
            <input type="text" name="mujeres_administrativas" placeholder="ADMINISTRATIVAS MUJERES" class="input__text">
            </div>
            <div class="form-group">
            <input type="text" name="hombres_analistas" placeholder="ANALISTAS HOMBRES" class="input__text">
            <input type="text" name="mujeres_analistas" placeholder="ANALISTAS MUJERES" class="input__text">
            </div>
            <div class="form-group">
            <input type="text" name="hombres_docencia" placeholder="DOCENCIA HOMBRES" class="input__text">
            <input type="text" name="mujeres_docencia" placeholder="DOCENCIA MUJERES" class="input__text">
            </div>
            <div class="form-group">
            <input type="text" name="hombres_total" placeholder="TOTAL HOMBRES" class="input__text">
            <input type="text" name="mujeres_total" placeholder="TOTAL MUJERES" class="input__text">
            <input type="text" name="total" placeholder="TOTAL" class="input__text">
			</div>
			<div class="btn__group">
				<a href="r_humanos.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>
</body>
</html>
