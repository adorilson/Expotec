<?php include_once '../../php/connection.php'; ?>
<!DOCTYPE html>
<html lang="en">
	<head>
        <link rel="shortcut icon" type="image/x-icon" href="http://portal.ifrn.edu.br/favicon.ico" />
        <meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<title> Expotec </title>
		<link rel="stylesheet" href="../../res/lib/css/bootstrap.min.css">
        <link rel="stylesheet" href="../../res/lib/css/bootstrap-responsive.min.css">
        
        
		<link rel="stylesheet" href="../../res/css/style.css">
	</head>
	<body class="body-submissions">
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
                        <ul class="nav navbar-nav navbar-left">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Atividades<span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="../../aviso/">Palestras</a></li>
                                    <li class="divider"></li>
                                    <li><a href="../../aviso/">Mini Cursos</a></li>
                                </ul>
                            </li>
                            <li><a href="../../aviso/">Palestrantes</a></li>
                            <li><a href="">Submissões</a></li>
                            <li><a href="">Sobre</a></li>
                            <li><a target="_blank" href="http://portal.ifrn.edu.br/"> Portal IFRN </a></li>  
                        </ul>
                        <ul id="navUser" class="navbar-right navbar-nav nav">
                            <?php 
                                session_start();
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
                                        <li><a href='../../php/logout.php'>Sair</a></li>
                                    </ul>
                                    </li>
                                    </li>"; 
                                }
                                else{
                                  echo ("
                                    <li>
                                        <a href='../../cadastro' id='cadastro'>Cadastrar</a>
                                    </li>
                                    <li>
                                        <a href='../../entrar'>Entrar</a>
                                    </li>");  
                                }
                            ?>
                        </ul>
                             
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>
        </header>
        

        <div class="container">
            <div class="row">
                <div class="col-md-2"><!-- encher linguiça --></div>

                <div class="col-md-8 alert">
                    <h1 class="title"> Submissão de atividades </h1>
                    <div class="nav-submissions">
                        <ul>
                            <li><a href="minicurso/">Minicursos</a></li>
                            <li><a href="palestra/">Palestras</a></li>
                            <li><a href="">outros</a></li>
                            <li><a href="">outros</a></li>
                        </ul>
                    </div>
                </div>
                
                <div class="col-md-2"><!-- encher linguiça --></div>
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