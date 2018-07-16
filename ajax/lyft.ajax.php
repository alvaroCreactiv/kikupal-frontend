<?php 
/**
 * 
 */
class Lyft
{
	
	static public function accessToken()
	{
		$data = json_encode(array(
			"grant_type"  => "client_credentials",
			"scope" => "public"
		));

		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => "https://api.lyft.com/oauth/token",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_POSTFIELDS => $data,
			CURLOPT_HTTPHEADER => array(
				"Authorization: Basic NHZSODZVTjNSSjI4OnloWlNoNnRvS1k5azFQMEJQM1pETWRLTE9OTXlheHB5",
				"Content-Type: application/json"
			),
		));

		$response = curl_exec($curl);

		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
			echo "cURL Error #:" . $err;
		} else {
			echo ($response);
		}	
		

	}
}

$token= new Lyft();
$token->accessToken();
?>