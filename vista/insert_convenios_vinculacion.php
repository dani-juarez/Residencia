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
				<p><span class="label label-info"><?php echo $_SESSION["usuario"]["privilegio"] == 1 ? 'Administrador' : 'Cliente'; ?></span></p>
				
			</div>
		</div>
	</div>
</div>

<?php include 'partials/footer.php';?>

<?php 
	include_once 'conexion.php';
	
	if(isset($_POST['guardar'])){
		$nombre_empresa=$_POST['nombre_empresa'];
		$ubicacion=$_POST['ubicacion'];
		$año_creacion=$_POST['año_creacion'];
		$sector=$_POST['sector'];
		$giro=$_POST['giro'];
		$tamaño=$_POST['tamaño'];
		$n_empleados=$_POST['n_empleados'];
		$tipo=$_POST['tipo'];
		$modalidad=$_POST['modalidad'];
		$alcance=$_POST['alcance'];
		$area_conocimiento=$_POST['area_conocimiento'];
		$inicio=$_POST['inicio'];
		$termino=$_POST['termino'];

		if(!empty($nombre_empresa) && !empty($ubicacion) && !empty($año_creacion) && !empty($sector) && !empty($giro) && !empty($tamaño) && !empty($n_empleados) && !empty($tipo) && !empty($modalidad) && !empty($alcance) && !empty($area_conocimiento) && !empty($inicio) && !empty($termino) ){
		    }else{
				$consulta_insert=$con->prepare('INSERT INTO convenios_vinculacion (nombre_empresa,ubicacion,año_creacion,sector,giro,tamaño,n_empleados,tipo,modalidad,alcance,area_conocimiento,inicio,termino) VALUES(:nombre_empresa,:ubicacion,:año_creacion,:sector,:giro,:tamaño,:n_empleados,:tipo,:modalidad,:alcance,:area_conocimiento,:inicio,:termino)');
				$consulta_insert->execute(array(
					':nombre_empresa' =>$nombre_empresa,
					':ubicacion' =>$ubicacion,
					':año_creacion' =>$año_creacion,
					':sector' =>$sector,
					':giro' =>$giro,
					':tamaño' =>$tamaño,
					':n_empleados' =>$n_empleados,
					':tipo' =>$tipo,
					':modalidad' =>$modalidad,
					':alcance' =>$alcance,
					':area_conocimiento' =>$area_conocimiento,
					':inicio' =>$inicio,
					':termino' =>$termino
				));
				header('Location: convenios_vinculacion.php');
			}
		}
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="../CSS/style.css">
</head>
<body>
	<div class="contenedor">
		<h2>NUEVO CONVENIO</h2>
		<form action="" method="POST">
			<div class="form-group">
				<input type="text" name="nombre_empresa" placeholder="NOMBRE DE LA EMPRESA" class="input__text">
				<input type="text" name="ubicacion" placeholder="UBICACION" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="año_creacion" placeholder="AÑO DE CREACION" class="input__text">
				<input type="text" name="sector" placeholder="SECTOR" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="giro" placeholder="GIRO" class="input__text">
				<input type="text" name="tamaño" placeholder="TAMAÑO" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="n_empleados" placeholder="N° DE EMPLEADOS" class="input__text">
				<input type="text" name="tipo" placeholder="TIPO" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="modalidad" placeholder="MODALIDAD" class="input__text">
				<input type="text" name="alcance" placeholder="ALCANCE" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="area_conocimiento" placeholder="AREA DEL CONOCIMIENTO" class="input__text">
				<input type="text" name="inicio" placeholder="INICIO" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="termino" placeholder="TERMINO" class="input__text">
			</div>
			<div class="btn__group">
				<a href="convenios_vinculacion.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>
</body>
</html>
