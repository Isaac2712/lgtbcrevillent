function GetCookie(name) {
    var arg =name+"=";
    var alen=arg.length;
    var clen=document.cookie.length;
    var i=0;
    while (i<clen) {
        var j=i+alen;

        if (document.cookie.substring(i,j)==arg)
            return "1";
            i=document.cookie.indexOf(" ",i)+1;
        if (i==0)
            break;
    }

    return null;
}
        
function aceptar_cookies(){
    var expira=new Date();
    expira=new Date(expira.getTime()+7776000000);
    document.cookie="cookies=aceptada; expires="+expira;

    var visit=GetCookie("cookies");
    if (visit==1){
        popbox();
    }
}

$(function() {
    var visita=GetCookie("cookies");
    if (visita==1){ 
	    popbox(); 
    } else { 
	    var expira=new Date(); 
	    expira=new Date(expira.getTime()+7776000000);  
	    document.cookie="cookies=aceptada; expires="+expira; 
	}

});
        
function popbox() {
    $('#section_cookies').css({
        'display': 'none',
        'opacity': '0'
    });
    document.getElementById("span_cookies").innerHTML = '';
}