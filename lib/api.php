<?php 

//use GuzzleHttp\Client; 
//use GuzzleHttp\Exception\RequestException; 
//use GuzzleHttp\Psr7\Request;

function bi_api_call(){

	$client = new GuzzleHttp\Client();
	$res = $client->get('https://api.github.com/user', [
	    'auth' =>  ['user', 'pass']
	]);
	echo $res->getStatusCode();           // 200
	echo $res->getHeader('content-type'); // 'application/json; charset=utf8'
	echo $res->getBody();                 // {"type":"User"...'
	var_export($res->json()); 

}