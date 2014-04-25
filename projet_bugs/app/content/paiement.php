<?php 
	if (isset($_SESSION['montant_payer']))
		$montant_payer = $_SESSION['montant_payer'] . ' euros';
	else
		$montant_payer = '0 euros';

	$num_carte = '';
	$titulaire = '';
	$date_exp = '';
	$cryptogramme = '';

	require('views/content/paiement.html');
 ?>