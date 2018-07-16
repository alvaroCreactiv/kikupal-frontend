<?php 

$item="emailEncriptado";
$valor =$rutas[1];
$usuarioVerificado=false;

$respuesta=ControladorRecipients::ctrMostrarRecipientVerificado($item,$valor);

if ($valor==$respuesta["emailEncriptado"]) {
	$id=$respuesta["id_recipient"];
	$item2="verificacion";
	$valor2=0;

	$respuesta2 =ControladorRecipients::ctrActualizarRecipient($id, $item2, $valor2);

	if($respuesta2=="ok"){
		$usuarioVerificado=true;
	}
}


?>
<div class="progres"></div>
<div class="container-fuid fondo">
	
	<?php	
		if($usuarioVerificado){

			if (!empty($respuesta["bphoto"])) {
				$rutaFoto=$respuesta["bphoto"];
			}else{
				$rutaFoto="vistas/img/recipients/default/user.png";
			}


			echo '
					<div class="row">
						<div class="jumbotron">
							<div class="container">
								
									<div class="text-muted">
										<p class="col-sm-12">Hello,<strong> '.$respuesta["bFname"].' '.$respuesta["bLname"].'!</strong> You have created a help fund. Please confirm yourself as the primary recipient of this help fund by completing out the form below.</p>
									</div>
									
									<div class="row">
									<div class="col-sm-12 facebook">			
											<p>
												<i class="fa fa-facebook"></i>
												Sign up with Facebook
											</p>

									</div>
									</div>
									
									<div class="col-sm-12">								
										<div class="gift">								<div class="row">
												<div class="titulo">
													<label>Gift fund details</label>
												</div>		
											</div>
											<div class="row">
												<div class="col-sm-6">
													<div class="form-group">					
														<div class="form-gruoup">
															<span>Name:</span><br>				
														</div>
														<input type="text" class="form-control"  id="bfname" value="'.$respuesta["bFname"].'" readonly >
													</div>
												</div>
												<div class="col-sm-6">
													<div class="form-group">					
														<div class="form-gruoup">
															<span>Last Name:</span><br>			
														</div>
														<input type="text" class="form-control"  id="blname" value="'.$respuesta["bLname"].'" readonly >
													</div>
												</div>
											</div>	

											<div class="row">
												<div class="col-sm-6">
													<div class="form-group">					
														<div class="form-gruoup">
															<span>Email:</span><br>			
														</div>
														<input type="email" class="form-control"  id="bemail" value="'.$respuesta["bemail"].'" readonly >
													</div>
												</div>
												<div class="col-sm-6">
													<div class="form-group">
														<div class="form-gruoup">
															<span>Phone Number:</span><br>			
														</div>
														<input type="text" class="form-control"  id="bphone" value="'.$respuesta["bphone"].'" readonly >
													</div>
												</div>
											</div>

											<div class="row">
												<div class="col-sm-4 avatar">
													<div class="form-group">								
														<img id="image_upload_preview" src="'.$url.$rutaFoto.'" class="img-responsive img-circle circle" alt="your image">
													</div>											
												</div>
												<div class="col-sm-8">
													<div class="form-gruoup">
														<span>Description:</span><br>
														<small>(Optional)</small>
													</div>
													<div class="form-gruoup">
														<textarea class="form-control descripcion" id="bdescription" name="bdescription" rows="3" readonly>'.$respuesta["bdescription"].'</textarea>
													</div>

													
												</div>
											</div>
											<hr>
											<form class="form" method="POST" onsubmit="return actualizarRecipient()">
											<div class="row">
												<div class="col-sm-8 col-sm-offset-2">
													<div class="form-group">					
														<input type="text" class="form-control" name="address" id="address" placeholder="Address" required>
													</div>
												</div>
												<div class="col-sm-6 col-xs-12">
												<div class="form-group">							
														<input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
													</div>
												</div>
												<div class="col-sm-6 col-xs-12">
												<div class="form-group">							
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
				</div>';
									
									$actContri = new ControladorRecipients();
									$actContri -> ctrActualizarRecipientAll($id);										
									echo '
									<div class="form-group">
										<div class="text-right">								
											<button type="submit" name="update" id="update" class="btn btn-primary btn-lg">Confirm and go to dashboard</button>

										</div>
									</div>
								 </div>
								</form>
							</div>
						</div>
						</div>';			
		}else{

			echo '<h3>Error</h3>

			<h2><small>Unable to verify email, re-register!</small></h2>

			<br>

			<a href="#modalRegistro" data-toggle="modal"><button class="btn btn-default backColor btn-lg">TO REGISTER</button></a>';


		}

		?>


</div>