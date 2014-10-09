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
        <title> Submissão</title>
        <link rel="stylesheet" href="../../../res/lib/css/bootstrap.min.css">
        <link rel="stylesheet" href="../../../res/lib/css/bootstrap-responsive.min.css">
        
        
        <link rel="stylesheet" href="../../../res/css/style.css">
    </head>
    <body class="body-submissions">

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
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav navbar-left">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Atividades<span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="../../../aviso/">Palestras</a></li>
                                    <li class="divider"></li>
                                    <li><a href="../../../aviso/">Mini Cursos</a></li>
                                    <li class="divider"></li>
                                    <li><a href="../../../aviso/">Oficinas</a></li>
                                </ul>
                            </li>
                            <li><a href="../../../aviso/">Palestrantes</a></li>
                            <?php  
                                if(isset($_SESSION['nome']) && isset($_SESSION['senha'])){
                                    echo "<li><a href='../'>Submissões</a></li>";
                                }
                            ?>
                             <li><a href="../../organizacao/">Organização</a></li>
                            <li><a target="_blank" href="http://portal.ifrn.edu.br/"> Portal IFRN </a></li>  
                        </ul>
                        <ul id="navUser" class="navbar-right navbar-nav nav">
                            <?php 
                                
                                if(isset($_SESSION['nome']) && isset($_SESSION['senha'])){
                                    $user           = $_SESSION['nome']; 
                                    echo "
                                    <li class='dropdown'>
                                    <a href='' class='dropdown-toggle' data-toggle='dropdown'>$user<span class='caret'></span></a>
                                    <ul class='dropdown-menu' role='menu'>
                                        <li><a href='../../perfil'>Área do usuário</a></li>
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
                    <h1 class="title"> Submissão de Proposta da Oficina </h1>
                    <!-- formulário de submissão -->
                 <form action="../../../php/functions.php?Atividade=oficina&User=<?php echo $user; ?>" method="post" >
                            <div class="div-form">
                                <label >Título:</label>
                                <input name="titulo" type="text" class="form-control inputNorm" required placeholder="Título da oficina...">   
                            </div>
                            

                            <div class="div-form">
                                <label>Vagas:</label>
                                <input name="vagas" type="text" class="form-control inputNorm"  required placeholder="Número de vagas...">  
                            </div>
                            
                            <div class="div-form">
                                <label>Área:</label>
                                <select name="area" class="form-control inputNorm " required>
                                   <option value="">Selecione aqui...</option>
                                    <option value="Administração">Administração</option>
                                    <option value="Artes">Artes</option>
                                    <option value="Ciências Biologicas">Ciências Biológicas</option>
                                    <option value="Ciências da Natureza">Ciências da Natureza</option>
                                    <option value="Ciências Exatas e da Terra">Ciências Exatas e da Terra</option>
                                    <option value="Ciências Humanas">Ciências Humanas</option>
                                    <option value="Energias Renováveis">Energias Renováveis</option>
                                    <option value="Eletrotécnica">Eletrotécnica</option>
                                    <option value="Física">Física</option>
                                    <option value="Informática">Informática</option>
                                    <option value="Letras e Linguística">Letras e Linguística</option>
                                </select>
                            </div>
                                    
                              <div class="div-form">
                                <label>Duração:</label>
                                <select name="duracao" class="form-control inputNorm " required>
                                    <option value="">Selecione aqui...</option>
                                    <option value="1h">1h</option>
                                    <option value="2h">2h</option>
                                    <option value="3h">3h</option>
                                </select>
                            </div> 
                           
                             <div id="escolha-pre-requisitos" class="div-form alert-success">
                                <label>Existem pré-requisitos?</label><br>
                                <input type="radio" name="req" value="sim" id="sim"><label for="sim" >Sim</label> <br>   
                                <input type="radio" name="req" value="nao" id="nao"><label for="nao" >Não</label>
                            </div> 
                            <div id="pre-requisitos" class="div-form alert-success">
                                <label>Pré-requisitos</label><button type="button" id="cancel_submission_activity" class="btn close">&times;</button>
                                <textarea name="prerequisitos" class="resumo"  rows="5" placeholder="Pré-requisitos para sua oficina" ></textarea>
                            </div> 
                           
                           
                            <div class="div-form">
                                <label for="resumo">Descrição:</label>
                                <textarea name="resumo" class="resumo"  rows="5" placeholder="Forneça um breve resumo da oficina proposto..." required></textarea>
                            </div>

                             <div class="div-form">
                                <label>Mini-Curriculo do Instrutor:</label>
                                <textarea name="minicurriculo" class="resumo"  rows="5" placeholder="Forneça uma breve descrição de sua experiência e qualificação... " required></textarea>
                            </div>

                            <div class="div-form">
                                <label>Informações adicionais:</label>
                                <input id="extras" name="extras" type="text" class="form-control inputNorm"  data-toggle="tooltip" data-placement="left" title="Não é obrigatório"   placeholder="Informe o que irá precisar (Ex: Quadro branco, projetor, computadores, etc...)
"> 
                            </div>
                           
                          
                            <!-- DATA E HORA DO MINICURSO -->

                            <div class="div-form">
                                <input name="cadastrarAtividade" type="submit"  class="btn btn-success inputNorm" value="Enviar">
                                <input type="button" class="btn_cancel_atividade btn btn-danger inputNorm pull-right" value="Cancelar"  >
                            </div>
                        </form>
                </div>
                <div class="col-md-2"><!-- encher linguiça --></div>
            </div>
        </div>

              
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
