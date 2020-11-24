<?php 

	include_once 'conexion.php';
	if(isset($_GET['id'])){
		$id=(int) $_GET['id'];
		$delete=$con->prepare('DELETE FROM recursos_financieros WHERE id=:id');
		$delete->execute(array(
			':id'=>$id
		));
		header('Location: recursos_financieros.php');
	}else{
		header('Location: recursos_financieros.php');
	}
 ?>