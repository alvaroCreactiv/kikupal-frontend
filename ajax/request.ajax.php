<?php

$curl = curl_init();
$data =json_encode(array(
  "scope" => "rides.request",
  "ride_type"  => $_POST["typeRide"],
  "origin" => array(
    "lat" => $_POST["origenLat"],
    "lng" => $_POST["origenLng"]
  ),
  "destination" => array(
    "lat" => $_POST["destinoLat"],
    "lng" => $_POST["destinoLng"]
  ),
  "address"=> $_POST["destinoName"]
));


curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.lyft.com/v1/rides",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => $data,
  CURLOPT_HTTPHEADER => array(
    "Authorization: Bearer ".$_POST["token"],
    "Content-Type: application/json"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}
