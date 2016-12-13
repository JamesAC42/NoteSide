<?php
session_set_cookie_params(0, "/"); 
session_start();
include '../.htpasswds/config.php'; 
require 'hidden/password.php';

$error = "";

if(isset($_SESSION['loginuser'])){
	header('location:/account'); exit;
}

if($_SERVER["REQUEST_METHOD"] == "POST") {
	
	$myusername = mysql_real_escape_string($_POST['username']);
	$mypassword = mysql_real_escape_string($_POST['password']);
	
	$sql = "SELECT password FROM ns_users WHERE username = '$myusername'";
	$storedpw = mysql_query($sql);
	$row = mysql_fetch_array($storedpw);
	
	$count = mysql_num_rows($storedpw);
	
	if($count == 1) {
		if (password_verify($mypassword, $row['password'])) {
			
			$_SESSION['loginuser'] = $myusername;			$_SESSION['start'] = time();			$_SESSION['expire'] = $_SESSION['start'] + (8 * 60 * 60);
			header('location:/account'); exit;
			
		} else {
			$error = "Invalid username or password";
		}
	}else{
		$error = "Invalid username or password";
	}
}
?>