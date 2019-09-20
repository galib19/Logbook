<?php

include 'init.php';
include 'users.php';


if(isset($_GET['varname'])){
		$reminderId = $_GET['varname'];
		echo $reminderId;
		
		
		$sql = "DELETE FROM reminder WHERE reminder_id = '".$_GET['varname']."'";
		
		$result = mysqli_query($connect, $sql);
		header("location: viewReminder.php");
		exit();
}

?>