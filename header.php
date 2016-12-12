
<div class="navbar-fixed">
	<nav>
		<div class="nav-wrapper cyan darken-2" style="padding-left:10px">
			<a href="/" class="brand-logo">NoteSide</a>
			<a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
			<ul id="nav" class="right hide-on-med-and-down">
				<li>
					<a class="btn-floating btn-large waves-effect waves-light blue" href="/create"><i class="material-icons">mode_edit</i></a>
				</li>
				<li><a href="/">Home</a></li>
				<li><a href="/notes.php">Notes</a></li>
				<?php
					if(isset($_SESSION['loginuser'])){
						echo '<li><a href="/account">Account</a></li>';
						echo '<li><a href="/logout.php">Logout</a></li>';
					}else{
						echo '<li><a href="/createaccount">Sign Up</a></li>';
						echo '<li><a href="/login">Login</a></li>';
					}
					
				?>
				
				
				
			</ul>
			<ul class="side-nav" id="mobile-demo">
				<li>
					<a class="btn-floating btn-large waves-effect waves-light blue" href="/create"><i class="material-icons">mode_edit</i></a>
				</li>
				<li><a href="/">Home</a></li>
				<li><a href="/notes.php">Notes</a></li>
				<?php
					if(isset($_SESSION['loginuser'])){
						echo '<li><a href="/account">Account</a></li>';
						echo '<li><a href="/logout.php">Logout</a></li>';
					}else{
						echo '<li><a href="/createaccount">Sign Up</a></li>';
						echo '<li><a href="/login">Login</a></li>';
					}
					
				?>
			</ul>
		</div>
	</nav>
</div><br>