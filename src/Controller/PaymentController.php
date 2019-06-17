<?php 
	require_once('../Message/RedirectRequest.php');
	require_once('../Manager/PayloadManager.php');

	require_once('../PlacetoPay.php');

	if (!empty($_POST['reference']) && !empty($_POST['description']) && !empty($_POST['currency']) && !empty($_POST['total'])){

		$returnUrl = 'http://localhost/placetopay/public/';
		$ipAddress = '127.0.0.1';
		$userAgent = $_SERVER['HTTP_USER_AGENT'];
		$expiration = date('c',strtotime('+5 minutes'));
		$reference = $_POST['reference'];
		$description = $_POST['description'];
		$currency = $_POST['currency'];
		$total = $_POST['total'];

		$PayloadManager  = new PayloadManager('',$expiration,$returnUrl,$ipAddress,$userAgent,$reference,$description,$currency,$total);

		$processURL = $PayloadManager->request();
		header('Location: '.$processURL);

	}else if(isset($_GET['id'])){
		$requestId = $_GET['id'];
		$PayloadManager  = new PayloadManager($requestId,'','','','','','','','');

		echo "<pre>";
		print_r(json_decode($PayloadManager->query()));
		echo "</pre>";
	}else{
		header('Location: http://localhost/placetopay/public/');
		// Incluir variables de session para validar el formulario
	}

	





 ?>