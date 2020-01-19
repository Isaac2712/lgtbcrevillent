function mostrarContrasena(){
	 var cambio = document.getElementById("password");
	 if(cambio.type == "password")
	 {
	 	cambio.type = "text";
	 	$('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
	 }
	 else
	 {
		 cambio.type = "password";
		 $('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
	 }

	return false;
}

$('#div_provincia_2').css('display', 'none'); 
//Ocultamos div_provincia_2 hasta llegar a la funcion mostrarSelectProvincia()

$('#div_municipios_2').css('display', 'none'); 
//Ocultamos div_municipios_2 hasta que la funcion mostrarSelectProvincia() se active

/*Con esta funcion lo que queremos es mostrar el select de provincias y el de municipios.
Cuando pulsemos click en el input de texto con la provincia, 
nos aparecera el select de provincia y el select de municipios*/
function mostrarSelectProvinciaMunicipio()
{
	/* PROVINCIAS */
	//Ocultamos div_provincia que es donde esta el input de texto con la provincia
    $('#div_provincia').css('display', 'none');
    //Mostramos div_provincia_2 que es el select con todas las provincias
    $('#div_provincia_2').css('display', 'block');

    /* MUNICIPIOS */
    //Ocultamos el div_municipio que es donde esta el input de texto con el municipio
    $('#div_municipio').css('display', 'none');
    //Mostramos el select de municpios
    $('#div_municipios_2').css('display', 'block');

	return false;
}

