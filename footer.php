<div class="container ">
	<div class="row">
		<div class="col l9 s12">
			<h5 class="white-text">NoteSide</h5>
			<div class="divider"></div>
			<p class="white-text">Created by <a class="white-text" href="http://github.com/jamesac42/">James</a></p>
			<p class="white-text">Designed with <a class="white-text" href="http://materializecss.com/">Materialize</a></p>
		</div>
		<div class="col l3 s12">
			<h5 class="white-text">Links</h5>
			<div class="divider"></div>
			<ul>
				<li><a class="modal-trigger white-text" href="#about">About</a></li>
				<li><a class="modal-trigger white-text" href="#bugReport">Report Bug</a></li>
				<li><a class="modal-trigger white-text" href="#requestFeature">Request Feature</a></li>
				<li><a class="white-text" href="/logout.php">Log Out</a></li>
			</ul>
		</div>
	</div>
	
	<script>
		$(document).ready(function(){
			$('.modal-trigger').leanModal();
		});
	</script>
	
	<div id="about" class="modal modal-fixed-footer">
		<div class="modal-content">
		  <h4>About</h4>
		  <p>A bunch of text</p>
		</div>
		<div class="modal-footer">
		  <a href="#!" class="modal-action modal-close waves-effect waves-teal btn-flat ">OK</a>
		</div>
	</div>
	
	<div id="bugReport" class="modal modal-fixed-footer">
		<div class="modal-content">
		  <h4>Report a Bug</h4>
		  <p>A bunch of text</p>
		</div>
		<div class="modal-footer">
		  <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Submit</a>
		</div>
	</div>
  
	<div id="requestFeature" class="modal modal-fixed-footer">
		<div class="modal-content">
		  <h4>Request a Feature</h4>
		  <p>A bunch of text</p>
		</div>
		<div class="modal-footer">
		  <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Submit</a>
		</div>
	</div>
		
</div>
<div class="footer-copyright cyan darken-3">
	<div class="container ">
		&copy; 2016
		<a href="index.php" class="white-text right">Home</a>
	</div>
</div>