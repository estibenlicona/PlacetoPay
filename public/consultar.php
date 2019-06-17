<?php 
	require_once('../src/Dao/conexionDao.php');
	$db = new DB();
	$data = $db->read();
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Estado de Pagos</title>	
	<link rel="stylesheet" type="text/css" href="http://localhost/placetopay/vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
	  <a class="navbar-brand" href="http://localhost/placetopay/public">PlacetoPay</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>
	  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
	    <div class="navbar-nav">
	      <a class="nav-item nav-link" href="http://localhost/placetopay/public/consultar.php">Consultar</a>
	      <a class="nav-item nav-link" href="http://localhost/placetopay/public">Pagar</a>
	    </div>
	  </div>
	</nav> 
	<div class="container mt-5">
		<div class="row justify-content-center">
			<div class="col-md-10">
				<table class="table table-sm">
				  <thead>
				    <tr>
				      <th scope="col">ID</th>
				      <th scope="col">Date</th>
				      <th scope="col">Status</th>
				    </tr>
				  </thead>
				  <tbody>
				  	<?php foreach ($data as $key => $d): ?>
				  		<tr>
					      <td><a href="<?='http://localhost/placetopay/src/Controller/PaymentController.php?id='.$d->session?>"><?=$d->session?></a></td>
					      <td><?=$d->date?></td>
					      <td><?=$d->status?></td>
					    </tr>
				  	<?php endforeach ?>
				  </tbody>
				</table>
			</div>
		</div>
	</div>
</body>
</html>