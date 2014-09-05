<?php  include_once '../../../php/connection.php'; ?>
<?php 
	$id = $_GET['id'];
	$command = "SELECT * FROM atividade WHERE id = $id";
		try {
			$query = $pdo->prepare($command);
			$query->execute();
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
		while($result = $query->fetch(PDO::FETCH_OBJ)){
			$titulo = $result->titulo;
		}
?>


<!DOCTYPE html>
<html lang="en">
	<head>
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
                        	<li><a href="../../palestras/"> Palestras</a></li>
                        	<li class="divider"></li>
                        	<li><a href="../">Mini Cursos</a></li>
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
			<div class="alert col-md-12" >  
				<br><br>
				
					

				
				


				
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