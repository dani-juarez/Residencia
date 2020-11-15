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

	if(isset($_GET['id'])){
		$id=(int) $_GET['id'];

		$buscar_id=$con->prepare('SELECT * FROM responsables WHERE id=:id LIMIT 1');
		$buscar_id->execute(array(
			':id'=>$id
		));
		$resultado=$buscar_id->fetch();
	}else{
		header('Location: i-basicos.php');
	}


	if(isset($_POST['guardar'])){
		$responsable=$_POST['responsable'];
		$departamento=$_POST['departamento'];
		$id=(int) $_GET['id'];

		if(!empty($responsable) && !empty($departamento)){
			}else{
				$consulta_update=$con->prepare(' UPDATE responsables SET  
					responsable=:responsable,
					departamento=:departamento,
					WHERE id=:id;'
				);
				$consulta_update->execute(array(
					':responsable' =>$responsable,
					':departamento' =>$departamento,
					':id' =>$id
				));
				header('Location: i-basicos.php');
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
		<h2>ACTUALIZAR RESPONSABLE</h2>
		<form action="" method="post">
			<div class="form-group">
				<input type="text" name="responsable" placeholder="Responsable" value="<?php if($resultado) echo $resultado['responsable']; ?>" class="input__text">
				<input type="text" name="departamento" placeholder="Departamento" value="<?php if($resultado) echo $resultado['departamento']; ?>" class="input__text">
			</div>
			<div class="btn__group">
				<a href="i-basicos.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>
</body>
</html>