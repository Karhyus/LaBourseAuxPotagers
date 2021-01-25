<?php 

include('../bdd_connexion.php'); 

$req = $bdd->query('SELECT email FROM user_account');
$erreur = false;



?>