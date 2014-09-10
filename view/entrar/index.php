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
			      <a class="navbar-brand" href="../../">Expotec</a>
			    </div>
			    <!-- Collect the nav links, forms, and other content for toggling -->
			    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			      <ul class="nav navbar-nav">
					 <li class="dropdown">
			       	 	<a href="#" class="dropdown-toggle" data-toggle="dropdown">Atividades<span class="caret"></span></a>
			       	 	<ul class="dropdown-menu" role="menu">
                        	<li><a href="../palestras/"> Palestras</a></li>
                        	<li class="divider"></li>
                        	<li><a href="../minicursos/">Mini Cursos</a></li>
                        </ul>
                    </li>
                    <li><a href="">Sobre</a></li>
                    <li><a href="">Palestrantes</a></li>
			       	<li ><a target="_blank" href="http://portal.ifrn.edu.br/"> Portal IFRN </a></li>
			       </ul>
			      </div><!-- /.navbar-collapse -->
			  </div><!-- /.container-fluid -->
			</nav>
		</header>
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
								<input type="button" id="btn_cadastrar" class="btn btn-danger input pull-right" value="Sou novo">
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