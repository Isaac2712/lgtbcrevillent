function btnModificarEvento(){
	var id_evento = jQuery("[name=id_evento]").val();
	var titulo_evento=jQuery("[name=titulo_evento]").val();
	var localidad_evento=jQuery("[name=localidad_evento]").val();
	var texto_evento=jQuery("[name=texto_evento]").val();
	var lugar_evento=jQuery("[name=lugar_evento]").val();
	var direccion_evento=jQuery("[name=direccion_evento]").val();
	var telefono_evento=jQuery("[name=telefono_evento]").val();
	var horario_evento=jQuery("[name=horario_evento]").val();
	var fecha_evento=jQuery("[name=fecha_evento]").val();
	var select_tipo_evento=jQuery("[name=select_tipo_evento]").val();
	//console.log(select_tipo_evento);
	var _token = jQuery("[name=_token]").val();

	var vacio = false;

	if(fecha_evento == '')
	{
		$('#fecha_evento').removeClass("input-registro-ok"); //Quitamos la clase del input relleno
	    $('#fecha_evento').addClass("input-registro-vacio"); //Añadimos clase de input vacio
	    vacio = true;
	}
	else
  	{
	    $('#fecha_evento').addClass("input-registro-ok"); //Añadimos la clase del input relleno
  	}

	if(!vacio)
	{
		var formData = new FormData();
		formData.append('_token', _token);
		formData.append('id_evento', id_evento);
		formData.append('titulo_evento', titulo_evento);
		formData.append('localidad_evento', localidad_evento);
		formData.append('texto_evento', texto_evento);
		formData.append('lugar_evento', lugar_evento);
		formData.append('telefono_evento', telefono_evento);
		formData.append('horario_evento', horario_evento);
		formData.append('fecha_evento', fecha_evento);
		formData.append('direccion_evento', direccion_evento);
		formData.append('select_tipo_evento', select_tipo_evento);
		var file = jQuery('.custom-file-input');
		formData.append("file", file[0].files[0]);

		$.ajax({
	       	type: "POST",
		    url: "/ajax/modificarEvento",
		    data: formData,
		    processData: false,
		    contentType: false,
		    success: function(respuesta) {
		    console.log(respuesta.ok);
	        if(respuesta.ok == 1)
	        {
	        	//$('#resultado_modificar_evento').html("<br><div class='alert alert-success mt-0 w-100' role='alert' id='resultado_modificar_evento'> Se ha modificado el evento. </div>").show().delay(5000).fadeOut("fast");
	        	window.location.href = '/administrador/modificar_evento'
	        }
	      },
	      error: function() {
	      }
	 	});
	}	
	return false;
}