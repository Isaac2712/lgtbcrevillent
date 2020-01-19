function btnSeleccionarEvento()
{
	var evento_seleccionado = jQuery("[name=select_modificar_evento]").val();
	var _token = jQuery("[name=_token]").val();

	if(evento_seleccionado == "") //si el evento esta vacio
  	{
	    //Visualizamos este div de seleccionar algun evento
	    jQuery("#boton_modificar").html("<br><div class='alert alert-danger mt-0 w-100' role='alert' id='boton_eliminar'> Selecciona algun evento del select. </div>").show().delay(2500).fadeOut("fast");
  	}
  	else
  	{
	  	//si hemos seleccionado algun evento para modificar
	  	//Ocultamos el formulario de seleccionar
	  	jQuery("#form_select_modificar_evento").css("display", "none");
	  	//Visualizamos el formulario para modificar el evento
	  	jQuery("#form_modificar_evento").css("display", "block");
	}

	var datos = {'_token':_token, 'evento_seleccionado':evento_seleccionado}

  $.ajax({
      async: true,
      type: "POST",
      dataType: "json",
      contentType: "application/x-www-form-urlencoded",
      url: "/ajax/seleccionarEvento",
      data: datos,
      success: function(respuesta) {
        if(respuesta.ok != '')
        {
          jQuery("[name='id_evento']").val(respuesta.ok[0]['id']);
        	jQuery("[name='titulo_evento']").val(respuesta.ok[0]['titulo']);
        	jQuery("[name='localidad_evento']").val(respuesta.ok[0]['localidad']);
        	jQuery("[name='texto_evento']").val(respuesta.ok[0]['texto']);
        	jQuery("[name='lugar_evento']").val(respuesta.ok[0]['lugar']);
        	jQuery("[name='direccion_evento']").val(respuesta.ok[0]['direccion']);
        	jQuery("[name='telefono_evento']").val(respuesta.ok[0]['telefono']);
        	jQuery("[name='horario_evento']").val(respuesta.ok[0]['horario']);
        	jQuery("[name='imagen_evento'").remove();
        	jQuery("[name='label_imagen_evento'").remove();
        	jQuery("[id='nuevo_input_imagen'").html("<input type='file' class='custom-file-input' id='input_img_nuevo'>");
        	jQuery("[id='nuevo_label_imagen'").html("<label for='input_img_nuevo' class='custom-file-label'>"+respuesta.ok[0]['imagen']+"</label>");
        }
        else
        {
        	$('#resultado_seleccionar_evento').html("<br><div class='alert alert-danger mt-0 w-100' role='alert' id='resultado_seleccionar_evento'> No se han podido rellenar los input </div>").show().delay(5000).fadeOut("fast");
        }
      },
      error: function() {
      }
  });

  	return false; //siempre
}
