<?php

require_once 'init.php';

function logged_in() {
    if(isset($_SESSION['uid'])) {
        return true;
    } else {
        return false;
    }
}
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
		
		
    <header class="w3-container w3-theme-l1">
      <br><h1>Logbook</h1><br>
    </header>

    <div class="w3-container w3-theme-l2">
	<br><hr>
	<br>
      <p>Logbook is a Personal Task mangament Web Application.<p>
	  <br>
	  <p>People often face difficulties in keeping track of various tasks, 
	  resources, timeline in maintaining daily life easily.</p><br> 
	  <p>Logbook is such kind of tool which will be serviceable and easy-to-use. 
	  It will have some light features to keep track of daily activities.
	  </p>
	  </div>

     
  </div>
		
	    </div>
	  </div>
	   
		
	  <br>
	</div>
  </div>
 </div>
	  
	   
	
	
<?php include 'footer.php' ?>
	