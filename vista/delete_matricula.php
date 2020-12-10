<?php 

	include_once 'conexion.php';
	if(isset($_GET['id'])){
		$id=(int) $_GET['id'];
		$delete=$con->prepare('DELETE FROM matricula WHERE id=:id');
		$delete->execute(array(
			':id'=>$id
		));
		header('Location: matriculau.php');
	}else{
		header('Location: matriculau.php');
	}
 ?>