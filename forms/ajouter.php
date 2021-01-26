<?php 

include('../bdd_connexion.php'); 
session_start();

$erreur = false;

//Blinder don négatif et don min < don max


if(!$erreur){
	$redirection = $_POST['redirection'];
	unset($_POST['redirection']);

	$project_name = $_POST['project_name'];
	$project_description_short = $_POST['project_description_short'];
	$project_location = $_POST['project_location'];
	$goal = floatval($_POST['goal']);
	$project_description_long = $_POST['project_description_long'];
	if($_POST['product_type']=="legume"){
		$product_type = 0;	
	}else{
		$product_type = 1;
	}
	if(isset($_POST['innovative'])){
		$innovative = 1;
	}else{
		$innovative = 0;
	}
	//temporaire
	$participant_id = $_SESSION['user_account']['id'];
	$date = date("Y-m-d");

	echo $date;
	echo $project_name;
	echo $project_description_short;
	echo $project_location;
	echo $goal;
	echo $project_description_long;
	echo $product_type;
	echo $innovative;
	echo $participant_id;

	$bdd->prepare(
		'INSERT INTO
		project (project_name,project_description_short,project_location,goal,project_description_long,product_type,innovative,collected, investors,project_status_id,start_date,end_date,participant_id)
		VALUES
		(:project_name,:project_description_short,:project_location,:goal,:project_description_long,:product_type,:innovative,0.0,0,1,' . $date . ',2021-01-27,' . $participant_id . ')
		'
	)->execute(array(":project_name"=>$project_name,":project_description_short"=>$project_description_short,":project_location"=>$project_location,":goal"=>$goal,":project_description_long"=>$project_description_long,":product_type"=>$product_type,":innovative"=>$innovative));

	$option_min = $_POST['option_min'];
	$option_max = $_POST['option_max'];
	$counterpart = $_POST['counterpart'];

	for($i=0;$i<count($counterpart);$i++){
		if($option_min[$i]!="" && $option_max[$i]!="" && $counterpart[$i]!=""){

		}
	}

	header('Location: ../' . $redirection);
}

?>