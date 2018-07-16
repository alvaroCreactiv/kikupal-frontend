<?php 

require_once "conexion.php";

class ModeloContributor{
	
	static public function mdlRegistroContributor($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(cFname, cLname, cemail, cphone, visible) VALUES (:cFName, :cLName,:cemail,:cphone,:visible)");

		$stmt->bindParam(":cFName", $datos["cName"], PDO::PARAM_STR);
		$stmt->bindParam(":cLName", $datos["lName"], PDO::PARAM_STR);
		$stmt->bindParam(":cemail", $datos["yEmail"], PDO::PARAM_STR);
		$stmt->bindParam(":cphone", $datos["pNumber"], PDO::PARAM_STR);
		$stmt->bindParam(":visible", $datos["visible"], PDO::PARAM_STR);
		
		if($stmt->execute()){
			return "OK";				
		}else{

			return "error";

		}

		$stmt->close();
		$stmt = null;

	}



	static public function mdlbuscarContributor($tabla,$search){
		$stmt = Conexion::conectar()->prepare("SELECT id_contributor FROM $tabla WHERE cFname=:cFname AND cLname=:cLname and cemail=:cemail");
		$stmt->bindParam(":cFname", $search["cName"], PDO::PARAM_STR);
		$stmt->bindParam(":cLname", $search["lName"], PDO::PARAM_STR);
		$stmt->bindParam(":cemail", $search["yEmail"], PDO::PARAM_STR);
		$stmt -> execute();
		return $stmt -> fetch();
		$stmt -> close();
		$stmt = null;
	}

	static public function mdlRegistroGift($tabla2,$datos2){
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla2 (id_contributor, id_recipient, kikupoints, payment, note) VALUES (:id_contributor, :id_recipient, :kikupoints, :payment, :note)");

		$stmt->bindParam(":id_contributor", $datos2["id_contributor"], PDO::PARAM_INT);
		$stmt->bindParam(":id_recipient", $datos2["id_recipient"], PDO::PARAM_INT);
		$stmt->bindParam(":kikupoints", $datos2["kikupoint"], PDO::PARAM_INT);
		$stmt->bindParam(":payment", $datos2["pago"], PDO::PARAM_STR);
		$stmt->bindParam(":note", $datos2["note"], PDO::PARAM_STR);	
		if($stmt->execute()){

			return "ok";

		}else{

			return "error";

		}

		$stmt->close();
		$stmt = null;
	}

}