<?php 

	include_once 'conexion.php';
	if(isset($_GET['id'])){
		$id=(int) $_GET['id'];
		$delete=$con->prepare('DELETE FROM software WHERE id=:id');
		$delete->execute(array(
			':id'=>$id
		));
		header('Location: software.php');
	}else{
		header('Location: software.php');
	}
 ?>