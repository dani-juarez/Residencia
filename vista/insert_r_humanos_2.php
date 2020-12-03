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
		$prof_medio_tiempo=$_POST['prof_medio_tiempo'];
		$licenciatura=$_POST['licenciatura'];
		$especialidad=$_POST['especialidad'];
		$maestria=$_POST['maestria'];
        $maestria_s_a=$_POST['maestria_s_a'];
        $doctorado=$_POST['doctorado'];
        $doctorado_s_a=$_POST['doctorado_s_a'];

		if(!empty($prof_medio_tiempo) && !empty($licenciatura) && !empty($especialidad) && !empty($maestria) && !empty($maestria_s_a) && !empty($doctorado) && !empty($doctorado_s_a) ){
			
				$consulta_insert=$con->prepare('INSERT INTO r_humanos_2(prof_medio_tiempo,licenciatura,especialidad,maestria,maestria_s_a,doctorado,doctorado_s_a) VALUES(:prof_medio_tiempo,:licenciatura,:especialidad,:maestria,:maestria_s_a,:doctorado,:doctorado_s_a)');
				$consulta_insert->execute(array(
                    ':prof_medio_tiempo' =>$prof_medio_tiempo,
                    ':licenciatura' =>$licenciatura,
					':especialidad' =>$especialidad,
					':maestria' =>$maestria,
					':maestria_s_a' =>$maestria_s_a,
                    ':doctorado' =>$doctorado,
                    ':doctorado_s_a' =>$doctorado_s_a
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
		<h2>NUEVO PROFESOR DE MEDIO TIEMPO</h2>
		<form action="" method="post">
			<div class="form-group">
				<input type="text" name="prof_medio_tiempo" placeholder="PROFESOR DE MEDIO TIEMPO" class="input__text">
				<input type="text" name="licenciatura" placeholder="LICENCIATURA" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="especialidad" placeholder="ESPECIALIDAD" class="input__text">
				<input type="text" name="maestria" placeholder="MAESTRIA (CON GRADO ACADEMICO)" class="input__text">
			</div>
			<div class="form-group">
                <input type="text" name="maestria_s_a" placeholder="MAESTRIA (SIN GRADO ACADEMICO)" class="input__text">
                <input type="text" name="doctorado" placeholder="DOCTORADO (CON GRADO ACADEMICO)" class="input__text">
            </div>
            <div class="form-group">
                <input type="text" name="doctorado_s_a" placeholder="DOCTORADO (SIN GRADO ACADEMICO)" class="input__text">
			</div>
			<div class="btn__group">
				<a href="r_humanos.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>
</body>
</html>
