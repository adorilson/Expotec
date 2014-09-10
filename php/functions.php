<?php include_once 'connection.php'; ?>

<!DOCTYPE html> <html> <head> <link rel="stylesheet" href="../res/lib/css/bootstrap.min.css">
<meta charset="utf-8"><meta http-equiv="X-UA-
Compatible" content="IE=edge"><title>carregando...</title> <script
type='text/javascript'>

function login_right(){
	setTimeout("window.location='../'",1);
}

function login_wrong(){
	setTimeout("window.location='../view/entrar/'",2000);
}

function add_activity(){
	setTimeout("window.location='../view/palestras/",2000);
}

</script></head></html>


<?php 

			if(isset($_POST['cadastrar'])){
				/* Pegando os valores por $_POST */
				$nome 		= $_POST['nome'];
				$senha 		= $_POST['senha'];
				$cpf 		= $_POST['cpf'];
				$tipo		= $_POST['tipo'];
				//$matricula  = $_POST['matricula'];
				

				if($tipo == "comunidade"){
					$command = "INSERT INTO usuario (nome,senha,cpf,tipo) VALUES(:nome,:senha,:cpf,:tipo)";
					try {
						$query = $pdo->prepare($command);
						$query->bindValue(":nome",$nome);
						$query->bindValue(":senha",$senha);
						$query->bindValue(":cpf",$cpf);
						$query->bindValue(":tipo",0);
						
						$query->execute();
						header("location:../");
					} catch (Exception $ex) {
						print $ex->getMessage();
					}
				}

				else if($tipo == "aluno"){
					$command = "INSERT INTO usuario (nome,senha,cpf,tipo) VALUES(:nome,:senha,:cpf,:tipo)";
					try {
						$query = $pdo->prepare($command);
						$query->bindValue(":nome",$nome);
						$query->bindValue(":senha",$senha);
						$query->bindValue(":cpf",$cpf);
						$query->bindValue(":tipo",1);
						
						$query->execute();
						header("location:../");
					} catch (Exception $ex) {
						print $ex->getMessage();
					}
				}
				else if($tipo == "professor"){
					$command = "INSERT INTO usuario (nome,senha,cpf,tipo) VALUES(:nome,:senha,:cpf,:tipo)";
					try {
						$query = $pdo->prepare($command);
						$query->bindValue(":nome",$nome);
						$query->bindValue(":senha",$senha);
						$query->bindValue(":cpf",$cpf);
						$query->bindValue(":tipo",2);
						
						$query->execute();
						header("location:../");
					} catch (Exception $ex) {
						print $ex->getMessage();
					}
				}
			}	
		
			else if(isset($_POST['entrar'])){
				$nome 		= $_POST['nome'];
				$senha 		= $_POST['senha'];
				//$matricula  = $_POST['matricula'];
				
				
					$command = "SELECT * FROM  usuario WHERE (nome=:nome) AND (senha=:senha)";
					try {
						$query = $pdo->prepare($command);
						$query->bindValue(":nome",$nome, PDO::PARAM_STR);
						$query->bindValue(":senha",$senha, PDO::PARAM_STR);
						$query->execute();
						
					} catch (Exception $ex) {
						print $ex->getMessage();
					}
				
				$row = $query->rowCount();
				while($result = $query->fetch(PDO::FETCH_OBJ)){
					session_start();
					$_SESSION['nome'] 	= $result->nome;
					$_SESSION['senha'] 	= $result->senha;
					$_SESSION['id_u']	= $result->id;		
					echo "<script type='text/javascript'>login_right()</script>";
				}
				if($row < 1){
					echo "
							<div class='container' style='width:50%; margin-top:10%;' >
								<div class='row' >
									<div class='alert-danger' style='background: #FF6673; height:300px; padding:10%; box-shadow: 0 1px 2px #222; '>
										<p style='text-align:center; font: normal 340% Arial; font-weight:300; color:#FFF; text-shadow: 0 1px #AA0000;'>
											Algo deu errado!!
										</p>
										<p style='text-align:center; font: normal 140% Arial; font-weight:300; color:#B23; margin-top:30px; text-shadow: 0 1px #FF99AA;'>
											Você será redirecionado...<br><br>
											<img style='opacity:0.6; ' width='50px' heigh='50px'  src='../res/imgs/gifs/loader.GIF'>
										</p>
										
									</div>
								</div>
							</div>
							";	
					echo "<script type='text/javascript'>login_wrong()</script>";
					
				}

			}

			else if(isset($_GET)){
				$id_a 		= $_GET['id_a'];
				$id_u 		= $_GET['id_u'];
				$activity 	= $_GET['activity']; 
				 
				//print "ID Usuário: ".$id_u; 
				//print " <br>ID Atividade: ".$id_a;
				$command = "INSERT INTO usuario_atividade (atividade_id, usuario_id) VALUES(:id_a,:id_u)";	
			

				try {
					$query = $pdo->prepare($command);
					$query->bindValue(":id_a",$id_a);
					$query->bindValue(":id_u",$id_u);
					$query->execute();


					/* Selecionando a pagina de destino */ 
					if($activity == 'Palestra'){
							echo "
							<div class='container' style='width:50%; margin-top:10%;' >
								<div class='row' >
									<div class='alert-danger' style='background: #67D79A; height:300px; padding:10%; box-shadow: 0 1px 2px #222; '>
										<p style='text-align:center; font: normal 340% Arial; font-weight:300; color:#FFF; text-shadow: 0 1px #444;'>
											Salvando sua atividade...
										</p>
										<p style='text-align:center; font: normal 140% Arial; font-weight:300; color:#296; margin-top:30px; text-shadow: 0 1px #ADC;'>
											Você será redirecionado...<br><br>
											<img style='opacity:0.6; ' width='50px' heigh='50px'  src='../res/imgs/gifs/loader.GIF'>
										</p>
										
									</div>
								</div>
							</div>
							";
						echo "<script type='text/javascript'>add_activity()</script>";
						//header("Location:../view/palestras/");
					}
					else if($activity == 'Minicurso'){
						header("Location:../view/minicursos/");		
					}
					/* mais atividades irão vir... */
				} catch (PDOException $ex) {
					echo $ex.getMessage();
				}
			}
			

			else if(!isset($_POST)){
				header("Location:../");
			}		
				


	















/*
		try{
			$query = $pdo->prepare($command);
			$query->bindValue(":user",$user, PDO::PARAM_STR);
			$query->bindValue(":pass",$pass, PDO::PARAM_STR);
			$query->execute();	
		} catch (PDOException $e) {
		echo "<h1>ERROR</h1>",$e->getMessage();
		}
	$row = $query->rowCount();
	while($result = $query->fetch(PDO::FETCH_OBJ)){
		session_start();
		$_SESSION['user'] = $result->user;
		$_SESSION['pass'] = $result->pass;
	echo "<h1 style='text-align:center; margin-top:20%;font: normal 250% Arial; font-weight:300; color:#666;'>Wating...</h1>";	
	echo "<script type='text/javascript'>login_right()</script>";
	}
	if($row < 1){
		echo "<p style='text-align:center; font: normal 180% Arial; font-weight:300; color:#444;'>Wrong!</p>";
		echo "<p style='text-align:center; font: normal 120% Arial; font-weight:300; color:#444;'>You will be redirected...</p>";	
		echo "<script type='text/javascript'>login_wrong()</script>";
		
	}
}



else if(isset($_POST['post-activity'])){
	$num = $_POST['number'];
	$title = $_POST['title'];
	$data = $_POST['date'];
	$description = $_POST['description'];
	$link = $_POST['link'];
	$command = "INSERT INTO activity (numero,nome,data,descricao,link) VALUES(:num,:title,:data,:description,:link)";
	try {
		$query = $pdo->prepare($command);
		$query->bindValue(":num",$num);
		$query->bindValue(":title",$title);
		$query->bindValue(":data",$data);
		$query->bindValue(":description",$description);
		$query->bindValue(":link",$link);
		$query->execute();
		header("location:../pages/admin/post_activity.php");
	} catch (PDOException $e) {
		echo $e->getMesage();
	}
}

*/

 ?>