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

		$buscar_id=$con->prepare('SELECT * FROM centro_computo WHERE id=:id LIMIT 1');
		$buscar_id->execute(array(
			':id'=>$id
		));
		$resultado=$buscar_id->fetch();
	}else{
		header('Location: centro_computou.php');
	}


	if(isset($_POST['guardar'])){
		$concepto=$_POST['concepto'];
		$cantidad=$_POST['cantidad'];
		$id=(int) $_GET['id'];

		if(!empty($concepto) && !empty($cantidad) ){
				$consulta_update=$con->prepare(' UPDATE centro_computo SET  
					concepto=:concepto,
					cantidad=:cantidad
					WHERE id=:id;'
				);
				$consulta_update->execute(array(
					':concepto' =>$concepto,
					':cantidad' =>$cantidad,
					':id' =>$id
				));
				header('Location: centro_computou.php');
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
		<h2>ACTUALIZAR CONCEPTO</h2>
		<form action="" method="post">
			<div class="form-group">
				<input type="text" name="concepto" placeholder="CONCEPTO" value="<?php if($resultado) echo $resultado['concepto']; ?>" class="input__text">
				<input type="text" name="cantidad" placeholder="CANTIDAD" value="<?php if($resultado) echo $resultado['cantidad']; ?>" class="input__text">
			</div>
			<div class="btn__group">
				<a href="centro_computou.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>
</body>
</html>
