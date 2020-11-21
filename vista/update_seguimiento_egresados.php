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

		$buscar_id=$con->prepare('SELECT * FROM seguimiento_egresados WHERE id=:id LIMIT 1');
		$buscar_id->execute(array(
			':id'=>$id
		));
		$resultado=$buscar_id->fetch();
	}else{
		header('Location: seguimiento_egresados.php');
	}


	if(isset($_POST['guardar'])){
		$programa=$_POST['programa'];
        $nivel=$_POST['nivel'];
        $educativo=$_POST['educativo'];
        $primario=$_POST['primario'];
        $secundario=$_POST['secundario'];
        $terciario=$_POST['terciario'];
        $publica=$_POST['publica'];
        $privada=$_POST['privada'];
        $si=$_POST['si'];
        $noo=$_POST['noo'];
        $parcial=$_POST['parcial'];
		$id=(int) $_GET['id'];

		if(!empty($programa) && !empty($nivel) && !empty($educativo) && !empty($primario) && !empty($secundario) && !empty($terciario) && !empty($publica) && !empty($privada) && !empty($si) && !empty($noo) && !empty($parcial) ){
				$consulta_update=$con->prepare(' UPDATE seguimiento_egresados SET  
					programa=:programa,
					nivel=:nivel,
                    educativo=:educativo,
                    primario=:primario,
                    secundario=:secundario,
                    terciario=:terciario,
                    publica=:publica,
                    privada=:privada,
                    si=:si,
                    noo=:noo,
                    parcial=:parcial
					WHERE id=:id;'
				);
				$consulta_update->execute(array(
					':programa' =>$programa,
                    ':nivel' =>$nivel,
                    ':educativo' =>$educativo,
                    ':primario' =>$primario,
                    ':secundario' =>$secundario,
                    ':terciario' =>$terciario,
                    ':publica' =>$publica,
                    ':privada' =>$privada,
                    ':si' =>$si,
                    ':noo' =>$noo,
                    ':parcial' =>$parcial,
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
				<input type="text" name="programa" placeholder="PROGRAMA" value="<?php if($resultado) echo $resultado['programa']; ?>" class="input__text">
				<input type="text" name="nivel" placeholder="NIVEL" value="<?php if($resultado) echo $resultado['nivel']; ?>" class="input__text">
			</div>
            <div class="form-group">
				<input type="text" name="educativo" placeholder="EDUCATIVO" value="<?php if($resultado) echo $resultado['educativo']; ?>" class="input__text">
				<input type="text" name="primario" placeholder="PRIMARIO" value="<?php if($resultado) echo $resultado['primario']; ?>" class="input__text">
			</div>
            <div class="form-group">
				<input type="text" name="secundario" placeholder="SECUNDARIO" value="<?php if($resultado) echo $resultado['secundario']; ?>" class="input__text">
				<input type="text" name="terciario" placeholder="TERCIARIO" value="<?php if($resultado) echo $resultado['terciario']; ?>" class="input__text">
			</div>
            <div class="form-group">
				<input type="text" name="publica" placeholder="PUBLICA" value="<?php if($resultado) echo $resultado['publica']; ?>" class="input__text">
				<input type="text" name="privada" placeholder="PRIVADA" value="<?php if($resultado) echo $resultado['privada']; ?>" class="input__text">
			</div>
            <div class="form-group">
				<input type="text" name="si" placeholder="SI" value="<?php if($resultado) echo $resultado['si']; ?>" class="input__text">
				<input type="text" name="noo" placeholder="NO" value="<?php if($resultado) echo $resultado['noo']; ?>" class="input__text">
			</div>
            <div class="form-group">
				<input type="text" name="parcial" placeholder="PARCIAL" value="<?php if($resultado) echo $resultado['parcial']; ?>" class="input__text">
			</div>
			<div class="btn__group">
				<a href="seguimiento_egresados.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>
</body>
</html>