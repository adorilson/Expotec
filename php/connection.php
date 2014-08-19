<?php 
	try {
		$pdo = new PDO("mysql:host=localhost; dbname=expotec_db;","root","");
	} catch (PDOException $e) {
		if($e->getCode() == 1049){
			echo "Banco de dados não existe...";
		}
	}

 ?>