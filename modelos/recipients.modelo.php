<?php

require_once "conexion.php";

/**
Conexion con tabla beneficiarios
*/
class ModeloRecipients{
	
	static public function mdlMostrarRecipients($tabla,$search){		
		$search=urldecode($search);
		$search=strip_tags(html_entity_decode($search));
		if($search !=null){
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE (bFName LIKE '%$search%' or bLName LIKE '%$search%' or bemail LIKE '%$search%')  ORDER BY bFname ASC 
				LIMIT 5");			
			$stmt -> execute();
			return $stmt -> fetchAll();

		}else{
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY bFname ASC 
				LIMIT 10");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}
		$stmt -> close();
		$stmt = null;

	}

	static public function mdlMostrarRecipientOne($tabla,$id){
		$bus=$id;
		if($id !=null){
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla where id_recipient =:$bus");
			$stmt -> bindParam(":".$bus, $id, PDO::PARAM_INT);
			$stmt -> execute();
			return $stmt -> fetch();
		}
		$stmt -> close();
		$stmt = null;

	}

	static public function mdlbuscarRecipient($tabla,$search){
		$stmt = Conexion::conectar()->prepare("SELECT id_recipient FROM $tabla WHERE bFname=:bFname AND bLname=:bLname and bemail=:bemail");
		$stmt->bindParam(":bFname", $search["fname"], PDO::PARAM_STR);
		$stmt->bindParam(":bLname", $search["lname"], PDO::PARAM_STR);
		$stmt->bindParam(":bemail", $search["email"], PDO::PARAM_STR);
		$stmt -> execute();
		return $stmt -> fetch();
		$stmt -> close();
		$stmt = null;
	}

	
	static public function mdlRegistroRecipient($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (bFname, bLname, bemail, bphone, bdescription, bphoto,  modo, verificacion, emailEncriptado) VALUES (:bFname, :bLname, :bemail, :bphone, :bdescription, :bphoto, :modo, :verificacion, :emailEncriptado)");

		$stmt->bindParam(":bFname", $datos["fname"], PDO::PARAM_STR);
		$stmt->bindParam(":bLname", $datos["lname"], PDO::PARAM_STR);
		$stmt->bindParam(":bemail", $datos["email"], PDO::PARAM_STR);
		$stmt->bindParam(":bphone", $datos["phone"], PDO::PARAM_INT);
		$stmt->bindParam(":bdescription", $datos["description"], PDO::PARAM_STR);	
		$stmt->bindParam(":bphoto", $datos["photo"], PDO::PARAM_STR);	
		$stmt->bindParam(":modo", $datos["modo"], PDO::PARAM_STR);
		$stmt->bindParam(":verificacion", $datos["verificacion"], PDO::PARAM_INT);
		$stmt->bindParam(":emailEncriptado", $datos["emailEncriptado"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";

		}

		$stmt->close();
		$stmt = null;
	}


	/*==================================================
	=            mostrar usuario verificado            =
	==================================================*/
	static public function mdlMostrarRecipientVerificado($tabla,$item,$valor){
		$stmt=Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item =:$item");
		$stmt->bindParam(":".$item,$valor, PDO::PARAM_STR);
		$stmt->execute();
		return $stmt->fetch();
		$stmt->close();
		$stmt=null;
	}

	/*=====  End of mostrar usuario verificado  ======*/
	



	/*==================================================
	=            Actualizar usuario verificado            =
	==================================================*/
	static public function mdlActualizarRecipientVerificado($tabla,$id, $item2, $valor2){
		$stmt=Conexion::conectar()->prepare("UPDATE $tabla SET $item2=:$item2 WHERE id_recipient =:id");
		$stmt->bindParam(":".$item2,$valor2, PDO::PARAM_STR);
		$stmt->bindParam(":id",$id, PDO::PARAM_INT);

		if ($stmt->execute()){
			return "ok";
		}else{
			return "error";
		}	
		$stmt->close();
		$stmt=null;
	}

	/*=====  End of mostrar usuario verificado  ======*/


	/*==================================================
	=            Actualizar todo el usuario            =
	==================================================*/
	static public function mdlActualizarRecipientAll($tabla,$id,$datos){
		$stmt=Conexion::conectar()->prepare("UPDATE $tabla SET direccion=:direccion, password=:password WHERE id_recipient =:id");
		$stmt->bindParam(":direccion",$datos["address"], PDO::PARAM_STR);
		$stmt->bindParam(":password",$datos["password"], PDO::PARAM_STR);
		$stmt->bindParam(":id",$id, PDO::PARAM_INT);
		if ($stmt->execute()){
			return "ok";
		}else{
			return "error";
		}	
		$stmt->close();
		$stmt=null;
	}

	static public function mdlActualizarPerfil($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET bFname = :bFname, bLname = :bLname, bphone = :bphone, bdescription = :bdescription, bphoto = :bphoto, direccion= :direccion, password = :password WHERE id_recipient = :id");

		$stmt -> bindParam(":bFname", $datos["name"], PDO::PARAM_STR);
		$stmt -> bindParam(":bLname", $datos["lname"], PDO::PARAM_STR);
		$stmt -> bindParam(":bphone", $datos["phone"], PDO::PARAM_STR);
		$stmt -> bindParam(":bdescription", $datos["description"], PDO::PARAM_STR);
		$stmt -> bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);
		$stmt -> bindParam(":password", $datos["password"], PDO::PARAM_STR);
		$stmt -> bindParam(":bphoto", $datos["foto"], PDO::PARAM_STR);
		$stmt -> bindParam(":id", $datos["id"], PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";

		}else{

			return "error";

		}

		$stmt-> close();

		$stmt = null;
	}

	/*=======================================
	=            elimunar cuenta            =
	=======================================*/
	static public function mdlEliminarRecipient($tabla,$id){
		$stmt=Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_recipient=:id");
		$stmt->bindParam(":id",$id, PDO::PARAM_INT);
		if($stmt -> execute()){

			return "ok";

		}else{

			return "error";

		}

		$stmt-> close();

		$stmt = null;
	}
	
	
	/*=====  End of elimunar cuenta  ======*/


	/*=======================================
	=            elimunar gift            =
	=======================================*/
	static public function mdlEliminarGift($tabla,$id){
		$stmt=Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_recipient=:id");
		$stmt->bindParam(":id",$id, PDO::PARAM_INT);
		if($stmt -> execute()){

			return "ok";

		}else{

			return "error";

		}

		$stmt-> close();

		$stmt = null;
	}
	
	
	/*=====  End of elimunar cuenta  ======*/
	

}