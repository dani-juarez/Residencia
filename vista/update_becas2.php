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

		$buscar_id=$con->prepare('SELECT * FROM becas2 WHERE id=:id LIMIT 1');
		$buscar_id->execute(array(
			':id'=>$id
		));
		$resultado=$buscar_id->fetch();
	}else{
		header('Location: becasu.php');
	}


	if(isset($_POST['guardar'])){
		$programa=$_POST['programa'];
		$hombres_primero=$_POST['hombres_primero'];
		$mujeres_primero=$_POST['mujeres_primero'];
		$hombres_segundo=$_POST['hombres_segundo'];
        $mujeres_segundo=$_POST['mujeres_segundo'];
        $hombres_tercero=$_POST['hombres_tercero'];
        $mujeres_tercero=$_POST['mujeres_tercero'];
        $hombres_cuarto=$_POST['hombres_cuarto'];
        $mujeres_cuarto=$_POST['mujeres_cuarto'];
        $hombres_quinto=$_POST['hombres_quinto'];
        $mujeres_quinto=$_POST['mujeres_quinto'];
        $hombres_sexto=$_POST['hombres_sexto'];
        $mujeres_sexto=$_POST['mujeres_sexto'];
        $hombres_septimo=$_POST['hombres_septimo'];
        $mujeres_septimo=$_POST['mujeres_septimo'];
        $hombres_octavo=$_POST['hombres_octavo'];
        $mujeres_octavo=$_POST['mujeres_octavo'];
        $hombres_noveno=$_POST['hombres_noveno'];
        $mujeres_noveno=$_POST['mujeres_noveno'];
        $hombres_total=$_POST['hombres_total'];
        $mujeres_total=$_POST['mujeres_total'];
		$id=(int) $_GET['id'];

		if(!empty($programa) && !empty($hombres_primero) && !empty($mujeres_primero) && !empty($hombres_segundo) && !empty($mujeres_segundo) && !empty($hombres_tercero) && !empty($mujeres_tercero) && !empty($hombres_cuarto) && !empty($mujeres_cuarto) 
        && !empty($hombres_quinto) && !empty($mujeres_quinto) && !empty($hombres_sexto) && !empty($mujeres_sexto) && !empty($hombres_septimo) && !empty($mujeres_septimo) && !empty($hombres_octavo) && !empty($mujeres_octavo) && !empty($hombres_noveno) 
        && !empty($mujeres_noveno) && !empty($hombres_total) && !empty($mujeres_total) ){

				$consulta_update=$con->prepare(' UPDATE becas2 SET  
					programa=:programa,
					hombres_primero=:hombres_primero,
					mujeres_primero=:mujeres_primero,
					hombres_segundo=:hombres_segundo,
					mujeres_segundo=:mujeres_segundo,
                    hombres_tercero=:hombres_tercero,
                    mujeres_tercero=:mujeres_tercero,
                    hombres_cuarto=:hombres_cuarto,
                    mujeres_cuarto=:mujeres_cuarto,
                    hombres_quinto=:hombres_quinto,
                    mujeres_quinto=:mujeres_quinto,
                    hombres_sexto=:hombres_sexto,
                    mujeres_sexto=:mujeres_sexto,
                    hombres_septimo=:hombres_septimo,
                    mujeres_septimo=:mujeres_septimo,
                    hombres_octavo=:hombres_octavo,
                    mujeres_octavo=:mujeres_octavo,
                    hombres_noveno=:hombres_noveno,
                    mujeres_noveno=:mujeres_noveno,
                    hombres_total=:hombres_total,
                    mujeres_total=:mujeres_total
					WHERE id=:id;'
				);
				$consulta_update->execute(array(
					':programa' =>$programa,
					':hombres_primero' =>$hombres_primero,
					':mujeres_primero' =>$mujeres_primero,
					':hombres_segundo' =>$hombres_segundo,
                    ':mujeres_segundo' =>$mujeres_segundo,
                    ':hombres_tercero' =>$hombres_tercero,
                    ':mujeres_tercero' =>$mujeres_tercero,
                    ':hombres_cuarto' =>$hombres_cuarto,
                    ':mujeres_cuarto' =>$mujeres_cuarto,
                    ':hombres_quinto' =>$hombres_quinto,
                    ':mujeres_quinto' =>$mujeres_quinto,
                    ':hombres_sexto' =>$hombres_sexto,
                    ':mujeres_sexto' =>$mujeres_sexto,
                    ':hombres_septimo' =>$hombres_septimo,
                    ':mujeres_septimo' =>$mujeres_septimo,
                    ':hombres_octavo' =>$hombres_octavo,
                    ':mujeres_octavo' =>$mujeres_octavo,
                    ':hombres_noveno' =>$hombres_noveno,
                    ':mujeres_noveno' =>$mujeres_noveno,
                    ':hombres_total' =>$hombres_total,
                    ':mujeres_total' =>$mujeres_total,
					':id' =>$id
				));
				header('Location: becasu.php');
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
		<h2>ACTUALIZAR BECA</h2>
		<form action="" method="post">
			<div class="form-group">
				<input type="text" name="programa" placeholder="PROGRAMA" value="<?php if($resultado) echo $resultado['programa']; ?>" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="hombres_primero" placeholder="HOMBRES PRIMER SEMESTRE" value="<?php if($resultado) echo $resultado['hombres_primero']; ?>" class="input__text">
				<input type="text" name="mujeres_primero" placeholder="MUJERES PRIMER SEMESTRE" value="<?php if($resultado) echo $resultado['mujeres_primero']; ?>" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="hombres_segundo" placeholder="HOMBRES SEGUNO SEMESTRE" value="<?php if($resultado) echo $resultado['hombres_segundo']; ?>" class="input__text">
                <input type="text" name="mujeres_segundo" placeholder="MUJERES SEGUNO SEMESTRE" value="<?php if($resultado) echo $resultado['mujeres_segundo']; ?>" class="input__text">
			</div>
            <div class="form-group">
				<input type="text" name="hombres_tercero" placeholder="HOMBRES TERCER SEMESTRE" value="<?php if($resultado) echo $resultado['hombres_tercero']; ?>" class="input__text">
                <input type="text" name="mujeres_tercero" placeholder="MUJERES TERCER SEMESTRE" value="<?php if($resultado) echo $resultado['mujeres_tercero']; ?>" class="input__text">
			</div>
            <div class="form-group">
				<input type="text" name="hombres_cuarto" placeholder="HOMBRES CUARTO SEMESTRE" value="<?php if($resultado) echo $resultado['hombres_cuarto']; ?>" class="input__text">
                <input type="text" name="mujeres_cuarto" placeholder="MUJERES CUARTO SEMESTRE" value="<?php if($resultado) echo $resultado['mujeres_cuarto']; ?>" class="input__text">
			</div>
            <div class="form-group">
				<input type="text" name="hombres_quinto" placeholder="HOMBRES QUINTO SEMESTRE" value="<?php if($resultado) echo $resultado['hombres_quinto']; ?>" class="input__text">
                <input type="text" name="mujeres_quinto" placeholder="MUJERES QUINTO SEMESTRE" value="<?php if($resultado) echo $resultado['mujeres_quinto']; ?>" class="input__text">
			</div>
            <div class="form-group">
				<input type="text" name="hombres_sexto" placeholder="HOMBRES SEXTO SEMESTRE" value="<?php if($resultado) echo $resultado['hombres_sexto']; ?>" class="input__text">
                <input type="text" name="mujeres_sexto" placeholder="MUJERES SEXTO SEMESTRE" value="<?php if($resultado) echo $resultado['mujeres_sexto']; ?>" class="input__text">
			</div>
            <div class="form-group">
				<input type="text" name="hombres_septimo" placeholder="HOMBRES SEPTIMO SEMESTRE" value="<?php if($resultado) echo $resultado['hombres_septimo']; ?>" class="input__text">
                <input type="text" name="mujeres_septimo" placeholder="MUJERES SEPTIMO SEMESTRE" value="<?php if($resultado) echo $resultado['mujeres_septimo']; ?>" class="input__text">
			</div>
            <div class="form-group">
				<input type="text" name="hombres_octavo" placeholder="HOMBRES OCTAVO SEMESTRE" value="<?php if($resultado) echo $resultado['hombres_octavo']; ?>" class="input__text">
                <input type="text" name="mujeres_octavo" placeholder="MUJERES OCTAVO SEMESTRE" value="<?php if($resultado) echo $resultado['mujeres_octavo']; ?>" class="input__text">
			</div>
            <div class="form-group">
				<input type="text" name="hombres_noveno" placeholder="HOMBRES NOVENO SEMESTRE" value="<?php if($resultado) echo $resultado['hombres_noveno']; ?>" class="input__text">
                <input type="text" name="mujeres_noveno" placeholder="MUJERES NOVENO SEMESTRE" value="<?php if($resultado) echo $resultado['mujeres_noveno']; ?>" class="input__text">
			</div>
            <div class="form-group">
				<input type="text" name="hombres_total" placeholder="TOTAL HOMBRES" value="<?php if($resultado) echo $resultado['hombres_total']; ?>" class="input__text">
                <input type="text" name="mujeres_total" placeholder="TOTAL MUJERES" value="<?php if($resultado) echo $resultado['mujeres_total']; ?>" class="input__text">
			</div>
			<div class="btn__group">
				<a href="becasu.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>
</body>
</html>
