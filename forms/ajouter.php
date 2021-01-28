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
	$start_date = date("Y-m-d");
	$date1 = $_POST['end_date'];
	$end_date = date("Y-m-d", strtotime($date1));

	$bdd->prepare(
		'INSERT INTO
		project (project_name,project_description_short,project_location,goal,project_description_long,product_type,innovative,collected, investors,project_status_id,end_date,start_date,participant_id)
		VALUES
		(:project_name,:project_description_short,:project_location,:goal,:project_description_long,:product_type,:innovative,0.0,0,1,:end_date,' . $start_date . ',' . $participant_id . ')
		'
	)->execute(array(":project_name"=>$project_name,":project_description_short"=>$project_description_short,":project_location"=>$project_location,":goal"=>$goal,":project_description_long"=>$project_description_long,":product_type"=>$product_type,":innovative"=>$innovative,":end_date"=>$end_date));

	$counterpart_name = $_POST['counterpart_name']
	$option_min = $_POST['option_min'];
	$option_max = $_POST['option_max'];
	$counterpart_description = $_POST['counterpart_description'];

	for($i=0;$i<count($counterpart);$i++){
		if($option_min[$i]!="" && $option_max[$i]!="" && $counterpart[$i]!=""){
			$bdd->prepare('
				INSERT INTO counterpart(project_id,counterpart_name,counterpart_description,option_min,option_max)
				VALUES()
				')
		}
	}

	header('Location: ../' . $redirection);
}

?>