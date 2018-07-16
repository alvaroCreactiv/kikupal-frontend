<?php 
require_once "controladores/beneficiarios.controlador.php";
require_once "controladores/gift.controladorC7.php";
require_once "controladores/plantilla.controlador.php";

	require_once "modelos/plantilla.modelo.php";
require_once "modelos/rutas.php";
require_once "modelos/recipients.modelo.php";
require_once "modelos/conexion.php";
$donador = new ControladorGiftC7();
$donador -> giftC7();
