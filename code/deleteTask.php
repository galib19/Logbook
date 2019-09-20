<?php

include 'init.php';
include 'users.php';


if(isset($_GET['varname'])){
		$taskId = $_GET['varname'];
		echo $taskId;
		
		
		$sql = "DELETE FROM task WHERE task_id = '".$_GET['varname']."'";
		
		$result = mysqli_query($connect, $sql);
		header("location: viewTask.php");
		exit();
}

?>