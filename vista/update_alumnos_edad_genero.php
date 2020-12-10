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

		$buscar_id=$con->prepare('SELECT * FROM alumnos_edad_genero WHERE id=:id LIMIT 1');
		$buscar_id->execute(array(
			':id'=>$id
		));
		$resultado=$buscar_id->fetch();
	}else{
		header('Location: alumnos_edad_gererou.php');
	}


	if(isset($_POST['guardar'])){
		$programa=$_POST['programa'];
		$modalidad=$_POST['modalidad'];
		$hombres_nuevos=$_POST['hombres_nuevos'];
		$mujeres_nuevos=$_POST['mujeres_nuevos'];
        $hombres_re=$_POST['hombres_re'];
        $mujeres_re=$_POST['mujeres_re'];
        $total=$_POST['total'];
        $hombres_dis=$_POST['hombres_dis'];
        $mujeres_dis=$_POST['mujeres_dis'];
        $hombres_lengua=$_POST['hombres_lengua'];
        $mujeres_lengua=$_POST['mujeres_lengua'];
		$id=(int) $_GET['id'];

        if(!empty($programa) && !empty($modalidad) && !empty($hombres_nuevos) && !empty($mujeres_nuevos) && !empty($hombres_re) && !empty($mujeres_re) && !empty($total) && !empty($hombres_dis) && !empty($mujeres_dis) && !empty($hombres_lengua) && !empty($mujeres_lengua) ){

				$consulta_update=$con->prepare(' UPDATE alumnos_edad_genero SET  
					programa=:programa,
					modalidad=:modalidad,
					hombres_nuevos=:hombres_nuevos,
                    mujeres_nuevos=:mujeres_nuevos,
					hombres_re=:hombres_re,
                    mujeres_re=:mujeres_re,
                    total=:total,
                    hombres_dis=:hombres_dis,
                    mujeres_dis=:mujeres_dis,
                    hombres_lengua=:hombres_lengua,
                    mujeres_lengua=:mujeres_lengua
					WHERE id=:id;'
				);
				$consulta_update->execute(array(
					':programa' =>$programa,
					':modalidad' =>$modalidad,
					':hombres_nuevos' =>$hombres_nuevos,
					':mujeres_nuevos' =>$mujeres_nuevos,
                    ':hombres_re' =>$hombres_re,
                    ':mujeres_re' =>$mujeres_re,
                    ':total' =>$total,
                    ':hombres_dis' =>$hombres_dis,
                    ':mujeres_dis' =>$mujeres_dis,
                    ':hombres_lengua' =>$hombres_lengua,
                    ':mujeres_lengua' =>$mujeres_lengua,
					':id' =>$id
				));
				header('Location: alumnos_edad_generou.php');
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
		<h2>ACTUALIZAR ALUMNOS, EDAD, GENERO</h2>
		<form action="" method="post">
			<div class="form-group">
				<input type="text" name="programa" placeholder="PROGRAMA" value="<?php if($resultado) echo $resultado['programa']; ?>" class="input__text">
				<input type="text" name="modalidad" placeholder="MODALIDAD" value="<?php if($resultado) echo $resultado['modalidad']; ?>" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="hombres_nuevos" placeholder="HOMBRES NUEVO INGRESO" value="<?php if($resultado) echo $resultado['hombres_nuevos']; ?>" class="input__text">
				<input type="text" name="mujeres_nuevos" placeholder="MUJERES NUEVO INGRESO" value="<?php if($resultado) echo $resultado['mujeres_nuevos']; ?>" class="input__text">
            </div>
            <div class="form-group">
				<input type="text" name="hombres_re" placeholder="HOMBRES REINGRESO" value="<?php if($resultado) echo $resultado['hombres_re']; ?>" class="input__text">
				<input type="text" name="mujeres_re" placeholder="MUJERES REINGRESO" value="<?php if($resultado) echo $resultado['mujeres_re']; ?>" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="total" placeholder="TOTAL" value="<?php if($resultado) echo $resultado['total']; ?>" class="input__text">
            </div>
            <div class="form-group">
				<input type="text" name="hombres_dis" placeholder="HOMBRES CON DISCAPACIDAD" value="<?php if($resultado) echo $resultado['hombres_dis']; ?>" class="input__text">
				<input type="text" name="mujeres_dis" placeholder="MUJERES CON DISCAPACIDAD" value="<?php if($resultado) echo $resultado['mujeres_dis']; ?>" class="input__text">
            </div>
            <div class="form-group">
				<input type="text" name="hombres_lengua" placeholder="HOMBRES HABLANTES DE UNA LENGUA" value="<?php if($resultado) echo $resultado['hombres_lengua']; ?>" class="input__text">
				<input type="text" name="mujeres_lengua" placeholder="MUJERES HABLANTES DE UNA LENGUA" value="<?php if($resultado) echo $resultado['mujeres_lengua']; ?>" class="input__text">
			</div>
			<div class="btn__group">
				<a href="alumnos_edad_generou.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>
</body>
</html>
