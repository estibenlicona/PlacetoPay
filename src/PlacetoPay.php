<?php 
require_once '../../vendor/rmccue/requests/library/Requests.php';
Requests::register_autoloader();

	class PlacetoPay {
	     
	    public function request($url,$data)
	    {
	    	$headers = array('Content-Type' => 'application/json');
			$response = Requests::post($url, $headers, json_encode($data));
			return $response->body;
	    }	    
	    public function query($url,$data)
	    {
	    	$headers = array('Content-Type' => 'application/json');
			$response = Requests::post($url, $headers, json_encode($data));
			return $response->body;
	    }
	}

 ?>