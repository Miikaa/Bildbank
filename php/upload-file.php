<?php
// använder 'upload' från submit knappens id:n i index.php -filen
// hämtar allt från "name" i index.php	
//$msg = "test";
if(isset($_POST['js-upload-submit'])) {
	$filename = $_FILES['js-upload-files']['name'];			 // filens namn
	$filetype = $_FILES['js-upload-files']['type']; 			// filtyp
	$filesize = number_format(($_FILES['js-upload-files']['size']/1024)); 	// filstorlek i MB, utan 1024 kommer det i kB
	$filelocation = $_FILES['js-upload-files']['tmp_name'];	// temporär mapp
	$title = $_POST['image_name'];
	$desc= $_POST['image_desc']; // MÅSTE GÖRAS I DATABASEN!!
	$tag = $_POST['image_tag'];
	
	// != inte! alltså om det INTE BLIR ERROR kör vi koden yknow
	// annors så kommer error-meddelandet
	if(!$_FILES['js-upload-files']['error']) {
		$file_ending = explode ('.', $filename); 	// delar upp till en array
		$file_extension = end($file_ending);		// plockar sista värdet i "$file_ending" -arrayn
		$allowed_endings = array('jpg', 'gif', 'png', 'svg'); 	// bilder som är ok
		
		} else {
		$msg = "Fel i uppladdningen. Sorry! Försök på nytt.";
	}
		
		// kollar filtyperna, storleken och ändelsen
		if($filetype=="image/gif"
			 ||$filetype=="image/jpeg"
			 ||$filetype=="image/png"
			 ||$filetype=="image/x-png"
			 ||$filetype=="image/svg+xml"
			 ||$filesize<=5
			 && in_array($file_extension, $allowed_endings)) {
			 
				// vvvv kopierar filen till "files"-mappen
				if(!copy ($filelocation, 'files/' . $filename)) {
					$msg = "$filename kunde inte sparas";
				} else {
					/*$msg = "Filnamn: $filename<br>
					Filtyp: $filetype<br>
					Filstorlek: $filesize MB";*/
				}

			} elseif ($filesize>5) {
				$msg = "För stor fil, max storlek är 5MB. Pröva på nytt!";
			 } else {
				$msg = "Fel filtyp. Kolla att filen är en jpeg, png, gif eller svg och pröva på nytt.";
			 }

	} 

?>