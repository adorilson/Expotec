<?php 
	
	/* code ... */
	echo "<p style='margin: 7px;'> Pesquisando... </p>";
	$q = $_GET['q'];
	
	if($q == 'Palestra')
		header("Location: ../view/palestras/");
	
	else if($q == 'Minicurso')
		header("Location: ../view/minicursos");

		