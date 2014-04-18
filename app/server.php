<?php 
	// JE RECUPERE LURL EN COURS (index.php?page=module)
	$url_en_cours = basename($_SERVER['REQUEST_URI']);
	// J'EXPLODE MA CHAINE APRES le index.php? POUR RECUPERE QUE LE MODULE EN COURS;
	$encours = explode("?", $url_en_cours);
	// $encours[1] = page=lemodule
?>