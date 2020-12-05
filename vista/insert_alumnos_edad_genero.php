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

		if(!empty($programa) && !empty($modalidad) && !empty($hombres_nuevos) && !empty($mujeres_nuevos) && !empty($hombres_re) && !empty($mujeres_re) && !empty($total) && !empty($hombres_dis) && !empty($mujeres_dis) && !empty($hombres_lengua) && !empty($mujeres_lengua) ){

				$consulta_insert=$con->prepare('INSERT INTO alumnos_edad_genero(programa,modalidad,hombres_nuevos,mujeres_nuevos,hombres_re,mujeres_re,total,hombres_dis,mujeres_dis,hombres_lengua,mujeres_lengua) VALUES(:programa,:modalidad,:hombres_nuevos,:mujeres_nuevos,:hombres_re,:mujeres_re,:total,:hombres_dis,:mujeres_dis,:hombres_lengua,:mujeres_lengua)');
				$consulta_insert->execute(array(
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
                    ':mujeres_lengua' =>$mujeres_lengua
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
		<h2>ALUMNOS, EDAD, GENERO</h2>
		<form action="" method="post">
			<div class="form-group">
				<input type="text" name="programa" placeholder="PROGRAMA" class="input__text">
				<input type="text" name="modalidad" placeholder="MODALIDAD" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="hombres_nuevos" placeholder="HOMBRES NUEVO INGRESO" class="input__text">
				<input type="text" name="mujeres_nuevos" placeholder="MUJERES NUEVO INGRESO" class="input__text">
			</div>
			<div class="form-group">
                <input type="text" name="hombres_re" placeholder="HOMBRES REINGRESO" class="input__text">
                <input type="text" name="mujeres_re" placeholder="MUJERES REINGRESO" class="input__text">
            </div>
            <div class="form-group">
                <input type="text" name="total" placeholder="TOTAL" class="input__text">
            </div>
            <div class="form-group">
                <input type="text" name="hombres_dis" placeholder="HOMBRES CON DISCAPACIDAD" class="input__text">
                <input type="text" name="mujeres_dis" placeholder="MUJERES CON DISCAPACIDAD" class="input__text">
            </div>
            <div class="form-group">
                <input type="text" name="hombres_lengua" placeholder="HOMBRES HABLANTES DE UNA LENGUA" class="input__text">
                <input type="text" name="mujeres_lengua" placeholder="MUJERES HABLANTES DE UNA LENGUA" class="input__text">
			</div>
			<div class="btn__group">
				<a href="alumnos_edad_genero.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>
</body>
</html>
