<?php 
 
require_once 'init.php';
 
if(logged_in() === TRUE) {
    header('location: home.php');
}
 
// form is submitted
if($_POST) {
 
  
    $username = $_POST['username'];
	$email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
 
   
    if($username == "") {
        echo " * Username is Required <br />";
    }
	
	if($email == "") {
        echo " * Email is Required <br />";
    }
 
    if($password == "") {
        echo " * Password is Required <br />";
    }
 
    if($cpassword == "") {
        echo " * Confirm Password is Required <br />";
    }
 
    if($username && $email && $password && $cpassword) {
 
        if($password == $cpassword) {
            if(userExists($username) === TRUE) {
                echo $_POST['username'] . " already exists !!";
            } else {
                if(registerUser() === TRUE) {
                    echo "Successfully Registered <a href='login.php'>Login</a>";
                } else {
                    echo "Error";
                }
            }
        } else {
            echo " * Password does not match with Conform Password <br />";
        }
    }
 
}
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
 

function userExists($username) {
    // global keyword is used to access a global variable from within a function
    global $connect;
 
    $sql = "SELECT * FROM users WHERE username = '$username'";
    $query = $connect->query($sql);
    if($query->num_rows == 1) {
        return true;
    } else {
        return false;
    }
 
    $connect->close();
    // close the database connection
}
 
function registerUser() {
 
    global $connect;
 
   
    $username = $_POST['username'];
	$email = $_POST['email'];
    $password = $_POST['password'];
     
    $salt = salt(32);
    $newPassword = makePassword($password, $salt);
    if($newPassword) {
        $sql = "INSERT INTO users (username, email, password, salt, active) VALUES ('$username', '$email', '$newPassword', '$salt' , 1)";
        $query = $connect->query($sql);
        if($query === TRUE) {
            return true;
        } else {
            return false;
        }
    } // /if
 
    $connect->close();
    // close the database connection
} // register user funtion
 
function salt($length) {
    return mcrypt_create_iv($length);
}
 
function makePassword($password, $salt) {
    return hash('sha256', $password.$salt);
} 
 
 
?>
 
<!DOCTYPE html>
<html>
<head>
    <title>Registration Form</title>
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
<div id="signup">
    <div class="w3-card-4" style="max-width:600px">
	<img src="13.png" alt="Avatar" style="width:30%" class="w3-center w3-margin-top">
	   
	  <form class="w3-container" id="signup" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
			
        <div class="w3-section">
	 
		
        <div class="input-group">
		<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
        <input type="text" class="form-control" name="username"  placeholder="Enter your username" autocomplete="on" value="<?php if($_POST) {
            echo $_POST['username'];
            } ?>" />
        </div>
		<br>
		
		<div class="input-group">
		<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
        <input type="email" class="form-control" name="email" placeholder="Enter your email address" autocomplete="on" value="<?php if($_POST) {
            echo $_POST['email'];
            } ?>" />
        </div>
		<br>
		<div class="input-group">
		<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
        <input type="password" class="form-control" placeholder="Enter youyr password" name="password" autocomplete="off" /> 
        </div>
		<br>
		<div class="input-group">
		<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
        <input type="password" class="form-control" placeholder="Confirm password" name="cpassword" autocomplete="off" /> 
        </div>
		<br>
       
     	<hr />

        <div class="form-group">
            <button
			type="submit" class="w3-button w3-block w3-green w3-section w3-padding" name="btn-signup">
    		<span class="glyphicon glyphicon-log-in"></span> Register
			</button> 
        </div> 
		  
		<div class="form-group">
			<button type="reset" class="w3-button w3-block w3-section w3-padding w3-red"><a href="intro.php">Cancel</a> </button>
        </div>
       </div>
      </form>
	  <div class="w3-padding">
	   Already Registered ? Click <button type="reset" class="w3-button   w3-section w3-padding w3-blue"><a href="login.php">Login</a> </button>
	  </div>
    </div> 
</div>
</body>
</html>