<div class="navbar-div">

	<ul class="navbar left">

		<li><a id="nav-header" href="/"><strong>Noteside</strong></a></li>

		<li><a id="create-btn" href="/create">&#9998;</a></li>

	</ul>

	<ul class="navbar right" id="rightNav">

		<li class="icon">

			<a href="javascript:void(0);" onclick="showNav()">&#9776;</a>

		</li>

		<?php

			if(isset($_SESSION["loginuser"])){

				echo('<li><a href="/account">Account</a></li>');

			}else{

				echo('<li><a href="/login">Login</a></li>');

			}

		?>

		<li><a href="/notes.php">Notebook</a></li>

	</ul>

</div>