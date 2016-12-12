<?php
session_start();
include 'hidden/config.php';
if(empty($_GET)){
	header('location:/');
}else{
	if(!isset($_GET['user'])){
		header('location:/');
	}else{
		$username = htmlspecialchars($_GET['user']);
		if(isset($_SESSION['loginuser'])){
			if($username == $_SESSION['loginuser']){
				header('location:/account'); exit();
			}
		}
	}
}
?><head>
	<title><?php echo $username . "'s Account"?></title>
	<!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Baloo+Bhaina" rel="stylesheet">
	<link rel="shortcut icon" href="/images/favicon.ico" type="image/x-icon">
	<link rel="icon" href="/images/favicon.ico" type="image/x-icon">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="/css/materialize.min.css"  media="screen,projection"/>
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
	<script type="text/javascript" src="js/noteside.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
	<script type="text/javascript" src="js/account.js"></script>
	<header>
	<?php
		include 'header.php';
		$sql = "SELECT * FROM ns_users WHERE username='$username';";			
		$userinfo = mysql_query($sql);			
		$row = mysql_fetch_array($userinfo);
		$user_firstname = $row['firstname'];			
		$user_lastname = $row['lastname'];		
		$user_signupdate = $row['signup_date'];			
		$user_classmates = $row['classmates'];			
		$user_notes = $row['notes'];
	?>
	</header>
	<style>
		.user-stat {
			border-left:2px solid teal;
		}
		.addcol {
			border-bottom:3px solid teal;
			height:390px;
		}
		.addthingheader{
			
		}
		.content{
			height:80%;
			overflow-y:auto;    
		}
		.collection-item{
		}
		#addUserButton{
			margin:0 auto;
			height:30px;
			width:80px;
			background-color: teal;
			text-align: center;
			color:white;
			font-size:19px;
			border-radius:20px;
		}
	</style>
	<main>
		<div class="container">
			<div class="row">
				<div class="col l6 s6">
					<h2><?php echo $user_firstname . " " . $user_lastname; ?></h2>
				</div>
				<div class="col l6 s6">
					<div id="addUserButton">
					test
					</div>
				</div>
			</div>
			
			<div class="row" style="padding-left:10px">
				<div class="col l2 user-stat">
					<span><?php echo $username; ?></span>
				</div>
				<div class="col l3 user-stat">
					<span>User since <?php echo $user_signupdate; ?></span>
				</div>
				<div class="col l2 user-stat">
					<span><?php echo $user_notes; ?> notes</span>
				</div>
				<div class="col l3 user-stat">
					<span><?php echo $user_classmates; ?> classmates</span>
				</div>
			</div>
			<div class="divider"></div><br><br><br>
			
			<h4><?php echo $user_firstname . "'s Things"; ?></h4><div class="divider"></div><br>
			<div class="row">
				<div class="col l4 s12 addcol">
					<h5>Classes</h5><div class="divider"></div><br>
					<div class="content">
						<!--
						<ul class="collection teal">
						  <li class="collection-item"><div>Test<a href="#!" class="secondary-content"><i class="material-icons">label</i></a></div></li>
						</ul>-->
						<?php
							$sqlgetclasses = "SELECT classname FROM user_classes WHERE username='$username';";
							$getclasses = mysql_query($sqlgetclasses);
							if(mysql_num_rows($getclasses) == 0){
								echo "<div class='center'>This user has no classes!</div>";
							}else{
								echo '<ul class="collection teal">';
								while ($class = mysql_fetch_assoc($getclasses)) {
									$classname = $class['classname'];
									echo '<li class="collection-item"><div>' . $classname . '</div></li>';
								}
								echo '</ul>';
							}
						?>
					</div>
				</div>
				<div class="col l4 s12 addcol">
					<h5>Teachers</h5><div class="divider"></div><br>
					<div class="content">
						<?php
							$sqlgetteachers = "SELECT teacher FROM user_teachers WHERE username='$username';";
							$getteachers = mysql_query($sqlgetteachers);
							if(mysql_num_rows($getteachers) == 0){
								echo "<div class='center'>This user has no teachers!</div>";
							}else{
								echo '<ul class="collection teal">';
								while ($teacher = mysql_fetch_assoc($getteachers)) {
									$teachername = $teacher['teacher'];
									echo '<li class="collection-item"><div>' . $teachername . '</div></li>';
								}
								echo '</ul>';
							}
						?>
					</div>
				</div>
				<div class="col l4 s12 addcol">
					<h5>Classmates</h5><div class="divider"></div><br>
					<div class="content">
						<?php
							$sqlgetclassmates = "SELECT studenttwo FROM classmates WHERE studentone='$username';";
							$getclassmates = mysql_query($sqlgetclassmates);
							if(mysql_num_rows($getclassmates) == 0){
								echo "<div class='center'>This user has no classmates!</div>";
							}else{
								echo '<ul class="collection teal">';
								while ($classmate = mysql_fetch_assoc($getclassmates)) {
									$classmatename = $classmate['studenttwo'];
									echo '<a class="collection-item" href="/user/' . $classmatename . '"><div>' . $classmatename . '</div></a>';
								}
								echo '</ul>';
							}
						?>
					</div>
				</div>
			</div><br><br>
			
			<h4 ><?php echo $user_firstname . "'s Notes"; ?></h4><div class="divider"></div><br>
			<div class="row">
				<?php
					$sqlgetnotes = "SELECT * FROM ns_notes WHERE creator='$username' ORDER BY id DESC;";
					$notesresult = mysql_query($sqlgetnotes);
					if(!$notesresult or !(mysql_num_rows($notesresult))){
						echo "<div class='center'>This user has no notes!</div>";
					}else{
						while ($note = mysql_fetch_assoc($notesresult)) {
							$id = $note['id'];
							$title = $note['title'];
							$creator = $note['creator'];
							$class = $note['class_name'];
							$section = $note['section_desc'];
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
			</div><br><br><br>
		</div>
	</main>
	<footer class="page-footer cyan darken-2">
		<?php include 'footer.php'; ?>
	</footer>
</body>