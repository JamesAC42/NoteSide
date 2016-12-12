<?php

session_start();
include 'hidden/config.php';
if(empty($_GET)){
	header('location:/');exit();
}else{
	if(!isset($_GET['classmate'])){
		header('location:/');exit();
	}else{
		$classmate = $_GET['classmate'];
		if(!isset($_SESSION['loginuser'])){
			header('location:/');exit();
		}else{
			$username = $_SESSION['loginuser'];
			$sqldeleteclassmate = "DELETE FROM classmates WHERE studentone='$username' and studenttwo='$classmate';";
			$deleteclassmate = mysql_query($sqldeleteclassmate);
			$sqldecrementmates = "UPDATE ns_users SET classmates=classmates - 1 WHERE username='$username';";
			$decrementmates = mysql_query($sqldecrementmates);
			header('location:/account');exit();
		}
	}
}

?>