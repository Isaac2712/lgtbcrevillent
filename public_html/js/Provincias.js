function Provincia()
{
    provincia = jQuery("[name=provincia]").val();
    var _token = jQuery("[name=_token]").val();
    var datos = { 'provincia': provincia,  '_token':_token };

    $.ajax({
        async: true,
        type: "POST",
        dataType: "json",
        contentType: "application/x-www-form-urlencoded",
        url: "/ajax/provincia",
        data: datos,
        beforeSend:function()
        {
        },
        success:function(respuesta)
        {
            //console.log(respuesta);
            $('municipios').html("<select class='form-control'>");
            for (var i = 0; i < respuesta.length; i++) {
                $('#municipios').append("<option value="+respuesta[i]['id']+">" + respuesta[i]['municipio'] + "</option>");
            }
            $('municipios').html("</select>");
        },
        error:function(error)
        {
        }
    });

    return false;
}