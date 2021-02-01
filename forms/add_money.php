<?php
include('../bdd_connexion.php'); 
session_start();

$last_name = $_POST['last_name'];
$first_name = $_POST['first_name'];
$amount_given = $_POST['amount_given'];

/*echo $_POST['last_name'];
echo $_POST['first_name'];
echo $amount_given;*/

$req_project = $bdd->query('SELECT * FROM project WHERE id=' . $_GET['id']);
$project = $req_project->fetch();

$req_counterpart = $bdd->query('SELECT * FROM counterpart WHERE project_id=' . $project['id']);
$counterpart = $req_counterpart->fetch();

$req_participant = $bdd->query('SELECT * FROM participant WHERE id=' . $project['participant_id']);
$participant = $req_participant->fetch();

$req_user = $bdd->query('SELECT * FROM user_account WHERE first_name="' . $first_name . '" AND last_name="' . $last_name . '"');
$user=$req_user->fetch();

$req_pinvest = $bdd->query('SELECT * FROM project_investor WHERE project_id=' . $project['id'] . ' AND user_account_id=' . $user['id']);
$pinvest = $req_pinvest->fetch();


if(!$pinvest){
	echo 'yes';
	$bdd->prepare('INSERT INTO
		project_investor(project_id,user_account_id,counterpart_id,amount_given)
		VALUES(:project_id,:user_account_id,:counterpart_id,:amount_given)
		'
	)->execute(array(":project_id"=>$project['id'],":user_account_id"=>$user['id'],":counterpart_id"=>$counterpart[0][0],":amount_given"=>$amount_given));

	$req_pinvest2 = $bdd->query('SELECT * FROM project_investor WHERE project_id=' . $project['id'] . ' AND user_account_id=' . $user['id']);
	$pinvest2 = $req_pinvest2->fetch();


	$bdd->prepare('INSERT INTO
		donation(project_id,project_investor,amount)
		VALUES(:project_id,:project_investor,:amount_given)
		'
	)->execute(array(":project_id"=>$project['id'],":project_investor"=>$pinvest2['id'],":amount_given"=>$amount_given));

	$bdd->prepare('UPDATE project SET investors = ? WHERE id= ?')->execute(array($project['investors']+1,$project['id']));
	$bdd->prepare('UPDATE project SET collected = ? WHERE id= ?')->execute(array($project['collected']+ $amount_given,$project['id']));


}else{
	$req_pinvest2 = $bdd->query('SELECT * FROM project_investor WHERE project_id=' . $project['id'] . ' AND user_account_id=' . $user['id']);
	$pinvest2 = $req_pinvest2->fetch();
	$amount_given_update = $pinvest2['amount_given'] + $amount_given;
	
	$bdd->prepare('INSERT INTO
		donation(project_id,project_investor,amount)
		VALUES(:project_id,:project_investor,:amount_given)
		'
	)->execute(array(":project_id"=>$project['id'],":project_investor"=>$pinvest2['id'],":amount_given"=>$amount_given));

	$bdd->prepare('UPDATE project_investor SET amount_given= ? WHERE id= ?')->execute(array($amount_given_update,$pinvest2['id']));

	$bdd->prepare('UPDATE project SET collected = ? WHERE id= ?')->execute(array($project['collected']+ $amount_given,$project['id']));

}

	header('Location: ../espace-admin.php');


?>