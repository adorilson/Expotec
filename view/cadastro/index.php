
<!DOCTYPE html>
<html>
	<head>
		<link rel="shortcut icon" type="image/x-icon" href="http://portal.ifrn.edu.br/favicon.ico" />
	    <meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<title> Expotec </title>
		<link rel="stylesheet" href="../../res/lib/css/bootstrap.min.css">
		<link rel="stylesheet" href="../../res/css/style.css">
		<script>
			/*  Formatação do CPF */
	 	function formatar(mascara, documento){
			  var i = documento.value.length;
			  var saida = mascara.substring(0,1);
			  var texto = mascara.substring(i)
			  
			  if (texto.substring(0,1) != saida){
			            documento.value += texto.substring(0,1);
			  }
			  
		}
		</script>
		<?php if(isset($_GET['senha']) == 'Fraca'){
					echo "<script>alert('A senha deve conter no mínimo 6 dígitos, incluindo números e letras')</script>";
				}
				else if(isset($_GET['senhas']) == 'Invalidas'){
					echo "<script>alert('Senhas não conferem!')</script>";
				}
		?>
	</head>
	<body class="body_cadastro">
		<div class="container">
			<div class="row">
				<div class="col-md-2 "></div>
				<div id="div_cadastro_login" class="col-md-8 alert cadastro">						
					<h1> Cadastre-se  </h1>
					<div class="row">
						<form action="../../php/functions.php" method="post" class="form-cadastro" >

							<div class="div-form">
								<label for="nome">Nome:</label>
								<input id="nome"name="nome"type="text" class="form-control inputNorm" autofocus  required placeholder="Nome completo">	
							</div>

							<div class="div-form">
                                <label for="nome">CPF:</label>
                                <input name="cpf" type="text"  maxlength="14" class="form-control inputNorm" required placeholder="Informe seu CPF" OnKeyPress="formatar('###.###.###-##', this)">
                            </div>


							<div class="div-form">
								<label for="nome">Email:</label>
								<input name="email"  id="email" type="email" class="form-control inputNorm"  required placeholder="Seu email" >	
							</div>
							
							<div class="div-form">
								<label for="nome">Senha:</label>
								<input name="senha" type="password" class="form-control inputNorm" required placeholder="Senha">
							</div>
							
							<div class="div-form">
								<label for="nome">Confirme sua Senha:</label>
								<input id="invalid-pass" name="confirme_senha" type="password" class="form-control inputNorm" required placeholder="Confirmação da sua senha">
							</div>
							
							
							
							<div class="div-form" required>
								<label>Perfil:</label><br>
								<select class="inputNorm" name="tipo" id="tipo">
									<option value="">Selecione aqui...</option>
									<option id="aluno" value="aluno">Aluno do IFRN</option>
									<option id="prof" value="professor">Servidor do IFRN</option>
									<option id="comunidade" value="comunidade">Comunidade</option>
								</select>
							</div>
							

							<div id="matricula" class="div-form">
								<label >Matricula:</label>
								<input name="matricula" type="text" class="form-control inputNorm" placeholder="Matricula">	
							</div>
							
							

							<div class="div-form" required>
								<label>Sexo:</label><br>
								<select class="inputNorm" name="sexo">
									<option value="">Selecione aqui...</option>
									<option value="m">Masculino</option>
									<option value="f">Feminino</option>
								</select>
							</div>
							
							
							<div class="div-form">
							<label >Data de nascimento:</label><br>
								<select name="birthday_day" id="day" required>
									<option value="0" selected="1">Dia</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
									<option value="6">6</option>
									<option value="7">7</option>
									<option value="8">8</option>
									<option value="9">9</option>
									<option value="10">10</option>
									<option value="11">11</option>
									<option value="12">12</option>
									<option value="13">13</option>
									<option value="14">14</option>
									<option value="15">15</option>
									<option value="16">16</option>
									<option value="17">17</option>
									<option value="18">18</option>
									<option value="19">19</option>
									<option value="20">20</option>
									<option value="21">21</option>
									<option value="22">22</option>
									<option value="23">23</option>
									<option value="24">24</option>
									<option value="25">25</option>
									<option value="26">26</option>
									<option value="27">27</option>
									<option value="28">28</option>
									<option value="29">29</option>
									<option value="30">30</option>
									<option value="31">31</option>
								</select>
								<select name="birthday_month" id="month" required>
									<option value="0" selected="1">Mês</option>
									<option value="1">Janeiro</option>
									<option value="2">Fevereiro</option>
									<option value="3">Março</option>
									<option value="4">Abril</option>
									<option value="5">Maio</option>
									<option value="6">Junho</option>
									<option value="7">Julho</option>
									<option value="8">Agosto</option>
									<option value="9">Setembro</option>
									<option value="10">Outubro</option>
									<option value="11">Novembro</option>
									<option value="12">Dezembro</option>
								</select>
								<select name="birthday_year" id="year" required>
									<option selected="1">Ano</option>
									<option value="2014">2014</option>
									<option value="2013">2013</option>
									<option value="2012">2012</option>
									<option value="2011">2011</option>
									<option value="2010">2010</option>
									<option value="2009">2009</option>
									<option value="2008">2008</option>
									<option value="2007">2007</option>
									<option value="2006">2006</option>
									<option value="2005">2005</option>
									<option value="2004">2004</option>
									<option value="2003">2003</option>
									<option value="2002">2002</option>
									<option value="2001">2001</option>
									<option value="2000">2000</option>
									<option value="1999">1999</option>
									<option value="1998">1998</option>
									<option value="1997">1997</option>
									<option value="1996">1996</option>
									<option value="1995">1995</option>
									<option value="1994">1994</option>
									<option value="1993">1993</option>
									<option value="1992">1992</option>
									<option value="1991">1991</option>
									<option value="1990">1990</option>
									<option value="1989">1989</option>
									<option value="1988">1988</option>
									<option value="1987">1987</option>
									<option value="1986">1986</option>
									<option value="1985">1985</option>
									<option value="1984">1984</option>
									<option value="1983">1983</option>
									<option value="1982">1982</option>
									<option value="1981">1981</option>
									<option value="1980">1980</option>
									<option value="1979">1979</option>
									<option value="1978">1978</option>
									<option value="1977">1977</option>
									<option value="1976">1976</option>
									<option value="1975">1975</option>
									<option value="1974">1974</option>
									<option value="1973">1973</option>
									<option value="1972">1972</option>
									<option value="1971">1971</option>
									<option value="1970">1970</option>
									<option value="1969">1969</option>
									<option value="1968">1968</option>
									<option value="1967">1967</option>
									<option value="1966">1966</option>
									<option value="1965">1965</option>
									<option value="1964">1964</option>
									<option value="1963">1963</option>
									<option value="1962">1962</option>
									<option value="1961">1961</option>
									<option value="1960">1960</option>
									<option value="1959">1959</option>
									<option value="1958">1958</option>
									<option value="1957">1957</option>
									<option value="1956">1956</option>
									<option value="1955">1955</option>
									<option value="1954">1954</option>
									<option value="1953">1953</option>
									<option value="1952">1952</option>
									<option value="1951">1951</option>
									<option value="1950">1950</option>
									<option value="1949">1949</option>
									<option value="1948">1948</option>
									<option value="1947">1947</option>
									<option value="1946">1946</option>
									<option value="1945">1945</option>
									<option value="1944">1944</option>
									<option value="1943">1943</option>
									<option value="1942">1942</option>
									<option value="1941">1941</option>
									<option value="1940">1940</option>
									<option value="1939">1939</option>
									<option value="1938">1938</option>
									<option value="1937">1937</option>
									<option value="1936">1936</option>
									<option value="1935">1935</option>
									<option value="1934">1934</option>
									<option value="1933">1933</option>
									<option value="1932">1932</option>
									<option value="1931">1931</option>
									<option value="1930">1930</option>
									<option value="1929">1929</option>
									<option value="1928">1928</option>
									<option value="1927">1927</option>
									<option value="1926">1926</option>
									<option value="1925">1925</option>
									<option value="1924">1924</option>
									<option value="1923">1923</option>
									<option value="1922">1922</option>
									<option value="1921">1921</option>
									<option value="1920">1920</option>
									<option value="1919">1919</option>
									<option value="1918">1918</option>
									<option value="1917">1917</option>
									<option value="1916">1916</option>
									<option value="1915">1915</option>
									<option value="1914">1914</option>
									<option value="1913">1913</option>
									<option value="1912">1912</option>
									<option value="1911">1911</option>
									<option value="1910">1910</option>
									<option value="1909">1909</option>
									<option value="1908">1908</option>
									<option value="1907">1907</option>
									<option value="1906">1906</option>
									<option value="1905">1905</option>
								</select>
							</div>

							<!-- 
							 <div class="div-form">
                                <label>Mini-Curriculo do Instrutor:</label>
                                <textarea id="minicurriculo"  name="minicurriculo" class="resumo" data-toggle="tooltip" data-placement="left" title="Não é obrigatório" rows="5" placeholder="Um breve resumo sobre sua experiência e qualificação." ></textarea>
                            </div>
							 -->
								<div class="div-form">
									<input name="cadastrar" type="submit"  class="btn btn-success inputNorm" value="Salvar">
									<input type="button" id="btn_cancel" class="btn btn-danger inputNorm pull-right" value="Cancelar"  >
								</div>
							</form>	
						</div>	
					</div>
				<div class="col-md-2"></div><!-- encher linguiça -->
			</div><!-- end of row -->
		</div><!-- end of container -->

		<script src="../../res/lib/js/jquery.min.js"></script>
		<script src="../../res/lib/js/bootstrap.min.js"></script>
		<script src="../../res/js/script.js"></script>	
	</body>
</html>
 