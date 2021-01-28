<?php 
include('../bdd_connexion.php'); 

$req = $bdd->query('SELECT email FROM user_account');
$erreur = false;

while($tmp = $req->fetch()){
	//Si le mail existe déjà
	if($tmp['email'] == $_POST['email']){
		$erreur = true;
		header('Location: ../creercompte.php?erreur=mail&redirection=' . $_POST['redirection']);
	}
}
$req->closeCursor();



if(!$erreur){
	$redirection = $_POST['redirection'];
	unset($_POST['redirection']);

	$user_name = $_POST['user_name'];
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$date_of_birth = $_POST['date_of_birth'];
	if(isset($_POST['type'])){
		$type=1;
	}else{
		$type=2;
	}


	$bdd->prepare(
		'INSERT INTO
		user_account(first_name, last_name, user_name, email, password, date_of_birth, project_supported, total_amount, wallet,type)
		VALUES
		(:first_name, :last_name, :user_name, :email, :password, :date_of_birth,0,0.0,0.0,:type)
		'
	)->execute(array(":first_name"=>$first_name,":last_name"=>$last_name,":user_name"=>$user_name,":email"=>$email,":password"=>$password,":date_of_birth"=>$date_of_birth,":type"=>$type));

	if(!file_exists('../upload/' . $user_name)){
		mkdir('../upload/'. $user_name,0777,true);
	}

	header('Location: ../' . $redirection);
	}

	
?>