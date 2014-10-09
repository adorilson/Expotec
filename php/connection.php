<?php 
	try {
		$pdo = new PDO("mysql:host=localhost; dbname=your_db;","your_user","your_pass");
	} catch (PDOException $e) {
		if($e->getCode() == 1049){
			echo "Banco de dados não existe...";
		}
	}
 	
 ?>
