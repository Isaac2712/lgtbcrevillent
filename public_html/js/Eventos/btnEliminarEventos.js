function btnEliminarEvento()
{
  //Recogemos el id del evento que queremos eliminar
  var titulo_evento = jQuery("[name=select_eliminar_evento]").val();
  var si_elimanos_evento = jQuery("[name=si_elimanos_evento]").val();
  var no_eliminamos_evento = jQuery("[name=no_eliminamos_evento]").val();

  //Comprobamos si se ha seleccionado algun evento
  if(titulo_evento == "") //si el evento esta vacio
  {
    //ocultamos el div 'cuidado' añadiendo la clase 'definitivo_eliminar'
    jQuery("#definitivo_eliminar").addClass('definitivo_eliminar');
    //Visualizamos este div de seleccionar algun evento
    jQuery("#boton_eliminar").html("<br><div class='alert alert-danger mt-0 w-100' role='alert' id='boton_eliminar'> Selecciona algun evento del select. </div>").show().delay(2500).fadeOut("fast");
  }
  else
  {
    //quitamos el resto de div
    jQuery("resultado_eliminar_evento").html('');
    //si el evento no esta vacio
    //quitamos el div que dice 'selecciona algun evento...'
    jQuery("#boton_eliminar").html('');
    //Quitamos la clase a este div para poder visualizar el div 'cuidado'
    jQuery("#definitivo_eliminar").removeClass('definitivo_eliminar');
    jQuery("#evento_seleccionado").html("<span>"+titulo_evento+"</span>");
  }
  return false; //siempre
}

function btnSiEliminamosEvento(){
  //Si eliminamos evento, accedemos a base de datos y eliminamos definitivo
  var titulo_evento = jQuery("[name=select_eliminar_evento]").val();
  var _token = jQuery("[name=_token]").val();
  jQuery("#definitivo_eliminar").addClass('definitivo_eliminar');

  var datos = {'_token':_token, 'titulo_evento':titulo_evento}

  $.ajax({
      async: true,
      type: "POST",
      dataType: "json",
      contentType: "application/x-www-form-urlencoded",
      url: "/ajax/eliminarEvento",
      data: datos,
      success: function(respuesta) {
        //console.log(respuesta);
        if(respuesta.ok == 1)
        {
          $('#resultado_eliminar_evento').html("<br><div class='alert alert-success mt-0 w-100' role='alert' id='resultado_eliminar_evento'> ¡Has eliminado el evento! </div>").show().delay(5000).fadeOut("fast");
          setTimeout("location.reload()", 1000);
        }
        else
        {
          $('#resultado_eliminar_evento').html("<br><div class='alert alert-danger mt-0 w-100' role='alert' id='resultado_eliminar_evento'> No se ha podido eliminar el evento, intentalo de nuevo. </div>").show().delay(5000).fadeOut("fast");
        }
      },
      error: function() {
        $('#resultado_eliminar_evento').html("<br><div class='alert alert-danger mt-0 w-100' role='alert' id='resultado_eliminar_evento' > Internal Server Error </div>").show().delay(5000).fadeOut("fast");
      }
  });
}

function btnNoEliminamosEvento(){
  jQuery("#definitivo_eliminar").addClass('definitivo_eliminar');
  $('#resultado_eliminar_evento').html("<br><div class='alert alert-secondary mt-0 w-100' role='alert' id='resultado_eliminar_evento'> Has decidido no eliminar el evento. </div>").show().delay(3000).fadeOut("fast");
}
