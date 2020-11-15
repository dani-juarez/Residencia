<?php 

	include_once 'conexion.php';
	if(isset($_GET['id'])){
		$id=(int) $_GET['id'];
		$delete=$con->prepare('DELETE FROM pdi WHERE id=:id');
		$delete->execute(array(
			':id'=>$id
		));
		header('Location: pta.php');
	}else{
		header('Location: pta.php');
	}
 ?>