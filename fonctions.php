<?php
	function chemin_photo($repertoire, $nomfichier)
	{
		//echo (chemin_photo('upload/$_SESSION["user_account"]["user_name"]/$tmp["project"]["id"]/', 1))	
		$ext = $repertoire . '/' . $nomfichier;

		return $ext;
	}

	function file_existance($repertoire, $nomfichier){
		$cpt = 0;
		if (file_exists($repertoire . '/' . $nomfichier . '.jpg')){
			$ext = $repertoire . '/' . $nomfichier . '.jpg';
			$cpt=1;
		}
		if (file_exists($repertoire . '/' . $nomfichier . '.png')){
			$ext = $repertoire . '/' . $nomfichier . '.png';
			$cpt=1;
		}
		if (file_exists($repertoire . '/' . $nomfichier . '.jpeg')){
			$ext = $repertoire . '/' . $nomfichier . '.jpeg';
			$cpt=1;
		}
		if (file_exists($repertoire . '/' . $nomfichier . '.JPG')){
			$ext = $repertoire . '/' . $nomfichier . '.JPG';
			$cpt=1;
		}
		if (file_exists($repertoire . '/' . $nomfichier . '.PNG')){
			$ext = $repertoire . '/' . $nomfichier . '.PNG';
			$cpt=1;
		}
		if (file_exists($repertoire . '/' . $nomfichier . '.JPEG')){
			$ext = $repertoire . '/' . $nomfichier . '.JPEG';
			$cpt=1;
		}
		if($cpt == 1){
			return $ext;
		}else{
			return null;
		}
		
	}
?>

