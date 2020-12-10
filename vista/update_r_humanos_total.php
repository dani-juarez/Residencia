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

		$buscar_id=$con->prepare('SELECT * FROM r_humanos_total WHERE id=:id LIMIT 1');
		$buscar_id->execute(array(
			':id'=>$id
		));
		$resultado=$buscar_id->fetch();
	}else{
		header('Location: r_humanosu.php');
	}


	if(isset($_POST['guardar'])){
		$tipo=$_POST['tipo'];
		$hombres_20=$_POST['hombres_20'];
		$mujeres_20=$_POST['mujeres_20'];
		$hombres_24=$_POST['hombres_24'];
        $mujeres_24=$_POST['mujeres_24'];
        $hombres_29=$_POST['hombres_29'];
        $mujeres_29=$_POST['mujeres_29'];
        $hombres_34=$_POST['hombres_34'];
        $mujeres_34=$_POST['mujeres_34'];
        $hombres_39=$_POST['hombres_39'];
        $mujeres_39=$_POST['mujeres_39'];
        $hombres_44=$_POST['hombres_44'];
        $mujeres_44=$_POST['mujeres_44'];
        $hombres_49=$_POST['hombres_49'];
        $mujeres_49=$_POST['mujeres_49'];
        $hombres_54=$_POST['hombres_54'];
        $mujeres_54=$_POST['mujeres_54'];
        $hombres_59=$_POST['hombres_59'];
        $mujeres_59=$_POST['mujeres_59'];
        $hombres_64=$_POST['hombres_64'];
        $mujeres_64=$_POST['mujeres_64'];
        $hombres_65=$_POST['hombres_65'];
        $mujeres_65=$_POST['mujeres_65'];
        $hombres_total=$_POST['hombres_total'];
        $mujeres_total=$_POST['mujeres_total'];
        $total=$_POST['total'];
		$id=(int) $_GET['id'];

		if(!empty($tipo) && !empty($hombres_20) && !empty($mujeres_20) && !empty($hombres_24) && !empty($mujeres_24) && !empty($hombres_29) && !empty($mujeres_29) && !empty($hombres_34) && !empty($mujeres_34) && !empty($hombres_39) && !empty($mujeres_39) && !empty($hombres_44) && !empty($mujeres_44) && !empty($hombres_49) && !empty($mujeres_49) && !empty($hombres_54) && !empty($mujeres_54) && !empty($hombres_59) && !empty($mujeres_59) && !empty($hombres_64) && !empty($mujeres_64) && !empty($hombres_65) && !empty($mujeres_65) && !empty($hombres_total) && !empty($mujeres_total) && !empty($total) ){

				$consulta_update=$con->prepare(' UPDATE r_humanos_total SET  
					tipo=:tipo,
					hombres_20=:hombres_20,
					mujeres_20=:mujeres_20,
					hombres_24=:hombres_24,
					mujeres_24=:mujeres_24,
                    hombres_29=:hombres_29,
                    mujeres_29=:mujeres_29,
                    hombres_34=:hombres_34,
                    mujeres_34=:mujeres_34,
                    hombres_39=:hombres_39,
                    mujeres_39=:mujeres_39,
                    hombres_44=:hombres_44,
                    mujeres_44=:mujeres_44,
                    hombres_49=:hombres_49,
                    mujeres_49=:mujeres_49,
                    hombres_54=:hombres_54,
                    mujeres_54=:mujeres_54,
                    hombres_59=:hombres_59,
                    mujeres_59=:mujeres_59,
                    hombres_64=:hombres_64,
                    mujeres_64=:mujeres_64,
                    hombres_65=:hombres_65,
                    mujeres_65=:mujeres_65,
                    hombres_total=:hombres_total,
                    mujeres_total=:mujeres_total,
                    total=:total
					WHERE id=:id;'
				);
				$consulta_update->execute(array(
					':tipo' =>$tipo,
					':hombres_20' =>$hombres_20,
					':mujeres_20' =>$mujeres_20,
					':hombres_24' =>$hombres_24,
                    ':mujeres_24' =>$mujeres_24,
                    ':hombres_29' =>$hombres_29,
                    ':mujeres_29' =>$mujeres_29,
                    ':hombres_34' =>$hombres_34,
                    ':mujeres_34' =>$mujeres_34,
                    ':hombres_39' =>$hombres_39,
                    ':mujeres_39' =>$mujeres_39,
                    ':hombres_44' =>$hombres_44,
                    ':mujeres_44' =>$mujeres_44,
                    ':hombres_49' =>$hombres_49,
                    ':mujeres_49' =>$mujeres_49,
                    ':hombres_54' =>$hombres_54,
                    ':mujeres_54' =>$mujeres_54,
                    ':hombres_59' =>$hombres_59,
                    ':mujeres_59' =>$mujeres_59,
                    ':hombres_64' =>$hombres_64,
                    ':mujeres_64' =>$mujeres_64,
                    ':hombres_65' =>$hombres_65,
                    ':mujeres_65' =>$mujeres_65,
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
		<h2>ACTUALIZAR TIPO</h2>
		<form action="" method="post">
			<div class="form-group">
				<input type="text" name="tipo" placeholder="TIPO" value="<?php if($resultado) echo $resultado['tipo']; ?>" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="hombres_20" placeholder="HOMBRES MENOS DE 20" value="<?php if($resultado) echo $resultado['hombres_20']; ?>" class="input__text">
				<input type="text" name="mujeres_20" placeholder="MUJERES MENOS DE 20" value="<?php if($resultado) echo $resultado['mujeres_20']; ?>" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="hombres_24" placeholder="HOMBRES DE 20 A 24" value="<?php if($resultado) echo $resultado['hombres_24']; ?>" class="input__text">
                <input type="text" name="mujeres_24" placeholder="MUJERES DE 20 A 24" value="<?php if($resultado) echo $resultado['mujeres_24']; ?>" class="input__text">
			</div>
            <div class="form-group">
				<input type="text" name="hombres_29" placeholder="HOMBRES DE 25 A 29" value="<?php if($resultado) echo $resultado['hombres_29']; ?>" class="input__text">
                <input type="text" name="mujeres_29" placeholder="MUJERES DE 25 A 29" value="<?php if($resultado) echo $resultado['mujeres_29']; ?>" class="input__text">
			</div>
            <div class="form-group">
				<input type="text" name="hombres_34" placeholder="HOMBRES DE 30 A 34" value="<?php if($resultado) echo $resultado['hombres_34']; ?>" class="input__text">
                <input type="text" name="mujeres_34" placeholder="MUJERES DE 30 A 34" value="<?php if($resultado) echo $resultado['mujeres_34']; ?>" class="input__text">
			</div>
            <div class="form-group">
				<input type="text" name="hombres_39" placeholder="HOMBRES DE 35 A 39" value="<?php if($resultado) echo $resultado['hombres_39']; ?>" class="input__text">
                <input type="text" name="mujeres_39" placeholder="MUJERES DE 35 A 39" value="<?php if($resultado) echo $resultado['mujeres_39']; ?>" class="input__text">
			</div>
            <div class="form-group">
				<input type="text" name="hombres_44" placeholder="HOMBRES DE 40 A 44" value="<?php if($resultado) echo $resultado['hombres_44']; ?>" class="input__text">
                <input type="text" name="mujeres_44" placeholder="MUJERES DE 40 A 44" value="<?php if($resultado) echo $resultado['mujeres_44']; ?>" class="input__text">
			</div>
            <div class="form-group">
				<input type="text" name="hombres_49" placeholder="HOMBRES DE 45 A 49" value="<?php if($resultado) echo $resultado['hombres_49']; ?>" class="input__text">
                <input type="text" name="mujeres_49" placeholder="MUJERES DE 45 A 49" value="<?php if($resultado) echo $resultado['mujeres_49']; ?>" class="input__text">
			</div>
            <div class="form-group">
				<input type="text" name="hombres_54" placeholder="HOMBRES DE 50 A 54" value="<?php if($resultado) echo $resultado['hombres_54']; ?>" class="input__text">
                <input type="text" name="mujeres_54" placeholder="MUJERES DE 50 A 54" value="<?php if($resultado) echo $resultado['mujeres_54']; ?>" class="input__text">
			</div>
            <div class="form-group">
				<input type="text" name="hombres_59" placeholder="HOMBRES DE 55 A 59" value="<?php if($resultado) echo $resultado['hombres_59']; ?>" class="input__text">
                <input type="text" name="mujeres_59" placeholder="MUJERES DE 55 A 59" value="<?php if($resultado) echo $resultado['mujeres_59']; ?>" class="input__text">
			</div>
            <div class="form-group">
				<input type="text" name="hombres_64" placeholder="HOMBRES DE 60 A 64" value="<?php if($resultado) echo $resultado['hombres_64']; ?>" class="input__text">
                <input type="text" name="mujeres_64" placeholder="MUJERES DE 60 A 64" value="<?php if($resultado) echo $resultado['mujeres_64']; ?>" class="input__text">
			</div>
            <div class="form-group">
				<input type="text" name="hombres_65" placeholder="HOMBRES DE 65 O MAS" value="<?php if($resultado) echo $resultado['hombres_65']; ?>" class="input__text">
                <input type="text" name="mujeres_65" placeholder="MUJERES DE 65 O MAS" value="<?php if($resultado) echo $resultado['mujeres_65']; ?>" class="input__text">
			</div>
            <div class="form-group">
				<input type="text" name="hombres_total" placeholder="TOTAL DE HOMBRES" value="<?php if($resultado) echo $resultado['hombres_total']; ?>" class="input__text">
                <input type="text" name="mujeres_total" placeholder="TOTAL DE MUJERES" value="<?php if($resultado) echo $resultado['mujeres_total']; ?>" class="input__text">
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
