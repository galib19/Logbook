<?php 
 
require_once 'init.php';

function logged_in() {
    if(isset($_SESSION['uid'])) {
        return true;
    } else {
        return false;
    }
}
 
 
if(logged_in() === TRUE) {
    header('location: home.php');
}
 
?>
 
<!DOCTYPE html>
<html>
<head>
    <title>Login and Registration Procedural PHP </title>
</head>
<body>
 
<a href="login.php">Login</a> or <a href="register.php">Register</a>
 
</body>
</html>