<?php 

include 'init.php';
include 'users.php';



if(logged_in() === false) {
header('location: login.php');}
 


 
function salt($length) {
    return mcrypt_create_iv($length);
}
 
function makePassword($password, $salt) {
    return hash('sha256', $password.$salt);
}
  
function getUserDataByUserId($uid) {
    global $connect;
 
    $sql = "SELECT * FROM users WHERE uid = $uid";
    $query = $connect->query($sql);
    $result = $query->fetch_assoc();
    return $result;
 
    $connect->close();
}
 
 
 
function passwordMatch($uid, $password) {
    global $connect;
 
    $userdata = getUserDataByUserId($uid);
 
    $makePassword = makePassword($password, $userdata['salt']);
 
    if($makePassword == $userdata['password']) {
        return true;
    } else {
        return false;
    }
 
    // close connection
    $connect->close();
}

function changePassword($uid, $password) {
    global $connect;
 
    $salt = salt(32);
    $makePassword = makePassword($password, $salt);
 
    $sql = "UPDATE users SET password = '$makePassword', salt = '$salt' WHERE uid = $uid";
    $query = $connect->query($sql);
 
    if($query === TRUE) {
        header('location:home.php');
		return true;
    } else {
        return false;
    }
} 
 
if($_POST) {
    $currentpassword = $_POST['currentpassword'];
    $newpassword = $_POST['newpassword'];
    $confirmpassword = $_POST['confirmpassword'];
 
    if($currentpassword == "") {
        echo "Current Password field is required <br />";
    }
 
    if($newpassword == "") {
        echo "New Password field is required <br />";
    }
 
    if($confirmpassword == "") {
        echo "Confirm Password field is required <br />";
    }
 
    if($currentpassword && $newpassword && $confirmpassword) {
        if(passwordMatch($_SESSION['uid'], $currentpassword) === TRUE) {
 
            if($newpassword != $confirmpassword) {
                echo "New password does not match confirm password <br />";
            } else {
                if(changePassword($_SESSION['uid'], $newpassword) === TRUE) {
                    echo "Successfully updated the password";
                } else {
                    echo "Error while updating the information <br />";
                }
            }
             
        } else {
            echo "Current Password is incorrect <br />";
        }
    }
}
 
?>
 

 
 
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<script src='http://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.4.5/js/bootstrapvalidator.min.js'></script>
	
	<link rel="stylesheet" href="https://www.w3schools.com//lib/w3-theme-light-green.css">
</head>
<body>
 
<div id="login">
    <div class="w3-card-4" style="max-width:600px">
	<img src="12.jpg" alt="Avatar" style="width:30%" class="w3-circle w3-margin-top">
	   
	  <form class="w3-container" id="login" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
			
        <div class="w3-section">
	 
		
        <div class="input-group">
		<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
        <input type="password" class="form-control" placeholder="Enter your current password" name="currentpassword" autocomplete="off" /> 
        </div>
		<br>
		
		<div class="input-group">
		<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
        <input type="password" class="form-control" placeholder="Enter your new password" name="newpassword" autocomplete="off" /> 
        </div>
		<br>
    
		
		<div class="input-group">
		<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
        <input type="password" class="form-control" placeholder="Confirm password" name="confirmpassword" autocomplete="off" /> 
        </div>
		<br>

        <div class="form-group">
            <button
			type="submit" class="w3-button w3-block w3-green w3-section w3-padding" name="btn-signup">
    		<span class="glyphicon glyphicon-log-in"></span> Change Password
			</button> 
        </div> 
		  
		<div class="form-group">
			<button type="reset" class="w3-button w3-block w3-section w3-padding w3-red"><a href="login.php">Log In</a> </button>
        </div>
       </div>
      </form>
	  
    </div> 
</div>
</body>
</html>