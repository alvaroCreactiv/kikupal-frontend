<?php

class ControladorPanel{	
	/*=============================================
	LLAMAMOS LA PLANTILLA
	=============================================*/
	public function login(){
		include "vistas/log.php";
	}

	public function panel(){
		include "vistas/cpanel.php";
	}
	public function panelSetting(){
		include "vistas/cpanelSetting.php";
	}
	public function panelContributions(){
		include "vistas/cpanelContributions.php";
	}
	public function panelConfig(){
		include "vistas/cpanelConfig.php";
	}

	public function panelFulfillments(){
		include "vistas/cpanelFulfillments.php";
	}
	public function panelScheduling(){
		include "vistas/cpanelScheduling.php";
	}
	static public function ctrMostrargifts($id){
		$tabla="gifts";
		$respuesta=ModeloGifts::mdlModeloGifts($tabla,$id);
		return $respuesta;
	}
	static public function ctrMostrarTotal($id){
		$tabla="gifts";
		$campo="kikupoints";
		$sum=0;
		
		$respuesta=ModeloGifts::mdlMostrarTotal($tabla,$campo,$id);
		foreach ($respuesta as $key => $value) {	
			$sum=$sum+$value["kikupoints"];
		}

		$tabla1="scheduleservice";
		$campo1="amount";
		$sum1=0;

		$respuesta2=ModeloGifts::mdlTotalServices($tabla1,$campo1,$id);
		foreach ($respuesta2 as $key => $value) {	
			$sum1=$sum1+$value["amount"];
		}
		if ($sum>=$sum1) {
			return $sum-$sum1;
		}else{
			return "false";
		}

	}

	
}