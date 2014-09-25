<?php include_once 'connection.php'; ?>

<!DOCTYPE html> <html> <head> <link rel="stylesheet" href="../res/lib/css/bootstrap.min.css">
<meta charset="utf-8"><meta http-equiv="X-UA-
Compatible" content="IE=edge"><title>Esperando resposta...</title> <script
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
function cadastrar_palestra(){
	setTimeout("window.location='../view/submissoes/palestra'",3000);
}

function cadastro_palestra_fall(){
	setTimeout("window.location='../view/submissoes/palestra'",3000);
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

					$command = "INSERT INTO usuario (nome,senha,cpf,tipo) VALUES(:nome,:senha,:cpf,:tipo)";
					try {
						$query = $pdo->prepare($command);
						$query->bindValue(":nome",$nome);
						$query->bindValue(":senha",$senha);
						$query->bindValue(":cpf",$cpf);
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


						$command = "INSERT INTO usuario (nome,senha,cpf,tipo) VALUES(:nome,:senha,:cpf,:tipo)";
						try {
							$query = $pdo->prepare($command);
							$query->bindValue(":nome",$nome);
							$query->bindValue(":senha",$senha);
							$query->bindValue(":cpf",$cpf);
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


					$command = "INSERT INTO usuario (nome,senha,cpf,tipo) VALUES(:nome,:senha,:cpf,:tipo)";
					try {
						$query = $pdo->prepare($command);
						$query->bindValue(":nome",$nome);
						$query->bindValue(":senha",$senha);
						$query->bindValue(":cpf",$cpf);
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
					$_SESSION['tipo']	= $result->tipo;		
					echo "<p style='margin: 7px 7px;'> Aguardando... </p>";
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

			else if(isset($_POST['delete'])){
				$activity = $_GET['activity'];

				if($activity == "Minicurso"){
					header("Location:../view/minicursos/");
				}
				else if($activity == "Palestra"){
					header("Location:../view/palestras/");	
				}

				/*
				$id_a = $_GET['id_a'];
				
				$command = "DELETE FROM usuario_atividade WHERE ativdade_id=:id_a AND usuario_id =:id_u";
				$upVagas = "UPDATE atividade SET vagas = vagas+1 WHERE id = $id_a";
				*/

				try {
					/*
					$query = $pdo->prepare($command);
					$upVagasQuery 	= $pdo->prepare($upVagas);

					$query->bindValue(":id_u",$id_u);
					$query->bindValue(":id_a",$id_a);

					$query->execute();
					$upVagasQuery->execute();
					*/
					
				} catch (PODException $ex) {
					echo $ex->getMessage();
				}
				


			}
			/*---------------------- DELETE ACTIVITY  -----------------------*/



			/*---------------------- ADD ACTIVITY AT USER'S LIST  -----------------------*/


			else if(isset($_GET['id_a']) &&  isset($_GET['id_u'])){
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
					if($activity == 'Palestra'){
							echo "
							<div class='container' style='width:50%; margin-top:10%;' >
								<div class='row' >
									<div class='alert-danger' style='background: #67D79A; height:300px; padding:10%; box-shadow: 0 1px 2px #222; '>
										<p style='text-align:center; font: normal 340% Arial; font-weight:300; color:#FFF; text-shadow: 0 1px #444;'>
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
					else if($activity == 'Minicurso'){
							echo "
							<div class='container' style='width:50%; margin-top:10%;' >
								<div class='row' >
									<div class='alert-danger' style='background: #67D79A; height:300px; padding:10%; box-shadow: 0 1px 2px #222; '>
										<p style='text-align:center; font: normal 340% Arial; font-weight:300; color:#FFF; text-shadow: 0 1px #444;'>
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
			
			else if(isset($_POST['cadastrarAtividade']) && $_GET['Atividade'] == 'Palestra'){

				try {
						
					$usuario 	= $_GET['User'];
					$tipo		= $_GET['Atividade'];

					$titulo 	= $_POST['titulo'];
					$softwares 	= $_POST['softwares'];
					$resumo 	= $_POST['resumo'];
					$dia		= $_POST['dia'];

					$local		= $_POST['local'];
					$vagas		= $_POST['vagas'];
					
					/* Only to calc */
					$inicio 	= $_POST['init_horario'];
					$termino	= $_POST['end_horario'];
					
					$dia_hora 	= $dia.'/'.$inicio; 
					

					$h_ini = explode(":", $inicio);
					$h_end = explode(":", $termino);
					
					$hora 	= ($h_end[0] - $h_ini[0]);	
					$minuto = ($h_end[1] - $h_ini[1]);
					
							
					
					if(($hora <= 1 && $hora > 0)){
						if($h_ini[1] > $h_end[1]){
							$hora 	= 0 ;	
							$minuto = ($h_ini[1] + $h_end[1]);
							
							if($minuto >= 60){
								$hora 	 = 0;
								$minuto  =  (60 - $h_ini[1]) + $h_end[1];
							
								/*  Inserir */
								$duracao = $hora.":".$minuto;

								$command = "INSERT INTO atividades (tipo, titulo, descricao, ministrante,local, vagas,  dia_hora, status, softwares) 
								VALUES (:tipo, :titulo, :resumo, :ministrante, :local, :vagas, :dia_hora, 0, :softwares)";	
								
								$query 	 = $pdo->prepare($command);

								$query->bindValue(":tipo",$tipo);
								$query->bindValue(":titulo",$titulo);
								$query->bindValue(":resumo",$resumo);
								$query->bindValue(":ministrante",$usuario);
								$query->bindValue(":local",$local);
								$query->bindValue(":vagas",$vagas);
								$query->bindValue(":dia_hora",$dia_hora);
								$query->bindValue(":softwares",$softwares);
								

								$query->execute();
								/* Inserir */	
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
							echo "<script type='text/javascript'>cadastrar_palestra()</script>";		
					

							}
							else if($minuto < 60){
								$minuto =  (60 - $h_ini[1]) + $h_end[1]; 
						
							/* Inserir */
							$duracao = $hora.":".$minuto;

							$command = "INSERT INTO submissoes (titulo, ministrante, tipo, descricao, softwares, dia, duracao, status) VALUES (:titulo, :ministrante, 'Palestra', :resumo, :softwares, :dia, :duracao, 'pendente')";	
							$query 	 =  $pdo->prepare($command);

							$query->bindValue(":titulo",$titulo);
							$query->bindValue(":ministrante",$usuario);
							$query->bindValue(":softwares",$softwares);
							$query->bindValue(":resumo",$resumo);
							$query->bindValue(":dia",$dia);
							$query->bindValue(":duracao",$duracao);

							$query->execute();
							/* Inserir */

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
							echo "<script type='text/javascript'>cadastrar_palestra()</script>";			

							}	
						}
						else if($h_end[1] == $h_ini[1]){
							
							/* Inserir */
							$duracao = $hora.":".$minuto;

							$command = "INSERT INTO submissoes (titulo, ministrante, tipo, descricao, softwares, dia, duracao, status) VALUES (:titulo, :ministrante, 'Palestra', :resumo, :softwares, :dia, :duracao, 'pendente')";	
							$query 	 =  $pdo->prepare($command);

							$query->bindValue(":titulo",$titulo);
							$query->bindValue(":ministrante",$usuario);
							$query->bindValue(":softwares",$softwares);
							$query->bindValue(":resumo",$resumo);
							$query->bindValue(":dia",$dia);
							$query->bindValue(":duracao",$duracao);


							$query->execute();
							/* Inserir */

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
						echo "<script type='text/javascript'>cadastrar_palestra()</script>";						
						}else {
								echo "
							<div class='container' style='width:50%; margin-top:10%;' >
								<div class='row' >
									<div class='alert-danger' style='background: #FF6673; height:300px; padding:10%; box-shadow: 0 1px 2px #222; '>
										<p style='text-align:center; font: normal 340% Arial; font-weight:300; color:#FFF; text-shadow: 0 1px #AA0000;'>
											Verifique o horario!!
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
					}
					else if($hora == 0 ){
						if($h_end[1] == $h_ini[1]){
							echo "
							<div class='container' style='width:50%; margin-top:10%;' >
								<div class='row' >
									<div class='alert-danger' style='background: #FF6673; height:300px; padding:10%; box-shadow: 0 1px 2px #222; '>
										<p style='text-align:center; font: normal 340% Arial; font-weight:300; color:#FFF; text-shadow: 0 1px #AA0000;'>
											Verifique o horario!!
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
						else {

						/* Inserir */
						$duracao = $hora.":".$minuto;

						$command = "INSERT INTO submissoes (titulo, ministrante, tipo, descricao, softwares, dia, duracao, status) VALUES (:titulo, :ministrante, 'Palestra', :resumo, :softwares, :dia, :duracao, 'pendente')";	
						$query 	 =  $pdo->prepare($command);

						$query->bindValue(":titulo",$titulo);
						$query->bindValue(":ministrante",$usuario);
						$query->bindValue(":softwares",$softwares);
						$query->bindValue(":resumo",$resumo);
						$query->bindValue(":dia",$dia);
						$query->bindValue(":duracao",$duracao);
		
						$query->execute();	

						/* Inserir */

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
						//echo "<script type='text/javascript'>cadastrar_palestra()</script>";		
							
						}
					}
					else{
							echo "
							<div class='container' style='width:50%; margin-top:10%;' >
								<div class='row' >
									<div class='alert-danger' style='background: #FF6673; height:300px; padding:10%; box-shadow: 0 1px 2px #222; '>
										<p style='text-align:center; font: normal 340% Arial; font-weight:300; color:#FFF; text-shadow: 0 1px #AA0000;'>
											Verifique o horario!!
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
					echo $e->getMessage();
				}

			}
			else if(isset($_POST['cadastrarAtividade']) && $_GET['Atividade'] == 'Minicurso'){}



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

				while($result = $query->fetch(PDO::FETCH_OBJ)){
					header("Location: perfil/");
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