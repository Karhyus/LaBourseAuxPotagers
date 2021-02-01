		<?php
		session_start();
		include('../bdd_connexion.php');
		include('../fonctions.php');

		$req = $bdd->query('SELECT * FROM project WHERE id=' . $_GET['id']);
		$project = $req->fetch();
		$req_part = $bdd->query('SELECT * FROM participant WHERE id=' . $project['participant_id']);
		$part = $req_part->fetch();
		$req_user = $bdd->query('SELECT * FROM user_account WHERE id=' . $part['user_account_id']);
		$user = $req_user->fetch();
		$erreur = false;

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

		$bdd->prepare('UPDATE project SET project_name = ? WHERE id = ?')->execute(array($_POST['project_name'], $_GET['id']));
		$bdd->prepare('UPDATE project SET project_description_short = ? WHERE id = ?')->execute(array($_POST['project_description_short'], $_GET['id']));
		$bdd->prepare('UPDATE project SET project_location = ? WHERE id = ?')->execute(array($_POST['project_location'], $_GET['id']));
		$bdd->prepare('UPDATE project SET goal = ? WHERE id = ?')->execute(array(floatval($_POST['goal']), $_GET['id']));
		$bdd->prepare('UPDATE project SET project_description_long = ? WHERE id = ?')->execute(array($_POST['project_description_long'], $_GET['id']));
		$bdd->prepare('UPDATE project SET product_type = ? WHERE id = ?')->execute(array($product_type, $_GET['id']));
		$bdd->prepare('UPDATE project SET innovative = ? WHERE id = ?')->execute(array($innovative, $_GET['id']));
		$bdd->prepare('UPDATE project SET end_date = ? WHERE id = ?')->execute(array($_POST['end_date'], $_GET['id']));


		$counterpart_name = $_POST['counterpart_name'];
		$option_min = $_POST['option_min'];
		$option_max = $_POST['option_max'];
		$counterpart_description = $_POST['counterpart_description'];
		$id_ct = $_POST['id_ct'];

		for($i=0;$i<count($id_ct);$i++){
			if($option_min[$i]!="" && $option_max[$i]!="" && $counterpart_name[$i]!="" && $counterpart_description[$i]!=""){
				if($id_ct[$i]!=0){
					$bdd->prepare('UPDATE counterpart SET counterpart_name = ? WHERE id = ?')->execute(array($counterpart_name[$i],$id_ct[$i]));
					$bdd->prepare('UPDATE counterpart SET counterpart_description = ? WHERE id = ?')->execute(array($counterpart_description[$i],$id_ct[$i]));
					$bdd->prepare('UPDATE counterpart SET option_min = ? WHERE id = ?')->execute(array(floatval($option_min[$i]),$id_ct[$i]));
					$bdd->prepare('UPDATE counterpart SET option_max = ? WHERE id = ?')->execute(array(floatval($option_max[$i]),$id_ct[$i]));
				}else{
					echo 'oui';
					$bdd->prepare('
					INSERT INTO counterpart(project_id,counterpart_name,counterpart_description,option_min,option_max)
					VALUES(' . $_GET['id'] . ',:counterpart_name,:counterpart_description,:option_min,:option_max)
					')->execute(array(":counterpart_name"=>$counterpart_name[$i],":counterpart_description"=>$counterpart_description[$i],":option_min"=>floatval($option_min[$i]),":option_max"=>floatval($option_max[$i])));
				}
			}
		}



		$extensions_autorisees = array('jpg', 'jpeg','png', 'PNG','JPG','JPEG');
			


			
			if(isset($_FILES['photo1'])){
				$extension_upload1 = pathinfo($_FILES['photo1']['name'])['extension'];
				if (in_array($extension_upload1, $extensions_autorisees)) {
					echo "OUI";
			        $chemin = '../upload/'. $user['user_name'] . '/' . $_GET['id'] . '/';
			        if(file_exists(file_existance($chemin, 1))){
			        	unlink($chemin . 1);
			        }
			        move_uploaded_file($_FILES['photo1']['tmp_name'], $chemin . 1 . '.' . $extension_upload1);
		    	}
			}
			if(isset($_FILES['photo2'])){
				if(isset(pathinfo($_FILES['photo2']['name'])['extension'])){
					$extension_upload2 = pathinfo($_FILES['photo2']['name'])['extension'];
					if (in_array($extension_upload2, $extensions_autorisees)) {
				        $chemin = '../upload/'. $user['user_name'] . '/' . $_GET['id'] . '/';
				        if(file_exists(file_existance($chemin, 2))){
			        	unlink($chemin . 2);
			        }
				        move_uploaded_file($_FILES['photo2']['tmp_name'], $chemin . 2 . '.' . $extension_upload2);
			    	}
			    }
			}
			if(isset($_FILES['photo3'])){
				if(isset(pathinfo($_FILES['photo3']['name'])['extension'])){
					$extension_upload3 = pathinfo($_FILES['photo3']['name'])['extension'];
					if (in_array($extension_upload3, $extensions_autorisees)) {
				        $chemin = '../upload/'. $user['user_name'] . '/' . $_GET['id'] . '/';
				       if(file_exists(file_existance($chemin, 3))){
			        	unlink($chemin . 3);
			        }
				        move_uploaded_file($_FILES['photo3']['tmp_name'], $chemin . 3 . '.' . $extension_upload3);
				    }
				}
			}





		header('Location: ../modif_projet.php?id=' . $_GET['id']);


		?>