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

		$buscar_id=$con->prepare('SELECT * FROM solicitantes2 WHERE id=:id LIMIT 1');
		$buscar_id->execute(array(
			':id'=>$id
		));
		$resultado=$buscar_id->fetch();
	}else{
		header('Location: solicitantesu.php');
	}


	if(isset($_POST['guardar'])){
		$programa=$_POST['programa'];
		$modalidad=$_POST['modalidad'];
		$capacidad_instalada=$_POST['capacidad_instalada'];
		$hombres_solicitantes=$_POST['hombres_solicitantes'];
		$mujeres_solicitantes=$_POST['mujeres_solicitantes'];
		$hombres_aceptados=$_POST['hombres_aceptados'];
		$mujeres_aceptados=$_POST['mujeres_aceptados'];
		$id=(int) $_GET['id'];

		if(!empty($programa) && !empty($modalidad) && !empty($capacidad_instalada) && !empty($hombres_solicitantes) && !empty($mujeres_solicitantes) && !empty($hombres_aceptados) && !empty($mujeres_aceptados) ){
				$consulta_update=$con->prepare(' UPDATE solicitantes2 SET  
					programa=:programa,
					modalidad=:modalidad,
					capacidad_instalada=:capacidad_instalada,
					hombres_solicitantes=:hombres_solicitantes,
					mujeres_solicitantes=:mujeres_solicitantes,
					hombres_aceptados=:hombres_aceptados,
					mujeres_aceptados=:mujeres_aceptados
					WHERE id=:id;'
				);
				$consulta_update->execute(array(
					':programa' =>$programa,
					':modalidad' =>$modalidad,
					':capacidad_instalada' =>$capacidad_instalada,
					':hombres_solicitantes' =>$hombres_solicitantes,
					':mujeres_solicitantes' =>$mujeres_solicitantes,
					':hombres_aceptados' =>$hombres_aceptados,
					':mujeres_aceptados' =>$mujeres_aceptados,
					':id' =>$id
				));
				header('Location: solicitantesu.php');
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
		<h2>ACTUALIZAR SOLICITUD</h2>
		<form action="" method="post">
			<div class="form-group">
				<input type="text" name="programa" placeholder="PROGRAMA" value="<?php if($resultado) echo $resultado['programa']; ?>" class="input__text">
				<input type="text" name="modalidad" placeholder="MODALIDAD" value="<?php if($resultado) echo $resultado['modalidad']; ?>" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="capacidad_instalada" placeholder="CAPACIDAD INSTALADA" value="<?php if($resultado) echo $resultado['capacidad_instalada']; ?>" class="input__text">
				<input type="text" name="hombres_solicitantes" placeholder="SOLICITUD HOMBRES" value="<?php if($resultado) echo $resultado['hombres_solicitantes']; ?>" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="mujeres_solicitantes" placeholder="SOLICITUD MUJERES" value="<?php if($resultado) echo $resultado['mujeres_solicitantes']; ?>" class="input__text">
				<input type="text" name="hombres_aceptados" placeholder="HOMBRES ACEPTADOS" value="<?php if($resultado) echo $resultado['hombres_aceptados']; ?>" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="mujeres_aceptados" placeholder="MUJERES ACEPTADAS" value="<?php if($resultado) echo $resultado['mujeres_aceptados']; ?>" class="input__text">
			</div>
			<div class="btn__group">
				<a href="solicitantesu.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>
</body>
</html>
