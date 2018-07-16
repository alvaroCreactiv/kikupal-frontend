<?php 
$respuesta=ControladorRecipients::ctrMostrarRecipients(null);

?>

<div class="progres"></div>
<div class="container-fluid fondo">	

	<div class="container">
		<div class="row well well-sm">
			<div class="col-xs-12 text-center">
				<h1><small>Send the gift of help</small></h1>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div id="testimonial-slider" class="owl-carousel">
					<?php  
					foreach ($respuesta as $key => $value) {
						if (!empty($value["bphoto"])) {
							$ruta=$value["bphoto"];
						}else{
							$ruta="vistas/img/recipients/user.png";
						}
						echo '
						<div class="testimonial">
						<p class="description">
						'.$value["bdescription"].'
						</p>
						<div class="testimonial-content">
						<div class="pic">
						<img src="'.$url.$ruta.'">
						</div>
						<h3 class="title">'.$value["bFname"].' '.$value["bLname"].'</h3>
						<div class="tBtn">
						<a class="btn btn-warning" href="c3.php?id='.$value["id_recipient"].' " role="button">Send a gift</a>
						</div>
						</div>
						</div>
						';
					}?>
				</div>
			</div>
		</div>
		<div class="row banner text-center">
			<div class="col-sm-12">
				<h1>LIFE IS FOUND IN GIVING</h1>
				<?php 
				echo '<a href="'.$url.'recipients.php"><button type="button" class="btn btn-lg btn-primary">To resgiter</button></a>'; ?>
				<p></p>
			</div>
		</div>
	</div>
</div>
