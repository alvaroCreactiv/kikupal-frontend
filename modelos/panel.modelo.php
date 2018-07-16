<?php 


class ModeloGifts {
	
	static public function mdlModeloGifts($tabla,$id){
		if ($id!=null) {
			$stmt = Conexion::conectar()->prepare("SELECT contributor.cFname, contributor.cLname, contributor.cemail, contributor.cphone, gifts.kikupoints, gifts.id, recipient.bemail FROM (($tabla INNER JOIN contributor on contributor.id_contributor=gifts.id_contributor) INNER JOIN recipient ON gifts.id_recipient=recipient.id_recipient) where recipient.id_recipient=$id");
			$stmt -> execute();
			return $stmt -> fetchAll();
		}
		$stmt -> close();
		$stmt = null;
	}

	static public function mdlMostrarTotal($tabla,$campo,$id){
		$stmt=Conexion::conectar()->prepare("SELECT $campo FROM $tabla WHERE id_recipient=:id" );
		$stmt->bindParam(":id", $id, PDO::PARAM_INT);
		$stmt -> execute();
		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;
	}

	static public function mdlTotalServices($tabla,$campo1,$id){
		$stmt=Conexion::conectar()->prepare("SELECT $campo1 FROM $tabla WHERE id_recipient=:id" );
		$stmt->bindParam(":id", $id, PDO::PARAM_INT);
		$stmt -> execute();
		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;
	}
	

	
}