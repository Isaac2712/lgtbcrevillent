//Header en lila
$('#header-footer').addClass('header-footer');

function RedesSocialesFooterHover()
{ 
	$('#header-footer').removeClass("header-footer"); //quitamos clase header lila
	$('#header-footer').addClass("header-footer-2"); //añadimos clase header amarillo claro
	return false;
}

function RedesSocialesFooterSinHover()
{ 
	$('#header-footer').removeClass("header-footer-2"); //quitamos clase header amarillo claro
	$('#header-footer').addClass("header-footer"); //quitamos clase header lila
	return false;
}