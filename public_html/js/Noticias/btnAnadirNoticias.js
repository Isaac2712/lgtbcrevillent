function btnAnadirNoticia()
{
  //console.log("noticia llega");
  var titulo_noticia=jQuery("[name=titulo_noticia]").val();
  var enlace_noticia=jQuery("[name=enlace_noticia]").val();
  var imagen_noticia=jQuery("[name=imagen_noticia]").val();
  var fecha_noticia=jQuery("[name=fecha_noticia]").val();
  var _token = jQuery("[name=_token]").val();
  var vacio = false;

  /* TITULO DEL noticia */

  if(titulo_noticia == '')
  {
    $('#titulo_noticia').removeClass("input-registro-ok"); //Quitamos la clase del input relleno
    $('#titulo_noticia').addClass("input-registro-vacio"); //Añadimos clase de input vacio
    vacio = true;
  }
  else
  {
    $('#titulo_noticia').addClass("input-registro-ok"); //Añadimos la clase del input relleno
  }

  /* FIN TITULO DEL noticia */

  /* ENLACE DEL noticia */
  
  if(enlace_noticia == '')
  {
    $('#enlace_noticia').removeClass("input-registro-ok"); //Quitamos la clase del input relleno
    $('#enlace_noticia').addClass("input-registro-vacio"); //Añadimos clase de input vacio
    vacio = true;
  }
  else
  {
    $('#enlace_noticia').addClass("input-registro-ok"); //Añadimos la clase del input relleno
  }

  /* FIN ENLACE DEL noticia */

  /* IMAGEN DEL noticia */
  
  if(imagen_noticia == '')
  {
    $('#imagen_noticia').removeClass("input-registro-ok"); //Quitamos la clase del input relleno
    $('#imagen_noticia').addClass("input-registro-vacio"); //Añadimos clase de input vacio
    vacio = true;
  }
  else
  {
    $('#imagen_noticia').addClass("input-registro-ok"); //Añadimos la clase del input relleno
  }

  /* FIN IMAGEN DEL noticia */

  var formData = new FormData();
  formData.append('_token', _token);
  formData.append('titulo_noticia', titulo_noticia);
  formData.append('enlace_noticia', enlace_noticia);
  formData.append('fecha_noticia', fecha_noticia);
  var file = jQuery('.custom-file-input');
  formData.append("file", file[0].files[0]);

  //console.log(formData);
  if(vacio == false)
  {
    $.ajax({
        type: "POST",
        url: "/ajax/anadirNoticia",
        data: formData,
        processData: false,
        contentType: false,
        success: function(respuesta) {
          //console.log(respuesta);
          if(respuesta.ok == 1)
          {
            //$('#resultado_anadir_noticia').html("<br><div class='alert alert-success mt-0 w-100 float-right' role='alert' id='resultado_anadir_noticia'> ¡Has añadido el noticia! </div>").show().delay(5000).fadeOut("fast");
            window.location.href = '/administrador/añadir_noticia';
          }
          else if(respuesta.ok == 2)
          {
            $('#titulo_noticia').removeClass("input-registro-ok");
            $('#titulo_noticia').addClass("input-registro-vacio");
            $('#resultado_anadir_noticia').html("<br><div class='alert alert-danger mt-0 w-100 float-right' role='alert' id='resultado_anadir_evento'> No se ha podido añadir la noticia, ese titulo ya existe. </div>").show().delay(5000).fadeOut("fast");
          }
          else
          {
            $('#resultado_anadir_noticia').html("<br><div class='alert alert-danger mt-0 w-100 float-right' role='alert' id='resultado_anadir_evento'> No se ha podido añadir la noticia, comprueba que no hayan campos vacios. </div>").show().delay(5000).fadeOut("fast");
          }
        },
        error: function() {
          $('#resultado_anadir_noticia').html("<br><div class='alert alert-danger mt-0 w-100 float-right' role='alert' id='resultado_anadir_noticia' > Internal Server Error </div>").show().delay(5000).fadeOut("fast");
        }
    });
  }

  return false; //siempre
}
