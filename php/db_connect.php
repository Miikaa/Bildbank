<?php
// DB CONNECT
$db_host = "localhost"; //host
$db_user = "datanz3b_dhg13bi";		//DB anv�ndarnamn 
$db_pass = "ph0t0b1ld3r";		//DB l�senord
$db = "datanz3b_dhg13bildbank";			//Databasnamn

$link = mysqli_connect( $db_host, $db_user, $db_pass, $db);

if(!$link) {
	echo "Kunde inte kontakta Databasen";
	exit();
}

if(!mysqli_set_charset($link, "UTF8")) {
	echo "kunde inte anv�nda UTF-8";
	exit();
}

if(!mysqli_select_db($link, $db)) {
	echo "Kunde inte v�lja Databasen";
	exit();
}
// !!!DB-CONNECT END!!!
?>