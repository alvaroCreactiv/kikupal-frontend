<div class="container-fluid">

	<div class="container">
		<h2 class="text-center">MAKE PAYMENT</h2>
		<div class="panel panel-default">
			
			<!--=====================================
			CABECERA 
			======================================-->

			<div class="contenidoCheckout">
				<div class="formaPago row">

					 <h4 class="text-center well text-muted text-uppercase">Payment method</h4> 

					<figure class="col-xs-12">

						<center>

							<!-- <input id="checkPaypal" type="radio" name="pago" value="paypal" checked> -->



							<img src="<?php echo $url; ?>vistas/img/plantilla/paypal.jpg" class="img-thumbnail">	
						</center>		

					</figure>

				</div>

				<br>

				<div class="listaGifts row">

					<h4 class="text-center well text-muted text-uppercase">Gift of help</h4>

					<table class="table table-striped tableGifts">

						<thead>

							<tr>		
								<th>CONCEPT</th>
								<th>AMOUNT</th>
								<th>SUBTOTAL</th>
							</tr>

						</thead>

						<tbody>



						</tbody>

					</table>

					<div class="col-sm-6 col-xs-12 pull-right">

						<table class="table table-striped tablaTasas">

							<tbody>

								<tr>
									<td>Subtotal</td>	
									<td><span class="">USD</span> $<span class="valorSubtotal" valor="0">0</span></td>	
								</tr>
								<?php $impuestos= ControladorImpuesto::ctrMostrarImpuestos();							
								foreach ($impuestos as $key => $value) {
									echo '<input type="hidden" id="TasaImpuestoPaypal" value="'.$value["impuesto"].'">';
									echo '<tr>
									<td>'.$value["nombre"].'</td>	
									<td><span class="">USD</span> $<span class="valorTotalImpuesto" valor="0">'.$value["impuesto"].'</span></td>	
									</tr>';

								}

								?>
								<tr>
									<td><strong>Total</strong></td>	
									<td><strong><span class="">USD</span> $<span class="valorTotalGift" valor="0">0</span></strong></td>	
								</tr>

							</tbody>	

						</table>

					</div>

					<div class="clearfix"></div>


				</div>

			</div>

			<!--=====================================
			BOTÓN CHECKOUT
			======================================-->

			<div class="panel-heading cabeceraCheckout">

			</div>
		</div>

	</div>

</div>

<!--=====================================
MODAL CHECKOUT
======================================-->

<div id="modalCheckout" class="modal fade modalFormulario" role="dialog">

	<div class="modal-content modal-dialog">

		<div class="modal-body modalTitulo">

			<h3>MAKE PAYMENT</h3>

			<button type="button" class="close" data-dismiss="modal">&times;</button>

			<div class="contenidoCheckout">
				<div class="formaPago row">

					<h4 class="text-center well text-muted text-uppercase">Choose the Payment method</h4>

					<figure class="col-xs-6">

						<center>

							<input id="checkPaypal" type="radio" name="pago" value="paypal" checked>

						</center>	

						<img src="<?php echo $url; ?>vistas/img/plantilla/paypal.jpg" class="img-thumbnail">		

					</figure>

					<figure class="col-xs-6">

						<center>

							<input id="checkDwolla" type="radio" name="pago" value="dwolla">

						</center>

						<img src="<?php echo $url; ?>vistas/img/plantilla/dwollalogo.png" class="img-thumbnail">

					</figure>

				</div>

				<br>

				<div class="listaGifts row">

					<h4 class="text-center well text-muted text-uppercase">Gift of help</h4>

					<table class="table table-striped tableGifts">

						<thead>

							<tr>		
								<th>CONCEPT</th>
								<th>AMOUNT</th>
								<th>SUBTOTAL</th>
							</tr>

						</thead>

						<tbody>



						</tbody>

					</table>

					<div class="col-sm-6 col-xs-12 pull-right">

						<table class="table table-striped tablaTasas">

							<tbody>

								<tr>
									<td>Subtotal</td>	
									<td><span class="">USD</span> $<span class="valorSubtotal" valor="0">0</span></td>	
								</tr>
								<?php $impuestos= ControladorImpuesto::ctrMostrarImpuestos();							
								foreach ($impuestos as $key => $value) {
									echo '<input type="hidden" id="TasaImpuestoPaypal" value="'.$value["impuesto"].'">';
									echo '<tr>
									<td>'.$value["nombre"].'</td>	
									<td><span class="">USD</span> $<span class="valorTotalImpuesto" valor="0">'.$value["impuesto"].'</span></td>	
									</tr>';
									
									# code...
								}

								?>
								<tr>
									<td><strong>Total</strong></td>	
									<td><strong><span class="">USD</span> $<span class="valorTotalGift" valor="0">0</span></strong></td>	
								</tr>

							</tbody>	

						</table>

					</div>

					<div class="clearfix"></div>
					
					<button class="btn btn-block btn-lg btn-default backColor btnPagar">SEND</button>

				</div>

			</div>

		</div>

		<div class="modal-footer">

		</div>

	</div>

</div>