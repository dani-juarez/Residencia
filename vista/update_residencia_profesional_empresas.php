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

	if(isset($_GET['id'])){
		$id=(int) $_GET['id'];

		$buscar_id=$con->prepare('SELECT * FROM residencia_profesional_empresas WHERE id=:id LIMIT 1');
		$buscar_id->execute(array(
			':id'=>$id
		));
		$resultado=$buscar_id->fetch();
	}else{
		header('Location: servicio_social_residencia_profesionalu.php');
	}


	if(isset($_POST['guardar'])){
		$empresas=$_POST['empresas'];
		$nombre_proyecto=$_POST['nombre_proyecto'];
		$creacion=$_POST['creacion'];
		$hombres_total=$_POST['hombres_total'];
        $mujeres_total=$_POST['mujeres_total'];
        $total=$_POST['total'];
		$id=(int) $_GET['id'];

		if(!empty($empresas) && !empty($nombre_proyecto) && !empty($creacion) && !empty($hombres_total) && !empty($mujeres_total) && !empty($total) ){

				$consulta_update=$con->prepare(' UPDATE residencia_profesional_empresas SET  
					empresas=:empresas,
					nombre_proyecto=:nombre_proyecto,
					creacion=:creacion,
					hombres_total=:hombres_total,
					mujeres_total=:mujeres_total,
                    total=:total
					WHERE id=:id;'
				);
				$consulta_update->execute(array(
					':empresas' =>$empresas,
					':nombre_proyecto' =>$nombre_proyecto,
					':creacion' =>$creacion,
					':hombres_total' =>$hombres_total,
                    ':mujeres_total' =>$mujeres_total,
                    ':total' =>$total,
					':id' =>$id
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
		<h2>ACTUALIZAR RESIDENCIA PROFESIONAL EMPRESAS</h2>
		<form action="" method="post">
			<div class="form-group">
				<input type="text" name="empresas" placeholder="EMPRESAS PARTICIPANTES" value="<?php if($resultado) echo $resultado['empresas']; ?>" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="nombre_proyecto" placeholder="NOMBRE DEL PROYECTO" value="<?php if($resultado) echo $resultado['nombre_proyecto']; ?>" class="input__text">
				<input type="text" name="creacion" placeholder="AÑO DE CREACION DE EMPRESA" value="<?php if($resultado) echo $resultado['creacion']; ?>" class="input__text">
			</div>
			<div class="form-group">
                <input type="text" name="hombres_total" placeholder="TOTAL HOMBRES" value="<?php if($resultado) echo $resultado['hombres_total']; ?>" class="input__text">
                <input type="text" name="mujeres_total" placeholder="TOTAL MUJERES" value="<?php if($resultado) echo $resultado['mujeres_total']; ?>" class="input__text">
                <input type="text" name="total" placeholder="TOTAL" value="<?php if($resultado) echo $resultado['total']; ?>" class="input__text">
			</div>
			<div class="btn__group">
				<a href="servicio_social_residencia_profesionalu.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>
</body>
</html>
