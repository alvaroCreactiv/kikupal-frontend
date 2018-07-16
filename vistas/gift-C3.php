<!DOCTYPE html>
<html lang="es">
<head>
	<?php $url = Ruta::ctrRuta(); 
	$servidor = Ruta::ctrRutaServidor();

	$social = ControladorPlantilla::ctrEstiloPlantilla();

	?>
	<meta charset="UTF-8">
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

	<meta name="title" content="Kukipal">

	<meta name="description" content="Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quisquam accusantium enim esse eos officiis sit officia">

	<meta name="keyword" content="Lorem ipsum, dolor sit amet, consectetur, adipisicing, elit, Quisquam, accusantium, enim, esse">
	<meta property="og:image" content="http://www.kikupal.com/image/share-index.jpg" />
	<meta name="author" content="Creactiv Media">
	
	<link rel="icon" href="<?php echo $servidor.$social["icono"]?>" type="image/x-icon" />
	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo $servidor.$social["icono"]?>">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo $servidor.$social["icono"]?>">
	<link rel="manifest" href="<?php echo $url?>vistas/img/favicons/manifest.json">
	<link rel="mask-icon" href="<?php echo $url?>vistas/img/favicons/safari-pinned-tab.svg" color="#5bbad5">
	<title>Create Help Fund</title>

	
	
	<!--=====================================
	=            Puglings de css            =
	======================================-->

	<link rel="stylesheet" href="<?php echo $url; ?>vistas/css/plugins/bootstrap.min.css">

	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<link rel="stylesheet" href="<?php echo $url; ?>vistas/css/plugins/animate.css">

	<link href="https://fonts.googleapis.com/css?family=PT+Sans" rel="stylesheet">

	<link rel="stylesheet" href="<?php echo $url; ?>vistas/css/plugins/sweetalert.css">


	<!--====  End of Puglings de css  ====-->

	<!--======================================================
	=            Hojas de estilo personalizadas            =
	======================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo $url; ?>vistas/css/encabezado.css">	
	<link rel="stylesheet" type="text/css" href="<?php echo $url; ?>vistas/css/gift.css">	
	<link rel="stylesheet" href="<?php echo $url; ?>vistas/css/footer.css">

	<!--=====  End of Hojas de estilo personalizadas  ======-->

	<!--======================================================
	=            Plugins de java script            =
	======================================================-->

	<script src="<?php echo $url; ?>vistas/js/plugins/jquery.min.js"></script>

	<script src="<?php echo $url; ?>vistas/js/plugins/bootstrap.min.js"></script>

	<script src="<?php echo $url; ?>vistas/js/plugins/jquery.easing.js"></script>

	<script src="<?php echo $url; ?>vistas/js/plugins/sweetalert.min.js"></script>
	<script src="<?php echo $url; ?>vistas/js/dwolla.js"></script>

	<!--=====  End of Plugins de java script  ======-->
	<div id="fb-root"></div>


</head>

<body>
	<script>
		window.fbAsyncInit = function() {
			FB.init({
				appId      : '217066325510400',
				cookie     : true,
				xfbml      : true,
				version    : 'v2.12'
			});

			FB.AppEvents.logPageView();   

		};

		(function(d, s, id){
			var js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id)) {return;}
			js = d.createElement(s); js.id = id;
			js.src = "https://connect.facebook.net/en_US/sdk.js";
			fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
	</script>

	<script src="<?php echo $url; ?>vistas/js/plugins/wow.min.js"></script>

	<?php
/*=============================================
Principal C3
=============================================*/
include "modulos/encabezado.php";
include "modulos/giftC3.php";
include "modulos/footer.php";
?>
<!--===============================================
=            Java script personalizado            =
================================================-->
<input type="hidden" value="<?php echo $url; ?>" id="rutaOculta">
<script src="<?php echo $url; ?>vistas/js/footer.js"></script>
<script src="<?php echo $url; ?>vistas/js/load_busqueda.js"></script>
<script src="<?php echo $url; ?>vistas/js/checkout.js"></script>
<script src="<?php echo $url; ?>vistas/js/registroFacebook.js"></script>
<script src="<?php echo $url; ?>vistas/js/giftC3.js"></script>
<script src="<?php echo $url; ?>vistas/js/plantilla	.js"></script>
<!--====  End of Java script personalizado  ====-->
</body>
</html>

