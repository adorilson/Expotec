<?php  include_once '../../../php/connection.php'; ?>
<?php 
	session_start();
	if(isset($_SESSION['nome']) && isset($_SESSION['senha'])){
		$id = $_GET['id'];
		$command = "SELECT * FROM atividade WHERE id = $id AND nome = 'Palestra'" ;
		try {
			$query = $pdo->prepare($command);
			$query->execute();
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
		while($result = $query->fetch(PDO::FETCH_OBJ)){
			$titulo 	= $result->titulo;
			$descricao  = $result->descricao; 
			$nome 		= $result->nome;
		}	
	}
	else{
		header("Location:../../entrar");
	}	
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<link rel="shortcut icon" type="image/x-icon" href="http://portal.ifrn.edu.br/favicon.ico" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<title> Inscreva-se  </title>
		<link rel="stylesheet" href="../../../res/lib/css/bootstrap.min.css">
		<link rel="stylesheet" href="../../../res/css/style.css">
	</head>
	<body>
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
			      <a class="navbar-brand" href="../../../">Expotec</a>
			    </div>
			    <!-- Collect the nav links, forms, and other content for toggling -->
			    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			      <ul class="nav navbar-nav">
					 <li class="dropdown">
			       	 	<a href="#" class="dropdown-toggle" data-toggle="dropdown">Atividades<span class="caret"></span></a>
			       	 	<ul class="dropdown-menu" role="menu">
                        	<li><a href="../"> Palestras</a></li>
                        	<li class="divider"></li>
                        	<li><a href="../../minicursos/">Mini Cursos</a></li>
                        </ul>
                    </li>
                    <li><a href="">Sobre</a></li>
			       	<li ><a target="_blank" href="http://portal.ifrn.edu.br/"> Portal IFRN </a></li>
			       </ul>
			      </div><!-- /.navbar-collapse -->
			  </div><!-- /.container-fluid -->
			</nav>

			<h1 class=" title visible-md visible-lg "> <?php echo $titulo; ?> </h1>
			<h2 class=" title visible-sm visible-xs"> <?php echo $titulo; ?> </h2> 
		</header>
		
		<div class="container main-content">	
			<div class="alert col-md-12 descricao" >  
				<div class="col-md-7 ">
					<h3> Descrição: </h3>
					<p>
						<?php echo $descricao."Lorem ipsum dolor sit amet, consectetuer adipiscing elit. 
												Aenean commodo ligula eget dolor. Aenean massa. 
												Cum sociis natoque penatibus et magnis dis
												 parturient montes, nascetur ridiculus mus.
												  Lorem ipsum dolor sit amet, consectetuer adipiscing elit. 
												Aenean commodo ligula eget dolor. Aenean massa. 
												Cum sociis natoque penatibus et magnis dis
												 parturient montes, nascetur ridiculus mus.
													Lorem ipsum dolor sit amet, consectetuer adipiscing elit. 
												Aenean commodo ligula eget dolor. Aenean massa. 
												Cum sociis natoque penatibus et magnis dis
												 parturient montes, nascetur ridiculus mus.
												 Lorem ipsum dolor sit amet, consectetuer adipiscing elit. 
												Aenean commodo ligula eget dolor. Aenean massa. 
												Cum sociis natoque penatibus et magnis dis
												 parturient montes, nascetur ridiculus mus.
												 Lorem ipsum dolor sit amet, consectetuer adipiscing elit. 
												Aenean commodo ligula eget dolor. Aenean massa. 
												Cum sociis natoque penatibus et magnis dis
												 parturient montes, nascetur ridiculus mus.
												
												 " ;?>
					</p>
					<br>
						<form action="../../../php/functions.php">
							<input type="submit"  name="" class="btn-success btn" value="Adicionar à minha lista">
						</form>
				</div>
				<div class="col-md-5 add_atividade">
					<h3> Suas <?php echo $nome.'s';?>  </h3>
					
					<div class="div_atividades">
						<ul class="nav_atividades nav nav-pills nav-stacked">
							<li>
								<a href="">
									
									<?php echo $titulo ?>
									<p>Data: 26/09/2014 / Hora: 14:30:00</p>
								</a>
							</li>
							<li>
								<a href="">
									
									<?php echo $titulo ?>
									<p>Data: 26/09/2014 / Hora: 14:30:00</p>
								</a>
							</li>
							<li>
								<a href="">
									
									<?php echo $titulo ?>
									<p>Data: 26/09/2014 / Hora: 14:30:00</p>
								</a>
							</li>
							<li>
								<a href="">
									
									<?php echo $titulo ?>
									<p>Data: 26/09/2014 / Hora: 14:30:00</p>
								</a>
							</li>
						</ul>
					</div>


				</div>
			</div>
		</div> <!-- End of MAIN-CONTENT -->
	
	<footer>
		<div class="content">
			<div class="text-center"> 
				<p class="text-muted">© 2014 IFRN</p>
				<p title=":p" class="text-muted">Desenvolvedor: <a target="_blank" href="https://github.com/Hikee">Carlos Henry</a></p>
			</div>					
		</div>
	</footer>

		<script src="../../../res/lib/js/jquery.min.js"></script>
		<script src="../../../res/lib/js/bootstrap.min.js"></script>
		<script src="../../../res/js/script.js"></script>
	</body>
</html>