<?php 


    

    $message_ajout = "";
   

	if ( isset($_POST["comment"]) )
	{   
			if(isset($_SESSION['loginid']))
			{
				
				$idusercomm = $_SESSION['loginid'];
			}
			else
			$idusercomm = 404;	


		

    	
    	$comment = mysqli_real_escape_string($mysqli,$_POST["comment"]);		
    	

    	$query = "INSERT INTO `livre`(`id_user`,`comment`) VALUES ('" . $idusercomm . "','" . $comment . "')";		
	    
    	$res = mysqli_query($mysqli,$query);

        if ($res)
            $message_ajout = 'Votre commentaire a été créé.';
 //            
        else
            $message_ajout = 'Erreur. La création de votre commentaire a échoué.' . mysqli_error($mysqli);
            
            
       
	}	
	 unset($_POST["comment"]);
	require('views/content/livreadd.html');
	
//recuperation des comments

$commentSearch= " SELECT * FROM `livre` ORDER by `id` DESC ";
$commentSearchQuery=mysqli_query($mysqli,$commentSearch);

while($ligne = mysqli_fetch_assoc($commentSearchQuery))
	{	
		$commentAff = htmlentities($ligne['comment']);
		$commentDate = $ligne['date_comment'];
		$commentIduser= $ligne['id_user'];
		
		              //recherche login
		                $loginsearch = ' SELECT `login` FROM bugs.user WHERE `id`= "'.$commentIduser.'" ';
		                 $loginsearchQuery = mysqli_query($mysqli,$loginsearch);
		                 $lignelogin = mysqli_fetch_assoc($loginsearchQuery);
		                 
		                 
		                 $commentLogin = $lignelogin['login'];
		                
		require('views/content/livre.html');
	}



 ?>