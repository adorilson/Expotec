<?php include_once '../../../php/connection.php';  ?>
<?php 
	session_start();
	if(!isset($_SESSION['user']) && !isset($_SESSION['pass'])){
		header("Location:../../../");
	} 
	
	try {
		$id	= $_GET['id'];
		

		$command = "SELECT * FROM atividade WHERE id = :id ";
		$query   = $pdo->prepare($command);
		$query->bindValue(":id",$id);

		$query->execute();

		while($result = $query->fetch(PDO::FETCH_OBJ)){
			$descricao = $result->descricao;
            $titulo    = $result->titulo;
            $status    = $result->status;

		}
        if($status == 0){
            $s = "Aceitar";
            $class_status = "btn-success"; 
        }
        else{
            $s = "Retirar";
            $class_status = "btn-danger";
        }
		
	} catch (PDOException $e) {
		echo $e->getMessage();
	}
	
?>
<!DOCTYPE html>
<html>
	<head>
        <link rel="shortcut icon" type="image/x-icon" href="http://portal.ifrn.edu.br/favicon.ico" />
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title> ADMINISTRADOR </title>
		<link rel="stylesheet" href="../../../res/lib/css/bootstrap.min.css">
		<link rel="stylesheet" href="../../../res/lib/css/bootstrap-responsive.min.css">
		<link rel="stylesheet" href="../../../res/css/style.css">
	</head>
	<body>
	     <header class="main-header container">
          	<h1 class="title"><?php echo $titulo; ?> </h1>
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
                            <li><a href="../">Submissões</a></li>
							<li><a href="../../noticias/">Notícias</a></li>
                            
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
                                        <a href='../../../view/cadastro' id='cadastro'>Cadastrar</a>
                                    </li>
                                    <li>
                                        <a href='../../../view/entrar'>Entrar</a>
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
			<div class="alert col-md-12" >
				<div class="row">
                    <h3>Descrição:</h3>
                    <br>
					<p><?php echo $descricao; ?></p>
                    <hr>    
                    <form action="../../../php/functions.php?id=<?php echo $id;?>" method="post">
                         <input type="submit" name="update_status_activity" class="btn btn-success <?php echo $class_status; ?>" value="<?php echo $s; ?> ">
                    </form>
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
        


        <script src="../../../res/lib/js/jquery.min.js"></script>
       	<script src="../../../res/lib/js/bootstrap.js"></script>
        <script src="../../../res/js/script.js"></script>
         
</body>
</html>