<?php 

	include_once 'conexion.php';
	if(isset($_GET['id'])){
		$id=(int) $_GET['id'];
		$delete=$con->prepare('DELETE FROM extraescolares2 WHERE id=:id');
		$delete->execute(array(
			':id'=>$id
		));
		header('Location: extraescolares.php');
	}else{
		header('Location: extraescolares.php');
	}
 ?>