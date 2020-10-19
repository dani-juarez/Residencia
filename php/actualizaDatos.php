<?php 
	require_once "../php/conexion.php";
	$conexion=conexion();
	$id=$_POST['id'];
	$e=$_POST['eje'];
	$o=$_POST['objetivo'];
	$n=$_POST['numero_linea_accion'];
	$l=$_POST['linea_accion'];
	$nu=$_POST['numero_proyecto'];
	$p=$_POST['proyecto'];
	$i=$_POST['indicador'];
	$u=$_POST['unidad_medida'];
	$num=$_POST['numero_accion'];
	$a=$_POST['accion_comprometida'];
	$m=$_POST['meta'];
	$in=$_POST['indicador_interno'];
	$me=$_POST['medio_verificacion'];
	$ar=$_POST['area_responsable'];

	$sql="UPDATE pdi set eje='$e',
						 objetivo='$o',
						 numero_linea_accion='$n',
						 linea_accion='$l',
						 numero_proyecto='$nu',
						 proyecto='$p',
						 indicador='$i',
						 unidad_medida='$u',
						 numero_accion='$num',
						 accion_comprometida='$a',
						 meta='$m',
						 indicador_interno='$in',
						 medio_verificacion='$me',
						 area_responsable='$ar'
				where id='$id'";
	echo $result=mysqli_query($conexion,$sql);

 ?>