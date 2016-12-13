<?php
	session_set_cookie_params(0, "/"); 
	session_start();
	include '../.htpasswds/config.php'; 
	
	if(!isset($_SESSION["loginuser"])){
		header('location:/login'); exit();
	}else{				
		$now = time();		
		if($now > $_SESSION['expire']){			
			header('location:/logout.php'); exit();		
		}else{								
			$username = $_SESSION['loginuser'];			
			$sql = "SELECT * FROM ns_users WHERE username='$username';";			
			$userinfo = mysql_query($sql);			
			$row = mysql_fetch_array($userinfo);			
			$user_id = $row['id'];			
			$user_firstname = $row['firstname'];			
			$user_lastname = $row['lastname'];			
			$user_email = $row['email'];			
			$user_signupdate = $row['signup_date'];			
			$user_classmates = $row['classmates'];			
			$user_notes = $row['notes'];		
		}
	}
?>