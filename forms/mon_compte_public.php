<?php
session_start();
include('../bdd_connexion.php');



if($erreur == false){
	$bdd->prepare('UPDATE participant SET company_name = ? WHERE id = ?')->execute(array($_POST['company_name'], $_GET['id']));
	$bdd->prepare('UPDATE participant SET city = ? WHERE id = ?')->execute(array($_POST['city'], $_GET['id']));
	$bdd->prepare('UPDATE participant SET zip_code = ? WHERE id = ?')->execute(array($_POST['zip_code'], $_GET['id']));
	$bdd->prepare('UPDATE participant SET description = ? WHERE id = ?')->execute(array($_POST['description'], $_GET['id']));

	header('Location: ../mon_compte.php?succes=perso');
}


?>