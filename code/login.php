<?php 
 
require_once 'init.php';

function logged_in() {
    if(isset($_SESSION['uid'])) {
        return true;
    } else {
        return false;
    }
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
 
function login($username, $password) {
    global $connect;
    $userdata = userdata($username);
 
    if($userdata) {
        $makePassword = makePassword($password, $userdata['salt']);
        $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$makePassword'";
        $query = $connect->query($sql);
		
		
        if($query->num_rows == 1) {
			
            return true;
        } else {
            return false;
        }
    }
 
    $connect->close();
    // close the database connection
}



function userdata($username) {
    global $connect;
    $sql = "SELECT * FROM users WHERE username = '$username'";
    $query = $connect->query($sql);
    $result = $query->fetch_assoc();
	$uid = $result['uid'];
	$_SESSION["uid"] = $uid;
    if($query->num_rows == 1) {
        return $result;
    } else {
        return false;
    }
     
    $connect->close();
 
    // close the database connection
}

function salt($length) {
    return mcrypt_create_iv($length);
}
 
function makePassword($password, $salt) {
    return hash('sha256', $password.$salt);
}
 
 
if(logged_in() === TRUE) {
    header('location: home.php');
}
 
 
// form submiited
if($_POST) {
    $username = $_POST['username'];
    $password = $_POST['password'];
 
    if($username == "") {
        echo " * Username Field is Required <br />";
    }
 
    if($password == "") {
        echo " * Password Field is Required <br />";
    }
 
    if($username && $password) {
        if(userExists($username) == TRUE) {
            $login = login($username, $password);
            if($login) {
                $userdata = userdata($username);
 
                $_SESSION['id'] = $userdata['id'];
 
                header('location: home.php');
                exit();
                     
            } else {
                echo "Incorrect username/password combination";
            }
        } else{
            echo "username does not exists";
        }
    }
 
} // /if
 
 
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
		<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
        <input type="text" class="form-control" name="username"  placeholder="Enter your username" autocomplete="on" />
        </div>
		<br>
		
		<div class="input-group">
		<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
        <input type="password" class="form-control" placeholder="Enter youyr password" name="password" autocomplete="off" /> 
        </div>
		<br>
     	<hr />

        <div class="form-group">
            <button
			type="submit" class="w3-button w3-block w3-green w3-section w3-padding" name="btn-signup">
    		<span class="glyphicon glyphicon-log-in"></span> Log In
			</button> 
        </div> 
		  
		<div class="form-group">
			<button type="reset" class="w3-button w3-block w3-section w3-padding w3-red"><a href="intro.php">Cancel</a> </button>
        </div>
       </div>
      </form>
	  <div class="w3-padding">
	   Not Yet Registered ? Click <button type="reset" class="w3-button   w3-section w3-padding w3-blue"><a href="register.php">Register</a> </button>
	  </div>
    </div> 
</div>
</body>
</html>