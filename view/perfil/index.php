<?php include_once '../../php/connection.php'; ?>
<?php 
    session_start();

    if(isset($_SESSION['email']) && isset($_SESSION['senha']) ) {
        
       try {
       		$id  		= $_SESSION['id_u'];
       		$command = "SELECT * FROM usuario WHERE id = :id";
       		$query 	 = $pdo->prepare($command);
       		$query->bindValue(":id",$id);
       		$query->execute();
       } catch (PDOException $e) {
       		echo $e;
       }
       while($result = $query->fetch(PDO::FETCH_OBJ)){
       	$id  		= $result->id;
        $tipo 		= $result->tipo;
        $nome 		= $result->nome;
        $email 		= $result->email;
        $cpf   		= $result->cpf; 
        $matricula 	= $result->matricula; 
        $idade   	= $result->idade; 
        $sexo 		= $result->sexo; 
        $s  		= $result->sexo;
       }

       

        if($sexo == 'm'){
        	$sexo = "Masculino";
        }
        else{
        	$sexo = "Feminino";
        }

        if($tipo == 1){
        	$type = "Aluno";
        }else if($tipo == 2){
        	$type = "Professor";
        }else {
        	$type = "Comunidade";
        }
    }
    else{
        header("Location:../../entrar");
    } 
						

?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="shortcut icon" type="image/x-icon" href="http://portal.ifrn.edu.br/favicon.ico" />
	    <meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<title> <?php echo $nome; ?></title>
		<link rel="stylesheet" href="../../res/lib/css/bootstrap.min.css">
		<link rel="stylesheet" href="../../res/lib/css/bootstrap-responsive.min.css">
		<link rel="stylesheet" href="../../res/css/style.css">
	</head>
	<body class="body-perfil">
		         <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

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
                    <!--  <li><a href="">Minhas Atividade</a></li>
                    <li><a href="">Sobre mim</a></li>
			       	-->
			       	<li><a href="">Perfil</a></li>
			       </ul>
			        
			       <ul id="navUser" class="navbar-right navbar-nav nav">
                            <?php 
								
                                if(isset($_SESSION['email']) && isset($_SESSION['senha'])){
                                   
                                    echo "
                                    <li class='dropdown'>
                                    <a href='' class='dropdown-toggle' data-toggle='dropdown'>$nome<span class='caret'></span></a>
                                    <ul class='dropdown-menu' role='menu'>
	                                    <li><a href='ajustes/?ministrante=$ministrante'>Ajustes</a></li>
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
		</header>
		
		<div class="container">
			<div class="row">
				<!-- PROFILE -->
				<div class="col-md-4 profile">
					<div>
						<h2><small><b>Nome: </b><?php echo $nome;?></small></h2>
						<hr>
						<h3><small><b>Sou: </b><?php echo $type; ?></small></h3>
						
						<?php if($matricula != ""){?>
						<h3><small><b>Matricula: </b><?php echo $matricula; ?></small></h3>
						<?php }?>

						<h3><small><b>CPF: </b><?php echo $cpf; ?></small></h3>
						<h3><small><b>Email: </b><a href=""> <?php echo $email; ?></a></small></h3>
						<h3><small><b>Idade: </b><?php echo $idade." anos"; ?></small></h3>
						<h3><small><b>Sexo: </b><?php echo $sexo; ?></small></h3>
						<hr>
						<?php 
							try {
								
								$all 		= "SELECT * FROM atividade WHERE ministrante = :nome";
								$accepted 	= "SELECT * FROM atividade WHERE ministrante = :nome AND status = 1";
								$pending	= "SELECT * FROM atividade WHERE ministrante = :nome AND status = 0";


								$queryAl 		= $pdo->prepare($all);
								$queryAc 		= $pdo->prepare($accepted);
								$queryPe 		= $pdo->prepare($pending);
								
								$queryAl->bindValue(":nome",$nome); 
								$queryAl->execute();
								
								$queryAc->bindValue(":nome",$nome); 
								$queryAc->execute();
								
								$queryPe->bindValue(":nome",$nome); 
								$queryPe->execute();


							} catch (PDOException $e) {
								echo $e;
							}
							$rowAl = $queryAl->RowCount();
							$rowAc = $queryAc->RowCount();
							$rowPe = $queryPe->RowCount();
							
							$all 		= $rowAl;
							$accepted 	= $rowAc;
							$pending 	= $rowPe;
							/* All submissions */
							while($result = $queryAl->fetch(PDO::FETCH_OBJ)){
								$tipo 			= $result->tipo;
								$titulo 		= $result->titulo;
								$descricao 		= $result->descricao;
								$duracao 		= $result->duracao;
								$vagas 			= $result->vagas;
								$area 			= $result->area;
								$status 		= $result->status;
								$prerequisitos 	= $result->prerequisitos;
								$extras 		= $result->extras;
								$minicurriculo 	= $result->minicurriculo;
							}


						 ?>

						<h1 class="title-sub"><small>Submissões</small></h1>
						<div class="counter">
							<h1><?php echo $all; ?></h1>
							<small>Total</small>
						</div>
						<div class="counter">
							<h1><?php echo $accepted; ?></h1>
							<small>Aceitas</small>
						</div>
						<div class="counter">
							<h1><?php echo $pending; ?></h1>
							<small>Pendentes</small>
						</div>	
					</div>
				</div>

				
				<!-- STUFFS -->
				<div class="col-md-8 ">
					<!-- Nav tabs -->
					<h1>Minhas Submissões </h1>
					<ul  id="myTab" class="nav nav-tabs" role="tablist">
					  	<li class="active"><a href="#Minicursos" role="tab" data-toggle="tab">Minicursos</a></li>
					  	<li><a href="#Palestras" role="tab" data-toggle="tab">Palestras</a></li>
						<li><a href="#Oficinas" role="tab" data-toggle="tab">Oficinas</a></li>
						<li><a href="#Resumos" role="tab" data-toggle="tab">Resumos</a></li>
					</ul>

					<!-- Tab panes -->
					<div class="tab-content">
					 
					  <div class="tab-pane active" id="Minicursos">
						<div class="list-group">
						<?php 
							try {
								
								$all 		= "SELECT * FROM atividade WHERE ministrante = :nome AND tipo = 'minicurso'";

								$queryAl 	= $pdo->prepare($all);
								
								$queryAl->bindValue(":nome",$nome); 
								$queryAl->execute();

							} catch (PDOException $e) {
								echo $e;
							}
							$row = $queryAl->RowCount();
							
							if($row > 0){
									/* All submissions */
								while($result = $queryAl->fetch(PDO::FETCH_OBJ)){
									$id_ac 			= $result->id;
									$tipo 			= $result->tipo;
									$titulo 		= $result->titulo;
									$descricao 		= $result->descricao;
									$duracao 		= $result->duracao;
									$vagas 			= $result->vagas;
									$area 			= $result->area;
									$status 		= $result->status;
									$prerequisitos 	= $result->prerequisitos;
									$extras 		= $result->extras;
									$minicurriculo 	= $result->minicurriculo;
									if($status == 1){
										$class_status = "accepted";
									}
									else if($status == 0){
										$class_status = "pending";
									}
							
						 ?>
						 		
						 		<a href="atividade/?id=<?php echo$id_ac; ?>">
									<div class="<?php echo $class_status; ?> list-group-item">
									   		<span class="badge"><?php echo $vagas; ?> Vagas</span>
									   		<p><?php echo $titulo; ?></p>
								  	</div>
								</a>
						

						<?php 

							}}else {echo "<h3><small>(Nenhum minicurso por aqui)</small></h3>";}
						 ?>
					  </div>

					  </div>
					  <div class="tab-pane" id="Palestras">
					  		<?php 
							try {
								
								$all 		= "SELECT * FROM atividade WHERE ministrante = :nome AND tipo = 'palestra'";

								$queryAl 	= $pdo->prepare($all);
								
								$queryAl->bindValue(":nome",$nome); 
								$queryAl->execute();

							} catch (PDOException $e) {
								echo $e;
							}
							$row = $queryAl->RowCount();
							
							if($row > 0){
									/* All submissions */
								while($result = $queryAl->fetch(PDO::FETCH_OBJ)){
									$id_ac 			= $result->id;
									$tipo 			= $result->tipo;
									$titulo 		= $result->titulo;
									$descricao 		= $result->descricao;
									$duracao 		= $result->duracao;
									$vagas 			= $result->vagas;
									$area 			= $result->area;
									$status 		= $result->status;
									$prerequisitos 	= $result->prerequisitos;
									$extras 		= $result->extras;
									$minicurriculo 	= $result->minicurriculo;
									if($status == 1){
										$class_status = "accepted";
									}
									else if($status == 0){
										$class_status = "pending";
									}
						 ?>
							  <a href="atividade/?id=<?php echo$id_ac; ?>"><p class="<?php echo $class_status; ?> list-group-item"><?php echo $titulo; ?> </p></a>
						<?php 

							}}else {echo "<h3><small>(Nenhuma palestra por aqui)</small></h3>";}
						 ?>		
					  </div>
					  <div class="tab-pane" id="Oficinas">
					  	<?php 
							try {
								
								$all 		= "SELECT * FROM atividade WHERE ministrante = :nome AND tipo = 'oficina'";

								$queryAl 	= $pdo->prepare($all);
								
								$queryAl->bindValue(":nome",$nome); 
								$queryAl->execute();

							} catch (PDOException $e) {
								echo $e;
							}
							$row = $queryAl->RowCount();
							
							if($row > 0){
									/* All submissions */
								while($result = $queryAl->fetch(PDO::FETCH_OBJ)){
									$id_ac 			= $result->id;
									$tipo 			= $result->tipo;
									$titulo 		= $result->titulo;
									$descricao 		= $result->descricao;
									$duracao 		= $result->duracao;
									$vagas 			= $result->vagas;
									$area 			= $result->area;
									$status 		= $result->status;
									$prerequisitos 	= $result->prerequisitos;
									$extras 		= $result->extras;
									$minicurriculo 	= $result->minicurriculo;
									if($status == 1){
										$class_status = "accepted";
									}
									else if($status == 0){
										$class_status = "pending";
									}
							
						 ?>
								  <a href="atividade/?id=<?php echo$id_ac; ?>"><p class="<?php echo $class_status; ?> list-group-item"><?php echo $titulo; ?> <span class="badge">Vagas <?php echo $vagas; ?>	</span></p></a>
							<?php 

							}}else {echo "<h3><small>(Nenhuma oficina por aqui)</small></h3>";}
						 ?>		
					  </div>
					  <div class="tab-pane" id="Resumos">
					  	<?php 
							try {
								
								$all 		= "SELECT * FROM atividade WHERE ministrante = :nome AND tipo = 'resumo'";

								$queryAl 	= $pdo->prepare($all);
								
								$queryAl->bindValue(":nome",$nome); 
								$queryAl->execute();

							} catch (PDOException $e) {
								echo $e;
							}
							$row = $queryAl->RowCount();
							
							if($row > 0){
									/* All submissions */
								while($result = $queryAl->fetch(PDO::FETCH_OBJ)){
									$id_ac 			= $result->id;
									$id_file 		= $result->id_file;
									$nome_file		= $result->nome_file;
									$tipo 			= $result->tipo;
									$status 		= $result->status;
									

									$nome_file = explode("/", $nome_file);

									if($status == 1){
										$class_status = "accepted";
									}
									else if($status == 0){
										$class_status = "pending";
									}
									
							
						 ?>
							 <a href="atividade/?id=<?php echo$id_ac; ?>"><p class="<?php echo $class_status; ?> list-group-item"><?php echo $nome_file[3]; ?> </p></a>
							
						<?php 
							}
						}else {echo "<h3><small>(Nenhum resumo por aqui)</small></h3>";}
						 ?>
					  </div>
					</div><!-- End of Tab-Content -->
				</div><!-- End of Collum -->
			
			</div><!-- End of row -->
		</div><!-- End Container -->

		 <footer>
            <div>
                <div class="col-md-4">
                    <div class="text-center"> 
                         <br> 
                        <h2><small>Realização</small></h2>
                        <img src="../../res/imgs/icons/if_jc_logo.jpg" height="100" width="250" alt="">   
                    </div>  
                </div>
                <div class="col-md-4 text-center">
                    <br>  
                    <h2><small>Patrocínio e apoio</small></h2>
                    <img src="../../res/imgs/icons/if_logo.jpg" height="100" width="250" alt="">   
                    <br>
                    <!-- <p class="text-muted">© 2014 IFRN</p>
                    <p title=":p" class="text-muted">Desenvolvedor: <a target="_blank" href="https://github.com/Hikee">Carlos Henry</a></p>
                 -->
                </div>
                
                 <div class="col-md-4 text-center">
                    <div class="row ">
                        
                        <div class="col-md-12">
                             <br>
                            <h2><small>Facebook</small></h2>
                            <div  class="fb-like-box text-center" data-href="https://www.facebook.com/pages/Expotec-Jo%C3%A3o-C%C3%A2mara/1390423807914217?ref=br_tf" data-colorscheme="light" data-show-faces="true" data-header="false" data-stream="false" data-show-border="false" data-height="196" data-width="300"  ></div> 
                        </div>      
                      
                    </div>
                </div>
        </footer>

		<script src="../../res/lib/js/jquery.min.js"></script>
		<script src="../../res/lib/js/bootstrap.min.js"></script>
		<script src="../../res/js/script.js"></script>	
	</body>
</html>
 
