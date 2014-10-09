<?php 
	try {
		$pdo = new PDO("mysql:host=localhost; dbname=expotecjc;","expotecjc","%Htv&8Gnn9");
	} catch (PDOException $e) {
		if($e->getCode() == 1049){
			echo "Banco de dados não existe...";
		}
	}
 	
 ?>