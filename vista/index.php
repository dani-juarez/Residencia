<?php include 'partials/head.php';?>
<?php include 'partials/menu.php';?>

<div class="container">

	<div class="starter-template">
		<br>
		<br>
		<br>
		<br>
		<br>
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div class="panel panel-default">
					<div class="panel-body">
						<form id="loginForm" action="validarCode.php" method="POST" role="form">
							<center><legend>Iniciar sesión</legend></center>

							<div class="form-group">
								<label for="usuario">Usuario</label>
								<center><input type="text" name="txtUsuario" class="form-control" id="usuario" autofocus required placeholder="USUARIO"></center>
							</div>

							<div class="form-group">
								<label for="password">Contraseña</label>
								<center><input type="password" name="txtPassword" class="form-control" required id="password" placeholder="CONTRASEÑA"></center>
							</div>

							<center><button type="submit" class="btn btn-success">Ingresar</button></center>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>

<?php include 'partials/footer.php';?>