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

		$buscar_id=$con->prepare('SELECT * FROM recursos_financieros WHERE id=:id LIMIT 1');
		$buscar_id->execute(array(
			':id'=>$id
		));
		$resultado=$buscar_id->fetch();
	}else{
		header('Location: recursos_financieros.php');
	}


	if(isset($_POST['guardar'])){
		$recursos=$_POST['recursos'];
		$enero=$_POST['enero'];
		$febrero=$_POST['febrero'];
		$marzo=$_POST['marzo'];
        $abril=$_POST['abril'];
        $mayo=$_POST['mayo'];
        $junio=$_POST['junio'];
        $julio=$_POST['julio'];
        $agosto=$_POST['agosto'];
        $septiembre=$_POST['septiembre'];
        $octubre=$_POST['octubre'];
        $noviembre=$_POST['noviembre'];
        $diciembre=$_POST['diciembre'];
        $total=$_POST['total'];
		$id=(int) $_GET['id'];

		if(!empty($recursos) && !empty($enero) && !empty($febrero) && !empty($marzo) && !empty($abril) && !empty($mayo) && !empty($junio) && !empty($julio) && !empty($agosto) && !empty($septiembre) && !empty($octubre) && !empty($noviembre) && !empty($diciembre) && !empty($total) ){
			
				$consulta_update=$con->prepare(' UPDATE recursos_financieros SET  
					recursos=:recursos,
					enero=:enero,
					febrero=:febrero,
					marzo=:marzo,
					abril=:abril,
                    mayo=:mayo,
                    junio=:junio,
                    julio=:julio,
                    agosto=:agosto,
                    septiembre=:septiembre,
                    octubre=:octubre,
                    noviembre=:noviembre,
                    diciembre=:diciembre,
                    total=:total
					WHERE id=:id;'
				);
				$consulta_update->execute(array(
					':recursos' =>$recursos,
					':enero' =>$enero,
					':febrero' =>$febrero,
					':marzo' =>$marzo,
                    ':abril' =>$abril,
                    ':mayo' =>$mayo,
                    ':junio' =>$junio,
                    ':julio' =>$julio,
                    ':agosto' =>$agosto,
                    ':septiembre' =>$septiembre,
                    ':octubre' =>$octubre,
                    ':noviembre' =>$noviembre,
                    ':diciembre' =>$diciembre,
                    ':total' =>$total,
					':id' =>$id
				));
				header('Location: recursos_financieros.php');
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
		<h2>ACTUALIZAR RECURSOS FINANCIEROS</h2>
		<form action="" method="post">
			<div class="form-group">
				<input type="text" name="recursos" placeholder="RECURSOS FINANCIEROS" value="<?php if($resultado) echo $resultado['recursos']; ?>" class="input__text">
				<input type="text" name="enero" placeholder="ENERO" value="<?php if($resultado) echo $resultado['enero']; ?>" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="febrero" placeholder="FEBRERO" value="<?php if($resultado) echo $resultado['febrero']; ?>" class="input__text">
				<input type="text" name="marzo" placeholder="MARZO" value="<?php if($resultado) echo $resultado['marzo']; ?>" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="abril" placeholder="ABRIL" value="<?php if($resultado) echo $resultado['abril']; ?>" class="input__text">
                <input type="text" name="mayo" placeholder="MAYO" value="<?php if($resultado) echo $resultado['mayo']; ?>" class="input__text">
			</div>
            <div class="form-group">
				<input type="text" name="junio" placeholder="JUNIO" value="<?php if($resultado) echo $resultado['junio']; ?>" class="input__text">
                <input type="text" name="julio" placeholder="JULIO" value="<?php if($resultado) echo $resultado['julio']; ?>" class="input__text">
			</div>
            <div class="form-group">
				<input type="text" name="agosto" placeholder="AGOSTO" value="<?php if($resultado) echo $resultado['agosto']; ?>" class="input__text">
                <input type="text" name="septiembre" placeholder="SEPTEIMBRE" value="<?php if($resultado) echo $resultado['septiembre']; ?>" class="input__text">
			</div>
            <div class="form-group">
				<input type="text" name="octubre" placeholder="OCTUBRE" value="<?php if($resultado) echo $resultado['octubre']; ?>" class="input__text">
                <input type="text" name="noviembre" placeholder="NOVIEMBRE" value="<?php if($resultado) echo $resultado['noviembre']; ?>" class="input__text">
			</div>
            <div class="form-group">
				<input type="text" name="diciembre" placeholder="DICIEMBRE" value="<?php if($resultado) echo $resultado['diciembre']; ?>" class="input__text">
                <input type="text" name="total" placeholder="TOTAL" value="<?php if($resultado) echo $resultado['total']; ?>" class="input__text">
			</div>
			<div class="btn__group">
				<a href="recursos_financieros.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>
</body>
</html>
