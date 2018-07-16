<?php 
$id=addslashes($_GET["id"]);
$respuesta=ControladorRecipients::ctrMostrarRecipientOne($id);

$total=ControladorPanel::ctrMostrarTotal();
$sum=0;
foreach ($total as $key => $value) {	
	$sum=$sum+$value["kikupoints"];
}

?>	
<div class="container-fluid fondo">
	<div class="jumbotron">
		<div class="container">	
			<div class="row">
				<div class="col-sm-6">
					
					<h1><?php echo ''.$respuesta["bFname"].' '.$respuesta["bLname"].'';?>'s Help Fund</h1>
					
				</div>
				<div class="col-sm-3">
					<figure>	
						<?php 	
						echo '<img class="img-circle circulo" src="'.$url.$respuesta["bphoto"].'">';
						?>
					</figure>
				</div>
				<div class="col-sm-3">
					<input type="button" class="btn btn-primary" value="Configuration"/>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<h1 class="text-center">KIKUPoints Balance: <?php echo $sum; ?> </h1>
				</div>				
			</div>
			<div class="row funds">
				<div class="col-sm-12">
					<ul class="nav nav-tabs nav-justified">
						<li class="nav-item">
							<a class="nav-link active" data-toggle="tab" href="#panel1" role="tab">Contributions</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#panel2" role="tab">Fulfillments</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#panel3" role="tab">Scheduling</a>
						</li>
					</ul>
					<!-- Tab panels -->
					<div class="tab-content ">
						<!--Panel 1-->
						<div class="tab-pane fade in active" id="panel1" role="tabpanel">
							<br>
							<div class="table-responsive"> 
								<table class="table table-striped">
									<thead>
										<tr>
											<th>Contributor</th>
											<th>Email</th>
											<th>Phone</th>
											<th>Amount</th>
											<th>Thanks</th>
										</tr>
									</thead>
									<tbody>

										<?php 									
										$gift=ControladorPanel::ctrMostrargifts($id);	
										if($gift!=null){
											foreach ($gift as $key => $value) {
												echo ' 
												<tr>
												<td>'.$value["cFname"].' '.$value["cLname"].'</td>
												<td>'.$value["cemail"].'</td>
												<td>'.$value["cphone"].'</td>
												<td>'.$value["kikupoints"].'</td>
												<td><a href="#">Send Thanks</a></td>
												</tr>
												';
											}

										}else{
											echo 'You do not have contribution yet';
										}
										?>								
									</tbody>
								</table>
							</div>
							<hr>               
							<ul class="pagination">
								<li><a href="#">1</a></li>
								<li><a href="#">2</a></li>
								<li><a href="#">3</a></li>							
							</ul>
						</div>
						<!--/.Panel 1-->
						<!--Panel 2-->
						<div class="tab-pane fade" id="panel2" role="tabpanel">
							<br>
							<div class="table-responsive"> 
								<table class="table table-striped">
									<thead>
										<tr>
											<th>Service</th>
											<th>Date</th>
											<th>Amount</th>
											<th>Provider</th>
											<th>Rating</th>
											<th>Notes</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>Lorem ipsum </td>
											<td>Lorem ipsum </td>
											<td>Lorem ipsum </td>
											<td>Lorem ipsum </td>
											<td>Lorem ipsum </td>
											<td><a href="#">See...</a></td>
										</tr>
										<tr>
											<td>Lorem ipsum </td>
											<td>Lorem ipsum </td>
											<td>Lorem ipsum </td>
											<td>Lorem ipsum </td>
											<td>Lorem ipsum </td>
											<td><a href="#">See...</a></td>
										</tr>
										<tr>
											<td>Lorem ipsum </td>
											<td>Lorem ipsum </td>
											<td>Lorem ipsum </td>
											<td>Lorem ipsum </td>
											<td>Lorem ipsum </td>
											<td><a href="#">See...</a></td>
										</tr>


									</tbody>
								</table>
							</div>
							<hr>               
							<ul class="pagination">
								<li><a href="#">1</a></li>
								<li><a href="#">2</a></li>
								<li><a href="#">3</a></li>							
							</ul>
						</div>
						<!--/.Panel 2-->
						<!--Panel 3-->
						<div class="tab-pane fade" id="panel3" role="tabpanel">
							<br>
							<div class="col-sm-12">
								<button class="btn btn-lg btn-primary">Scheduling New Services</button>
							</div>
							<div class="table-responsive"> 
								<table class="table table-striped">
									<thead>
										<tr>
											<th>Service</th>
											<th>Date</th>
											<th>Amount</th>
											<th>Provider</th>
											<th>Rating</th>
											<th>Notes</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>Lorem ipsum </td>
											<td>Lorem ipsum </td>
											<td>Lorem ipsum </td>
											<td>Lorem ipsum </td>
											<td>Lorem ipsum </td>
											<td><a href="#">See...</a></td>
										</tr>
										<tr>
											<td>Lorem ipsum </td>
											<td>Lorem ipsum </td>
											<td>Lorem ipsum </td>
											<td>Lorem ipsum </td>
											<td>Lorem ipsum </td>
											<td><a href="#">See...</a></td>
										</tr>
										<tr>
											<td>Lorem ipsum </td>
											<td>Lorem ipsum </td>
											<td>Lorem ipsum </td>
											<td>Lorem ipsum </td>
											<td>Lorem ipsum </td>
											<td><a href="#">See...</a></td>
										</tr>


									</tbody>
								</table>
							</div>
							<hr>               
							<ul class="pagination">
								<li><a href="#">1</a></li>
								<li><a href="#">2</a></li>
								<li><a href="#">3</a></li>							
							</ul>
						</div>
						<!--/.Panel 3-->
					</div>           

				</div>
			</div>
		</div>
	</div>
</div>

<?php echo'<script>$("nav-tabs a").click(function (e) {
	e.preventDefault()
	$(this).tab("show")
})</script>';	 ?>
	