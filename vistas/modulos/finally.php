<?php 
$url = Ruta::ctrRuta();

#requerimos las credenciales de paypal
require "extensiones/bootstrap.php";

require_once "controladores/beneficiarios.controlador.php";

require_once "modelos/payment.modelo.php";

require_once "modelos/recipients.modelo.php";

require_once "extensiones/PHPMailer/PHPMailerAutoload.php";

#importamos librería del SDK
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;

/*=============================================
PAGO PAYPAL
=============================================*/

#evaluamos si la compra está aprobada
if(isset( $_GET['paypal']) && $_GET['paypal'] === 'true'){

   #recibo los productos comprados
   $recip = $_GET['recipient'];   

   #capturamos el Id del pago que arroja Paypal
   $paymentId = $_GET['paymentId'];

   #Creamos un objeto de Payment para confirmar que las credenciales si tengan el Id de pago resuelto
   $payment = Payment::get($paymentId, $apiContext);

   #creamos la ejecución de pago, invocando la clase PaymentExecution() y extraemos el id del pagador
   $execution = new PaymentExecution();
   $execution->setPayerId($_GET['PayerID']);

   #validamos con las credenciales que el id del pagador si coincida
   $payment->execute($execution, $apiContext);
   $datosTransaccion = $payment->toJSON();

   $datosUsuario = json_decode($datosTransaccion);

   $emailComprador = $datosUsuario->payer->payer_info->email;
   $dir = $datosUsuario->payer->payer_info->shipping_address->line1;
   $ciudad = $datosUsuario->payer->payer_info->shipping_address->city;
   $estado = $datosUsuario->payer->payer_info->shipping_address->state;
   $codigoPostal = $datosUsuario->payer->payer_info->shipping_address->postal_code;
   $pais = $datosUsuario->payer->payer_info->shipping_address->country_code;
   $direccion = $dir.", ".$ciudad.", ".$estado.", ".$codigoPostal;


   $respuesta=ControladorPayment::ctrBuscarGift();

   $datos = array("idGift"=> $respuesta["id"],
      "id_recipient"=>$recip,
      "payment"=>"paypal",
      "status"=>1
   );


   $respuesta1 = ControladorPayment::ctrActualizarGift($datos);

   if($respuesta1 == "ok"){

      $recipient = ControladorRecipients::ctrMostrarRecipientOne($recip);
      /*==========================================================
      =            verificacion de correo electronico            =
      ==========================================================*/

      date_default_timezone_get("America/Mexico_City");
      $mail = new PHPMailer;
      $mail->CharSet = 'UTF-8';

      $mail->isMail();
      $mail->setFrom('info@kikupal.com','Kikupal.com');          
      $mail->Subject="Gift Confirmation Email";
      $mail->addAddress($recipient["bemail"] , $recipient["bFname"]);
      $mail->addAddress('jepetolim@gmail.com', 'Person One');
      $mail->msgHTML('<div style="width:100%; background:#eee; position:relative; font-family:sans-serif; padding-bottom:40px">

         <center>

         <img style="padding:20px; width:30%" src="http://www.kikupal.com/img/logo-kikupal-hz.png">

         </center>

         <div style="position:relative; margin:auto; width:65%; background:white; padding:20px">

         <center>

         <img style="padding:20px; width:15%" src="'.$url.'vistas/img/icons/coins.png">

         <h3 style="font-weight:100; color:#999">Gift Confirmation Email </h3>

         <hr style="border:1px solid #ccc; width:80%">

         <h4 style="font-weight:100; color:#999; padding:0 20px"><strong>'.$recipient["bFname"].'</strong> has received your gift</h4>

         <a href="'.$url.'" target="_blank" style="text-decoration:none">

         <div style="line-height:60px; background:#0aa; width:60%; color:white">Go back to the site</div>

         </a>


         <br>

         <hr style="border:1px solid #ccc; width:80%">

         <h5 style="font-weight:100; color:#999">If you are not enrolled in this account, you can ignore this email and the account will be deleted.</h5>

         </center>

         </div>

         </div>');

      $envio =$mail->send();

      if($envio){

         echo '<script>

         localStorage.removeItem("listagift");
         localStorage.removeItem("rutaActual");
         localStorage.removeItem("total");
         window.location = "'.$url.'c7.php?id='.$recip.'";

         </script>';
      }

   }

}