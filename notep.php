<?php
  session_set_cookie_params(0, "/"); 
  session_start();
  include 'hidden/config.php';
  require 'hidden/password.php';

  $error = "";
	if($_SERVER['REQUEST_METHOD'] == 'GET'){
		if(isset($_GET['note'])){
			$note = $_GET['note'];
			$sql = "SELECT has_password FROM ns_notes WHERE id='$note'";
			$sql_has_pw = mysql_query($sql);
			if($sql_has_pw === FALSE){
				die(mysql_error());
			}
			$row_has_pw = mysql_fetch_array($sql_has_pw);
			if($row_has_pw['has_password'] === 0){
				header('location:/note/'.$note); exit;
			}else{
				if(isset($_GET['incorrect'])){
					$error="Incorrect Password";
				}
			}
		}else{
			header('location:/'); exit;
		}
	}else{
		header('location:/'); exit;
	}
?>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
	<link href="/css/notep.css" rel="stylesheet">
  <title>Note Authentication</title>
</head>
<body>
	<div id="password_modal">
		<div id="password_container">
			<span id="password-header">
				This note is protected!
			</span>
			<p id="password-desc">
				Enter the password to continue.
			</p>
			<form id="notepassword_form" action="/note/<?php echo $note; ?>" method="POST">
				<input name="notepassword" id="password-box" type="password" required>
				<input name="notepassword-submit" id="submit-button" type="submit" value="Go">
			</form>
			<p id="error-span"><?php echo $error; ?></p>
		</div>
	</div>
	<div class="navbar-div">
		<ul class="navbar left">
			<li><a id="nav-header" href="/"><strong>Noteside</strong></a></li>
			<li><a href="/create">Create</a></li>
		</ul>
		<ul class="navbar right">
			<li><a href="/account">Account</a></li>
			<li><a href="/notes.php">Notebook</a></li>
		</ul>
	</div>
	<div class="container">
		<div class="sidebar">
			<div class="toolbar-div">
				<ul class="toolbar">
					<li><span>Print</span></li>
					<li><span>Save</span></li>
				</ul>
			</div>
		</div>
		<div class="note-container">
				<div class="note-title-div">
					<span class="note-title"></span>
				</div>
				<div class="note-info-div">
					<div class="note-info-row">

					</div>
					<div class="note-info-row">

					</div>
					<div class="note-info-row">

					</div>
				</div>
				<div class="note-content">
					
				</div>
			</div>
	</div>
</body>