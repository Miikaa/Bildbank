<?php
$q_images = "SELECT * FROM image";
		$r_images = mysqli_query($link, $q_images);
		if(!$r_images) {
			echo mysqli_error($link);
		}
// !!!IMG FETCH FROM DATABASE END !!!
// !!! UPLOAD-FILE.php !!!
if(isset($_POST['js-upload-submit'])) {
	$image_name = $_FILES['js-upload-files']['name'];			 // filens namn
	$image_type = $_FILES['js-upload-files']['type']; 			// filtyp
	$image_size = number_format(($_FILES['js-upload-files']['size']/1024)); 	// filstorlek i MB, utan 1024 kommer det i kB
	$filelocation = $_FILES['js-upload-files']['tmp_name'];	// temporär mapp
	$image_title = $_POST['image_title'];
	$image_desc = $_POST['image_desc']; 
	$image_tag = $_POST['image_tag'];
	$image_path = 'files/';
	$image_date = date("Y-m-d");
	
	// != inte! alltså om det INTE BLIR ERROR kör vi koden yknow
	// annors så kommer error-meddelandet
	if(!$_FILES['js-upload-files']['error']) {
		$file_ending = explode ('.', $image_name); 	// delar upp till en array
		$file_extension = end($file_ending);		// plockar sista värdet i "$file_ending" -arrayn
		$allowed_endings = array('jpg', 'gif', 'png', 'svg'); 	// bilder som är ok
		
		} else {
		$msg = "Fel i uppladdningen. Sorry! Försök på nytt.";
	}
		
		// kollar filtyperna, storleken och ändelsen
		if($image_type=="image/gif"
			 ||$image_type=="image/jpeg"
			 ||$image_type=="image/png"
			 ||$image_type=="image/x-png"
			 ||$image_type=="image/svg+xml"
			 ||$image_size<=10
			 && in_array($file_extension, $allowed_endings)) {
			 
				// vvvv kopierar filen till "files"-mappen
				if(!copy ($filelocation, $image_path . $image_name)) {
					$msg = "$image_name kunde inte sparas";
				} else {
					$q_insert_img = "INSERT INTO image 
									(image_name, image_title, image_path, image_size, image_date, image_tag, image_desc)
									VALUES 
									('$image_name', '$image_title','$image_path', '$image_size', '$image_date', '$image_tag', '$image_desc')";
									
					if (mysqli_query($link, $q_insert_img)) {
						$msq = "Bilden $image_name är sparad.";
						
					} else {
						$msg = "Något gick fel med uppladdningen.";
						$msg .= mysqli_error($link);
					}
					
					
					/*$msg = "Filnamn: $image_name<br>
					Filtyp: $image_type<br>
					Filstorlek: $filesize MB";*/
				}

			} elseif ($image_size>10) {
				$msg = "För stor fil, max storlek är 10MB. Pröva på nytt!";
			 } else {
				$msg = "Fel filtyp. Kolla att filen är en jpeg, png, gif eller svg och pröva på nytt.";
			 }

	} 

?>