<?php 

include 'init.php';
include 'users.php';

if(logged_in() === false) {
header('location: login.php');}
  
    
?>
<?php include 'header.php' ?>

<div class="container-fluid w3-theme-l4">
  <div class="row content">
	<br>
    <div class="col-sm-3 sidenav w3-theme-l3">
		<br>
	   

	<?php include 'sidebar.php' ?>
	</div>

	<div class="col-sm-9">
     
	  <div class="w3-container">
  
		<div class="w3-card-4" height="500px">
		
		<form class="w3-container w3-padding w3-theme-l2" action="add_file.php" method="post" enctype="multipart/form-data">
        <input  class=" w3-center w3-wide w3-round-large  
		w3-button w3-center w3-ripple w3-theme w3-padding" width ="30px" type="file" name="uploaded_file"><br>
        <input class="w3-wide w3-round-large w3-button  w3-ripple w3-theme-d2 w3-padding" type="submit" value="Upload file">
		</form>
		
		
	    </div>
	  </div>
		
	  <br>
	</div>
  </div>
 </div>
	  
<?php include 'footer.php' ?>
	