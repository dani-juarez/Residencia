<?php 

	include_once 'conexion.php';
	if(isset($_GET['id'])){
		$id=(int) $_GET['id'];
		$delete=$con->prepare('DELETE FROM residencia_profesional2 WHERE id=:id');
		$delete->execute(array(
			':id'=>$id
		));
		header('Location: servicio_social_residencia_profesionalu.php');
	}else{
		header('Location: servicio_social_residencia_profesionalu.php');
	}
 ?>