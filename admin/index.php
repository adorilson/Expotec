
<?php include_once '../php/connection.php'; ?>


<!DOCTYPE html>
<html>
<head>
	<link rel="shortcut icon" type="image/x-icon" href="http://portal.ifrn.edu.br/favicon.ico" />
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title> Admin </title>

	<link rel="stylesheet" href="../res/lib/css/bootstrap.min.css">
	<link rel="stylesheet" href="../res/lib/css/bootstrap-responsive.min.css">
	<link rel="stylesheet" href="../res/css/style.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<h1 id="title-adm" class="title-adm">Área do administrador</h1>
			<div class="col-md-3"></div>
			
			<div class="col-md-6">
				<form action="../php/functions.php" method="post">
					<div class="div-form">
						<input name="user" class="form-control inputNorm" type="text" placeholder="Usuário" required>
					</div>
					<div class="div-form">
						<input name="pass" class="form-control inputNorm" type="password" placeholder="Senha" required>
						
						<input name="admin" type="submit" class="btn btn-success inputNorm" value="entrar">
						<input id="admin_cancel" type="button" class="btn btn-danger inputNorm pull-right"  value="cancelar" >
					</div>
					
				</form>
			</div>
			
			<div class="col-md-3"></div>
		</div>
	</div>
	<script src="../res/lib/js/jquery.min.js"></script>
	<script src="../res/lib/js/bootstrap.js"></script>	
	<script src="../res/js/script.js"></script>	
	
</body>
</html>