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

		$buscar_id=$con->prepare('SELECT * FROM hardware WHERE id=:id LIMIT 1');
		$buscar_id->execute(array(
			':id'=>$id
		));
		$resultado=$buscar_id->fetch();
	}else{
		header('Location: hardware.php');
	}


	if(isset($_POST['guardar'])){
		$marca=$_POST['marca'];
		$modelo=$_POST['modelo'];
		$plataforma=$_POST['plataforma'];
		$arquitectura=$_POST['arquitectura'];
        $procesador=$_POST['procesador'];
        $memoria=$_POST['memoria'];
        $disco_duro=$_POST['disco_duro'];
        $monitor=$_POST['monitor'];
        $cache=$_POST['cache'];
        $tipo=$_POST['tipo'];
        $red=$_POST['red'];
        $sonido=$_POST['sonido'];
        $video=$_POST['video'];
        $raton=$_POST['raton'];
        $teclado=$_POST['teclado'];
		$id=(int) $_GET['id'];

		if(!empty($marca) && !empty($modelo) && !empty($plataforma) && !empty($arquitectura) && !empty($procesador) && !empty($memoria) && !empty($disco_duro) && !empty($monitor) && !empty($cache) && !empty($tipo) && !empty($red) && !empty($sonido) && !empty($video) && !empty($raton) && !empty($teclado) ){ }else{

				$consulta_update=$con->prepare(' UPDATE hardware SET  
					marca=:marca,
					modelo=:modelo,
					plataforma=:plataforma,
					arquitectura=:arquitectura,
					procesador=:procesador,
                    memoria=:memoria,
                    disco_duro=:disco_duro,
                    monitor=:monitor,
                    cache=:cache,
                    tipo=:tipo,
                    red=:red,
                    sonido=:sonido,
                    video=:video,
                    raton=:raton,
                    teclado=:teclado
					WHERE id=:id;'
				);
				$consulta_update->execute(array(
                    ':marca' =>$marca,
					':modelo' =>$modelo,
					':plataforma' =>$plataforma,
					':arquitectura' =>$arquitectura,
                    ':procesador' =>$procesador,
                    ':memoria' =>$memoria,
                    ':disco_duro' =>$disco_duro,
                    ':monitor' =>$monitor,
                    ':cache' =>$cache,
                    ':tipo' =>$tipo,
                    ':red' =>$red,
                    ':sonido' =>$sonido,
                    ':video' =>$video,
                    ':raton' =>$raton,
                    ':teclado' =>$teclado,
					':id' =>$id
				));
				header('Location: hardware.php');
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
		<h2>ACTUALIZAR HARDWARE</h2>
		<form action="" method="post">
			<div class="form-group">
				<input type="text" name="marca" placeholder="MARCA" value="<?php if($resultado) echo $resultado['marca']; ?>" class="input__text">
				<input type="text" name="modelo" placeholder="MODELO" value="<?php if($resultado) echo $resultado['modelo']; ?>" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="plataforma" placeholder="PLATAFORMA" value="<?php if($resultado) echo $resultado['plataforma']; ?>" class="input__text">
				<input type="text" name="arquitectura" placeholder="ARQUITECTURA" value="<?php if($resultado) echo $resultado['arquitectura']; ?>" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="procesador" placeholder="PROCESADOR" value="<?php if($resultado) echo $resultado['procesador']; ?>" class="input__text">
                <input type="text" name="memoria" placeholder="MEMORIA" value="<?php if($resultado) echo $resultado['memoria']; ?>" class="input__text">
			</div>
            <div class="form-group">
				<input type="text" name="disco_duro" placeholder="DISCO DURO" value="<?php if($resultado) echo $resultado['disco_duro']; ?>" class="input__text">
                <input type="text" name="monitor" placeholder="MONITOR" value="<?php if($resultado) echo $resultado['monitor']; ?>" class="input__text">
			</div>
            <div class="form-group">
				<input type="text" name="cache" placeholder="CACHE" value="<?php if($resultado) echo $resultado['cache']; ?>" class="input__text">
                <input type="text" name="tipo" placeholder="TIPO" value="<?php if($resultado) echo $resultado['tipo']; ?>" class="input__text">
			</div>
            <div class="form-group">
				<input type="text" name="red" placeholder="RED" value="<?php if($resultado) echo $resultado['red']; ?>" class="input__text">
                <input type="text" name="sonido" placeholder="SONIDO" value="<?php if($resultado) echo $resultado['sonido']; ?>" class="input__text">
			</div>
            <div class="form-group">
				<input type="text" name="video" placeholder="VIDEO" value="<?php if($resultado) echo $resultado['video']; ?>" class="input__text">
                <input type="text" name="raton" placeholder="RATON" value="<?php if($resultado) echo $resultado['raton']; ?>" class="input__text">
			</div>
            <div class="form-group">
				<input type="text" name="teclado" placeholder="TECLADO" value="<?php if($resultado) echo $resultado['teclado']; ?>" class="input__text">
			</div>
			<div class="btn__group">
				<a href="hardware.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>
</body>
</html>
