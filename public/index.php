
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>PlacetoPay</title>
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
			<div class="col-md-4">
				<form action="../src/controller/PaymentController.php" method="post">
				  <div class="form-group">
				  	<label>Referencia de Pago:</label>
				  	<input type="text" name="reference" value="<?=rand(90000, 99999) ?>" class="form-control">
				  </div>
				  <div class="form-group">
				  	<label>Descripcion del pago:</label>
				  	<textarea class="form-control" name="description"></textarea>
				  </div>
				  <div class="form-group">
				    <label>Moneda:</label>
				    <select class="form-control" name="currency">
				    	<option value="COP">COP</option>
				    	<option value="USD">USD</option>
				    	<option value="CNY">CNY</option>
				    	<option value="BRL">BRL</option>
				    </select>
				  </div>
				  <div class="form-group">
				    <label>Monto a pagar:</label>
				    <input type="text" name="total" class="form-control">
				  </div>
				  <div class="form-group">
				  	<input type="submit" value="Pasar a pagar" class="form-control btn btn-success">
				  </div>
			</div>
		</div>
	</div>
</form>
</body>
</html>