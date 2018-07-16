<?php
require_once "../../modelos/rutas.php";
require_once "../../controladores/beneficiarios.controlador.php";
require_once "../../modelos/recipients.modelo.php";

$url = Ruta::ctrRuta();

if(isset($_POST["searchNav"])){

	$search=$_POST["searchNav"];

	echo "<h2 class='title'>Search: ".$search."</h2>";

	$categorias = ControladorRecipients::ctrMostrarRecipients($search);
	
	if($categorias!=null){
		echo "<div class='resSearchNav'>";
		foreach ($categorias as $key => $value) {
			echo " <ul class='list'>
			<li class='col-xs-12'>
			<div class='col-lg-2 col-md-3 col-sm-4 col-xs-12'>
			<figure>
			<a href='c3.php?id=".$value['id_recipient']."' target='_self'><img src='$url".$value["bphoto"]."' alt='".$value["bphoto"]."' class='img-responsive img-circle'></a>
			</figure>
			</div>
			<div class='col-lg-10 col-md-9 col-sm-8 col-xs-12'>
			<h1>
			<small>
			<strong>Name: </strong><a href='c3.php?id=".$value['id_recipient']."'>".$value["bFname"]." ".$value["bLname"]."</a>
			</small>
			</h1>
			<p class='text-muted'>
			<strong>Description:</strong> ".$value["bdescription"]."
			</p>
			<div class='tBtn'>
			<a class='btn btn-warning' href='".$url."c3.php?id=".$value['id_recipient']."' role='button'>Send a gift</a>
			</div>

			</div>									
			</li>
			</ul>" ;	
		}
		echo "</div'>";
	}else{
		echo "<p>No recipients found .</p>";
	}



}else{

	echo "<p>There is no data to process.</p>";

}




?>
