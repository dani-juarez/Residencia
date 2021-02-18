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
	<title>Inicio</title>
	<link rel="stylesheet" href="../CSS/style.css">
</head>
<body>
	<div class="contenedor">
		<center><h3>MODULO PDI TECNM</h3></center>

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
				<td>Númerador</td>
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

            <?php
            
            $query="SELECT  PDI.eje, PDI.objetivo, PDI.linea_accion, PDi.proyecto, PDI.numero_indicador, PDI.indicador, PDI.unidad_medida, PDI.metodo_calculo, PDI.numerador, PDI.denominador, PDI.area_responsable, PDI.1000, PDI.2000, PDI.3000, PDI.4000, PDI.5000, PDI.ffpsr, PDI.ai, PDI.pp, PDI.eje_estructura, PDI.objetivo_estructura, PDI.la, PDI.proyecto_estructura, PDI.numero_indicador_estructura,
				            US.nombre
                            FROM pdi PDI
                            INNER JOIN usuarios US ON US.nombre = PDI.area_responsable ";
            $consulta=$con->query($query);
			while ($fila=$consulta->fetch(PDO::FETCH_ASSOC))
                 {
                    echo'
                         <tr>
                         <td>'.$fila['eje'].'</td>
                         <td>'.$fila['objetivo'].'</td>
                         <td>'.$fila['linea_accion'].'</td>
                         <td>'.$fila['proyecto'].'</td>
                         <td>'.$fila['numero_indicador'].'</td>
                         <td>'.$fila['indicador'].'</td>
                         <td>'.$fila['unidad_medida'].'</td>
                         <td>'.$fila['metodo_calculo'].'</td>
                         <td>'.$fila['numerador'].'</td>
                         <td>'.$fila['denominador'].'</td>
                         <td>'.$fila['area_responsable'].'</td>
                         <td>'.$fila['1000'].'</td>
                         <td>'.$fila['2000'].'</td>
						 <td>'.$fila['3000'].'</td>
						 <td>'.$fila['4000'].'</td>
						 <td>'.$fila['5000'].'</td>
						 <td>'.$fila['ffpsr'].'</td>
						 <td>'.$fila['ai'].'</td>
						 <td>'.$fila['pp'].'</td>
						 <td>'.$fila['eje_estructura'].'</td>
						 <td>'.$fila['objetivo_estructura'].'</td>
						 <td>'.$fila['la'].'</td>
						 <td>'.$fila['proyecto_estructura'].'</td>
						 <td>'.$fila['numero_indicador_estructura'].'</td>
                         </tr>
                         ';
                 }
?>
		</table>
	</div>
</body>
</html>