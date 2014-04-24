<?php
session_start();
header("Content-Type: text/html; charset=utf-8");
require('app/server.php');
$page = "home"; 
<<<<<<< HEAD
$mysqli = mysqli_connect("localhost", "root","troiswa", "bugs"); 

=======
$mysqli = mysqli_connect("localhost", "root", "troiswa", "bugs"); 
/*| Il faut vérifier si la connection mysql a reussi ! |*/
>>>>>>> e53a545b6cd9aa70be16dfc00687d26a5eaa923e

$tab = array("home" => "content/home",
			  "carte"=>"content/carte",
			  "compte"=>"content/compte",
			  "coord" =>"content/coord",
			  "paiement"=>"content/paiement",
			  "signup"=>"content/signup",
			  "reservation"=>"content/reservation",
			  "voirpanier"=>"content/voirpanier",
			  "livre"=>"content/livre",
			  "logout"=>"logout");

	if(isset($_GET['page']))
	{

	    if (  isset($tab[$_GET['page']]) )
			$page = $tab[$_GET['page']];
		
		else 
		{
			$page = "404";
		}
	}

	else
	{
	header('location:index.php?page=home');
	}
    
 require("app/skel.php");



?>