<?php 
require_once "../controladores/servicesProvider.controlador.php";
require_once "../modelos/services.modelo.php";
require_once "../modelos/conexion.php";

class AjaxRecipients{

	/*=============================================
	VALIDAR EMAIL EXISTENTE
	=============================================*/	

	public $validarEmail;

	
	public function ajaxValidarEmail(){
		$datos = $this->validarEmail;
		$respuesta = ControladorServices::ctrMostrarProviderVerificado("email",$datos);
		echo json_encode($respuesta);
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
