<?php

require_once "controladores/beneficiarios.controlador.php";
require_once "controladores/principal.controlador.php";
require_once "controladores/panel.controlador.php";
require_once "controladores/impuestos.controlador.php";
require_once "controladores/plantilla.controlador.php";
require_once "controladores/servicesProvider.controlador.php";
require_once "controladores/payment.controlador.php";


require_once "modelos/payment.modelo.php";
require_once "modelos/panel.modelo.php";
require_once "modelos/recipients.modelo.php";
require_once "modelos/impuestos.modelo.php";
require_once "modelos/plantilla.modelo.php";
require_once "modelos/services.modelo.php";
require_once "modelos/rutas.php";
require_once "modelos/conexion.php";

require_once "extensiones/PHPMailer/PHPMailerAutoload.php";
require_once "extensiones/vendor/autoload.php";


$principal = new ControladorPrincipal();
$principal -> principal();