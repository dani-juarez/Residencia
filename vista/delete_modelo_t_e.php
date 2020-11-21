<?php 

	include_once 'conexion.php';
	if(isset($_GET['id'])){
		$id=(int) $_GET['id'];
		$delete=$con->prepare('DELETE FROM modelo_talento_emprendedor WHERE id=:id');
		$delete->execute(array(
			':id'=>$id
		));
		header('Location: modelo_talento_emprendedor.php');
	}else{
		header('Location: modelo_talento_emprendedor.php');
	}
 ?>