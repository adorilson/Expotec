<?php include_once '../../php/connection.php';  ?>
<?php 
    session_start();
    if(!isset($_SESSION['user']) && !isset($_SESSION['pass'])){
         echo "<script>window.location= '../../';'</script>";
    } 

?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="shortcut icon" type="image/x-icon" href="http://portal.ifrn.edu.br/favicon.ico" />
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title> Notícias</title>
        <link rel="stylesheet" href="../../res/lib/css/bootstrap.min.css">
        <link rel="stylesheet" href="../../res/lib/css/bootstrap-responsive.min.css">
        <link rel="stylesheet" href="../../res/css/style.css">
    </head>
    <body>
         <header class="main-header container">
            <h1 class="title-adm">Notícias</h1>
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
                            <li><a href="../submissoes/">Submissões</a></li>
                            <li><a href="../noticias/">Notícias</a></li>
                            
                        </ul>
                        <ul id="navUser" class="navbar-right navbar-nav nav">
                            <?php 
                                if(isset($_SESSION['user']) && isset($_SESSION['pass'])){
                                    $user = $_SESSION['user']; 
                                
                                    echo "
                                    <li>
                                        <li><a href='../../php/logout.php'>Sair</a></li>
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

        <div class="container main-content ">
            <br>
            <div class="col-md-2"></div>
            <div class="alert col-md-8" >

                <div class="row">
                <br><br>
                <a href="nova/" class="btn btn-success pull-right">Nova notícia</a>
                <br><br>
                
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Titulo</th>
                            <th>Data</th>
                            <th>Editar</th>
                            <th></th>
                         </tr>
                    </thead>
                    <tbody>
                        
                    <?php                             
                            $command = "SELECT * FROM noticia ORDER BY id DESC";
                            try {
                                $query = $pdo->prepare($command);
                                $query->execute();
                            } catch (PDOException $e) {
                                echo $e->getMessage();
                            }
                            $row = $query->RowCount();

                            if($row > 0){
                            while ($result = $query->fetch(PDO::FETCH_OBJ)) {
                            $data = $result->data; 

                            ?>
                            <tr>
                                <td> <?php echo $result->titulo; ?> </td>
                                <td> <?php echo $data;?> </td>
                                        
                                 <form action="nova/?id=<?php echo $result->id;?>" method="POST">
                                    <td><input name="edit_news" class=" btn btn-default" type="submit" value="Editar"></td>
                                </form>
                                 <form action="../../php/functions.php?id=<?php echo $result->id;?>" method="POST">
                                    <td><input name="delete_news" class="delete_news close  btn" type="submit" value="&times;"></td>        
                                </form>
                            </tr>
                        <?php }  } else{ echo "<h4 class='title-adm' style='margin-bottom:30px; color:#999'>Nenhuma notícia ainda...</h4>";}?>
                    </tbody>
                  </table>
              </div>
            </div>
             <div class="col-md-2"></div>
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
        <script src="../../res/lib/js/bootstrap.js"></script>
        <script src="../../res/js/script.js"></script>
         
</body>
</html>