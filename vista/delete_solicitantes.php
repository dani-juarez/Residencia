<?php 

	include_once 'conexion.php';
	if(isset($_GET['id'])){
		$id=(int) $_GET['id'];
		$delete=$con->prepare('DELETE FROM solicitantes WHERE id=:id');
		$delete->execute(array(
			':id'=>$id
		));
		header('Location: solicitantes.php');
	}else{
		header('Location: solicitantes.php');
	}
 ?>