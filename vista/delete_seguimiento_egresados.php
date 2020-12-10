<?php 

	include_once 'conexion.php';
	if(isset($_GET['id'])){
		$id=(int) $_GET['id'];
		$delete=$con->prepare('DELETE FROM seguimiento_egresados WHERE id=:id');
		$delete->execute(array(
			':id'=>$id
		));
		header('Location: seguimiento_egresadosu.php');
	}else{
		header('Location: seguimiento_egresadosu.php');
	}
 ?>