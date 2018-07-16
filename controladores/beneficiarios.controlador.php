<?php

class ControladorRecipients{

	static public function ctrSendThanks(){
		if(isset($_POST["thanks"])){
			$origen=$_POST["origen"];
			$destination=$_POST["destination"];
			$message=$_POST["message"];
			date_default_timezone_get("America/Mexico_City");
			$url=Ruta::ctrRuta();
			$mail = new PHPMailer;

			$mail->CharSet = 'UTF-8';

			$mail->isMail();
			$mail->setFrom($origen);				
			$mail->Subject="Check your email address";
			$mail->addAddress($destination);
			$mail->msgHTML('
				<div style="width:100%; background:#eee; position:relative; font-family:sans-serif; padding-bottom:40px">

				<center>

				<img style="padding:20px; width:30%" src="http://www.kikupal.com/img/logo-kikupal-hz.png">

				</center>

				<div style="position:relative; margin:auto; width:65%; background:white; padding:20px">

				<center>

				<img style="padding:20px; width:15%" src="http://tutorialesatualcance.com/tienda/icon-email.png">

				<h3 style="font-weight:100; color:#999">Thank You!</h3>

				<hr style="border:1px solid #ccc; width:80%">

				<h4 style="font-weight:100; color:#999; padding:0 20px">'.$message.'</h4>

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
					text:" problem has occurred sending the Verificaion!",
					tipo:"error",
					conformButtonText:"close",
					closOnConfirm: false
				},function(isConfirm){if(isConfirm){history.back();}}); </script>';
			}else{

				echo '<script> 

				swal({
					title:"THANK YOU E-MAIL",
					text:"thank you!",
					tipo:"success",
					conformButtonText:"close",
					closOnConfirm: false
				},function(isConfirm){if(isConfirm){window.location="";	}});</script>';

			}

		}

	}

	static public function recipients()
	{
		include "vistas/recipient.php";
	}

	static public function ctrMostrarRecipients($search){

		$tabla="recipient";
		$respuesta=ModeloRecipients::mdlMostrarRecipients($tabla,$search);
		return $respuesta;

	}
	static public function ctrMostrarRecipientOne($id){

		$tabla="recipient";
		$respuesta=ModeloRecipients::mdlMostrarRecipientOne($tabla,$id);
		return $respuesta;

	}
	/*==============================================
	=            registro de recipients            =
	==============================================*/
	public function ctrRegistroRecipient(){

		if(isset($_POST["send"])){

			if (preg_match('/^[a-zA-Z ]+$/', $_POST["fname"]) && preg_match('/^[a-zA-Z ]+$/', $_POST["lname"]) && preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["email"]) && preg_match('/^[0-9+() ]*$/', $_POST["phone"])) {


				$encriptarEmail=md5($_POST["email"]);
				$photo ="";

				$datos = array("fname"=>$_POST["fname"],
					"lname"=>$_POST["lname"],
					"email"=>$_POST["email"],
					"phone"=>$_POST["phone"],
					"description"=>$_POST["description"],
					"photo"	=> $photo,
					"modo"=> "directo",							
					"verificacion"=> 1,
					"emailEncriptado" => $encriptarEmail);

				$tabla="recipient";

				$respuesta = ModeloRecipients::mdlRegistroRecipient($tabla,$datos);	

				if ($respuesta=="ok") {


					
					if ((isset($_POST["optradio"])) && ($_POST["optradio"]=="No")) {
						$cita= $_POST["firstName"]." has created an account for you at Kikupal";
					}else{
						$cita= $_POST["firstName"]." has created an account on Kikupal";
					}

					$search=array("fname"=>$_POST["fname"],
						"lname"=>$_POST["lname"],
						"email"=>$_POST["email"]);
					$consul= ModeloRecipients::mdlbuscarRecipient($tabla,$search);	
					
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
					$mail->addAddress($_POST["email"]);
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
						
						<h4 style="font-weight:100; color:#999; padding:0 20px">'.$cita.' </h4>

						<a href="'.$url.'verificar/'.$encriptarEmail.'" target="_blank" style="text-decoration:none; border-radius:10px;">

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
							text:" problem has occurred sending the Verificaion '.$_POST["email"].$mail->ErrorInfo.'!",
							tipo:"error",
							conformButtonText:"close",
							closOnConfirm: false
						},function(isConfirm){if(isConfirm){history.back();}}); </script>';
					}else{

						echo '<script> 

						swal({
							title:"CONFIRM E-MAIL",
							text:"Account created, an e-mail was sent to ('.$_POST["email"].'), thank you!",
							tipo:"success",
							conformButtonText:"close",
							closOnConfirm: false
						},function(isConfirm){if(isConfirm){window.location="'.$url.'c3.php?id='.$consul["id_recipient"].'";	}});</script>';

					}
				}
			}else{
				echo '<script> 
				swal({
					title:"Error",
					text:"Failed to register the recipient",
					tipo:"error",
					conformButtonText:"Cerrar",
					closOnConfirm: false
				},function(isConfirm){if(isConfirm){history.back();	}}); </script>';
			}
		}
	}

	/*=====  End of registro de recipients  ======*/

	/*==============================================
	=            Mostrar Recipient verificado            =
	==============================================*/
	static public function ctrMostrarRecipientVerificado($item,$valor){
		$tabla="recipient";
		$respuesta=ModeloRecipients::mdlMostrarRecipientVerificado($tabla,$item,$valor);
		return $respuesta;
	}

	/*==============================================
	=            Actualizar Recipient verificado            =
	==============================================*/

	static public function ctrActualizarRecipient($id, $item2, $valor2){
		$tabla ="recipient";
		$respuesta=ModeloRecipients::mdlActualizarRecipientVerificado($tabla,$id, $item2, $valor2);
		return $respuesta;
	}

	/*==============================================
	=            Actualizar Recipient verificado            =
	==============================================*/


	static public function ctrActualizarRecipientAll($id){
		if (isset($_POST["update"])) {			

			if (preg_match('/^[a-zA-Z0-9]+$/', $_POST["password"]) && preg_match('/^[a-zA-Z0-9]+$/', $_POST["confirmPassword"])){
				$encriptarPass=md5($_POST["password"]);
				$photo ="";					

				$datos =array("address"=>$_POST["address"],
					"password"=>$encriptarPass,					
					"photo"	=> $photo);

				$tabla="recipient";
				$respuesta = ModeloRecipients::mdlActualizarRecipientAll($tabla,$id,$datos);
				if ($respuesta=="ok") {

					$url=Ruta::ctrRuta();
					echo '<script> 
					swal({
						title:"Recipient update",
						text:"Account has been successfully updated ",
						tipo:"success",
						conformButtonText:"ok",
						closOnConfirm: false
					},function(isConfirm){if(isConfirm){	window.location = "'.$url.'login.php";	}}); </script>';

				}			
			}else{
				echo '<script> 
				swal({
					title:"Error",
					text:"Failed to update recipient",
					tipo:"error",
					conformButtonText:"close",
					closOnConfirm: false
				},function(isConfirm){if(isConfirm){history.back();}}); </script>';
			}
		}

	}


	/*==============================================
	=            Ingreso de recipient            =
	==============================================*/
	static public function ctrIngresoRecipient(){

		if(isset($_POST["ingEmail"])){

			if (preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["ingEmail"]) && preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingPassword"])) {
				$encriptar=md5($_POST["ingPassword"]);
				$url=Ruta::ctrRuta();
				$tabla="recipient";
				$item="bemail";
				$valor=$_POST["ingEmail"];
				$respuesta=ModeloRecipients::mdlMostrarRecipientVerificado($tabla,$item,$valor);				
				if ($respuesta["bemail"] == $_POST["ingEmail"] && $respuesta["password"] == $encriptar) {
					if($respuesta["verificacion"] == 1){

						echo '<script> 
						swal({
							title:"You have not verified your email account",
							text:"The system could not be accessed",
							tipo:"error",
							conformButtonText:"close",
							closOnConfirm: false
							},
							function(isConfirm){
								if(isConfirm){
									history.back();
								}
								}); 
								</script>';
							}else{

								$_SESSION["validarSesion"]="ok";
								$_SESSION["id_recipient"]=$respuesta["id_recipient"];
								$_SESSION["bFname"]=$respuesta["bFname"];
								$_SESSION["bLname"]=$respuesta["bLname"];
								$_SESSION["bemail"]=$respuesta["bemail"];
								$_SESSION["bphone"]=$respuesta["bphone"];
								$_SESSION["bdescription"]=$respuesta["bdescription"];
								$_SESSION["bphoto"]=$respuesta["bphoto"];	
								$_SESSION["direccion"]=$respuesta["direccion"];
								$_SESSION["modo"]=$respuesta["modo"];
								$_SESSION["password"]=$respuesta["password"];


								echo '<script> 
								window.location = "'.$url.'panel.php";
								</script>';
							}

						}else{
							echo '<script> 
							swal({
								title:"Failed to access",
								text:"Mail and/or password incorrect. Please check again. ",
								tipo:"error",
								conformButtonText:"close",
								closOnConfirm: false
								},
								function(isConfirm){
									if(isConfirm){
										window.location =localStorage.getItem("rutaActual", rutaActual);
									}
									}); 
									</script>';
								}


							}else{
								echo '<script> 
								swal({
									title:"Error",
									text:"The system could not be accessed",
									tipo:"error",
									conformButtonText:"close",
									closOnConfirm: false
									},
									function(isConfirm){
										if(isConfirm){
											history.back();
										}
										}); 
										</script>';

									}

								}

							}

	/*==============================================
	=            Olvido contraseña             =
	==============================================*/
	static public function ctrOlvidoPassword(){
		if(isset($_POST["passEmail"])){
			if (preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["passEmail"])){

				function generarPassword($long){
					$key ="";
					$pattern="1234567890abcdefghijklmnopqrstuvwxyz";
					$max=strlen($pattern)-1;
					for ($i=0; $i < $long ; $i++) { 
						$key .= $pattern{mt_rand(0,$max)};
						
					}
					return $key;

				}
				$newPassword= generarPassword(11);
				$encriptar= md5($newPassword);
				$tabla="recipient";
				$item1="bemail";
				$valor1=$_POST["passEmail"];
				$respuesta1=ModeloRecipients::mdlMostrarRecipientVerificado($tabla,$item1,$valor1);
				if ($respuesta1) {
					$id=$respuesta1["id_recipient"];
					$item2="password";
					$valor2=$encriptar;

					$respuesta2=ModeloRecipients::mdlActualizarRecipientVerificado($tabla,$id, $item2, $valor2);
					if ($respuesta2=="ok") {
						/*=============================================
						CAMBIO DE CONTRASEÑA
						=============================================*/

						date_default_timezone_set("America/Mexico_City");

						$url = Ruta::ctrRuta();	

						$mail = new PHPMailer;

						$mail->CharSet = 'UTF-8';

						$mail->isMail();

						$mail->setFrom('info@kikupal.com','Kikupal.com');

						$mail->Subject="Temporary password request";

						$mail->addAddress($_POST["passEmail"]);

						$mail->msgHTML('<div style="width:100%; background:#eee; position:relative; font-family:sans-serif; padding-bottom:40px">

							<center>

							<img style="padding:20px; width:30%" src="http://www.kikupal.com/img/logo-kikupal-hz.png">

							</center>

							<div style="position:relative; margin:auto; width:600px; background:white; padding:20px">

							<center>

							<img style="padding:20px; width:15%" src="http://tutorialesatualcance.com/tienda/icon-pass.png">

							<h3 style="font-weight:100; color:#999">New Password Request</h3>

							<hr style="border:1px solid #ccc; width:80%">

							<h4 style="font-weight:100; color:#999; padding:0 20px"><strong>Your new password: </strong>'.$newPassword.'</h4>

							<a href="'.$url.'" target="_blank" style="text-decoration:none">

							<div style="line-height:60px; background:#0aa; width:60%; color:white">Go back to the site</div>

							</a>

							<br>

							<hr style="border:1px solid #ccc; width:80%">

							<h5 style="font-weight:100; color:#999">If you are not enrolled in this account, you can ignore this email and the account will be deleted.</h5>

							</center>

							</div>

							</div>');

						$envio = $mail->Send();

						if(!$envio){

							echo '<script> 

							swal({
								title: "ERROR!",
								text: "A problem has occurred sending password change to '.$_POST["passEmail"].$mail->ErrorInfo.'!",
								type:"error",
								confirmButtonText: "Close",
								closeOnConfirm: false
								},

								function(isConfirm){

									if(isConfirm){
										history.back();
									}
									});

									</script>';

								}else{

									echo '<script> 

									swal({
										title: "¡OK!",
										text: "Please check the Inbox or SPAM folder of your email '.$_POST["passEmail"].' for your password change!",
										type:"success",
										confirmButtonText: "Close",
										closeOnConfirm: false
										},

										function(isConfirm){

											if(isConfirm){
												history.back();
											}
											});

											</script>';

										}

									}

								}else{
									echo '<script> 
									swal({
										title:"Error",
										text:" Invalid email. Please correct.",
										tipo:"error",
										conformButtonText:"close",
										closOnConfirm: false
										},
										function(isConfirm){
											if(isConfirm){
												history.back();
											}
											}); 
											</script>';


										}



									}else{
										echo '<script> 
										swal({
											title:"Error",
											text:" Invalid email. Please correct.",
											tipo:"error",
											conformButtonText:"close",
											closOnConfirm: false
											},
											function(isConfirm){
												if(isConfirm){
													history.back();
												}
												}); 
												</script>';
											}

										}
									}

	/*=============================================
	REGISTRO CON REDES SOCIALES
	=============================================*/

	static public function ctrRegistroRedesSociales($datos){

		$tabla = "usuarios";
		$item = "email";
		$valor = $datos["email"];
		$emailRepetido = false;

		$respuesta0 = ModeloUsuarios::mdlMostrarRecipientVerificado($tabla, $item, $valor);

		if($respuesta0){

			if($respuesta0["modo"] != $datos["modo"]){

				echo '<script> 

				swal({
					title: "ERROR!",
					text: "El correo electrónico '.$datos["email"].', ya está registrado en el sistema con un método diferente!",
					type:"error",
					confirmButtonText: "Cerrar",
					closeOnConfirm: false
					},

					function(isConfirm){

						if(isConfirm){
							history.back();
						}
						});

						</script>';

						$emailRepetido = false;

					}

					$emailRepetido = true;

				}else{

					$respuesta1 = ModeloRecipients::mdlRegistroRecipient($tabla, $datos);

				}

				if($emailRepetido || $respuesta1 == "ok"){

					$respuesta2 = ModeloRecipients::mdlMostrarRecipientVerificado($tabla, $item, $valor);

					if($respuesta2["modo"] == "facebook"){

						session_start();

						$_SESSION["validarSesion"] = "ok";
						$_SESSION["id"] = $respuesta2["id_recipient"];
						$_SESSION["nombre"] = $respuesta2["bFname"];
						$_SESSION["foto"] = $respuesta2["bfoto"];
						$_SESSION["email"] = $respuesta2["bemail"];
						$_SESSION["password"] = $respuesta2["password"];
						$_SESSION["modo"] = $respuesta2["modo"];			

					}

				}
			}

	/*=============================================
	ACTUALIZAR PERFIL
	=============================================*/

	public function ctrActualizarPerfil(){

		if(isset($_POST["editarNombre"])){

			/*=============================================
			VALIDAR IMAGEN
			=============================================*/

			$ruta = "";

			if(isset($_FILES["datosImagen"]["tmp_name"])){

				/*=============================================
				PRIMERO PREGUNTAMOS SI EXISTE OTRA IMAGEN EN LA BD
				=============================================*/

				$directorio = "vistas/img/recipients/".$_POST["idRecipient"];
				
				if(!empty($_POST["fotoRecipient"])){

					unlink($_POST["fotoRecipient"]);

				}else{

					mkdir($directorio, 0755);

				}

				/*=============================================
				GUARDAMOS LA IMAGEN EN EL DIRECTORIO
				=============================================*/

				$aleatorio = mt_rand(100, 999);

				$ruta = "vistas/img/recipients/".$_POST["idRecipient"]."/".$aleatorio.".jpg";

				/*=============================================
				MOFICAMOS TAMAÑO DE LA FOTO
				=============================================*/

				list($ancho, $alto) = getimagesize($_FILES["datosImagen"]["tmp_name"]);

				$nuevoAncho = 500;
				$nuevoAlto = 500;

				$origen = imagecreatefromjpeg($_FILES["datosImagen"]["tmp_name"]);

				$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

				imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

				imagejpeg($destino, $ruta);

			}



			if($_POST["editarPassword"] == ""){

				$password = $_POST["passRecipient"];

			}else{

				$password = md5($_POST["editarPassword"]);

			}

			$datos = array("name" => $_POST["editarNombre"],
				"lname" => $_POST["editarLastname"],
				"phone" => $_POST["editarPhone"],
				"direccion" => $_POST["editarDireccion"],
				"description" => $_POST["editarDescription"],
				"password" => $password,
				"foto" => $ruta,
				"id" => $_POST["idRecipient"]);

			$tabla = "recipient";

			$respuesta = ModeloRecipients::mdlActualizarPerfil($tabla, $datos);

			if($respuesta == "ok"){

				$_SESSION["validarSesion"]="ok";
				$_SESSION["id_recipient"]=$datos["id"];
				$_SESSION["bFname"]=$datos["name"];
				$_SESSION["bLname"]=$datos["lname"];
				$_SESSION["bemail"]=$_POST["mailRecipient"];
				$_SESSION["bphone"]=$datos["phone"];
				$_SESSION["bdescription"]=$datos["description"];
				$_SESSION["bphoto"]=$datos["foto"];	
				$_SESSION["direccion"]=$datos["direccion"];
				$_SESSION["modo"]=$_POST["modoRecipient"];
				$_SESSION["password"]=$datos["password"];

				echo '<script> 

				swal({
					title: "DONE",
					text: "Your account has been updated!",
					type:"success",
					confirmButtonText: "Close",
					closeOnConfirm: false
					},

					function(isConfirm){

						if(isConfirm){
							history.back();
						}
						});

						</script>';


					}

				}

			}


	/*=============================================
	eliminar recipient
	=============================================*/
	public function ctrEliminarRecipient(){
		if (isset($_GET["id"])) {
			
			$tabla="recipient";
			$tabla1="gifts";

			$id=$_GET["id"];

			if($_GET["foto"] != ""){

				unlink($_GET["foto"]);
				rmdir('vistas/img/recipients/'.$_GET["id"]);

			}
			$respuesta = ModeloRecipients::mdlEliminarRecipient($tabla,$id);
			
			ModeloRecipients::mdlEliminarGift($tabla1,$id);
			
			if ($respuesta=="ok") {
				$url=Ruta::ctrRuta();
				echo '<script> 

				swal({
					title: "ACCOUNT DELETED !",
					text: "You must register again if you want to enter",
					type:"success",
					confirmButtonText: "Close",
					closeOnConfirm: false
					},

					function(isConfirm){

						if(isConfirm){
							window.location = "'.$url.'close";
						}
						});

						</script>';

					}
				}
			}

		}

