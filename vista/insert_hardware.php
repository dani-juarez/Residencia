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

		if(!empty($marca) && !empty($modelo) && !empty($plataforma) && !empty($arquitectura) && !empty($procesador) && !empty($memoria) && !empty($disco_duro) && !empty($monitor) && !empty($cache) && !empty($tipo) && !empty($red) && !empty($sonido) && !empty($video) && !empty($raton) && !empty($teclado) ){ 
             }else{
				$consulta_insert=$con->prepare('INSERT INTO hardware(marca,modelo,plataforma,arquitectura,procesador,memoria,disco_duro,monitor,cache,tipo,red,sonido,video,raton,teclado) VALUES(:marca,:modelo,:plataforma,:arquitectura,:procesador,:memoria,:disco_duro,:monitor,:cache,:tipo,:red,:sonido,:video,:raton,:teclado)');
				$consulta_insert->execute(array(
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
                    ':teclado' =>$teclado
				));
				header('Location: hardwareu.php');
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
		<h2>NUEVO HARDWARE</h2>
		<form action="" method="post">
			<div class="form-group">
				<input type="text" name="marca" placeholder="MARCA" class="input__text">
				<input type="text" name="modelo" placeholder="MODELO" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="plataforma" placeholder="PLATAFORMA" class="input__text">
				<input type="text" name="arquitectura" placeholder="ARQUITECTURA" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="procesador" placeholder="PROCESADOR" class="input__text">
                <input type="text" name="memoria" placeholder="MEMORIA" class="input__text">
			</div>
            <div class="form-group">
				<input type="text" name="disco_duro" placeholder="DISCO DURO" class="input__text">
                <input type="text" name="monitor" placeholder="MONITOR" class="input__text">
			</div>
            <div class="form-group">
				<input type="text" name="cache" placeholder="CACHE" class="input__text">
                <input type="text" name="tipo" placeholder="TIPO" class="input__text">
			</div>
            <div class="form-group">
				<input type="text" name="red" placeholder="RED" class="input__text">
                <input type="text" name="sonido" placeholder="SONIDO" class="input__text">
			</div>
            <div class="form-group">
				<input type="text" name="video" placeholder="VIDEO" class="input__text">
                <input type="text" name="raton" placeholder="RATON" class="input__text">
			</div>
            <div class="form-group">
				<input type="text" name="teclado" placeholder="TECLADO" class="input__text">
			</div>
			<div class="btn__group">
				<a href="hardwareu.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>
</body>
</html>