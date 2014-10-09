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
		<header class="main-header container">
			<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
			  <div class="container">
			    <div class="navbar-header">
			      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
			        <span class="sr-only"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			      </button>
			      <a class="navbar-brand" href="../../">Início</a>
			    </div>
			    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			      <ul class="nav navbar-nav">
					 <li class="dropdown">
			       	 	<a href="#" class="dropdown-toggle" data-toggle="dropdown">Atividades<span class="caret"></span></a>
			       	 	<ul class="dropdown-menu" role="menu">
                        	<li><a href="../../aviso/"> Palestras</a></li>
                        	<li class="divider"></li>
                        	<li><a href="../../aviso/">Mini Cursos</a></li>
                        	<li class="divider"></li>
                            <li><a href="../../aviso/">Oficinas</a></li>
                        </ul>
                    </li>
                    
                    <li><a href="../../aviso/">Palestrantes</a></li>
                    <li><a href="../organizacao/">Organização</a></li>
			       	<li ><a target="_blank" href="http://portal.ifrn.edu.br/"> Portal IFRN </a></li>
			       </ul>
			      </div>
			  </div>
			</nav>
		</header>
		<h1 class="title_login"> Acesse sua conta... </h1>

		<div class="container ">
			<div class="row">
				<div class="col-md-2 "></div>
				<div class="col-md-8 alert">						
					<div class="row">
						<form action="../../php/functions.php" method="post" class="form-login" >
							

							<div class="div-form">
								<label for="email">Email:</label>
								<input id="email" name="email" type="email" class="form-control inputNorm" required >	
							</div>

							<div class="div-form">
								<label for="nome">Senha:</label>
								<input name="senha" type="password" class="form-control inputNorm" required >
							</div>

							
							
							
							<div class="div-form">
								<input name="entrar" type="submit" class="btn btn-success inputNorm" value="Entrar">
								<input type="button" id="btn_cadastrar" class="btn btn-danger inputNorm pull-right" value="Sou novo">
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
 
