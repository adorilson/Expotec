<?php include 'connection.php'; ?>
<!DOCTYPE html>
<html>
<head><meta charset="utf-8"><meta http-equiv="X-UA-Compatible" content="IE=edge"><title>carregando...</title>
<script type='text/javascript'>

function login_right(){setTimeout("window.location='../pages/admin/post_activity.php'",2000);}
function login_wrong(){setTimeout("window.location='authenticate_user.php'",2000);}
</script></head></html>


<?php 

	if(isset($_POST['select_user'])){
		$user = $_POST['user'];
		$pass = $_POST['pass'];
		$command = "SELECT * FROM user WHERE (user=:user) AND (pass=:pass)";
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



 ?>