<?php include_once '../../../php/connection.php'; ?>
<?php 
    session_start();

    if(isset($_SESSION['email']) && isset($_SESSION['senha']) ) {
        $user = $_SESSION['nome'];
       try {
       		$id  		= $_GET['id'];
       		$command = "SELECT * FROM atividade WHERE id = :id";
       		$query 	 = $pdo->prepare($command);
       		$query->bindValue(":id",$id);
       		$query->execute();
       } catch (PDOException $e) {
       		echo $e;
       }
       while($result    = $query->fetch(PDO::FETCH_OBJ)){
       	$tipo 			    = $result->tipo;
        $titulo 		    = $result->titulo;
        $descricao 		  = $result->descricao;
        $duracao		    = $result->duracao; 
        $vagas 			    = $result->vagas; 
        $area   		    = $result->area; 
        $status 		    = $result->status; 	
        $prerequisitos  = $result->prerequisitos;
       	$extras  	    	= $result->extras;
       	$minicurriculo 	= $result->minicurriculo;
        /* COISAS DO RESUMO */
        $id_file        = $result->id_file;
        $nome_file      = $result->nome_file;
        $modalidade     = $result->modalidade;
       }
       $nome = explode("/", $nome_file);


       

      
    }
    else{
        header("Location:../../../entrar");
    } 

   					

?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="shortcut icon" type="image/x-icon" href="http://portal.ifrn.edu.br/favicon.ico" />
	    <meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<title> Sua Atividade </title>
		<link rel="stylesheet" href="../../../res/lib/css/bootstrap.min.css">
		<link rel="stylesheet" href="../../../res/lib/css/bootstrap-responsive.min.css">
		<link rel="stylesheet" href="../../../res/css/style.css">
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
			      <a class="navbar-brand" href="../../../">Início</a>
			    </div>
			    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			      <ul class="nav navbar-nav">
                    <!--  <li><a href="">Minhas Atividade</a></li>
                    <li><a href="">Sobre mim</a></li>
			       	-->
			       	<li><a href="../">Perfil</a></li>
			       </ul>
			        
			       <ul id="navUser" class="navbar-right navbar-nav nav">
                            <?php 
								
                                if(isset($_SESSION['email']) && isset($_SESSION['senha'])){
                                   
                                    echo "
                                    <li class='dropdown'>
                                    <a href='' class='dropdown-toggle' data-toggle='dropdown'>$user<span class='caret'></span></a>
                                    <ul class='dropdown-menu' role='menu'>
	                                    <li><a href='../ajustes/?ministrante=$ministrante'>Ajustes</a></li>
                                        <li class='divider'></li>
                                        <li><a href='../../../php/logout.php'>Sair</a></li>                                   
                                    </ul>
                                    </li>
                                    </li>"; 
                                }
                                else{
                                  echo ("<li><a href='../../cadastro/' id='cadastro'>Cadastrar</a></li>
                                  <li><a href='../../entrar/'>Entrar</a></li>");  
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
					
            <!-- TITUTLO -->
          	<?php if($titulo != ""){ ?>
              <h2><small><b>Título:</b> <?php echo $titulo;?></small></h2>
						<?php }else{?>
              <h2><small><b>Título:</b> <?php echo $nome[3];?></small></h2>
            <?php } ?>
            <hr>
           <!-- TIPO -->
          	<h3><small><b>Atividade: </b><?php echo $tipo; ?></small></h3>
						<!-- DURAÇÃO -->
            <?php if($duracao != ""){ ?>
            <h3><small><b>Duracão: </b><?php echo $duracao; ?></small></h3>
						<?php } ?>
    
            <?php if($vagas != ''){echo "<h3><small><b>Vagas: </b> $vagas </small></h3>";} ?>
						
              <!-- DURAÇÃO -->
            <?php if($area != ""){ ?>
            <h3><small><b>Área: </b><?php echo $area; ?></small></h3>
            <?php } ?>
    
						<?php if($status == 1){  echo "<h3><small><b>Status: </b>Aceito</small></h3>";
						}else{echo "<h3><small><b>Status: </b>Pendente</small></h3>";}?>
						<hr>
					</div>
				  
          <form method="POST" action="../../../php/functions.php?id=<?php echo $id ?>">
            <a href="edit/?id=<?php echo $id; ?>"><input type="button" class="activity_update_btn btn btn-default  " value="Editar Atividade"></a>
            <input name="user_delete_activity" type="submit" class="activity_update_btn btn btn-danger  pull-right" value="Excluir Atividade">
          </form>

        </div><!-- END OF PROFILE -->
        
				<div class="col-md-8">
					<h1>Mais sobre sua atividade</h1>
					
						    
                        <div class="panel panel-default">
                          <div class="panel-heading">Descrição</div>
                           <div class="panel-body">
                              <p><?php echo $descricao ?></p>
                           </div>
                         </div>

                        <div class="panel panel-default">
                          <div class="panel-heading">Pré-requisitos</div>
                           <div class="panel-body">
                              <p><?php echo $prerequisitos; ?></p>
                           </div>
                         </div>

                         <div class="panel panel-default">
                          <div class="panel-heading">Informações adicionais:</div>
                           <div class="panel-body">
                              <p><?php echo $extras; ?></p>
                           </div>
                         </div>
                
                         <div class="panel panel-default">
                          <div class="panel-heading">Meu Mini-Curriculo:</div>
                           <div class="panel-body">
                              <p><?php echo $minicurriculo; ?></p>
                           </div>
                         </div>
                        
				</div>
			</div><!-- End of row -->
		</div><!-- End Container -->

		      <footer>
            <div>
                <div class="col-md-4">
                    <div class="text-center"> 
                         <br> 
                        <h2><small>Realização</small></h2>
                        <img src="../../../res/imgs/icons/if_jc_logo.jpg" height="100" width="250" alt="">   
                    </div>  
                </div>
                <div class="col-md-4 text-center">
                    <br>  
                    <h2><small>Patrocínio e apoio</small></h2>
                    <img src="../../../res/imgs/icons/if_logo.jpg" height="100" width="250" alt="">   
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

		<script src="../../../res/lib/js/jquery.min.js"></script>
		<script src="../../../res/lib/js/bootstrap.min.js"></script>
		<script src="../../../res/js/script.js"></script>	
	</body>
</html>
 
