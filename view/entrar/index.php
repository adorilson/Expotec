<!DOCTYPE html>
<html>
	<head>
		<link rel="shortcut icon" type="image/x-icon" href="http://portal.ifrn.edu.br/favicon.ico" />
	    <meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<title> Expotec </title>
		<link rel="stylesheet" href="../../res/lib/css/bootstrap.min.css">
		<link rel="stylesheet" href="../../res/css/style.css">
	</head>
	<body class="body_login">
		<h1 class="title_login"> Acesse sua conta... </h1>

		<div class="container ">
			<div class="row">
				<div class="col-md-2 "></div>
				<!-- Form cadastro -->
				<div class="col-md-8 alert div_">						
					<div class="row">
						<form action="../../php/functions.php" method="post" class="form-cadastro" >
							

							<div class="div-form">
								<label for="nome">Nome:</label>
								<input id="nome"name="nome"type="text" class="form-control input" required placeholder="">	
							</div>

							<div class="div-form">
								<label for="nome">Senha:</label>
								<input name="senha" type="password" class="form-control input" required placeholder="">
							</div>

							
							
							<div id="div_matricula" class="div-form">
								<label >Matricula:</label>
								<input name="matricula" type="text" class="form-control input" placeholder="Matricula">	
							</div>

							<div class="div-form">
								<input name="entrar" type="submit" class="btn btn-success input" value="Entrar">
								<input type="button" id="btn_cancel" class="btn btn-danger input pull-right" value="Cancelar"  >
							</div>
						</form>	
					</div>
				</div>
				</div>

				<!-- End form cadastro -->
				<div class="col-md-2"></div>
			</div>
		</div>

		<!-- Imports javascript -->
		<script src="../../res/lib/js/jquery.min.js"></script>
		<script src="../../res/lib/js/bootstrap.min.js"></script>
		<script src="../../res/js/script.js"></script>	
	</body>
</html>