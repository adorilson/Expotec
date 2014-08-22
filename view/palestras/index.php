<?php require_once '../../php/connection.php'; ?>

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
			        <li class="active"><a href=""> Palestras</a></li>
			       	<li><a href="../minicursos/">Mini Cursos</a></li>
			       	<li ><a target="_blank" href="http://portal.ifrn.edu.br/"> Portal IFRN </a></li>
			       </ul>
			      </div><!-- /.navbar-collapse -->
			  </div><!-- /.container-fluid -->
			</nav>

			<h1 class=" title visible-md visible-lg "> Participe de Palestras </h1>
			<h2 class=" title visible-sm visible-xs"> Participe de Palestras </h2> 
		</header>
		
		<div class="container main-content">	
			<div class="alert col-md-12" >  
				<br><br>
				<!-- Table -->
				<table class="table table-striped">
					<thead>
						<tr>
				            <th>Título</th>
				            <th>Palestrante</th>
				            <th>Local</th>
				            <th>Data</th>
				            <th>Horário</th>
				            <th>Vagas</th>
				            <th>Inscrição</th>
				        </tr>
				    </thead>
				    <tbody>
				    	<?php
						    $command = "SELECT * FROM Evento ";
						    try {
						    	$query = $pdo->prepare($command);
						    	$query->execute();
						    } catch (PDOException $e) {
						      	echo $e->getMessage();
						    }
						    while ($result = $query->fetch(PDO::FETCH_OBJ)) {     
						    ?>
						    <tr>
								<td> <?php echo $result->titulo; ?> </td>
								<td> <?php 
										try {
											$command_inter = "SELECT nome FROM Interlocutor where id = "+$result->interlocutor_id+"";
								 			$query_inter = $pdo->prepare($command_inter);
								 			$query_inter->execute();

										} catch (Exception $e) {
											echo $e.getMessage();
										}
										while($result_inter = $query_inter->fetch(PDO::FETCH_OBJ)){
										echo $result_inter->id;
										}
								 		?> 
								</td>
							    <td> <?php echo $result->local; ?> </td>
							    <td> <?php echo $result->data; ?> </td>
							    <td> <?php echo $result->horario; ?> </td>
							    <td> <?php echo $result->vagas; ?> </td>
							   	<td> <?php echo "<a href='inscricao/'>Inscrever-se</a>"; ?> </td>
							   		
						    </tr>
					    <?php } ?>
			   		</tbody>
				</table>
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

		<script src="../../res/lib/js/jquery.min.js"></script>
		<script src="../../res/lib/js/bootstrap.min.js"></script>
		<script src="../../res/js/script.js"></script>
	</body>
</html>