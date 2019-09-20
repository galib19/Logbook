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
		$sql = "SELECT * FROM task WHERE uid = '$_SESSION[uid]'";
		
		if($result = mysqli_query($connect, $sql)){
			if(mysqli_num_rows($result) > 0){
			 
			while($row = mysqli_fetch_array($result)){
    
			$taskId = $row['task_id'];
			echo $taskId;
			$testdatetime= date_create($row['deadline']);
			$datetime= date_format($testdatetime, 'Y-m-d H:i:s');
		?> 
			
			<div class="w3-card-4 w3-theme-l2" >
			
			<header class="w3-container w3-theme-l1">
                <h3><?php echo $row['taskName'] ?></h3></header>
			
			<div class="w3-padding">
				<h5>Progress: <?php echo $row['progress'];?>% <progress id="myProgress" value="<?php echo $row['progress']; ?>" max="100">
				</progress><h5>
			</div>
	
			<div class="w3-container w3-theme-l2">
                <p><h5>Deadline:<?php echo $datetime; ?></h5></p></p>
			</div><br>
			
		
			
			
			<form action="#" method="GET">
			<button type="submit" class="w3-button w3-padding w3-theme-d3 " >
			<a href="editTask.php?varname=<?php echo $taskId ?>">Edit</a> </button>
			<button type="submit" class="w3-button  w3-padding w3-theme-d4 " >
			<a href="deleteTask.php?varname=<?php echo $taskId ?>">Delete</a> </button>
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
	