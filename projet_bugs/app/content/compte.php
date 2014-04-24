<?php 

$loginencours = $_SESSION['loginid'];
if ($loginencours == 404)
{
   $messagecompte="Veuillez vous identifier pour afficher vos informations. Pas encore incris ? --> <br/> <button id='logoutbtn'>
<a href='index.php?page=signup'>CREER UN COMPTE</a>
</button> ";
require('views/content/compte404.html');
}
else
{
   $messagecompte='';

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

require('views/content/compte.html');
   
   if (isset($_GET['modif']))
   {
      require('views/content/comptemodif.html');
   }
}
  







 ?>