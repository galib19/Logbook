<?php 

include 'init.php';
include 'users.php';



if(logged_in() === false) {
header('location: login.php');}

// form is submitted
if($_POST) {
 
  
    $uid = $_SESSION['uid'];
	$heading = $_POST['heading'];
	$content = $_POST['content'];
    $tag1 = $_POST['tag1'];
	$tag2 = $_POST['tag2'];
	$tag3 = $_POST['tag3'];
 
   
    
        $sql = "INSERT INTO note (uid, heading, content, tag1, tag2, tag3) VALUES ('$uid','$heading','$content','$tag1', '$tag2', '$tag3')";
        $query = $connect->query($sql);
        if($query === TRUE) {
			header('location:viewnote.php');
			return true;
        } else {
			echo "Error: " . $sql . "<br>" . $connect->error;
            return false;
        }
		 $connect->close();
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
		
		<form class="w3-container w3-padding w3-theme-l2" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
		
		<div class="w3-container w3-padding-16  w3-theme-l2">
		<input class="w3-input w3-padding" name="heading" type="text" placeholder="heading...">
		<hr>
		
		<textarea class="w3-padding" type="text" placeholder="writing note..." name="content" rows="10" cols="97"  ></textarea>
		<hr>
		
		<div class="form-group">
         <div class="col-xs-3">
         <input class="form-control w3-input w3-padding" id="tag1" name="tag1" type="text" placeholder ="tag1...">
         </div>
         <div class="col-xs-3">
         <input class="form-control w3-input w3-padding" id="tag2" name="tag2" type="text" placeholder ="tag2...">
         </div>
         <div class="col-xs-3">
         <input class="form-control w3-input w3-padding" id="tag3" name="tag3" type="text" placeholder ="tag3...">
         </div>
        </div>
		<br> 
		<br>
		<hr>
		
		 
		<input class="w3-right" type="submit" value="Save Changes" /></a> 
		
		
		
		</div>
		</form>
		
	    </div>
	  </div>
		
	  <br>
	</div>
  </div>
 </div>
	  
<?php include 'footer.php' ?>
	