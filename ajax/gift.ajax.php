<?php

require_once "../extensiones/paypal.controlador.php";

class AjaxPayment{

	/*=============================================
	MÉTODO PAYPAL
	=============================================*/	

	public $divisa;
	public $total;
	public $impuesto;
	public $subtotal;
	public $description;
	public $cantidad;
	public $item;
	public $idRecip;


	public function ajaxEnviarPaypal(){

		$datos = array(
			"divisa"=>$this->divisa,
			"total"=>$this->total,
			"impuesto"=>$this->impuesto,
			"subtotal"=>$this->subtotal,
			"description"=>$this->description,
			"cantidad"=>$this->cantidad,
			"item"=>$this->item,
			"idRecip"=>$this->idRecip,	
		);

		$respuesta = Paypal::mdlPagoPaypal($datos);

		echo $respuesta;

	}


}

/*=============================================
MÉTODO PAYPAL
=============================================*/	

if(isset($_POST["divisa"])){

	$paypal = new AjaxPayment(); 
	$paypal ->divisa = $_POST["divisa"]; 
	$paypal	->total = $_POST["total"]; 
	$paypal ->impuesto = $_POST["impuesto"];
	$paypal ->subtotal = $_POST["subtotal"]; 
	$paypal ->description =	$_POST["description"]; 
	$paypal ->cantidad = $_POST["cantidad"]; 
	$paypal ->item = $_POST["item"]; 
	$paypal ->idRecip = $_POST["idRecip"]; 
	$paypal -> ajaxEnviarPaypal();
}
