<?php 

require_once 'init.php';

function logged_in() {
    if(isset($_SESSION['uid'])) {
        return true;
    } else {
        return false;
    }
}

function addNote() {
 
    global $connect;
 
   
    $heading = $_POST['heading'];
	$content = $_POST['content'];
    $tag1 = $_POST['tag1'];
	$tag2 = $_POST['tag2'];
	$tag3 = $_POST['tag3'];
	
    if($heading != "") {
        $sql = "INSERT INTO note (heading, content, tag1, tag2, tag3) VALUES ('$heading','$content','$tag1', '$tag2', $tag3)";
        $query = $connect->query($sql);
        if($query === TRUE) {
            return true;
        } else {
            return false;
        }
    } // /if
 
    $connect->close();
    // close the database connection
} // register user funtion
 
// form is submitted
if($_POST) {
 
  
    $heading = $_POST['heading'];
	$content = $_POST['content'];
    $tag1 = $_POST['tag1'];
	$tag2 = $_POST['tag2'];
	$tag3 = $_POST['tag3'];
 
   
    
        $sql = "INSERT INTO note (heading, content, tag1, tag2, tag3) VALUES ('$heading','$content','$tag1', '$tag2', '$tag3')";
        $query = $connect->query($sql);
        if($query === TRUE) {
           
			return true;
        } else {
			echo "Error: " . $sql . "<br>" . $connect->error;
            return false;
        }
		 $connect->close();
    }
	
	
 




 //if loggid in bracket 
 
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
			
		<div class="w3-card-4" style="width:50% height: 600px">
			<header class="w3-container w3-theme-l2">
			<h3>Asadullah Hill Galib</h3>
			</header>
			<div class="w3-container w3-theme-l3">
			<hr>
			<p>Team Pirates</p>
			<hr>
			<p>Studying BSc. in Software Engineering, University of Dhaka</p><br>
			</div>
			<button class="w3-button w3-block w3-dark-grey"><a href="asadgalib.facebook.com">+ Connect</button>
		</div>
		<br>
		<div class="w3-card-4" style="width:50% height: 600px">
			<header class="w3-container w3-theme-l2">
			<h3>Jahidul Islam</h3>
			</header>
			<div class="w3-container w3-theme-l3">
			<hr>
			<p>Team Pirates</p>
			<hr>
			<p>Studying BSc. in Software Engineering, University of Dhaka</p><br>
			</div>
			<button class="w3-button w3-block w3-dark-grey"><a href="sumon.facebook.com">+ Connect</button>
		</div>
		
	  </div>
		
	  <br>
	</div>
  </div>
 </div>
	  
	   
	
	
<?php include 'footer.php' ?>
	









