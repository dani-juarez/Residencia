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

		$buscar_id=$con->prepare('SELECT * FROM modelo_talento_emprendedor WHERE id=:id LIMIT 1');
		$buscar_id->execute(array(
			':id'=>$id
		));
		$resultado=$buscar_id->fetch();
	}else{
		header('Location: modelo_talento_emprendedor.php');
	}


	if(isset($_POST['guardar'])){
		$indicador=$_POST['indicador'];
		$resultado=$_POST['resultado'];
		$id=(int) $_GET['id'];

		if(!empty($indicador) && !empty($resultado)){
		    }else{
				$consulta_update=$con->prepare(' UPDATE modelo_talento_emprendedor SET  
					indicador=:indicador,
					resultado=:resultado
					WHERE id=:id;'
				);
				$consulta_update->execute(array(
					':indicador' =>$indicador,
					':resultado' =>$resultado,
					':id' =>$id
				));
				header('Location: modelo_talento_emprendedor.php');
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
		<h2>ACTUALIZAR MODELO TALENTO EMPRENDEDOR</h2>
		<form action="" method="post">
			<div class="form-group">
				<input type="text" name="indicador" placeholder="INDICADOR" value="<?php if($resultado) echo $resultado['indicador']; ?>" class="input__text">
				<input type="text" name="resultado" placeholder="RESULTADO" value="<?php if($resultado) echo $resultado['resultado']; ?>" class="input__text">
			</div>
			<div class="btn__group">
				<a href="modelo_talento_emprendedor.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>
</body>
</html>