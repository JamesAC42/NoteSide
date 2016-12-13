<?php include 'hidden/logincode.php'; ?><head>	
	<title>Login</title>
	<!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Baloo+Bhaina" rel="stylesheet">
	<link rel="shortcut icon" href="/images/favicon.ico" type="image/x-icon">
	<link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
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
	<header><?php include 'header.php'; ?>
	</header>
	<main>
		<div class="container">
			<h3>Login</h3>
			<div class="divider"></div><br>
			<div class="row">
				<div class="col l8 m6 s12">
					<form action="" method="post">
						<input type="text" name="username" placeholder="Username"><br>
						<input type="password" name="password" placeholder="Password"><br>
						<div class="row">
							<div class="col l6">
								<button class="btn btn-large teal waves-effect waves-light" type="submit" name="action">Submit
									<i class="material-icons right">send</i>
								</button>
							</div>
							<div class="col l6">
								<span id="error" style="color:red"><?php echo $error; ?></span>
							</div>
						</div>
					</form>
				</div>
				<div class="col l4 m6 s12">
					<div class="card light-blue darken-4 z-depth-3">
						<div class="card-content white-text">
							<span class="card-title">Login</span>
							<p>Please enter your information</p>
						</div>
						<div class="card-action">
							<a href="/createaccount">Sign Up</a>
							<a href="#">Sign In</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		</div>
	</main>
	<footer class="page-footer cyan darken-2">
		<?php include 'footer.php'; ?>
	</footer>
</body>
