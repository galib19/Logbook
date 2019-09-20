<?php 
function logged_in() {
    if(isset($_SESSION['uid'])) {
		 
        return true;
    } else {
        return false;
    }
}

function userdata($username) {
    global $connect;
    $sql = "SELECT * FROM users WHERE username = '$username'";
    $query = $connect->query($sql);
    $result = $query->fetch_assoc();
    if($query->num_rows == 1) {
        return $result;
    } else {
        return false;
    }
     
    $connect->close();
 
    // close the database connection
}
 

?>