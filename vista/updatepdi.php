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
				<h1><strong>Bienvenido</strong> <?php echo $_SESSION["usuario"]["nombre"]; ?></h1>
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

		$buscar_id=$con->prepare('SELECT * FROM pdi WHERE id=:id LIMIT 1');
		$buscar_id->execute(array(
			':id'=>$id
		));
		$resultado=$buscar_id->fetch();
	}else{
		header('Location: pdi.php');
	}


	if(isset($_POST['guardar'])){
		$eje=$_POST['eje'];
		$objetivo=$_POST['objetivo'];
		$numero_linea_accion=$_POST['numero_linea_accion'];
		$linea_accion=$_POST['linea_accion'];
		$numero_proyecto=$_POST['numero_proyecto'];
		$proyecto=$_POST['proyecto'];
		$indicador=$_POST['indicador'];
		$unidad_medida=$_POST['unidad_medida'];
		$numero_accion=$_POST['numero_accion'];
		$accion_comprometida=$_POST['accion_comprmetida'];
		$meta=$_POST['meta'];
		$indicador_interno=$_POST['indicador_interno'];
		$medio_verificacion=$_POST['medio_verificacion'];
		$area_responsable=$_POST['area_responsable'];
		$id=(int) $_GET['id'];

		if(!empty($eje) && !empty($objetivo) && !empty($numero_linea_accion) && !empty($linea_accion) && !empty($numero_proyecto) && !empty($proyecto) && !empty($indicador) && !empty($unidad_medida) && !empty($numero_accion) && !empty($accion_comprometida) && !empty($meta) && !empty($indicador_interno) && !empty($medio_verificacion) && !empty($area_responsable) ){
			}else{
				$consulta_update=$con->prepare(' UPDATE pdi SET  
					eje=:eje,
					objetivo=:objetivo,
					numero_linea_accion=:numero_linea_accion,
					linea_accion=:linea_accion,
					numero_proyecto=:numero_proyecto,
					proyecto=:proyecto,
					indicador=:indicador,
					unidad_medida=:unidad_medida,
					numero_accion=:numero_accion,
					accion_comprometida=:accion_comprometida,
					meta=:meta,
					indicador_interno=:indicador_interno,
					medio_verificacion=:medio_verificacion,
					area_responsable=:area_responsable
					WHERE id=:id;'
				);
				$consulta_update->execute(array(
					':eje' =>$eje,
					':objetivo' =>$objetivo,
					':numero_linea_accion' =>$numero_linea_accion,
					':linea_accion' =>$linea_accion,
					':numero_proyecto' =>$numero_proyecto,
					':proyecto' =>$proyecto,
					':indicador' =>$indicador,
					':unidad_medida' =>$unidad_medida,
					':numero_accion' =>$numero_accion,
					':accion_comprometida' =>$accion_comprometida,
					':meta' =>$meta,
					':indicador_interno' =>$indicador_interno,
					':medio_verificacion' =>$medio_verificacion,
					':area_responsable' =>$area_responsable,
					':id' =>$id
				));
				header('Location: pdi.php');
			}
		}

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Editar PDI</title>
	<link rel="stylesheet" href="../CSS/style.css">
</head>
<body>
	<div class="contenedor">
		<h2>ACTUALIZAR PDI</h2>
		<form action="" method="post">
		<div class="form-group">
				<input type="text" name="eje" placeholder="Eje Estratégico/Eje Transversal (ET)" value="<?php if($resultado) echo $resultado['eje']; ?>" class="input__text">
				<input type="text" name="objetivo" placeholder="Obejetivo" value="<?php if($resultado) echo $resultado['objetivo']; ?>" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="numero_linea_accion" placeholder="N° Línea de Acción" value="<?php if($resultado) echo $resultado['numero_linea_accion']; ?>" class="input__text">
				<input type="text" name="linea_accion" placeholder="Línea de Acción" value="<?php if($resultado) echo $resultado['linea_accion']; ?>" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="numero_proyecto" placeholder="N° Proyecto" value="<?php if($resultado) echo $resultado['numero_proyecto']; ?>" class="input__text">
				<input type="text" name="proyecto" placeholder="Proyecto" value="<?php if($resultado) echo $resultado['proyecto']; ?>" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="indicador" placeholder="Indicador" value="<?php if($resultado) echo $resultado['indicador']; ?>" class="input__text">
				<input type="text" name="unidad_medida" placeholder="Unidad de Medida" value="<?php if($resultado) echo $resultado['unidad_medida']; ?>" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="numero_accion" placeholder="N° Acción" value="<?php if($resultado) echo $resultado['numero_accion']; ?>" class="input__text">
				<input type="text" name="accion_comprometida" placeholder="Acción Comprometida" value="<?php if($resultado) echo $resultado['accion_comprometida']; ?>" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="meta" placeholder="Meta" value="<?php if($resultado) echo $resultado['meta']; ?>" class="input__text">
				<input type="text" name="indicador_interno" placeholder="Indicador Interno (ITs)" value="<?php if($resultado) echo $resultado['indicador_interno']; ?>" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="medio_verificacion" placeholder="Medio de Verificación" value="<?php if($resultado) echo $resultado['medio_verificacion']; ?>" class="input__text">
				<input type="text" name="area_responsable" placeholder="Área Responsable" value="<?php if($resultado) echo $resultado['area_responsable']; ?>" class="input__text">
			</div>
			<div class="btn__group">
				<a href="pdi.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>
</body>
</html>
