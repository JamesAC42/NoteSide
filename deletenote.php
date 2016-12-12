<?php

session_start();
include 'hidden/config.php';
if(empty($_GET)){
	header('location:/');exit;
}else{
	if(!isset($_GET['note'])){
		header('location:/');exit;
	}else{
		$noteid = mysql_real_escape_string($_GET['note']);
		if(!isset($_SESSION['loginuser'])){
			header('location:/');exit;
		}else{
			$username = $_SESSION['loginuser'];
			$sqldeletenote = "DELETE FROM ns_notes WHERE id='$noteid';";
			$sqldecrementnotes = "UPDATE ns_users SET notes=notes-1 WHERE username='$username';";
			$sqldeleteusernote = "DELETE FROM user_notes WHERE noteid='$noteid' AND username='$username';";
			$sqldeletesaved = "DELETE FROM user_saved_notes WHERE noteid='$noteid';";
			
			$deletenote = mysql_query($sqldeletenote);
			$decrementnotes = mysql_query($sqldecrementnotes);
			$deleteusernote = mysql_query($sqldeleteusernotes);
			$deletesaved = mysql_query($sqldeletesaved);
			if(!isset($_GET['location'])){
				header('location:/account');exit;
			}else{
				$goto = htmlspecialchars($_GET['location']);
				header('location:' . $goto);exit;
			}
		}
	}
}

?>