var rutaOculta = $("#rutaOculta").val();

$(document).ready(function(){
	$("#btn-search-nav").click(function (){
		var datos={
			"searchNav" : $("#_searchNav").val()
		}
		$.ajax({
			type: "POST", 
			url: rutaOculta+"vistas/modulos/load_busqueda.php",
			data: datos,
			contentType: "application/x-www-form-urlencoded",
			beforeSend: function() {
				$("#res-search-nav").html("<img src='"+rutaOculta+"vistas/img/loading.gif' width='60px' height='60px' >"); 
			},
			dataType: "html",
			success: function(data){                      
				$("#res-search-nav").slideDown("slow").html(data);
			}
		});
	});

});

function openSearch(){	
	$("#ventana2").fadeIn("slow");
}

function closeSearch(){
	$("#ventana2").slideUp("fast");
}