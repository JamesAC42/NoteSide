<?php
session_start();
include 'hidden/config.php';
if(empty($_GET)){
	header('location:index.php'); exit();
}else{
	if(!isset($_GET['id'])){
		header('location:index.php'); exit();
	}else{
		$noteid = $_GET['id'];
		if(!isset($_SESSION['loginuser'])){
			header('location:note.php?id=' . (string)$noteid); exit(); 
		}else{
			$username = $_SESSION['loginuser'];
			$sqlnotesaved = "SELECT * FROM user_saved_notes WHERE noteid='$noteid' and username='$username';";
			$notesaved = mysql_query($sqlnotesaved);
			$issavedbyuser = mysql_num_rows($notesaved);
			if($issavedbyuser == 0){
				header('location:index.php'); exit();
			}
			$sqlunsave = "DELETE FROM user_saved_notes WHERE username='$username' and noteid='$noteid';";
			$sqldecrement = "UPDATE ns_notes SET saved=(saved-1) WHERE id='$noteid';";
			if(mysql_query($sqlunsave)){
				if(mysql_query($sqldecrement)){
					header('location:http://noteside.com/note/' . (string)$noteid);exit();
				}
			}else{
				echo 'Error unsaving note. Contact administrator for help';
			}
		}
	}
}

?>