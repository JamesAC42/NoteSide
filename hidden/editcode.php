<?php
include 'session.php';
include 'hidden/config.php';
require 'hidden/password.php';
$error = "";

function loadEdit(){
	if(empty($_GET)){
		header('location:/'); exit;
	}else{
		if(!isset($_GET['note'])){
			header('location:/'); exit;
		}else{
			$noteid = $_GET['note'];
			$sqlgetnoteinfo = 'SELECT * FROM ns_notes WHERE id="' . $noteid . '";';
			$getnoteinfo = mysql_query($sqlgetnoteinfo);
			if(mysql_num_rows($getnoteinfo) == 0){
				header('location:/'); exit;
			}else{
				$noteinfo = mysql_fetch_array($getnoteinfo);
				if(!($noteinfo['creator'] == $username)){
					header('location:/'); exit;
				}else{
					$ogtitle = $noteinfo['title'];
					$ogclassname = $noteinfo['class_name'];
					$ogteachername = $noteinfo['teacher'];
					$ogsection = $noteinfo['section_desc'];
					$filename = $noteinfo['filename'];
					$filepath = '../notes/' . $filename;
					$file = fopen($filepath, "r");
					$filecontents = fread($file, filesize($filepath));
					fclose($file);
				}
			}
		}
	}
}

if($_SERVER["REQUEST_METHOD"] == "POST"){

	$notetitle = mysql_real_escape_string($_POST['note-title']);
	$classname = mysql_real_escape_string($_POST['class-name']);
	$teachername = mysql_real_escape_string($_POST['teacher-name']);
	$sectionname = mysql_real_escape_string($_POST['section-name']);
	$hidenote = mysql_real_escape_string($_POST['private-note']);
	$protectednote = mysql_real_escape_string($_POST['protected-note']);
	$notecontent = $_POST['note-content'];
	
	$noteid = $_GET['note'];
	$sqlgetogtitle = "SELECT * FROM ns_notes WHERE id='$noteid';";
	$getogtitle = mysql_query($sqlgetogtitle);
	$ogtitlearr = mysql_fetch_array($getogtitle);
	$ogtitle = $ogtitlearr['title'];
	$ogclassname = $ogtitlearr['class_name'];
	$ogteachername = $ogtitlearr['teacher'];
	$ogsection = $ogtitlearr['section_desc'];
	date_default_timezone_set('UTC');
	$date = date('Y/m/d');
	$sqlchecknotetitle = "SELECT * FROM ns_notes WHERE title='$notetitle' and creator='$username';";
	$checknotetitle = mysql_query($sqlchecknotetitle);
	$validtitle = true;
	if(mysql_num_rows($checknotetitle)>0){

		if(!($notetitle == $ogtitle)){
			$error = "You already have a note titled that!";
			$validtitle = false;
		}else{
			$error = "";
			$validtitle = true;
		}
	
	}else{
		
		$validtitle = true;
		
	}
	if($validtitle){
		$sqlgetnote = "SELECT * FROM ns_notes WHERE id='$noteid';";
		$getnote = mysql_query($sqlgetnote);
		$noteinfo = mysql_fetch_array($getnote);
		
		$filename =  $noteinfo['filename'];
		$filepath = '../notes/' . $filename;
		
		if($protectednote == "unprotected"){
			$notepassword = "";
			$haspassword = 0;
		}else{
			$haspassword = 1;
			$notepassword = mysql_real_escape_string($_POST['protected-password']);
			$notepassword = password_hash($notepassword, PASSWORD_BCRYPT);
		}

		$sqlupdatenote = "UPDATE ns_notes SET title='$notetitle', date_edited='$date', class_name='$classname', teacher='$teachername', section_desc='$sectionname', has_password='$haspassword', password='$notepassword', is_hidden='$hidenote' WHERE id='$noteid';";

		$status = mysql_query($sqlupdatenote);

		$notefile = fopen($filepath, "w+");
		while(!feof($notefile)){
			$old = $old . fgets($notefile). "<br />";
		}
		file_put_contents($filepath, $notecontent);
		fclose($notefile);

		if($status){
			header('location: http://noteside.com/note/' . (string)$noteid);
		}else{
			$error = "Error";
			header('location:account.php');exit();
		}
	}
}else{
	if(empty($_GET)){
		header('location:/'); exit();
	}else{
		if(!isset($_GET['note'])){
			header('location:/'); exit();
		}else{
			$noteid = $_GET['note'];
			$sqlgetnoteinfo = 'SELECT * FROM ns_notes WHERE id="' . $noteid . '";';
			$getnoteinfo = mysql_query($sqlgetnoteinfo);
			if(mysql_num_rows($getnoteinfo) == 0){
				header('location:/'); exit();
			}else{
				$noteinfo = mysql_fetch_array($getnoteinfo);
				if(!($noteinfo['creator'] == $username)){
					header('location:/'); exit();
				}else{
					$ogtitle = $noteinfo['title'];
					$ogclassname = $noteinfo['class_name'];
					$ogteachername = $noteinfo['teacher'];
					$ogsection = $noteinfo['section_desc'];
					$filename = $noteinfo['filename'];
					$filepath = '../notes/' . $filename;
					$file = fopen($filepath, "r");
					$filecontents = fread($file, filesize($filepath));
					fclose($file);
				}
			}
		}
	}
}
?>