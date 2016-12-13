<?php

session_start();
include '../.htpasswds/config.php'; 
if(empty($_GET)){
	header('location:/');exit();
}else{
	if(!isset($_GET['teacher'])){
		header('location:/');exit();
	}else{
		$teachername = $_GET['teacher'];
		if(!isset($_SESSION['loginuser'])){
			header('location:/');exit();
		}else{
			$username = $_SESSION['loginuser'];
			$sqldeleteuserteacher = "DELETE FROM user_teachers WHERE username='$username' and teacher='$teachername';";
			$sqldecrementstudents = "UPDATE teachers SET students=students-1 WHERE teacher='$teachername';";
			$decrementstudents = mysql_query($sqldecrementstudents);
			$deleteuserteacher = mysql_query($sqldeleteuserteacher);
			header('location:/account');exit();
		}
	}
}

?>