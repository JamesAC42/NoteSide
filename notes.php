<?php 
header("location:/"); exit;
include 'session.php'; 
include 'colorgenerate.php';?><head>	
	<title>Notes</title>
	<!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Baloo+Bhaina" rel="stylesheet">
	<link rel="shortcut icon" href="/images/favicon.ico" type="image/x-icon">
	<link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
	<link type="text/css" rel="stylesheet" href="css/index.css" />
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


	<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
	
    <script type="text/javascript" src="js/materialize.min.js"></script>
	<header>
		<div class="navbar-fixed">
			<nav>
				<div class="nav-wrapper cyan darken-2" style="padding-left:10px">
					<a href="/" class="brand-logo">NoteSide</a>
				</div>
			</nav>
		</div><br>
	</header>
			
	<main>
		<ul id="slide-out" class="side-nav fixed">
			<li class="teal darken-2"><div class="userView">
				<h3 class="white-text">Find</h3>
			</div></li>
			<li class="no-padding">
				<div class="row cyan">
					<div class="col l4 s6 waves-effect">
						<a href="/" class="black-text center">Home</a>
					</div>
					<div class="col l4 s6 waves-effect">
						<a href="/account" class="black-text center">Account</a>
					</div>
					<div class="col l4 s12 waves-effect">
						<a href="/create" class="black-text center">Create</a>
					</div>
				</div>
			</li>
			<li class="hoverable no-padding">
				<form>
					<div class="input-field z-depth-1">
					  <input id="search" class="text-white" placeholder="Search" type="search" required></input>
					</div>
				</form>
			</li>
			<li><div class="divider"></div></li>
			<li><a href="notes.php" class="waves-effect waves-teal">Recent</a></li>
			<li><a href="notes.php?sort=saved" class="waves-effect waves-teal">Saved</a></li>
			<li class="no-padding">
				<ul class="collapsible collapsible-accordion">
				  <li>
					<a class="collapsible-header waves-effect waves-teal">Classes<i class="material-icons right">arrow_drop_down</i></a>
					<div class="collapsible-body">
					  <ul>
						<?php
							$sqlgetclasses = "SELECT classname FROM user_classes WHERE username='$username';";
							$classresult = mysql_query($sqlgetclasses);
							if(!$classresult or !mysql_num_rows($classresult)){
								echo "<li><a href='/account' class='waves-effect'>You have no classes! Add them here</a></li>";
							}else{
								while ($class = mysql_fetch_assoc($classresult)) {
									$classname = $class['classname'];
									echo "<li><a href='notes.php?sort=class&filter=$classname' class='waves-effect'>$classname</a></li>";
								}
							}
						?>
					  </ul>
					</div>
				  </li>
				</ul>
			</li>
			<li class="no-padding">
				<ul class="collapsible collapsible-accordion">
				  <li>
					<a class="collapsible-header waves-effect waves-teal">Classmates<i class="material-icons right">arrow_drop_down</i></a>
					<div class="collapsible-body">
					  <ul>
						<?php
							$sqlgetclassmates = "SELECT * FROM classmates WHERE studentone='$username';";
							$materesult = mysql_query($sqlgetclassmates);
							if(!$materesult or !mysql_num_rows($materesult)){
								echo "<li><a href='/account' class='waves-effect'>You have no classmates! Add them here</a></li>";
							}else{
								while ($classmate = mysql_fetch_assoc($materesult)) {
									$classmatename = $classmate['studenttwo'];
									echo "<li><a href='notes.php?sort=classmate&filter=$classmatename' class='waves-effect'>$classmatename</a></li>";
								}
							}
						?>
					  </ul>
					</div>
				  </li>
				</ul>
			</li>
			<li class="no-padding">
				<ul class="collapsible collapsible-accordion">
				  <li>
					<a class="collapsible-header waves-effect waves-teal">Teachers<i class="material-icons right">arrow_drop_down</i></a>
					<div class="collapsible-body">
					  <ul>
						<?php
							$sqlgetteachers = "SELECT teacher FROM user_teachers WHERE username='$username';";
							$teacherresult = mysql_query($sqlgetteachers);
							if(!$teacherresult or !mysql_num_rows($teacherresult)){
								echo "<li><a href='/account' class='waves-effect'>You have no teachers! Add them here</a></li>";
							}else{
								while ($teacher = mysql_fetch_assoc($teacherresult)) {
									$teachername = $teacher['teacher'];
									echo "<li><a href='notes.php?sort=teacher&filter=$teachername' class='waves-effect'>$teachername</a></li>";
								}
							}
						?>
					  </ul>
					</div>
				  </li>
				</ul>
			</li>
			<li class="no-padding center" style="height:80px;">&copy; Noteside</li>
		</ul>
		<script>
			$(".side-nav").sideNav({
				edge: 'left'
			});
		</script>
		<style>
			main, footer {
				padding-left: 300px;
			}
			header {
				padding-left: 300px;
				padding-right: 500px;
			}
			@media only screen and (max-width: 992px){
				header, main, footer{
					padding-left:0;
				}
			}
		</style>
		
		<div class="container">
			<?php
				if(empty($_GET)){
					$sqlgetnotes = "SELECT * FROM ns_notes ORDER BY id DESC LIMIT 24;";
					$notesresult = mysql_query($sqlgetnotes);
					$notepagehead = "Recent Notes";
				}else{
					$sorttype = htmlspecialchars($_GET['sort']);
					/*
					switch($sorttype){
						case 'saved':
							$sqlgetnotes = "SELECT * FROM user_saved_notes WHERE username='$username';";
							$notesresult = mysql_query($sqlgetnotes);
							$notepagehead = "Saved Notes";
						case 'class':
							$filter = $_GET['filter'];
							$sqlgetnotes = "SELECT * FROM ns_notes WHERE creator='$username' and class_name='$filter';";
							$notesresult = mysql_query($sqlgetnotes);
							$notepagehead = $_GET['filter'] . " Notes";
						case 'classmate':
							$filter = $_GET['filter'];
							$sqlgetnotes = "SELECT * FROM ns_notes WHERE creator='$filter';";
							$notesresult = mysql_query($sqlgetnotes);
							$notepagehead = $_GET['filter'] . "'s Notes";
						case 'teacher':
							$filter = $_GET['filter'];
							$sqlgetnotes = "SELECT * FROM ns_notes WHERE creator='$username' and teacher='$filter';";
							$notesresult = mysql_query($sqlgetnotes);
							$notepagehead = $_GET['filter'] . "'s Notes";
						default:
							$notepagehead = "Invalid";
					}*/
					if($sorttype == 'saved'){
						$sqlgetsaved = "SELECT * FROM ns_notes n INNER JOIN user_saved_notes s ON n.id = s.noteid WHERE s.username='$username' ORDER BY id DESC";
						$notesresult = mysql_query($sqlgetsaved);
						$notepagehead = "Saved Notes";
					}else if($sorttype == 'class'){
						$filter = htmlspecialchars($_GET['filter']);
						$sqlgetnotes = "SELECT * FROM ns_notes WHERE creator='$username' and class_name='$filter' ORDER BY id DESC;";
						$notesresult = mysql_query($sqlgetnotes);
						$notepagehead = htmlspecialchars($_GET['filter']) . " Notes";
					}else if($sorttype == 'classmate'){
						$filter = htmlspecialchars($_GET['filter']);
						$sqlgetnotes = "SELECT * FROM ns_notes WHERE creator='$filter' ORDER BY id DESC;";
						$notesresult = mysql_query($sqlgetnotes);
						$notepagehead = htmlspecialchars($_GET['filter']) . "'s Notes";
					}else if($sorttype == 'teacher'){
						$filter = htmlspecialchars($_GET['filter']);
						$sqlgetnotes = "SELECT * FROM ns_notes WHERE creator='$username' and teacher='$filter' ORDER BY id DESC;";
						$notesresult = mysql_query($sqlgetnotes);
						$notepagehead = htmlspecialchars($_GET['filter']) . "'s Notes";
					}else{
						$notepagehead = "Invalid";
					}
				}
			?>
			<h3><?php echo $notepagehead; ?></h3>
			<div class="divider"></div><br><br>
			<div class="row">
				<?php
					if(!$notesresult or !(mysql_num_rows($notesresult))){
							echo "<div class='center'>No notes!</div>";
					}else{
						$colors = array('teal','blue','light-blue','cyan');
						function genColor(){
							$colorindex = rand(0,3);
							$color = $colors[0];
							return $color;
						}
						while ($note = mysql_fetch_assoc($notesresult)) {
							$id = $note['id'];
							$title = $note['title'];
							$creator = $note['creator'];
							$class = $note['class_name'];
							$section = $note['section_desc'];
							$generatedcolor = genColor();
							echo "<div class='col l4 m6 s12'>
										<div class='card light-blue darken-3 hoverable'>
											<div class='card-content white-text'>
												<span class='card-title truncate'>$title</span>
												<p class='truncate'>$class, $section</p>
												<p>Created by $creator</p>
											</div>
											<div class='card-action'>
											  <a href='http://noteside.com/note/$id'>View</a>
											</div>
										</div>
									</div>";
						}
					}
				?>
			</div>
		</div>
		
	</main>
			
	<footer class="page-footer cyan darken-2">
		<?php include 'footer.php'; ?>
	</footer></body>