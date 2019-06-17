<?php 
	require_once __DIR__.'/../../config.php';

	class Auth{
	     
	    private $url = URL;
	    private $login = LOGIN;
	    private $secrectKey = SECRECTKEY;
	     
	    
	    public function __construct($url,$login,$secrectKey){
	        $this->url = $url;
	        $this->login = $login;
	        $this->secrectKey = $secrectKey;
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

	    public function getAuth()
	    {
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
			$tranKey = base64_encode(sha1($nonce . $seed . $secrectKey, true));
			$nonce = base64_encode($nonce);

	        $data = [
            	'login' => $login,
            	'tranKey' => $tranKey,
                'seed' => $seed,
                'nonce' => $nonce,
	        ];

	        return $data; 
	    }
	}
 ?>