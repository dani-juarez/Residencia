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

	if(isset($_GET['id'])){
		$id=(int) $_GET['id'];

		$buscar_id=$con->prepare('SELECT * FROM extraescolares WHERE id=:id LIMIT 1');
		$buscar_id->execute(array(
			':id'=>$id
		));
		$resultado=$buscar_id->fetch();
	}else{
		header('Location: extraescolares.php');
	}


	if(isset($_POST['guardar'])){
		$actividad=$_POST['actividad'];
		$hombres=$_POST['hombres'];
		$mujeres=$_POST['mujeres'];
		$total=$_POST['total'];
		$id=(int) $_GET['id'];

		if(!empty($actividad) && !empty($hombres) && !empty($mujeres) && !empty($total) ){
			
				$consulta_update=$con->prepare(' UPDATE extraescolares SET  
					actividad=:actividad,
					hombres=:hombres,
					mujeres=:mujeres,
					total=:total
					WHERE id=:id;'
				);
				$consulta_update->execute(array(
					':actividad' =>$actividad,
					':hombres' =>$hombres,
					':mujeres' =>$mujeres,
					':total' =>$total,
					':id' =>$id
				));
				header('Location: extraescolares.php');
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
		<h2>ACTUALIZAR ACTIVIDAD</h2>
		<form action="" method="post">
			<div class="form-group">
				<input type="text" name="actividad" placeholder="ACTIVIDAD" value="<?php if($resultado) echo $resultado['actividad']; ?>" class="input__text">
				<input type="text" name="hombres" placeholder="HOMBRES" value="<?php if($resultado) echo $resultado['hombres']; ?>" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="mujeres" placeholder="MUJERES" value="<?php if($resultado) echo $resultado['mujeres']; ?>" class="input__text">
				<input type="text" name="total" placeholder="TOTAL" value="<?php if($resultado) echo $resultado['total']; ?>" class="input__text">
			</div>
			<div class="btn__group">
				<a href="extraescolares.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>
</body>
</html>
