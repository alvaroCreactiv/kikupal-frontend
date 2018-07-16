<?php
ob_start();
session_start();

require_once "controladores/beneficiarios.controlador.php";
require_once "controladores/panel.controlador.php";
require_once "controladores/servicesProvider.controlador.php";

require_once "modelos/panel.modelo.php";
require_once "modelos/recipients.modelo.php";
require_once "modelos/rutas.php";
require_once "modelos/conexion.php";
require_once "modelos/services.modelo.php";

require_once "extensiones/PHPMailer/PHPMailerAutoload.php";

$cpanel = new ControladorPanel();
$cpanel -> panelConfig();