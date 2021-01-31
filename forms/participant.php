<?php
include('../bdd_connexion.php'); 

$company_name = $_POST['company_name'];
$description = $_POST['description'];
$city = $_POST['city'];
$zip_code = $_POST['zip_code'];
$user_account_id = $_POST['user_account_id'];

$bdd->prepare(
	'INSERT INTO 
	participant(user_account_id,description,company_name,city,zip_code)
	VALUES
	(:user_account_id,:description,:company_name,:city,:zip_code)
	'
)->execute(array(":user_account_id"=>$user_account_id,":description"=>$description,":company_name"=>$company_name,":city"=>$city,":zip_code"=>$zip_code));

echo $company_name;
echo $description;
echo $city;
echo $zip_code;
echo $user_account_id;

$redirection = $_POST['redirection'];
unset($_POST['redirection']);
header('Location: ../' . $redirection);

?>