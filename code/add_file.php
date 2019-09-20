<?php

include 'init.php';
include 'users.php';

if(logged_in() === false) {
header('location: login.php');}

// Check if a file has been uploaded
if(isset($_FILES['uploaded_file'])) {
    // Make sure the file was sent without errors
    if($_FILES['uploaded_file']['error'] == 0) {
        // Connect to the database
        
// crearte connection
$connect = new Mysqli($servername, $username, $password, $dbname);
 
// check connection
if($connect->connect_error) {
    die("Connection Failed : " . $connect->error);
} else {
    // echo "Successfully Connected";   
}
 
        // Gather all required data
		$uid = $_SESSION['uid'];
        $name = $connect->real_escape_string($_FILES['uploaded_file']['name']);
        $mime = $connect->real_escape_string($_FILES['uploaded_file']['type']);
        $data = $connect->real_escape_string(file_get_contents($_FILES  ['uploaded_file']['tmp_name']));
        $size = intval($_FILES['uploaded_file']['size']);
 
        // Create the SQL query
        $query = "
            INSERT INTO file (
                uid,name, mime, size, data, created 
            )
            VALUES (
                '$uid','$name', '$mime', '$size', '$data', NOW()
            )";
 
        // Execute the query
        $result = $connect->query($query);
 
        // Check if it was successfull
        if($result) {
            header('location: list_files.php');
			echo 'Success! Your file was successfully added!';
        }
        else {
            echo 'Error! Failed to insert the file'
               . "<pre>{$connect->error}</pre>";
        }
    }
    else {
        echo 'An error accured while the file was being uploaded. '
           . 'Error code: '. intval($_FILES['uploaded_file']['error']);
    }
 
    // Close the mysql connection
    $connect->close();
}
else {
    echo 'Error! A file was not sent!';
}
 
// Echo a link back to the main page
echo '<p>Click <a href="index.html">here</a> to go back</p>';
?>
 