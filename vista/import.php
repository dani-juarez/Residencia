<?php

include('conexioncsv.php');

$fileContacts = $_FILES['fileContacts']; 
$fileContacts = file_get_contents($fileContacts['tmp_name']); 

$fileContacts = explode("\n", $fileContacts);
$fileContacts = array_filter($fileContacts); 

// preparar contactos (convertirlos en array)
foreach ($fileContacts as $contact) 
{
	$contactList[] = explode(",", $contact);
}

// insertar contactos
foreach ($contactList as $contactData) 
{
	$conexion->query("INSERT INTO pdi (eje,objetivo,linea_accion,proyecto,numero_indicador,indicador,unidad_medida,metodo_calculo,numerador,denominador,area_responsable,mil,dosmil,tresmil,cuatromil,cincomil,ffpsr,ai,pp,eje_estructura,objetivo_estructura,la,proyecto_estructura,numero_indicador_estructura)
						 VALUES

						  ('{$contactData[0]}',
						  '{$contactData[1]}', 
						  '{$contactData[2]}',
						  '{$contactData[3]}',
						  '{$contactData[4]}',
						  '{$contactData[5]}',
						  '{$contactData[6]}',
						  '{$contactData[7]}',
						  '{$contactData[8]}',
						  '{$contactData[9]}',
						  '{$contactData[10]}',
						  '{$contactData[11]}',
						  '{$contactData[12]}',
						  '{$contactData[13]}',
						  '{$contactData[14]}',
						  '{$contactData[15]}',
						  '{$contactData[16]}',
						  '{$contactData[17]}',
						  '{$contactData[18]}',
						  '{$contactData[19]}',
						  '{$contactData[20]}',
						  '{$contactData[21]}',
						  '{$contactData[22]}',
						  '{$contactData[23]}'
						   )

						 "); 
}


?>