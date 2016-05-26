<div class="row">
				<?php
						
						while($row = mysqli_fetch_array($r_images)) {
							echo '<div class="col-sm-6 col-md-3">
											<a href="#" title="' . $row['image_name'] . '" class="img-responsive thumbnail" data-toggle="modal" data-target="#lightbox">
												<img src="files/' . $row['image_name']  . '" alt="' . $row['image_name'] . '">
											</a>
										</div>';
						}
		
					?>
</div>
						
					