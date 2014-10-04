<?php include_once 'connection.php'; ?>

<!DOCTYPE html> <html> <head> 
<link rel="stylesheet" href="../res/lib/css/bootstrap.min.css">
<link rel="stylesheet" href="../res/css/style.css">

<meta charset="utf-8"><meta http-equiv="X-UA-
Compatible" content="IE=edge"><title>Aguarde...</title>

 <script
type='text/javascript'>

/* LOGIN */
function login_right(){
	setTimeout("window.location='../'",3000);
}
function login_wrong(){
	setTimeout("window.location='../view/entrar/'",3000);
}


/* CADASTRO */
function cadastro_right(){
	setTimeout("window.location='../'",3000);	
}

function cadastro_wrong(){
	setTimeout("window.location='../view/cadastro/'",3000);	
}


/*  OUTRAS  */
function add_palestra(){
	setTimeout("window.location='../view/palestras/'",3000);
}
function add_minicurso(){
	setTimeout("window.location='../view/minicursos/'",3000);
}

function cadastro_palestra(){
	setTimeout("window.location='../view/submissoes/palestra'",3000);
}
function cadastro_palestra_fall(){
	setTimeout("window.location='../view/submissoes/palestra'",5000);
}
function cadastro_minicurso(){
	setTimeout("window.location='../view/submissoes/minicurso'",3000);
}
function cadastro_minicurso_fall(){
	setTimeout("window.location='../view/submissoes/minicurso'",5000);
}


function horario_minicurso_fall(){
	setTimeout("window.location='../view/submissoes/minicurso'",1000);
}
function horario_palestra_fall(){
	setTimeout("window.location='../view/submissoes/palestra'",1000);
}


function postar_noticia(){
	setTimeout("window.location='../admin/noticias/'",3000);
}
function delete_noticia(){
	var op = confirm("Dejesa deletar essa notícia?");
	return op;
}


</script></head></html>

<?php 

			if(isset($_POST['cadastrar'])){
				/* Pegando os valores por $_POST */
				$nome 		= $_POST['nome'];
				$senha 		= $_POST['senha'];
				$email 		= $_POST['email'];
				$tipo		= $_POST['tipo'];
				

				if($tipo == "comunidade"){
					

					$check = "SELECT * FROM usuario WHERE nome=:nome";
					
					$queryCheck = $pdo->prepare($check);
					$queryCheck->bindValue(":nome",$nome);

					$queryCheck->execute();

					$row = $queryCheck->rowCount();

					/*  User already exists  */
					if($row > 0){
					

						echo "
							<div class='container' style='width:50%; margin-top:10%;' >
								<div class='row' >
									<div class='alert-danger' style='background: #FF6673; height:300px; padding:10%; box-shadow: 0 1px 2px #222; '>
										<p style='text-align:center; font: normal 320% Arial; font-weight:300; color:#FFF; text-shadow: 0 1px #AA0000;'>
											Usuário já existe!!
										</p>
										<p style='text-align:center; font: normal 140% Arial; font-weight:300; color:#B23; margin-top:30px; text-shadow: 0 1px #FF99AA;'>
											Carregando...<br><br>
											<img style='opacity:0.6; ' width='30px' heigh='30px'  src='../res/imgs/gifs/loader.GIF'>
										</p>
										
									</div>
								</div>
							</div>
							";	
						echo "<script type='text/javascript'>cadastro_wrong()</script>";

					}

					else if($row < 1){

					$command = "INSERT INTO usuario (nome,senha,email,tipo) VALUES(:nome,:senha,:email,:tipo)";
					try {
						$query = $pdo->prepare($command);
						$query->bindValue(":nome",$nome);
						$query->bindValue(":senha",$senha);
						$query->bindValue(":email",$email);
						$query->bindValue(":tipo",0);
						
						$query->execute();
						/* show a success message */
							echo "
							<div class='container' style='width:50%; margin-top:10%;' >
								<div class='row' >
									<div class='alert-danger' style='background: #67D79A; height:300px; padding:10%; box-shadow: 0 1px 2px #222; '>
										<p style='text-align:center; font: normal 340% Arial; font-weight:300; color:#FFF; text-shadow: 0 1px #444;'>
											Cadastro feito...
										</p>
										<p style='text-align:center; font: normal 140% Arial; font-weight:300; color:#296; margin-top:30px; text-shadow: 0 1px #ADC;'>
											carregando...<br><br>
											<img style='opacity:0.6; ' width='30px' heigh='30px'  src='../res/imgs/gifs/loader.GIF'>
										</p>
										
									</div>
								</div>
							</div>
							";
						echo "<script type='text/javascript'>cadastro_right()</script>";
					
					} catch (Exception $ex) {
						print $ex->getMessage();
					}
				}
			}
				else if($tipo == "aluno"){
					
					$check = "SELECT * FROM usuario WHERE nome=:nome";
					
					$queryCheck = $pdo->prepare($check);
					$queryCheck->bindValue(":nome",$nome);

					$queryCheck->execute();

					$row = $queryCheck->rowCount();

					/*  User already exists  */
					if($row > 0){
					

						echo "
							<div class='container' style='width:50%; margin-top:10%;' >
								<div class='row' >
									<div class='alert-danger' style='background: #FF6673; height:300px; padding:10%; box-shadow: 0 1px 2px #222; '>
										<p style='text-align:center; font: normal 320% Arial; font-weight:300; color:#FFF; text-shadow: 0 1px #AA0000;'>
											Usuário já existe!!
										</p>
										<p style='text-align:center; font: normal 140% Arial; font-weight:300; color:#B23; margin-top:30px; text-shadow: 0 1px #FF99AA;'>
											carregando...<br><br>
											<img style='opacity:0.6; ' width='30px' heigh='30px'  src='../res/imgs/gifs/loader.GIF'>
										</p>
										
									</div>
								</div>
							</div>
							";	
						echo "<script type='text/javascript'>cadastro_wrong()</script>";
					
					

					}

					else if($row < 1){


						$command = "INSERT INTO usuario (nome,senha,email,tipo) VALUES(:nome,:senha,:email,:tipo)";
						try {
							$query = $pdo->prepare($command);
							$query->bindValue(":nome",$nome);
							$query->bindValue(":senha",$senha);
							$query->bindValue(":email",$email);
							$query->bindValue(":tipo",1);
							
							$query->execute();
							/* show a success message */
							echo "
							<div class='container' style='width:50%; margin-top:10%;' >
								<div class='row' >
									<div class='alert-danger' style='background: #67D79A; height:300px; padding:10%; box-shadow: 0 1px 2px #222; '>
										<p style='text-align:center; font: normal 340% Arial; font-weight:300; color:#FFF; text-shadow: 0 1px #444;'>
											Cadastro feito...
										</p>
										<p style='text-align:center; font: normal 140% Arial; font-weight:300; color:#296; margin-top:30px; text-shadow: 0 1px #ADC;'>
											carregando...<br><br>
											<img style='opacity:0.6; ' width='30px' heigh='30px'  src='../res/imgs/gifs/loader.GIF'>
										</p>
										
									</div>
								</div>
							</div>
							";
							echo "<script type='text/javascript'>cadastro_right()</script>";

						} catch (Exception $ex) {
							print $ex->getMessage();
						}

					}
				}


				else if($tipo == "professor"){
					
					$check = "SELECT * FROM usuario WHERE nome=:nome";
					
					$queryCheck = $pdo->prepare($check);
					$queryCheck->bindValue(":nome",$nome);
					

					$queryCheck->execute();

					$row = $queryCheck->rowCount();

					/*  User already exists  */
					if($row > 0){
					
						echo "
							<div class='container' style='width:50%; margin-top:10%;' >
								<div class='row' >
									<div class='alert-danger' style='background: #FF6673; height:300px; padding:10%; box-shadow: 0 1px 2px #222; '>
										<p style='text-align:center; font: normal 320% Arial; font-weight:300; color:#FFF; text-shadow: 0 1px #AA0000;'>
											Usuário já existe!!
										</p>
										<p style='text-align:center; font: normal 140% Arial; font-weight:300; color:#B23; margin-top:30px; text-shadow: 0 1px #FF99AA;'>
											carregando...<br><br>
											<img style='opacity:0.6; ' width='30px' heigh='30px'  src='../res/imgs/gifs/loader.GIF'>
										</p>
										
									</div>
								</div>
							</div>
							";	
						echo "<script type='text/javascript'>cadastro_wrong()</script>";
					
					

					}

					else if($row < 1){


					$command = "INSERT INTO usuario (nome,senha,email,tipo) VALUES(:nome,:senha,:email,:tipo)";
					try {
						$query = $pdo->prepare($command);
						$query->bindValue(":nome",$nome);
						$query->bindValue(":senha",$senha);
						$query->bindValue(":email",$email);
						$query->bindValue(":tipo",2);
						
						$query->execute();
						/* show a success message */
							echo "
							<div class='container' style='width:50%; margin-top:10%;' >
								<div class='row' >
									<div class='alert-danger' style='background: #67D79A; height:300px; padding:10%; box-shadow: 0 1px 2px #222; '>
										<p style='text-align:center; font: normal 340% Arial; font-weight:300; color:#FFF; text-shadow: 0 1px #444;'>
											Cadastro feito...
										</p>
										<p style='text-align:center; font: normal 140% Arial; font-weight:300; color:#296; margin-top:30px; text-shadow: 0 1px #ADC;'>
											carregando...<br><br>
											<img style='opacity:0.6; ' width='30px' heigh='30px'  src='../res/imgs/gifs/loader.GIF'>
										</p>
										
									</div>
								</div>
							</div>
							";
							echo "<script type='text/javascript'>cadastro_right()</script>";
						
					} catch (Exception $ex) {
						print $ex->getMessage();
					}
				}
			}	
		}


		/*----------------------  LOGIN  -----------------------*/

			else if(isset($_POST['entrar'])){
				$nome 		= $_POST['nome'];
				$senha 		= $_POST['senha'];
				
				
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
					$_SESSION['email'] 	= $result->email;
					$_SESSION['id_u']	= $result->id;
					$_SESSION['tipo']	= $result->tipo;		
					echo "<p style='margin: -40px 7px;'> Aguardando... </p>";
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
											carregando...<br><br>
											<img style='opacity:0.6; ' width='30px' heigh='30px'  src='../res/imgs/gifs/loader.GIF'>
										</p>
										
									</div>
								</div>
							</div>
							";	
					echo "<script type='text/javascript'>login_wrong()</script>";
					
				}

			}
			/*---------------------- END LOGIN  -----------------------*/

			/*---------------------- DELETE ACTIVITY  -----------------------*/

			else if(isset($_POST['remove_activity'])){
				$activity = $_GET['activity'];	
				$id 	= $_GET['id'];
				$id_a 	= $_GET['id_a'];
			
				
				
				
				try {
					$command = "DELETE FROM usuario_atividade WHERE id = :id";
					$upVagas = "UPDATE atividade SET vagas = vagas+1 WHERE id = :id_a";
					

					$query = $pdo->prepare($command);
					
					$query->bindValue(":id",$id);
					
						
					$upVagasQuery = $pdo->prepare($upVagas);
					$upVagasQuery->bindValue(":id_a",$id_a);

					$query->execute();
					$upVagasQuery->execute();
					
				} catch (PODException $ex) {
					echo $ex->getMessage();
				}
				
				if($activity == "minicurso"){
					header("Location: ../view/minicursos/");
				}

				else if($activity == "palestra"){
					header("Location: ../view/palestras/");	
				}



			}
			/*---------------------- DELETE ACTIVITY  -----------------------*/



			/*---------------------- ADD ACTIVITY AT USER'S LIST  -----------------------*/


			else if(isset($_POST['add_activity'])  &&  isset($_GET['id_a']) &&  isset($_GET['id_u'])){
				$id_a 		= $_GET['id_a'];
				$id_u 		= $_GET['id_u'];
				$activity 	= $_GET['activity']; 
				 
				//print "ID Usuário: ".$id_u; 
				//print " <br>ID Atividade: ".$id_a;
				$command = "INSERT INTO usuario_atividade (atividade_id, usuario_id) VALUES(:id_a,:id_u)";	
				$upVagas = "UPDATE atividade SET vagas = vagas-1 WHERE id= $id_a";

				try {
					$query 		 	= $pdo->prepare($command);
					$upVagasQuery 	= $pdo->prepare($upVagas);

					$query->bindValue(":id_a",$id_a);
					$query->bindValue(":id_u",$id_u);
					
					
					$query->execute();
					$upVagasQuery->execute();


					/* Selecionando a pagina de destino */ 
					if($activity == 'palestra'){
							echo "
							<div class='container' style='width:50%; margin-top:10%;' >
								<div class='row' >
									<div class='alert-danger' style='background: #67D79A; height:300px; padding:10%; box-shadow: 0 1px 2px #222; '>
										<p style='text-align:center; font: normal 320% Arial; font-weight:300; color:#FFF; text-shadow: 0 1px #444;'>
											Salvando sua atividade...
										</p>
										<p style='text-align:center; font: normal 140% Arial; font-weight:300; color:#296; margin-top:30px; text-shadow: 0 1px #ADC;'>
											carregando...<br><br>
											<img style='opacity:0.6; ' width='30px' heigh='30px'  src='../res/imgs/gifs/loader.GIF'>
										</p>
										
									</div>
								</div>
							</div>
							";
						echo "<script type='text/javascript'>add_palestra()</script>";
						
					}
					else if($activity == 'minicurso'){
							echo "
							<div class='container' style='width:50%; margin-top:10%;' >
								<div class='row' >
									<div class='alert-danger' style='background: #67D79A; height:300px; padding:10%; box-shadow: 0 1px 2px #222; '>
										<p style='text-align:center; font: normal 320% Arial; font-weight:300; color:#FFF; text-shadow: 0 1px #444;'>
											Salvando sua atividade...
										</p>
										<p style='text-align:center; font: normal 140% Arial; font-weight:300; color:#296; margin-top:30px; text-shadow: 0 1px #ADC;'>
											Você será redirecionado...<br><br>
											<img style='opacity:0.6; ' width='30px' heigh='30px'  src='../res/imgs/gifs/loader.GIF'>
										</p>
										
									</div>
								</div>
							</div>
							";
						echo "<script type='text/javascript'>add_minicurso()</script>";		
					}
					/* mais atividades irão vir... */
				} catch (PDOException $ex) {
					echo $ex.getMessage();
				}
			}
			

			/* SUBMISSION PALESTRA  */
			else if(isset($_POST['cadastrarAtividade']) && $_GET['Atividade'] == 'palestra'){
				try {	
					$usuario 	= $_GET['User'];
					$tipo		= $_GET['Atividade'];
					
					$titulo 	= $_POST['titulo'];
					$softwares 	= $_POST['softwares'];
					$resumo 	= $_POST['resumo'];
					$dia		= $_POST['dia'];
					$local		= $_POST['local'];
					$vagas		= $_POST['vagas'];
					

					$horario1  	= $_POST['horario1'];
					$horario2  	= $_POST['horario2'];
					$horario3  	= $_POST['horario3']; 
					
					$dia_hora 	= null;

					/* Hour 1 */
					if($horario2 == '' && $horario3 == ''){
						$hora  = explode("/",$horario1); 
						$dia_hora 	= $dia.'-'.$hora[0];
					
						$check 		= "SELECT dia_hora FROM atividade WHERE dia_hora = :dia_hora AND tipo = :tipo ";
						$queryCheck = $pdo->prepare($check); 
						$queryCheck->bindValue(":dia_hora",$dia_hora);
						$queryCheck->bindValue(":tipo",$tipo);
						
						$queryCheck->execute();
						$row = $queryCheck->rowCount();

						if($row > 0){
							echo "
							<div class='container' style='width:50%; margin-top:10%;' >
								<div class='row' >
									<div class='alert-danger' style='background: #FF6673; height:300px; padding:10%; box-shadow: 0 1px 2px #222; '>
										<p style='text-align:center; font: normal 270% Arial; font-weight:300; color:#FFF; text-shadow: 0 1px #AA0000;'>Erro!</p>
										<p style='text-align:center; font: normal 170% Arial; font-weight:300; color:#FFF; text-shadow: 0 1px #AA0000;'>
											Horário indisponível...
										</p>
										<p style='text-align:center; font: normal 140% Arial; font-weight:300; color:#B23; margin-top:30px; text-shadow: 0 1px #FF99AA;'>
											carregando...<br><br>
											<img style='opacity:0.6; ' width='30px' heigh='30px'  src='../res/imgs/gifs/loader.GIF'>
										</p>
										
									</div>
								</div>
							</div>
							";	
						echo "<script type='text/javascript'>horario_palestra_fall()</script>";
						}
						else{
							$command = "INSERT INTO atividade (tipo,titulo ,softwares,descricao,ministrante,local,vagas,dia_hora,status)
								 VALUES (:tipo, :titulo,:softwares , :resumo, :ministrante, :local, :vagas, :dia_hora , 0)";	
									
							$query 	 = $pdo->prepare($command);
							$query->bindValue(":tipo",$tipo);
							$query->bindValue(":titulo",$titulo);
							$query->bindValue(":softwares",$softwares);
							$query->bindValue(":resumo",$resumo);
							$query->bindValue(":ministrante",$usuario);
							$query->bindValue(":local",$local);
							$query->bindValue(":vagas",$vagas);
							$query->bindValue(":dia_hora",$dia_hora);
							
							$query->execute();	



							echo "
								<div class='container' style='width:50%; margin-top:10%;' >
									<div class='row' >
										<div class='alert-danger' style='background: #67D79A; height:300px; padding:10%; box-shadow: 0 1px 2px #222; '>
											<p style='text-align:center; font: normal 340% Arial; font-weight:300; color:#FFF; text-shadow: 0 1px #444;'>
												Salvando palestra...
											</p>
											<p style='text-align:center; font: normal 140% Arial; font-weight:300; color:#296; margin-top:30px; text-shadow: 0 1px #ADC;'>
												Você será redirecionado...<br><br>
												<img style='opacity:0.6; ' width='30px' heigh='30px'  src='../res/imgs/gifs/loader.GIF'>
											</p>
											
										</div>
									</div>
								</div>
								";
							echo "<script type='text/javascript'>cadastro_palestra()</script>";
						}

					}
					/* Hour 2 */
					else if($horario1 == '' && $horario3 == ''){
						$hora  = explode("/", $horario2);
						$dia_hora 	= $dia.'-'.$hora[0];
					
							
						$check 		= "SELECT dia_hora FROM atividade WHERE dia_hora = :dia_hora AND tipo = :tipo ";
						$queryCheck = $pdo->prepare($check); 
						$queryCheck->bindValue(":dia_hora",$dia_hora);
						$queryCheck->bindValue(":tipo",$tipo);
						
						$queryCheck->execute();
						$row = $queryCheck->rowCount();

						if($row > 0){
							echo "
							<div class='container' style='width:50%; margin-top:10%;' >
								<div class='row' >
									<div class='alert-danger' style='background: #FF6673; height:300px; padding:10%; box-shadow: 0 1px 2px #222; '>
										<p style='text-align:center; font: normal 270% Arial; font-weight:300; color:#FFF; text-shadow: 0 1px #AA0000;'>Erro!</p>
										<p style='text-align:center; font: normal 170% Arial; font-weight:300; color:#FFF; text-shadow: 0 1px #AA0000;'>
											Horário indisponível...
										</p>
										<p style='text-align:center; font: normal 140% Arial; font-weight:300; color:#B23; margin-top:30px; text-shadow: 0 1px #FF99AA;'>
											carregando...<br><br>
											<img style='opacity:0.6; ' width='30px' heigh='30px'  src='../res/imgs/gifs/loader.GIF'>
										</p>
										
									</div>
								</div>
							</div>
							";	
						echo "<script type='text/javascript'>horario_palestra_fall()</script>";
						}
						else{
							$command = "INSERT INTO atividade (tipo,titulo ,softwares,descricao,ministrante,local,vagas,dia_hora,status)
								 VALUES (:tipo, :titulo,:softwares , :resumo, :ministrante, :local, :vagas, :dia_hora , 0)";	
									
							$query 	 = $pdo->prepare($command);
							$query->bindValue(":tipo",$tipo);
							$query->bindValue(":titulo",$titulo);
							$query->bindValue(":softwares",$softwares);
							$query->bindValue(":resumo",$resumo);
							$query->bindValue(":ministrante",$usuario);
							$query->bindValue(":local",$local);
							$query->bindValue(":vagas",$vagas);
							$query->bindValue(":dia_hora",$dia_hora);
							
							$query->execute();	



							echo "
								<div class='container' style='width:50%; margin-top:10%;' >
									<div class='row' >
										<div class='alert-danger' style='background: #67D79A; height:300px; padding:10%; box-shadow: 0 1px 2px #222; '>
											<p style='text-align:center; font: normal 340% Arial; font-weight:300; color:#FFF; text-shadow: 0 1px #444;'>
												Salvando palestra...
											</p>
											<p style='text-align:center; font: normal 140% Arial; font-weight:300; color:#296; margin-top:30px; text-shadow: 0 1px #ADC;'>
												Você será redirecionado...<br><br>
												<img style='opacity:0.6; ' width='30px' heigh='30px'  src='../res/imgs/gifs/loader.GIF'>
											</p>
											
										</div>
									</div>
								</div>
								";
							echo "<script type='text/javascript'>cadastro_palestra()</script>";
						}

					}

					/* Hour 3 */
					else if($horario1 == '' && $horario2 == ''){

						$hora  = explode("/", $horario3);
						$dia_hora 	= $dia.'-'.$hora[0];
						
						$check 		= "SELECT dia_hora FROM atividade WHERE dia_hora = :dia_hora AND tipo = :tipo ";
						$queryCheck = $pdo->prepare($check); 
						$queryCheck->bindValue(":dia_hora",$dia_hora);
						$queryCheck->bindValue(":tipo",$tipo);
						
						$queryCheck->execute();
						$row = $queryCheck->rowCount();

						if($row > 0){
							echo "
							<div class='container' style='width:50%; margin-top:10%;' >
								<div class='row' >
									<div class='alert-danger' style='background: #FF6673; height:300px; padding:10%; box-shadow: 0 1px 2px #222; '>
										<p style='text-align:center; font: normal 270% Arial; font-weight:300; color:#FFF; text-shadow: 0 1px #AA0000;'>Erro!</p>
										<p style='text-align:center; font: normal 170% Arial; font-weight:300; color:#FFF; text-shadow: 0 1px #AA0000;'>
											Horário indisponível...
										</p>
										<p style='text-align:center; font: normal 140% Arial; font-weight:300; color:#B23; margin-top:30px; text-shadow: 0 1px #FF99AA;'>
											carregando...<br><br>
											<img style='opacity:0.6; ' width='30px' heigh='30px'  src='../res/imgs/gifs/loader.GIF'>
										</p>
										
									</div>
								</div>
							</div>
							";	
						echo "<script type='text/javascript'>horario_palestra_fall()</script>";
						}
							else{
								$command = "INSERT INTO atividade (tipo,titulo ,softwares,descricao,ministrante,local,vagas,dia_hora,status)
									 VALUES (:tipo, :titulo,:softwares , :resumo, :ministrante, :local, :vagas, :dia_hora , 0)";	
										
								$query 	 = $pdo->prepare($command);
								$query->bindValue(":tipo",$tipo);
								$query->bindValue(":titulo",$titulo);
								$query->bindValue(":softwares",$softwares);
								$query->bindValue(":resumo",$resumo);
								$query->bindValue(":ministrante",$usuario);
								$query->bindValue(":local",$local);
								$query->bindValue(":vagas",$vagas);
								$query->bindValue(":dia_hora",$dia_hora);
								
								$query->execute();	



								echo "
									<div class='container' style='width:50%; margin-top:10%;' >
										<div class='row' >
											<div class='alert-danger' style='background: #67D79A; height:300px; padding:10%; box-shadow: 0 1px 2px #222; '>
												<p style='text-align:center; font: normal 340% Arial; font-weight:300; color:#FFF; text-shadow: 0 1px #444;'>
													Salvando palestra...
												</p>
												<p style='text-align:center; font: normal 140% Arial; font-weight:300; color:#296; margin-top:30px; text-shadow: 0 1px #ADC;'>
													Você será redirecionado...<br><br>
													<img style='opacity:0.6; ' width='30px' heigh='30px'  src='../res/imgs/gifs/loader.GIF'>
												</p>
												
											</div>
										</div>
									</div>
									";
								echo "<script type='text/javascript'>cadastro_palestra()</script>";
							}

					}
					else{
						echo "
							<div class='container' style='width:50%; margin-top:10%;' >
								<div class='row' >
									<div class='alert-danger' style='background: #FF6673; height:300px; padding:10%; box-shadow: 0 1px 2px #222; '>
										<p style='text-align:center; font: normal 270% Arial; font-weight:300; color:#FFF; text-shadow: 0 1px #AA0000;'>Erro!</p>
										<p style='text-align:center; font: normal 170% Arial; font-weight:300; color:#FFF; text-shadow: 0 1px #AA0000;'>
											Talvez você esteja marcando mais de um horário...
										</p>
										<p style='text-align:center; font: normal 140% Arial; font-weight:300; color:#B23; margin-top:30px; text-shadow: 0 1px #FF99AA;'>
											carregando...<br><br>
											<img style='opacity:0.6; ' width='30px' heigh='30px'  src='../res/imgs/gifs/loader.GIF'>
										</p>
										
									</div>
								</div>
							</div>
							";	
						echo "<script type='text/javascript'>cadastro_palestra_fall()</script>";
					}
					

	
				} catch (PDOException $e) {
					echo $e.getMessage();
				}
				
			}


			/* SUBMISSION MINICURSO  */

			else if(isset($_POST['cadastrarAtividade']) && $_GET['Atividade'] == 'minicurso'){
				try {	
					$usuario 	= $_GET['User'];
					$tipo		= $_GET['Atividade'];

					$titulo 	= $_POST['titulo'];
					$resumo 	= $_POST['resumo'];
					$dia		= $_POST['dia'];
					$local		= $_POST['local'];
					$vagas		= $_POST['vagas'];
					

					$horario1  	= $_POST['horario1'];
					$horario2  	= $_POST['horario2'];
					$horario3  	= $_POST['horario3']; 
					
					$dia_hora 	= null;



					/* Hour 1 */
					if($horario2 == '' && $horario3 == ''){
						$hora  = explode("/",$horario1); 
						$dia_hora 	= $dia.'-'.$hora[0];
					
						$check 		= "SELECT dia_hora FROM atividade WHERE dia_hora = :dia_hora AND tipo = :tipo ";
						$queryCheck = $pdo->prepare($check); 
						$queryCheck->bindValue(":dia_hora",$dia_hora);
						$queryCheck->bindValue(":tipo",$tipo);
						
						$queryCheck->execute();
						$row = $queryCheck->rowCount();
						
						if($row > 0){
							echo "
							<div class='container' style='width:50%; margin-top:10%;' >
								<div class='row' >
									<div class='alert-danger' style='background: #FF6673; height:300px; padding:10%; box-shadow: 0 1px 2px #222; '>
										<p style='text-align:center; font: normal 270% Arial; font-weight:300; color:#FFF; text-shadow: 0 1px #AA0000;'>Erro!</p>
										<p style='text-align:center; font: normal 170% Arial; font-weight:300; color:#FFF; text-shadow: 0 1px #AA0000;'>
											Horário indisponível...
										</p>
										<p style='text-align:center; font: normal 140% Arial; font-weight:300; color:#B23; margin-top:30px; text-shadow: 0 1px #FF99AA;'>
											carregando...<br><br>
											<img style='opacity:0.6; ' width='30px' heigh='30px'  src='../res/imgs/gifs/loader.GIF'>
										</p>
										
									</div>
								</div>
							</div>
							";	
						echo "<script type='text/javascript'>horario_minicurso_fall()</script>";
						}
						else{

							
							$command = "INSERT INTO atividade (tipo,titulo,descricao,ministrante,local,vagas,dia_hora,status)
								 VALUES (:tipo, :titulo, :resumo, :ministrante, :local, :vagas, :dia_hora , 0)";	
									
							$query 	 = $pdo->prepare($command);
							$query->bindValue(":tipo",$tipo);
							$query->bindValue(":titulo",$titulo);
							$query->bindValue(":resumo",$resumo);
							$query->bindValue(":ministrante",$usuario);
							$query->bindValue(":local",$local);
							$query->bindValue(":vagas",$vagas);
							$query->bindValue(":dia_hora",$dia_hora);
							
							$query->execute();	

							echo "
								<div class='container' style='width:50%; margin-top:10%;' >
									<div class='row' >
										<div class='alert-danger' style='background: #67D79A; height:300px; padding:10%; box-shadow: 0 1px 2px #222; '>
											<p style='text-align:center; font: normal 340% Arial; font-weight:300; color:#FFF; text-shadow: 0 1px #444;'>
												Salvando minicurso...
											</p>
											<p style='text-align:center; font: normal 140% Arial; font-weight:300; color:#296; margin-top:30px; text-shadow: 0 1px #ADC;'>
												Você será redirecionado...<br><br>
												<img style='opacity:0.6; ' width='30px' heigh='30px'  src='../res/imgs/gifs/loader.GIF'>
											</p>
											
										</div>
									</div>
								</div>
								";
							echo "<script type='text/javascript'>cadastro_minicurso()</script>";
						}
					}	
					/* Hour 2 */
					else if($horario1 == '' && $horario3 == ''){
						$hora  = explode("/", $horario2);
						$dia_hora 	= $dia.'-'.$hora[0];
					

						$check 		= "SELECT dia_hora FROM atividade WHERE dia_hora = :dia_hora AND tipo = :tipo ";
						$queryCheck = $pdo->prepare($check); 
						$queryCheck->bindValue(":dia_hora",$dia_hora);
						$queryCheck->bindValue(":tipo",$tipo);
						
						$queryCheck->execute();
						$row = $queryCheck->rowCount();
						
						if($row > 0){
							echo "
							<div class='container' style='width:50%; margin-top:10%;' >
								<div class='row' >
									<div class='alert-danger' style='background: #FF6673; height:300px; padding:10%; box-shadow: 0 1px 2px #222; '>
										<p style='text-align:center; font: normal 270% Arial; font-weight:300; color:#FFF; text-shadow: 0 1px #AA0000;'>Erro!</p>
										<p style='text-align:center; font: normal 170% Arial; font-weight:300; color:#FFF; text-shadow: 0 1px #AA0000;'>
											Horário indisponível...
										</p>
										<p style='text-align:center; font: normal 140% Arial; font-weight:300; color:#B23; margin-top:30px; text-shadow: 0 1px #FF99AA;'>
											carregando...<br><br>
											<img style='opacity:0.6; ' width='30px' heigh='30px'  src='../res/imgs/gifs/loader.GIF'>
										</p>
										
									</div>
								</div>
							</div>
							";	
						echo "<script type='text/javascript'>horario_minicurso_fall()</script>";
						}
						else{

								$command = "INSERT INTO atividade (tipo,titulo,descricao,ministrante,local,vagas,dia_hora,status)
									 VALUES (:tipo, :titulo, :resumo, :ministrante, :local, :vagas, :dia_hora , 0)";	
										
								$query 	 = $pdo->prepare($command);
								$query->bindValue(":tipo",$tipo);
								$query->bindValue(":titulo",$titulo);
								$query->bindValue(":resumo",$resumo);
								$query->bindValue(":ministrante",$usuario);
								$query->bindValue(":local",$local);
								$query->bindValue(":vagas",$vagas);
								$query->bindValue(":dia_hora",$dia_hora);
								
								$query->execute();

							echo "
								<div class='container' style='width:50%; margin-top:10%;' >
									<div class='row' >
										<div class='alert-danger' style='background: #67D79A; height:300px; padding:10%; box-shadow: 0 1px 2px #222; '>
											<p style='text-align:center; font: normal 340% Arial; font-weight:300; color:#FFF; text-shadow: 0 1px #444;'>
												Salvando minicurso...
											</p>
											<p style='text-align:center; font: normal 140% Arial; font-weight:300; color:#296; margin-top:30px; text-shadow: 0 1px #ADC;'>
												Você será redirecionado...<br><br>
												<img style='opacity:0.6; ' width='30px' heigh='30px'  src='../res/imgs/gifs/loader.GIF'>
											</p>
											
										</div>
									</div>
								</div>
								";
							echo "<script type='text/javascript'>cadastro_minicurso()</script>";
						
						}
					}

						/* Hour 3 */
					else if($horario1 == '' && $horario2 == ''){
						$hora 	= explode("/", $horario3) ;
						$dia_hora 	= $dia.'-'.$hora[0];
						

						$check 		= "SELECT dia_hora FROM atividade WHERE dia_hora = :dia_hora AND tipo = :tipo ";
						$queryCheck = $pdo->prepare($check); 
						$queryCheck->bindValue(":dia_hora",$dia_hora);
						$queryCheck->bindValue(":tipo",$tipo);
						
						$queryCheck->execute();
						$row = $queryCheck->rowCount();
						
						if($row > 0){
							echo "
							<div class='container' style='width:50%; margin-top:10%;' >
								<div class='row' >
									<div class='alert-danger' style='background: #FF6673; height:300px; padding:10%; box-shadow: 0 1px 2px #222; '>
										<p style='text-align:center; font: normal 270% Arial; font-weight:300; color:#FFF; text-shadow: 0 1px #AA0000;'>Erro!</p>
										<p style='text-align:center; font: normal 170% Arial; font-weight:300; color:#FFF; text-shadow: 0 1px #AA0000;'>
											Horário indisponível...
										</p>
										<p style='text-align:center; font: normal 140% Arial; font-weight:300; color:#B23; margin-top:30px; text-shadow: 0 1px #FF99AA;'>
											carregando...<br><br>
											<img style='opacity:0.6; ' width='30px' heigh='30px'  src='../res/imgs/gifs/loader.GIF'>
										</p>
										
									</div>
								</div>
							</div>
							";	
						echo "<script type='text/javascript'>horario_minicurso_fall()</script>";
						}
						else{

								$command = "INSERT INTO atividade (tipo,titulo,descricao,ministrante,local,vagas,dia_hora,status)
									 VALUES (:tipo, :titulo, :resumo, :ministrante, :local, :vagas, :dia_hora , 0)";	
										
								$query 	 = $pdo->prepare($command);
								$query->bindValue(":tipo",$tipo);
								$query->bindValue(":titulo",$titulo);
								$query->bindValue(":resumo",$resumo);
								$query->bindValue(":ministrante",$usuario);
								$query->bindValue(":local",$local);
								$query->bindValue(":vagas",$vagas);
								$query->bindValue(":dia_hora",$dia_hora);
								

							$query->execute();
							echo "
								<div class='container' style='width:50%; margin-top:10%;' >
									<div class='row' >
										<div class='alert-danger' style='background: #67D79A; height:300px; padding:10%; box-shadow: 0 1px 2px #222; '>
											<p style='text-align:center; font: normal 340% Arial; font-weight:300; color:#FFF; text-shadow: 0 1px #444;'>
												Salvando minicurso...
											</p>
											<p style='text-align:center; font: normal 140% Arial; font-weight:300; color:#296; margin-top:30px; text-shadow: 0 1px #ADC;'>
												Você será redirecionado...<br><br>
												<img style='opacity:0.6; ' width='30px' heigh='30px'  src='../res/imgs/gifs/loader.GIF'>
											</p>
											
										</div>
									</div>
								</div>
								";	
							echo "<script type='text/javascript'>cadastro_minicurso()</script>";
						
						}
					}	
					else{
						echo "
							<div class='container' style='width:50%; margin-top:10%;' >
								<div class='row' >
									<div class='alert-danger' style='background: #FF6673; height:300px; padding:10%; box-shadow: 0 1px 2px #222; '>
										<p style='text-align:center; font: normal 270% Arial; font-weight:300; color:#FFF; text-shadow: 0 1px #AA0000;'>Erro!</p>
										<p style='text-align:center; font: normal 170% Arial; font-weight:300; color:#FFF; text-shadow: 0 1px #AA0000;'>
											Talvez você esteja marcando mais de um horário...
										</p>
										<p style='text-align:center; font: normal 140% Arial; font-weight:300; color:#B23; margin-top:30px; text-shadow: 0 1px #FF99AA;'>
											carregando...<br><br>
											<img style='opacity:0.6; ' width='30px' heigh='30px'  src='../res/imgs/gifs/loader.GIF'>
										</p>
										
									</div>
								</div>
							</div>
							";	
						echo "<script type='text/javascript'>cadastro_minicurso_fall()</script>";
					}

				} catch (PDOException $e) {
					echo $e.getMessage();
				}
				
			}
				/* ...  MORE ... */




			/* ADMINISTRADOR  */
			else if(isset($_POST['admin'])){
				$user = $_POST['user'];
				$pass = $_POST['pass'];
				
				try {
					$command = "SELECT * FROM admin WHERE user=:user AND pass=:pass";
					$query = $pdo->prepare($command);
					
					$query->bindValue(":user",$user);
					$query->bindValue(":pass",$pass);

					$query->execute();

				} catch (PODException $e) {
					echo $e.getMessage();
				}
				$row = $query->rowCount();
				if($row > 0){
					session_start();
					while($result = $query->fetch(PDO::FETCH_OBJ)){
						
						$_SESSION['user'] = $result->user;
						$_SESSION['pass'] = $result->pass;	 
					}
					header("Location:../admin/submissoes");
				}
				else{
					header("Location:../");
				}

			}	


			else if(isset($_POST['update_status_activity'])){
				$id = $_GET['id'];

				try {
					$ckeck = "SELECT * FROM atividade WHERE id = $id";
					$checkStatus = $pdo->prepare($ckeck);
					$checkStatus->execute();

					while($result = $checkStatus->fetch(PDO::FETCH_OBJ)){
						
						$status = $result->status;

					}

					if($status == 0){
						$command = "UPDATE  atividade SET  status = 1 WHERE  id = :id";
						$query = $pdo->prepare($command);
						$query->bindValue(":id",$id);
						$query->execute();
						header("Location:../admin/submissoes");	
					}
					else if($status == 1){
						$command = "UPDATE  atividade SET  status = 0 WHERE  id = :id";
						$query = $pdo->prepare($command);
						$query->bindValue(":id",$id);
						$query->execute();
						header("Location:../admin/submissoes");
					}
					
					
				} catch (PDOException $e) {
					echo $e.getMessage();
				}
			}

			/*  POST NEWS */
			else if(isset($_POST['postar_noticia'])){
				$titulo = $_POST['titulo'];
				$texto 	= $_POST['texto'];
				$dx 	= date('d,m,y');
				$d  	= explode(',', $dx);
				$date 	= $d[0]."/".$d[1]."/".$d[2]; 
				
				try {
					$command = "INSERT INTO noticia (titulo, texto, data) VALUES(:titulo,:texto,:data)";
					$query = $pdo->prepare($command);

					$query->bindValue(":titulo",$titulo);
					$query->bindValue(":texto",$texto);
					$query->bindValue(":data",$date);

					$query->execute();


						echo "
							<div class='container' style='width:50%; margin-top:10%;' >
								<div class='row' >
									<div class='alert-danger' style='background: #67D79A; height:300px; padding:10%; box-shadow: 0 1px 2px #222; '>
										<p style='text-align:center; font: normal 340% Arial; font-weight:300; color:#FFF; text-shadow: 0 1px #444;'>
											Postando noticía...
										</p>
										<p style='text-align:center; font: normal 140% Arial; font-weight:300; color:#296; margin-top:30px; text-shadow: 0 1px #ADC;'>
											Você será redirecionado...<br><br>
											<img style='opacity:0.6; ' width='30px' heigh='30px'  src='../res/imgs/gifs/loader.GIF'>
										</p>
										
									</div>
								</div>
							</div>
							";
						echo "<script type='text/javascript'>postar_noticia()</script>";



				} catch (PDOException $e) {
					echo $e->getMessage();
				}
			}
			else if(isset($_POST['delete_news']) || $_GET['id']){
				$id 	= $_GET['id']; 
				try {
					$command = "DELETE FROM noticia WHERE id = :id";
					$query 	 = $pdo->prepare($command);
					$query->bindValue(":id",$id); 
					 if(isset($_POST['confirm_delete'])){
					 	$query->execute();
					 	header("Location: ../admin/noticias/");
					 }
					 ?>
						<body>
							<div class='container' style='width:50%; margin-top:10%;' >
								<div class='row' >
									<div style='background: #EEE; height:300px; padding:7%; box-shadow:0 1px 2px #999; border-top: 5px solid #E34545'>
										<form method="post">
											<h1 class="title-adm">Deletar notícia?</h1>
											<input name="confirm_delete" type="submit" class=" inputNorm btn btn-success" value="Deletar">
											<a href="../admin/noticias/" ><input class="form-control inputNorm btn btn-danger pull-right" type="button" value="Cancelar"></a>
										</form>
										
									</div>
								</div>
							</div>

						</body>
				<?php 
				} catch (PDOException $e) {
					echo $e->getMessage();
				}	
			}

			else{
				header("Location:../");
			}		
				
 ?>
