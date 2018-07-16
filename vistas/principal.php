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

	<title>Kikupal</title>

	<link rel="icon" href="">

	<!--=====================================
	=            Puglings de css            =
	======================================-->

	<link rel="stylesheet" href="<?php echo $url; ?>vistas/css/plugins/bootstrap.min.css">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<link rel="stylesheet" href="<?php echo $url; ?>vistas/css/plugins/animate.css">
	<link rel="stylesheet" href="<?php echo $url; ?>vistas/dist/css/AdminLTE.min.css">

	<link href="https://fonts.googleapis.com/css?family=PT+Sans" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo $url; ?>vistas/css/plugins/sweetalert.css">
	<link rel="stylesheet" href="<?php echo $url; ?>vistas/js/bootstrap-select/css/bootstrap-select.css">

	<!--====  End of Puglings de css  ====-->

	<!--======================================================
	=            Hojas de estilo personalizadas            =
	======================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo $url; ?>vistas/css/encabezado.css">	
	<link rel="stylesheet" href="<?php echo $url; ?>vistas/css/principal.css">
	<link rel="stylesheet" href="<?php echo $url; ?>vistas/css/footer.css">
	<link rel="stylesheet" href="<?php echo $url; ?>vistas/css/login-pagen.css">
	<link rel="stylesheet" href="<?php echo $url; ?>vistas/css/payment.css">

	<!--=====  End of Hojas de estilo personalizadas  ======-->

	<!--======================================================
	=            Plugins de java script            =
	======================================================-->
	
	<script src="<?php echo $url; ?>vistas/js/plugins/jquery.min.js"></script>

	<script src="<?php echo $url; ?>vistas/js/plugins/bootstrap.min.js"></script>

	<script src="<?php echo $url; ?>vistas/js/plugins/jquery.easing.js"></script>

	<script src="<?php echo $url; ?>vistas/js/plugins/sweetalert.min.js"></script>

	<script src="<?php echo $url; ?>vistas/js/bootstrap-select/js/bootstrap-select.min.js"></script>
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
Principal C1
=============================================*/
$rutas = array();
$ruta=null;
if(isset($_GET["ruta"])){

	$rutas = explode("/", $_GET["ruta"]);

	if($rutas[0] == "verificar"){
		include "modulos/encabezado.php";
		include "modulos/verificar.php";
		include "modulos/footer.php";
	}else if($rutas[0] == "verificarProvider"){
		include "modulos/encabezado.php";
		include "modulos/verificarProvider.php";
		include "modulos/footer.php";
	}else if($rutas[0] == "payment"){
		include "modulos/encabezado.php";
		include "modulos/payment.php";
		include "modulos/footer.php";
	}else if($rutas[0] == "finally"){
		include "modulos/finally.php";
	}else if($rutas[0] == "close"){
		include "modulos/close.php";
	}else if($rutas[0] == "terms"){
		include "modulos/encabezado.php";
		include "modulos/terms.php";
		include "modulos/footer.php";
	}else if($rutas[0] == "signup"){
		include "modulos/encabezado.php";
		include "modulos/signup.php";
		include "modulos/footer.php";
	}else if($rutas[0] == "autorizacion"){
		include "modulos/encabezado.php";
		include "modulos/autorizacion.php";
		include "modulos/footer.php";
	}else{
		include "modulos/encabezado.php";
		include "modulos/error404.php";
		include "modulos/footer.php";
	}
	
}else{

	include "modulos/home.php";
	include "modulos/footer.php";
}
?>
<!--===============================================
=            Java script personalizado            =
================================================-->
<input type="hidden" value="<?php echo $url; ?>" id="rutaOculta">
<script src="<?php echo $url; ?>vistas/js/servicesProvider.js"></script>
<script src="<?php echo $url; ?>vistas/js/footer.js"></script>
<script src="<?php echo $url; ?>vistas/js/c2.js"></script>
<script src="<?php echo $url; ?>vistas/js/load_busqueda.js"></script>
<script src="<?php echo $url; ?>vistas/js/recipients.js"></script>
<script src="<?php echo $url; ?>vistas/js/checkout.js"></script>

<script src="<?php echo $url; ?>vistas/js/plantilla.js"></script>
<!--====  End of Java script personalizado  ====-->

</body>
</html>