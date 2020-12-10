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

		$buscar_id=$con->prepare('SELECT * FROM convenios_vinculacion WHERE id=:id LIMIT 1');
		$buscar_id->execute(array(
			':id'=>$id
		));
		$resultado=$buscar_id->fetch();
	}else{
		header('Location: convenios_vinculacionu.php');
	}


	if(isset($_POST['guardar'])){
		$nombre_empresa=$_POST['nombre_empresa'];
        $ubicacion=$_POST['ubicacion'];
        $ano_creacion=$_POST['ano_creacion'];
        $sector=$_POST['sector'];
        $giro=$_POST['giro'];
        $tamano=$_POST['tamano'];
        $n_empleados=$_POST['n_empleados'];
        $tipo=$_POST['tipo'];
        $modalidad=$_POST['modalidad'];
        $alcance=$_POST['alcance'];
        $area_conocimiento=$_POST['area_conocimiento'];
        $inicio=$_POST['inicio'];
        $termino=$_POST['termino'];
		$id=(int) $_GET['id'];

		if(!empty($nombre_empresa) && !empty($ubicacion) && !empty($ano_creacion) && !empty($sector) && !empty($giro) && !empty($tamano) && !empty($n_empleados) && !empty($tipo) && !empty($modalidad) && !empty($alcance) && !empty($area_conocimiento) && !empty($inicio) && !empty($termino) ){
             }else{
				$consulta_update=$con->prepare(' UPDATE convenios_vinculacion SET  
					nombre_empresa=:nombre_empresa,
					ubicacion=:ubicacion,
                    ano_creacion=:ano_creacion,
                    sector=:sector,
                    giro=:giro,
                    tamano=:tamano,
                    n_empleados=:n_empleados,
                    tipo=:tipo,
                    modalidad=:modalidad,
                    alcance=:alcance,
                    area_conocimiento=:area_conocimiento,
                    inicio=:inicio,
                    termino=:termino
					WHERE id=:id;'
				);
				$consulta_update->execute(array(
					':nombre_empresa' =>$nombre_empresa,
                    ':ubicacion' =>$ubicacion,
                    ':ano_creacion' =>$ano_creacion,
                    ':sector' =>$sector,
                    ':giro' =>$giro,
                    ':tamano' =>$tamano,
                    ':n_empleados' =>$n_empleados,
                    ':tipo' =>$tipo,
                    ':modalidad' =>$modalidad,
                    ':alcance' =>$alcance,
                    ':area_conocimiento' =>$area_conocimiento,
                    ':inicio' =>$inicio,
                    ':termino' =>$termino,
					':id' =>$id
				));
				header('Location: convenios_vinculacionu.php');
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
		<h2>ACTUALIZAR CONVENIO</h2>
		<form action="" method="post">
			<div class="form-group">
				<input type="text" name="nombre_empresa" placeholder="NOMBRE DE LA EMPRESA" value="<?php if($resultado) echo $resultado['nombre_empresa']; ?>" class="input__text">
				<input type="text" name="ubicacion" placeholder="UBICACION DE LA EMPRESA" value="<?php if($resultado) echo $resultado['ubicacion']; ?>" class="input__text">
			</div>
            <div class="form-group">
				<input type="text" name="ano_creacion" placeholder="AÑO DE CREACION" value="<?php if($resultado) echo $resultado['ano_creacion']; ?>" class="input__text">
				<input type="text" name="sector" placeholder="SECTOR" value="<?php if($resultado) echo $resultado['sector']; ?>" class="input__text">
			</div>
            <div class="form-group">
				<input type="text" name="giro" placeholder="GIRO" value="<?php if($resultado) echo $resultado['giro']; ?>" class="input__text">
				<input type="text" name="tamano" placeholder="TAMAÑO" value="<?php if($resultado) echo $resultado['tamano']; ?>" class="input__text">
			</div>
            <div class="form-group">
				<input type="text" name="n_empleados" placeholder="NUMERO DE EMPLEADOS" value="<?php if($resultado) echo $resultado['n_empleados']; ?>" class="input__text">
				<input type="text" name="tipo" placeholder="TIPO" value="<?php if($resultado) echo $resultado['tipo']; ?>" class="input__text">
			</div>
            <div class="form-group">
				<input type="text" name="modalidad" placeholder="MODALIDAD" value="<?php if($resultado) echo $resultado['modalidad']; ?>" class="input__text">
				<input type="text" name="alcance" placeholder="ALCANCE" value="<?php if($resultado) echo $resultado['alcance']; ?>" class="input__text">
			</div>
            <div class="form-group">
				<input type="text" name="area_conocimiento" placeholder="AREA CONOCIMIENTO" value="<?php if($resultado) echo $resultado['area_conocimiento']; ?>" class="input__text">
				<input type="text" name="inicio" placeholder="INICIO" value="<?php if($resultado) echo $resultado['inicio']; ?>" class="input__text">
			</div>
            <div class="form-group">
				<input type="text" name="termino" placeholder="TERMINO" value="<?php if($resultado) echo $resultado['termino']; ?>" class="input__text">
			</div>
			<div class="btn__group">
				<a href="convenios_vinculacionu.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>
</body>
</html>