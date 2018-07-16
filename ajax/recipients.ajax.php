<?php 
require_once "../controladores/beneficiarios.controlador.php";
require_once "../modelos/recipients.modelo.php";
require_once "../modelos/conexion.php";

class AjaxRecipients{

	/*=============================================
	VALIDAR EMAIL EXISTENTE
	=============================================*/	

	public $validarEmail;

	
	public function ajaxValidarEmail(){
		$datos = $this->validarEmail;
		$respuesta = ControladorRecipients::ctrMostrarRecipientVerificado("bemail",$datos);
		echo json_encode($respuesta);
	}



	/*=============================================
	REGISTRO CON FACEBOOK
	=============================================*/

	public $email;
	public $nombre;
	public $foto;

	public function ajaxRegistroFacebook(){

		$datos = array("nombre"=>$this->nombre,
			"email"=>$this->email,
			"foto"=>$this->foto,
			"password"=>"null",
			"modo"=>"facebook",
			"verificacion"=>0,
			"emailEncriptado"=>"null");

		$respuesta = ControladorRecipients::ctrRegistroRedesSociales($datos);
		echo $respuesta;

	}


}
/*=============================================
VALIDAR EMAIL EXISTENTE
=============================================*/	

if(isset($_POST["validarEmail"])){
	$valEmail = new AjaxRecipients();
	$valEmail -> validarEmail = $_POST["validarEmail"];
	$valEmail -> ajaxValidarEmail();
}

