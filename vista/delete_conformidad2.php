<?php 

	include_once 'conexion.php';
	if(isset($_GET['id'])){
		$id=(int) $_GET['id'];
		$delete=$con->prepare('DELETE FROM conformidad2 WHERE id=:id');
		$delete->execute(array(
			':id'=>$id
		));
		header('Location: conformidad_aprendizaje.php');
	}else{
		header('Location: conformidad_aprendizaje.php');
	}
 ?>