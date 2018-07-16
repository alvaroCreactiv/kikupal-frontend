var rutaOculta = $("#rutaOculta").val();

/*=============================================
VALIDAR EMAIL REPETIDO
=============================================*/

var validarEmailRepetido = false;

$("#seremail").change(function(){

	var email = $("#seremail").val();

	var datos = new FormData();
	
	datos.append("validarEmail", email);

	
	$.ajax({
		url:rutaOculta+"ajax/provider.ajax.php",
		method: "POST",
		data: datos,	
		cache: false,
		contentType: false,
		processData: false,	
		success:function(respuesta){	
			console.log(respuesta);
			if(respuesta == "false"){
				$(".alert").remove();
				validarEmailRepetido = false;				
			}else{
				
				$("#seremail").parent().before('<div class="alert alert-warning"><strong>ERROR:</strong> The email already exists in the database, please enter another different</div>')

				validarEmailRepetido = true;

			}
		}

	})

})


/*===========================================================
=            Validar registro de los proveedores            =
===========================================================*/

function servicesProvider(){

	var name=$("#sername").val();
	if (name!="") {
		var expresion=/^[a-zA-Z ]*$/;
		if (!expresion.test(name)) {
			$("#sername").parent().before('<div class="alert alert-warning"><strong>Error:</strong> No numbers or special characters</div>');
			return false;
		}
	}else{
		$("#sername").parent().before('<div class="alert alert-warning"><strong>ATTENTION:</strong> This field is required</div>');
		return false;
	}

	var seremail = $("#seremail").val();
	if(seremail != ""){
		var expresion = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
		if(!expresion.test(seremail)){
			$("#seremail").parent().before('<div class="alert alert-warning"><strong>ERROR:</strong> Invalid email. Please correct.</div>')
			return false;
		}
		if(validarEmailRepetido){
			$("#seremail").parent().before('<div class="alert alert-danger"><strong>ERROR:</strong> The email already exists in the database,please enter another different</div>')
			return false;
		}
		
	}else{
		$("#seremail").parent().before('<div class="alert alert-warning"><strong>ATTENTION:</strong> This field is requiredo</div>')
		return false;
	}

	var serphone=$("#serphone").val();

	if (serphone!="") {
		var expresion=/^[0-9+ ]*$/;
		if (!expresion.test(serphone)) {
			$("#serphone").parent().before('<div class="alert alert-warning"><strong>Error:</strong> No Letters or special characters</div>');
			return false;
		}
	}else{
		$("#serphone").parent().before('<div class="alert alert-warning"><strong>ATTENTION:</strong> This field is required</div>');
		return false;
	}



	var politicas =$("#regPoliticas:checked").val();
	if (politicas!="on") {
		$("#regPoliticas").parent().before('<div class="alert alert-warning"><strong>ATTENTION:</strong> Please accept the terms and conditions before proceding  </div>')
		return false;
	}

	/*=====  End of politicas de privacidad   ======*/

	return true;

}

/*=====  End of Validar registro de los proveedores  ======*/


/*=============================================
=        Actualizar registro recipient     =
=============================================*/
function actualizarProvider(){
	
	var password = $("#password").val();
	var password2 = $("#confirmPassword").val();	
	if(password != ""){

		var expresion = /^[a-zA-Z0-9]*$/;

		if(!expresion.test(password)){

			$("#password").parent().before('<div class="alert alert-warning"><strong>ERROR:</strong> No special characters allowed</div>')

			return false;

		}

	}else{

		$("#password").parent().before('<div class="alert alert-warning"><strong>ATTENTION:</strong> This field is required/div>')

		return false;
	}


	if(password2 != ""){

		var expresion = /^[a-zA-Z0-9]*$/;

		if(!expresion.test(password2)){

			$("#confirmPassword").parent().before('<div class="alert alert-warning"><strong>ERROR:</strong> No special characters allowed</div>')

			return false;
		}

		if (password2!=password) {
			$("#confirmPassword").parent().before('<div class="alert alert-warning"><strong>ATTENTION:</strong> Passwords do not match</div>')

			return false;
		}

	}else{

		$("#confirmPassword").parent().before('<div class="alert alert-warning"><strong>ATTENTION:</strong> This field is required</div>')

		return false;
		
	}


	/*=============================================
	VALIDAR POLÍTICAS DE PRIVACIDAD
	=============================================*/

	var politicas = $("#regPoliticas2:checked").val();
	
	if(politicas != "on"){

		$("#regPoliticas2").parent().before('<div class="alert alert-warning"><strong>ATTENTION:</strong> You must accept our terms of use and privacy policies</div>')

		return false;

	}

	return true;

}
/*=====  End of Actualizar registro recipient  ======*/