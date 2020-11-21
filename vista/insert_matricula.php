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
	
	if(isset($_POST['guardar'])){
		$programa=$_POST['programa'];
        $hombre_nuevo=$_POST['hombre_nuevo'];
        $mujer_nuevo=$_POST['mujer_nuevo'];
        $hombre_reingreso=$_POST['hombre_reingreso'];
        $mujer_reingreso=$_POST['mujer_reingreso'];

		if(!empty($programa) && !empty($hombre_nuevo) && !empty($mujer_nuevo) && !empty($hombre_reingreso) && !empty($mujer_reingreso) )
				$consulta_insert=$con->prepare('INSERT INTO matricula (programa,hombre_nuevo,mujer_nuevo,hombre_reingreso,mujer_reingreso) VALUES(:programa,:hombre_nuevo,:mujer_nuevo,:hombre_reingreso,:mujer_reingreso)');
				$consulta_insert->execute(array(
					':programa' =>$programa,
                    ':hombre_nuevo' =>$hombre_nuevo,
                    ':mujer_nuevo' =>$mujer_nuevo,
                    ':hombre_reingreso' =>$hombre_reingreso,
                    ':mujer_reingreso' =>$mujer_reingreso,
				));
				header('Location: matricula.php');
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
		<h2>Nuevo Registro</h2>
		<form action="" method="post">
			<div class="form-group">
				<input type="text" name="programa" placeholder="PROGRAMA" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="hombre_nuevo" placeholder="NUEVO INGRESO HOMBRE" class="input__text">
                <input type="text" name="mujer_nuevo" placeholder="NUEVO INGRESO MUJER" class="input__text">
			</div>
            <div class="form-group">
				<input type="text" name="hombre_reingreso" placeholder="REINGRESO HOMBRE" class="input__text">
                <input type="text" name="mujer_reingreso" placeholder="REINGRESO MUJER" class="input__text">
			</div>
			<div class="btn__group">
				<a href="matricula.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>
</body>
</html>
