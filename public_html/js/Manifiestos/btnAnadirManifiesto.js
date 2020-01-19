function btnAnadirManifiesto()
{
  var titulo_manifiesto=jQuery("[name=titulo_manifiesto]").val();
  var fecha_manifiesto=jQuery("[name=fecha_manifiesto]").val();
  var texto_manifiesto=jQuery("[name=texto_manifiesto]").val();
  var pdf_manifiesto=jQuery("[name=pdf_manifiesto]").val();
  
  var _token = jQuery("[name=_token]").val();
  var vacio = false;

  /* TITULO DEL manifiesto */

  if(titulo_manifiesto == '')
  {
    $('#titulo_manifiesto').removeClass("input-registro-ok"); //Quitamos la clase del input relleno
    $('#titulo_manifiesto').addClass("input-registro-vacio"); //Añadimos clase de input vacio
    vacio = true;
  }
  else
  {
    $('#titulo_manifiesto').addClass("input-registro-ok"); //Añadimos la clase del input relleno
  }

  /* FIN TITULO DEL manifiesto */

  /* ENLACE DEL manifiesto */
  
  if(texto_manifiesto == '')
  {
    $('#texto_manifiesto').removeClass("input-registro-ok"); //Quitamos la clase del input relleno
    $('#texto_manifiesto').addClass("input-registro-vacio"); //Añadimos clase de input vacio
    vacio = true;
  }
  else
  {
    $('#texto_manifiesto').addClass("input-registro-ok"); //Añadimos la clase del input relleno
  }

  /* FIN ENLACE DEL manifiesto */

  /* IMAGEN DEL manifiesto */
  
  if(pdf_manifiesto == '')
  {
    $('#pdf_manifiesto').removeClass("input-registro-ok"); //Quitamos la clase del input relleno
    $('#pdf_manifiesto').addClass("input-registro-vacio"); //Añadimos clase de input vacio
    vacio = true;
  }
  else
  {
    $('#pdf_manifiesto').addClass("input-registro-ok"); //Añadimos la clase del input relleno
  }

  /* FIN IMAGEN DEL manifiesto */

  var formData = new FormData();
  formData.append('_token', _token);
  formData.append('titulo_manifiesto', titulo_manifiesto);
  formData.append('fecha_manifiesto', fecha_manifiesto);
  formData.append('texto_manifiesto', texto_manifiesto);
  var file = jQuery('.custom-file-input');
  formData.append("file", file[0].files[0]);

  //console.log(formData);
  if(vacio == false)
  {
    $.ajax({
        type: "POST",
        url: "/ajax/anadirManifiesto",
        data: formData,
        processData: false,
        contentType: false,
        success: function(respuesta) {
          //console.log(respuesta);
          if(respuesta.ok == 1)
          {
            //$('#resultado_anadir_manifiesto').html("<br><div class='alert alert-success mt-0 w-100 float-right' role='alert' id='resultado_anadir_manifiesto'> ¡Has añadido el manifiesto! </div>").show().delay(5000).fadeOut("fast");
            window.location.href = '/administrador/añadir_manifiesto';
          }
          else if(respuesta.ok == 2)
          {
            $('#titulo_manifiesto').removeClass("input-registro-ok");
            $('#titulo_manifiesto').addClass("input-registro-vacio");
            $('#resultado_anadir_manifiesto').html("<br><div class='alert alert-danger mt-0 w-100 float-right' role='alert' id='resultado_anadir_evento'> No se ha podido añadir la manifiesto, ese titulo ya existe. </div>").show().delay(5000).fadeOut("fast");
          }
          else
          {
            $('#resultado_anadir_manifiesto').html("<br><div class='alert alert-danger mt-0 w-100 float-right' role='alert' id='resultado_anadir_evento'> No se ha podido añadir la manifiesto, comprueba que no hayan campos vacios. </div>").show().delay(5000).fadeOut("fast");
          }
        },
        error: function() {
          $('#resultado_anadir_manifiesto').html("<br><div class='alert alert-danger mt-0 w-100 float-right' role='alert' id='resultado_anadir_manifiesto' > Internal Server Error </div>").show().delay(5000).fadeOut("fast");
        }
    });
  }

  return false; //siempre
}
