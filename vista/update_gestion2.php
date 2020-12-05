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

		$buscar_id=$con->prepare('SELECT * FROM gestion_empresarial2 WHERE id=:id LIMIT 1');
		$buscar_id->execute(array(
			':id'=>$id
		));
		$resultado=$buscar_id->fetch();
	}else{
		header('Location: alumnos_edad_genero.php');
	}


	if(isset($_POST['guardar'])){
		$edad=$_POST['edad'];
		$hombres=$_POST['hombres'];
		$mujeres=$_POST['mujeres'];
		$hombres_dis=$_POST['hombres_dis'];
        $mujeres_dis=$_POST['mujeres_dis'];
        $hombres_total=$_POST['hombres_total'];
        $mujeres_total=$_POST['mujeres_total'];
        $total=$_POST['total'];
		$id=(int) $_GET['id'];

		if(!empty($edad) && !empty($hombres) && !empty($mujeres) && !empty($hombres_dis) && !empty($mujeres_dis) && !empty($hombres_total) && !empty($mujeres_total) && !empty($total) ){

				$consulta_update=$con->prepare(' UPDATE gestion_empresarial2 SET  
					edad=:edad,
					hombres=:hombres,
					mujeres=:mujeres,
					hombres_dis=:hombres_dis,
					mujeres_dis=:mujeres_dis,
                    hombres_total=:hombres_total,
                    mujeres_total=:mujeres_total,
                    total=:total
					WHERE id=:id;'
				);
				$consulta_update->execute(array(
					':edad' =>$edad,
					':hombres' =>$hombres,
					':mujeres' =>$mujeres,
					':hombres_dis' =>$hombres_dis,
                    ':mujeres_dis' =>$mujeres_dis,
                    ':hombres_total' =>$hombres_total,
                    ':mujeres_total' =>$mujeres_total,
                    ':total' =>$total,
					':id' =>$id
				));
				header('Location: alumnos_edad_genero.php');
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
		<h2>ACTUALIZAR INGENIERIA EN GESTION EMPRESARIAL</h2>
		<form action="" method="post">
			<div class="form-group">
				<input type="text" name="edad" placeholder="EDAD" value="<?php if($resultado) echo $resultado['edad']; ?>" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="hombres" placeholder="HOMBRES" value="<?php if($resultado) echo $resultado['hombres']; ?>" class="input__text">
				<input type="text" name="mujeres" placeholder="MUJERES" value="<?php if($resultado) echo $resultado['mujeres']; ?>" class="input__text">
            </div>
            <div class="form-group">
				<input type="text" name="hombres_dis" placeholder="HOMBRES CON DISCAPACIDAD" value="<?php if($resultado) echo $resultado['hombres_dis']; ?>" class="input__text">
				<input type="text" name="mujeres_dis" placeholder="MUJERES CON DISCAPACIDAD" value="<?php if($resultado) echo $resultado['mujeres_dis']; ?>" class="input__text">
			</div>
			<div class="form-group">
                <input type="text" name="hombres_total" placeholder="HOMBRES TOTAL" value="<?php if($resultado) echo $resultado['hombres_total']; ?>" class="input__text">
                <input type="text" name="mujeres_total" placeholder="MUJERES TOTAL" value="<?php if($resultado) echo $resultado['mujeres_total']; ?>" class="input__text">
                <input type="text" name="total" placeholder="TOTAL" value="<?php if($resultado) echo $resultado['total']; ?>" class="input__text">
			</div>
			<div class="btn__group">
				<a href="alumnos_edad_genero.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>
</body>
</html>
