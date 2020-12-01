<?php 

	include_once 'conexion.php';
	if(isset($_GET['id'])){
		$id=(int) $_GET['id'];
		$delete=$con->prepare('DELETE FROM evaluacion_docente2 WHERE id=:id');
		$delete->execute(array(
			':id'=>$id
		));
		header('Location: evaluacion_docente.php');
	}else{
		header('Location: evaluacion_docente.php');
	}
 ?>