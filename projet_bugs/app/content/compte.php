<?php 


$comptequery = "SELECT * FROM user";
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

require('views/content/compte.html');
 ?>