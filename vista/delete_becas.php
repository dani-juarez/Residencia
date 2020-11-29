<?php 

	include_once 'conexion.php';
	if(isset($_GET['id'])){
		$id=(int) $_GET['id'];
		$delete=$con->prepare('DELETE FROM becas WHERE id=:id');
		$delete->execute(array(
			':id'=>$id
		));
		header('Location: becas.php');
	}else{
		header('Location: becas.php');
	}
 ?>