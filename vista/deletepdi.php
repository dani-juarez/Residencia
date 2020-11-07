<?php 

	include_once 'conexion.php';
	if(isset($_GET['id'])){
		$id=(int) $_GET['id'];
		$delete=$con->prepare('DELETE FROM pdi WHERE id=:id');
		$delete->execute(array(
			':id'=>$id
		));
		header('Location: pdi.php');
	}else{
		header('Location: pdi.php');
	}
 ?>