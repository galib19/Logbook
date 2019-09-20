<?php 

include 'init.php';
include 'users.php';



if(logged_in() === false) {
header('location: login.php');}
 



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
     
	  <div class="w3-container ">
		<?php
		$sql = "SELECT * FROM reminder WHERE uid = '$_SESSION[uid]'";
		
		if($result = mysqli_query($connect, $sql)){
			if(mysqli_num_rows($result) > 0){
			 
			while($row = mysqli_fetch_array($result)){
    
			$reminderId = $row['reminder_id'];
			echo $reminderId;
			$time1= date_create($row['remindertime1']);
			$datetime1= date_format($time1, 'Y-m-d H:i:s');
			$time2= date_create($row['remindertime2']);
			$datetime2= date_format($time2, 'Y-m-d H:i:s');
			
			
		?> 
			
			<div class="w3-card-4 w3-theme-l2" >
			
			<header class="w3-container w3-theme-l1">
                <h3><?php echo $row['eventName'] ?></h3></header>
			
			 
			<div class="w3-container w3-theme-l2">
                <p><h5>Reminder 1: <?php echo $datetime1; ?></h5></p></p>
			</div>
			
			<div class="w3-container w3-theme-l2">
                <p><h5>Reminder 2: <?php echo $datetime2; ?></h5></p></p>
			</div>
			
			<br>
			
		
			
			
			<form action="#" method="GET">
			<button type="submit" class="w3-button w3-padding w3-theme-d3 " >
			<a href="editReminder.php?varname=<?php echo $reminderId ?>">Edit</a> </button>
			<button type="submit" class="w3-button  w3-padding w3-theme-d4 " >
			<a href="deleteReminder.php?varname=<?php echo $reminderId ?>">Delete</a> </button>
			</form>
			</div><br>
			<?php			
        }

        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No task was found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($connect);
}
 
// Close connection
mysqli_close($connect);
?>
		
		
	    </div>
	  </div>
		
	  <br>
	</div>
  </div>
 </div>
	  
	   
	
	
<?php include 'footer.php' ?>
	