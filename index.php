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
	<script>
	
	function ajaxLogin() {
		var name = $('#lg_username').val();
		var password = $('#lg_password').val();
		
		
		var request = $.ajax({
			url: 'php/login.php',
			type: 'POST',
			data: {name:name, password:password},
			dataType: 'html'
			});
			
			
			request.done(function(output){
				// setTimeout(function(){
					$('#post_data').html(output);
					$(document).ajaxStop(function(){
						window.location.reload();
						});
						// 3}, 2000);
					});
					
						request.fail(function(jqXHR, status) {
							alert('Ajax error: ' + status);
							});
							return false;
							}
		</script>
		</head>
		<body id="start">
		
		<?php 
		if(!empty($msg)) {
			echo "<h3>$msg</h3>"; 
		} 
		?>
			<div id="loader"></div>
			
			<div class="container">
			<header class="row">
			<div class="col-md-12">
											<!-- LOGO -->
				<a href="#">
					<img id="logo" src="img/prakticum_logo.svg">
				</a>
											<!-- LOGIN -->						
				<?php if(!isset($_SESSION['user'])) {?>
				<a href="#" data-toggle="modal" data-target="#loginModal" title="logga in"><img id="login" src="img/login.png"></a>	
				<?php } else if(isset($_SESSION['user'])) {?>
				<a href="php/logout.php" title="logga ut"><img id="login" src="img/logout.png"></a>
				<?php }?>
											<!-- UPLOAD KNAPP -->
				
			<?php if(isset($_SESSION['user'])) {?>
			<button id="upload" type="button" class="btn btn-default" data-toggle="modal" data-target="#uploadModal">Ladda upp</button>
 			<?php }?>  
			<!-- <input id="upload" class="btn btn-default btn-sm" type="submit" value="Ladda upp"> -->
			</div>
											<!-- SÖK BAR -->
				<div class="col-md-12 search_bar">
					<div class="input-group">
					  <input type="text" class="form-control" placeholder="Sök nyckelord...">
				<span class="input-group-btn">
					<!-- <button class="btn btn-default" type="button">Sök!</button> -->
					<input class="btn btn-default" type="submit" value="Sök!">
				</span>
					</div><!-- /input-group -->
				  </div><!-- /.col-lg-6 -->
				  </header>
											<!-- BILDERNA -->
			
				<div id="scroll-container">
				<div class="row">
					
						<div class="col-sm-6 col-md-3">
						
							<a href="#" title="Image 1" class="img-responsive thumbnail" data-toggle="modal" data-target="#lightbox">
								<img src="img/1.jpg" alt=" ">
							</a>
						</div>
						
						<div class="col-sm-6 col-md-3">
						
								<a href="#" title="Image 2" class="img-responsive thumbnail" data-toggle="modal" data-target="#lightbox">
									<img src="img/2.jpg" alt="">
								</a>
						</div>
						
						<div class="col-sm-6 col-md-3">
						
								<a href="#" title="Image 3" class="img-responsive thumbnail" data-toggle="modal" data-target="#lightbox">
									<img src="img/3.jpg" alt="">
								</a>
						</div>
						
						<div class="col-sm-6 col-md-3">
						
								<a href="#" title="Image 4" class="img-responsive thumbnail" data-toggle="modal" data-target="#lightbox">
									<img src="img/4.jpg" alt="">
								</a>
						</div>
					</div>

					<div class="row">
						
							<div class="col-sm-6 col-md-3">
							
									<a href="#" title="Image 5" class="img-responsive thumbnail" data-toggle="modal" data-target="#lightbox">
										<img src="img/1.jpg" alt="">
									</a>
							</div>
						
						<div class="col-sm-6 col-md-3">
						
									<a href="#" title="Image 6" class="img-responsive thumbnail" data-toggle="modal" data-target="#lightbox">
										<img src="img/2.jpg" alt="">
									</a>
						</div>
						
						<div class="col-sm-6 col-md-3">
						
							<a href="#" title="Image 7" class="img-responsive thumbnail" data-toggle="modal" data-target="#lightbox">
								<img src="img/3.jpg" alt="">
							</a>
						</div>
								
						<div class="col-sm-6 col-md-3">
						
							<a href="#" title="Image 8" class="img-responsive thumbnail" data-toggle="modal" data-target="#lightbox">
								<img src="img/4.jpg" alt="">
							</a>
						</div>
					</div>
					
					<div class="row">
					
					<div class="col-sm-6 col-md-3">
					
									<a href="#" title="Image 9" class="img-responsive thumbnail" data-toggle="modal" data-target="#lightbox">
										<img src="img/1.jpg" alt="">
									</a>
							</div>
					
					<div class="col-sm-6 col-md-3">
					
									<a href="#" title="Image 10" class="img-responsive thumbnail" data-toggle="modal" data-target="#lightbox">
										<img src="img/2.jpg" alt="">
									</a>
							</div>
							
					<div class="col-sm-6 col-md-3">
					
									<a href="#" title="Image 11" class="img-responsive thumbnail" data-toggle="modal" data-target="#lightbox">
										<img src="img/3.jpg" alt="">
									</a>
							</div>
							
					<div class="col-sm-6 col-md-3">
					
									<a href="#" title="Image 12" class="img-responsive thumbnail" data-toggle="modal" data-target="#lightbox">
										<img src="img/4.jpg" alt="">
									</a>
							</div>
							
					</div>
					
					<div class="row">
						<div class="col-sm-6 col-md-3">
						
									<a href="#" title="Image 13" class="img-responsive thumbnail" data-toggle="modal" data-target="#lightbox">
										<img src="img/1.jpg" alt="">
									</a>
							</div>
							
					<div class="col-sm-6 col-md-3">
					
									<a href="#" title="Image 14" class="img-responsive thumbnail" data-toggle="modal" data-target="#lightbox">
										<img src="img/2.jpg" alt="">
									</a>
							</div>
							
					<div class="col-sm-6 col-md-3">
					
									<a href="#" title="Image 15" class="img-responsive thumbnail" data-toggle="modal" data-target="#lightbox">
										<img src="img/3.jpg" alt="">
									</a>
							</div>
							
					<div class="col-sm-6 col-md-3">
					
									<a href="#" title="Image 16" class="img-responsive thumbnail" data-toggle="modal" data-target="#lightbox">
										<img src="img/4.jpg" alt="">
									</a>
							</div>
					</div>
					
					<div class="row">
						<div class="col-sm-6 col-md-3">
						
									<a href="#" title="Image 17" class="img-responsive thumbnail" data-toggle="modal" data-target="#lightbox">
										<img src="img/1.jpg" alt="">
									</a>
							</div>
					<div class="col-sm-6 col-md-3">
					
									<a href="#" title="Image 18" class="img-responsive thumbnail" data-toggle="modal" data-target="#lightbox">
										<img src="img/2.jpg" alt="">
									</a>
							</div>
					<div class="col-sm-6 col-md-3">
										<a href="#" title="Image 19" class="img-responsive thumbnail" data-toggle="modal" data-target="#lightbox">
										<img src="img/3.jpg" alt="">
									</a>
							</div>
					<div class="col-sm-6 col-md-3">
					
									<a href="#" title="Image 20" class="img-responsive thumbnail" data-toggle="modal" data-target="#lightbox">
										<img src="img/4.jpg" alt="">
									</a>
							</div>
						
						</div>
					</div> <!-- end of scroll-container -->
					
					
					<!-- //// END OF IMAGES //// -->
				
				<!-- /// THUMBNAIL MODAL /// -->
				
				  <div id="lightbox" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<button type="button" class="close hidden" data-dismiss="modal" aria-hidden="true">×</button>
							<div class="modal-content">
								<div class="modal-body">
									<img src="" alt="" />

									<h4>classy</h4>
								</div>
								<div class="modal-footer">
									<button class="btn btn-default" data-dismiss="modal">Stäng</button>
								</div>
							</div>
						</div>
					</div>
					
				<!-- /// THUMBNAIL MODAL END /// -->
				
				<!-- UPLOAD MODAL -->
	  
	  <div id="uploadModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"> </h4>
      </div>
      <div class="modal-body">
	  
        <!-- börjar här -->
		
      <div class="panel panel-default">
        <div class="panel-heading"><strong>Ladda upp bilder</strong></div>
        <div class="panel-body">
		
		<!-- bild title & stuff -->
		
			<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
				<fieldset>
				  <div class="form-group">
						<label for="title">Bildens titel</label>
						<input type="text" class="form-control" id="image_name" name="image_name">
				  </div>
				  <div class="form-group">
				  <label for="desc">Beskrivning</label>
				  <textarea class="form-control vresize" rows="4" id="desc" name="desc"></textarea>
				</div>

          <!-- Standar Form -->
          <h4>Välj bilder från din dator...</h4>
            <div class="form-inline">
              <div class="form-group">
                <input type="file" name="js-upload-files" id="js-upload-files" multiple>
              </div>
            </div>
			<br />
          <!-- Drop Zone 
          <h5>...eller dra och droppa dem här!</h5>
          <div class="upload-drop-zone" id="drop-zone">
            Drag & drop här
          </div>
		-->
		  <!-- tags -->
			<form id="defaultForm" method="post" class="form-horizontal">
				<div class="form-group">
					<label for="tags">Ange tags</label>
					<div class="form-group">
						<input type="text" name="image_tag" id="image_tag" class="form-control input-sm" value="" data-role="tagsinput" />
					</div>
				</div>
				
			</form>
		<button type="submit" name="js-upload-submit" class="btn btn-lg btn-warning save" id="js-upload-submit">Spara</button>
		
        </div> 
      </div>
      </div>
	  </form>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Stäng</button>
      </div>
    </div>

  </div>
</div>
</fieldset>
</form>
	  
		<!-- UPLOAD MODAL END -->
			
		<!-- LOGIN MODAL BEGIN-->

<!-- Modal -->
<div id="loginModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Admin login</h4>
      </div>
      <div class="modal-body">
        
				<!-- LOGIN FORM -->
		<div class="text-center" style="padding:50px 0">
			<div class="logo">Logga in</div>
			<!-- Main Form -->
			<div class="login-form-1">
				<form id="login-form" class="text-left" onsubmit="return ajaxLogin()" method="post">
                    <div id="post_data"></div>
					<div class="main-login-form">
						<div class="login-group">
							<div class="form-group">
								<label for="lg_username" class="sr-only">användarnamn</label>
								<input type="text" class="form-control" id="lg_username" name="lg_username" placeholder="användarnamn">
							</div>
							<div class="form-group">
								<label for="lg_password" class="sr-only">lösenord</label>
								<input type="password" class="form-control" id="lg_password" name="lg_password" placeholder="lösenord">
							</div>
						</div>
						<button type="submit" class="login-button"><i class="fa fa-chevron-right"></i></button>
					</div>
				</form>
			</div>
			<!-- end:Main Form -->
		</div>
		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Stäng</button>
      </div>
    </div>

  </div>
</div>
		<div class="col-md-12 panel-footer">
				<small>&copy; Prakticum <?php echo date('Y') ?></small>
		</div>
</div> 									<!-- /// END OF CONTAINER /// -->

<!-- These are all the links that can be loaded. -->
	<div id="pages">
		<a href="./index.php"></a>
		<a href="./page2.php"></a>
		<a href="./page3.php"></a>
	</div>
					<!-- SCRIPTS -->
					
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
			<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.13.1/jquery.validate.min.js"></script>
			<script src="http://cdn.jsdelivr.net/bootstrap.tagsinput/0.4.2/bootstrap-tagsinput.min.js"></script>
			<script src="js/script.js"></script>
	</body>
</html>