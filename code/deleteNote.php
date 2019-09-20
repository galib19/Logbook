<?php

include 'init.php';
include 'users.php';


if(isset($_GET['varname'])){
		$noteId = $_GET['varname'];
		echo $noteId;
		
		
		$sql = "DELETE FROM note WHERE note_id = '".$_GET['varname']."'";
		
		$result = mysqli_query($connect, $sql);
		header("location: viewNote.php");
		exit();
}

?>