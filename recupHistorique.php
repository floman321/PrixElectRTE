$token_url = "https://digital.iservices.rte-france.com/token/oauth/";
$opts = array('http' =>
	array(
		'method'  => 'POST',
		'header'  => ['Content-type: application/x-www-form-urlencoded','authorization: Basic MyTokenBase64'],
		'content' => ''
	)
);

$context  = stream_context_create($opts);
$response = file_get_contents($token_url, false, $context);

$params = null;
$params = json_decode($response, true);


$price_url = "https://digital.iservices.rte-france.com/open_api/wholesale_market/v2/france_power_exchanges";
$opts = array('http' =>
	array(
		'method'  => 'GET',
		'header'  => 'authorization: Bearer '.$params['access_token'],
		'content' => ''
	)
);

$context  = stream_context_create($opts);
$response = file_get_contents($price_url, false, $context);

$json_string = json_decode($response,true);

//mettre a jour un virtuel créer pour l'occasion qui contient les données historiques (dulendemain)
$cmd = cmd::byId(4282);

foreach($json_string['france_power_exchanges'][0]['values'] as $key => $value) {
  	$madate = str_replace('T',' ',$value['start_date']);
    $madate = str_replace('+01:00','',$madate);
	$cmd->addHistoryValue($value['price'],   $_datetime = $madate) ;
}


