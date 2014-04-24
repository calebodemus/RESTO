<?php 
$_SESSION = array();
session_destroy();
/*| Faites pas de Location:index.php si c'est pour refaire un Location:index.php?page=home juste apres... :) |*/
header('location:index.php'); 
?>