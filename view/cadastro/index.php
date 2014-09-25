
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
	<body class="body_cadastro">

		

		<div class="container">
			<div class="row">
				<div class="col-md-2 "></div>
				<div id="div_cadastro_login" class="col-md-8 alert cadastro">						
					<h1> Cadastre-se  </h1>
					<div class="row">
						<form action="../../php/functions.php" method="post" class="form-cadastro" >
							

							<div class="div-form">
								<label for="nome">Nome:</label>
								<input id="nome"name="nome"type="text" class="form-control inputNorm" required placeholder="Nome e sobrenome...">	
							</div>

							<div class="div-form">
								<label for="nome">Senha:</label>
								<input name="senha" type="password" class="form-control inputNorm" required placeholder="Números e letras...">
							</div>

							<div class="div-form">
								<label for="nome">CPF:</label>
								<input name="cpf"  id="cpf" type="text" class="form-control inputNorm"  required placeholder="Seu cpf...">	
							</div>
							
							<div class="div-form">
								<select class="inputNorm" name="tipo" id="tipo">
									<option value="">Eu sou...</option>
									<option id="aluno" name="aluno" value="aluno">Aluno do IFRN</option>
									<option id="prof" value="professor">Professor do IFRN</option>
									<option id="comunidade" value="comunidade">Comunidade</option>
								</select>
							</div>
							
							<div id="matricula" class="div-form">
								<label >Matricula:</label>
								<input name="matricula" type="text" class="form-control inputNorm" placeholder="Matricula">	
							</div>
							<div class="div-form">
								<input name="cadastrar" type="submit"  class="btn btn-success inputNorm" value="Salvar">
								<input type="button" id="btn_cancel" class="btn btn-danger inputNorm pull-right" value="Cancelar"  >
							</div>
						</form>	
					</div>
				</div>
				</div>

				<div class="col-md-2"></div>
			</div>
		</div>

		<script src="../../res/lib/js/jquery.min.js"></script>
		<script src="../../res/lib/js/bootstrap.min.js"></script>
		<script src="../../res/js/script.js"></script>	
	</body>
</html>
 