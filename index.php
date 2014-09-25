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
                                        <li><a href=''>Configurações</a></li>
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
        <!-- Carousel --> 
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="item active">
                    <img class="slide-image" src="res/imgs/carousel/02.jpg">
                </div>
                
            </div>
            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                <span></span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                <span> </span>
            </a>
        </div><!-- End of carousel -->
        <div class="container"> 
            <h1 class=" title visible-md visible-lg"> Novidades  </h1>
            <h2 class=" title visible-sm visible-xs"> Novidades </h2> 
            <div class="alert col-md-8" >  
                <h2>Conteúdo e Apresentação</h2>
                <div>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. At recusandae consectetur laudantium optio cupiditate corrupti a tempora nihil. Itaque amet quae autem numquam tenetur dolorem fugit laudantium quaerat pariatur labore!
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. At recusandae consectetur laudantium optio cupiditate corrupti a tempora nihil. Itaque amet quae autem numquam tenetur dolorem fugit laudantium quaerat pariatur labore!
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. At recusandae consectetur laudantium optio cupiditate corrupti a tempora nihil. Itaque amet quae autem numquam tenetur dolorem fugit laudantium quaerat pariatur labore!
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. At recusandae consectetur laudantium optio cupiditate corrupti a tempora nihil. Itaque amet quae autem numquam tenetur dolorem fugit laudantium quaerat pariatur labore!
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. At recusandae consectetur laudantium optio cupiditate corrupti a tempora nihil. Itaque amet quae autem numquam tenetur dolorem fugit laudantium quaerat pariatur labore!
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. At recusandae consectetur laudantium optio cupiditate corrupti a tempora nihil. Itaque amet quae autem numquam tenetur dolorem fugit laudantium quaerat pariatur labore!
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. At recusandae consectetur laudantium optio cupiditate corrupti a tempora nihil. Itaque amet quae autem numquam tenetur dolorem fugit laudantium quaerat pariatur labore!
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. At recusandae consectetur laudantium optio cupiditate corrupti a tempora nihil. Itaque amet quae autem numquam tenetur dolorem fugit laudantium quaerat pariatur labore!
                    </p>
                </div>
            </div>
        
            <div class="col-md-4">  
                <div class="alert">
                    <h3 class="news">Notícia 1</h3> 
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab eveniet ducimus fugit beatae obcaecati cum, fuga consequuntur nam atque voluptatem officiis praesentium consectetur voluptatum, velit sit voluptate omnis provident blanditiis.
                    </p>
                    <div class="media">
                        <a class="pull-left">
                            <img   class="media-object" src="">
                        </a>
                        <div>
                            <h4>Media heading</h4>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sint quam laudantium harum, suscipit eveniet quidem vitae recusandae consequuntur adipisci atque, dignissimos reiciendis minima odio! Dolorem distinctio quidem porro velit a.
                            </p>
                        </div>
                    </div>
                    <hr>
                    <h3 class="news">Notícia 2</h3> 
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab eveniet ducimus fugit beatae obcaecati cum, fuga consequuntur nam atque voluptatem officiis praesentium consectetur voluptatum, velit sit voluptate omnis provident blanditiis.
                        officiis praesentium consectetur voluptatum, velit sit voluptate omnis provident blanditiis.
                    </p>    
                    <hr>    
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
        

		
                   

		<script src="res/lib/js/jquery.min.js"></script>
		<script src="res/lib/js/bootstrap.min.js"></script>
		<script src="res/js/script.js"></script>
	</body>
</html>