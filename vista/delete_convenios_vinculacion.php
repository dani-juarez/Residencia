<?php 

	include_once 'conexion.php';
	if(isset($_GET['id'])){
		$id=(int) $_GET['id'];
		$delete=$con->prepare('DELETE FROM convenios_vinculacion WHERE id=:id');
		$delete->execute(array(
			':id'=>$id
		));
		header('Location: convenios_vinculacion.php');
	}else{
		header('Location: convenios_vinculacion.php');
	}
 ?>