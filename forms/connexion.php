<?php
session_start();

$user = 'root';
$password = '';

try {
    $bdd = new PDO('mysql:host=localhost:3308;dbname=la_bourse_aux_potagers', $user, $password);
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}

$req = $bdd->query('SELECT * FROM user_account');

while($tmp = $req->fetch()){
	if($_POST['email'] == $tmp['email'] and $_POST['password'] == $tmp['password']){
		$_SESSION['user_account'] = $tmp;
		$erreur = false;
	}else{
		$erreur = true;
		header('Location: ../connexion.php?erreur=identifiants&redirection=' . $_POST['redirection']);
	}
}
$req->closeCursor();

if($erreur == false){
	$redirection = $_POST['redirection'];
	unset($_POST['redirection']);
	header('Location: ../' . $redirection);
}

?>