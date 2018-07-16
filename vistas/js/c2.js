window.onload = function () {


	// $('.button-container button').click(function() {
		
	// 	setTimeout(function(){
	// 		var x=document.getElementById("mi-video").load();
	// 		$(".banner").innerHTML=x;
	// 		$('.button-container button').addClass('hide');
	// 		setTimeout(function() {
	// 			$('.button-container button').hide();
	// 			$('.overlay').addClass('active');
	// 			$('.overlay').css('z-index', 2);				
	// 			$('body').addClass('no-scroll');
	// 			bindBodyClick();
	// 		}, 200);
	// 	}, 500);
	// });

	// $("#mi-video").on('ended', function(){
	// 	$('.overlay').removeClass('active');
	// 	setTimeout(function() {
	// 		$('.button-container button').removeClass('hide');
	// 		$('.button-container button').show();
	// 		$('.overlay').css('z-index', 0);
	// 		$('body').removeClass('no-scroll');
	// 		$('.overlay').unbind('click');
	// 	}, 800);
	// });


	$("#fname").val('');
	$("#lname").val('');
	$("#email").val('');
	$("#phone").val('');
	var optradio="";
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
	var optradio = document.getElementsByName('optradio');

	var radioButSelValue = '';
	for (var i=0; i<optradio.length; i++) {
		if (optradio[i].checked == true) { 
			radioButSelValue = optradio[i].value;
			console.log(radioButSelValue);
		} 
	}
	if (radioButSelValue != ''){
		if (radioButSelValue =='Yes') {
			$("#fname").val(document.getElementById('firstName').value);

			$("#lname").val(document.getElementById('lastName').value);

			$("#phone").val(document.getElementById('phoneNumber').value);


		} else {

			$("#fname").removeAttr('disabled');
			
			$("#lname").removeAttr('disabled');
			
			$("#email").removeAttr('disabled');

			$("#phone").removeAttr('disabled');
		}
	}
}

$(function() {
	$(".video").click(function () {
		var theModal = $(this).data("target"),
		videoSRC = $(this).attr("data-video"),
		videoSRCauto = videoSRC + "?modestbranding=1&rel=0&controls=0&showinfo=0&html5=1&autoplay=1";
		$(theModal + ' iframe').attr('src', videoSRCauto);
		$(theModal + ' button.close').click(function () {
			$(theModal + ' iframe').attr('src', videoSRC);
		});
	});
});

// function bindBodyClick() {
// 	$('.overlay').click(function() {	
// 		document.getElementById("mi-video").pause();
// 		$('.overlay').removeClass('active');
// 		setTimeout(function() {
// 			$('.button-container button').removeClass('hide');
// 			$('.button-container button').show();
// 			$('.overlay').css('z-index', 0);
// 			$('body').removeClass('no-scroll');
// 			$('.overlay').unbind('click');
// 		}, 800);
// 	});
// }

