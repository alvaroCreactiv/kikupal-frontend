<?php 
include_once "conexion.php";

class ModeloServices{



	/*==================================================
	=            Actualizar todo el usuario            =
	==================================================*/
	static public function mdlActualizarProviderAll($tabla,$id,$datos){
		$stmt=Conexion::conectar()->prepare("UPDATE $tabla SET  password=:password WHERE id =:id");
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

	/*==================================================
	=            Actualizar usuario verificado            =
	==================================================*/
	static public function mdlActualizarProviderVerificado($tabla,$id, $item2, $valor2){
		$stmt=Conexion::conectar()->prepare("UPDATE $tabla SET $item2=:$item2 WHERE id =:id");
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
	
	static public function mdlMostrarProviderVerificado($tabla,$item,$datos){
		$stmt=Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item =:$item");
		$stmt->bindParam(":".$item,$datos, PDO::PARAM_STR);
		$stmt->execute();
		return $stmt->fetch();
		$stmt->close();
		$stmt=null;
	}
	
	static public function mdlRegistroAdministrators($tabla2,$datos2){
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla2 (name, email, photo, profile,verificado,emailEncriptado) VALUES ( :name, :email, :photo,  :profile,:verificado,:emailEncriptado)");
		$stmt->bindParam(":name", $datos2["sername"], PDO::PARAM_STR);	
		$stmt->bindParam(":email", $datos2["seremail"], PDO::PARAM_STR);
		$stmt->bindParam(":profile", $datos2["provider"], PDO::PARAM_STR);
		$stmt->bindParam(":photo",  $datos2["photo"], PDO::PARAM_STR);		
		$stmt->bindParam(":verificado", $datos2["verificacion"], PDO::PARAM_INT);
		$stmt->bindParam(":emailEncriptado",  $datos2["emailEncriptado"], PDO::PARAM_STR);	
		if($stmt->execute()){

			return "ok";

		}else{

			return "error";

		}

		$stmt->close();
		$stmt = null;
	}

	static public function mdlRegistroProvider($tabla,$datos){
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (type, companyName, companyAddress, companyWebSite, contacName, phoneNumber,  email,  verificacion, emailEncriptado) VALUES (:type, :companyName, :companyAddress, :companyWebSite, :contacName, :phoneNumber, :email,  :verificacion, :emailEncriptado)");

		$stmt->bindParam(":type", $datos["type"], PDO::PARAM_STR);
		$stmt->bindParam(":companyName", $datos["sername"], PDO::PARAM_STR);
		$stmt->bindParam(":companyAddress", $datos["seraddress"], PDO::PARAM_STR);
		$stmt->bindParam(":companyWebSite", $datos["serwebsite"], PDO::PARAM_STR);
		$stmt->bindParam(":contacName", $datos["sercontact"], PDO::PARAM_STR);
		$stmt->bindParam(":phoneNumber", $datos["serphone"], PDO::PARAM_INT);	
		$stmt->bindParam(":email", $datos["seremail"], PDO::PARAM_STR);
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

	static public function mdlMostrarTypeService($tabla){
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
		$stmt -> execute();
		return $stmt -> fetchAll();		
		$stmt -> close();
		$stmt = null;
	}


	static public function mdlMostrarFulfillments($tabla,$id){
		if ($id!=null) {
			$stmt = Conexion::conectar()->prepare("SELECT scheduleservice.id, services.name, scheduleservice.fecha, scheduleservice.amount, provider.companyName,scheduleservice.rate, scheduleservice.comment FROM (($tabla LEFT OUTER JOIN services on scheduleservice.id_service=services.id_service) LEFT OUTER JOIN provider ON scheduleservice.id_provider=provider.id_provider) where id_recipient=$id and status=1");
			$stmt -> execute();
			return $stmt -> fetchAll();
		}
		$stmt -> close();
		$stmt = null;
	}


	static public function mdlMostrarScheduled($tabla,$id){
		if ($id!=null) {
			$stmt = Conexion::conectar()->prepare("SELECT services.name, scheduleservice.fecha, scheduleservice.hora, scheduleservice.amount, provider.companyName FROM (($tabla LEFT OUTER JOIN services on scheduleservice.id_service=services.id_service) LEFT OUTER JOIN provider ON scheduleservice.id_provider=provider.id_provider) where id_recipient=$id and status=0");
			$stmt -> execute();
			return $stmt -> fetchAll();
		}
		$stmt -> close();
		$stmt = null;
	}

	static public function mdlServices($tabla)	{

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY name ASC ");
		$stmt -> execute();
		return $stmt -> fetchall();
		$stmt -> close();
		$stmt = null;

	}
	static public function mdlServicesOne($tabla,$data)
	{

		$stmt = Conexion::conectar()->prepare("SELECT id_service FROM $tabla WHERE name= :name");
		$stmt->bindParam(":name", $data, PDO::PARAM_STR);
		$stmt -> execute();
		return $stmt -> fetch();
		$stmt -> close();
		$stmt = null;

	}



	static public function mdlRegistrarServices($tabla,$datos){
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (
			id_service, id_recipient, fecha, hora, amount, id_provider, status, comment) VALUES (:id_service, :id_recipient, :fecha, :hora, :amount, :id_provider, :status, :comment)");

		$stmt->bindParam(":id_service", $datos["id_service"], PDO::PARAM_INT);
		$stmt->bindParam(":id_recipient", $datos["idRecipient"], PDO::PARAM_INT);		
		$stmt->bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);
		$stmt->bindParam(":hora", $datos["hora"], PDO::PARAM_STR);	
		$stmt->bindParam(":amount", $datos["amount"], PDO::PARAM_INT);	
		$stmt->bindParam(":id_provider", $datos["provider"], PDO::PARAM_INT);	
		$stmt->bindParam(":status", $datos["status"], PDO::PARAM_INT);
		$stmt->bindParam(":comment", $datos["comment"], PDO::PARAM_STR);	

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";

		}

		$stmt->close();
		$stmt = null;

	}


	static public function mdlActualizarRating($tabla,$id,$item,$valor){
		$stmt=Conexion::conectar()->prepare("UPDATE $tabla SET $item=:$item WHERE id =:id");
		$stmt->bindParam(":".$item,$valor, PDO::PARAM_INT);
		$stmt->bindParam(":id",$id, PDO::PARAM_INT);

		if ($stmt->execute()){
			return "ok";
		}else{
			return "error";
		}	
		$stmt->close();
		$stmt=null;
	}

}