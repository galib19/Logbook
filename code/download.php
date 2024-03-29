<?php
// Make sure an ID was passed
if(isset($_GET['id'])) {
// Get the ID
    $id = intval($_GET['id']);
 
    // Make sure the ID is in fact a valid ID
    if($id <= 0) {
        die('The ID is invalid!');
    }
    else {
	include 'init.php';
	include 'users.php';

	if(logged_in() === false) {
	header('location: login.php');}


// check connection
if($connect->connect_error) {
    die("Connection Failed : " . $connect->error);
} else {
    // echo "Successfully Connected";   
}
 
        // Fetch the file information
        $query = "
            SELECT `mime`, `name`, `size`, `data`
            FROM `file`
            WHERE `id` = {$id}";
        $result = $connect->query($query);
 
        if($result) {
            // Make sure the result is valid
            if($result->num_rows == 1) {
            // Get the row
                $row = mysqli_fetch_assoc($result);
 
                // Print headers
                header("Content-Type: ". $row['mime']);
                header("Content-Length: ". $row['size']);
                header("Content-Disposition: attachment; filename=". $row['name']);
 
                // Print data
                echo $row['data'];
            }
            else {
                echo 'Error! No image exists with that ID.';
            }
 
            // Free the mysqli resources
            @mysqli_free_result($result);
        }
        else {
            echo "Error! Query failed: <pre>{$connect->error}</pre>";
        }
        @mysqli_close($connect);
    }
}
else {
    echo 'Error! No ID was passed.';
}