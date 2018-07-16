var rutaOculta = $("#rutaOculta").val();

$(document).ready(function(){

	if(localStorage.getItem("contributor") != null){		
		var contributor= JSON.parse(localStorage.getItem("contributor"));
		console.log(contributor);
		$("#cName").val(contributor[0].firstName);
		$("#lName").val(contributor[0].lastName);
		$("#yEmail").val(contributor[0].yourEmail);
		$("#pNumber").val(contributor[0].phoneNumber);
		$(".contributor").hide();
	}

	$("#other").focus(function(){
		document.getElementById("ship").checked = false;
		document.getElementById("ship1").checked = false;
		document.getElementById("ship2").checked = false;
	})

	$("#other").change(function(){
		$("#kiku").val(document.getElementById('other').value);
	})
});

window.onload = function () {
	var ship30="";
	var elementosDelForm = document.getElementsByTagName('input');
	for(var i=0; i<elementosDelForm.length;i++) {
		if (elementosDelForm[i].type == 'radio') {
			elementosDelForm[i].addEventListener("click", actualizarDatos);

		}else {
			elementosDelForm[i].addEventListener("change", actualizarDatos);				
		}
	}
}

function actualizarDatos() {
	var ship30 = document.getElementsByName('ship30');
	var radioButSelValue = '';
	for (var i=0; i<ship30.length; i++) {
		if (ship30[i].checked == true) { 
			radioButSelValue = ship30[i].value;
		} 
	}
	if (radioButSelValue != ''){
		$("#other").val("");
		if (radioButSelValue =='30') {
			$("#kiku").val(30);			
		}else if (radioButSelValue =='60') {
			$("#kiku").val(60);	
		}else if (radioButSelValue =='100') {
			$("#kiku").val(100);	
		}		
	}
}

/*=============================================
FORMATEAR LOS IPUNT
=============================================*/

$("input").focus(function(){

	$(".alert").remove();
})


$("input").focus(function(){
	$(this).css("background-color", "#cccccc");
});
$("textarea").focus(function(){
	$(this).css("background-color", "#cccccc");
});
$("input").blur(function(){
	$(this).css("background-color","#fff");
})
$("textarea").blur(function(){
	$(this).css("background-color","#fff");
})

/*=============================================
=        Validar el registro de Contributor     =
=============================================*/
function registroContributor(){


	/*=============================================
	=       validar first name       =
	=============================================*/
	var cName=$("#cName").val();

	if (cName!="") {
		var expresion=/^[a-zA-Z ]*$/;
		if (!expresion.test(cName)) {
			$("#cName").parent().before('<div class="alert alert-warning"><strong>ERROR:</strong>No numbers or special characters</div>');
			return false;
		}
	}else{
		$("#cName").parent().before('<div class="alert alert-warning"><strong>ATTENTION:</strong>This field is required</div>');
		return false;
	}

	/*=============================================
	=       validar Last name       =
	=============================================*/
	var lName=$("#lName").val();

	if (lName!="") {
		var expresion=/^[a-zA-Z ]*$/;
		if (!expresion.test(lName)) {
			$("#lName").parent().before('<div class="alert alert-warning"><strong>ERROR:</strong> No numbers or special characters</div>');
			return false;
		}
	}else{
		$("#lName").parent().before('<div class="alert alert-warning"><strong>ATTENTION:</strong> This field is required</div>');
		return false;
	}


	/*=============================================
	=       validar email       =
	=============================================*/
	var yEmail = $("#yEmail").val();
	if(yEmail != ""){
		var expresion = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
		if(!expresion.test(yEmail)){
			$("#yEmail").parent().before('<div class="alert alert-warning"><strong>ERROR:</strong> Invalid email. Please correct.</div>')
			return false;
		}
		
	}else{
		$("#yEmail").parent().before('<div class="alert alert-warning"><strong>ATENCIÓN:</strong> Este campo es obligatorio</div>')
		return false;
	}
	/*=============================================
	=       validar  phone number      =
	=============================================*/
	var pNumber=$("#pNumber").val();

	if (pNumber!="") {
		var expresion=/^[0-9+ ]*$/;
		if (!expresion.test(pNumber)) {
			$("#pNumber").parent().before('<div class="alert alert-warning"><strong>ERROR:</strong> No Letters or special characters</div>');
			return false;
		}
	}

	var other=$("#other").val();

	if (other!="") {
		var expresion=/^[0-9+]*$/;
		if (!expresion.test(other)) {
			$("#other").parent().before('<div class="alert alert-warning"><strong>ERROR:</strong> No Letters or special characters</div>');
			return false;
		}
	}
	

	/*=============================================
	=       validar politicas de privacidad       =
	=============================================*/
	var politicas =$("#policy:checked").val();
	if (politicas!="on") {
		$("#policy").parent().before('<div class="alert alert-warning"><strong>ATTENTION:</strong> Please accept the terms and conditions before proceding  </div>')
		return false;
	}
	
	/*=====  End of politicas de privacidad   ======*/
	
	return true;
}


/*=====  End of validar Contributor  ======*/
