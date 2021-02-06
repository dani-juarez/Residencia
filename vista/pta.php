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

	$sentencia_select=$con->prepare('SELECT *FROM pdi ORDER BY id ASC');
	$sentencia_select->execute();
	$resultado=$sentencia_select->fetchAll();

	// metodo buscar
	if(isset($_POST['btn_buscar'])){
		$buscar_text=$_POST['buscar'];
		$select_buscar=$con->prepare('
			SELECT *FROM pdi WHERE area_responsable LIKE :campo;'
		);

		$select_buscar->execute(array(
			':campo' =>"%".$buscar_text."%"
		));

		$resultado=$select_buscar->fetchAll();

	}

?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="../CSS/style.css">
</head>
<body>

<form action="files.php" method="post" enctype="multipart/form-data" id="filesForm">
            <div class="col-md-4 offset-md-4">
                <input class="form-control" type="file" name="fileContacts" >
                <button type="button" onclick="uploadContacts()" class="btn btn-primary form-control" >Cargar CSV</button>
            </div>
        </form>

<script type="text/javascript">

    function uploadContacts()
    {

        var Form = new FormData($('#filesForm')[0]);
        $.ajax({

            url: "import.php",
            type: "post",
            data : Form,
            processData: false,
            contentType: false,
            success: function(data)
            {
                alert('Registros Agregados!');
            }
        });
    }

</script>

	<div class="contenedor">
		<h2>MODULO PDI TECNM</h2>
		<div class="barra__buscador">
			<form action="" class="formulario" method="post">
				<input type="text" name="buscar" placeholder="Buscar por Area Responsable" 
				value="<?php if(isset($buscar_text)) echo $buscar_text; ?>" class="input__text">
				<input type="submit" class="btn" name="btn_buscar" value="Buscar">
				<a href="insertpta.php" class="btn btn__nuevo">Nuevo PDI</a>

			</form>
		</div>

		<table>
			<tr class="head">
				<td>Eje Estratégico</td>
				<td>Objetivo</td>
				<td>Línea de Acción</td>
				<td>Proyecto</td>
				<td>N° Indicador</td>
				<td>Indicador</td>
				<td>Unidad de Medida</td>
				<td>Metodo de Calculo</td>
				<td>Numerador</td>
				<td>Denominador (Solo colocarlo para porcentajes)</td>
				<td>Area Responsable</td>
				<td colspan="5">Capitulos Autorizados</td>
				<td colspan="8">Estructura Programatica Presupuestal</td>
				<td colspan="2">Acción</td>
			</tr>

			<tr class="head">
				<td></td>
				<td></td>
				<td></td>
                <td></td>
                <td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td>1000</td>
				<td>2000</td>
				<td>3000</td>
				<td>4000</td>
				<td>5000</td>
				<td>FFPSR</td>
				<td>AI</td>
				<td>PP</td>
				<td>EJE</td>
				<td>OBJETIVO</td>
				<td>LA</td>
				<td>PROYECTO</td>
				<td>N° INDICADOR</td>
				<td></td>
				<td></td>
			</tr>

			<?php foreach($resultado as $fila):?>
				<tr >
					<td><?php echo $fila['eje']; ?></td>
					<td><?php echo $fila['objetivo']; ?></td>
					<td><?php echo $fila['linea_accion']; ?></td>
					<td><?php echo $fila['proyecto']; ?></td>
					<td><?php echo $fila['numero_indicador']; ?></td>
					<td><?php echo $fila['indicador']; ?></td>
					<td><?php echo $fila['unidad_medida']; ?></td>
					<td><?php echo $fila['metodo_calculo']; ?></td>
					<td><?php echo $fila['numerador']; ?></td>
					<td><?php echo $fila['denominador']; ?></td>
					<td><?php echo $fila['area_responsable']; ?></td>
					<td><?php echo $fila['mil']; ?></td>
					<td><?php echo $fila['dosmil']; ?></td>
					<td><?php echo $fila['tresmil']; ?></td>
					<td><?php echo $fila['cuatromil']; ?></td>
					<td><?php echo $fila['cincomil']; ?></td>
					<td><?php echo $fila['ffpsr']; ?></td>
					<td><?php echo $fila['ai']; ?></td>
					<td><?php echo $fila['pp']; ?></td>
					<td><?php echo $fila['eje_estructura']; ?></td>
					<td><?php echo $fila['objetivo_estructura']; ?></td>
					<td><?php echo $fila['la']; ?></td>
					<td><?php echo $fila['proyecto_estructura']; ?></td>
					<td><?php echo $fila['numero_indicador_estructura']; ?></td>
					<td><a href="updatepta.php?id=<?php echo $fila['id']; ?>"  class="btn__update" >Editar</a></td>
					<td><a href="deletepta.php?id=<?php echo $fila['id']; ?>" class="btn__delete">Eliminar</a></td>
				</tr>
			<?php endforeach ?>

		</table>
	</div>
	<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>
</body>
</html>