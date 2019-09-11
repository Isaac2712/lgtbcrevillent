function btnModificarNoticia(){
	var id_noticia = jQuery("[name=id_noticia]").val();
	var titulo_noticia=jQuery("[name=titulo_noticia]").val();
	var enlace_noticia=jQuery("[name=enlace_noticia]").val();
	var fecha_noticia=jQuery("[name=fecha_noticia]").val();
	var _token = jQuery("[name=_token]").val();

	var formData = new FormData();
	formData.append('_token', _token);
	formData.append('id_noticia', id_noticia);
	formData.append('titulo_noticia', titulo_noticia);
	formData.append('enlace_noticia', enlace_noticia);
	formData.append('fecha_noticia', fecha_noticia);
	var file = jQuery('.custom-file-input');
	formData.append("file", file[0].files[0]);

	$.ajax({
       	type: "POST",
	    url: "/ajax/modificarNoticia",
	    data: formData,
	    processData: false,
	    contentType: false,
	    success: function(respuesta) {
	    //console.log(respuesta.ok);
        if(respuesta.ok == 1)
        {
        	//$('#resultado_modificar_noticia').html("<br><div class='alert alert-success mt-0 w-100' role='alert' id='resultado_modificar_noticia'> Se ha modificado el noticia. </div>").show().delay(5000).fadeOut("fast");
        	window.location.href = '/administrador/modificar_noticia'
        }
      },
      error: function() {
      }
 	});
	
	return false;
}