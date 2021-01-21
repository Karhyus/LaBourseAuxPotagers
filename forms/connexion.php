<?php
session_start();

include('../bdd_connexion.php'); 

$req = $bdd->query('SELECT * FROM user_account');

while($tmp = $req->fetch()){
	if($_POST['email'] == $tmp['email'] and $_POST['password'] == $tmp['password']){
		$_SESSION['user_account'] = $tmp;
		$erreur = false;
		break;
	}else{
		$erreur = true;
		
	}
}
$req->closeCursor();

if($erreur == false){
	$redirection = $_POST['redirection'];
	unset($_POST['redirection']);
	header('Location: ../' . $redirection);
}else{
	header('Location: ../connexion.php?erreur=identifiants&redirection=' . $_POST['redirection']);
}

?>