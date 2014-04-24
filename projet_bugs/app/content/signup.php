 <?php
$error = "";

if (isset($_POST['login'], $_POST['password'], $_POST['password_']))
{
$login = trim($_POST['login']);
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$pass1 = $_POST['password'];
$pass2 = $_POST['password_'];
$mail = $_POST['mail'];
$tel = $_POST['tel'];
$adresse = $_POST['adresse'];
$cp = $_POST['cp'];
$ville = $_POST['ville'];
$societe = $_POST['societe'];



	if (strlen($login) < 3)
		$error = "Login is too short, must be at least 3 characters long.";
	else if (strlen($login) > 16)
		$error = "Login is too long, must be at most 16 characters long.";
	else if ($pass1 != $pass2)
		$error = "Passwords don't match.";
	else if (strlen($pass1) < 4)
		$error = "Password is too short, must be at least 4 characters long.";
	else
		{
		$db = mysqli_connect("localhost", "root", "troiswa", "bugs");

		$login = mysqli_real_escape_string($db, $login);
		$nom = mysqli_real_escape_string($db, $nom);
		$prenom = mysqli_real_escape_string($db, $prenom);

		$pass = mysqli_real_escape_string($db, $pass1);
		
		/*$hash = password_hash($pass, PASSWORD_BCRYPT, ["cost"=>13]);*/


		$mail = mysqli_real_escape_string($db, $mail);
		$tel = mysqli_real_escape_string($db, $tel);
		$adresse = mysqli_real_escape_string($db, $adresse);
		$cp = mysqli_real_escape_string($db, $cp);
		$ville = mysqli_real_escape_string($db, $ville);
		$societe = mysqli_real_escape_string($db, $societe);

		$request = 'INSERT INTO user (login, prenom, nom, tel, adresse, cp, ville, mail, societe, pass, point, admin) VALUES("'.$login.'","'.$prenom.'","'.$nom.'","'.$tel.'","'.$adresse.'","'.$cp.'","'.$ville.'","'.$mail.'","'.$societe.'","'.$pass.'",0,0)';
		mysqli_query($db, $request);

		$id = mysqli_insert_id($db);
		if ($id < 0)
			$error = mysqli_error($db);
		else
			{
			header('Location:index.php?page=home');
			return;

			}
		}
}
require('views/content/signup.html');



?>