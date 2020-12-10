<?php 

	include_once 'conexion.php';
	if(isset($_GET['id'])){
		$id=(int) $_GET['id'];
		$delete=$con->prepare('DELETE FROM centro_computo WHERE id=:id');
		$delete->execute(array(
			':id'=>$id
		));
		header('Location: centro_computou.php');
	}else{
		header('Location: centro_computou.php');
	}
 ?>