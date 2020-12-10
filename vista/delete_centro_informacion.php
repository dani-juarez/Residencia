<?php 

	include_once 'conexion.php';
	if(isset($_GET['id'])){
		$id=(int) $_GET['id'];
		$delete=$con->prepare('DELETE FROM centro_informacion WHERE id=:id');
		$delete->execute(array(
			':id'=>$id
		));
		header('Location: centro_informacionu.php');
	}else{
		header('Location: centro_informacionu.php');
	}
 ?>