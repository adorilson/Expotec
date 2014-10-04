<?php include_once 'php/connection.php';  session_start();?>
<!DOCTYPE html>
<html lang="en">
	<head>
        <link rel="shortcut icon" type="image/x-icon" href="http://portal.ifrn.edu.br/favicon.ico" />
        <meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<title> Expotec </title>
		<link rel="stylesheet" href="res/lib/css/bootstrap.min.css">
        <link rel="stylesheet" href="res/lib/css/bootstrap-responsive.min.css">
        
        
		<link rel="stylesheet" href="res/css/style.css">
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
                        <a class="navbar-brand" href="">Expotec</a>
                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav navbar-left">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Atividades<span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="aviso/">Palestras</a></li>
                                    <li class="divider"></li>
                                    <li><a href="aviso/">Mini Cursos</a></li>
                                </ul>
                            </li>
                            <li><a href="aviso/">Palestrantes</a></li>
                            <?php  
                                if(isset($_SESSION['nome']) && isset($_SESSION['senha'])){
                                    $tipo = $_SESSION['tipo'];
                                    
                                    if($tipo == 2){
                                        echo "<li><a href='view/submissoes/'>Submissões</a></li>";
                                    }
                                }  
                            ?>
                            <li><a href="">Sobre</a></li>
                            <li><a target="_blank" href="http://portal.ifrn.edu.br/"> Portal IFRN </a></li>  
                        </ul>
                        <ul id="navUser" class="navbar-right navbar-nav nav">
                            <?php 
                               
                                if(isset($_SESSION['nome']) && isset($_SESSION['senha'])){
                                    $user = $_SESSION['nome']; 
                                    echo "
                                    <li class='dropdown'>
                                    <a href='' class='dropdown-toggle' data-toggle='dropdown'>Olá $user<span class='caret'></span></a>
                                    <ul class='dropdown-menu' role='menu'>
                                        <li><a href=''>Minhas atividades</a></li>
                                        <li class='divider'></li>
                                        <li><a href='php/logout.php'>Sair</a></li>
                                    </ul>
                                    </li>
                                    </li>"; 
                                }
                                else{
                                  echo ("
                                    <li>
                                        <a href='view/cadastro' id='cadastro'>Cadastrar</a>
                                    </li>
                                    <li>
                                        <a href='view/entrar'>Entrar</a>
                                    </li>");  
                                }
                            ?>
                        </ul>
                             
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>
        </header>
        <!--  
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
            </ol>
            
            <div class="carousel-inner">
                <div class="item active">
                    <img class="slide-image" src="res/imgs/10721373_917247608304435_1233310086_n.jpg" height="960" width="695">
                </div>
             
            </div>
            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                <span></span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                <span> </span>
            </a>
        </div>
            -->    
               <!-- End of carousel -->
        <div class="container"> 
              
        <!-- LOGO -->
        <br>
        <img src="res/imgs/log.jpg" height="421" width="600" alt="">
            
            <h1 class=" title visible-md visible-lg"> O que é a Expotec?  </h1>
            <h2 class=" title visible-sm visible-xs"> O que é a Expotec? </h2> 
            <div class="alert col-md-8" >  
                <div class="home-text">
                    <p>
                        A EXPOTEC é uma exposição realizada anualmente por cada Campus do IFRN e tem por objetivo principal socializar
                        as experiências científicas, tecnológicas e culturais dos pesquisadores, professores e estudantes da Rede de 
                        Educação Profissional, Científica e Tecnológica. Neste ano, o Campus João Câmara promove a terceira edição desse evento,
                        a qual acontecerá nos dias 26, 27 e 28 de novembro, cujo tema é "Educação,
                        Inovação e Sustentabilidade: Semeando oportunidades na região do Mato Grande.
                        A 3ª Expotec estará aberta à visitação de escolas como também do público em geral que tenham interesse em 
                        conferir os projetos finalizados ou em andamento, os quais estimulam o desenvolvimento tecnológico, industrial e 
                        cultural do Estado do Rio Grande do Norte.
                     </p>
                </div>
            </div>
            <div class="col-md-4">  
                <div class="alert">
                    <?php 
                        try {
                            $command = "SELECT * FROM noticia ORDER BY id DESC";
                            $query = $pdo->prepare($command);
                            $query->execute();
                        } catch (PDOException $e) {
                            echo $e->getMessage();
                        }
                        $row = $query->RowCount();
                        if($row == 0){
                            echo "<h3 style='text-align:center'><small> Nenhuma notícia ainda... </small></h3>";
                        }
                        else if($row > 0){
                            while($result = $query->fetch(PDO::FETCH_OBJ)){
                                $date      = $result->data;
                                
                     ?>
                    <h3 class="news"><?php  echo $result->titulo; ?></h3> 
                    <h5><small>Postado em: <?php echo $date; ?></small></h5>
                    <br>
                        <p>
                            <?php echo $result->texto; ?>
                        </p>
                        <hr>
                    <?php } } ?>
                    
                </div>
            </div>
        </div> 
        
    
        <footer>
            <div class="content">
                <div class="text-center"> 
                   <!--  <img src="res/imgs/icons/logo.jpg" height="44" width="50" alt=""> -->
                    <p class="text-muted">© 2014 IFRN</p>
                    <p title=":p" class="text-muted">Desenvolvedor: <a target="_blank" href="https://github.com/Hikee">Carlos Henry</a></p>
                </div>  
            </div>
        </footer>
        

		
                   

		<script src="res/lib/js/jquery.min.js"></script>
		<script src="res/lib/js/bootstrap.min.js"></script>
		<script src="res/js/script.js"></script>
	</body>
</html>