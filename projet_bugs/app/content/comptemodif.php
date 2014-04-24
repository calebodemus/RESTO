 <?php

	
	$comptequery = "SELECT * FROM user WHERE id = '" .$loginencours."'";
			$compteres = mysqli_query($mysqli, $comptequery);
	     
	      while ( $compteligne = mysqli_fetch_assoc($compteres) )
	      {
	         $login = $compteligne['login'];
	         $nom = $compteligne['nom'];
	         $prenom = $compteligne['prenom'];
	         $email =$compteligne['mail'];
	         $tel = $compteligne['tel'];
	         $adresse = $compteligne['adresse'];
	         $codepostal = $compteligne['cp'];
	         $ville = $compteligne['ville'];
	         $societé = $compteligne['societe'];
	         $point = $compteligne['point'];
	      }

if ( isset ($_POST['adresse']) )
{



	

		$login = mysqli_real_escape_string($mysqli, $login);
		$nom = mysqli_real_escape_string($mysqli, $nom);
		$prenom = mysqli_real_escape_string($mysqli, $prenom);

		$pass = mysqli_real_escape_string($mysqli, $pass1);
		
		/*$hash = password_hash($pass, PASSWORD_BCRYPT, ["cost"=>13]);*/


		$mail = mysqli_real_escape_string($mysqli, $mail);
		$tel = mysqli_real_escape_string($mysqli, $tel);
		$adresse = mysqli_real_escape_string($mysqli, $adresse);
		$cp = mysqli_real_escape_string($mysqli, $cp);
		$ville = mysqli_real_escape_string($mysqli, $ville);
		$societe = mysqli_real_escape_string($mysqli, $societe);

		$request = 'INSERT INTO user (prenom, nom, tel, adresse, cp, ville, mail, societe) VALUES("'.$prenom.'","'.$nom.'","'.$tel.'","'.$adresse.'","'.$cp.'","'.$ville.'","'.$mail.'","'.$societe.'"';
		mysqli_query($mysqli, $request);

		$id = mysqli_insert_id($mysqli);
		if ($id < 0)
			$error = mysqli_error($mysqli);
		else
			{
			header('Location:index.php?page=home');
			return;

			}
		
}

	
require('views/content/comptemodif.html');



?>