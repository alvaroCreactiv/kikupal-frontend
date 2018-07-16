$(".redSocial").hover(function(){
	$(this).fadeTo("fast",0.9);
	$(this).css("color", "#FFF");
	$(this).css("background", "#29B6AC");
	$(this).css("transform", "scale(1.5,1.5)");  
},
function(){
	$(this).fadeTo("fast",1);
	$(this).css("color", "#29B6AC");
	$(this).css("background", "#FFF");
	$(this).css("transform", "scale(1,1)");
});