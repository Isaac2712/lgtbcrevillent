function btnCambiarContraseña()
{
	
	var id_usuario = jQuery("[name=id_usuario]").val();
	var contraseña = jQuery("[name=contraseña]").val();
	var contraseña2 = jQuery("[name=contraseña2]").val();
	var _token = jQuery("[name=_token]").val();
    var regex_pass = /^.*(?=.{8,})((?=.*[!@#$%^&*()\-_=+{};:,<.>]){1})(?=.*\d)((?=.*[a-z]){1})((?=.*[A-Z]){1}).*$/g;
	var validar_contraseña = regex_pass.test(contraseña) ? true : false;
	var validar_contraseña2 = regex_pass.test(contraseña2) ? true : false;
	var validar = false;

	if(contraseña == '')
	{
		$('#contraseña_1').removeClass("input-registro-ok"); 
    	$('#contraseña_1').addClass("input-registro-vacio");
    	validar = true;
	}
	else if(!validar_contraseña)
	{
		$('#div_contraseña').html("<aside style='font-size:12px;' class='mt-1 mb-0 alert alert-success' role='alert'> La contraseña no es valida. Debe contener al menos una letra mayuscula, un numero, un simbolo y 8 caracteres. Ejemplo: Lgtbcrevi2. </aside>").show().delay(9000).fadeOut("fast");
		validar = true;
	}
	else
	{
	    $('#contraseña_1').addClass("input-registro-ok"); //Añadimos la clase del input relleno
	}

	if(contraseña2 == '')
	{
		$('#contraseña_2').removeClass("input-registro-ok"); 
    	$('#contraseña_2').addClass("input-registro-vacio");
    	validar = true;
	}
	else
	{
	    $('#contraseña_2').addClass("input-registro-ok"); //Añadimos la clase del input relleno
	}

	//Si las contraseñas son distintas
	if(contraseña != contraseña2)
	{
		$('#contraseñas_distintas').html("<div style='font-size: 12px;' class='alert alert-danger mt-0 w-100' role='alert' id='contraseñas_distintas'> Las contraseñas son distintas. </div>").show().delay(1000).fadeOut("fast");
		validar = true;
	}

	var datos = {
				 'id_usuario':id_usuario,
				 'contraseña':contraseña,
				 'contraseña2':contraseña2,
				 '_token':_token
				}

	if(validar == false)
	{
		$.ajax({
	      async: true,
	      type: "POST",
	      dataType: "json",
	      contentType: "application/x-www-form-urlencoded",
	      url: "/ajax/cambiarContraseña",
	      data: datos,
	      success: function(respuesta) {
	        //console.log(respuesta);
	        if(respuesta.ok == 1)
	        {
	         $('#resultado_cambiar_contraseña').html("<br><div class='alert alert-danger mt-0 w-100' role='alert' id='resultado_cambiar_contraseña' > Has cambiado la contraseña </div>").show().delay(3000).fadeOut("fast");
	         setTimeout("location.href='/'", 5000);
	        }
	      },
	      error: function() {
	      }
	  	});
	}
	return false;
}