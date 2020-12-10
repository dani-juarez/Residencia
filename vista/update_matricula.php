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

		$buscar_id=$con->prepare('SELECT * FROM matricula WHERE id=:id LIMIT 1');
		$buscar_id->execute(array(
			':id'=>$id
		));
		$resultado=$buscar_id->fetch();
	}else{
		header('Location: matriculau.php');
	}


	if(isset($_POST['guardar'])){
		$programa=$_POST['programa'];
        $hombre_nuevo=$_POST['hombre_nuevo'];
        $mujer_nuevo=$_POST['mujer_nuevo'];
        $hombre_reingreso=$_POST['hombre_reingreso'];
        $mujer_reingreso=$_POST['mujer_reingreso'];
		$id=(int) $_GET['id'];

		if(!empty($programa) && !empty($hombre_nuevo) && !empty($mujer_nuevo) && !empty($hombre_reingreso) && !empty($mujer_reingreso) ){
				$consulta_update=$con->prepare(' UPDATE matricula SET  
					programa=:programa,
					hombre_nuevo=:hombre_nuevo,
                    mujer_nuevo=:mujer_nuevo,
                    hombre_reingreso=:hombre_reingreso,
                    mujer_reingreso=:mujer_reingreso
					WHERE id=:id;'
				);
				$consulta_update->execute(array(
					':programa' =>$programa,
                    ':hombre_nuevo' =>$hombre_nuevo,
                    ':mujer_nuevo' =>$mujer_nuevo,
                    ':hombre_reingreso' =>$hombre_reingreso,
                    ':mujer_reingreso' =>$mujer_reingreso,
					':id' =>$id
				));
				header('Location: matriculau.php');
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
				<input type="text" name="programa" placeholder="PROGRAMA" value="<?php if($resultado) echo $resultado['programa']; ?>" class="input__text">
			</div>
            <div class="form-group">
				<input type="text" name="hombre_nuevo" placeholder="HOMBRE NUEVO" value="<?php if($resultado) echo $resultado['hombre_nuevo']; ?>" class="input__text">
                <input type="text" name="mujer_nuevo" placeholder="MUJER NUEVO" value="<?php if($resultado) echo $resultado['mujer_nuevo']; ?>" class="input__text">
			</div>
            <div class="form-group">
				<input type="text" name="hombre_reingreso" placeholder="HOMBRE REINGRESO" value="<?php if($resultado) echo $resultado['hombre_reingreso']; ?>" class="input__text">
                <input type="text" name="mujer_reingreso" placeholder="MUJER REINGRESO" value="<?php if($resultado) echo $resultado['mujer_reingreso']; ?>" class="input__text">
			</div>
			<div class="btn__group">
				<a href="matriculau.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>
</body>
</html>