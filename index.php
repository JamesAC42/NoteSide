<?php 
	session_start();
	include '../.htpasswds/config.php'; 
?><head>
	<title>NoteSide</title>
	<!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/css?family=Ubuntu|Ubuntu+Monoz|Unica+One" rel="stylesheet">
	<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
	<link rel="shortcut icon" href="/images/favicon.ico" type="image/x-icon">
	<link rel="icon" href="images/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" href="/css/animate.css">
	<script src="/js/navbar.js"></script>
	<script src="/js/index.js"></script>
	<link href="/css/navbar.css" rel="stylesheet">
	<link href="/css/index.css" rel="stylesheet">
	<!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head> 
<body>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-75497871-2', 'auto');
  ga('send', 'pageview');
</script>
   
	<header>
		<?php include 'navbar.php'; ?>
	</header>
	<div class="container">
		
		<div class="sticky-header">
			<div class="center-vert">
				<div class="header-title">
					NOTESIDE
				</div>
				<div class="header-action">
					<a class="signup-btn animated infinite pulse" href="/createaccount">Sign Up</a>	
				</div>
				<div class="header-info">
					The intention of this site is to make it easier to take, share, and store a quick document or note. Jotting down an idea can be easily formatted with markdown, and a unique page can be saved, shared, and printed.  
				</div>
			</div>
		</div>
		<div class="recent-notes">
			<!--
			<div class="note-container">
				<div class="note-row note-title">Title of Note</div>
				<div class="note-row note-author">John Smith</div>
				<div class="note-row note-info">
					<div class="class-name">Class</div>
					<div class="teacher">Mr. Teacher</div>
				</div>
				<div class="note-action">
					<a href="/account" id="view-btn" class="note-action-btn">View</a>
					<a href="" class="note-action-btn">Save</a>
				</div>
			</div>-->
			<?php
				$sqlgetnotes = "SELECT * FROM ns_notes ORDER BY id DESC LIMIT 12";
				$notesresult = mysql_query($sqlgetnotes);
				if(!$notesresult or !(mysql_num_rows($notesresult))){
					echo "<div class='center'>There are no recent notes</div>";
				}else{
					while ($note = mysql_fetch_assoc($notesresult)) {
						$id = htmlentities($note['id']);
						$title = htmlentities($note['title']);
						$creator = htmlentities($note['creator']);
						$class = htmlentities($note['class_name']);
						$teacher = htmlentities($note['teacher']);

						$notedom = "<div class='note-container'>
								<div class='note-row note-title'>$title</div>
								<div class='note-row note-author'><a class='author-link' href='/user/$creator'>$creator</a></div>
								<div class='note-row note-info'>
									<div class='class-name'>$class</div>
									<div class='teacher'>$teacher</div>
								</div>
								<div class='note-action'>
									<a href='/note/$id' class='note-action-btn view-btn'>View</a>";
						if(isset($_SESSION["loginuser"])){
							$notedom .= "<a href='/savenote.php?id=$id' class='note-action-btn save-btn'>Save</a>";
							if($_SESSION['loginuser'] == $creator){
								$notedom .= "<a href='/edit/$id' class='note-action-btn edit-btn'>Edit</a><a href='/deletenote.php?note=$id&location=/' class='note-action-btn delete-btn'>Delete</a>";
							}
						}
						$notedom .= "</div></div>";			
						echo $notedom;	
					}
				}
			?>	
		</div>
	</div>
</body>