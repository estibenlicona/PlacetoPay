<?php 

	require_once('Auth.php');
	require_once('../PlacetoPay.php');
	require_once('../Dao/conexionDao.php');

	class PayloadManager extends Auth
	{
		
		private $requestId;
		private $expiration;
		private $returnUrl;
		private $ipAddress;
		private $userAgent;		
		private $reference;
		private $description;
		private $currency;
		private $total;

		function __construct(
			$requestId,
			$expiration,
		    $returnUrl,
		    $ipAddress,
		    $userAgent,
		    $reference,
		    $description,
		    $currency,
		    $total
	)
		{
			
			$this->requestId = $requestId;
			$this->expiration = $expiration;
			$this->returnUrl = $returnUrl;
			$this->ipAddress = $ipAddress;
			$this->userAgent = $userAgent;
			$this->reference = $reference;
			$this->description = $description;
			$this->currency = $currency;
			$this->total = $total;
		}

		public function getRequestId()
		{
			return $this->requestId;
		}		
		public function getExpiration()
		{
			return $this->expiration;
		}
		public function getReturnUrl()
		{
			return $this->returnUrl;
		}
		public function getIpAddress()
		{
			return $this->ipAddress;
		}
		public function getUserAgent()
		{
			return $this->userAgent;
		}
		public function getReference()
		{
			return $this->reference;
		}
		public function getDescription()
		{
			return $this->description;
		}
		public function getCurrency()
		{
			return $this->currency;
		}
		public function getTotal()
		{
			return $this->total;
		}

		public function request()
		{
			$data = [
				'auth' => $this->getAuth(),
				'payment' => [
					'reference' => $this->getReference(),
					'description' => $this->getDescription(),
					'amount' => [
						'currency' => $this->getCurrency(),
						'total' => $this->getTotal()
					]
				],
				'expiration' => $this->getExpiration(),
				'returnUrl' => $this->getReturnUrl(),
				'ipAddress' => $this->getIpAddress(),
				'userAgent' => $this->getUserAgent()
			];

			$placetoPay = new PlacetoPay();
			$response = json_decode($placetoPay->request($this->getUrl(),$data));

				if (strcmp($response->status->status, 'OK') == 0) {
					$db = new DB();
					$db->write($response->requestId,$response->status->date,$response->status->status);
					return $response->processUrl;
				}
			
		}
		public function query()
		{
			$data = [
				'auth' => $this->getAuth()
			];
		    $url = $this->getUrl().'/'.$this->getRequestId();
			$placetoPay = new PlacetoPay();
			return $placetoPay->query($url, $data);
		}
	}
 ?>