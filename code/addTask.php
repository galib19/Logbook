<?php 

include 'init.php';
include 'users.php';



if(logged_in() === false) {
header('location: login.php');}

 
 
// form is submitted
if($_POST) {
 
    $uid = $_SESSION['uid'];
    $taskName = $_POST['taskName'];
	$description = $_POST['description'];
    $comment = $_POST['comment'];
	$progress = $_POST['progress'];
	
	
	$deadline = $_POST['deadline'];
 
   
    
        $sql = "INSERT INTO task (uid, taskName, description, comment, progress, deadline) 
		VALUES ('$uid','$taskName','$description','$comment', '$progress', '$deadline')";
        $query = $connect->query($sql);
        if($query === TRUE) {
			header('location:viewTask.php');
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
		
		<input class="w3-input w3-padding" name="taskName" type="text" placeholder="taskname...">
		<hr>
		
		<textarea class="w3-padding" type="text" placeholder="drescription..." name="description" rows="4" cols="97"  ></textarea>
		<hr>
		
		<textarea class="w3-padding" type="text" placeholder="comment..." name="comment" rows="2" cols="97"  ></textarea>
		<hr>
		
		<style>
		progress {
			background-color: #fff;
			color: #f00;
			border: 5;
			height: 25px;
			width: 680px;
			border-radius: 9px;
			}
		</style>
		
		<div class="col-sm-2" >
			<select name="progress" id="mySelect" onchange="myFunction()">
				<option value="">Progress</option>
				<option value="10">10%</option>
				<option value="20">20%</option>
				<option value="30">30%</option>
				<option value="40">40%</option>
				<option value="50">50%</option>
				<option value="60">60%</option>
				<option value="70">70%</option>
				<option value="80">80%</option> 
				<option value="90">90%</option>
				<option value="100">100%</option>
		</select> 
		</div>
		<div >
		<progress id="myProgress" value="0" max="100">
		</progress>
		</div>
	

		<script>
		function myFunction() {
			var x = document.getElementById("mySelect").selectedIndex;
			 
			document.getElementById("myProgress").value  = document.getElementsByTagName("option")[x].value;
			
				
		}
		</script>
		
		<hr>
		
		<div>
		<div class="form-inline">
			
            <form action="/action_page.php">
			<h3><span class="label label-default w3-theme-d3">Deadline:</span></h3> <br>
			Set Date and Time:
			<input id="deadline" name="deadline" type="datetime-local">
			</form>
			 
			  
        </div>
		<br>
 
	 
		
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
	