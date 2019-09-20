<?php 

include 'init.php';
include 'users.php';



if(logged_in() === false) {
header('location: login.php');}

// form is submitted
if($_POST) {
 
  
    $uid = $_SESSION['uid'];
	$noteId = $_POST['note_id'];
	echo $noteId;
	$heading = $_POST['heading'];
	$content = $_POST['content'];
    $tag1 = $_POST['tag1'];
	$tag2 = $_POST['tag2'];
	$tag3 = $_POST['tag3'];
 
   
    
        $sql ="UPDATE note"." SET uid = '$uid' ,heading= '$heading',content='$content', 
		tag1='$tag1',tag2='$tag2',tag3='$tag3'". "WHERE note_id='$noteId'";
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
		
		<?php 
		if(isset($_GET['varname'])){
		$noteId = $_GET['varname'];
		echo $noteId;
		}
		
		$sql = "SELECT * FROM note WHERE note_id = $noteId";
		
		$result = mysqli_query($connect, $sql);
			if(mysqli_num_rows($result) > 0){
			$row = mysqli_fetch_array($result);
			}
		?>
		
		
		<form class="w3-container w3-padding w3-theme-l2" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
		
		<div class="w3-container w3-padding-16  w3-theme-l2">
		<input class="w3-input w3-padding" name="heading" type="text" value="<?php echo $row['heading']?>">
		<hr>
		
		<textarea class="w3-padding" type="text" name="content" rows="10" cols="97"  > <?php echo $row['content']?> </textarea>
		<hr>
		
		<div class="form-group">
         <div class="col-xs-3">
         <input class="form-control w3-input w3-padding" id="tag1" name="tag1" type="text" value="<?php echo $row['tag1']?>">
         </div>
         <div class="col-xs-3">
         <input class="form-control w3-input w3-padding" id="tag2" name="tag2" type="text" value="<?php echo $row['tag2']?>">
         </div>
         <div class="col-xs-3">
         <input class="form-control w3-input w3-padding" id="tag3" name="tag3" type="text" value="<?php echo $row['tag3']?>">
		 <input class="form-control w3-input w3-padding" id="note_id" name="note_id" type="hidden" value="<?php echo $noteId?>">
         </div>
        </div>
		<br> 
		<br>
		<hr>
		
		<input type="button" onclick="a()" value="Add File/Image"/>
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
	