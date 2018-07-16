<?php

class ControladorPayment{

	/*=============================================
	MOSTRAR TARIFAS
	=============================================*/

	public function ctrMostrarTarifas(){

		$tabla = "impuestos";

		$respuesta = ModeloPayment::mdlMostrarTarifas($tabla);

		return $respuesta;

	}	

	/*=============================================
	NUEVAS COMPRAS
	=============================================*/

	static public function ctrActualizarGift($datos){

		$tabla = "gifts";

		$respuesta = ModeloPayment::mdlActualizarGift($tabla, $datos);	

		return $respuesta;

	}


	static public function ctrBuscarGift(){
		$tabla = "gifts";

		$respuesta = ModeloPayment::mdlBuscarGift($tabla);	

		return $respuesta;
	}
}