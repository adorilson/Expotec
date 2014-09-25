<!-- 
<?php  include_once '../../../php/connection.php';?>
<?php 
	
	session_start();	
	if(isset($_SESSION['nome']) && isset($_SESSION['senha'])){
		$id_a = $_GET['id'];
		$id_u = $_SESSION['id_u'];

		$command = "SELECT * FROM atividade WHERE id = $id_a AND nome = 'Palestra'" ;
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
			$local 		= $result->local;
		}	
	}
	else{
		header("Location:../../entrar");
	}

	$date = date("d m y, H:i:s");

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
                    <li><a href="">Palestrantes</a></li>
			       	<li ><a target="_blank" href="http://portal.ifrn.edu.br/"> Portal IFRN </a></li>
			       </ul>
			      </div>
			  </div>
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
					<div>
						<a class="btn-success btn" href="../../../php/functions.php?id_a=<?php echo $id_a;?>&id_u=<?php echo $id_u;?>&activity=Palestra">Adicionar à minha lista</a>
					</div>
				</div>
				<div class="col-md-5 add_atividade">
					<h3> Suas <?php echo $nome.'s';?>  </h3>
					
					<div class="div_atividades">
						<ul class="nav_atividades nav nav-pills nav-stacked">
								<?php 
									$comm = "SELECT  usuario_atividade.id, titulo, local, data_hora  FROM usuario, usuario_atividade, atividade WHERE usuario.id = usuario_atividade.usuario_id AND usuario_atividade.atividade_id = atividade.id AND atividade.nome = 'Palestra' AND usuario.id = :id_u ORDER BY atividade.data_hora";
									try {
										$query = $pdo->prepare($comm);
										$query->bindValue(":id_u",$id_u);
										$query->execute();			
									} catch (PODException $ex) {
										echo $ex;
									}

										$count = $query->rowCount();
										if($count > 0){
											
										
										while($result = $query->fetch(PDO::FETCH_OBJ)){
											$t = $result->titulo;
											$l = $result->local;
											$d = substr($result->data_hora, 0, 10); 
											$h = substr($result->data_hora, 11, 8); 

											$d = explode("-", $d);
											$d = $d[2]."/".$d[1]."/".$d[0];	

											
									?>
									
									<li>
										<a>
											<form action="../../../php/functions.php?id_u=<?php echo $id_u;?>&id_a=<?php echo $id_a;?>&activity=Palestra"  method="post">
												<button name="delete" class="close" type="submit">&times;</button>
											</form>
											<?php echo $t."<br> <small>($l)</small>" ?>
											<p>Data: <?php echo $d." / Hora:".$h ?> </p>
										</a>
									</li>

									<?php } }
									else{
										echo "<h3 style='color:#AAA; text-align:center; font-size:100%;'>Nenhuma atividade ainda...</h3>";
									}
								?>
						</ul>
					</div>


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

		<script src="../../../res/lib/js/jquery.min.js"></script>
		<script src="../../../res/lib/js/bootstrap.min.js"></script>
		<script src="../../../res/js/script.js"></script>
	</body>
</html>
 -->