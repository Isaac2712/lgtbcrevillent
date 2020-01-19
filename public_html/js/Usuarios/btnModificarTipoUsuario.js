function btnModificarTipoUsuario()
{	
	var id_usuario = jQuery("[name=id_usuario]").val();
	var tipo_usuario = jQuery("[name=seleccionar_tipo_usuario]").val();
	var fecha_nacimiento = jQuery("[name=fecha_nacimiento]").val();

	var _token = jQuery("[name=_token]").val();

	var datos = {
				 'id_usuario':id_usuario,
				 'tipo_usuario':tipo_usuario,
				 'fecha_nacimiento':fecha_nacimiento,
				 '_token':_token
				}
	
	$.ajax({
        async: true,
      	type: "POST",
	    dataType: "json",
	   	contentType: "application/x-www-form-urlencoded",
	    url: "/ajax/modificar_tipo_usuario",
	    data: datos,
	    success: function(respuesta) {
          //console.log(respuesta);
          if(respuesta.ok == 1)
          {
            window.location.href = '/administrador/tabla_usuarios'
          }
        },
        error: function() {
          $('#resultado_anadir_noticia').html("<br><div class='alert alert-danger mt-0 w-100 float-right' role='alert' id='resultado_anadir_noticia' > Internal Server Error </div>").show().delay(5000).fadeOut("fast");
        }
    });
	return false;
}