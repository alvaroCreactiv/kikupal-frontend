<!DOCTYPE html>
<html lang="es">
<head>

	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

	<meta name="title" content="Kukipal">

	<meta name="description" content="Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quisquam accusantium enim esse eos officiis sit officia">

	<meta name="keyword" content="Lorem ipsum, dolor sit amet, consectetur, adipisicing, elit, Quisquam, accusantium, enim, esse">
	<meta property="og:image" content="http://www.kikupal.com/image/share-index.jpg" />
	<meta name="author" content="Creactiv Media">

	<title>Create Help Fund</title>

	<link rel="icon" href="">
	<?php $url = Ruta::ctrRuta(); ?>
	<!--=====================================
	=            Puglings de css            =
	======================================-->

	<link rel="stylesheet" href="<?php echo $url; ?>vistas/css/plugins/bootstrap.min.css">

	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<link rel="stylesheet" href="<?php echo $url; ?>vistas/css/plugins/animate.css">

	<link href="https://fonts.googleapis.com/css?family=PT+Sans" rel="stylesheet">

	<link rel="stylesheet" href="<?php echo $url; ?>vistas/css/plugins/sweetalert.css">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css">
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.theme.min.css">


	<!--====  End of Puglings de css  ====-->

	<!--======================================================
	=            Hojas de estilo personalizadas            =
	======================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo $url; ?>vistas/css/encabezado.css">	
	<link rel="stylesheet" type="text/css" href="<?php echo $url; ?>vistas/css/create.css">	
	<link rel="stylesheet" href="<?php echo $url; ?>vistas/css/footer.css">

	<!--=====  End of Hojas de estilo personalizadas  ======-->

	<!--======================================================
	=            Plugins de java script            =
	======================================================-->

	<script src="<?php echo $url; ?>vistas/js/plugins/jquery.min.js"></script>

	<script src="<?php echo $url; ?>vistas/js/plugins/bootstrap.min.js"></script>

	<script src="<?php echo $url; ?>vistas/js/plugins/jquery.easing.js"></script>

	<script src="<?php echo $url; ?>vistas/js/plugins/sweetalert.min.js"></script>

	<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script>

	<!--=====  End of Plugins de java script  ======-->
	<div id="fb-root"></div>


</head>

<body>
	<script src="<?php echo $url; ?>vistas/js/plugins/wow.min.js"></script>
	<script>
		new WOW().init({
	          boxClass:     'wow',      // default
	          animateClass: 'animated', // default
	          offset:       0,          // default
	          mobile:       true,       // default
	          live:         true        // default
	      });
	  </script>


	  <?php
/*=============================================
Principal C2
=============================================*/
include "modulos/encabezado.php";
include "modulos/create.php";
include "modulos/footer.php";
?>
<!--===============================================
=            Java script personalizado            =
================================================-->
<input type="hidden" value="<?php echo $url; ?>" id="rutaOculta">
<script src="<?php echo $url; ?>vistas/js/footer.js"></script>
<script src="<?php echo $url; ?>vistas/js/load_busqueda.js"></script>
<script>
	$(document).ready(function(){
		$("#testimonial-slider").owlCarousel({
			items:2,
			itemsDesktop:[1000,2],
			itemsDesktopSmall:[979,2],
			itemsTablet:[768,1],
			pagination:true,
			autoPlay:true
		});
	});
</script>
<!--====  End of Java script personalizado  ====-->
</body>
</html>

