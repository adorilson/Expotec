<?php include_once '../../../../php/connection.php'; 

	try {
		$id = $_GET['id'];
		$command 	= "SELECT * FROM atividade WHERE id  = :id";
		$query 		= $pdo->prepare($command);
		$query->bindValue(":id",$id);
		$query->execute();
	} catch (PDOException $e) {
		echo $e;
	}
	while($result = $query->fetch(PDO::FETCH_OBJ)){
		$tipo 			= $result->tipo; 
		$titulo 		= $result->titulo;
		$descricao 		= $result->descricao; 
		$duracao 		= $result->duracao; 
		$vagas          = $result->vagas;
		$area 			= $result->area; 
		$prerequisitos 	= $result->prerequisitos; 
		$extras 		= $result->extras; 
		$minicurriculo 	= $result->minicurriculo;

		/* COISAS DO RESUMO */
        
		$id_file        = $result->id_file;
        $nome_file      = $result->nome_file;
        $modalidade     = $result->modalidade;  
	}

?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="shortcut icon" type="image/x-icon" href="http://portal.ifrn.edu.br/favicon.ico" />
	    <meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<title> Expotec </title>
		<link rel="stylesheet" href="../../../../res/lib/css/bootstrap.min.css">
		<link rel="stylesheet" href="../../../../res/lib/css/bootstrap-responsive.min.css">
		<link rel="stylesheet" href="../../../../res/css/style.css">
	
	 <script>
          
				function selecionarD(op)
				{
					var sel = document.getElementById("duracao");
					
					for (var i = 0; i < sel.options.length; i++)
					{
						if (sel.options[i].value == op)
						{
							sel.options[i].selected = "true";
							break;
						}
					}
				}
		</script>

	</head>
	<body class="body_cadastro" onload="selecionarD('<?php echo$duracao; ?>');">
		<div class="container">
			<div class="row">
				<div class="col-md-2 "></div>
				<div id="div_cadastro_login" class="col-md-8 alert cadastro">						
					<h1> Edite sua atividade  </h1>
					<?php if($tipo == 'minicurso' || $tipo == 'oficina'){ ?>
					<div class="row">
						<form action="../../../../php/functions.php?id=<?php echo $id;?>&tipo=<?php echo$tipo; ?>" method="post" class="form-cadastro" >

							<div class="div-form">
								<label>Titulo:</label>
								<input name="titulo" type="text" class="form-control inputNorm"  value="<?php echo $titulo;?>">	
							</div>
							 

							<div class="div-form">
                                <label for="nome">Vagas:</label>
                                <input name="vagas" type="text"   class="form-control inputNorm"  value="<?php echo$vagas;?>">
                            </div>


							 <div class="div-form">
                                <label>Duração:</label>
                                <select id="duracao" name="duracao" class="form-control inputNorm ">
                                    <option >Selecione aqui...</option>
                                    <option value="1h">1h</option>
                                    <option value="2h">2h</option>
                                    <option value="3h">3h</option>
                                </select>
                            </div> 

							<div class="div-form">
                                <label>Descrição:</label>
                                <textarea name="resumo" class="resumo"><?php echo $descricao; ?> </textarea>
                            </div>
								
							<div id="pre-requisitos" class="div-form">
                                <label>Pré-requisitos</label>
                                <textarea name="prerequisitos" class="resumo"  rows="5" ><?php echo $prerequisitos; ?></textarea>
                            </div> 
                           
                             <div class="div-form">
                                <label>Mini-Curriculo do Instrutor:</label>
                                <textarea name="minicurriculo" class="resumo"  rows="5"><?php echo $minicurriculo; ?></textarea>
                            </div>

                            <div class="div-form">
                                <label>Informações adicionais:</label>
                                <input name="extras" type="text" class="form-control inputNorm" value="<?php echo $extras;  ?> "> 
                            </div>

								<div class="div-form">
									<input name="user_update_activity" type="submit"  class="btn btn-success inputNorm" value="Salvar">
									<a href="../?id=<?php echo $id; ?>"><input type="button" id="btn_cancel" class="btn btn-danger inputNorm pull-right" value="Cancelar"  ></a>
							
								</div>
							</form>	
						</div><!-- END OF FORM -->	

						<?php }else if($tipo == 'palestra'){ ?>
						
						<div class="row">
						<form action="../../../../php/functions.php?id=<?php echo $id;?>&tipo=<?php echo$tipo; ?>" method="post" class="form-cadastro" >

							<div class="div-form">
								<label>Titulo:</label>
								<input name="titulo" type="text" class="form-control inputNorm"  value="<?php echo $titulo; ?> ">	
							</div>
							 
							<div class="div-form">
                                <label>Descrição:</label>
                                <textarea name="resumo" class="resumo"><?php echo $descricao; ?> </textarea>
                            </div>

                           
                             <div class="div-form">
                                <label>Mini-Curriculo do Instrutor:</label>
                                <textarea name="minicurriculo" class="resumo"  rows="5"><?php echo $minicurriculo; ?></textarea>
                            </div>


								<div class="div-form">
									<input name="user_update_activity" type="submit"  class="btn btn-success inputNorm" value="Salvar">
									<a href="../?id=<?php echo $id; ?>"><input type="button" id="btn_cancel" class="btn btn-danger inputNorm pull-right" value="Cancelar"  ></a>
								</div>
							</form>	
						</div><!-- END OF FORM -->	

							
						<?php } else if($tipo == 'resumo'){?>	
							
						<?php } ?>
					</div>
				<div class="col-md-2"></div><!-- encher linguiça -->
			</div><!-- end of row -->
		</div><!-- end of container -->

		<script src="../../res/lib/js/jquery.min.js"></script>
		<script src="../../res/lib/js/bootstrap.min.js"></script>
		<script src="../../res/js/script.js"></script>	
	</body>
</html>
 