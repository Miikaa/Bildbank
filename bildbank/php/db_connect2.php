<?php
$db_host = "localhost"; //host
$db_user = "bildbank";		//DB användarnamn 
$db_pass = "bildbank";		//DB lösenord
$db = "bildbank";			//Databasnamn
$tbl = "login";             //Tabellnamn

$link = mysqli_connect($db_host, $db_user, $db_pass, $db);

if(!$link) {
	echo "Kunde inte kontakta Databasen";
	exit();
}

if(!mysqli_set_charset($link, "UTF8")) {
	echo "kunde inte använda UTF-8";
	exit();
}

if(!mysqli_select_db($link, $db)) {
	echo "Kunde inte välja Databasen";
	exit();
}

?>