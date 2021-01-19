<?php 
$user = 'root';
$password = '';

try {
    $bdd = new PDO('mysql:host=localhost:3308;dbname=la_bourse_aux_potagers', $user, $password);
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}

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


	$bdd->prepare(
		'INSERT INTO
		user_account(first_name, last_name, user_name, email, password, date_of_birth, project_supported, total_amount, wallet)
		VALUES
		(:first_name, :last_name, :user_name, :email, :password, :date_of_birth,0,0.0,0.0)
		'
	)->execute(array(":first_name"=>$first_name,":last_name"=>$last_name,":user_name"=>$user_name,":email"=>$email,":password"=>$password,":date_of_birth"=>$date_of_birth));

	header('Location: ../' . $redirection);
	}

	
?>