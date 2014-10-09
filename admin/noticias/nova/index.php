<?php include_once '../../../php/connection.php';  ?>
<?php 
    session_start();
    if(!isset($_SESSION['user']) && !isset($_SESSION['pass'])){
        echo "<script>window.location= '../../../';'</script>";
    } 

?>
<!DOCTYPE html>
<html>
	<head>
        <link rel="shortcut icon" type="image/x-icon" href="http://portal.ifrn.edu.br/favicon.ico" />
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title> Poste Notícias </title>

		<link rel="stylesheet" href="../../../res/lib/css/bootstrap.min.css">
		<link rel="stylesheet" href="../../../res/lib/css/bootstrap-responsive.min.css">
		<link rel="stylesheet" href="../../../res/css/style.css">
		
	</head>
	<body>
		 <header class="main-header container">
          	<h1 class="title-adm">Poste uma notícia...</h1>
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
                            <li><a href="../../submissoes/">Submissões</a></li>
							<li><a href="../">Notícias</a></li>
                            
                        </ul>
                        <ul id="navUser" class="navbar-right navbar-nav nav">
                            <?php 
                               	if(isset($_SESSION['user']) && isset($_SESSION['pass'])){
                                    $user = $_SESSION['user']; 
                                
                                    echo "
                                    <li>
                                        <li><a href='../../../php/logout.php'>Sair</a></li>
                                    </li>"; 
                                }
                                else{
                                  echo ("
                                    <li>
                                        <a href='../view/cadastro' id='cadastro'>Cadastrar</a>
                                    </li>
                                    <li>
                                        <a href='../view/entrar'>Entrar</a>
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
                <div class="col-md-2"></div><!-- encher linguiça -->
                <div class="col-md-8 alert">
                    <?php if(isset($_POST['edit_news'])){ 
                        $id = $_GET['id'];
                        try {
                            $command = "SELECT * FROM noticia WHERE id = :id";
                            $query   = $pdo->prepare($command);
                            $query->bindValue(":id",$id);
                            $query->execute();

                        } catch (PDOException $e) {
                            echo $e->getMessage();
                        }
                        
                        while($result = $query->fetch(PDO::FETCH_OBJ)){
                            $title  =  $result->titulo;
                            $text  =  $result->texto;    
                        }
                        
                    ?>
                        
                        <form method="POST" >
                        <div class="div-form">
                            <label>Título:</label>
                            <input  value="<?php echo $title; ?> " name="titulo" type="text" class="inputNorm form-control" required placeholder="Um título breve...">
                        </div>

                         <div class="div-form">
                            <label>Texto:</label>
                            <textarea name="texto" class="resumo"  rows="5" placeholder="Fale mais sobre..." required><?php echo $text; ?> </textarea>
                        </div>
                        <div class="div-form">
                            <input  name="update_noticia"  type="submit" class="btn btn-success inputNorm" value="Postar">
                            <a href="../"><input type="button" class="btn btn-danger inputNorm pull-right" value="Cancelar"></a>
                            
                        </div>
                    </form>
                    <?php 
                    }
                       
                    else if(isset($_POST['update_noticia'])){
                            try {
                                $title  = $_POST['titulo'];
                                $text   = $_POST['texto'];
                                $id     = $_GET['id'];
                                
                                $dx     = date('d,m,y');
                                $d      = explode(',', $dx);
                                $date   = $d[0]."/".$d[1]."/".$d[2]; 

                                
                                $command = "UPDATE noticia SET  titulo = :titulo, texto = :texto, data = :data WHERE id = :id";     
                                $query   = $pdo->prepare($command);
                                $query->bindValue(":titulo",$title);
                                $query->bindValue(":texto",$text);
                                $query->bindValue(":id",$id);
                                $query->bindValue(":data",$date);
                                $query->execute();
                                echo "<script> window.location= '../'</script>";

                                  
                            } catch (PDOException $e) {
                                
                            }
                        
                         }
                    else{ ?>
                    <form action="../../../php/functions.php" method="POST" >
                        <div class="div-form">
                            <label>Título:</label>
                            <input  name="titulo" type="text" class="inputNorm form-control" required placeholder="Um título breve...">
                        </div>

                         <div class="div-form">
                            <label>Texto:</label>
                            <textarea name="texto" class="resumo"  rows="5" placeholder="Fale mais sobre..." required></textarea>
                        </div>
                        <div class="div-form">
                            <input  name="postar_noticia"  type="submit" class="btn btn-success inputNorm" value="Postar">
                            <a href="../"><input type="button" class="btn btn-danger inputNorm pull-right" value="Cancelar"></a>
                            
                        </div>
                    </form>
                    <?php } ?>
                </div>
                <div class="col-md-2"></div><!-- encher linguiça -->
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
		<script src="../../../res/lib/js/bootstrap.js"></script>
		<script src="../../../res/js/script.js"></script>
	</body>
</html>