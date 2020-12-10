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

		$buscar_id=$con->prepare('SELECT * FROM r_humanos_funciones WHERE id=:id LIMIT 1');
		$buscar_id->execute(array(
			':id'=>$id
		));
		$resultado=$buscar_id->fetch();
	}else{
		header('Location: r_humanosu.php');
	}


	if(isset($_POST['guardar'])){
		$estudios=$_POST['estudios'];
		$hombres_servicio=$_POST['hombres_servicio'];
		$mujeres_servicio=$_POST['mujeres_servicio'];
		$hombres_administrativas=$_POST['hombres_administrativas'];
        $mujeres_administrativas=$_POST['mujeres_administrativas'];
        $hombres_analistas=$_POST['hombres_analistas'];
        $mujeres_analistas=$_POST['mujeres_analistas'];
        $hombres_docencia=$_POST['hombres_docencia'];
        $mujeres_docencia=$_POST['mujeres_docencia'];
        $hombres_total=$_POST['hombres_total'];
        $mujeres_total=$_POST['mujeres_total'];
        $total=$_POST['total'];
		$id=(int) $_GET['id'];

		if(!empty($estudios) && !empty($hombres_servicio) && !empty($mujeres_servicio) && !empty($hombres_administrativas) && !empty($mujeres_administrativas) && !empty($hombres_analistas) && !empty($mujeres_analistas) && !empty($hombres_docencia) && !empty($mujeres_docencia) && !empty($hombres_total) && !empty($mujeres_total) && !empty($total) ){

				$consulta_update=$con->prepare(' UPDATE r_humanos_funciones SET  
					estudios=:estudios,
					hombres_servicio=:hombres_servicio,
					mujeres_servicio=:mujeres_servicio,
					hombres_administrativas=:hombres_administrativas,
					mujeres_administrativas=:mujeres_administrativas,
                    hombres_analistas=:hombres_analistas,
                    mujeres_analistas=:mujeres_analistas,
                    hombres_docencia=:hombres_docencia,
                    mujeres_docencia=:mujeres_docencia,
                    hombres_total=:hombres_total,
                    mujeres_total=:mujeres_total,
                    total=:total
					WHERE id=:id;'
				);
				$consulta_update->execute(array(
					':estudios' =>$estudios,
					':hombres_servicio' =>$hombres_servicio,
					':mujeres_servicio' =>$mujeres_servicio,
					':hombres_administrativas' =>$hombres_administrativas,
                    ':mujeres_administrativas' =>$mujeres_administrativas,
                    ':hombres_analistas' =>$hombres_analistas,
                    ':mujeres_analistas' =>$mujeres_analistas,
                    ':hombres_docencia' =>$hombres_docencia,
                    ':mujeres_docencia' =>$mujeres_docencia,
                    ':hombres_total' =>$hombres_total,
                    ':mujeres_total' =>$mujeres_total,
                    ':total' =>$total,
					':id' =>$id
				));
				header('Location: r_humanosu.php');
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
		<h2>ACTUALIZAR FUNCIONES</h2>
		<form action="" method="post">
			<div class="form-group">
				<input type="text" name="estudios" placeholder="GRADO MAXIMO DE ESTUDIOS" value="<?php if($resultado) echo $resultado['estudios']; ?>" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="hombres_servicio" placeholder="SERVICIO HOMBRE" value="<?php if($resultado) echo $resultado['hombres_servicio']; ?>" class="input__text">
				<input type="text" name="mujeres_servicio" placeholder="SERVICIO MUJER" value="<?php if($resultado) echo $resultado['mujeres_servicio']; ?>" class="input__text">
			</div>
			<div class="form-group">
                <input type="text" name="hombres_administrativas" placeholder="ADMINISTRATIVOS HOMBRES" value="<?php if($resultado) echo $resultado['hombres_administrativas']; ?>" class="input__text">
                <input type="text" name="mujeres_administrativas" placeholder="ADMINISTRATIVAS MUJERES" value="<?php if($resultado) echo $resultado['mujeres_administrativas']; ?>" class="input__text">
            </div>
            <div class="form-group">
                <input type="text" name="hombres_analistas" placeholder="ANALISTAS HOMBRES" value="<?php if($resultado) echo $resultado['hombres_analistas']; ?>" class="input__text">
                <input type="text" name="mujeres_analistas" placeholder="ANALISTAS HOMBRES" value="<?php if($resultado) echo $resultado['mujeres_analistas']; ?>" class="input__text">
            </div>
            <div class="form-group">
                <input type="text" name="hombres_docencia" placeholder="DOCENCIA HOMBRES" value="<?php if($resultado) echo $resultado['hombres_docencia']; ?>" class="input__text">
                <input type="text" name="mujeres_docencia" placeholder="DOCENCIA MUJERES" value="<?php if($resultado) echo $resultado['mujeres_docencia']; ?>" class="input__text">
            </div>
            <div class="form-group">
                <input type="text" name="hombres_total" placeholder="TOTAL HOMBRES" value="<?php if($resultado) echo $resultado['hombres_total']; ?>" class="input__text">
                <input type="text" name="mujeres_total" placeholder="TOTAL MUJERES" value="<?php if($resultado) echo $resultado['mujeres_total']; ?>" class="input__text">
                <input type="text" name="total" placeholder="TOTAL" value="<?php if($resultado) echo $resultado['total']; ?>" class="input__text">
			</div>
			<div class="btn__group">
				<a href="r_humanosu.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>
</body>
</html>
