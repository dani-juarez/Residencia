<?php 

	include_once 'conexion.php';
	if(isset($_GET['id'])){
		$id=(int) $_GET['id'];
		$delete=$con->prepare('DELETE FROM r_humanos_funcionarios WHERE id=:id');
		$delete->execute(array(
			':id'=>$id
		));
		header('Location: r_humanos2u.php');
	}else{
		header('Location: r_humanos2u.php');
	}
 ?>