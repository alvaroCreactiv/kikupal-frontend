<?php 
/**
* 
*/
include_once "conexion.php";
class ModeloImpuestos 
{
	
	static public function mdlMostrarImpuestos($tabla){
		$stmt=Conexion::conectar()->prepare("SELECT * FROM $tabla");	
		$stmt->execute();
		return $stmt->fetchAll();
		$stmt->close();
		$stmt=null;
	}
}