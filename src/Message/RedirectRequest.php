<?php 

	require_once('../Manager/Auth.php');

	class RedirectRequest extends Auth 
	{
		
		private $expiration;
		private $returnUrl;
		private $ipAddress;
		private $userAgent;		
		private $reference;
		private $description;
		private $currency;
		private $total;

		function __construct($expiration,$returnUrl,$ipAddress,$userAgent,$reference,$description,$currency,$total)
		{
			
			$this->expiration = $expiration;
			$this->returnUrl = $returnUrl;
			$this->ipAddress = $ipAddress;
			$this->userAgent = $userAgent;
			$this->reference = $reference;
			$this->description = $description;
			$this->currency = $currency;
			$this->total = $total;
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

			return $data;
		}
	}
 ?>