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

		$buscar_id=$con->prepare('SELECT * FROM conformidad2 WHERE id=:id LIMIT 1');
		$buscar_id->execute(array(
			':id'=>$id
		));
		$resultado=$buscar_id->fetch();
	}else{
		header('Location: conformidad_aprendizajeu.php');
	}


	if(isset($_POST['guardar'])){
		$programa=$_POST['programa'];
		$asignados=$_POST['asignados'];
		$aprobados=$_POST['aprobados'];
		$id=(int) $_GET['id'];

		if(!empty($programa) && !empty($asignados) && !empty($aprobados) ){
			
				$consulta_update=$con->prepare(' UPDATE conformidad2 SET  
					programa=:programa,
					asignados=:asignados,
					aprobados=:aprobados
					WHERE id=:id;'
				);
				$consulta_update->execute(array(
					':programa' =>$programa,
					':asignados' =>$asignados,
					':aprobados' =>$aprobados,
					':id' =>$id
				));
				header('Location: conformidad_aprendizajeu.php');
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
		<h2>ACTUALIZAR CONFORMIDAD</h2>
		<form action="" method="post">
			<div class="form-group">
				<input type="text" name="programa" placeholder="PROGRAMA" value="<?php if($resultado) echo $resultado['programa']; ?>" class="input__text">
				<input type="text" name="asignados" placeholder="ASIGNADOS" value="<?php if($resultado) echo $resultado['asignados']; ?>" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="aprobados" placeholder="APROBADOS" value="<?php if($resultado) echo $resultado['aprobados']; ?>" class="input__text">
			</div>
			<div class="btn__group">
				<a href="conformidad_aprendizajeu.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>
</body>
</html>
