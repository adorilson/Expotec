<?php include_once '../../php/connection.php';  session_start();?>
<!DOCTYPE html>
<html lang="en">
	<head>
        <link rel="shortcut icon" type="image/x-icon" href="http://portal.ifrn.edu.br/favicon.ico" />
        <meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<title> Expotec 2014</title>
		<link rel="stylesheet" href="../../res/lib/css/bootstrap.min.css">
        <link rel="stylesheet" href="../../res/lib/css/bootstrap-responsive.min.css">
        
        
		<link rel="stylesheet" href="../../res/css/style.css">
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
                        <a class="navbar-brand" href="../../">Início</a>
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
                                    echo "<li><a href='../submissoes/'>Submissões</a></li>";  
                                }  
                            ?>
                            <li><a href="">Organização</a></li>
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
                                        <li><a href='../perfil'>Área do usuário</a></li>
                                        <li class='divider'></li>
                                        <li><a href='../../php/logout.php'>Sair</a></li>
                                    </ul>
                                    </li>
                                    </li>"; 
                                }
                                else{
                                  echo ("
                                    <li>
                                        <a href='../cadastro' id='cadastro'>Cadastrar</a>
                                    </li>
                                    <li>
                                        <a href='../entrar'>Entrar</a>
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
                <h1 class="text-center title">Nossa Equipe</h1>
                <div class="row ">
                    <div>
                        <center>
                            <!-- Comissão Central -->
                            <div class="team-box">
                                <ul class="nav-team">
                                <h1><small>Comissão Central </small></h1>
                                    <li>
                                        <img data-toggle="tooltip" data-placement="bottom" title="Olímpio Silva" class="team" src="../../res/imgs/Equipe/central/Olímpio_Silva.jpg" >
                                        <b><br><br><a>Coordenador Geral</a></b>
                                    </li>
                                    <li>
                                        <img data-toggle="tooltip" data-placement="bottom" title="Marcos Aurélio" class="team" src="../../res/imgs/Equipe/central/Marcos_Aurélio.jpg" >
                                        <br><br><a>Membro da Comissão</a>
                                    </li>
                                    <li>
                                        <img data-toggle="tooltip" data-placement="bottom" title="Renier Cavalcanti" class="team" src="../../res/imgs/Equipe/central/Renier_Cavalcanti.jpg" >
                                        <br><br><a>Membro da Comissão</a>
                                    </li>
                                </ul>
                            </div>

                            <!-- Comissão Cientifica -->
                            <div class="team-box">
                                <ul class="nav-team">
                                <h1><small> Comissão Científica</small></h1>
                                    <li>
                                        <img data-toggle="tooltip" data-placement="bottom" title="Ludnilson Antônio" class="team" src="../../res/imgs/Equipe/cientifica/Ludnilson_de_Jesus.jpg" >
                                        <b><br><br><a>Coordenador</a></b>
                                    </li>
                                    <li>
                                        <img data-toggle="tooltip" data-placement="bottom" title="Adorilson Bezerra" class="team" src="../../res/imgs/Equipe/cientifica/Adorilson_Bezerra.jpg" >
                                        <br><br><a>Membro da Comissão</a>
                                    </li>
                                    <li>
                                        <img data-toggle="tooltip" data-placement="bottom" title="Felipe Dantas" class="team" src="../../res/imgs/Equipe/cientifica/Felipe_Sampaio.jpg" >
                                        <br><br><a>Membro da Comissão</a>
                                    </li>

                                    <li>
                                        <img data-toggle="tooltip" data-placement="bottom" title="Annaxsuel Araújo" class="team" src="../../res/imgs/Equipe/cientifica/Annaxsuel_Araujo.jpg" >
                                        <br><br><a>Membro da Comissão</a>
                                    </li>

                                  
                                    <li>
                                        <img data-toggle="tooltip" data-placement="bottom" title="Humberto Araújo" class="team" src="../../res/imgs/Equipe/cientifica/Humberto_Araujo.jpg" >
                                        <br><br><a>Membro da Comissão</a>
                                    </li>
                                      <li>
                                        <img data-toggle="tooltip" data-placement="bottom" title="Gennisson Batista" class="team" src="../../res/imgs/Equipe/cientifica/Gennisson_Batista.jpg" >
                                        <br><br><a>Membro da Comissão</a>
                                    </li>
                                      <li>
                                        <img data-toggle="tooltip" data-placement="bottom" title="Alexandro Vladno" class="team" src="../../res/imgs/Equipe/cientifica/Alexandro_Vladno.jpg" >
                                        <br><br><a>Membro da Comissão</a>
                                    </li>
                                     
                                      <li>
                                        <img data-toggle="tooltip" data-placement="bottom" title="Marcos Vasconcelos" class="team" src="../../res/imgs/Equipe/cientifica/Marcos_Vasconcelos.jpg" >
                                        <br><br><a>Membro da Comissão</a>
                                    </li>

                                     <li>
                                        <img data-toggle="tooltip" data-placement="bottom" title="Ricardo Vilar" class="team" src="../../res/imgs/Equipe/cientifica/Ricardo_Vilar.jpg" >
                                        <br><br><a>Membro da Comissão</a>
                                    </li>
                                     <li>
                                        <img data-toggle="tooltip" data-placement="bottom" title="Gilmara Freire" class="team" src="../../res/imgs/Equipe/cientifica/Gilmara_Freire.jpg" >
                                        <br><br><a>Membro da Comissão</a>
                                    </li>
                                </ul>
                            </div>


                             <!--   comissao_de_recursos_tecnologicos -->
                            <div class="team-box">
                                <ul class="nav-team">
                                <h1><small>  Comissão de Recursos Tecnológicos </small></h1>
                                    <li>
                                        <img data-toggle="tooltip" data-placement="bottom" title="Felipe Dantas" class="team" src="../../res/imgs/Equipe/tecnologicos/Felipe_Sampaio.jpg">
                                        <b><br><br><a>Coordenador</a></b>
                                    </li>
                                    
                                     <li>
                                        <img data-toggle="tooltip" data-placement="bottom" title="Carlos Henry" class="team" src="../../res/imgs/Equipe/tecnologicos/Carlos_Henry.jpg" >
                                        <br><br><a>Membro da Comissão</a>
                                    </li>

                                    <li>
                                        <img data-toggle="tooltip" data-placement="bottom" title="Diego Oliveira" class="team" src="../../res/imgs/Equipe/tecnologicos/Diego_Oliveira.jpg">
                                        <br><br><a>Membro da Comissão</a>
                                    </li>

                                     <li>
                                        <img data-toggle="tooltip" data-placement="bottom" title="José Maria" class="team" src="../../res/imgs/Equipe/tecnologicos/José_Maria.jpg">
                                        <br><br><a>Membro da Comissão</a>
                                    </li>
                                </ul>
                            </div>

                               <!--  Comissao de Comunicacao -->
                            <div class="team-box">
                                <ul class="nav-team">
                                <h1><small> Comissão de Comunicação </small></h1>
                                    <li>
                                        <img data-toggle="tooltip" data-placement="bottom" title="Caroline Arruda" class="team" src="../../res/imgs/Equipe/comunicacao/Cris.jpg"  >
                                        <b><br><br><a>Coordenador</a></b>
                                    </li>
                                    
                                     <li>
                                        <img data-toggle="tooltip" data-placement="bottom" title="João Freitas" class="team" src="../../res/imgs/Equipe/comunicacao/Joao_Freitas.jpg" >
                                        <br><br><a>Membro da Comissão</a>
                                    </li>
                                </ul>
                            </div>

                              <!--  Comissão de Cultura  -->
                            <div class="team-box">
                                <ul class="nav-team">
                                <h1><small> Comissão de Cultura </small></h1>
                                    <li>
                                        <img data-toggle="tooltip" data-placement="bottom" title="Monique Dias" class="team" src="../../res/imgs/Equipe/cultura/Monique_Dias.jpg"  >
                                        <b><br><br><a>Coordenador</a></b>
                                    </li>
                                    
                                     <li>
                                        <img data-toggle="tooltip" data-placement="bottom" title="Francesco Lopes" class="team" src="../../res/imgs/Equipe/cultura/Francesco_Lopes.jpg" >
                                        <br><br><a>Membro da Comissão</a>
                                    </li>

                                    <li>
                                        <img data-toggle="tooltip" data-placement="bottom" title="Joicy Galvão" class="team" src="../../res/imgs/Equipe/cultura/Joicy_Galvao.jpg">
                                        <br><br><a>Membro da Comissão</a>
                                    </li>
                                </ul>
                            </div>


                              <!--   comissao_de_infraestrutura  -->
                            <div class="team-box">
                                <ul class="nav-team">
                                <h1><small>  Comissão de Infraestrutura </small></h1>
                                    <li>
                                        <img data-toggle="tooltip" data-placement="bottom" title="Agostinho Leal" class="team" src="../../res/imgs/Equipe/infraestrutura/Agostinho_Leal.jpg">
                                        <b><br><br><a>Coordenador</a></b>
                                    </li>
                                    
                                     <li>
                                        <img data-toggle="tooltip" data-placement="bottom" title="Éliton Costa" class="team" src="../../res/imgs/Equipe/infraestrutura/Éliton_Costa.jpg" >
                                        <br><br><a>Membro da Comissão</a>
                                    </li>

                                    <li>
                                        <img data-toggle="tooltip" data-placement="bottom" title="Joelson Ernesto" class="team" src="../../res/imgs/Equipe/infraestrutura/Joelson_Ernesto.jpg">
                                        <br><br><a>Membro da Comissão</a>
                                    </li>

                                     <li>
                                        <img data-toggle="tooltip" data-placement="bottom" title="Rafael Varela" class="team" src="../../res/imgs/Equipe/infraestrutura/Rafael_Varela.jpg">
                                        <br><br><a>Membro da Comissão</a>
                                    </li>
                                </ul>
                            </div>

                            

                             <!--  comissao_de_transporte_e_hospedagem -->
                            <div class="team-box">
                                <ul class="nav-team">
                                <h1><small>   Comissão de Transporte e Hospedagem </small></h1>
                                    <li>
                                        <img data-toggle="tooltip" data-placement="bottom" title="Iranilson Brito" class="team" src="../../res/imgs/Equipe/transporte/Iranilson_Brito.jpg">
                                        <b><br><br><a>Coordenador</a></b>
                                    </li>
                                    
                                     <li>
                                        <img data-toggle="tooltip" data-placement="bottom" title="Denise Cristina" class="team" src="../../res/imgs/Equipe/transporte/Denise_Cristina.jpg" >
                                        <br><br><a>Membro da Comissão</a>
                                    </li>

                                </ul>
                            </div>
                           

                        </center>
                    </div>
                </div>
            </div> <!-- End of Row -->
        </div><!-- End of container -->
            















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
