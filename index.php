<?php include_once 'php/connection.php';  session_start();?>
<!DOCTYPE html>
<html lang="en">
	<head>
        <link rel="shortcut icon" type="image/x-icon" href="http://portal.ifrn.edu.br/favicon.ico" />
        <meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<title> Expotec 2014</title>
		<link rel="stylesheet" href="res/lib/css/bootstrap.min.css">
        <link rel="stylesheet" href="res/lib/css/bootstrap-responsive.min.css">
        
        
		<link rel="stylesheet" href="res/css/style.css">
	</head>
	<body>

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
                        <a class="navbar-brand" href="">Início</a>
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
                                     <li class="divider"></li>
                                    <li><a href="aviso/">Oficinas</a></li>
                                </ul>
                            </li>
                            <li><a href="aviso/">Palestrantes</a></li>
                            <?php  
                                if(isset($_SESSION['nome']) && isset($_SESSION['senha'])){
                                    echo "<li><a href='view/submissoes/'>Submissões</a></li>";  
                                }  
                            ?>
                            <li><a href="view/organizacao/">Organização</a></li>
                            <li><a target="_blank" href="http://portal.ifrn.edu.br/"> Portal IFRN </a></li>  
                        </ul>
                        <ul id="navUser" class="navbar-right navbar-nav nav">
                            <?php 
                               
                                if(isset($_SESSION['nome']) && isset($_SESSION['senha'])){
                                    $user = $_SESSION['nome']; 
                                    echo "
                                    <li class='dropdown'>
                                    <a href='' class='dropdown-toggle' data-toggle='dropdown'>$user<span class='caret'></span></a>
                                    <ul class='dropdown-menu' role='menu'>
                                        <li><a href='view/perfil'>Área do usuário</a></li>
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
    
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2" class="active"></li>
            </ol>
            
            <div class="carousel-inner">
                <div class="item active">
                    <img class="slide-image" src="res/imgs/carousel/01.png">
                </div>
                <div class="item ">
                    <img class="slide-image" src="res/imgs/carousel/13.jpg">
                </div>
                <div class="item ">
                    <img class="slide-image" src="res/imgs/carousel/08.jpg" >
                </div>
             
            </div>
            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                <span></span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                <span ></span>
            </a>
        </div>
             
               <!-- End of carousel -->
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    
                        <div class="row">
                            <h1 class=" title visible-md visible-lg"> Seja bem vindo(a)!  </h1>
                            <h2 class=" title visible-sm visible-xs"> Seja bem vindo(a)!  </h2> 
                            <div class="alert col-md-12" >  
                                <div class="home-text">
                                    <p>
                                    A Exposição Científica, Tecnológica e Cultural – <b>EXPOTEC</b> – constitui um dos mais 
                                    relevantes eventos do calendário acadêmico de extensão do Instituto Federal de
                                     Educação, Ciência e Tecnologia do Rio Grande do Norte – IFRN. <br><br>
                                    Realizado anualmente por cada um dos campus do Instituto, a exposição destina-se a apresentar,
                                     ao público em geral, um mostra da produção acadêmico-científico-cultural dos alunos e servidores
                                      da instituição. <br><br>
                                    A EXPOTEC mostra-se, portanto, no intento de estimular, ampliar e aprofundar a integração
                                     dos diversos grupos e áreas de conhecimento atuantes no IFRN, abrindo espaço para troca de
                                      experiências e aprofundamento das discussões internas, visando                                
								      a articulação entre <b>ensino, pesquisa e extensão,</b> através do intercâmbio entre a escola, indústria
                                       e comunidade em geral. <br><br>
                                    Nesse sentido, é com imenso orgulho e júbilo que o <b>Campus João Câmara</b> do IFRN anuncia e convida 
                                    à todos para sua 3ª edição da EXPOTEC, sob o tema: <b>“Educação, Inovação e Sustentabilidade: 
                                    semeando oportunidades na região do Mato Grande”</b>.<br><br>
                                    Realizada num momento singular da história desse Campus – comemoração de seu aniversário de 5 anos
                                     – uma programação toda especial foi cuidadosamente planejada para você, nessa edição especial da mostra.
                                    Palestras, Minicursos, Oficinas, Programações Culturais, Stands de empresas, livrarias, exposições, shows e 
                                    muito mais.<br><br>
                                    A 3ª Expotec, edição especial de aniversário de 5 anos do Campus João Câmara, acontecerá 
                                    entre os dias 26 e 28 de novembro, na nossa casa. 
                                    A exposição é totalmente aberta e gratuita à visitação de Escolas, bem como de toda comunidade
                                     em geral! <br><br>
									Esperamos por vocês!
                                     </p>
                                </div>
                            </div>
                        </div>
                        <h1 class=" title visible-md visible-lg"> Fique por dentro! </h1>
                        <h2 class=" title visible-sm visible-xs">Fique por dentro! </h2> 
                        <div class="row alert">
                            <div class="col-md-6">
                                <div class="thumbnail">
                                   <img src="res/imgs/news/01.jpg"  >
                                   <div class="caption">
                                     <h3>Chamada de trabalhos</h3>
                                     <p align="justify">Estão abertas as chamadas de trabalhos para a III Expotec do campus João Câmara, nas seguintes categorias: Palestra, Minicurso, Oficina e Resumo (<a target="_blank" href="files/normas_resumo_expotecjc.doc">Confira aqui</a> as normas para envio de resumos). <br><br> Para submeter, você deve realizar o cadastro no site e acessar a área de submissões. </p>
                                       <p>
                                        <hr>
                                       <a href="#" class="btn btn-danger" role="button">Saiba mais</a>
                                       
                                       </p>
                                   </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                              <div class="thumbnail">
                                <img src="res/imgs/news/02.jpg" >
                                <div class="caption">
                                  <h3>Inscrições</h3>
                                  <p>Em breve!</p>
                                    <p>
                                    <hr>
                                    <a href="#" class="btn btn-danger" role="button">Saiba mais</a>
                                   
                                    </p>
                                </div>
                              </div>
                            </div>
                        </div>
                    </div><!-- Fix News -->
                
                <!-- Little News -->
                <div class="row">
                    <div class="col-md-4 "> 
                        <h1 class=" title visible-md visible-lg"> Notícias </h1>
                        <h2 class=" title visible-sm visible-xs">Notícias </h2>  
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
                </div><!-- End News -->

            </div> <!-- End of Row -->
        </div><!-- End of container -->
            
            
             
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
                    <img src="res/imgs/icons/ifrn2.png" height="100" width="250" alt="">   
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
		<script src="res/lib/js/jquery.min.js"></script>
		<script src="res/lib/js/bootstrap.min.js"></script>
		<script src="res/js/script.js"></script>
	</body>
</html>
