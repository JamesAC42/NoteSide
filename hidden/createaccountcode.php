<?php
	session_set_cookie_params(0, "/"); 
	session_start();
	include 'hidden/config.php';
	require 'hidden/password.php';
	$error = "";
	$myusername = "";
	$myfirstname = "";
	$mylastname = "";
	$myemailaddress = "";
	
	if($_SERVER["REQUEST_METHOD"] == "POST") {
		$myusername = mysql_real_escape_string($_POST['customusername']);
		$mypassword = mysql_real_escape_string($_POST['password']);
		$passwordconfirm = mysql_real_escape_string($_POST['password-confirm']);
		$myemailaddress = mysql_real_escape_string($_POST['email']);
		$myfirstname = mysql_real_escape_string($_POST['firstname']);
		$mylastname = mysql_real_escape_string($_POST['lastname']);
		
		$sqlcheckuser = "SELECT username FROM ns_users WHERE username = '$myusername'";
		$result = mysql_query($sqlcheckuser);
		$row = mysql_fetch_array($result);
		$count = mysql_num_rows($result);
		
		$date = date('Y/m/d');
		
		$sqlcheckemail = "SELECT email FROM ns_users WHERE email='$myemailaddress';";
		$emailresult = mysql_query($sqlcheckemail);
		$emailrow = mysql_fetch_array($emailresult);
		$emailcount = mysql_num_rows($emailresult);
			
		if($count > 0) {
			$error = "Username already exists.";
			$myusername = "";
		}else if(!($mypassword == $passwordconfirm)){
			$error = "Passwords do not match";
		}else if($emailcount > 0){
			$error = "An account with that email already exists.";
			$myemailaddress = "";
		}else{
			if (strpos($myusername, ' ') !== false) {
				$error = "Invalid username";
				$myusername = "";
			}else if(strpos($myfirstname, ' ') !== false) {
				$error = "Invalid firstname";
				$myfirstname = "";
			}else if(strpos($mylastname, ' ') !== false) {
				$error = "Invalid lastname";
				$mylastname = "";
			}else{
				$mypassword = password_hash($mypassword, PASSWORD_BCRYPT);
				$sqlinsert = "INSERT INTO ns_users (username, firstname, lastname, email, password, signup_date, notes, classmates) VALUES 
				('$myusername','$myfirstname','$mylastname','$myemailaddress','$mypassword','$date', 0, 0);";
				if (mysql_query($sqlinsert)) {
					$_SESSION['loginuser'] = $myusername;				$_SESSION['start'] = time();				$_SESSION['expire'] = $_SESSION['start'] + (3 * 60 * 60);
					header('location:account.php'); exit();
				} else {
					$error = "Invalid Information";
					#echo "Error: " . $sqlinsert . "<br>" . mysqli_error($db);
				}
			}
		}
	}
?>