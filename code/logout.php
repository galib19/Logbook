<?php 
 
require_once 'init.php'; 
 
logout(); 

?>
<?php
function logged_in() {
    if(isset($_SESSION['uid'])) {
        return true;
    } else {
        return false;
    }
}

function logout() {
    if(logged_in() === TRUE){
        // remove all session variable
        session_unset();
 
        // destroy the session
        session_destroy();
 
        header('location: login.php');
    }
}
?>
 