<?php 
require_once '../../vendor/rmccue/requests/library/Requests.php';
Requests::register_autoloader();

	class Client{
	     
	    private $url;
	    private $login;
	    private $secrectKey;
	     
	    public function __construct(){
	        $this->url = "https://test.placetopay.com/redirection/api/session";
	        $this->login = "6dd490faf9cb87a9862245da41170ff2";
	        $this->secrectKey = "024h1IlD";
	    }

	    public function getUrl()
	    {
	    	return $this->url;
	    }

	    public function getLogin()
	    {
	    	return $this->login;
	    }

	    public function getSecrectKey()
	    {
	    	return $this->secrectKey;
	    }
	     
	    public function request(){
	         
	        $url = $this->getUrl();
	        $login = $this->getLogin();
	        $secrectKey = $this->getSecrectKey();
	        
	        if (function_exists('random_bytes')) {
			    $nonce = bin2hex(random_bytes(16));
			} elseif (function_exists('openssl_random_pseudo_bytes')) {
			    $nonce = bin2hex(openssl_random_pseudo_bytes(16));
			} else {
			    $nonce = mt_rand();
			}

			$seed = date('c');
			$seedExpiration = date('c',strtotime('+7 minutes'));
			$tranKey = base64_encode(sha1($nonce . $seed . $secrectKey, true));
			$nonce = base64_encode($nonce);

	        $data = json_encode([
	            'auth' => [
	            	'login' => $login,
	            	'tranKey' => $tranKey,
	                'seed' => $seed,
	                'nonce' => $nonce
	            ],
	            'payment' => [
	            	'reference' => '5976030f5575d',
	            	'description' => 'Pago Basico',
	                'amount' => [
	                	'currency' => 'COP',
	                	'total' => '10000'
	                ]
	            ],
	            'expiration' => $seedExpiration,
	            'returnUrl' => 'https://dev.placetopay.com/redirection/sandbox/session/5976030f5575d',
	            'ipAddress' => '127.0.0.1',
	            'userAgent' => 'PlacetoPay Sandbox'
	        ]);

			$headers = array('Content-Type' => 'application/json');
			$response = Requests::post($url, $headers, $data);

			return $response->body;
	    }
	}

	$cliente = new Client();
	$response = $cliente->request();

	print_r($response);
 ?>