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

		$buscar_id=$con->prepare('SELECT * FROM r_humanos WHERE id=:id LIMIT 1');
		$buscar_id->execute(array(
			':id'=>$id
		));
		$resultado=$buscar_id->fetch();
	}else{
		header('Location: r_humanos.php');
	}


	if(isset($_POST['guardar'])){
		$prof_tiempo_completo=$_POST['prof_tiempo_completo'];
		$licenciatura=$_POST['licenciatura'];
		$especialidad=$_POST['especialidad'];
		$maestria=$_POST['maestria'];
        $maestria_s_a=$_POST['maestria_s_a'];
        $doctorado=$_POST['doctorado'];
        $doctorado_s_a=$_POST['doctorado_s_a'];
		$id=(int) $_GET['id'];

		if(!empty($prof_tiempo_completo) && !empty($licenciatura) && !empty($especialidad) && !empty($maestria) && !empty($maestria_s_a) && !empty($doctorado) && !empty($doctorado_s_a) ){

				$consulta_update=$con->prepare(' UPDATE r_humanos SET  
					prof_tiempo_completo=:prof_tiempo_completo,
					licenciatura=:licenciatura,
					especialidad=:especialidad,
					maestria=:maestria,
					maestria_s_a=:maestria_s_a,
                    doctorado=:doctorado,
                    doctorado_s_a=:doctorado_s_a
					WHERE id=:id;'
				);
				$consulta_update->execute(array(
					':prof_tiempo_completo' =>$prof_tiempo_completo,
					':licenciatura' =>$licenciatura,
					':especialidad' =>$especialidad,
					':maestria' =>$maestria,
                    ':maestria_s_a' =>$maestria_s_a,
                    ':doctorado' =>$doctorado,
                    ':doctorado_s_a' =>$doctorado_s_a,
					':id' =>$id
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
		<h2>ACTUALIZAR PROFESOR DE TIEMPO COMPLETOL</h2>
		<form action="" method="post">
			<div class="form-group">
				<input type="text" name="prof_tiempo_completo" placeholder="PROFESOR DE TIEMPO COMPLETO" value="<?php if($resultado) echo $resultado['prof_tiempo_completo']; ?>" class="input__text">
				<input type="text" name="licenciatura" placeholder="LICENCIATURA" value="<?php if($resultado) echo $resultado['licenciatura']; ?>" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="especialidad" placeholder="ESPECIALIDAD" value="<?php if($resultado) echo $resultado['especialidad']; ?>" class="input__text">
				<input type="text" name="maestria" placeholder="MAESTRIA (CON GRADO ACADEMICO)" value="<?php if($resultado) echo $resultado['maestria']; ?>" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="maestria_s_a" placeholder="MAESTRIA (SIN GRADO ACADEMICO)" value="<?php if($resultado) echo $resultado['maestria_s_a']; ?>" class="input__text">
                <input type="text" name="doctorado" placeholder="DOCTORADO (CON GRADO ACADEMICO)" value="<?php if($resultado) echo $resultado['doctorado']; ?>" class="input__text">
			</div>
            <div class="form-group">
				<input type="text" name="doctorado_s_a" placeholder="DOCTORADO (SIN GRADO ACADEMICO)" value="<?php if($resultado) echo $resultado['doctorado_s_a']; ?>" class="input__text">
			</div>
			<div class="btn__group">
				<a href="r_humanos.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>
</body>
</html>