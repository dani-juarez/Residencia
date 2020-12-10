<?php 

	include_once 'conexion.php';
	if(isset($_GET['id'])){
		$id=(int) $_GET['id'];
		$delete=$con->prepare('DELETE FROM egresados_titulados WHERE id=:id');
		$delete->execute(array(
			':id'=>$id
		));
		header('Location: egresados_tituladosu.php');
	}else{
		header('Location: egresados_tituladosu.php');
	}
 ?>