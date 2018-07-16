<?php 	

class ControladorServices {

	/*==============================================
	=            Actualizar Provider verificado            =
	==============================================*/
	static public function ctrActualizarProviderAll($id){
		if (isset($_POST["update"])) {			

			if (preg_match('/^[a-zA-Z0-9]+$/', $_POST["password"]) && preg_match('/^[a-zA-Z0-9]+$/', $_POST["confirmPassword"])){
				$encriptarPass=md5($_POST["password"]);
				$photo ="";					

				$datos =array("password"=>$encriptarPass);

				$tabla="administrators";
				$respuesta = ModeloServices::mdlActualizarProviderAll($tabla,$id,$datos);
				if ($respuesta=="ok") {

					$url=Ruta::ctrRuta();
					$servidor=Ruta::ctrRutaServidor();
					echo '<script> 
					swal({
						title:"Services Provider Update",
						text:"Account has been successfully updated ",
						tipo:"success",
						conformButtonText:"ok",
						closOnConfirm: false
					},function(isConfirm){if(isConfirm){	window.location = "'.$servidor.'";	}}); </script>';

				}			
			}else{
				echo '<script> 
				swal({
					title:"Error",
					text:"Failed to update Services Provider",
					tipo:"error",
					conformButtonText:"close",
					closOnConfirm: false
				},function(isConfirm){if(isConfirm){history.back();}}); </script>';
			}
		}

	}



	/*==============================================
	=            Actualizar Provider verificado            =
	==============================================*/

	static public function ctrActualizarProvider($id, $item2, $valor2){
		$tabla ="administrators";
		$respuesta=ModeloServices::mdlActualizarProviderVerificado($tabla,$id, $item2, $valor2);
		return $respuesta;
	}

	static public function ctrMostrarProviderVerificado($item,$datos){
		$tabla="administrators";
		$respuesta=ModeloServices::mdlMostrarProviderVerificado($tabla,$item,$datos);
		return $respuesta;
	}
	static public function ctrRegistroProvider(){

		if(isset($_POST["sername"])){

			if (preg_match('/^[a-zA-Z ]+$/', $_POST["sername"]) && preg_match('/^[a-zA-Z ]+$/', $_POST["sercontact"]) && preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["seremail"]) && preg_match('/^[0-9+() ]*$/', $_POST["serphone"])){


				$encriptarEmail=md5($_POST["seremail"]);				
				$photo =null;

				$datos =array("type"=>$_POST["type"],
					"sername"=>$_POST["sername"],
					"seraddress"=>$_POST["seraddress"],
					"serwebsite"=>$_POST["serwebsite"],
					"sercontact"=>$_POST["sercontact"],
					"serphone"	=> $_POST["serphone"],
					"seremail"=> $_POST["seremail"],	
					"verificacion"=> 1,
					"emailEncriptado" => $encriptarEmail);
				$tabla="provider";

				$tabla2="administrators";
				$datos2 =array("sername"=>$_POST["sername"],					
					"seremail"=> $_POST["seremail"],
					"serphoto"=>$photo,	
					"provider"=> "provider",			
					"verificacion"=> 1,
					"emailEncriptado" => $encriptarEmail);

				$respuesta = ModeloServices::mdlRegistroProvider($tabla,$datos);	
				$respuesta2 = ModeloServices::mdlRegistroAdministrators($tabla2,$datos2);	

				if ($respuesta=="ok" and $respuesta2=="ok") {

					/*==========================================================
					=            verificacion de correo electronico            =
					==========================================================*/
					
					date_default_timezone_get("America/Mexico_City");
					$url=Ruta::ctrRuta();
					$mail = new PHPMailer;

					$mail->CharSet = 'UTF-8';

					$mail->isMail();
					$mail->setFrom('info@kikupal.com','Kikupal.com');				
					$mail->Subject="Check your email address";
					$mail->addAddress($_POST["seremail"]);
					$mail->msgHTML('
						<div style="width:100%; background:#eee; position:relative; font-family:sans-serif; padding-bottom:40px">

						<center>

						<img style="padding:20px; width:30%" src="http://www.kikupal.com/img/logo-kikupal-hz.png">

						</center>

						<div style="position:relative; margin:auto; width:65%; background:white; padding:20px">

						<center>

						<img style="padding:20px; width:15%" src="http://tutorialesatualcance.com/tienda/icon-email.png">

						<h3 style="font-weight:100; color:#999">CHECK YOUR EMAIL ADDRESS</h3>

						<hr style="border:1px solid #ccc; width:80%">
						
						<h4 style="font-weight:100; color:#999; padding:0 20px"> Has created an account on Kikupal </h4>

						<a href="'.$url.'verificarProvider/'.$encriptarEmail.'" target="_blank" style="text-decoration:none; border-radius:10px;">

						<div style="line-height:60px; background:#0aa; width:60%; color:white">Please active you account</div>

						</a>

						<br>

						<hr style="border:1px solid #ccc; width:80%">

						<h5 style="font-weight:100; color:#999">If you are not enrolled in this account, you can ignore this email and the account will be deleted.</h5>

						</center>

						</div>

						</div>'
					);

					$envio =$mail->send();

					if(!$envio){
						echo '<script> 
						swal({
							title:"Error",
							text:" problem has occurred sending the Verificaion '.$_POST["sername"].$mail->ErrorInfo.'!",
							tipo:"error",
							conformButtonText:"close",
							closOnConfirm: false
						},function(isConfirm){if(isConfirm){history.back();}}); </script>';
					}else{

						echo '<script> 

						swal({
							title:"CONFIRM E-MAIL",
							text:"Account created, an e-mail was sent to ('.$_POST["seremail"].'), thank you!",
							tipo:"success",
							conformButtonText:"close",
							closOnConfirm: false
						},function(isConfirm){if(isConfirm){window.location="'.$url.'";	}});</script>';

					}

				}
			}
		}
	}
	static public function ctrMostrarTypeService(){
		$tabla="services";
		$respuesta=ModeloServices::mdlMostrarTypeService($tabla);
		return $respuesta;
	}
	static public function ctrMostrarFulfillments($id){
		$tabla="scheduleservice";
		$respuesta=ModeloServices::mdlMostrarFulfillments($tabla,$id);
		return $respuesta;
	}
	static public function ctrMostrarScheduled($id){
		$tabla="scheduleservice";
		$respuesta=ModeloServices::mdlMostrarScheduled($tabla,$id);
		return $respuesta;
	}
	static public function ctrServices(){
		$tabla="services";
		$respuesta=ModeloServices::mdlServices($tabla);
		return $respuesta;
	}
	static public function ctrActualizarRating(){
		if(isset($_POST["rates"])){
			$id=$_POST["idRate"];	
			$item = "rate";
			$valor=$_POST["rates"];
			$tabla="scheduleservice";
			$respuesta = ModeloServices::mdlActualizarRating($tabla,$id,$item,$valor);	

			if ($respuesta=="ok") 
			{
				echo'<script>
				swal(
				{
					title:"DONE!",
					text:"Rating Assign",
					tipo:"success",
					conformButtonText:"close",
					closOnConfirm: false
				},function(isConfirm){if (isConfirm) {history.back();} });</script>';
			}
		}
	}

	static public function ctrRegisterService(){

		if(isset($_POST["estimated"])){

			$url=Ruta::ctrRuta();
			$tab="services";
			$data="Yard Care";
			$serv = ModeloServices::mdlServicesOne($tab,$data);			
			$provider=0;
			$datos =array("id_service"=>$serv["id_service"],
				"idRecipient"=>$_POST["idRecipient"],				
				"fecha"=>$_POST["fecha"],
				"hora"=>$_POST["hora"],
				"amount"=>$_POST["estimated"],
				"provider"=>$provider,
				"status"=>0,		
				"comment"=>$_POST["comment"]
			);

			$tabla="scheduleservice";

			$respuesta = ModeloServices::mdlRegistrarServices($tabla,$datos);	

			if ($respuesta=="ok"){

				$recipient=ControladorRecipients::ctrMostrarRecipientOne($_POST["idRecipient"]);
				date_default_timezone_get("America/Mexico_City");
				$url=Ruta::ctrRuta();
				$mail = new PHPMailer;

				$mail->CharSet = 'UTF-8';

				$mail->isMail();
				$mail->setFrom($recipient["bemail"],'kikupal.com');				
				$mail->Subject="New service";
				$mail->addAddress('naomi@kikupal.com');
				$mail->msgHTML('
					<div style="width:100%; background:#eee; position:relative; font-family:sans-serif; padding-bottom:40px">

					<center>

					<img style="padding:20px; width:30%" src="http://www.kikupal.com/img/logo-kikupal-hz.png">

					</center>

					<div style="position:relative; margin:auto; width:65%; background:white; padding:20px">

					<center>

					<img style="padding:20px; width:15%" src="">

					<h3 style="font-weight:100; color:#999">SCHEDULE NEW SERVICE</h3>

					<hr style="border:1px solid #ccc; width:80%">

					<h4 style="font-weight:100; color:#999; padding:0 20px">Service Requested by: '.$recipient["bFname"].' '.$recipient["bLname"].'</h4> 
					<h4> Type of Service: Yard Care</h4>
					<div style="width:80%;" class="table-responsive">
					<table style="width: 100%; max-width: 100%; margin-bottom: 20px;">
					<thead style="margin-top: 20px" >
					<tr >
					<th>Areas of service</th>
					<th>Yard size</th>
					<th>Grass size</th>
					<th>Other</th>
					<th>Service date</th>
					<th>Service time </th>
					<th>Comments</th>
					</tr>
					</thead>
					<tbody>
					<tr style="margin-top: 20px" >
					<td style="text-align: center">'.$_POST["area1"].'</td>			
					<td style="text-align: center">'.$_POST["size1"].'</td>
					<td style="text-align: center">'.$_POST["grass1"].'</td>
					<td style="text-align: center">'.$_POST["other"].'</td>
					<td style="text-align: center">'.$_POST["fecha"].'</td>
					<td style="text-align: center">'.$_POST["hora"].'</td>
					<td style="text-align: center">'.$_POST["comment"].'</td>
					</tr>
					</tbody>
					</table>
					</div>

					<a  href="http://localhost/kikupal/login.php" target="_blank" style="text-decoration:none; border-radius:10px;">

					<div style="line-height:60px; background:#0aa; width:60%; color:white">Enter your dashboard</div>

					</a>

					<br>

					<hr style="border:1px solid #ccc; width:80%">

					<h5 style="font-weight:100; color:#999">If you are not enrolled in this account, you can ignore this email and the account will be deleted.</h5>

					</center>

					</div>

					</div>
					'
				);

				$envio =$mail->send();
				if(!$envio){

					echo '<script> 
					swal({
						title:"Error",
						text:"Failed to adde service ('.$mail->ErrorInfo.')",
						tipo:"error",
						conformButtonText:"close",
						closOnConfirm: false
					},function(isConfirm){if(isConfirm){window.location = "'.$url.'panel-configuration.php";}});</script>';
				}else{

					echo '<script> 
					swal({
						title:"Done",
						text:"Your service request has been sent",
						tipo:"success",
						conformButtonText:"ok",
						closOnConfirm: false
					},function(isConfirm){if(isConfirm){window.location = "'.$url.'panel.php";}}); </script>';	
				}
			}
		}
	}
}