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
<title>W3.CSS Template</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<style>
body,h1,h5 {font-family: "Raleway", sans-serif}
body, html {height: 100%}
.bgimg {
    background-image: url('11.jpg');
    min-height: 100%;
    background-position: center;
    background-size: cover;
}

@import url(http://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700);
@import url(http://fonts.googleapis.com/css?family=Roboto+Condensed:400,300,700);

body {
    background: #fff;
	font-family: 'Roboto', sans-serif;
	color:#333;
	line-height: 22px;	
}
h1, h2, h3, h4, h5, h6 {
	font-family: 'Roboto Condensed', sans-serif;
	font-weight: 400;
	color:#111;
	margin-top:5px;
	margin-bottom:5px;
}
h1, h2, h3 {
	text-transform:uppercase;
}

input.upload {
    position: absolute;
    top: 0;
    right: 0;
    margin: 0;
    padding: 0;
    font-size: 12px;
    cursor: pointer;
    opacity: 1;
    filter: alpha(opacity=1);    
}

.form-inline .form-group{
    margin-left: 0;
    margin-right: 0;
}
.control-label {
    color:#333333;
}


</style>
<body>

<div class="bgimg w3-display-container w3-text-white">
  <div class="w3-display-middle w3-jumbo">
    <p>logbook<h2></p>
  </div>
  <div class="w3-display-topmiddle w3-container w3-xlarge">
    <p><button onclick="location.href='register.php';" class="w3-button w3-black">Sign Up</button>
    <button onclick="location.href='login.php';" class="w3-button w3-black">Log In</button></p>
  </div>
  <div class="w3-display-bottomleft w3-container">
    
    <p>powered by <a href="logbook.com" target="_blank">Galib</a></p>
  </div>
</div>


</div>
</div>

</body>
</html>

