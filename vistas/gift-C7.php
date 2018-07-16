<!DOCTYPE html>
<html lang="es">
<head>
	<?php 
	$url = Ruta::ctrRuta(); 
	$servidor = Ruta::ctrRutaServidor();
	$social = ControladorPlantilla::ctrEstiloPlantilla();
	if (!isset($_GET["id"])) {
		echo '<script>
		window.location="'.$url.'";
		</script>';
	}else{
		$id=addslashes($_GET["id"]);

		$respuesta=ControladorRecipients::ctrMostrarRecipientOne($id);
		if ($respuesta) {
			echo "<meta name=\"keywords\" content=\"".$respuesta["bFname"].", ".$respuesta["bLname"]." \">"."\n";
			echo "<meta name=\"author\" content=\"Kikupal\">"."\n";
			echo "<title> Kukipal | ".$respuesta["bFname"]."-".$respuesta["bLname"]."</title>"."\n";

			echo "<!-- sample fb meta -->"."\n";
			echo "<meta property='og:title' content=\"".$respuesta["bFname"]."-".$respuesta["bLname"]."\" />"."\n";
			echo "<meta property='og:type' content='website' />"."\n";
			echo "<meta property='og:url' content='".$url."c7.php?id=".$respuesta["id_recipient"]."' />"."\n";
			echo "<meta property='og:image' content='".$url.$respuesta["bphoto"]."' />"."\n";
			echo "<meta property='og:description' content='".$respuesta["bdescription"]."'/>"."\n";
		}else{
			echo "<meta name='description' content=''>";
			echo "<meta name='keywords' content=''>";
			echo "<meta name='author' content='kikupal'>";
			echo "<title>Kikupal</title>";
		}
	}
	?>

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<link rel="icon" href="<?php echo $servidor.$social["icono"]?>" type="image/x-icon" />
	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo $servidor.$social["icono"]?>">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo $servidor.$social["icono"]?>">
	<link rel="manifest" href="<?php echo $url?>vistas/img/favicons/manifest.json">
	<link rel="mask-icon" href="<?php echo $url?>vistas/img/favicons/safari-pinned-tab.svg" color="#5bbad5">
	<title>Create Help Fund</title>

	<title>Create Help Fund</title>

	
	<!--=====================================
	=            Puglings de css            =
	======================================-->

	<link rel="stylesheet" href="<?php echo $url; ?>vistas/css/plugins/bootstrap.min.css">

	<link rel="stylesheet" href="<?php echo $url; ?>vistas/css/plugins/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo $url; ?>vistas/css/plugins/animate.css">

	<link rel="stylesheet" href="<?php echo $url; ?>vistas/css/plugins/rrssb.css">

	<link rel="stylesheet" href="<?php echo $url; ?>vistas/css/plugins/print.css" media="print" />
	<link href="https://fonts.googleapis.com/css?family=PT+Sans" rel="stylesheet">



	<!--====  End of Puglings de css  ====-->

	<!--======================================================
	=            Hojas de estilo personalizadas            =
	======================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo $url; ?>vistas/css/encabezado.css">	
	<link rel="stylesheet" type="text/css" href="<?php echo $url; ?>vistas/css/giftC7.css">	
	<link rel="stylesheet" href="<?php echo $url; ?>vistas/css/footer.css">

	<!--=====  End of Hojas de estilo personalizadas  ======-->

	<!--======================================================
	=            Plugins de java script            =
	======================================================-->

	<script src="<?php echo $url; ?>vistas/js/plugins/jquery.min.js"></script>

	<script src="<?php echo $url; ?>vistas/js/plugins/bootstrap.min.js"></script>

	<script src="<?php echo $url; ?>vistas/js/plugins/jquery.easing.js"></script>
	<!--=====  End of Plugins de java script  ======-->
</head>

<body>
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) return;
		js = d.createElement(s); js.id = id;
		js.src = 'https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.12&appId=217066325510400&autoLogAppEvents=1';
		fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>

	<?php
/*=============================================
Principal C2
=============================================*/

include "modulos/encabezado.php";
include "modulos/giftC7.php";
include "modulos/footer.php";
?>
<!--===============================================
=            Java script personalizado            =
================================================-->
<input type="hidden" value="<?php echo $url; ?>" id="rutaOculta">
<script src="<?php echo $url; ?>vistas/js/create.js"></script>
<script src="<?php echo $url; ?>vistas/js/footer.js"></script>
<script src="<?php echo $url; ?>vistas/js/load_busqueda.js"></script>
<script src="<?php echo $url; ?>vistas/js/plugins/rrssb.min.js"></script>
<script src="<?php echo $url; ?>vistas/js/plantilla.js"></script>
<!--====  End of Java script personalizado  ====-->

</body>
</html>

