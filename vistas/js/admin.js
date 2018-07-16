$(document).ready(function() { actualizarDatos(); });

var rutaOculta = $("#rutaOculta").val();

function registroServicesYard(){
	var fecha=$("#fecha").val();
	if (fecha=="") {
		$("#fecha").parent().before('<div class="alert alert-warning"><strong>ATTENTION:</strong>This field is required</div>');
		return false;
	}
}

$("#fecha").focus(function(){

	$(".alert").remove();
})

window.onload = function () {
	
	var elementosDelForm = document.getElementsByTagName('select');
	for(var i=0; i<elementosDelForm.length;i++) {		
		elementosDelForm[i].addEventListener("change", actualizarDatos);				
	}
}

$("#other").change(function(){

	$(".alert").remove();
})

function actualizarDatos() {
	var base=40;
	var str = "";
	$("#area option:selected" ).each(function() {
		str = parseFloat($( this ).val()) ;			
		$("#area1").val($(this).text());

	});
	var str1 = "";
	$("#size option:selected" ).each(function() {
		str1 = parseFloat($( this ).val()) ;
		$("#size1").val($(this).text());

	});
	var str2 = "";
	$("#grass option:selected" ).each(function() {
		str2 = parseFloat($( this ).val()) ;	
		$("#grass1").val($(this).text());

	});

	var str3 = "";
	$("#other option:selected" ).each(function() {
		str3 = ($( this ).val());		
		if (str3=="yes") {
			$("#other").parent().after('<div class="alert alert-warning"><strong>Attention:</strong> A KIKUPAL&#39s staff member will contact you regarding this service.</div>');			
		}
	});

	var cost=base+str+str1+str2;
	$("#estimated").val(cost);
	
}