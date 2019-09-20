<?php 

require_once 'init.php';

function logged_in() {
    if(isset($_SESSION['uid'])) {
        return true;
    } else {
        return false;
    }
}

if($_POST) {
 
    $uid = $_SESSION['uid'];
    $name = $_POST['name'];
	$email = $_POST['email'];
    $phone = $_POST['phone'];
	$message = $_POST['message'];
	
        $sql = "INSERT INTO contact (uid, name, email, phone, message) VALUES ($uid, '$name','$email','$phone', '$message')";
        $query = $connect->query($sql);
        if($query === TRUE) {
           header('location:contact.php');
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
			
<form id="contact "method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="w3-container w3-card-4 w3-theme-l4 w3-text-black w3-margin">
<h2 class="w3-center">Contact Us</h2>
 
<div class="w3-row w3-section">
  <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-user"></i></div>
    <div class="w3-rest">
      <input class="w3-input w3-border" name="name" type="text" placeholder="Name">
    </div>
</div>


<div class="w3-row w3-section">
  <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-envelope-o"></i></div>
    <div class="w3-rest">
      <input class="w3-input w3-border" name="email" type="text" placeholder="Email">
    </div>
</div>

<div class="w3-row w3-section">
  <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-phone"></i></div>
    <div class="w3-rest">
      <input class="w3-input w3-border" name="phone" type="text" placeholder="Phone">
    </div>
</div>

<div class="w3-row w3-section">
  <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-pencil"></i></div>
    <div class="w3-rest">
      <input class="w3-input w3-border" name="message" type="text" placeholder="Message">
    </div>
</div>

<button type="submit" value="submit" class="w3-button w3-block w3-section w3-theme-d3 w3-ripple w3-padding" >Send</button>

</form>


		
	  </div>
		
	  <br>
	</div>
  </div>
 </div>
	  
	   
	
	
<?php include 'footer.php' ?>
	









