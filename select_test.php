<?php	
	session_start();
	$msg = "";
	include('php/db_connect.php');
	include('php/upload-file.php'); //hämtar php-filen
	
?>
<!DOCTYPE html>
<html>
		<head>
			<meta charset="UTF-8">
			<title>Prakticum | Bildbank</title>
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<link href="css/bootstrap.min.css" rel="stylesheet">
			<link href="css/styles.css" rel="stylesheet">
			<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
			<link href='http://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
			<link rel="stylesheet" href="//cdn.jsdelivr.net/bootstrap.tagsinput/0.4.2/bootstrap-tagsinput.css" />
	
		</head>
		<body id="start">
		<?php
		$q_images = "SELECT * FROM image";
		$r_images = mysqli_query($link, $q_images);
		if(!$r_images) {
			echo mysqli_error($link);
		}
		$image_folder = "files/";
		
		echo "<ul>";
		while($row = mysqli_fetch_array($r_images)) {
			/*
			echo "<li>bildnamn: " . $row['image_name'] . "</li>
			<li>stig: " . $row['image_path'] . "</li>
			<li>datum: " . $row['image_date'] . "</li>
			<li>storlek: " . $row['image_size'] . "</li>
			<li>id: " . $row['image_id'] . "</li>";
			*/
			echo '<div class="col-sm-6 col-md-3">
						
							<a href="#" title="' . $row['image_name'] . '" class="img-responsive thumbnail" data-toggle="modal" data-target="#lightbox">
								<img src="files/' . $row['image_name']  . '" alt="' . $row['image_name'] . '">
							</a>
						</div>';
		}
		echo "</ul>";
		?>
	
		</body>
</html>