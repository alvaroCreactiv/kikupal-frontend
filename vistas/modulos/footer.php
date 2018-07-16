<div class="container-fluid footer" id="foot">

	<div class="row">


			<!--=====================================
			REGISTRO
			======================================-->

			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 registro">
				
				<ul>
					
					<li><a href="terms">Terms and Conditions</a></li>					
					<li>|</li>
					<li><a href="resources">Resources</a></li>
					<li>|</li>
					<li><a href="signup">Sign up to be a provider</a></li>


				</ul>

			</div>	
			<!--=====================================
			SOCIAL
			======================================-->

			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 social">
				
				<ul>	
					<?php

					$social = ControladorPlantilla::ctrEstiloPlantilla();

					$jsonRedesSociales = json_decode($social["redesSociales"],true);	

					foreach ($jsonRedesSociales as $key => $value) {

						if($value["activo"] != 0){

							echo '<li>
							<a href="'.$value["url"].'" target="_blank">
							<i class="fa '.$value["red"].' '.$value["estilo"].' redSocial"></i>
							</a>
							</li>';

						}
					}

					?>
					

				</ul>

			</div>


		</div>	

	</div>
