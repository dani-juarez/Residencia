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
				<p><span class="label label-info"><?php echo $_SESSION["usuario"]["privilegio"] == 1 ? 'Administrador' : 'Cliente'; ?></span></p>
				
			</div>
		</div>
	</div>
</div>

<?php include 'partials/footer.php';?>

<?php 
	include_once 'conexion.php';
	
	if(isset($_POST['guardar'])){
		$eje=$_POST['eje'];
		$objetivo=$_POST['objetivo'];
		$linea_accion=$_POST['linea_accion'];
		$proyecto=$_POST['proyecto'];
		$numero_indicador=$_POST['numero_indicador'];
		$indicador=$_POST['indicador'];
		$unidad_medida=$_POST['unidad_medida'];
		$metodo_calculo=$_POST['metodo_calculo'];
		$numerador=$_POST['numerador'];
		$denominador=$_POST['denominador'];
		$area_responsable=$_POST['area_responsable'];
		$mil=$_POST['mil'];
		$dosmil=$_POST['dosmil'];
		$tresmil=$_POST['tresmil'];
		$cuatromil=$_POST['cuatromil'];
		$cincomil=$_POST['cincomil'];
		$ffpsr=$_POST['ffpsr'];
		$ai=$_POST['ai'];
		$pp=$_POST['pp'];
		$eje_estructura=$_POST['eje_estructura'];
		$objetivo_estructura=$_POST['objetivo_estructura'];
		$la=$_POST['la'];
		$proyecto_estructura=$_POST['proyecto_estructura'];
		$numero_indicador_estructura=$_POST['numero_indicador_estructura'];

		if(!empty($eje) && !empty($objetivo) && !empty($linea_accion) && !empty($proyecto) && !empty($numero_indicador) && !empty($indicador) && !empty($unidad_medida) && !empty($metodo_calculo) && !empty($numerador) && !empty($denominador) && !empty($area_responsable) && !empty($mil) && !empty($dosmil) && !empty($tresmil) && !empty($cuatromil) && !empty($cincomil) && !empty($ffpsr) && !empty($ai) && !empty($pp) && !empty($eje_estructura) && !empty($objetivo_estructura) && !empty($la) && !empty($proyecto_estructura) && !empty($numero_indicador_estructura) ){
			}else{
				$consulta_insert=$con->prepare('INSERT INTO pdi (eje,objetivo,linea_accion,proyecto,numero_indicador,indicador,unidad_medida,metodo_calculo,numerador,denominador,area_responsable,mil,dosmil,tresmil,cuatromil,cincomil,ffpsr,ai,pp,eje_estructura,objetivo_estructura,la,proyecto_estructura,numero_indicador_estructura) VALUES(:eje,:objetivo,:linea_accion,:proyecto,:numero_indicador,:indicador,:unidad_medida,:metodo_calculo,:numerador,:denominador,:area_responsable,:mil,:dosmil,:tresmil,:cuatromil,:cincomil,:ffpsr,:ai,:pp,:eje_estructura,:objetivo_estructura,:la,:proyecto_estructura,:numero_indicador_estructura)');
				$consulta_insert->execute(array(
					':eje' =>$eje,
					':objetivo' =>$objetivo,
					':linea_accion' =>$linea_accion,
					':proyecto' =>$proyecto,
					':numero_indicador' =>$numero_indocador,
					':indicador' =>$indicador,
					':unidad_medida' =>$unidad_medida,
					':metodo_calculo' =>$metodo_calculo,
					':numerador' =>$numerador,
					':denominador' =>$denominador,
					':area_responsable' =>$area_responsable,
					':mil' =>$mli,
					':dosmil' =>$dosmil,
					':tresmil' =>$tresmil,
					':cuatromil' =>$cuatromil,
					':cincomil' =>$cincomil,
					':ffpsr' =>$ffpsr,
					':ai' =>$ai,
					':pp' =>$pp,
					':eje_estructura' =>$eje_estructura,
					':objetivo_estructura' =>$objetivo_estructura,
					':la' =>$la,
					':proyecto_estructura' =>$proyecto_estructura,
					':numero_indicador_estructura' =>$numero_indicador_estructura
				));
				header('Location: pta.php');
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
		<h2>NUEVO PDI</h2>
		<form action="" method="post">
			<div class="form-group">
				<input type="text" name="eje" placeholder="Eje Estratégico" class="input__text">
				<input type="text" name="objetivo" placeholder="Objetivo" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="linea_accion" placeholder="Línea de Acción" class="input__text">
				<input type="text" name="proyecto" placeholder="Proyecto" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="numero_indicador" placeholder="N° Indicador" class="input__text">
				<input type="text" name="indicador" placeholder="Indicador" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="unidad_medida" placeholder="Unidad de Medida" class="input__text">
				<input type="text" name="metodo_calculo" placeholder="Método de Calculo" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="numerador" placeholder="Numerador" class="input__text">
				<input type="text" name="denominador" placeholder="Denominador (Solo colocarlo para porcentajes)" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="area_responsable" placeholder="Area Responsable" class="input__text">
				<input type="text" name="mil" placeholder="1000" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="dosmil" placeholder="2000" class="input__text">
				<input type="text" name="tresmil" placeholder="3000" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="cuatromil" placeholder="4000" class="input__text">
				<input type="text" name="cincomil" placeholder="5000" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="ffpsr" placeholder="FFPSR" class="input__text">
				<input type="text" name="ai" placeholder="AI" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="pp" placeholder="PP" class="input__text">
				<input type="text" name="eje_estructura" placeholder="Eje" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="objetivo_estructura" placeholder="Objetivo" class="input__text">
				<input type="text" name="la" placeholder="LA" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="proyecto_estructura" placeholder="Proyecto" class="input__text">
				<input type="text" name="numero_indicador_estructura" placeholder="N° Indicador" class="input__text">
			</div>
			<div class="btn__group">
				<a href="pta.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>
</body>
</html>
