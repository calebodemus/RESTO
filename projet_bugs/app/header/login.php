<?php
$erreurlogin = '';


if(  (isset($_SESSION['adminConnected']) && $_SESSION['adminConnected'] == true) || (isset($_SESSION['memberConnected']) && $_SESSION['memberConnected'] == true)  )
{
    require('views/logged.html');
}

else if(isset($_POST['login'], $_POST['pass']))
{
                

               
                    $login = mysqli_real_escape_string($mysqli,$_POST['login']);
                    $pass = mysqli_real_escape_string($mysqli,$_POST['pass']);

                    


                    
                    $verif= "SELECT `login`, `id`, `admin`, `pass` FROM bloeg.user WHERE  `login` = '".$login."' AND `pass` = '".$pass."' ";

                    $verifsql= mysqli_query($mysqli, $verif);
                    $ligneverif = mysqli_fetch_assoc($verifsql);

                            if($ligneverif !== null)
                            {
                                $admin = $ligneverif['admin'];
                                
                                $login = htmlentities($ligneverif['login']);
                                $_SESSION['login'] = $login;

                                $_SESSION['loginid'] = $ligneverif['id'];
                                 


                                        if($admin==1)
                                        {
                                            $_SESSION['adminConnected'] = true;
                                            $_SESSION['memberConnected'] = false;

                                        }
                                        else
                                        {
                                            $_SESSION['adminConnected'] = false;
                                            $_SESSION['memberConnected'] = true;
                                        }

                                require('views/header/logged.html');

                            }
                            else
                            {
                                $erreurlogin = 'login ou mot de passe incorrect'; 
                                require('views/header/login.html');
                            }

}
else
{

$_SESSION['adminConnected'] = false;
$_SESSION['memberConnected'] = false;
$erreurlogin = 'connectez vous :';
require('views/header/login.html');
}





	
?>