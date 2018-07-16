<?php

require_once "conexion.php";

class ModeloPayment{


	static public function mdlBuscarGift($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT id FROM $tabla ORDER BY fecha DESC LIMIT 1");

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();

		$tmt =null;
	}

	/*=============================================
	MOSTRAR TARIFAS
	=============================================*/

	static public function mdlMostrarTarifas($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();

		$tmt =null;

	}

	/*=============================================
	ACTUALIZAR LA DONACION ACTIVO
	=============================================*/

	static public function mdlActualizarGift($tabla, $datos){

		$stmt=Conexion::conectar()->prepare("UPDATE $tabla SET payment=:payment , status=:status WHERE id =:id  AND id_recipient=:id_recipient");
		$stmt->bindParam(":id",$datos["idGift"], PDO::PARAM_INT);
		$stmt->bindParam(":id_recipient",$datos["id_recipient"], PDO::PARAM_INT);
		$stmt->bindParam(":payment",$datos["payment"], PDO::PARAM_STR);
		$stmt->bindParam(":status",$datos["status"], PDO::PARAM_INT);

		if ($stmt->execute()){
			return "ok";
		}else{
			return "error";
		}	
		$stmt->close();
		$stmt=null;
	}

}