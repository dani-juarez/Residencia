<?php 
	require_once "../php/conexion.php";
	$conexion=conexion();
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

	$sql="INSERT into pdi (eje,objetivo,numero_linea_accion,linea_accion,numero_proyecto,proyecto,indicador,unidad_medida,numero_accion,accion_comprometida,meta,indicador_interno,medio_verificacion,area_responsable)
								values ('$e','$o','$n','$l','$nu','$p','$i','$u','$num','$a','$m','$in','$me','$ar')";
	echo $result=mysqli_query($conexion,$sql);

 ?>