<?php 
	$message_erreur = '';
	
	if(!empty($_POST)){
	    extract($_POST);
	    $validation = true;
	    
	    if($jour < 10) {
	    	$jour = '0'.$jour;
	    }
	    
	    if($mois < 10){
	    	$mois = '0'.$mois;
	    }
	    $date_unix = strtotime($annee.'-'.$mois.'-'.$jour);

	    if(($mois=='04' || $mois=='06' || $mois=='09' || $mois=='11') && ($jour == '31')){
		    $validation = false;
		    $erreur_date = "Ce jour n'existe pas";
	    }elseif(($mois=='02')&&($jour > '29')){
		    $validation = false;
		    $erreur_date = "Ce jour n'existe pas";   
	    }elseif($date_unix < time()){
		    $validation = false;
		    $erreur_date="Date invalide";
	    }
	    $heures_en_secondes = $heures*3600 + $minutes*60;

	    if((!ctype_digit($heures)) || (!ctype_digit($minutes))){
		    $validation =false;
		    $erreur_heure ="Heure invalide";
	    }elseif((($heures_en_secondes < 41400) || ($heures_en_secondes  > 48600)) && (($heures_en_secondes < 70200) || ($heures_en_secondes  > 77400))){
		    $validation=false;
		    $erreur_heure="Heure non comprise dans les créneaux horaires";
	    }
	    if(!ctype_digit($couverts)){
		    $validation = false;
		    $erreur_couverts = "Nombre de couverts est invalide";
	    }
	    
	    if(empty($nom)){
		    $validation=false;
		    $erreur_nom ="indiquez votre nom";
	    }
	    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
		    $validation =false;
		    $erreur_email="Indiquez votre adresse email";
	    }
	}
	require('views/content/reservation.html');
 ?>