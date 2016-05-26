<?php
session_start();
include('functions.php');
/*if(isset($_SESSION['user'])) {
	header('Location: index.php');
}*/

	$username = $_POST['name'];
	$password =  $_POST['password'];
	
	if(empty($username) || empty($password)) {
		echo "Skriv in användarnamn och lösenord";
	} else {

		//Query för att räkna raderna
		$q_login = "SELECT COUNT(*), username FROM login
					WHERE username='$username' AND
					password='$password' LIMIT 1";
		//Kör queryn:	
		$r_login = mysqli_query($link, $q_login);
		//Sparar datat i en array:
		$login_rows = mysqli_fetch_array($r_login);
		//Om inga rader finns
		if($login_rows[0] < 1) {
			echo "Felaktigt användarnamn eller lösenord";
		} else {
		//Användarnamn registreras i sessionen:
			$_SESSION['user'] = $login_rows['username'];
		//Användaren styrs till admin-sidan
			//header('Location: index.php');
		}		
	}
?>
