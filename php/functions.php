<?php
$q_images = "SELECT * FROM image";
		$r_images = mysqli_query($link, $q_images);
		if(!$r_images) {
			echo mysqli_error($link);
		}
		

?>