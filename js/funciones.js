function agregardatos(eje,objetivo,numero_linea_accion,linea_accion,numero_proyecto,proyecto,indicador,unidad_medida,numero_accion,accion_comprometida,meta,indicador_interno,medio_verificacion,area_responsable){

	cadena="eje=" + eje + 
			"&objetivo=" + objetivo +
			"&numero_linea_accion=" + numero_linea_accion +
			"&linea_accion=" + linea_accion +
			"&numero_proyecto=" + numero_proyecto +
			"&proyecto=" + proyecto +
			"&indicador=" + indicador +
			"&unidad_medida=" + unidad_medida +
			"&numero_accion=" + numero_accion +
			"&accion_comprometida=" + accion_comprometida +
			"&meta=" + meta +
			"&indicador_interno=" + indicador_interno +
			"&medio_verificacion=" + medio_verificacion +
			"&area_responsable=" + area_responsable;


	$.ajax({
		type:"POST",
		url:"../php/agregarDatos.php",
		data:cadena,
		success:function(r){
			if(r==1){
				$('#tabla').load('../componentes/tabla.php');
				 $('#buscador').load('../componentes/buscador.php');
				alertify.success("Agregado con Exito ✓.");
			}else{
				alertify.error("Fallo al Agregar X.");
			}
		}
	});

}

function agregaform(datos){

	d=datos.split('||');

	$('#id').val(d[0]);
	$('#ejeu').val(d[1]);
	$('#objetivou').val(d[2]);
	$('#numero_linea_accionu').val(d[3]);
	$('#linea_accionu').val(d[4]);
	$('#numero_proyectou').val(d[5]);
	$('#proyectou').val(d[6]);
	$('#indicadoru').val(d[7]);
	$('#unidad_medidau').val(d[8]);
	$('#numero_accionu').val(d[9]);
	$('#accion_comprometidau').val(d[10]);
	$('#metau').val(d[11]);
	$('#indicador_internou').val(d[12]);
	$('#medio_verificacionu').val(d[13]);
	$('#area_responsableu').val(d[14]);
	
}

function actualizaDatos(){


	id=$('#id').val();
	eje=$('#ejeu').val();
	objetivo=$('#objetivou').val();
	numero_linea_accion=$('#numero_linea_accionu').val();
	linea_accion=$('#linea_accionu').val();
	numero_proyecto=$('#numero_proyectou').val();
	proyecto=$('#proyectou').val();
	indicador=$('#indicadoru').val();
	unidad_medida=$('#unidad_medidau').val();
	numero_accion=$('#numero_accionu').val();
	accion_comprometida=$('#accion_comprometidau').val();
	meta=$('#metau').val();
	indicador_interno=$('#indicador_internou').val();
	medio_verificacion=$('#medio_verificacionu').val();
	area_responsable=$('#area_responsableu').val();

	cadena= "id=" + id +
			"&eje=" + eje + 
			"&objetivo=" + objetivo +
			"&numero_linea_accion=" + numero_linea_accion +
			"&linea_accion=" + linea_accion +
			"&numero_proyecto=" + numero_proyecto +
			"&proyecto=" + proyecto +
			"&indicador=" + indicador +
			"&unidad_medida=" + unidad_medida +
			"&numero_accion=" + numero_accion +
			"&accion_comprometida=" + accion_comprometida +
			"&meta=" + meta +
			"&indicador_interno=" + indicador_interno +
			"&medio_verificacion=" + medio_verificacion +
			"&area_responsable=" + area_responsable;

	$.ajax({
		type:"POST",
		url:"../php/actualizaDatos.php",
		data:cadena,
		success:function(r){
			
			if(r==1){
				$('#tabla').load('../componentes/tabla.php');
				alertify.success("Actualizado con Exito ✓.");
			}else{
				alertify.error("Fallo al Actualizar X.");
			}
		}
	});

}

function preguntarSiNo(id){
	alertify.confirm('Eliminar Datos', '¿Esta seguro de eliminar este registro?', 
					function(){ eliminarDatos(id) }
                , function(){ alertify.error('Se cancelo')});
}

function eliminarDatos(id){

	cadena="id=" + id;

		$.ajax({
			type:"POST",
			url:"../php/eliminarDatos.php",
			data:cadena,
			success:function(r){
				if(r==1){
					$('#tabla').load('../componentes/tabla.php');
					alertify.success("Eliminado con Exito ✓.");
				}else{
					alertify.error("Fallo al Eliminar X.");
				}
			}
		});
}