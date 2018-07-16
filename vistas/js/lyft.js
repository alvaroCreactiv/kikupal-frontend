var rutaOculta = $("#rutaOculta").val();

$('a[data-toggle="tab"]').on('show.bs.tab', function (e) {
	$.ajax({
		url:rutaOculta+"ajax/lyft.ajax.php",
		type:"json",
		success:function(respuesta){
			var obj = JSON.parse(respuesta);
			var nombre = obj['access_token'];
			$("#inputToken").val(nombre);
			console.log(respuesta);
		}
	})

});

$(document).ready(function(){
	

});


$("#geocomplete").on("change",function(){

	var token=$("#inputToken").val();
	var origenLat=$("#origenLat").val();
	var origenLng=$("#origenLng").val();

	var access = new FormData();
	access.append("token", token);
	access.append("origenLat", origenLat);
	access.append("origenLng", origenLng);

	var rideType = $("#ride_types");
	rideType.empty();

	$.ajax({
		url:rutaOculta+"ajax/ride.ajax.php",
		method: "POST",
		type:"json",
		data : access,
		cache: false,
		contentType: false,
		processData: false,

		success:function(respuesta){

			var max=JSON.parse(respuesta);

			var ride = max["ride_types"];
			for (var i = 0 ; i <= ride.length - 1; i++) {
				$('#ride_types').append('<option value="'+max['ride_types'][i]['ride_type']+'">'+max['ride_types'][i]['display_name']+'</option>');
			}

		}
	});
});


$("#getEstimateButton").click(function(){

	if($("#geocomplete").val()=="" || $("#geocomplete1").val()=="" ){
		console.log("no hay pickup");
	}else{


		var token=$("#inputToken").val();
		var origenLat=$("#origenLat").val();
		var origenLng=$("#origenLng").val();
		var destinoLat=$("#destinoLat").val();
		var destinoLng=$("#destinoLng").val();
		var typeRide=$("#ride_types").val();


		var cost = new FormData();
		cost.append("token", token);
		cost.append("origenLat", origenLat);
		cost.append("origenLng", origenLng);
		cost.append("destinoLat", destinoLat);
		cost.append("destinoLng", destinoLng);

		$.ajax({
			url:rutaOculta+"ajax/cost.ajax.php",
			method: "POST",
			type:"json",
			data : cost,
			cache: false,
			contentType: false,
			processData: false,

			success:function(respuesta){

				var costo=JSON.parse(respuesta);
				var mcost=costo["cost_estimates"];
				for (var i=0; i <= mcost.length-1; i++) {
					if (typeRide==costo["cost_estimates"][i]["ride_type"]) {
						var costes=costo["cost_estimates"][i]["estimated_cost_cents_max"];
						var total=Math.round(((costes*0.01)*1.10),2);
						document.getElementById("estimate").innerHTML=total;
					}
				}

			}
		});
	}

});



$("#rideRequest").click(function(){

	$.ajax({
		url:rutaOculta+"peticion.ajax.php",	
		method: "GET",
		
		success:function(respuesta){
			
			$(".ridelifyft").load(respuesta);
		}


	});
	
	// if($("#geocomplete").val()=="" || $("#geocomplete1").val()=="" ){
	// 	console.log("no hay pickup");
	// }else{
	// 	var token=$("#inputToken").val();
	// 	var origenLat=$("#origenLat").val();
	// 	var origenLng=$("#origenLng").val();
	// 	var destinoLat=$("#destinoLat").val();
	// 	var destinoLng=$("#destinoLng").val();
	// 	var destinoName=$("#destinoName").val();
	// 	var typeRide=$("#ride_types").val();

	// 	var request = new FormData();
	// 	request.append("token", token);
	// 	request.append("origenLat", origenLat);
	// 	request.append("origenLng", origenLng);
	// 	request.append("destinoLat", destinoLat);
	// 	request.append("destinoLng", destinoLng);
	// 	request.append("destinoName", destinoName);
	// 	request.append("typeRide", typeRide);

	// 	$.ajax({
	// 		async: true,
	// 		crossDomain: true,		
	// 		url:rutaOculta+"ajax/request.ajax.php",
	// 		method: "POST",
	// 		type:"json",
	// 		data : request,
	// 		cache: false,
	// 		contentType: false,
	// 		processData: false,

	// 		success:function(respuesta){
	// 			console.log(respuesta);

	// 		}
	// 	});
	// }

});



// var OPTIONS = {
// 	scriptSrc: rutaOculta+'vistas/js/plugins/lyftWebButton.min.js',
// 	namespace: 'kikupal',
// 	clientId: '4vR86UN3RJ28',
// 	clientToken: 'brR15MVbUqgEyuG/KLZ9ssAMDKtVFC1IWa+BE37Yxuyt9uNCnXzkdwVmitmyOrq5ZmagvCEL7D3QIYKP11+rS5BH1VtXXGD/jtGRrlW8S8j9XO8eX+2DPiY=',
// 	location: {
// 		pickup: {}, 
// 		destination: {},
// 	},
// 	parentElement: document.getElementById('lyft-web-button-parent'),
// 	queryParams: {
// 		credits: ''
// 	},
// 	theme: 'multicolor large',
// };

// (function(t) {
// 	var n = this.window,
// 	e = this.document;
// 	n.lyftInstanceIndex = n.lyftInstanceIndex || 0;
// 	var a = t.parentElement,
// 	c = e.createElement("script");
// 	c.async = !0, c.onload = function() {
// 		n.lyftInstanceIndex++;
// 		var e = t.namespace ? "lyftWebButton" + t.namespace + n.lyftInstanceIndex : "lyftWebButton" + n.lyftInstanceIndex;
// 		n[e] = n.lyftWebButton, t.objectName = e, n[e].initialize(t)
// 	}, c.src = t.scriptSrc, a.insertBefore(c, a.childNodes[0])
// }).call(this, OPTIONS);

