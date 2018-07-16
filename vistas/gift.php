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

	<link rel="stylesheet" href="<?php echo $url; ?>vistas/css/plugins/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo $url; ?>vistas/css/plugins/animate.css">
	<link rel="stylesheet" href="<?php echo $url; ?>vistas/css/plugins/sweetalert.css">

	<link href="https://fonts.googleapis.com/css?family=PT+Sans" rel="stylesheet">



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
include "modulos/createC5.php";
include "modulos/footer.php";
?>
<!--===============================================
=            Java script personalizado            =
================================================-->


<!--<script src="<?php echo $url; ?>vistas/js/plantilla.js"></script>-->
<script src="<?php echo $url; ?>vistas/js/create.js"></script>
<script src="<?php echo $url; ?>vistas/js/footer.js"></script>
<!--====  End of Java script personalizado  ====-->
</body>
</html>

