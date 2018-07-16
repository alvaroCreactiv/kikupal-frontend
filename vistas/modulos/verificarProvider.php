<?php 

$item="emailEncriptado";
$valor =$rutas[1];
$usuarioVerificado=false;

$respuesta=ControladorServices::ctrMostrarProviderVerificado($item,$valor);

if ($valor==$respuesta["emailEncriptado"]) {
	$id=$respuesta["id"];
	$item2="verificado";
	$valor2=0;

	$respuesta2 =ControladorServices::ctrActualizarProvider($id, $item2, $valor2);

	if($respuesta2=="ok"){
		$usuarioVerificado=true;
	}
}


?>

<div class="container-fuid">
	
	<?php	
	if($usuarioVerificado){

		if (!empty($respuesta["bphoto"])) {
			$rutaFoto=$respuesta["bphoto"];
		}else{
			$rutaFoto="vistas/img/recipients/default/user.png";
		}


		?>
		<div class="row">
			<div class="jumbotron">
				<div class="container">

					<div class="text-muted">
						<p class="col-sm-12">Hello,<strong> <?php echo $respuesta["name"] ?>!</strong> You have created a service provider account. Please confirm yourself as the primary user of this account by completing the following form.</p>
					</div>


					<div class="col-sm-12">								
						<div class="gift">								<div class="row">
							<div class="titulo">
								<label>Services Provider Details</label>
							</div>		
						</div>
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">					
									<div class="form-gruoup">
										<span>Name:</span><br>				
									</div>
									<input type="text" class="form-control"  id="bfname" value="<?php echo $respuesta["name"] ?>" readonly >
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">					
									<div class="form-gruoup">
										<span>email:</span><br>			
									</div>
									<input type="text" class="form-control"  id="blname" value="<?php echo $respuesta["email"] ?>" readonly >
								</div>
							</div>
						</div>	


						<hr>
						<form class="form" method="POST" onsubmit="return actualizarProvider()">
							<div class="row">
								<div class="col-sm-6 col-xs-12">
									<div class="form-group">
										<span>Password:</span><br>								
										<input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
									</div>
								</div>
								<div class="col-sm-6 col-xs-12">
									<div class="form-group">
										<span>Confirm Password:</span><br>								
										<input type="password" class="form-control" name="confirmPassword" id="confirmPassword" placeholder="Confirm Password" required>
									</div>

								</div>
							</div>
						</div>									
						<hr>
						<div class="checkBox">
							<label>
								<input id="regPoliticas2" type="checkbox"/>
								<small>I agree to the<a data-toggle="modal" href="#modalTerminos"> Terms and Conditions and Privacy Policy</a>						
								</small>
							</label>
						</div>
						 <?php 
						$actProvi = new ControladorServices();
						$actProvi -> ctrActualizarProviderAll($id);	 ?>
						
						<div class="form-group">
							<div class="text-right">								
								<button type="submit" name="update" id="update" class="btn btn-primary btn-lg">Confirm and go to dashboard</button>

							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>			
<?php  }else{?>

	echo '<h3>Error</h3>

	<h2><small>Unable to verify email, re-register!</small></h2>

	<br>

	<a href="'.$url.'signup" data-toggle="modal"><button class="btn btn-default backColor btn-lg">TO REGISTER</button></a>


<?php } ?>



</div>