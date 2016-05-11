<?php
// använder 'upload' från submit knappens id:n i index.php -filen
// hämtar allt från ID:n i index.php
if(isset($_POST['js-upload-submit'])) {
	$filename = $_FILES['js-upload-files']['name'];			 // filens namn
	$filetype = $_FILES['js-upload-files']['type']; 			// filtyp
	$filesize = number_format(($_FILES['js-upload-files']['size']/1024)); 	// filstorlek i MB, utan 1024 kommer det i kB
	$filelocation = $_FILES['js-upload-files']['tmp_name'];	// temporär mapp

	// != inte! alltså om det INTE BLIR ERROR kör vi koden yknow
	// annors så kommer error-meddelandet
	if(!$_FILES['js-upload-files']['error']) {
		$file_ending = explode ('.', $filename); 	// delar upp till en array
		$file_extension = end($file_ending);		// plockar sista värdet i "$file_ending" -arrayn
		$allowed_endings = array('jpg', 'gif', 'png', 'svg'); 	// bilder som är ok
		
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
					$msg = "Filnamn: $filename<br>
					Filtyp: $filetype<br>
					Filstorlek: $filesize kB";
				}

			} elseif ($filesize>5) {
				$msg = "För stor fil, max storlek är 5MB. Pröva på nytt!";
			 } else {
				$msg = "Fel filtyp. Kolla att filen är en jpeg, png, gif eller svg och pröva på nytt.";
			 }

	} else {
		$msg = "Fel i uppladdningen. Sorry! Försök på nytt.";
	}

?>