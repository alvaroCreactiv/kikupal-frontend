<?php 
require_once "controladores/donador.controlador.php";
require_once "controladores/beneficiarios.controlador.php";
require_once "controladores/contributor.controlador.php";

require_once "modelos/contributor.modelo.php";
require_once "modelos/recipients.modelo.php";
require_once "modelos/rutas.php";

require_once "extensiones/PHPMailer/PHPMailerAutoload.php";

$donador = new ControladorDonadores();
$donador -> donadores();
