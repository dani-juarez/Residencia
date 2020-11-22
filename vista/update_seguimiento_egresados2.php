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

		$buscar_id=$con->prepare('SELECT * FROM seguimiento_egresados2 WHERE id=:id LIMIT 1');
		$buscar_id->execute(array(
			':id'=>$id
		));
		$resultado=$buscar_id->fetch();
	}else{
		header('Location: seguimiento_egresados.php');
	}


	if(isset($_POST['guardar'])){
		$programa2=$_POST['programa2'];
        $nivel2=$_POST['nivel2'];
        $educativo2=$_POST['educativo2'];
        $primario2=$_POST['primario2'];
        $secundario2=$_POST['secundario2'];
        $terciario2=$_POST['terciario2'];
        $publica2=$_POST['publica2'];
        $privada2=$_POST['privada2'];
        $si2=$_POST['si2'];
        $noo2=$_POST['noo2'];
        $parcial2=$_POST['parcial2'];
		$id=(int) $_GET['id'];

		if(!empty($programa2) && !empty($nivel2) && !empty($educativo2) && !empty($primario2) && !empty($secundario2) && !empty($terciario2) && !empty($publica2) && !empty($privada2) && !empty($si2) && !empty($noo2) && !empty($parcial2) ){
		}else{
				$consulta_update=$con->prepare(' UPDATE seguimiento_egresados2 SET  
					programa2=:programa2,
					nivel2=:nivel2,
                    educativo2=:educativo2,
                    primario2=:primario2,
                    secundario2=:secundario2,
                    terciario2=:terciario2,
                    publica2=:publica2,
                    privada2=:privada2,
                    si2=:si2,
                    noo2=:noo2,
                    parcial2=:parcial2
					WHERE id=:id;'
				);
				$consulta_update->execute(array(
					':programa2' =>$programa2,
                    ':nivel2' =>$nivel2,
                    ':educativo2' =>$educativo2,
                    ':primario2' =>$primario2,
                    ':secundario2' =>$secundario2,
                    ':terciario2' =>$terciario2,
                    ':publica2' =>$publica2,
                    ':privada2' =>$privada2,
                    ':si2' =>$si2,
                    ':noo2' =>$noo2,
                    ':parcial2' =>$parcial2,
					':id' =>$id
				));
				header('Location: seguimiento_egresados.php');
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
		<h2>ACTUALIZAR SEGUIMIENTO</h2>
		<form action="" method="post">
			<div class="form-group">
				<input type="text" name="programa2" placeholder="PROGRAMA" value="<?php if($resultado) echo $resultado['programa2']; ?>" class="input__text">
				<input type="text" name="nivel2" placeholder="NIVEL" value="<?php if($resultado) echo $resultado['nivel2']; ?>" class="input__text">
			</div>
            <div class="form-group">
				<input type="text" name="educativo2" placeholder="EDUCATIVO" value="<?php if($resultado) echo $resultado['educativo2']; ?>" class="input__text">
				<input type="text" name="primario2" placeholder="PRIMARIO" value="<?php if($resultado) echo $resultado['primario2']; ?>" class="input__text">
			</div>
            <div class="form-group">
				<input type="text" name="secundario2" placeholder="SECUNDARIO" value="<?php if($resultado) echo $resultado['secundario2']; ?>" class="input__text">
				<input type="text" name="terciario2" placeholder="TERCIARIO" value="<?php if($resultado) echo $resultado['terciario2']; ?>" class="input__text">
			</div>
            <div class="form-group">
				<input type="text" name="publica2" placeholder="PUBLICA" value="<?php if($resultado) echo $resultado['publica2']; ?>" class="input__text">
				<input type="text" name="privada2" placeholder="PRIVADA" value="<?php if($resultado) echo $resultado['privada2']; ?>" class="input__text">
			</div>
            <div class="form-group">
				<input type="text" name="si2" placeholder="SI" value="<?php if($resultado) echo $resultado['si2']; ?>" class="input__text">
				<input type="text" name="noo2" placeholder="NO" value="<?php if($resultado) echo $resultado['noo2']; ?>" class="input__text">
			</div>
            <div class="form-group">
				<input type="text" name="parcial2" placeholder="PARCIAL" value="<?php if($resultado) echo $resultado['parcial2']; ?>" class="input__text">
			</div>
			<div class="btn__group">
				<a href="seguimiento_egresados.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>
</body>
</html>