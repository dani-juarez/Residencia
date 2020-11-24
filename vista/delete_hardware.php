<?php 

	include_once 'conexion.php';
	if(isset($_GET['id'])){
		$id=(int) $_GET['id'];
		$delete=$con->prepare('DELETE FROM hardware WHERE id=:id');
		$delete->execute(array(
			':id'=>$id
		));
		header('Location: hardware.php');
	}else{
		header('Location: hardware.php');
	}
 ?>