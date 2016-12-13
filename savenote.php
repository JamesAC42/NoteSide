<?php
session_start();
include '../.htpasswds/config.php'; 
if(empty($_GET)){
	header('location:/');exit();
}else{
	if(!isset($_GET['id'])){
		header('location:/');exit();
	}else{
		$noteid = $_GET['id'];
		if(!isset($_SESSION['loginuser'])){
			header('location:http://noteside.com/note/' . (string)$noteid);exit();
		}else{
			$username = $_SESSION['loginuser'];
			$sqlnotesaved = "SELECT * FROM user_saved_notes WHERE noteid='$noteid' and username='$username';";
			$notesaved = mysql_query($sqlnotesaved);
			$issavedbyuser = mysql_num_rows($notesaved);
			if($issavedbyuser > 0){
				header('location:/'); exit();
			}
			$sqlsave = "INSERT INTO user_saved_notes (noteid, username) VALUES ('$noteid','$username');";
			$sqlincrement = "UPDATE ns_notes SET saved=(saved+1) WHERE id='$noteid';";
			mysql_query($sqlsave);
			mysql_query($sqlincrement);
			header('location:http://noteside.com/note/' . (string)$noteid); exit();
		}
	}
}

?>