<?php 
	session_set_cookie_params(0, "/"); 
	session_start(); 
	include 'Parsedown.php';
	include '../.htpasswds/config.php'; 
	require 'hidden/password.php';
	if(isset($_GET['id'])) {
		$noteid = htmlspecialchars($_GET['id']);
		$note_valid = True;
		$sqlnoteinfo = "SELECT * FROM ns_notes WHERE id='$noteid';";
		$noteinforesult = mysql_query($sqlnoteinfo);
		if(!mysql_num_rows($noteinforesult) == 0){
			$noteinfo = mysql_fetch_array($noteinforesult);
			if($noteinfo['has_password'] == 1){
				if(isset($_POST['notepassword'])){
					$password_input = $_POST['notepassword'];
					$password_check = $noteinfo['password'];
					if(password_verify($password_input,$password_check)){
						$note_valid = True;
					}else{
						$note_valid = False;
					}
				}else{
					$note_valid = False;
					header('location:/notep.php?note='.$noteid); exit;
				}
			}else{
				$note_valid = True;
			}
			if($note_valid){
				$filename = '../notes/' . $noteinfo['filename'];
				$notecontentfile = fopen($filename, "r");
				clearstatcache();
				$notecontentraw = fread($notecontentfile, filesize($filename));
				$noteformat = htmlentities($notecontentraw, ENT_QUOTES, 'UTF-8');
				$Parsedown = new Parsedown();
				$noteformat = $Parsedown->text($notecontentraw);
				fclose($notecontentfile);
				if(isset($_SESSION['loginuser'])){
					$username = $_SESSION['loginuser'];
					$sqlnotesaved = "SELECT * FROM user_saved_notes WHERE noteid='$noteid' and username='$username';";
					$notesaved = mysql_query($sqlnotesaved);
					$issavedbyuser = mysql_num_rows($notesaved);
					$loggedin = true;
				}

				$sqlnotehowmanysaved = "SELECT * FROM user_saved_notes WHERE noteid='$noteid';";
				$notehowmany = mysql_query($sqlnotehowmanysaved);
				$savestat = mysql_num_rows($notehowmany);
			}else{
				header('location:/notep.php?note='.$noteid.'&incorrect');exit;
			}
		}else{
			echo("<script>alert('$noteid');</script>");
			#header('location:/notes.php'); exit;
		}
	}else{
		header('location:/account'); exit;
	}
?>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link href="/css/navbar.css" rel="stylesheet">
	<script src="/js/navbar.js"></script>
	<link href="/css/note.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Ubuntu|Ubuntu+Monoz|Eczar" rel="stylesheet">
	<script src="/js/note.js"></script>
	<link rel="shortcut icon" href="/images/favicon.ico" type="image/x-icon">
	<link rel="icon" href="images/favicon.ico" type="image/x-icon">
	<title><?php echo htmlentities($noteinfo['title']); ?></title>
	<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

		ga('create', 'UA-75497871-2', 'auto');
		ga('send', 'pageview');
	</script>
</head>
<body>
	<?php include 'navbar.php'; ?>
	<div class="container">
		<script>
			function deleteNote(){
				if(confirm("Are you sure you want to delete this note?")){
					 console.log('http://noteside.com/deletenote.php?note=' + '<?php echo $noteid; ?>');
					 console.log("null");
				}
			}
		</script>
		<div class="sidebar">
			<div class="toolbar-div">
				<ul class="toolbar">
					<li><a href="#" onclick="printPage()">Print</a></li>
					<?php
						if($loggedin){
							if($issavedbyuser > 0){
								echo "<li><a href='/unsavenote.php?id=" . $noteid . "'>Unsave</a></li>";
							}else{
								echo "<li><a href='/savenote.php?id=" . $noteid . "'>Save</a></li>";
							}
							if($noteinfo['creator'] == $_SESSION['loginuser']){
								echo "<li><a href='http://noteside.com/edit/" . $noteid . "'>Edit</a></li>";
								echo "<li><a href='/deletenote.php?note=" . $noteid . "'  id='delete-button'>Delete</a></li>";
							}
						}else{
							echo "<li><a href='/login'>Login to Save</a></li>";
						}
					?>
				</ul>
			</div>
		</div>
		<div class="note-container">
			<div class="note-title-div">
				<span class="note-title"><strong><?php echo htmlentities($noteinfo['title']); ?></strong></span>
			</div>
			<div class="note-info-div">
				<div class="note-info-row">
					<?php echo htmlentities($noteinfo['class_name']); ?>
				</div>
				<div class="note-info-row">
					Created By <a href="/user/<?php echo htmlentities($noteinfo['creator']); ?>"><?php echo htmlentities($noteinfo['creator']); ?></a> on <span>
					<?php echo $noteinfo['date_created']; ?></span>
				</div>
				<div class="note-info-row">
					<?php echo htmlentities($noteinfo['teacher']); ?>
				</div>
			</div>
			<div class="note-content">
				<?php 
					echo strip_tags($noteformat, '<a><p><ul><li><strong><em><h1><h2><h3><h4><h5><h6><code><pre>'); 
				?>
			</div>
		</div>
	</div>
</body>