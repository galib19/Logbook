<?php 

include 'init.php';
include 'users.php';



if(logged_in() === false) {
header('location: login.php');}

// form is submitted
if($_POST) {
 
  
    $uid = $_SESSION['uid'];
	$reminderId = $_POST['reminder_id'];
	echo $reminderId;
	$eventName = $_POST['eventName'];
	$remindertime1 = $_POST['remindertime1'];
    $remindertime2 = $_POST['remindertime2'];
	
 

    
        $sql ="UPDATE reminder"." SET uid = '$uid' ,eventName='$eventName',remindertime1='$remindertime1', 
		remindertime2='$remindertime2'". "WHERE reminder_id='$reminderId';";
        $query = $connect->query($sql);
        if($query === TRUE) {
			header('location:viewReminder.php');
			
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
		
		<?php 
		if(isset($_GET['varname'])){
		$reminderId = $_GET['varname'];
		//echo $taskId;
		 
		}
		
		$sql = "SELECT * FROM reminder WHERE reminder_id = '$reminderId'";
		
		$result = mysqli_query($connect, $sql);
			if(mysqli_num_rows($result) > 0){
			$row = mysqli_fetch_array($result);
			}
		?>
		
		<form class="w3-container w3-padding w3-theme-l2" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
		
		<div class="w3-container w3-padding-16  w3-theme-l2">
		
		<input class="form-control w3-input w3-padding" id="reminder_id" name="reminder_id" type="hidden" value="<?php echo $reminderId?>">
		
		<input class="w3-input w3-padding" name="eventName" type="text" value="<?php echo $row['eventName']?>">
		<hr>
	 
		<div class="form-inline">
			
            <form action="/action_page.php">
			<h3><span class="label label-default w3-theme-d3">Reminder1: </span></h3> <br>
			Set Date and Time:
			<input id="reminder1" name="remindertime1" type="datetime-local">
			 
			<h3><span class="label label-default w3-theme-d3">Reminder2: </span></h3> <br>
			Set Date and Time:
			<input id="reminder2" name="remindertime2" type="datetime-local">
			</form>
			   
        </div>
		<br>
	
		<input class="w3-right" type="submit" value="Save Changes" /></a> 
			
		</div>
		</form>
		
	    </div>
		

		
	
	    </div>
	  </div>
		
	  <br>
	</div>
  </div>
 </div>
	  
<?php include 'footer.php' ?>
	