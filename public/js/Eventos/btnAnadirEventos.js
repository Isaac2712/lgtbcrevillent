function btnAnadirEvento()
{
  var titulo_evento=jQuery("[name=titulo_evento]").val();
  var localidad_evento=jQuery("[name=localidad_evento]").val();
  var texto_evento=jQuery("[name=texto_evento]").val();
  var lugar_evento=jQuery("[name=lugar_evento]").val();
  var direccion_evento=jQuery("[name=direccion_evento]").val();
  var telefono_evento=jQuery("[name=telefono_evento]").val();
  var horario_evento=jQuery("[name=horario_evento]").val();
  var fecha_evento=jQuery("[name=fecha_evento]").val();
  var imagen_evento=jQuery("[name=imagen_evento]").val();
  var select_tipo_evento=jQuery("[name=select_tipo_evento]").val();
  console.log(select_tipo_evento);
  var _token = jQuery("[name=_token]").val();
  var vacio = false;

  /* TITULO DEL EVENTO */

  if(titulo_evento == '')
  {
    $('#titulo_evento').removeClass("input-registro-ok"); //Quitamos la clase del input relleno
    $('#titulo_evento').addClass("input-registro-vacio"); //Añadimos clase de input vacio
    vacio = true;
  }
  else
  {
    $('#titulo_evento').addClass("input-registro-ok"); //Añadimos la clase del input relleno
  }

  /* FIN TITULO DEL EVENTO */

  /* LOCALIDAD DEL EVENTO */
  
  if(localidad_evento == '')
  {
    $('#localidad_evento').removeClass("input-registro-ok"); //Quitamos la clase del input relleno
    $('#localidad_evento').addClass("input-registro-vacio"); //Añadimos clase de input vacio
    vacio = true;
  }
  else
  {
    $('#localidad_evento').addClass("input-registro-ok"); //Añadimos la clase del input relleno
  }

  /* FIN LOCALIDAD DEL EVENTO */

  /* TEXTO DEL EVENTO */
  
  if(texto_evento == '')
  {
    $('#texto_evento').removeClass("input-registro-ok"); //Quitamos la clase del input relleno
    $('#texto_evento').addClass("input-registro-vacio"); //Añadimos clase de input vacio
    vacio = true;
  }
  else
  {
    $('#texto_evento').addClass("input-registro-ok"); //Añadimos la clase del input relleno
  }

  /* FIN TEXTO DEL EVENTO */

  /* lUGAR DEL EVENTO */
  
  if(lugar_evento == '')
  {
    $('#lugar_evento').removeClass("input-registro-ok"); //Quitamos la clase del input relleno
    $('#lugar_evento').addClass("input-registro-vacio"); //Añadimos clase de input vacio
    vacio = true;
  }
  else
  {
    $('#lugar_evento').addClass("input-registro-ok"); //Añadimos la clase del input relleno
  }

  /* FIN LUGAR DEL EVENTO */

  /* DIRECCION DEL EVENTO */
  
  if(direccion_evento == '')
  {
    $('#direccion_evento').removeClass("input-registro-ok"); //Quitamos la clase del input relleno
    $('#direccion_evento').addClass("input-registro-vacio"); //Añadimos clase de input vacio
    vacio = true;
  }
  else
  {
    $('#direccion_evento').addClass("input-registro-ok"); //Añadimos la clase del input relleno
  }

  /* FIN DIRECCION DEL EVENTO */

  /* TELEFONO DEL EVENTO */
  
  if(telefono_evento == '')
  {
    $('#telefono_evento').removeClass("input-registro-ok"); //Quitamos la clase del input relleno
    $('#telefono_evento').addClass("input-registro-vacio"); //Añadimos clase de input vacio
    vacio = true;
  }
  else
  {
    $('#telefono_evento').addClass("input-registro-ok"); //Añadimos la clase del input relleno
  }

  /* FIN TELEFONO DEL EVENTO */

  /* HORARIO DEL EVENTO */
  
  if(horario_evento == '')
  {
    $('#horario_evento').removeClass("input-registro-ok"); //Quitamos la clase del input relleno
    $('#horario_evento').addClass("input-registro-vacio"); //Añadimos clase de input vacio
    vacio = true;
  }
  else
  {
    $('#horario_evento').addClass("input-registro-ok"); //Añadimos la clase del input relleno
  }

  /* FIN HORARIO DEL EVENTO */

  /* FECHA DEL EVENTO */
  
  if(fecha_evento == '')
  {
    $('#fecha_evento').removeClass("input-registro-ok"); //Quitamos la clase del input relleno
    $('#fecha_evento').addClass("input-registro-vacio"); //Añadimos clase de input vacio
    vacio = true;
  }
  else
  {
    $('#fecha_evento').addClass("input-registro-ok"); //Añadimos la clase del input relleno
  }

  /* FIN FECHA DEL EVENTO */

  /* IMAGEN DEL EVENTO */
  
  if(imagen_evento == '')
  {

    $('#imagen_evento').removeClass("input-registro-ok"); //Quitamos la clase del input relleno
    $('#imagen_evento').addClass("input-registro-vacio"); //Añadimos clase de input vacio
    vacio = true;

  }
  else
  {
    $('#imagen_evento').addClass("input-registro-ok"); //Añadimos la clase del input relleno
  }

  /* FIN IMAGEN DEL EVENTO */

  /* TIPO DE EVENTO */

  if(select_tipo_evento == '')
  {
    $('#select_tipo_evento').removeClass("input-registro-ok"); //Quitamos la clase del input relleno (quitamos color verde)
    $('#select_tipo_evento').addClass("input-registro-vacio"); //Añadimos clase de input vacio (añadimos color rojo)
    vacio = true;
  }
  else
  {
    $('#select_tipo_evento').addClass("input-registro-ok"); //Añadimos la clase del input relleno (añadimos color verde)
  }

  /* FIN TIPO DE EVENTO */

  var formData = new FormData();
  formData.append('_token', _token);
  formData.append('titulo_evento', titulo_evento);
  formData.append('localidad_evento', localidad_evento);
  formData.append('texto_evento', texto_evento);
  formData.append('lugar_evento', lugar_evento);
  formData.append('telefono_evento', telefono_evento);
  formData.append('horario_evento', horario_evento);
  formData.append('fecha_evento', fecha_evento);
  formData.append('direccion_evento', direccion_evento);
  formData.append('select_tipo_evento', select_tipo_evento);
  var file = jQuery('.custom-file-input');
  formData.append("file", file[0].files[0]);

  //console.log(formData);
  if(vacio == false)
  {
    $.ajax({
        type: "POST",
        url: "/ajax/anadirEvento",
        data: formData,
        processData: false,
        contentType: false,
        success: function(respuesta) {
          //console.log(respuesta);
          if(respuesta.ok == 1)
          {
            //$('#resultado_anadir_evento').html("<br><div class='alert alert-success mt-0 w-100 float-right' role='alert' id='resultado_anadir_evento'> ¡Has añadido el evento! </div>").show().delay(5000).fadeOut("fast");
            window.location.href = '/administrador/añadir_evento';
          }
          else if(respuesta.ok == 2)
          {
            $('#titulo_evento').removeClass("input-registro-ok");
            $('#titulo_evento').addClass("input-registro-vacio");
            $('#resultado_anadir_evento').html("<br><div class='alert alert-danger mt-0 w-100 float-right' role='alert' id='resultado_anadir_evento'> No se ha podido añadir el evento, ese titulo ya existe. </div>").show().delay(5000).fadeOut("fast");
          }
          else
          {
            $('#resultado_anadir_evento').html("<br><div class='alert alert-danger mt-0 w-100 float-right' role='alert' id='resultado_anadir_evento'> No se ha podido añadir el evento, comprueba que no hayan campos vacios. </div>").show().delay(5000).fadeOut("fast");
          }
        },
        error: function() {
          $('#resultado_anadir_evento').html("<br><div class='alert alert-danger mt-0 w-100 float-right' role='alert' id='resultado_anadir_evento' > Internal Server Error </div>").show().delay(5000).fadeOut("fast");
        }
    });
  }

  return false; //siempre
}
