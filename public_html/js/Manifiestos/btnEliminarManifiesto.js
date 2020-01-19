function btnEliminarManifiesto()
{
  //Recogemos el id del manifiesto que queremos eliminar
  var id_manifiesto = jQuery("[name=select_eliminar_manifiesto]").val();
  var si_elimanos_manifiesto = jQuery("[name=si_elimanos_manifiesto]").val();
  var no_eliminamos_manifiesto = jQuery("[name=no_eliminamos_manifiesto]").val();

  console.log(id_manifiesto);

  //Comprobamos si se ha seleccionado algun manifiesto
  if(id_manifiesto == "") //si el manifiesto esta vacio
  {
    //ocultamos el div 'cuidado' añadiendo la clase 'definitivo_eliminar'
    jQuery("#definitivo_eliminar").addClass('definitivo_eliminar');
    //Visualizamos este div de seleccionar algun manifiesto
    jQuery("#boton_eliminar").html("<br><div class='alert alert-danger mt-0 w-100' role='alert' id='boton_eliminar'> Selecciona algun manifiesto del select. </div>").show().delay(2500).fadeOut("fast");
  }
  else
  {
    //quitamos el resto de div
    jQuery("resultado_eliminar_manifiesto").html('');
    //si el manifiesto no esta vacio
    //quitamos el div que dice 'selecciona algun manifiesto...'
    jQuery("#boton_eliminar").html('');
    //Quitamos la clase a este div para poder visualizar el div 'cuidado'
    jQuery("#definitivo_eliminar").removeClass('definitivo_eliminar');
    jQuery("#manifiesto_seleccionado").html("<span> El id del manifiesto es "+id_manifiesto+"</span>");
  }
  return false; //siempre
}

function btnSiEliminamosManifiesto(){
  //Si eliminamos manifiesto, accedemos a base de datos y eliminamos definitivo
  var id_manifiesto = jQuery("[name=select_eliminar_manifiesto]").val();
  var _token = jQuery("[name=_token]").val();
  jQuery("#definitivo_eliminar").addClass('definitivo_eliminar');

  var datos = {'_token':_token, 'id_manifiesto':id_manifiesto}

  $.ajax({
      async: true,
      type: "POST",
      dataType: "json",
      contentType: "application/x-www-form-urlencoded",
      url: "/ajax/eliminarManifiesto",
      data: datos,
      success: function(respuesta) {
        //console.log(respuesta);
        if(respuesta.ok == 1)
        {
          $('#resultado_eliminar_manifiesto').html("<br><div class='alert alert-success mt-0 w-100' role='alert' id='resultado_eliminar_manifiesto'> ¡Has eliminado el manifiesto! </div>").show().delay(5000).fadeOut("fast");
          setTimeout("location.reload()", 5000);
        }
        else
        {
          $('#resultado_eliminar_manifiesto').html("<br><div class='alert alert-danger mt-0 w-100' role='alert' id='resultado_eliminar_manifiesto'> No se ha podido eliminar el manifiesto, intentalo de nuevo. </div>").show().delay(5000).fadeOut("fast");
        }
      },
      error: function() {
        $('#resultado_eliminar_manifiesto').html("<br><div class='alert alert-danger mt-0 w-100' role='alert' id='resultado_eliminar_manifiesto' > Internal Server Error </div>").show().delay(5000).fadeOut("fast");
      }
  });
}

function btnNoEliminamosManifiesto(){
  jQuery("#definitivo_eliminar").addClass('definitivo_eliminar');
  $('#resultado_eliminar_manifiesto').html("<br><div class='alert alert-secondary mt-0 w-100' role='alert' id='resultado_eliminar_manifiesto'> Has decidido no eliminar el manifiesto. </div>").show().delay(3000).fadeOut("fast");
}
