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

		$buscar_id=$con->prepare('SELECT * FROM egresados_titulados WHERE id=:id LIMIT 1');
		$buscar_id->execute(array(
			':id'=>$id
		));
		$resultado=$buscar_id->fetch();
	}else{
		header('Location: egresados_tituladosu.php');
	}


	if(isset($_POST['guardar'])){
		$programa=$_POST['programa'];
		$modalidad=$_POST['modalidad'];
		$hombres_egresados=$_POST['hombres_egresados'];
		$mujeres_egresados=$_POST['mujeres_egresados'];
		$hombres_titulados=$_POST['hombres_titulados'];
		$mujeres_titulados=$_POST['mujeres_titulados'];
		$id=(int) $_GET['id'];

		if(!empty($programa) && !empty($modalidad) && !empty($hombres_egresados) && !empty($mujeres_egresados) && !empty($hombres_titulados) && !empty($mujeres_titulados) ){
			
				$consulta_update=$con->prepare(' UPDATE egresados_titulados SET  
					programa=:programa,
					modalidad=:modalidad,
					hombres_egresados=:hombres_egresados,
					mujeres_egresados=:mujeres_egresados,
					hombres_titulados=:hombres_titulados,
					mujeres_titulados=:mujeres_titulados
					WHERE id=:id;'
				);
				$consulta_update->execute(array(
					':programa' =>$programa,
					':modalidad' =>$modalidad,
					':hombres_egresados' =>$hombres_egresados,
					':mujeres_egresados' =>$mujeres_egresados,
					':hombres_titulados' =>$hombres_titulados,
					':mujeres_titulados' =>$mujeres_titulados,
					':id' =>$id
				));
				header('Location: egresados_tituladosu.php');
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
		<h2>ACTUALIZAR EGRESADOS/TITULADOS</h2>
		<form action="" method="post">
			<div class="form-group">
				<input type="text" name="programa" placeholder="PROGRAMA" value="<?php if($resultado) echo $resultado['programa']; ?>" class="input__text">
				<input type="text" name="modalidad" placeholder="MODALIDAD" value="<?php if($resultado) echo $resultado['modalidad']; ?>" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="hombres_egresados" placeholder="HOMBRES EGRESADOS" value="<?php if($resultado) echo $resultado['hombres_egresados']; ?>" class="input__text">
				<input type="text" name="mujeres_egresados" placeholder="MUJERES EGRESADAS" value="<?php if($resultado) echo $resultado['mujeres_egresados']; ?>" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="hombres_titulados" placeholder="HOMBRES TITULADOS" value="<?php if($resultado) echo $resultado['hombres_titulados']; ?>" class="input__text">
				<input type="text" name="mujeres_titulados" placeholder="MUJERES TITULADAS" value="<?php if($resultado) echo $resultado['mujeres_titulados']; ?>" class="input__text">
			</div>
			<div class="btn__group">
				<a href="egresados_tituladosu.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>
</body>
</html>
