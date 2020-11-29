<?php 

	include_once 'conexion.php';
	if(isset($_GET['id'])){
		$id=(int) $_GET['id'];
		$delete=$con->prepare('DELETE FROM egresados_titulados2 WHERE id=:id');
		$delete->execute(array(
			':id'=>$id
		));
		header('Location: egresados_titulados.php');
	}else{
		header('Location: egresados_titulados.php');
	}
 ?>