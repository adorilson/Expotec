 
<?php include_once '../../php/connection.php'; session_start();?>
<!DOCTYPE html>
<html lang="en">
	<head>
       	<link rel="shortcut icon" type="image/x-icon" href="http://portal.ifrn.edu.br/favicon.ico" />
        <meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<title> Minicursos </title>
		<link rel="stylesheet" href="../../res/lib/css/bootstrap.min.css">
		<link rel="stylesheet" href="../../res/css/style.css">
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
			      <a class="navbar-brand" href="../../">Início</a>
			    </div>
			    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			      <ul class="nav navbar-nav">
			        <li class="dropdown">
			       	 	<a href="#" class="dropdown-toggle" data-toggle="dropdown">Atividades<span class="caret"></span></a>
			       	 	<ul class="dropdown-menu" role="menu">
                        	<li><a href="../palestras/"> Palestras</a></li>
                        	<li class="divider"></li>
                        	<li><a href="">Mini Cursos</a></li>
                        </ul>
                    </li>
                    <li><a href="../../aviso/">Palestrantes</a></li>
                     <?php  
	                    if(isset($_SESSION['nome']) && isset($_SESSION['senha'])){
		                    echo "<li><a href='../submissoes/'>Submissões</a></li>";
		                }  
                    ?>
					<li><a href="">Sobre</a></li>
			       	<li ><a target="_blank" href="http://portal.ifrn.edu.br/"> Portal IFRN </a></li>
			       </ul>
					<ul id="navUser" class="navbar-right navbar-nav nav">
                            <?php 
								
                                if(isset($_SESSION['nome']) && isset($_SESSION['senha'])){
                                    $user = $_SESSION['nome']; 
                                    echo "
                                    <li class='dropdown'>
                                    <a href='' class='dropdown-toggle' data-toggle='dropdown'>Olá $user<span class='caret'></span></a>
                                    <ul class='dropdown-menu' role='menu'>
	                                    <li><a href='../perfil'>Perfil</a></li>
                                        <li class='divider'></li>
                                        <li><a href='../../php/logout.php'>Sair</a></li>                                   
                                    </ul>
                                    </li>
                                    </li>"; 
                                }
                                else{
                                  echo ("<li><a href='../cadastro/' id='cadastro'>Cadastrar</a></li>
                                  <li><a href='../entrar/'>Entrar</a></li>");  
                                }
                            
                            ?>
                        </ul>
		

			      </div>
			  </div>
			</nav>
			
			<h1 class=" title visible-md visible-lg "> Inscreva-se em minicursos </h1>
			<h2 class=" title visible-sm visible-xs"> Inscreva-se em minicursos </h2> 
		
		</header>

		<div class="container main-header ">
			<div class="row" >
				<div class="container">
					
				<form class="form-inline pull-right" method="GET" action="" role="form">
				  <span id="search_title"> Agilize sua busca:</span>
				  <div class="form-group">
				    <div class="input-group">
				      <input id="seek" class="form-control" name="keyword"  type="text" placeholder="Busque por títulos...">
				    </div>
				  </div>
				  <button type="submit"  class="btn btn-success">Pesquisar</button>
				</form>
				</div>
			</div>
		</div> 
		<div class="container main-content ">
			<br>
			<div class="alert col-md-12" >
				<div class="row">
					<br><br>
					<table class="table table-striped">
						<thead>
				          <tr>
				            <th>Título</th>
				            <th>Professor</th>
				            <th>Local</th>
				            <th>Dia</th>
				            <th>Horário</th>
				            <th>Vagas</th>
				            <th>Inscrição</th>
				          </tr>
				      </thead>
				      <tbody>
					<?php 
							
						if($_GET){
							$keyword = $_GET['keyword'];
				        	$command = "SELECT * FROM atividade WHERE tipo = 'minicurso' AND status = 1 AND titulo LIKE '%$keyword%' ";
						  
						}else{
							$command = "SELECT * FROM atividade WHERE tipo = 'minicurso' AND status = 1";	
						}
			        							  
						    try {
						    	$query = $pdo->prepare($command);
						    	$query->execute();


						    } catch (PDOException $e) {
						      	echo $e->getMessage();
						    }
						     $count = $query->RowCount();
						    if($count > 0){
						    while ($result = $query->fetch(PDO::FETCH_OBJ)) {
						    
								$dia_hora = explode("-", $result->dia_hora);
							   	$dia 	= $dia_hora[0];
							   	$hora 	= $dia_hora[1];	 
							?>

						    <tr>
								
								<td> <?php echo $result->titulo; ?> </td>
								<td> <?php echo $result->ministrante; ?> </td>
								
							    <td> <?php echo $result->local; ?> </td>
							    <td> <?php echo $dia; ?> </td>
							    <td> <?php echo $hora; ?> </td>
							    <td> <?php echo $result->vagas; ?> </td>
						

								 <form action="inscricao/?id=<? echo $result->id; ?>" method="POST">
									<td> <button class="insc btn btn-default" type="submit">Visualizar</button></td>
						    	</form>

						  </tr>
					    <?php } }else{	echo "<h2><small>Nenhum resultado encontrado... Clique novamente em pesquisar</small></h2>";}
						?>


			        </tbody>
			      </table>
			</div>

		</div> 
	</div>
	<footer>
		<div class="content">
			<div class="text-center"> 
				<p class="text-muted">© 2014 IFRN</p>
				<p title=":p" class="text-muted">Desenvolvedor: <a target="_blank" href="https://github.com/Hikee">Carlos Henry</a></p>
			</div>					
		</div>
	</footer>

		<script src="../../res/lib/js/jquery.min.js"></script>
		<script src="../../res/lib/js/bootstrap.min.js"></script>
		<script src="../../res/js/script.js"></script>
		
	</body>
</html>
 
