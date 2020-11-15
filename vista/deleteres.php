<?php 

	include_once 'conexion.php';
	if(isset($_GET['id'])){
		$id=(int) $_GET['id'];
		$delete=$con->prepare('DELETE FROM responsables WHERE id=:id');
		$delete->execute(array(
			':id'=>$id
		));
		header('Location: i-basicos.php');
	}else{
		header('Location: i-basicos.php');
	}
 ?>