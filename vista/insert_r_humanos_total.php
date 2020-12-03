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

		if(!empty($tipo) && !empty($hombres_20) && !empty($mujeres_20) && !empty($hombres_24) && !empty($mujeres_24) && !empty($hombres_29) && !empty($mujeres_29) && !empty($hombres_34) && !empty($mujeres_34) && !empty($hombres_39) && !empty($mujeres_39) && !empty($hombres_44) && !empty($mujeres_44) && !empty($hombres_49) && !empty($mujeres_49) && !empty($hombres_54) && !empty($mujeres_54) && !empty($hombres_59) && !empty($mujeres_59) && !empty($hombres_64) && !empty($mujeres_64) && !empty($hombres_65) && !empty($mujeres_65) && !empty($hombres_total) && !empty($mujeres_total) && !empty($total) ){

				$consulta_insert=$con->prepare('INSERT INTO r_humanos_total(tipo,hombres_20,mujeres_20,hombres_24,mujeres_24,hombres_29,mujeres_29,hombres_34,mujeres_34,hombres_39,mujeres_39,hombres_44,mujeres_44,hombres_49,mujeres_49,hombres_54,mujeres_54,hombres_59,mujeres_59,hombres_64,mujeres_64,hombres_65,mujeres_65,hombres_total,mujeres_total,total) VALUES(:tipo,:hombres_20,:mujeres_20,:hombres_24,:mujeres_24,:hombres_29,:mujeres_29,:hombres_34,:mujeres_34,:hombres_39,:mujeres_39,:hombres_44,:mujeres_44,:hombres_49,:mujeres_49,:hombres_54,:mujeres_54,:hombres_59,:mujeres_59,:hombres_64,:mujeres_64,:hombres_65,:mujeres_65,:hombres_total,:mujeres_total,:total)');
				$consulta_insert->execute(array(
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
                    ':total' =>$total
				));
				header('Location: r_humanos.php');
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
		<h2>NUEVO TOTAL</h2>
		<form action="" method="post">
			<div class="form-group">
				<input type="text" name="tipo" placeholder="TIPO" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="hombres_20" placeholder="HOMBRES MENOS DE 20" class="input__text">
				<input type="text" name="mujeres_20" placeholder="MUJERES MENOS DE 20" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="hombres_24" placeholder="HOMBRES DE 20 A 24" class="input__text">
                <input type="text" name="mujeres_24" placeholder="MUJERES DE 20 A 24" class="input__text">
			</div>
            <div class="form-group">
				<input type="text" name="hombres_29" placeholder="HOMBRES DE 25 A 29" class="input__text">
                <input type="text" name="mujeres_29" placeholder="MUJERES DE 25 A 29" class="input__text">
			</div>
            <div class="form-group">
				<input type="text" name="hombres_34" placeholder="HOMBRES DE 30 A 34" class="input__text">
                <input type="text" name="mujeres_34" placeholder="MUJERES DE 30 A 34" class="input__text">
			</div>
            <div class="form-group">
				<input type="text" name="hombres_39" placeholder="HOMBRES DE 35 A 39" class="input__text">
                <input type="text" name="mujeres_39" placeholder="MUJERES DE 35 A 39" class="input__text">
			</div>
            <div class="form-group">
				<input type="text" name="hombres_44" placeholder="HOMBRES DE 40 A 44" class="input__text">
                <input type="text" name="mujeres_44" placeholder="MUJERES DE 40 A 44" class="input__text">
			</div>
            <div class="form-group">
				<input type="text" name="hombres_49" placeholder="HOMBRES DE 45 A 49" class="input__text">
                <input type="text" name="mujeres_49" placeholder="MUJERES DE 45 A 49" class="input__text">
			</div>
            <div class="form-group">
				<input type="text" name="hombres_54" placeholder="HOMBRES DE 50 A 54" class="input__text">
                <input type="text" name="mujeres_54" placeholder="MUJERES DE 50 A 54" class="input__text">
			</div>
            <div class="form-group">
				<input type="text" name="hombres_59" placeholder="HOMBRES DE 55 A 59" class="input__text">
                <input type="text" name="mujeres_59" placeholder="MUJERES DE 55 A 59" class="input__text">
			</div>
            <div class="form-group">
				<input type="text" name="hombres_64" placeholder="HOMBRES DE 60 A 64" class="input__text">
                <input type="text" name="mujeres_64" placeholder="MUJERES DE 60 A 64" class="input__text">
			</div>
            <div class="form-group">
				<input type="text" name="hombres_65" placeholder="HOMBRES DE 65 O MAS" class="input__text">
                <input type="text" name="mujeres_65" placeholder="MUJERES DE 65 O MAS" class="input__text">
			</div>
            <div class="form-group">
				<input type="text" name="hombres_total" placeholder="TOTAL DE HOMBRES" class="input__text">
                <input type="text" name="mujeres_total" placeholder="TOTAL DE MUJERES" class="input__text">
                <input type="text" name="total" placeholder="TOTAL" class="input__text">
			</div>
			<div class="btn__group">
				<a href="r_humanos.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>
</body>
</html>
