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
  
		<div class="w3-card-4 w3-theme-l2 w3-padding" >
			<div class="w3-wide w3-round-large w3-button w3-center w3-block w3-ripple w3-theme-d2 w3-padding" >
				<h2>All Files</h2>
			</div>
			<hr>
			<?php 

// Query for a list of all existing files
$sql = "SELECT `id`, `name`, `mime`, `size`, `created` FROM `file` WHERE uid = '$_SESSION[uid]'";
$result = $connect->query($sql);
 
// Check if it was successfull
if($result) {
    // Make sure there are some files in there
    if($result->num_rows == 0) {
        echo '<p>There are no files in the database</p>';
    }
    else {
        // Print the top of a table
        echo '<header><table width="100%">
                <tr>
                    <td><b>Name</b></td>
                    <td><b>Type</b></td>
                    <td><b>Size(bytes)</b></td>
                    <td><b>Created</b></td>
                    <td><b>Download Link</b></td>
                </tr> <header>';
				
		?>
			<br>
		<?php
        // Print each file
        while($row = $result->fetch_assoc()) {
            echo "
                <tr>
                    <td>{$row['name']}</td>
                    <td>{$row['mime']}</td>
                    <td>{$row['size']}</td>
                    <td>{$row['created']}</td>
                    <td><button class='w3-round-large w3-theme-d2 w3-ripple'><a href='download.php?id={$row['id']}'>
					<span class='glyphicon glyphicon-download-alt'></span>Download</a><button></td>
                </tr>";

        }
 
        // Close table
        echo '</table>';
    }
 
    // Free the result
    $result->free();
}
else
{
    echo 'Error! SQL query failed:';
    echo "<pre>{$connect->error}</pre>";
}
 
// Close the mysql connection
$connect->close();
?>
			
			
			
		
		</div><br>
			
	  </div>
	 </div>
	 <br>
  </div>
</div>

	  
	   
	
	
<?php include 'footer.php' ?>
	