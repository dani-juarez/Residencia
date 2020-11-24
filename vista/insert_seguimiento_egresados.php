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
        $nivel=$_POST['nivel'];
        $educativo=$_POST['educativo'];
        $primario=$_POST['primario'];
        $secundario=$_POST['secundario'];
        $terciario=$_POST['terciario'];
        $publica=$_POST['publica'];
        $privada=$_POST['privada'];
        $si=$_POST['si'];
        $noo=$_POST['noo'];
        $parcial=$_POST['parcial'];

		if(!empty($programa) && !empty($nivel) && !empty($educativo) && !empty($primario)&& !empty($secundario) && !empty($terciario) && !empty($publica) && !empty($privada) && !empty($si) && !empty($noo) && !empty($parcial) ){
				$consulta_insert=$con->prepare('INSERT INTO seguimiento_egresados (programa,nivel,educativo,primario,secundario,terciario,publica,privada,si,noo,parcial) VALUES(:programa,:nivel,:educativo,:primario,:secundario,:terciario,:publica,:privada,:si,:noo,:parcial)');
				$consulta_insert->execute(array(
					':programa' =>$programa,
                    ':nivel' =>$nivel,
                    ':educativo' =>$educativo,
                    ':primario' =>$primario,
                    ':secundario' =>$secundario,
                    ':terciario' =>$terciario,
                    ':publica' =>$publica,
                    ':privada' =>$privada,
                    ':si' =>$si,
                    ':noo' =>$noo,
                    ':parcial' =>$parcial
				));
				header('Location: seguimiento_egresados.php');
			}	
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
		<h2>NUEVO SEGUIMIENTO</h2>
		<form action="" method="post">
			<div class="form-group">
				<input type="text" name="programa" placeholder="PROGRAMA" class="input__text">
				<input type="text" name="nivel" placeholder="NIVEL" class="input__text">
			</div>
            <div class="form-group">
				<input type="text" name="educativo" placeholder="EDUCATIVO" class="input__text">
				<input type="text" name="primario" placeholder="PRIMARIO" class="input__text">
			</div>
            <div class="form-group">
				<input type="text" name="secundario" placeholder="SECUNDARIO" class="input__text">
				<input type="text" name="terciario" placeholder="TERCIARIO" class="input__text">
			</div>
            <div class="form-group">
				<input type="text" name="publica" placeholder="PUBLICA" class="input__text">
				<input type="text" name="privada" placeholder="PRIVADA" class="input__text">
			</div>
            <div class="form-group">
				<input type="text" name="si" placeholder="SI" class="input__text">
				<input type="text" name="noo" placeholder="NO" class="input__text">
			</div>
            <div class="form-group">
				<input type="text" name="parcial" placeholder="PARCIAL" class="input__text">
			</div>
			<div class="btn__group">
				<a href="seguimiento_egresados.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>
</body>
</html>