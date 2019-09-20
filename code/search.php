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
     
	  <div class="w3-container ">
  
		
		<?php
		
		 if(isset($_GET['key'])){
			$searchKey = $_GET['key'];
			 
	//if loggid in bracket 
		}
		
		$sql = "SELECT * FROM note WHERE uid = '$_SESSION[uid]'
		AND heading = '$searchKey' OR tag1 ='$searchKey' OR tag2='$searchKey' OR tag3='$searchKey' ";
		
		if($result = mysqli_query($connect, $sql)){
			if(mysqli_num_rows($result) > 0){
			 
			while($row = mysqli_fetch_array($result)){
    
			$noteId = $row['note_id'];
			echo $noteId;
			?> 
			<div class="w3-card-4 w3-theme-l2" >
			
			<header class="w3-container w3-theme-l1">
                <h3><?php echo $row['heading'] ?></h3></header>
       
			<div class="w3-container w3-theme-l2">
                <p><?php echo $row['content']?></p>
			</div>
			
			 
			
			<form action="#" method="GET">
			
             
			<button type="submit" class="w3-button w3-padding w3-theme-d3" >
			
			<a href="editNote.php?varname=<?php echo $noteId ?>">Edit</a> </button>
			
			<button type="submit"  class="w3-button  w3-padding w3-theme-d4 " >
			<a href="deleteNote.php?varname=<?php echo $noteId ?>">Delete</a> </button>
			</form>

			</div><br>
		<?php		
        }
         
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No note was found.";
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

<?php include 'footer.php' ?>
	