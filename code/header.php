<!DOCTYPE html>
<html>
<head>
<title>Logbook</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<script src='http://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.4.5/js/bootstrapvalidator.min.js'></script>
	
	<link rel="stylesheet" href="https://www.w3schools.com//lib/w3-theme-light-green.css">

	<style>
	html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
	
	.sidenav{
		font-size: 13px ;
      line-height: 2;
      letter-spacing: 2px;
      border-radius: 0; 
      font-family: Montserrat, sans-serif;
	}
	
	.navbar  {
	  margin-top: -29px;
      margin-bottom: 0;
      z-index: 9999;
      border: 0;
      font-size: 12px ;
      line-height: 2;
      letter-spacing: 4px;
      border-radius: 0; 
      font-family: Montserrat, sans-serif;
	}
	.navbar li a, .navbar-brand {
      color: #000 !important;
  }
  .navbar-nav li a:hover, .navbar-nav li.active a {
      color: #000 !important;
      background-color: #fff !important;
  }
  
 
  .open .dropdown-toggle {
      color: #000;
      background-color: #fff !important;
  }
  .dropdown-menu li a {
      color: #000 !important;
  }
  .dropdown-menu li a:hover {
      background-color: gray !important;
  
   
	</style>
	
</head>

<body>
	<!-- Top container -->
<?php
echo '<div class="jumbotron w3-center w3-animate-fading  w3-theme-l1" height="150ox"">
  <h1>Logbook</h1> 
</div>
	
<nav class="navbar navbar-inverse  w3-theme-l1">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
	  <a class="navbar-brand" href="#">Logbook</a>
       
    </div>
    <div class="collapse navbar-collapse navbar-right w3-hover-text-black" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="home.php"><span class="glyphicon glyphicon-home"></span>HOME</a></li>
		<li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-edit"></span>NOTE
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="addNote.php">Add New Note</a></li>
            <li><a href="viewNote.php">View Note</a></li> 
          </ul>
        </li>
		<li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-tasks"></span>TASK
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="addTask.php">Add New Task</a></li>
            <li><a href="viewTask.php">View Task</a></li> 
          </ul>
        </li>
		<li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-file"></span>FILE
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="addFile.php">Add File</a></li>
            <li><a href="list_files.php">View File</a></li> 
          </ul>
        </li>
		<li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-bell"></span>REMINDER
          <span class="caret"></span></a>
          <ul class="dropdown-menu"> 
            <li><a href="addReminder.php">Add Reminder</a></li>
            <li><a href="viewReminder.php">View Reminder</a></li> 
          </ul>
        </li>
		<li><a href="contact.php"><span class="glyphicon glyphicon-send"></span>CONTACT</a></li>
        <li><a href="about.php"><span class="glyphicon glyphicon-info-sign"></span>ABOUT</a></li>
		<li><a href="#">    </a></li>
		<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> LOG OUT</a></li>
        
      </ul>
    </div>
  </div>
</nav>'
?>
