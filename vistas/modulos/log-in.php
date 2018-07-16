<?php 
$url=Ruta::ctrRuta();
?>
<div class="container-fluid fondo">
	<div class="jumbotron">
		<div class="modalFormulario">

			<h3>LOGIN</h3>

			<!--=====================================
			INGRESO FACEBOOK
			======================================-->	

			<!--=====================================
			INGRESO DIRECTO
			======================================-->

			<form method="post">
				
				
				<div class="form-group">
					
					<div class="input-group">
						
						<span class="input-group-addon">
							
							<i class="glyphicon glyphicon-envelope"></i>

						</span>

						<input type="email" class="form-control" id="ingEmail" name="ingEmail" placeholder="Email" required>

					</div>

				</div>

				<div class="form-group">
					
					<div class="input-group">
						
						<span class="input-group-addon">
							
							<i class="glyphicon glyphicon-lock"></i>

						</span>

						<input type="password" class="form-control" id="ingPassword" name="ingPassword" placeholder="Password" required>

					</div>

				</div>
				<?php 
				$ingreso= new ControladorRecipients();
				$ingreso->ctrIngresoRecipient();
				?>

				<input type="submit" class="btn btn-default backColor btn-block btnIngreso" value="SEND">	

				<br>

				<center>
					
					<a href="#modalPassword" data-dismiss="modal" data-toggle="modal">Forgot your password?</a>

				</center>

			</form>



			<div class="modal-footer">
				You don't have a registered account? | <strong><a href="<?php echo $url.'recipients.php'; ?>" >to register</a></strong>

			</div>
		</div>
	</div>
</div>
<!--=====================================
VENTANA MODAL PARA OLVIDO DE CONTRASEÑA
======================================-->

<div class="modal fade modalFormulario" id="modalPassword" role="dialog">

	<div class="modal-content modal-dialog">

		<div class="modal-body modalTitulo">

			<h3 >NEW PASSWORD REQUEST</h3>

			<button type="button" class="close" data-dismiss="modal">&times;</button>

			<!--=====================================
			OLVIDO CONTRASEÑA
			======================================-->

			<form method="post">

				<label class="text-muted">Write the email that you are registered with and there we will send you a new password:</label>

				<div class="form-group">
					
					<div class="input-group">
						
						<span class="input-group-addon">
							
							<i class="glyphicon glyphicon-envelope"></i>

						</span>

						<input type="email" class="form-control" id="passEmail" name="passEmail" placeholder="Email" required>

					</div>

				</div>	
				<?php 
				$password = new ControladorRecipients();
				$password -> ctrOlvidoPassword();
				?>

				<input type="submit" class="btn btn-default backColor btn-block" value="SEND">	

			</form>

		</div>

		<div class="modal-footer">

			You don't have a registered account? | <strong><a href="<?php echo $url.'recipients.php'; ?>">to register</a></strong>


		</div>
	</div>
</div>