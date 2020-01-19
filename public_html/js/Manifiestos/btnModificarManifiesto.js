function btnModificarManifiesto(){
	var id_manifiesto=jQuery("[name=id_manifiesto]").val();
	var titulo_manifiesto=jQuery("[name=titulo_manifiesto]").val();
	var fecha_manifiesto=jQuery("[name=fecha_manifiesto]").val();
	var texto_manifiesto=jQuery("[name=texto_manifiesto]").val();
	var pdf_manifiesto=jQuery("[name=pdf_manifiesto]").val();
	var _token = jQuery("[name=_token]").val();

	var formData = new FormData();
	formData.append('_token', _token);
	formData.append('id_manifiesto', id_manifiesto);
	formData.append('titulo_manifiesto', titulo_manifiesto);
	formData.append('texto_manifiesto', texto_manifiesto);
	formData.append('fecha_manifiesto', fecha_manifiesto);
	var file = jQuery('.custom-file-input');
	formData.append("file", file[0].files[0]);

	$.ajax({
       	type: "POST",
	    url: "/ajax/modificarManifiesto",
	    data: formData,
	    processData: false,
	    contentType: false,
	    success: function(respuesta) {
	    //console.log(respuesta.ok);
        if(respuesta.ok == 1)
        {
        	//$('#resultado_modificar_manifiesto').html("<br><div class='alert alert-success mt-0 w-100' role='alert' id='resultado_modificar_manifiesto'> Se ha modificado el manifiesto. </div>").show().delay(5000).fadeOut("fast");
        	window.location.href = '/administrador/modificar_manifiesto'
        }
      },
      error: function() {
      }
 	});
	
	return false;
}