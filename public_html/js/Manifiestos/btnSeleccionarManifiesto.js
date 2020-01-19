function btnSeleccionarManifiesto()
{
	var noticia_seleccionada = jQuery("[name=select_modificar_noticia]").val();
	var _token = jQuery("[name=_token]").val();

	if(noticia_seleccionada == "") //si el noticia esta vacio
  	{
	    //Visualizamos este div de seleccionar algun noticia
	    jQuery("#boton_modificar").html("<br><div class='alert alert-danger mt-0 w-100' role='alert' id='boton_eliminar'> Selecciona algun noticia del select. </div>").show().delay(2500).fadeOut("fast");
  	}
  	else
  	{
	  	//si hemos seleccionado alguna noticia para modificar
	  	//Ocultamos el formulario de seleccionar
	  	jQuery("#form_select_modificar_noticia").css("display", "none");
	  	//Visualizamos el formulario para modificar el noticia
	  	jQuery("#form_modificar_noticia").css("display", "block");
	}

	var datos = {'_token':_token, 'noticia_seleccionada':noticia_seleccionada}

  $.ajax({
      async: true,
      type: "POST",
      dataType: "json",
      contentType: "application/x-www-form-urlencoded",
      url: "/ajax/seleccionarnoticia",
      data: datos,
      success: function(respuesta) {
        if(respuesta.ok != '')
        {
          jQuery("[name='id_noticia']").val(respuesta.ok[0]['id']);
        	jQuery("[name='titulo_noticia']").val(respuesta.ok[0]['titulo']);
        	jQuery("[name='imagen_noticia']").val(respuesta.ok[0]['imagen']);
        	jQuery("[name='enlace_noticia']").val(respuesta.ok[0]['enlace']);
        	jQuery("[name='imagen_noticia'").remove();
        	jQuery("[name='label_imagen_noticia'").remove();
        	jQuery("[id='nuevo_input_imagen'").html("<input type='file' class='custom-file-input' id='input_img_nuevo'>");
        	jQuery("[id='nuevo_label_imagen'").html("<label for='input_img_nuevo' class='custom-file-label'>"+respuesta.ok[0]['imagen']+"</label>");
        }
        else
        {
        	$('#resultado_seleccionar_noticia').html("<br><div class='alert alert-danger mt-0 w-100' role='alert' id='resultado_seleccionar_noticia'> No se han podido rellenar los input </div>").show().delay(5000).fadeOut("fast");
        }
      },
      error: function() {
      }
  });

  	return false; //siempre
}
