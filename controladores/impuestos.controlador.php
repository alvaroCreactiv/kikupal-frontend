<?php 
/**
* 
*/
class ControladorImpuesto 
{
	
	static public function ctrMostrarImpuestos(){
		$tabla="impuestos";
		$respuesta = ModeloImpuestos::mdlMostrarImpuestos($tabla);
		return $respuesta;
	}
}
