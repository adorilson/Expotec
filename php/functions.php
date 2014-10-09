<?php include_once 'connection.php'; session_start();?>

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

function cadastro_wrong_pass(){
	setTimeout("window.location='../view/cadastro/?senhas=Invalidas'",100);	
}

function cadastro_wrong_pass_length(){
	setTimeout("window.location='../view/cadastro/?senha=Fraca'",100);	
}


function update_user(){
	setTimeout("window.location='../view/perfil/ajustes'",3000);
}



/*  OUTRAS  */
function add_palestra(){
	setTimeout("window.location='../view/palestras/'",3000);
}
function add_minicurso(){
	setTimeout("window.location='../view/minicursos/'",3000);
}



function cadastro_activity(){
	setTimeout("window.location='../view/submissoes/'",3000);
}

function cadastro_resumo_wrong(){
	setTimeout("window.location='../view/submissoes/resumo'",3000);
}


function update_activity(){
	setTimeout("window.location='../view/perfil/'",3000);
}

function user_delete_activity(){
	setTimeout("window.location='../view/perfil/'",3000);
}





function postar_noticia(){
	setTimeout("window.location='../admin/noticias/'",3000);
}
function delete_noticia(){
	var op = confirm("Deseja apagar essa notícia?");
	return op;
}


</script></head></html>

<?php 
	if(isset($_POST['cadastrar'])){
		/* Pegando os valores por $_POST */
		$nome 			= $_POST['nome'];
		$email 			= $_POST['email'];
		$senha 			= $_POST['senha'];
		$conf_senha		= $_POST['confirme_senha'];
		$cpf 			= $_POST['cpf'];
		$matricula 		= $_POST['matricula'];
		//$minicurriculo 	= $_POST['minicurriculo'];
		$tipo			= $_POST['tipo'];
		$sexo			= $_POST['sexo'];
		
		$d = $_POST['birthday_day'];
		$m = $_POST['birthday_month'];
		$y = $_POST['birthday_year'];
		
		$idade = 2014 - $y;

		
		/*=+=+=+=+++=+=+=+=+=+=+= Verificando o CPF =+=+=+=+++=+=+=+=+=+=+=*/
		function verifyCPF( $cpf ){
			if (strpos($cpf, "-") !== false){
				$cpf = str_replace("-", "", $cpf);
			}
			if (strpos($cpf, ".") !== false){
				$cpf = str_replace(".", "", $cpf);
			}
			
			$sum = 0;
			$cpf = str_split( $cpf );
			$cpftrueverifier = array();
			$cpfnumbers = array_splice( $cpf , 0, 9 );
			$cpfdefault = array(10, 9, 8, 7, 6, 5, 4, 3, 2);
			
			for ( $i = 0; $i <= 8; $i++ ){
				$sum += $cpfnumbers[$i]*$cpfdefault[$i];
			}
			$sumresult = $sum % 11; 
			
			if ( $sumresult < 2 ){
				$cpftrueverifier[0] = 0;
			}
			else{
				$cpftrueverifier[0] = 11-$sumresult;
			}
			
			$sum = 0;
			$cpfdefault = array(11, 10, 9, 8, 7, 6, 5, 4, 3, 2);
			$cpfnumbers[9] = $cpftrueverifier[0];
			
			for ( $i = 0; $i <= 9; $i++ ){
				$sum += $cpfnumbers[$i]*$cpfdefault[$i];
			}
			$sumresult = $sum % 11;
			if ( $sumresult < 2 ){
				$cpftrueverifier[1] = 0;
			}
			else{
				$cpftrueverifier[1] = 11 - $sumresult;
			}
			$returner = false;
			if ( $cpf == $cpftrueverifier ){
				$returner = true;
			}

			$cpfver = array_merge($cpfnumbers, $cpf);

			if ( count(array_unique($cpfver)) == 1 || $cpfver == array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 0) ){
				$returner = false;
			}
			return $returner;
			
		}
		/*=+=+=+=+++=+=+=+=+=+=+= Verificando o CPF =+=+=+=+++=+=+=+=+=+=+=*/


		$ck = verifyCPF($cpf);

		if($ck){
			if($senha == $conf_senha){
				$passSize = strlen ($senha);
					
					if ($passSize >= 6 && (strpos($senha,'0') || strpos($senha,'1') || strpos($senha,'2') || strpos($senha,'3') || strpos($senha,'4') || strpos($senha,'5') || strpos($senha,'6') || strpos($senha,'7') || strpos($senha,'8')  || strpos($senha,'9'))) {
								
					if($tipo == "comunidade"){
						
						$check = "SELECT * FROM usuario WHERE email=:email";
						
						$queryCheck = $pdo->prepare($check);
						$queryCheck->bindValue(":email",$email);
						$queryCheck->execute();

						$row = $queryCheck->rowCount();

					/*  User already exists  */
						if($row > 0){
						
							echo "
								<div class='container' style='width:50%; margin-top:10%;' >
									<div class='row' >
										<div class='alert-danger' style='background: #FF6673; height:300px; padding:10%; box-shadow: 0 1px 2px #222; '>
											<p style='text-align:center; font: normal 310% Arial; font-weight:300; color:#FFF; text-shadow: 0 1px #AA0000;'>
												Email já cadastrado!!
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

						$command = "INSERT INTO usuario (nome,senha,email,cpf,idade,sexo,tipo) VALUES(:nome,:senha,:email,:cpf,:idade,:sexo,:tipo)";
						try {
							$query = $pdo->prepare($command);
							$query->bindValue(":nome",$nome);
							$query->bindValue(":email",$email);
							$query->bindValue(":senha",SHA1($senha));
							$query->bindValue(":cpf",$cpf);
							//$query->bindValue(":minicurriculo",$minicurriculo);
							$query->bindValue(":tipo",0);
							$query->bindValue(":sexo",$sexo);
							$query->bindValue(":idade",$idade);
							
							$query->execute();
								/* show a success message */
								echo "
									<div class='container' style='width:50%; margin-top:10%;' >
										<div class='row' >
											<div class='alert-danger' style='background: #67D79A; height:300px; padding:10%; box-shadow: 0 1px 2px #222; '>
												<p style='text-align:center; font: normal 230% Arial; font-weight:300; color:#FFF; text-shadow: 0 1px #444;'>
													Cadastro realizado com sucesso!
												</p>
												<p style='text-align:center; font: normal 110% Arial; font-weight:300; color:#296; margin-top:30px; text-shadow: 0 1px #ADC;'>
													Você está sendo redirecionado à página inicial<br><br>
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
						
						$check = "SELECT * FROM usuario WHERE email=:email";
						
						$queryCheck = $pdo->prepare($check);
						$queryCheck->bindValue(":email",$email);

						$queryCheck->execute();

						$row = $queryCheck->rowCount();

						/*  User already exists  */
						if($row > 0){
						

							echo "
								<div class='container' style='width:50%; margin-top:10%;' >
									<div class='row' >
										<div class='alert-danger' style='background: #FF6673; height:300px; padding:10%; box-shadow: 0 1px 2px #222; '>
											<p style='text-align:center; font: normal 250% Arial; font-weight:300; color:#FFF; text-shadow: 0 1px #AA0000;'>
												Email já cadastrado!!
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


							$command = "INSERT INTO usuario (nome,senha,email,cpf,matricula,idade,sexo,tipo) VALUES(:nome,:senha,:email,:cpf,:matricula,:idade,:sexo,:tipo)";
							try {
								$query = $pdo->prepare($command);
								$query->bindValue(":nome",$nome);
								$query->bindValue(":email",$email);
								$query->bindValue(":senha",SHA1($senha));
								$query->bindValue(":cpf",$cpf);
								//$query->bindValue(":minicurriculo",$minicurriculo);
								$query->bindValue(":matricula",$matricula);
								$query->bindValue(":tipo",1);
								$query->bindValue(":sexo",$sexo);
								$query->bindValue(":idade",$idade);
							
								
								$query->execute();
								/* show a success message */
								echo "
									<div class='container' style='width:50%; margin-top:10%;' >
										<div class='row' >
											<div class='alert-danger' style='background: #67D79A; height:300px; padding:10%; box-shadow: 0 1px 2px #222; '>
												<p style='text-align:center; font: normal 230% Arial; font-weight:300; color:#FFF; text-shadow: 0 1px #444;'>
													Cadastro realizado com sucesso!
												</p>
												<p style='text-align:center; font: normal 120% Arial; font-weight:300; color:#296; margin-top:30px; text-shadow: 0 1px #ADC;'>
													Você está sendo redirecionado à página inicial<br><br>
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
						
						$check = "SELECT * FROM usuario WHERE email=:email";
						
						$queryCheck = $pdo->prepare($check);
						$queryCheck->bindValue(":email",$email);
						
						$queryCheck->execute();

						$row = $queryCheck->rowCount();

						/*  User already exists  */
						if($row > 0){
						
							echo "
								<div class='container' style='width:50%; margin-top:10%;' >
									<div class='row' >
										<div class='alert-danger' style='background: #FF6673; height:300px; padding:10%; box-shadow: 0 1px 2px #222; '>
											<p style='text-align:center; font: normal 310% Arial; font-weight:300; color:#FFF; text-shadow: 0 1px #AA0000;'>
												Email já cadastrado!!
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


							$command = "INSERT INTO usuario (nome,senha,email,cpf,matricula,idade,sexo,tipo) VALUES(:nome,:senha,:email,:cpf,:matricula,:idade,:sexo,:tipo)";
							try {
								$query = $pdo->prepare($command);
								$query->bindValue(":nome",$nome);
								$query->bindValue(":email",$email);
								$query->bindValue(":senha",SHA1($senha));
								$query->bindValue(":cpf",$cpf);
								$query->bindValue(":matricula",$matricula);
								//$query->bindValue(":minicurriculo",$minicurriculo);
								$query->bindValue(":tipo",2);
								$query->bindValue(":sexo",$sexo);
								$query->bindValue(":idade",$idade);
							
								
								$query->execute();
								/* show a success message */
									echo "
									<div class='container' style='width:50%; margin-top:10%;' >
										<div class='row' >
											<div class='alert-danger' style='background: #67D79A; height:300px; padding:10%; box-shadow: 0 1px 2px #222; '>
												<p style='text-align:center; font: normal 230% Arial; font-weight:300; color:#FFF; text-shadow: 0 1px #444;'>
													Cadastro realizado com sucesso!
												</p>
												<p style='text-align:center; font: normal 120% Arial; font-weight:300; color:#296; margin-top:30px; text-shadow: 0 1px #ADC;'>
													Você está sendo redirecionado à página inicial<br><br>
													<img style='opacity:0.6; ' width='30px' heigh='30px'  src='../res/imgs/gifs/loader.GIF'>
												</p>
												
											</div>
										</div>
									</div>
									";
									echo "<script type='text/javascript'>cadastro_right()</script>";
								
							} catch (Exception $ex) {
								print $ex->getMessage();
								} /* end of catch */
							}
						}
				   	  }	/* RIGHT PASS (MORE THAN 6 CHARS)*/
				   	  else{
				   	  	echo "<script> cadastro_wrong_pass_length(); </script>";
				   	  }
					}/* RIGHT PASS (IF ($SENHA = $CHECKSENHA))*/
					else{
						echo "<script> cadastro_wrong_pass(); </script>	";
					}
			}
			else{
				echo "
					<div class='container' style='width:50%; margin-top:10%;' >
						<div class='row' >
							<div class='alert-danger' style='background: #FF6673; height:300px; padding:10%; box-shadow: 0 1px 2px #222; '>
								<p style='text-align:center; font: normal 310% Arial; font-weight:300; color:#FFF; text-shadow: 0 1px #AA0000;'>
									CPF inválido... 
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

	} /* Fim do cadastro  */ 


	/*----------------------  LOGIN USER -----------------------*/

	else if(isset($_POST['entrar'])){
		$email 		= $_POST['email'];
		$senha 		= $_POST['senha'];
		
		
			$command = "SELECT * FROM  usuario WHERE (email=:email) AND (senha=:senha)";
			try {
				$query = $pdo->prepare($command);
				$query->bindValue(":email",$email, PDO::PARAM_STR);
				$query->bindValue(":senha",SHA1($senha), PDO::PARAM_STR);
				$query->execute();
				
			} catch (Exception $ex) {
				print $ex->getMessage();
			}
		
		$row = $query->rowCount();
		while($result = $query->fetch(PDO::FETCH_OBJ)){
			
			$_SESSION['id_u']			= $result->id;
			$_SESSION['nome'] 			= $result->nome;
			$_SESSION['email'] 			= $result->email;
			$_SESSION['senha'] 			= $result->senha;
			$_SESSION['cpf']			= $result->cpf;
			$_SESSION['matricula']		= $result->matricula;
			$_SESSION['tipo']			= $result->tipo;
			$_SESSION['idade']			= $result->idade;
			$_SESSION['sexo']			= $result->sexo;
					
			
			echo "<p style='margin: -40px 7px;'> Aguardando... </p>";
			echo "<script type='text/javascript'>login_right()</script>";
		}
		if($row < 1){
			echo "
					<div class='container' style='width:50%; margin-top:10%;' >
						<div class='row' >
							<div class='alert-danger' style='background: #FF6673; height:300px; padding:10%; box-shadow: 0 1px 2px #222; '>
								<p style='text-align:center; font: normal 340% Arial; font-weight:300; color:#FFF; text-shadow: 0 1px #AA0000;'>
									Email e/ou senha incorretos!
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
	/*---------------------- END LOGIN USER -----------------------*/


	else if(isset($_POST['update_user']) && isset($_GET['tipo'])){
		/* Pegando os valores por $_POST */
		
		$id  			= $_GET['id'];
		$tipo			= $_GET['tipo'];	
		
		$email 			= $_POST['email'];
		$cpf 			= $_POST['cpf'];
		$matricula 		= $_POST['matricula'];
		//$minicurriculo 	= $_POST['minicurriculo'];
		$idade			= $_POST['idade'];
		$sexo			= $_POST['sexo'];
		if($tipo == 0){
		try {
			
			$command 	= "UPDATE usuario SET  email = :email, cpf = :cpf, idade = :idade, sexo = :sexo  WHERE  id = :id";
			
			$query 		= $pdo->prepare($command);
			

			$query->bindValue(":id",$id);
			
			$query->bindValue(":email",$email);
			$query->bindValue(":cpf",$cpf);
			$query->bindValue(":idade",$idade);
			$query->bindValue(":sexo",$sexo);
			$query->execute();

				echo "
					<div class='container' style='width:50%; margin-top:10%;' >
						<div class='row' >
							<div class='alert-danger' style='background: #67D79A; height:300px; padding:10%; box-shadow: 0 1px 2px #222; '>
								<p style='text-align:center; font: normal 230% Arial; font-weight:300; color:#FFF; text-shadow: 0 1px #444;'>
									Atualizado com sucesso!
								</p>
								<p style='text-align:center; font: normal 120% Arial; font-weight:300; color:#296; margin-top:30px; text-shadow: 0 1px #ADC;'>
									Você está sendo redirecionado.<br><br>
								<img style='opacity:0.6; ' width='30px' heigh='30px'  src='../res/imgs/gifs/loader.GIF'>
								</p>					
							</div>
						</div>
					</div>
				";

			echo "<script> update_user();</script>";
			
		} catch (PDOException $e) {
			echo $e;
		}
		}/*TYPE 0*/
		else if($tipo == 1 || $tipo == 2){
		try {
			
			$command 	= "UPDATE usuario SET email = :email, cpf = :cpf, matricula = :matricula, idade = :idade, sexo = :sexo  WHERE  id = :id";
			

			$query 		= $pdo->prepare($command);
			
			$query->bindValue(":id",$id);
			
			$query->bindValue(":email",$email);
			$query->bindValue(":cpf",$cpf);
			$query->bindValue(":matricula",$matricula);
			$query->bindValue(":idade",$idade);
			$query->bindValue(":sexo",$sexo);

			$query->execute();

				echo "
					<div class='container' style='width:50%; margin-top:10%;' >
						<div class='row' >
							<div class='alert-danger' style='background: #67D79A; height:300px; padding:10%; box-shadow: 0 1px 2px #222; '>
								<p style='text-align:center; font: normal 230% Arial; font-weight:300; color:#FFF; text-shadow: 0 1px #444;'>
									Atualizado com sucesso!
								</p>
								<p style='text-align:center; font: normal 120% Arial; font-weight:300; color:#296; margin-top:30px; text-shadow: 0 1px #ADC;'>
									Você está sendo redirecionado.<br><br>
								<img style='opacity:0.6; ' width='30px' heigh='30px'  src='../res/imgs/gifs/loader.GIF'>
								</p>					
							</div>
						</div>
					</div>
				";

			echo "<script> update_user();</script>";
			
			
		} catch (PDOException $e) {
			echo $e;
		}
		}/*TYPE 1 OR 2 */
	}

	/*---------------------- END UPDATE USER -----------------------*/

		/* SUBMISSION PALESTRA  */
	else if(isset($_POST['cadastrarAtividade']) && $_GET['Atividade'] == 'palestra'){
		try {	
			$usuario 		= $_GET['User'];
			$minicurriculo	= $_POST['minicurriculo'];
			$tipo			= $_GET['Atividade'];
			
			$titulo 		= $_POST['titulo'];
			$area 			= $_POST['area'];
			$resumo 		= $_POST['resumo'];
			$duracao	 	= "00:45";
			//$softwares 	= $_POST['softwares'];
			//$local		= $_POST['local'];
			//$vagas		= $_POST['vagas'];

			
			$command = "INSERT INTO atividade (tipo,titulo,descricao,ministrante,duracao,minicurriculo,area,status)
									  VALUES (:tipo,:titulo,:resumo,:usuario,:duracao,:minicurriculo,:area, 0)";	
							
			$query 	 = $pdo->prepare($command);

			$query->bindValue(":usuario",$usuario);
			$query->bindValue(":minicurriculo",$minicurriculo);
			$query->bindValue(":tipo",$tipo);
			
			$query->bindValue(":titulo",$titulo);
			$query->bindValue(":area",$area);
			$query->bindValue(":resumo",$resumo);
			$query->bindValue(":duracao",$duracao);

			//$query->bindValue(":softwares",$softwares);
			//$query->bindValue(":local",$local);
			//$query->bindValue(":vagas",$vagas);
			//$query->bindValue(":dia_hora",$dia_hora);
					
			$query->execute();	

			echo "
				<div class='container' style='width:50%; margin-top:10%;' >
					<div class='row' >
						<div class='alert-danger' style='background: #67D79A; height:300px; padding:10%; box-shadow: 0 1px 2px #222; '>
							<p style='text-align:center; font: normal 200% Arial; font-weight:300; color:#FFF; text-shadow: 0 1px #444;'>
								Proposta de Palestra submetida com sucesso!!!
							</p>
							<p style='text-align:center; font: normal 140% Arial; font-weight:300; color:#296; margin-top:30px; text-shadow: 0 1px #ADC;'>
								Acesse a Área do usuário para conferir suas submissões<br><br>Você será redirecionado...<br><br>
								<img style='opacity:0.6; ' width='30px' heigh='30px'  src='../res/imgs/gifs/loader.GIF'>
							</p>				
						</div>
					</div>
				</div>
			";
			echo "<script type='text/javascript'>cadastro_activity()</script>";
		} catch (PDOException $e) {
			echo $e.getMessage();
		}
		
	}

	/* SUBMISSION MINICURSO  */

	else if(isset($_POST['cadastrarAtividade']) && $_GET['Atividade'] == 'minicurso'){
		
			$usuario 		= $_GET['User'];
			$minicurriculo	= $_POST['minicurriculo'];
			$tipo			= $_GET['Atividade'];

			$titulo 		= $_POST['titulo'];
			$duracao  		= $_POST['duracao'];
			$resumo			= $_POST['resumo'];
			$area  			= $_POST['area'];
			$vagas  		= $_POST['vagas'];
			$prerequisitos	= $_POST['prerequisitos'];
			$extras			= $_POST['extras'];		

			if(!is_numeric($vagas)){
				echo "
					<div class='container' style='width:50%; margin-top:10%;' >
						<div class='row' >
							<div class='alert-danger' style='background: #FF6673; height:300px; padding:10%; box-shadow: 0 1px 2px #222; '>
								<p style='text-align:center; font: normal 200% Arial; font-weight:300; color:#FFF; text-shadow: 0 1px #AA0000;'>
									Campo vagas só pode conter números!
								</p>
								<p style='text-align:center; font: normal 140% Arial; font-weight:300; color:#B23; margin-top:30px; text-shadow: 0 1px #FF99AA;'>
									carregando...<br><br>
									<img style='opacity:0.6; ' width='30px' heigh='30px'  src='../res/imgs/gifs/loader.GIF'>
								</p>
								
							</div>
						</div>
					</div>
					";
					echo "<script type='text/javascript'>cadastro_activity()</script>";				
			}
			else{
			
				try {	

					$command = "INSERT INTO atividade (tipo,titulo,descricao,ministrante,minicurriculo,area,duracao,vagas,prerequisitos,extras,status)
						           	   		  VALUES (:tipo, :titulo, :resumo, :usuario,:minicurriculo,:area,:duracao,:vagas,:prerequisitos,:extras, 0)";	
									
					$query 	 = $pdo->prepare($command);
					$query->bindValue(":tipo",$tipo);
					$query->bindValue(":titulo",$titulo);
					$query->bindValue(":resumo",$resumo);
					$query->bindValue(":usuario",$usuario);
					$query->bindValue(":minicurriculo",$minicurriculo);
					$query->bindValue(":area",$area);
					$query->bindValue(":duracao",$duracao);
					$query->bindValue(":vagas",$vagas);
					$query->bindValue(":prerequisitos",$prerequisitos);
					$query->bindValue(":extras",$extras);
					

					$query->execute();	

					echo "
						<div class='container' style='width:50%; margin-top:10%;' >
							<div class='row' >
								<div class='alert-danger' style='background: #67D79A; height:300px; padding:10%; box-shadow: 0 1px 2px #222; '>
									<p style='text-align:center; font: normal 200% Arial; font-weight:300; color:#FFF; text-shadow: 0 1px #444;'>
										Proposta de Minicurso submetida com sucesso!!!
									</p>
									<p style='text-align:center; font: normal 140% Arial; font-weight:300; color:#296; margin-top:30px; text-shadow: 0 1px #ADC;'>
										Você será redirecionado...<br><br>
										<img style='opacity:0.6; ' width='30px' heigh='30px'  src='../res/imgs/gifs/loader.GIF'>
									</p>				
								</div>
							</div>
						</div>
					";
					echo "<script type='text/javascript'>cadastro_activity()</script>";				

			} catch (PDOException $e) {
				echo $e->getMessage();
			}
		}
	}

	/* SUBMISSION OFICINA  */

	else if(isset($_POST['cadastrarAtividade']) && $_GET['Atividade'] == 'oficina'){
			
			$usuario 		= $_GET['User'];
			$minicurriculo	= $_POST['minicurriculo'];
			$tipo			= $_GET['Atividade'];

			$titulo 		= $_POST['titulo'];
			$resumo 		= $_POST['resumo'];
			$duracao  		= $_POST['duracao'];
			$area  			= $_POST['area'];
			$vagas  		= $_POST['vagas'];
			$prerequisitos	= $_POST['prerequisitos'];
			$extras			= $_POST['extras'];					
			
			if(!is_numeric($vagas)){
				echo "
					<div class='container' style='width:50%; margin-top:10%;' >
						<div class='row' >
							<div class='alert-danger' style='background: #FF6673; height:300px; padding:10%; box-shadow: 0 1px 2px #222; '>
								<p style='text-align:center; font: normal 200% Arial; font-weight:300; color:#FFF; text-shadow: 0 1px #AA0000;'>
									Campo vagas só pode conter números!
								</p>
								<p style='text-align:center; font: normal 140% Arial; font-weight:300; color:#B23; margin-top:30px; text-shadow: 0 1px #FF99AA;'>
									carregando...<br><br>
									<img style='opacity:0.6; ' width='30px' heigh='30px'  src='../res/imgs/gifs/loader.GIF'>
								</p>
								
							</div>
						</div>
					</div>
					";
					echo "<script type='text/javascript'>cadastro_activity()</script>";				
			}
			else{
				
				try {

					$command = "INSERT INTO atividade (tipo,titulo,descricao,ministrante,minicurriculo,area,duracao,vagas,prerequisitos,extras,status)
						           	   		  VALUES (:tipo, :titulo, :resumo, :usuario,:minicurriculo,:area,:duracao,:vagas,:prerequisitos,:extras, 0)";	
									
					$query 	 = $pdo->prepare($command);
					$query->bindValue(":tipo",$tipo);
					$query->bindValue(":titulo",$titulo);
					$query->bindValue(":resumo",$resumo);
					$query->bindValue(":usuario",$usuario);
					$query->bindValue(":minicurriculo",$minicurriculo);
					$query->bindValue(":area",$area);
					$query->bindValue(":duracao",$duracao);
					$query->bindValue(":vagas",$vagas);
					$query->bindValue(":prerequisitos",$prerequisitos);
					$query->bindValue(":extras",$extras);
					

					$query->execute();	

					echo "
						<div class='container' style='width:50%; margin-top:10%;' >
							<div class='row' >
								<div class='alert-danger' style='background: #67D79A; height:300px; padding:10%; box-shadow: 0 1px 2px #222; '>
									<p style='text-align:center; font: normal 200% Arial; font-weight:300; color:#FFF; text-shadow: 0 1px #444;'>
										Proposta de Oficina submetida com sucesso!!!
									</p>
									<p style='text-align:center; font: normal 140% Arial; font-weight:300; color:#296; margin-top:30px; text-shadow: 0 1px #ADC;'>
										Você será redirecionado...<br><br>
										<img style='opacity:0.6; ' width='30px' heigh='30px'  src='../res/imgs/gifs/loader.GIF'>
									</p>				
								</div>
							</div>
						</div>
					";
					echo "<script type='text/javascript'>cadastro_activity()</script>";				

			} catch (PDOException $e) {
				echo $e->getMessage();
			}
		}
		
	}

		/* SUBMISSÃO DE RESUMOS  */
		else if(isset($_FILES['arquivo']) && isset($_POST['cadastrarAtividade']) && $_GET['Atividade'] == 'resumo'){
		
			$tipoPermitido  = array('application/pdf');
			

			try {	
				
				$id 			= $_GET['id'];
				$tipo 			= $_GET['Atividade'];
				$ministrante	= $_GET['user'];
				$modalidade 	= $_POST['modalidade'];
									

				$temp = $_FILES['arquivo']['tmp_name'];
				$type = $_FILES['arquivo']['type'];

				if(in_array($type , $tipoPermitido)){
					
					if(is_dir("files/user/".$id)){
						
					}else{
						$mask=umask(0);
						mkdir("files/user/".$id,0777);
						umask($mask);	
					}
		
				$uploaddir 	= "files/user/".$id."/";
				$uploadFile = $_FILES['arquivo']['name'];
				$file = str_replace(" ", "_", $uploadFile);
				$file = str_replace("ç", "c", $uploadFile);
				
				$uploadEnd 	= $uploaddir . basename($file);
				
				if(move_uploaded_file($_FILES['arquivo']['tmp_name'], $uploadEnd)) { 
					

					/*Recuperando o arquivo */
					$pasta 		= "files/user/".$id."/*.*";
					$arquivo	= glob($pasta); 
					$num 		= count($arquivo);
					$count = 0;
					 

					//Mostrando o arquivo...
					//echo "<script> window.open('".$arquivo[id_file]."'); </script>"; 
					
					for ($i=0; $i < $num; $i++) { 
						$nome_id = array($i,$arquivo[$i]);
					}

					
					$commUp = "INSERT INTO atividade (ministrante,id_file, nome_file, modalidade,tipo,status) VALUES (:ministrante,:id, :file,:modalidade ,:tipo,0)";	
					$upload = $pdo->prepare($commUp);

					
					$upload->bindValue(":ministrante",$ministrante);
					$upload->bindValue(":tipo",$tipo);
					$upload->bindValue(":id",$nome_id[0]);
					$upload->bindValue(":file",$nome_id[1]);
					$upload->bindValue(":modalidade",$modalidade);
					
					$upload->execute(); 

					echo "
						<div class='container' style='width:50%; margin-top:10%;' >
							<div class='row' >
								<div class='alert-danger' style='background: #67D79A; height:300px; padding:10%; box-shadow: 0 1px 2px #222; '>
									<p style='text-align:center; font: normal 200% Arial; font-weight:300; color:#FFF; text-shadow: 0 1px #444;'>
									 	Proposta de Resumo submetido com sucesso!!!
									</p>
									<p style='text-align:center; font: normal 140% Arial; font-weight:300; color:#296; margin-top:30px; text-shadow: 0 1px #ADC;'>
										Você será redirecionado...<br><br>
										<img style='opacity:0.6; ' width='30px' heigh='30px'  src='../res/imgs/gifs/loader.GIF'>
									</p>				
								</div>
							</div>
						</div>
					";
					echo "<script type='text/javascript'>cadastro_activity()</script>";	
					
				}
		
		}
		else{
					echo "
					<div class='container' style='width:50%; margin-top:10%;' >
						<div class='row' >
							<div class='alert-danger' style='background: #FF6673; height:300px; padding:10%; box-shadow: 0 1px 2px #222; '>
								<p style='text-align:center; font: normal 200% Arial; font-weight:300; color:#FFF; text-shadow: 0 1px #AA0000;'>
									Tente um arquivo PDF...
								</p>
								<p style='text-align:center; font: normal 140% Arial; font-weight:300; color:#B23; margin-top:30px; text-shadow: 0 1px #FF99AA;'>
									carregando...<br><br>
									<img style='opacity:0.6; ' width='30px' heigh='30px'  src='../res/imgs/gifs/loader.GIF'>
								</p>
								
							</div>
						</div>
					</div>
					";
					echo "<script type='text/javascript'>cadastro_resumo_wrong()</script>";	

				}
				}				

		catch (PDOException $e) {
			echo $e->getMessage();
		}
	
	}


	else if(isset($_POST['user_update_activity'])){
			
			$id 			= $_GET['id'];
			$tipo			= $_GET['tipo'];
			$minicurriculo	= $_POST['minicurriculo'];
			$titulo 		= $_POST['titulo'];
			$duracao  		= $_POST['duracao'];
			$resumo			= $_POST['resumo'];
			$vagas  		= $_POST['vagas'];
			$prerequisitos	= $_POST['prerequisitos'];
			$extras			= $_POST['extras'];		

			if($tipo == "minicurso" || $tipo == "oficina"){

			if(!is_numeric($vagas)){
				echo "
					<div class='container' style='width:50%; margin-top:10%;' >
						<div class='row' >
							<div class='alert-danger' style='background: #FF6673; height:300px; padding:10%; box-shadow: 0 1px 2px #222; '>
								<p style='text-align:center; font: normal 200% Arial; font-weight:300; color:#FFF; text-shadow: 0 1px #AA0000;'>
									Campo vagas só pode conter números!
								</p>
								<p style='text-align:center; font: normal 140% Arial; font-weight:300; color:#B23; margin-top:30px; text-shadow: 0 1px #FF99AA;'>
									carregando...<br><br>
									<img style='opacity:0.6; ' width='30px' heigh='30px'  src='../res/imgs/gifs/loader.GIF'>
								</p>
								
							</div>
						</div>
					</div>
					";
					echo "<script type='text/javascript'>update_activity()</script>";				
			}
			else{
			
				try {	

					$command = "UPDATE  atividade SET  titulo = :titulo,vagas =:vagas, duracao = :duracao, descricao = :resumo, prerequisitos = :prerequisitos,  minicurriculo = :minicurriculo , extras = :extras WHERE  id = :id  LIMIT 1 ";
					
					$query 	 = $pdo->prepare($command);
					
					$query->bindValue(":id",$id);
					

					$query->bindValue(":titulo",$titulo);
					$query->bindValue(":vagas",$vagas);
					$query->bindValue(":duracao",$duracao);
					$query->bindValue(":resumo",$resumo);
					$query->bindValue(":minicurriculo",$minicurriculo);
					$query->bindValue(":prerequisitos",$prerequisitos);
					$query->bindValue(":extras",$extras);
					

					$query->execute();	

					echo "
						<div class='container' style='width:50%; margin-top:10%;' >
							<div class='row' >
								<div class='alert-danger' style='background: #67D79A; height:300px; padding:10%; box-shadow: 0 1px 2px #222; '>
									<p style='text-align:center; font: normal 200% Arial; font-weight:300; color:#FFF; text-shadow: 0 1px #444;'>
										 Atividade atualizada com sucesso!!!
									</p>
									<p style='text-align:center; font: normal 140% Arial; font-weight:300; color:#296; margin-top:30px; text-shadow: 0 1px #ADC;'>
										Você será redirecionado...<br><br>
										<img style='opacity:0.6; ' width='30px' heigh='30px'  src='../res/imgs/gifs/loader.GIF'>
									</p>				
								</div>
							</div>
						</div>
					";
					echo "<script type='text/javascript'>update_activity()</script>";				
				

			} catch (PDOException $e) {
				echo $e->getMessage();
			}
		
			}
		}
		else if($tipo == "palestra"){
						
			
			
			
				try {	

					$command = "UPDATE  atividade SET  titulo = :titulo, descricao = :resumo, minicurriculo = :minicurriculo WHERE  id = :id  LIMIT 1 ";
					
					$query 	 = $pdo->prepare($command);
					
					$query->bindValue(":id",$id);
					
					$query->bindValue(":titulo",$titulo);
					$query->bindValue(":resumo",$resumo);
					$query->bindValue(":minicurriculo",$minicurriculo);
					

					$query->execute();	

					echo "
						<div class='container' style='width:50%; margin-top:10%;' >
							<div class='row' >
								<div class='alert-danger' style='background: #67D79A; height:300px; padding:10%; box-shadow: 0 1px 2px #222; '>
									<p style='text-align:center; font: normal 200% Arial; font-weight:300; color:#FFF; text-shadow: 0 1px #444;'>
										 Atividade atualizada com sucesso!!!
									</p>
									<p style='text-align:center; font: normal 140% Arial; font-weight:300; color:#296; margin-top:30px; text-shadow: 0 1px #ADC;'>
										Você será redirecionado...<br><br>
										<img style='opacity:0.6; ' width='30px' heigh='30px'  src='../res/imgs/gifs/loader.GIF'>
									</p>				
								</div>
							</div>
						</div>
					";
					echo "<script type='text/javascript'>update_activity()</script>";				
				

			} catch (PDOException $e) {
				echo $e->getMessage();
			}
		}
	}

	/*---------------------- USER  REMOVE  ACTIVITY -----------------------*/

	else if(isset($_POST['user_delete_activity'])){
			
			$id = $_GET['id'];	

			try {
				$command 	= "DELETE FROM atividade WHERE id = :id LIMIT 1";
				$query 		= $pdo->prepare($command);
				$query->bindValue(":id",$id);	
				$query->execute();	 
					echo "
						<div class='container' style='width:50%; margin-top:10%;' >
							<div class='row' >
								<div class='alert-danger' style='background: #67D79A; height:300px; padding:10%; box-shadow: 0 1px 2px #222; '>
									<p style='text-align:center; font: normal 200% Arial; font-weight:300; color:#FFF; text-shadow: 0 1px #444;'>
										Excluindo atividade!!!
									</p>
									<p style='text-align:center; font: normal 140% Arial; font-weight:300; color:#296; margin-top:30px; text-shadow: 0 1px #ADC;'>
										Você será redirecionado...<br><br>
										<img style='opacity:0.6; ' width='30px' heigh='30px'  src='../res/imgs/gifs/loader.GIF'>
									</p>				
								</div>
							</div>
						</div>
					";
					echo "<script type='text/javascript'>user_delete_activity()</script>";	

		
			} catch (PDOException $e) {
				
			}			
	}
/*---------------------- DELETE ACTIVITY  FROM USER -----------------------*/

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
			echo $ex->getMessage();
		}
	}

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
			
			while($result = $query->fetch(PDO::FETCH_OBJ)){
				
				$_SESSION['user'] = $result->user;
				$_SESSION['pass'] = $result->pass;	 
			}
			echo "<script> window.location = '../admin/submissoes'; </script>";
		}
		else{
			echo "<script> window.location = '../admin'; </script>";
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
				echo "<script> window.location= '../admin/submissoes'</script>";
			}
			else if($status == 1){
				$command = "UPDATE  atividade SET  status = 0 WHERE  id = :id";
				$query = $pdo->prepare($command);
				$query->bindValue(":id",$id);
				$query->execute();
				echo "<script> window.location= '../admin/submissoes'</script>";
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
	else if(isset($_POST['delete_news']) && $_GET['id']){
		$id 	= $_GET['id']; 
		try {
			$command = "DELETE FROM noticia WHERE id = :id";
			$query 	 = $pdo->prepare($command);
			$query->bindValue(":id",$id); 
			 if(isset($_POST['confirm_delete'])){
			 	$query->execute();
			 	echo "<script> window.location = '../admin/noticias'; </script>";
			 }
			 ?>
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
		<?php 
		} catch (PDOException $e) {
			echo $e->getMessage();
		}	
	}

	else{
		echo "<script> window.location = ''; </script>";
	}		
		
 ?>
