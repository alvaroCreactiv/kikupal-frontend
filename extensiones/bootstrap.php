<?php

require __DIR__  . '/vendor/autoload.php';


use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;

$tabla = "impuestos";

$respuesta = ModeloPayment::mdlMostrarTarifas($tabla);

$clientIdPaypal = $respuesta["clientIdPaypal"];
$SecretPaypal = $respuesta["SecretPaypal"];
$modePaypal = $respuesta["ModePaypal"];

$apiContext = new ApiContext(
    
    new OAuthTokenCredential(
        
        $clientIdPaypal,
        $SecretPaypal
    
    )
);

 $apiContext->setConfig(
    array(
        'mode' => $modePaypal,
        'log.LogEnabled' => true,
        'log.FileName' => '../PayPal.log',
        'log.LogLevel' => 'DEBUG', 
        'http.CURLOPT_CONNECTTIMEOUT' => 30

    )
);
