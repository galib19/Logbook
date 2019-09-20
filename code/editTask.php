<?php 

include 'init.php';
include 'users.php';



if(logged_in() === false) {
header('location: login.php');}

// form is submitted
if($_POST) {
 
  
    $uid = $_SESSION['uid'];
	$taskId = $_POST['task_id'];
	echo $taskId;
	$taskName = $_POST['taskName'];
	$description = $_POST['description'];
    $comment = $_POST['comment'];
	$progress = $_POST['progress'];
	$deadline = $_POST['deadline'];
 

    
        $sql ="UPDATE task"." SET uid = '$uid' ,taskName='$taskName',description='$description', 
		comment='$comment',progress='$progress',deadline='$deadline'". "WHERE task_id='$taskId'";
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
		
		<?php 
		if(isset($_GET['varname'])){
		$taskId = $_GET['varname'];
		//echo $taskId;
		 
		}
		
		$sql = "SELECT * FROM task WHERE task_id = '$taskId'";
		
		$result = mysqli_query($connect, $sql);
			if(mysqli_num_rows($result) > 0){
			$row = mysqli_fetch_array($result);
			}
		?>
		
		<form class="w3-container w3-padding w3-theme-l2" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
		
		<div class="w3-container w3-padding-16  w3-theme-l2">
		<input class="form-control w3-input w3-padding" id="task_id" name="task_id" type="hidden" value="<?php echo $taskId?>">
		<input class="w3-input w3-padding" name="taskName" type="text" value="<?php echo $row['taskName']?>">
		<hr>
		
		<textarea class="w3-padding" type="text" value="<?php echo $row['description']?>" name="description" rows="4" cols="97"  ></textarea>
		<hr>
		
		<textarea class="w3-padding" type="text" value="<?php echo $row['comment']?>" name="comment" rows="2" cols="97"  ></textarea>
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
		<progress id="myProgress" value="<?php echo $row['progress']?>" max="100">
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
			<input id="deadline" name="deadline" type="datetime-local" value="<?php echo $row['$deadline']?>">
			</form>  
        </div>
		<input class="form-control w3-input w3-padding" id="task_id" name="task_id" type="hidden" value="<?php echo $taskId?>">
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
	