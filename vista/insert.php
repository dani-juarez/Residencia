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
				<p><span class="label label-info"><?php echo $_SESSION["usuario"]["privilegio"] == 1 ? 'Administrador' : 'Cliente'; ?></span></p>
				
			</div>
		</div>
	</div>
</div>

<?php include 'partials/footer.php';?>

<?php 
	include_once 'conexion.php';
	
	if(isset($_POST['guardar'])){
		$nombre=$_POST['nombre'];
		$usuario=$_POST['usuario'];
		$email=$_POST['email'];
		$password=$_POST['password'];
		$privilegio=$_POST['privilegio'];

		if(!empty($nombre) && !empty($usuario) && !empty($email) && !empty($password) && !empty($privilegio) ){
			if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
				echo "<script> alert('Correo no valido');</script>";
			}else{
				$consulta_insert=$con->prepare('INSERT INTO usuarios(nombre,usuario,email,password,privilegio) VALUES(:nombre,:usuario,:email,:password,:privilegio)');
				$consulta_insert->execute(array(
					':nombre' =>$nombre,
					':usuario' =>$usuario,
					':email' =>$email,
					':password' =>$password,
					':privilegio' =>$privilegio
				));
				header('Location: admin.php');
			}
		}else{
			echo "<script> alert('Los campos estan vacios');</script>";
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
		<h2>Nuevo Usuario</h2>
		<form action="" method="post">
			<div class="form-group">
				<input type="text" name="nombre" placeholder="Nombre" class="input__text">
				<input type="text" name="usuario" placeholder="Usuario" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="email" placeholder="Correo Electronico" class="input__text">
				<input type="text" name="password" placeholder="Contraseña" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="privilegio" placeholder="Privilegio" class="input__text">
			</div>
			<div class="btn__group">
				<a href="admin.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>
</body>
</html>
