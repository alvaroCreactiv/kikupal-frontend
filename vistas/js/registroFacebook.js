var rutaActual=location.href;

$("#btnFacebookRegister").click(function(){

	localStorage.setItem("rutaActual", rutaActual);
	FB.login(function(response) {
		validarUsuario();
	}, {scope:'public_profile,email'});	
})


$("#FacebookRegister").click(function(){

	localStorage.setItem("rutaActual", rutaActual);
	FB.login(function(response) {
		validarContributor();
	}, {scope:'public_profile,email'});	
})

/*=====  End of Boton facebook  ======*/

function validarUsuario(){
	FB.getLoginStatus(function(response) {
		statusChangeCallback(response);
	})
}


function validarContributor(){
	FB.getLoginStatus(function(response) {
		statusChangeCallbackContri(response);
	})
}

function statusChangeCallbackContri(response){
	if (response.status==='connected') {
		textApiContri();

	}else{		
		swal({
			title:"Error",
			text:"Ocurrio un error al ingresar, intente de nuevo!",
			tipo:"error",
			conformButtonText:"close",
			closOnConfirm: false
		},
		function(isConfirm){
			if(isConfirm){
				window.location =localStorage.getItem("rutaActual", rutaActual);
			}
		}); 
		
	}
}

/*================================================
=            validar cambio de estado            =
================================================*/
function statusChangeCallback(response){
	if (response.status==='connected') {
		textApi();

	}else{		
		swal({
			title:"Error",
			text:"Ocurrio un error al ingresar, intente de nuevo!",
			tipo:"error",
			conformButtonText:"close",
			closOnConfirm: false
		},
		function(isConfirm){
			if(isConfirm){
				window.location =localStorage.getItem("rutaActual", rutaActual);
			}
		}); 
		
	}
}


function textApiContri(){
	FB.api('/me?fields=id,first_name,last_name,email',function(response){
		if (response.email==null) {
			swal({
				title:"Error",
				text:"No se puede acceder al correo electronico!",
				tipo:"error",
				conformButtonText:"close",
				closOnConfirm: false
			},
			function(isConfirm){
				if(isConfirm){
					window.location =localStorage.getItem("rutaActual", rutaActual);
				}
			}); 
		}else{
			var email= response.email;			
			var firstName=response.first_name;
			var last_name= response.last_name;
			$("#firstName").val(firstName);
			$("#lastName").val(last_name);
			$("#yourEmail").val(email);
		}
	})
}

function textApi(){
	FB.api('/me?fields=id,first_name,last_name,email',function(response){
		if (response.email==null) {
			swal({
				title:"Error",
				text:"No se puede acceder al correo electronico!",
				tipo:"error",
				conformButtonText:"close",
				closOnConfirm: false
			},
			function(isConfirm){
				if(isConfirm){
					window.location =localStorage.getItem("rutaActual", rutaActual);
				}
			}); 
		}else{
			var email= response.email;			
			var firstName=response.first_name;
			var last_name= response.last_name;
			$("#cName").val(firstName);
			$("#lName").val(last_name);
			$("#yEmail").val(email);
		}
	})
}