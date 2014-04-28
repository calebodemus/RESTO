<?php
session_start();
header("Content-Type: text/html; charset=utf-8");
require('app/server.php');
$page = "home"; 

$mysqli = mysqli_connect("localhost", "root","troiswa", "bugs"); 
/*| Il faut vérifier si la connection mysql a reussi ! |*/


$tab = array("home" => "content/home",
			 "carte"=>"content/carte",
			 "compte"=>"content/compte",
			 "coord" =>"content/coord",
			 "paiement"=>"content/paiement",
			 "signup"=>"content/signup",
			 "reservation"=>"content/reservation",
			 "voirpanier"=>"content/voirpanier",
			 "livre"=>"content/livre",
			 "logout"=>"logout",
			 "comptemodif"=>"content/comptemodif");

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