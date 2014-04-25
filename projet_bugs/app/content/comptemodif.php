 <?php
$idtomodif = $_SESSION['loginid'];
	
$comptequery = "SELECT * FROM user WHERE id = '" .$idtomodif."'";
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

        if ( isset ($_POST['newadresse']) )
        {
                $idtomodif = $_SESSION['loginid'];

                $newnom = $_POST['newnom'];
                $newprenom = $_POST['newprenom'];
                $newmail  = $_POST['newmail'];
                $newtel = $_POST['newtel'];
                $newadresse  = $_POST['newadresse'];
                $newcp = $_POST['newcp'];
                $newville = $_POST['newville'];
                $newsociete = $_POST['newsociete'];

                $newnom = mysqli_real_escape_string($mysqli, $newnom);
                $newprenom = mysqli_real_escape_string($mysqli, $newprenom);
                /*$hash = password_hash($pass, PASSWORD_BCRYPT, ["cost"=>13]);*/

                $newmail = mysqli_real_escape_string($mysqli, $newmail);
                $newtel = mysqli_real_escape_string($mysqli, $newtel);
                $newadresse = mysqli_real_escape_string($mysqli, $newadresse);
                $newcp = mysqli_real_escape_string($mysqli, $newcp);
                $newville = mysqli_real_escape_string($mysqli, $newville);
                $newsociete = mysqli_real_escape_string($mysqli, $newsociete);

                $update= 'UPDATE  user SET nom = "'.$newnom.'", prenom = "'.$newprenom.'", adresse ="'.$newadresse.'", tel ="'.$newtel.'", ville ="'.$newville.'", cp ="'.$newcp.'", mail = "'.$newmail.'", societe ="'.$newsociete.'" WHERE id = "'.$idtomodif.'"';
                $updatesql =  mysqli_query($mysqli, $update);

                $id = mysqli_insert_id($mysqli);
                if ($id < 0)
                {
                    $error = mysqli_error($mysqli);
                $messagecompte = "erreur dans la modification de vos données... , veuillez reesayer.";
                     require('views/content/compteismodified.html');
                }
                    
                else
                    {
                        $messagecompte = "Vos données ont bien eté modifiées !";
                    require('views/content/compteismodified.html');
                    return;

                    }

        }

	
require('views/content/comptemodif.html');



?>