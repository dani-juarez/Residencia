<?php 

	include_once 'conexion.php';
	if(isset($_GET['id'])){
		$id=(int) $_GET['id'];
		$delete=$con->prepare('DELETE FROM conformidad WHERE id=:id');
		$delete->execute(array(
			':id'=>$id
		));
		header('Location: conformidad_aprendizajeu.php');
	}else{
		header('Location: conformidad_aprendizajeu.php');
	}
 ?>