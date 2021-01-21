<?php
session_start();
include('../bdd_connexion.php');

$req = $bdd->query('SELECT email FROM user_account');
$erreur = false;

while($tmp = $req->fetch()){
	//Si le mail ou le username existe déjà
	if($tmp['email'] == $_POST['email']){
		if($_POST['email'] != $_SESSION['user_account']['email']){
			$erreur = true;
			header('Location: ../mon_compte.php?erreur=mail&redirection=' . $_POST['redirection']);
		}
	}
}
$req->closeCursor();

if($erreur == false){
	$bdd->prepare('UPDATE user_account SET email = ? WHERE id = ?')->execute(array($_POST['email'], $_SESSION['user_account']['id']));
	$_SESSION['user_account']['email'] = $_POST['email'];
	$bdd->prepare('UPDATE user_account SET user_name = ? WHERE id = ?')->execute(array($_POST['user_name'], $_SESSION['user_account']['id']));
	$_SESSION['user_account']['user_name'] = $_POST['user_name'];
	$bdd->prepare('UPDATE user_account SET last_name = ? WHERE id = ?')->execute(array($_POST['last_name'], $_SESSION['user_account']['id']));
	$_SESSION['user_account']['last_name'] = $_POST['last_name'];
	$bdd->prepare('UPDATE user_account SET first_name = ? WHERE id = ?')->execute(array($_POST['first_name'], $_SESSION['user_account']['id']));
	$_SESSION['user_account']['first_name'] = $_POST['first_name'];
	$bdd->prepare('UPDATE user_account SET date_of_birth = ? WHERE id = ?')->execute(array($_POST['date_of_birth'], $_SESSION['user_account']['id']));
	$_SESSION['user_account']['date_of_birth'] = $_POST['date_of_birth'];

	header('Location: ../mon_compte.php?succes=perso');
}


?>