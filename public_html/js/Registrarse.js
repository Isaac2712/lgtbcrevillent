function Registrarse()
{
	var nick = jQuery("[name=nick]").val();
	var nombre_apellidos = jQuery("[name=nombre_apellidos]").val();
	var email = jQuery("[name=email]").val();
	var pass = jQuery("[name=pass]").val();
	var pass2 = jQuery("[name=pass2]").val();
	var provincia = jQuery("[name=provincia]").val();
	var municipios = jQuery("[name=municipios]").val();
	var fechaNaci = jQuery("[name=fechaNaci]").val();
	var politica = jQuery("[name=politica]").val();
	var _token = jQuery("[name=_token]").val();
	var vacio = false;

	/* ------------------------------------------ */
	// SIRVE PARA HACER DESAPARECER EL BLOQUE	  //
	// EN LOS SEGUNDOS QUE MARCA EL DELAY(),   	  //
	// CUANTOS MAYOR SEA EL NUMERO, MAS SEGUNDOS  //
	// TARDA EN DESAPARECER.					  //
	// show() --> muestra el bloque.			  //
	// delay() --> la duracion. 1000 es 1 seg.	  //
	// fadeout("fast") --> deja de mostrar el 	  //
	// bloque cuando acaben los segundos.		  //
	// .show().delay(1000).fadeOut("fast"); 	  //
	/* ------------------------------------------ */

	//Validar email
	var regex = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
	var validar_email = regex.test(email) ? true : false;
  	//Validamos contraseña
    var regex_pass = /^.*(?=.{8,})((?=.*[!@#$%^&*()\-_=+{};:,<.>]){1})(?=.*\d)((?=.*[a-z]){1})((?=.*[A-Z]){1}).*$/g;
	var validar_pass = regex_pass.test(pass) ? true : false;

	// NICK //
	if(nick == ""){
		$('#nick').removeClass("input-registro-ok"); //Quitamos la clase del input relleno
		$('#nick').addClass("input-registro-vacio"); //Añadimos clase de input vacio
		$('#div_nick').html("<aside class='mt-1 mb-0 alert alert-danger' role='alert'> Añade el nick al campo de Nick del usuario. </aside>").show().delay(1000).fadeOut("fast");
		vacio = true;
	} 
	else
	{ //Si el input contiene algo
		$('#nick').addClass("input-registro-ok"); //Añadimos la clase del input relleno
		$('#div_nick').html(""); //Quitamos el div de input vacio
	}
	// - FIN - //

	// NOMBRE Y APELLIDOS //
	if(nombre_apellidos == ""){
		$('#nombre_apellidos').removeClass("input-registro-ok"); 
		$('#nombre_apellidos').addClass("input-registro-vacio");
		$('#div_nombre_apellidos').html("<aside class='mt-1 mb-0 alert alert-danger' role='alert'> Añade nombre y apellidos al campo nombre y apellidos. </aside>").show().delay(3000).fadeOut("fast");
		vacio = true;
	} 
	else
	{ 
		$('#nombre_apellidos').addClass("input-registro-ok"); 
		$('#div_nombre_apellidos').html("");
	}
	// - FIN - //

	// EMAIL //
	if(email == ""){
		$('#email').removeClass("input-registro-ok"); 
		$('#email').addClass("input-registro-vacio");
		$('#div_email').html("<aside class='mt-1 mb-0 alert alert-danger' role='alert'> Añade un correo al campo de dirección de correo electrónico. </aside>").show().delay(5000).fadeOut("fast");
		vacio = true;
	} 
	else if (!validar_email) //Email no valido
	{ 
		$('#email').removeClass("input-registro-ok"); 
		$('#email').addClass("input-registro-vacio");
		$('#div_email').html("<aside class='mt-1 mb-0 alert alert-danger' role='alert'> Ese email no es valido. </aside>").show().delay(7000).fadeOut("fast");
		vacio = true;
	} 
	else
	{
		$('#email').addClass("input-registro-ok"); 
		$('#div_email').html("");
	}
	// - FIN - //

	// CONTRASEÑA //
	if(pass == ""){
		$('#pass').removeClass("input-registro-ok"); 
		$('#pass').addClass("input-registro-vacio");
		$('#div_pass').html("<aside class='mt-1 mb-0 alert alert-danger' role='alert'> Añade la contraseña al campo contraseña. </aside>").show().delay(9000).fadeOut("fast");
		vacio = true;
	} 
	else if(!validar_pass) //contraseña no valida
	{ 
		$('#div_pass').html("<aside class='mt-1 mb-0 alert alert-danger' role='alert'> La contraseña no es valida. Debe contener al menos una letra mayuscula, un numero, un simbolo y 8 caracteres. Ejemplo: Lgtbcrevi2. </aside>").show().delay(9000).fadeOut("fast");
		vacio = true;
	}
	else
	{
		$('#pass').addClass("input-registro-ok"); 
		$('#div_pass').html("");
	}
	// - FIN - //

	// CONTRASEÑA2 //
	if(pass2 == ""){
		$('#pass2').removeClass("input-registro-ok"); 
		$('#pass2').addClass("input-registro-vacio");
		$('#div_pass2').html("<aside class='mt-1 mb-0 alert alert-danger' role='alert'> Añade la contraseña al campo repetir contraseña. </aside>").show().delay(11000).fadeOut("fast");
		vacio = true;
	} 
	else
	{ 
		$('#pass2').addClass("input-registro-ok"); 
		$('#div_pass2').html("");
	}
	// - FIN - //

	// COMPROBAMOS LAS DOS CONTRASEÑAS //
	if (pass != pass2)
	{
		$('#pass').removeClass("input-registro-ok"); 
		$('#pass2').removeClass("input-registro-ok"); 
		$('#pass').addClass("input-registro-vacio");
		$('#pass2').addClass("input-registro-vacio");
		$('#div_comprobar_pass').html("<aside class='mt-1 mb-0 alert alert-danger' role='alert'> Las contraseñas no son iguales </aside><br>").show().delay(13000).fadeOut("fast");
		vacio = true;
	} 
	else
	{
		$('#div_comprobar_pass').html("");
	}
	// - FIN - //

	
	// PROVICIA //
	if(provincia == null){
		$('#selectProvincia').removeClass("input-registro-ok"); 
		$('#selectProvincia').addClass("input-registro-vacio");
		$('#div_provincia').html("<aside class='mt-1 mb-0 alert alert-danger' role='alert'> Selecciona una provincia. </aside>").show().delay(15000).fadeOut("fast");
		vacio = true;
	} 
	else
	{ 
		$('#selectProvincia').addClass("input-registro-ok"); 
		$('#div_provincia').html("");
	}
	// - FIN - //

	// MUNICIPIOS //
	if(municipios == null){
		$('#municipios').removeClass("input-registro-ok"); 
		$('#municipios').addClass("input-registro-vacio");
		$('#div_municipio').html("<aside class='mt-1 mb-0 alert alert-danger' role='alert'> Selecciona un municipio. </aside>").show().delay(17000).fadeOut("fast");
		vacio = true;
	} 
	else
	{ 
		$('#municipios').addClass("input-registro-ok"); 
		$('#div_municipio').html("");
	}
	// - FIN - //

	// FECHA DE NACIMIENTO //
	if(fechaNaci == ""){
		$('#fechaNaci').removeClass("input-registro-ok"); 
		$('#fechaNaci').addClass("input-registro-vacio");
		$('#div_fechaNaci').html("<aside class='mt-1 mb-0 alert alert-danger' role='alert'> Selecciona tu fecha de nacimiento en el campo fecha de nacimiento. </aside>").show().delay(19000).fadeOut("fast");
		vacio = true;
	} 
	else
	{ 
		$('#fechaNaci').addClass("input-registro-ok"); 
		$('#div_fechaNaci').html("");
	}
	// - FIN - //

	var datos = {
				'nick':nick, 
				'nombre_apellidos':nombre_apellidos, 
				'email':email,
				'pass':pass,
				'pass2':pass2,
				'provincia':provincia,
				'municipios':municipios,
				'fechaNaci':fechaNaci, 
				'_token':_token 
				};

	//console.log(vacio);
	if(!vacio){
		$.ajax({
			async: true,
	        type: "POST",
	        dataType: "json",
	        contentType: "application/x-www-form-urlencoded",
	        url: "/ajax/registrarse",
	        data: datos,
	        beforeSend:function()
	        {
	        },
	        success:function(respuesta)
	        {
             	if(respuesta.ok==1)
			    {
			    	window.location.href = '/';
			    }
			    else if(respuesta.ok == 0)
			    {
			        $('#resultado').html("<br><div class='alert alert-danger' role='alert' id='resultado'> Ya existe un usuario con ese correo. </div>").show().delay(5000).fadeOut("fast");
			    }
			    else
			    {
			    	$('#resultado').html("<br><div class='alert alert-danger' role='alert' id='resultado'> Comprueba que esten completados todos los campos del formulario. </div>").show().delay(2000).fadeOut("fast");
			    }
	        },
	        error:function(error)
	        {
	        }
	    });
	}

	return false;
}

/* FUNCION PARA MOSTRAR Y OCULTAR CONTRASEÑA */
function mostrarContrasenaPass(){
	var cambio = document.getElementById("pass");
	if(cambio.type == "password")
	{
	 	cambio.type = "text";
	 	$('.icon_1').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
	}
	else
	{
		 cambio.type = "password";
		 $('.icon_1').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
	}
}

function mostrarContrasenaPass2(){
	var cambio = document.getElementById("pass2");
	if(cambio.type == "password")
	{
	 	cambio.type = "text";
	 	$('.icon_2').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
	}
	else
	{
		 cambio.type = "password";
		 $('.icon_2').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
	}
}