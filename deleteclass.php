<?php

session_start();
include '../.htpasswds/config.php'; 
if(empty($_GET)){
	header('location:/');exit();
}else{
	if(!isset($_GET['class'])){
		header('location:/');exit();
	}else{
		$classname = $_GET['class'];
		if(!isset($_SESSION['loginuser'])){
			header('location:/');exit();
		}else{
			$username = $_SESSION['loginuser'];
			$sqldeleteuserclass = "DELETE FROM user_classes WHERE username='$username' and classname='$classname';";
			$sqldecrementstudents = "UPDATE classes SET members=members-1 WHERE classname='$classname';";
			$decrementstudents = mysql_query($sqldecrementstudents);
			$deleteuserclass = mysql_query($sqldeleteuserclass);
			header('location:/account');exit();
		}
	}
}

?>