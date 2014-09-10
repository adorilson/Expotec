
<?php include_once '../../php/connection.php'; include_once '../../php/check.php';?>
<!DOCTYPE html>
<html lang="en">
	<head>
       	<link rel="shortcut icon" type="image/x-icon" href="http://portal.ifrn.edu.br/favicon.ico" />
        <meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<title> Palestras </title>
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
			      <a class="navbar-brand" href="../../">Expotec</a>
			    </div>
			    <!-- Collect the nav links, forms, and other content for toggling -->
			    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			      <ul class="nav navbar-nav">
			        <li class="dropdown">
			       	 	<a href="#" class="dropdown-toggle" data-toggle="dropdown">Atividades<span class="caret"></span></a>
			       	 	<ul class="dropdown-menu" role="menu">
                        	<li><a href=""> Palestras</a></li>
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
			
			<h1 class=" title visible-md visible-lg "> Participe de palestras </h1>
			<h2 class=" title visible-sm visible-xs"> Participe de palestras </h2> 
		
		</header>

		<div class="container main-header ">
			<div class="row" >
				<div class="container">
					
				<!-- Filtros dos sonhos -->	
				<form class="form-inline pull-right" method="POST" action="#" role="form">
				  <span id="search_title"> Agilize sua busca:</span>
				  <div class="form-group">
				 	<div class="input-group">
				      <input class="form-control"  name="title_post" type="text" placeholder="Titulo...">
				    </div>
				  </div>
				  <div class="form-group">
				    <div class="input-group">
				      <input class="form-control" name="categoria_post"  type="text" placeholder="Categorias...">
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
				<!-- Table -->
				<table class="table table-striped">
					<thead>
			          <tr>
			            <th>Título</th>
			            <th>Palestrante</th>
						<th>Categoria</th>
			            <th>Local</th>
			            <th>Data</th>
			            <th>Horário</th>
			            <th>Vagas</th>
			            <th>Inscrição</th>
			          </tr>
			        </thead>
			        <tbody>
			        	
					<?php 

						if($_POST){
							$title = $_POST['title_post'];
				        	$categoria = $_POST['categoria_post'];
				        	$command = "SELECT * FROM atividade WHERE nome = 'Palestra' AND titulo LIKE '%$title%' AND categoria LIKE '%$categoria%'";
						  
						}else{
							$command = "SELECT * FROM atividade WHERE nome = 'Palestra'";	
						}
			        							  
						    try {
						    	$query = $pdo->prepare($command);
						    	$query->execute();


						    } catch (PDOException $e) {
						      	echo $e->getMessage();
						    }
						    while ($result = $query->fetch(PDO::FETCH_OBJ)) {
						    
						   $data = substr($result->data_hora, 0, 10); 
							$hora = substr($result->data_hora, 11, 8); 

							$data = explode("-", $data);
							$data = $data[2]."/".$data[1]."/".$data[0];						   
							?>
						    <tr>
								<td> <?php echo $result->titulo; ?> </td>
								<td> <?php echo $result->ministrante; ?> </td>
								<td> <?php echo $result->categoria; ?> </td>
								
							    <td> <?php echo $result->local; ?> </td>
							    <td> <?php echo $data; ?> </td>
							    <td> <?php echo $hora; ?> </td>
							    <td> <?php echo $result->vagas; ?> </td>
								<td> <a href='inscricao/?id=<? echo $result->id; ?>'>Inscrever-se</a></td>
						  </tr>
					    <?php } ?>

			        </tbody>
			      </table>
			</div>

		</div> <!-- End of MAIN-CONTENT -->
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