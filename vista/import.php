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
	$conexion->query("INSERT INTO pdi (eje,objetivo,numero_linea_accion,linea_accion,numero_proyecto,proyecto,indicador,unidad_medida,numero_accion,accion_comprometida,meta,indicador_interno,medio_verificacion,area_responsable)
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
						  '{$contactData[13]}'
						   )

						 "); 
}


?>