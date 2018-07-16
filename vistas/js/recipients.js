var rutaOculta = $("#rutaOculta").val();

/*=============================================
Captura de ruta
=============================================*/

var rutaActual=location.href;


$("#sendGift").click(function(){

	var contributor=[];

	var firstName=$("#firstName").val();
	var lastName=$("#lastName").val();
	var yourEmail=$("#yourEmail").val();
	var phoneNumber=$("#phoneNumber").val();
	var activargift=false;

	if (yourEmail!="") {				
		activargift=true;
	}
	if (activargift) {

		if(localStorage.getItem("contributor") == null){

			contributor = [];

		}

		contributor.push({"firstName":firstName,
			"lastName":lastName,
			"yourEmail":yourEmail,
			"phoneNumber":phoneNumber

		});	

		localStorage.setItem("contributor", JSON.stringify(contributor));
	}


})


$(".btnIngreso").click(function(){
	localStorage.setItem("rutaActual", rutaActual);
})

/*=============================================
FORMATEAR LOS IPUNT
=============================================*/

$("input").focus(function(){

	$(".alert").remove();
})



/*=============================================
VALIDAR EMAIL REPETIDO
=============================================*/
var validarEmailRepetido = false;

$("#email").change(function(){

	var email = $("#email").val();

	var datos = new FormData();
	
	datos.append("validarEmail", email);

	
	$.ajax({
		url:rutaOculta+"ajax/recipients.ajax.php",
		method: "POST",
		data: datos,	
		cache: false,
		contentType: false,
		processData: false,	
		success:function(respuesta){		
			if(respuesta == "false"){
				$(".alert").remove();
				validarEmailRepetido = false;				
			}else{
				
				$("#email").parent().before('<div class="alert alert-warning"><strong>ERROR:</strong> The email already exists in the database, please enter another different</div>')

				validarEmailRepetido = true;

			}
		}

	})

})





/*=============================================
=        Validar el registro de Recipient     =
=============================================*/
function registroRecipient(){

	/*=============================================
	=       validar first name       =
	=============================================*/
	var firstName=$("#firstName").val();

	if (firstName!="") {
		var expresion=/^[a-zA-Z ]*$/;
		if (!expresion.test(firstName)) {
			$("#firstName").parent().before('<div class="alert alert-warning"><strong>Error:</strong> No numbers or special characters</div>');
			return false;
		}
	}else{
		$("#firstName").parent().before('<div class="alert alert-warning"><strong>ATTENTION:</strong> This field is required</div>');
		return false;
	}

	/*=============================================
	=       validar Last name       =
	=============================================*/
	var lastName=$("#lastName").val();

	if (lastName!="") {
		var expresion=/^[a-zA-Z ]*$/;
		if (!expresion.test(lastName)) {
			$("#lastName").parent().before('<div class="alert alert-warning"><strong>Error:</strong> No numbers or special characters</div>');
			return false;
		}
	}else{
		$("#lastName").parent().before('<div class="alert alert-warning"><strong>ATTENTION:</strong> This field is required</div>');
		return false;
	}


	/*=============================================
	=       validar email       =
	=============================================*/
	var yourEmail = $("#yourEmail").val();
	if(yourEmail != ""){
		var expresion = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
		if(!expresion.test(yourEmail)){
			$("#yourEmail").parent().before('<div class="alert alert-warning"><strong>ERROR:</strong> Invalid email. Please correct.</div>')
			return false;
		}
		
	}else{
		$("#yourEmail").parent().before('<div class="alert alert-warning"><strong>ATTENTION:</strong> This field is requiredo</div>')
		return false;
	}
	/*=============================================
	=       validar  phone number      =
	=============================================*/
	var phoneNumber=$("#phoneNumber").val();

	if (phoneNumber!="") {
		var expresion=/^[0-9+ ]*$/;
		if (!expresion.test(phoneNumber)) {
			$("#phoneNumber").parent().before('<div class="alert alert-warning"><strong>Error:</strong> No Letters or special characters</div>');
			return false;
		}
	}else{
		$("#phoneNumber").parent().before('<div class="alert alert-warning"><strong>ATTENTION:</strong> This field is required</div>');
		return false;
	}


	/*=============================================
	=       validar first name       =
	=============================================*/
	var fname=$("#fname").val();

	if (fname!="") {
		var expresion=/^[a-zA-Z ]*$/;
		if (!expresion.test(fname)) {
			$("#fname").parent().before('<div class="alert alert-warning"><strong>Error:</strong> No numbers or special characters</div>');
			return false;
		}
	}else{
		$("#fname").parent().before('<div class="alert alert-warning"><strong>ATTENTION:</strong> This field is required</div>');
		return false;
	}

	/*=============================================
	=       validar Last name       =
	=============================================*/
	var lname=$("#lname").val();

	if (lname!="") {
		var expresion=/^[a-zA-Z ]*$/;
		if (!expresion.test(lname)) {
			$("#lname").parent().before('<div class="alert alert-warning"><strong>Error:</strong> No numbers or special characters</div>');
			return false;
		}
	}else{
		$("#lname").parent().before('<div class="alert alert-warning"><strong>ATTENTION:</strong> This field is required</div>');
		return false;
	}


	/*=============================================
	=       validar email       =
	=============================================*/
	var email = $("#email").val();
	if(email != ""){
		var expresion =  /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
		if(!expresion.test(email)){
			$("#email").parent().before('<div class="alert alert-warning"><strong>ERROR:</strong> Invalid email. Please correct.</div>')
			return false;
		}
		if(validarEmailRepetido){
			$("#email").parent().before('<div class="alert alert-danger"><strong>ERROR:</strong> The email already exists in the database,please enter another different</div>')
			return false;
		}
	}else{
		$("#email").parent().before('<div class="alert alert-warning"><strong>ATTENTION:</strong> This field is required</div>')
		return false;
	}
	/*=============================================
	=       validar  phone number      =
	=============================================*/
	var phone=$("#phone").val();

	if (phone!="") {
		var expresion=/^[0-9+() ]*$/;
		if (!expresion.test(phone)) {
			$("#phone").parent().before('<div class="alert alert-warning"><strong>Error:</strong> No Letters or special characters</div>');
			return false;
		}
	}
	// else{
	// 	$("#phone").parent().before('<div class="alert alert-warning"><strong>ATTENTION:</strong> This field is required</div>');
	// 	return false;
	// }


	/*=============================================
	=       validar politicas de privacidad       =
	=============================================*/
	var politicas =$("#regPoliticas:checked").val();
	if (politicas!="on") {
		$("#regPoliticas").parent().before('<div class="alert alert-warning"><strong>ATTENTION:</strong> Please accept the terms and conditions before proceding  </div>')
		return false;
	}
	
	/*=====  End of politicas de privacidad   ======*/



	// var zone =$("#zone:checked").val();
	// if (zone!="on") {
	// 	$("#zone").parent().before('<div class="alert alert-warning"><strong>ATTENTION:</strong> Please accept </div>')
	// 	return false;
	// }
	
	return true;
}


/*=====  End of validar Recipients  ======*/


/*=============================================
=        Actualizar registro recipient     =
=============================================*/
function actualizarRecipient(){
	
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

$(document).ready(function(){
	$('.nav-tabs a').click(function(){
		$(this).tab('show');
	});
});

/*=============================================
=        cambiar foto     =
=============================================*/

$("#btnCambiarFoto").click(function(){
	$("#imgPerfil").toggle();
	$("#subirImagen").toggle();
})

$("#datosImagen").change(function(){
	var imagen = this.files[0];
	
	if(imagen["type"] != "image/jpeg"){

		$("#datosImagen").val("");

		swal({
			title: "Error Uploading image",
			text: "The image must be in JPG format!",
			type: "error",
			confirmButtonText: "close!",
			closeOnConfirm: false
		},
		function(isConfirm){
			if (isConfirm) {	   
				window.location = "panel-setting.php";
			} 
		});

	}

	else if(Number(imagen["size"]) > 2000000){

		$("#datosImagen").val("");

		swal({
			title: "Error Uploading image",
			text: "The image should not weigh more than 2 MB!",
			type: "error",
			confirmButtonText: "¡Cerrar!",
			closeOnConfirm: false
		},
		function(isConfirm){
			if (isConfirm) {	   
				window.location ="panel-setting.php";
			} 
		});

	}else{

		var datosImagen = new FileReader;
		datosImagen.readAsDataURL(imagen);

		$(datosImagen).on("load", function(event){

			var rutaImagen = event.target.result;
			$(".previsualizar").attr("src",  rutaImagen);

		})

	}
})


/*=============================================
=       eliminar recipient   =
=============================================*/
$("#eliminarUsuario").click(function(){
	var id=$("#idRecipient").val();
	if($("#modoRecipient").val()=="directo"){
		if ($("#fotoRecipient").val()!="") {
			var foto =$("#fotoRecipient").val();

		}
	}
	swal({
		title: "You are sure to delete your account?",
		text: "Deleting this account can no longer retrieve the data!",
		type: "warning",
		showCancelButton: true,
		confirmButtonColor: "#DD6B55",
		confirmButtonText: "Yes, delete account!",
		closeOnConfirm: false
	},
	function(isConfirm){
		if (isConfirm) {	   
			window.location = "panel-setting.php?id="+id+"&foto="+foto;
		} 
	});

})