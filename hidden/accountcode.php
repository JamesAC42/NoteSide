<?php
	include 'session.php';
	include '../../.htpasswds/config.php'; 
	$classerror = "Add class";
	$teachererror = "Add teacher";
	$classmateerror = "Add classmate";
	if($_SERVER['REQUEST_METHOD'] == "POST"){
		if(isset($_POST['classaction'])){
			$class = mysql_real_escape_string($_POST['class']);
			$sqlgetclass = "SELECT * FROM classes WHERE classname='$class'";
			$sqlclassresult = mysql_query($sqlgetclass);
			if(mysql_num_rows($sqlclassresult) == 0){
				$sqladdclass = "INSERT INTO classes (classname, members) VALUES ('$class',1);";
				$addclass = mysql_query($sqladdclass);
				if(!$addclass){
					$classerror = "Error adding class";
				}else{
					$sqladduserclass = "INSERT INTO user_classes (username, classname) VALUES ('$username','$class');";
					$adduserclass = mysql_query($sqladduserclass);
					if(!$adduserclass){
						$classerror = "Error inserting class";
					}
				}
			}else{
				$sqlcheckuserclass = "SELECT * FROM user_classes WHERE username='$username' and classname='$class';";
				$checkuserclass = mysql_query($sqlcheckuserclass);
				if(!mysql_num_rows($checkuserclass) == 0){
					$classerror = "You already have that class";
				}else{
					$sqlupdateclass = "UPDATE classes SET members= members + 1 WHERE classname='$class'";
					$updateclass = mysql_query($sqlupdateclass);
					if(!$updateclass){
						$classerror = "Error adding class";
					}else{
						$sqladduserclass = "INSERT INTO user_classes (username, classname) VALUES ('$username','$class');";
						$adduserclass = mysql_query($sqladduserclass);
						if(!$adduserclass){
							$classerror = "Error inserting class";
						}
					}
				}
			}
		}else if(isset($_POST['teacheraction'])){
			$teacher = mysql_real_escape_string($_POST['teacher']);
			$sqlgetteacher = "SELECT * FROM teachers WHERE teacher='$teacher';";
			$getteacher = mysql_query($sqlgetteacher);
			if(mysql_num_rows($getteacher) == 0){
				$sqladdteacher = "INSERT INTO teachers (teacher, students) VALUES ('$teacher',1);";
				$addteacher = mysql_query($sqladdteacher);
				if(!$addteacher){
					$teachererror = "Error adding teacher";
				}else{
					$sqladduserteacher = "INSERT INTO user_teachers (username, teacher) VALUES ('$username','$teacher');";
					$adduserteacher = mysql_query($sqladduserteacher);
					if(!$adduserteacher){
						$teachererror = "Error adding teacher";
					}
				}
			}else{
				$sqlcheckuserteacher = "SELECT * FROM user_teachers WHERE username='$username' and teacher='$teacher';";
				$checkuserteacher = mysql_query($sqlcheckuserteacher);
				if(!mysql_num_rows($checkuserteacher) == 0){
					$teachererror = "You already have that teacher";
				}else{
					$sqlupdateteacher = "UPDATE teachers SET students= students + 1 WHERE teacher='$teacher'";
					$updateteacher = mysql_query($sqlupdateteacher);
					if(!$updateteacher){
						$teachererror = "Error adding teacher";
					}else{
						$sqladduserteacher = "INSERT INTO user_teachers (username, teacher) VALUES ('$username','$teacher');";
						$adduserteacher = mysql_query($sqladduserteacher);
						if(!$adduserteacher){
							$teachererror = "Error adding teacher";
						}
					}
				}
			}
		}else{
			$classmate = mysql_real_escape_string($_POST['classmate']);
			$sqlgetclassmate = "SELECT * FROM ns_users WHERE username='$classmate';";
			$getclassmate = mysql_query($sqlgetclassmate);
			if(mysql_num_rows($getclassmate) == 0){
				$classmateerror = "User does not exist.";
			}else{
				$sqlcheckifclassmates = "SELECT * FROM classmates WHERE studentone='$username' and studenttwo='$classmate';";
				$checkifclassmates = mysql_query($sqlcheckifclassmates);
				if(!mysql_num_rows($checkifclassmates) == 0){
					$classmateerror = "Classmate already exists";
				}else{
					$sqladdclassmate = "INSERT INTO classmates (studentone,studenttwo) VALUES ('$username','$classmate');";
					$addclassmate = mysql_query($sqladdclassmate);
					if(!$addclassmate){
						$classmateerror = "Error inserting classmate";
					}else{
						$sqlupdateclassmate = "UPDATE ns_users SET classmates= classmates + 1 WHERE username='$username';";
						$updateclassmate = mysql_query($sqlupdateclassmate);
						if(!$updateclassmate){
							$classmateerror = "Error inserting classmate";
						}
					}
				}
			}
		}
	}

?>