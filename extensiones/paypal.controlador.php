<?php

require_once "../modelos/rutas.php";
require_once "../modelos/payment.modelo.php";


use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;

class Paypal{

	static public function mdlPagoPaypal($datos){

        require __DIR__ . '/bootstrap.php';

        // ### Payer
        // A resource representing a Payer that funds a payment
        // For paypal account payments, set payment method
        // to 'paypal'.
        $payer = new Payer();
        $payer->setPaymentMethod("paypal");

      
        // ### Additional payment details
        // Use this optional field to set additional
        // payment information such as tax, shipping
        // charges etc.
        $details = new Details();
        $details->setTax($datos["impuesto"])
        ->setSubtotal($datos["subtotal"]);
        // ### Amount
        // Lets you specify a payment amount.
        // You can also specify additional details
        // such as shipping, tax.
        $amount = new Amount();
        $amount->setCurrency("USD")
        ->setTotal($datos["total"])
        ->setDetails($details);
        // ### Transaction
        // A transaction defines the contract of a
        // payment - what is the payment for and who
        // is fulfilling it. 
        $transaction = new Transaction();
        $transaction->setAmount($amount)  
        ->setDescription("KiKUPAL-".$datos["description"].' '.$datos["divisa"].' '.$datos["total"])
        ->setInvoiceNumber(uniqid());
        // ### Redirect urls
        // Set the urls that the buyer must be redirected to after 
        // payment approval/ cancellation.
        $url = Ruta::ctrRuta();
        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl($url."index.php?ruta=finally&paypal=true&recipient=".$datos["idRecip"])
        ->setCancelUrl("$url");
        // ### Payment
        // A Payment Resource; create one using
        // the above types and intent set to 'sale'
        $payment = new Payment();
        $payment->setIntent("sale")
        ->setPayer($payer)
        ->setRedirectUrls($redirectUrls)
        ->setTransactions(array($transaction));
        // For Sample Purposes Only.
        $request = clone $payment;
        // ### Create Payment
        // Create a payment by calling the 'create' method
        // passing it a valid apiContext.
        // (See bootstrap.php for more on `ApiContext`)
        // The return object contains the state and the
        // url to which the buyer must be redirected to
        // for payment approval
        try {
        // traemos las credenciales $apiContext
          $payment->create($apiContext);

      }catch(PayPal\Exception\PayPalConnectionException $ex){

      echo $ex->getCode(); // Prints the Error Code
      echo $ex->getData(); // Prints the detailed error message 
      die($ex);
      return "$url/error";

  }


  foreach ($payment->getLinks() as $link) {
      if($link->getRel() == "approval_url"){

        $redirectUrl = $link->getHref();
    }
}

return $redirectUrl;
}

}