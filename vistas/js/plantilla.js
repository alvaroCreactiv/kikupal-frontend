/*=============================================
PLANTILLA
=============================================*/
var rutaOculta = $("#rutaOculta").val();

$.ajax({

	url:"ajax/plantilla.ajax.php",
	success:function(respuesta){

		var colorFondo = JSON.parse(respuesta).colorFondo;
		var colorTexto = JSON.parse(respuesta).colorTexto;
		var barraSuperior = JSON.parse(respuesta).barraSuperior;
		var textoSuperior = JSON.parse(respuesta).textoSuperior;
		
		$(".footer, .footer a").css({"background": colorFondo,
			"color": colorTexto})

		$(".base, .base a").css({"background": barraSuperior, 
			"color": textoSuperior})

	}


})