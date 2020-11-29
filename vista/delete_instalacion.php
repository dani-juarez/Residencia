<?php 

	include_once 'conexion.php';
	if(isset($_GET['id'])){
		$id=(int) $_GET['id'];
		$delete=$con->prepare('DELETE FROM instalaciones WHERE id=:id');
		$delete->execute(array(
			':id'=>$id
		));
		header('Location: instalaciones.php');
	}else{
		header('Location: instalaciones.php');
	}
 ?>