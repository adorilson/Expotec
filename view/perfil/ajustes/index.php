<?php include_once '../../../php/connection.php'; ?>
<?php 
    session_start();

    if(isset($_SESSION['email']) && isset($_SESSION['senha']) ) {
       
       try {
       		$id  			= $_SESSION['id_u'];
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
		<title> <?php echo $nome; ?></title>
		<link rel="stylesheet" href="../../../res/lib/css/bootstrap.min.css">
		<link rel="stylesheet" href="../../../res/lib/css/bootstrap-responsive.min.css">
		<link rel="stylesheet" href="../../../res/css/style.css">
	
		 <script>
            function selecionar(op)
				{
					var sel = document.getElementById("sexo");
					
					for (var i = 0; i < sel.options.length; i++)
					{
						if (sel.options[i].value == op)
						{
							sel.options[i].selected = "true";
							break;
						}
					}
				}
		</script>
	</head>
	<body class="body-perfil" onload="selecionar('<?php echo$s ?>')">
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
                                    <a href='' class='dropdown-toggle' data-toggle='dropdown'>$nome<span class='caret'></span></a>
                                    <ul class='dropdown-menu' role='menu'>
	                                    <li><a href=''>Ajustes</a></li>
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
			<?php if($tipo == 0){ ?>
			<div class="container">
			<div class="row">
				<div class="col-md-2 "></div>
				<div id="div_cadastro_login" class="col-md-8 alert cadastro">						
					<h1> Altere seus dados aqui... </h1>
					<div class="row">
						<form action="../../../php/functions.php?id=<?php echo $id ?>&tipo=<?php echo $tipo; ?>" method="post" class="form-cadastro" >

							<div class="div-form">
                                <label for="nome">CPF:</label>
                                <input name="cpf" type="text"  maxlength="14" class="form-control inputNorm" value="<?php echo $cpf;?>" OnKeyPress="formatar('###.###.###-##', this)">
                            </div>


							<div class="div-form">
								<label for="nome">Email:</label>
								<input name="email"  id="email" type="email" class="form-control inputNorm"   value="<?php echo $email; ?> ">	
							</div>
							
						
							<div class="div-form" >
								<label>Sexo:</label><br>
								<select class="inputNorm" name="sexo" id="sexo" >
									<option >Selecione aqui...</option>
									<option value="m">Masculino</option>
									<option value="f">Feminino</option>
								</select>
							</div>
							
							
							<div class="div-form">
								<label >Idade:</label>
								<input name="idade" type="text" class="form-control inputNorm" value="<?php echo $idade; ?>">	
							</div>
							
							<div class="div-form">
								<input name="update_user" type="submit"  class="btn btn-success inputNorm" value="Atualizar">
								<input type="button" id="btn_cancel" class="btn btn-danger inputNorm pull-right" value="Cancelar"  >
							</div>
							
							</form>	
						</div>	
					</div>
				<div class="col-md-2"></div><!-- encher linguiça -->
			</div><!-- end of row -->
		</div><!-- end of container -->
		<?php } ?><!-- TYPE 0 -->

		<?php if($tipo == 1 || $tipo == 2){ ?>
			<div class="container">
			<div class="row">
				<div class="col-md-2 "></div>
				<div id="div_cadastro_login" class="col-md-8 alert cadastro">						
					<h1> Altere seus dados aqui... </h1>
					<div class="row">
						<form action="../../../php/functions.php?id=<?php echo $id ?>&tipo=<?php echo $tipo; ?>" method="post" class="form-cadastro" >


							<div class="div-form">
								<label >Matricula:</label>
								<input name="matricula" type="text" class="form-control inputNorm" value="<?php echo$matricula; ?> ">	
							</div>
							

							<div class="div-form">
                                <label for="nome">CPF:</label>
                                <input name="cpf" type="text"  maxlength="14" class="form-control inputNorm" value="<?php echo $cpf;?>" OnKeyPress="formatar('###.###.###-##', this)">
                            </div>


							<div class="div-form">
								<label for="nome">Email:</label>
								<input name="email"  id="email" type="email" class="form-control inputNorm"   value="<?php echo $email; ?> ">	
							</div>
							
							
							<div class="div-form" >
								<label>Sexo:</label><br>
								<select class="inputNorm" name="sexo" id="sexo" >
									<option >Selecione aqui...</option>
									<option value="m">Masculino</option>
									<option value="f">Feminino</option>
								</select>
							</div>
							
							
							<div class="div-form">
								<label >Idade:</label>
								<input name="idade" type="text" class="form-control inputNorm" value="<?php echo $idade; ?>">	
							</div>
							
							<div class="div-form">
								<input name="update_user" type="submit"  class="btn btn-success inputNorm" value="Atualizar">
								<input type="button" id="btn_cancel" class="btn btn-danger inputNorm pull-right" value="Cancelar"  >
							</div>
							
							</form>	
						</div>	
					</div>
				<div class="col-md-2"></div><!-- encher linguiça -->
			</div><!-- end of row -->
		</div><!-- end of container -->
		<?php } ?><!-- TYPE 1 -->

      
             
        <footer>
            <div>
                <div class="col-md-4">
                    <div class="text-center"> 
                         <br> 
                        <h2><small>Realização</small></h2>
                        <img src="res/imgs/icons/if_jc_logo.jpg" height="100" width="250" alt="">   
                    </div>  
                </div>
                <div class="col-md-4 text-center">
                    <br>  
                    <h2><small>Patrocínio e apoio</small></h2>
                    <img src="res/imgs/icons/if_logo.jpg" height="100" width="250" alt="">   
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
 
