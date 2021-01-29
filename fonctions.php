<?php
	function chemin_photo($repertoire, $nomfichier)
	{
		//echo (chemin_photo('upload/$_SESSION["user_account"]["user_name"]/$tmp["project"]["id"]/', 1))	
		$ext = $repertoire . '/' . $nomfichier;

		return $ext;
	}
?>

