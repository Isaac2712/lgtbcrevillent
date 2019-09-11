function btnEliminarNoticia()
{
  //Recogemos el id del noticia que queremos eliminar
  var id_noticia = jQuery("[name=select_eliminar_noticia]").val();
  var si_elimanos_noticia = jQuery("[name=si_elimanos_noticia]").val();
  var no_eliminamos_noticia = jQuery("[name=no_eliminamos_noticia]").val();

  console.log(id_noticia);

  //Comprobamos si se ha seleccionado algun noticia
  if(id_noticia == "") //si la noticia esta vacio
  {
    //ocultamos el div 'cuidado' añadiendo la clase 'definitivo_eliminar'
    jQuery("#definitivo_eliminar").addClass('definitivo_eliminar');
    //Visualizamos este div de seleccionar algun noticia
    jQuery("#boton_eliminar").html("<br><div class='alert alert-danger mt-0 w-100' role='alert' id='boton_eliminar'> Selecciona algun noticia del select. </div>").show().delay(2500).fadeOut("fast");
  }
  else
  {
    //quitamos el resto de div
    jQuery("resultado_eliminar_noticia").html('');
    //si la noticia no esta vacio
    //quitamos el div que dice 'selecciona algun noticia...'
    jQuery("#boton_eliminar").html('');
    //Quitamos la clase a este div para poder visualizar el div 'cuidado'
    jQuery("#definitivo_eliminar").removeClass('definitivo_eliminar');
    jQuery("#noticia_seleccionado").html("<span> El id de la noticia es "+id_noticia+"</span>");
  }
  return false; //siempre
}

function btnSiEliminamosNoticia(){
  //Si eliminamos noticia, accedemos a base de datos y eliminamos definitivo
  var id_noticia = jQuery("[name=select_eliminar_noticia]").val();
  var _token = jQuery("[name=_token]").val();
  jQuery("#definitivo_eliminar").addClass('definitivo_eliminar');

  var datos = {'_token':_token, 'id_noticia':id_noticia}

  $.ajax({
      async: true,
      type: "POST",
      dataType: "json",
      contentType: "application/x-www-form-urlencoded",
      url: "/ajax/eliminarNoticia",
      data: datos,
      success: function(respuesta) {
        //console.log(respuesta);
        if(respuesta.ok == 1)
        {
          $('#resultado_eliminar_noticia').html("<br><div class='alert alert-success mt-0 w-100' role='alert' id='resultado_eliminar_noticia'> ¡Has eliminado la noticia! </div>").show().delay(5000).fadeOut("fast");
          setTimeout("location.reload()", 5000);
        }
        else
        {
          $('#resultado_eliminar_noticia').html("<br><div class='alert alert-danger mt-0 w-100' role='alert' id='resultado_eliminar_noticia'> No se ha podido eliminar la noticia, intentalo de nuevo. </div>").show().delay(5000).fadeOut("fast");
        }
      },
      error: function() {
        $('#resultado_eliminar_noticia').html("<br><div class='alert alert-danger mt-0 w-100' role='alert' id='resultado_eliminar_noticia' > Internal Server Error </div>").show().delay(5000).fadeOut("fast");
      }
  });
}

function btnNoEliminamosNoticia(){
  jQuery("#definitivo_eliminar").addClass('definitivo_eliminar');
  $('#resultado_eliminar_noticia').html("<br><div class='alert alert-secondary mt-0 w-100' role='alert' id='resultado_eliminar_noticia'> Has decidido no eliminar la noticia. </div>").show().delay(3000).fadeOut("fast");
}
