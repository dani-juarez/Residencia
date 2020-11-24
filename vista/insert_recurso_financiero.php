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

		if(!empty($recursos) && !empty($enero) && !empty($febrero) && !empty($marzo) && !empty($abril) && !empty($mayo) && !empty($junio) && !empty($julio) && !empty($agosto) && !empty($septiembre) && !empty($octubre) && !empty($noviembre) && !empty($diciembre) && !empty($total) ){
 }else{
				$consulta_insert=$con->prepare('INSERT INTO recursos_financieros(recursos,enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,total) VALUES(:recursos,:enero,:febrero,:marzo,:abril,:mayo,:junio,:julio,:agosto,:septiembre,:octubre,:noviembre,:diciembre,:total)');
				$consulta_insert->execute(array(
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
                    ':total' =>$total
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
		<h2>NUEVO RECURSO FINANCIERO</h2>
		<form action="" method="post">
			<div class="form-group">
				<input type="text" name="recursos" placeholder="RECURSOS FINANCIEROS" class="input__text">
				<input type="text" name="enero" placeholder="ENERO" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="febrero" placeholder="FEBRERO" class="input__text">
				<input type="text" name="marzo" placeholder="MARZO" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="abril" placeholder="ABRIL" class="input__text">
                <input type="text" name="mayo" placeholder="MAYO" class="input__text">
			</div>
            <div class="form-group">
				<input type="text" name="junio" placeholder="JUNIO" class="input__text">
                <input type="text" name="julio" placeholder="JULIO" class="input__text">
			</div>
            <div class="form-group">
				<input type="text" name="agosto" placeholder="AGOSTO" class="input__text">
                <input type="text" name="septiembre" placeholder="SEPTIEMBRE" class="input__text">
			</div>
            <div class="form-group">
				<input type="text" name="octubre" placeholder="OCTUBRE" class="input__text">
                <input type="text" name="noviembre" placeholder="NOVIEMBRE" class="input__text">
			</div>
            <div class="form-group">
				<input type="text" name="diciembre" placeholder="DICIEMBRE" class="input__text">
                <input type="text" name="total" placeholder="TOTAL" class="input__text">
			</div>
			<div class="btn__group">
				<a href="recursos_financieros.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>
</body>
</html>
