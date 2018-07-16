
var rutaOculta = $("#rutaOculta").val();
/*=============================================
/*=============================================
/*=============================================
/*=============================================
/*=============================================
VISUALIZAR LA SUMA TOTAL
=============================================*/
if(localStorage.getItem("total") != null){
	var totalAmount= JSON.parse(localStorage.getItem("listagift"));	

	$(".cabeceraCheckout").append(
		'<a class="btnPagar" idRecip="'+totalAmount[0].Recipient+'">'+
		'<button class="btn btn-primary btn-lg pull-right">Make payment</button>'+
		'</a>');
}

/*=============================================
/*=============================================
/*=============================================
/*=============================================
/*=============================================
VISUALIZAR LA CONTRIBUTION
=============================================*/

if(localStorage.getItem("listagift") != null){

	var listagift = JSON.parse(localStorage.getItem("listagift"));

	listagift.forEach(funcionForEach);

	function funcionForEach(item, index)
	{
		$(".listaGifts table.tableGifts tbody").append('<tr>'+
			'<td>Gift of help</td>'+
			'<td>$ '+item.AmountGift+'</td>'+
			'<td>$ '+item.AmountGift+'</td>'+
			'<tr>');
	}

	var id_Recip= (listagift[0].Recipient);

	var amount = (listagift[0].AmountGift);	

	var subtotal =(listagift[0].AmountGift);


	$(".valorSubtotal").html(subtotal);

	var impuestoTotal=(subtotal* $("#TasaImpuestoPaypal").val())/100;
	$(".valorTotalImpuesto").html(parseFloat(impuestoTotal).toFixed(2));


	sumaTotal();

}else{

	$(".contenidoCheckout").html('<div class="well text-center">No gift of help yet.</div>');
	$(".sumaGift").hide();
	$(".cabeceraCheckout").hide();
	$(".contenidoCheckout").hide();
}



	/*=============================================
/*=============================================
/*=============================================
/*=============================================
/*=============================================
VISUALIZAR LA CONTRIBUTION
=============================================*/
$(".gift").click(function(){


	var listagift=[];

	var id_Recip=$("#idRec").val();
	var AmountGift=$("#kiku").val();
	var paypal=AmountGift*0.04;
	var total=Number(AmountGift)+Number(paypal);
	var activargift=false;


	if (AmountGift!="") {		
		
		activargift=true;

	}

	/**Variables al local storage*/

	if (activargift) {

		if(localStorage.getItem("listagift") == null){

			listagift = [];

		}

		listagift.push({"Recipient":id_Recip,
			"AmountGift":AmountGift,
			"paypal":paypal
		});	
		localStorage.setItem("listagift", JSON.stringify(listagift));
		localStorage.setItem("total",total);
	}
})


/*=============================================
/*=============================================
/*=============================================
/*=============================================
/*=============================================
/*============================================
=            SumaTotal definitivo            =
============================================*/
function sumaTotal(){
	$(".valorTotalGift").html(parseFloat(Number($(".valorSubtotal").html())+ Number($(".valorTotalImpuesto").html())).toFixed(2));
}


/*=============================================
/*=============================================
/*=============================================
/*=============================================
/*=============================================
/*============================================
=            boton de realizar Donacion            =
============================================*/
$(".btnPagar").click(function(){
	var divisa="USD";
	var total=$(".valorTotalGift").html();
	var impuesto=$(".valorTotalImpuesto").html();
	var subtotal=$(".valorSubtotal").html();
	var description="Gift of help";
	var cantidad=1;
	var item=$(".valorTotalImpuesto").html();
	var idRecip= $(".btnPagar").attr("idRecip");
	

	var datos = new FormData();

	datos.append("divisa", divisa);
	datos.append("total",total);
	datos.append("impuesto",impuesto);
	datos.append("subtotal",subtotal);
	datos.append("description",description);
	datos.append("cantidad",cantidad);
	datos.append("item",item);
	datos.append("idRecip",idRecip);


	$.ajax({
		url:rutaOculta+"ajax/gift.ajax.php",
		method:"POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		success:function(respuesta){

			window.location = respuesta;

		}

	})



})

