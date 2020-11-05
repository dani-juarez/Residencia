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
				<h1><strong>Bienvenido</strong> <?php echo $_SESSION["usuario"]["nombre"]; ?></h1>
				<p><span class="label label-info"><?php echo $_SESSION["usuario"]["privilegio"] == 1 ? 'Administrador' : 'Usuario'; ?></span></p>
</div>	
			</div>
<?php include 'partials/footer.php';?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <link rel="stylesheet" type="text/css" href="../CSS/style.css">
  <link rel="stylesheet" type="text/css" href="../librerias/bootstrap/CSS/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../librerias/alertifyjs/CSS/alertify.css">
	<link rel="stylesheet" type="text/css" href="../librerias/alertifyjs/CSS/themes/default.css">
  <link rel="stylesheet" type="text/css" href="../librerias/select2/CSS/select2.css">

	<script src="../librerias/jquery-3.2.1.min.js"></script>
  <script src="../js/funciones.js"></script>
  <script src="../librerias/bootstrap/js/bootstrap.js"></script>
	<script src="../librerias/alertifyjs/alertify.js"></script>
  <script src="../librerias/select2/js/select2.js"></script>
</head>
<body>

	<div class="container">
    <div id="buscador"></div>
		<div id="tabla"></div>
	</div>

	<!-- Modal para registros nuevos -->


<div class="modal fade" id="modalNuevo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <center><h4 class="modal-title" id="myModalLabel">Agrega Nuevo PDI</h4></center>
      </div>
      <div class="modal-body">
        	<label>Eje Estratégico / Eje Transversal (ET)</label>
        	<input type="text" name="" id="eje" class="form-control input-sm">
        	<label>Objetivo</label>
        	<input type="text" name="" id="objetivo" class="form-control input-sm">
        	<label>N° Línea de Acción</label>
        	<input type="text" name="" id="numero_linea_accion" class="form-control input-sm">
        	<label>Línea Acción</label>
        	<input type="text" name="" id="linea_accion" class="form-control input-sm">
          <label>N° Proyecto</label>
        	<input type="text" name="" id="numero_proyecto" class="form-control input-sm">
          <label>Proyecto</label>
        	<input type="text" name="" id="proyecto" class="form-control input-sm">
          <label>Indicador</label>
        	<input type="text" name="" id="indicador" class="form-control input-sm">
          <label>Unidad de Medida</label>
        	<input type="text" name="" id="unidad_medida" class="form-control input-sm">
          <label>N° Accioón</label>
        	<input type="text" name="" id="numero_accion" class="form-control input-sm">
          <label>Acción Comprometida</label>
        	<input type="text" name="" id="accion_comprometida" class="form-control input-sm">
          <label>Meta</label>
        	<input type="text" name="" id="meta" class="form-control input-sm">
          <label>Indicador Interno (ITs)</label>
        	<input type="text" name="" id="indicador_interno" class="form-control input-sm">
          <label>Medio de Verificación</label>
        	<input type="text" name="" id="medio_verificacion" class="form-control input-sm">
          <label>Área Responsable</label>
        	<input type="text" name="" id="area_responsable" class="form-control input-sm">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal" id="guardarnuevo">
        Agregar
        </button>
       
      </div>
    </div>
  </div>
</div>

<!-- Modal para edicion de datos -->

<div class="modal fade" id="modalEdicion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <center><h4 class="modal-title" id="myModalLabel">Actualizar PDI</h4></center>
      </div>
      <div class="modal-body">
      		<input type="text" hidden="" id="id" name="">
        	<label>Eje Estratégico / Eje Transversal (ET)</label>
        	<input type="text" name="" id="ejeu" class="form-control input-sm">
        	<label>Objetivo</label>
        	<input type="text" name="" id="objetivou" class="form-control input-sm">
        	<label>N° Línea de Acción</label>
        	<input type="text" name="" id="numero_linea_accionu" class="form-control input-sm">
        	<label>Línea de Acción</label>
        	<input type="text" name="" id="linea_accionu" class="form-control input-sm">
          <label>N° Proyecto</label>
        	<input type="text" name="" id="numero_proyectou" class="form-control input-sm">
          <label>Proyecto</label>
        	<input type="text" name="" id="proyectou" class="form-control input-sm">
          <label>Indicador</label>
        	<input type="text" name="" id="indicadoru" class="form-control input-sm">
          <label>Unidad de Medida</label>
        	<input type="text" name="" id="unidad_medidau" class="form-control input-sm">
          <label>N° Accioón</label>
        	<input type="text" name="" id="numero_accionu" class="form-control input-sm">
          <label>Acción Comprometida</label>
        	<input type="text" name="" id="accion_comprometidau" class="form-control input-sm">
          <label>Meta</label>
        	<input type="text" name="" id="metau" class="form-control input-sm">
          <label>Indicador Interno (ITs)</label>
        	<input type="text" name="" id="indicador_internou" class="form-control input-sm">
          <label>Medio de Verificación</label>
        	<input type="text" name="" id="medio_verificacionu" class="form-control input-sm">
          <label>Área Responsable</label>
        	<input type="text" name="" id="area_responsableu" class="form-control input-sm">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" id="actualizadatos" data-dismiss="modal">Actualizar</button>
      </div>
    </div>
  </div>
</div>

</body>
</html>

<script type="text/javascript">
	$(document).ready(function(){
		$('#tabla').load('../componentes/tabla.php');
    $('#buscador').load('../componentes/buscador.php');
	});
</script>

<script type="text/javascript">
    $(document).ready(function(){
        $('#guardarnuevo').click(function(){
          eje=$('#eje').val();
          objetivo=$('#objetivo').val();
          numero_linea_accion=$('#numero_linea_accion').val();
          linea_accion=$('#linea_accion').val();
          numero_proyecto=$('#numero_proyecto').val();
          proyecto=$('#proyecto').val();
          indicador=$('#indicador').val();
          unidad_medida=$('#unidad_medida').val();
          numero_accion=$('#numero_accion').val();
	        accion_comprometida=$('#accion_comprometida').val();
	        meta=$('#meta').val();
	        indicador_interno=$('#indicador_interno').val();
	        medio_verificacion=$('#medio_verificacion').val();
	        area_responsable=$('#area_responsable').val();
            agregardatos(eje,objetivo,numero_linea_accion,linea_accion,numero_proyecto,proyecto,indicador,unidad_medida,numero_accion,accion_comprometida,meta,indicador_interno,medio_verificacion,area_responsable);
        });



        $('#actualizadatos').click(function(){
          actualizaDatos();
        });

    });
</script>