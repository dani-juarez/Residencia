<?php 

	include_once 'conexion.php';
	if(isset($_GET['id'])){
		$id=(int) $_GET['id'];
		$delete=$con->prepare('DELETE FROM gestion_empresarial WHERE id=:id');
		$delete->execute(array(
			':id'=>$id
		));
		header('Location: alumnos_edad_genero.php');
	}else{
		header('Location: alumnos_edad_genero.php');
	}
 ?>