function btnAcceder()
{
  var nick=jQuery("[name=nick]").val();
  var pass=jQuery("[name=password]").val();
  var _token = jQuery("[name=_token]").val();
  var vacio = false;

  var datos = {'nick':nick, 'pass':pass, '_token':_token };

  //console.log(datos);

  if(nick == '')
  {
    $('#div_nick_vacio').html("<br><div class='alert alert-danger' role='alert' id='div_nick_vacio'> El nick no puede estar vacio </div>").show().delay(2000).fadeOut("fast");
    vacio = true;
  }
  else
  {
     $('#div_nick_vacio').html("");
  }

  if(pass == '')
  {
    $('#div_pass_vacio').html("<br><div class='alert alert-danger' role='alert' id='div_pass_vacio'> La contraseña no puede estar vacia </div>").show().delay(2000).fadeOut("fast");
    vacio = true;
  }
  else
  {
    $('#div_pass_vacio').html("");
  }

  if(!vacio)
  {
    $.ajax({
      async: true,
      type: "POST",
      dataType: "json",
      contentType: "application/x-www-form-urlencoded",
      url: "/ajax/acceder",
      data: datos,
      beforeSend:function()
      {
      },
      success:function(respuesta)
      {
        //console.log(respuesta);
        if(respuesta.ok==1)
        {
          window.location.href = '/';
        }
        else if(respuesta.ok==2)
        {
          $('#resultado').html("<br><div class='alert alert-danger' role='alert' id='resultado'> Ese usuario no existe </div>").show().delay(2000).fadeOut("fast");
        }
        else
        {
          $('#resultado').html("<br><div class='alert alert-danger' role='alert' id='resultado'> La contraseña no es correcta. </div>").show().delay(2000).fadeOut("fast");
        }
      },
      timeout:2000,
      error:function(error)
      {
        $('#resultado').html("<br><div class='alert alert-danger' role='alert' id='resultado' > Internal Server Error </div>").show().delay(2000).fadeOut("fast");
      }
    });
  }

  return false; //siempre
}
