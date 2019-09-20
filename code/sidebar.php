<?php
echo '
	
	  <h2><span class="label label-default w3-theme-d5">Dashboard</span></h2></li>
	  <br>
	  <form action="search.php" method="get">
	  <div class="input-group">
        <input type="text" class="form-control" placeholder="Search Note.." name="key">
        <span class="input-group-btn">
          <button class="btn btn-default" type="submit">
            <span class="glyphicon glyphicon-search"></span>
          </button>
        </span>
		
      </div>
	  </form>
	  <br>
      <ul class="nav nav-pills nav-stacked w3-theme-l1">
		 
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
        <li><a href="about.php"><span class="glyphicon glyphicon-info-sign"></span>ABOUT US</a></li>
		<li><a href="changePassword.php"><span class="glyphicon glyphicon-lock"></span>CHANGE PASSWORD</a></li>
		<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>LOG OUT</a></li>
		<li><a href="#contact">    </a></li>
      </ul><br>
'
?>

