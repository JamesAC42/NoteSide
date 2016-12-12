<?php
	include 'hidden/config.php';
	include 'session.php';
	require 'hidden/password.php';
	$error = "";
	if($_SERVER["REQUEST_METHOD"] == "POST") {
		
		$notetitle = mysql_real_escape_string($_POST['note-title']);
		$classname = mysql_real_escape_string($_POST['class-name']);
		$teachername = mysql_real_escape_string($_POST['teacher-name']);
		$sectionname = mysql_real_escape_string($_POST['section-name']);
		$hidenote = mysql_real_escape_string($_POST['private-note']);
		$protectednote = mysql_real_escape_string($_POST['protected-note']);
		$notecontent = $_POST['note-content'];
		//$notecontent = htmlentities($_POST['note-content'], ENT_QUOTES, 'UTF-8');
		
		date_default_timezone_set('UTC');
		$date = date('Y/m/d');
		
		$sqlchecknotetitle = "SELECT * FROM ns_notes WHERE title='$notetitle' and creator='$username';";
		$checknotetitle = mysql_query($sqlchecknotetitle);
		
		if(mysql_num_rows($checknotetitle)>0){
			
			$error = "You already have a note titled that!";
			
		}else{
		
			$notefile = tmpfile();

			$filename =  $username . uniqid() . '.txt';
			$filepath = '../notes/' . $filename;

			if($protectednote == "unprotected"){
				$notepassword = "";
				$haspassword = 0;
			}else{
				$haspassword = 1;
				$notepassword = mysql_real_escape_string($_POST['protected-password']);
				$notepassword = password_hash($notepassword, PASSWORD_BCRYPT);
			}
			
			$sqlenternote = "INSERT INTO ns_notes (filename, title, creator, date_created, date_edited, class_name, teacher, section_desc, has_password, password, is_hidden) VALUES
			('$filename', '$notetitle', '$username', '$date', '$date', '$classname', '$teachername', '$sectionname', '$haspassword', '$notepassword', '$hidenote');";
			$status = mysql_query($sqlenternote);
			
			$sqlgetid = "SELECT id FROM ns_notes WHERE creator='$username' and title='$notetitle';";
			$idresult = mysql_query($sqlgetid);
			$idrow = mysql_fetch_array($idresult);
			$insert_id = $idrow['id'];
			
			#$sqlenternotecontent = "INSERT INTO ns_note_body (body, body_raw, id) VALUES ('$notecontent', '$noteformat', $insert_id);";
			
			$notefile = fopen($filepath, "a+");
			while(!feof($notefile)){
				$old = $old . fgets($notefile). "<br />";
			}
			file_put_contents($filepath, $old . $notecontent);
			fclose($notefile);
			
			$sqlenterusernote = "INSERT INTO user_notes (noteid, username) VALUES ($insert_id, '$username');";
			$sqlincrementusernotes = "UPDATE ns_users SET notes=(notes+1) WHERE username='$username';";
			
			$status = mysql_query($sqlenterusernote);
			$status = mysql_query($sqlincrementusernotes);
			
			if($status){
				
				header('location: http://noteside.com/note/' . (string)$insert_id); exit;
				
			}else{
				
				$error = "Error";
				
			}
		}
	}
?>
