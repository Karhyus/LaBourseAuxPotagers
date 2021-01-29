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


$req = $bdd->query('SELECT * FROM project');

while($tmp = $req->fetch()){
	if($_POST['project_name'] == $tmp['project_name'] and $_POST['project_description_short'] == $tmp['project_description_short'] and $_SESSION['user_account']['id'] == $tmp['participant_id']){
		$_SESSION['project'] = $tmp;
		$erreur = false;
		break;
	}else{
		$erreur = true;
		
	}
}

	$counterpart_name = $_POST['counterpart_name'];
	$option_min = $_POST['option_min'];
	$option_max = $_POST['option_max'];
	$counterpart_description = $_POST['counterpart_description'];

	echo $_SESSION['project']['id'];
	echo $option_min[0];
	echo $option_max[0];
	echo $counterpart_description[0];

	for($i=0;$i<count($counterpart_name);$i++){
		if($option_min[$i]!="" && $option_max[$i]!="" && $counterpart_name[$i]!="" && $counterpart_description[$i]!=""){
			$bdd->prepare('
				INSERT INTO counterpart(project_id,counterpart_name,counterpart_description,option_min,option_max)
				VALUES(' . $_SESSION['project']['id'] . ',:counterpart_name,:counterpart_description,:option_min,:option_max)
				')->execute(array(":counterpart_name"=>$counterpart_name[$i],":counterpart_description"=>$counterpart_description[$i],":option_min"=>floatval($option_min[$i]),":option_max"=>floatval($option_max[$i])));
		}
	}
	
	$extensions_autorisees = array('jpg', 'jpeg','png', 'PNG','JPG','JPEG');
	
	if(!file_exists('../upload/'. $_SESSION['user_account']['user_name'] . '/' . $_SESSION['project']['id'])){
		mkdir('../upload/'. $_SESSION['user_account']['user_name'] . '/' . $_SESSION['project']['id']  ,0777,true);
	}


	if(isset($_FILES['photo1'])){
		$extension_upload1 = pathinfo($_FILES['photo1']['name'])['extension'];
		if (in_array($extension_upload1, $extensions_autorisees)) {
			echo "OUI";
	        $chemin = '../upload/'. $_SESSION['user_account']['user_name'] . '/' . $_SESSION['project']['id'] . '/';
	        
	        move_uploaded_file($_FILES['photo1']['tmp_name'], $chemin . 1 . '.' . $extension_upload1);
    	}
	}
	if(isset($_FILES['photo2'])){
		if(isset(pathinfo($_FILES['photo2']['name'])['extension'])){
			$extension_upload2 = pathinfo($_FILES['photo2']['name'])['extension'];
			if (in_array($extension_upload2, $extensions_autorisees)) {
		        $chemin = '../upload/'. $_SESSION['user_account']['user_name'] . '/' . $_SESSION['project']['id'] . '/';
		        
		        move_uploaded_file($_FILES['photo2']['tmp_name'], $chemin . 2 . '.' . $extension_upload2);
	    	}
	    }
	}
	if(isset($_FILES['photo3'])){
		if(isset(pathinfo($_FILES['photo3']['name'])['extension'])){
			$extension_upload3 = pathinfo($_FILES['photo3']['name'])['extension'];
			if (in_array($extension_upload3, $extensions_autorisees)) {
		        $chemin = '../upload/'. $_SESSION['user_account']['user_name'] . '/' . $_SESSION['project']['id'] . '/';
		        
		        move_uploaded_file($_FILES['photo3']['tmp_name'], $chemin . 3 . '.' . $extension_upload3);
		    }
		}
	}



	unset($_SESSION['project']);
	header('Location: ../' . $redirection);
}

?>