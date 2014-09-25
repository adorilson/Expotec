<?php include_once '../../../php/connection.php'; ?>
<?php 
    session_start();

    if(isset($_SESSION['nome']) && isset($_SESSION['senha']) ) {
        $tipo = $_SESSION['tipo'];
    }
    else{
        header("Location:../../entrar");
    }                       
?>

<!DOCTYPE html>
<html lang="en">
	<head>
        <link rel="shortcut icon" type="image/x-icon" href="http://portal.ifrn.edu.br/favicon.ico" />
        <meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<title> Expotec </title>
		<link rel="stylesheet" href="../../../res/lib/css/bootstrap.min.css">
        <link rel="stylesheet" href="../../../res/lib/css/bootstrap-responsive.min.css">
        
        
		<link rel="stylesheet" href="../../../res/css/style.css">
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
                        <a class="navbar-brand" href="../../../">Expotec</a>
                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav navbar-left">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Atividades<span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="../../../aviso/">Palestras</a></li>
                                    <li class="divider"></li>
                                    <li><a href="../../../aviso/">Mini Cursos</a></li>
                                </ul>
                            </li>
                            <li><a href="../../../aviso/">Palestrantes</a></li>
                            <?php  
                                if(isset($_SESSION['nome']) && isset($_SESSION['senha'])){
                                    $tipo = $_SESSION['tipo'];
                                    
                                    if($tipo == 2){
                                        echo "<li><a href='../'>Submissões</a></li>";
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
                                        <li><a href='../../../php/logout.php'>Sair</a></li>
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
                    <h1 class="title"> Submissão de palestra </h1>
                    <!-- formulário de submissão -->
                 <form action="../../../php/functions.php?Atividade=Palestra&User=<?php echo $user; ?>" method="post" >
                            <div class="div-form">
                                <label >Titulo:</label>
                                <input name="titulo" type="text" class="form-control inputNorm" required placeholder="Titilo da minha palestra...">   
                            </div>

                            <div class="div-form">
                                <label>Softwares:</label>
                                <input name="softwares" type="text" class="form-control inputNorm"  required placeholder="Softwares que usarei...">  
                            </div>

                            <div class="div-form">
                                <label>Local:</label>
                                <input name="local" type="text" class="form-control inputNorm"  required placeholder="Onde será minha pelestra...">  
                            </div>

                             <div class="div-form">
                                <label>Vagas:</label>
                                <input name="vagas" type="text" class="form-control inputNorm"  required placeholder="Número de vagas...">  
                            </div>


                            <div class="div-form">
                                <label for="resumo">Resumo:</label>
                                <textarea name="resumo" id="resumo"  rows="5" placeholder="Resumo da minha palestra..." required></textarea>
                            </div>

                            
                            
                            <div class="div-form">
                                <select class="inputNorm" name="dia" id="dia" required>
                                    <option value="">Dia da palestra</option>
                                    <option id="dia_um"   name="primeiro" value="primeiro">1° dia</option>
                                    <option id="dia_dois" name="segundo" value="segundo">2° dia</option>
                                    <option id="dia_tres" name="terceiro" value="terceiro">3° dia</option>
                                </select> - <b>Horario:</b> 

                                <input name="init_horario" type="text" class=" inputNorm horario"  required placeholder="Início (13:00)"> <b>até</b>
                                <input name="end_horario" type="text" class=" inputNorm horario"  required placeholder="Término (14:00)">  
                              
                            </div>
                            

                            <div class="div-form">
                                <input name="cadastrarAtividade" type="submit"  class="btn btn-success inputNorm" value="Salvar">
                                <input type="button" id="btn_cancel_palestra" class="btn btn-danger inputNorm pull-right" value="Cancelar"  >
                            </div>
                        </form>
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
        

		
                   

		<script src="../../../res/lib/js/jquery.min.js"></script>
		<script src="../../../res/lib/js/bootstrap.min.js"></script>
		<script src="../../../res/js/script.js"></script>
	</body>
</html>