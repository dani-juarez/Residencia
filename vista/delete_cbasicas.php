<?php 

	include_once 'conexion.php';
	if(isset($_GET['id'])){
		$id=(int) $_GET['id'];
		$delete=$con->prepare('DELETE FROM eventos_cbasicas WHERE id=:id');
		$delete->execute(array(
			':id'=>$id
		));
		header('Location: eventos_academicos.php');
	}else{
		header('Location: eventos_academicos.php');
	}
 ?>