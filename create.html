<?php include 'hidden/createnote.php'; ?><head>
	<meta charset="utf-8">
	<meta author="jamesac">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Dosis|Eczar|Share+Tech+Mono|Ubuntu|Ubuntu+Mono" rel="stylesheet">
	<script src="./js/wordcount.js"></script>
	<title>Create Note</title>
	<link href="./css/textarea.css" rel="stylesheet">
	<link href="./css/navbar.css" rel="stylesheet">
	<script src="./js/navbar.js"></script>
	<link rel="icon" href="./images/favicon.ico" type="image/x-icon">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
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
<div class="sidebar-nav">
	<div class="sidebar-nav-tab" id="counter-tab"><div class="sidebar-nav-tab-inner" id="counter-tab-inner">0</div></div>
	<div class="sidebar-nav-tab active-sidebar" id="info-tab"><div class="sidebar-nav-tab-inner" id="info-tab-inner">&#9881;</div></div>
	<div class="sidebar-nav-tab" id="help-tab"><div class="sidebar-nav-tab-inner" id="help-tab-inner">?</div></div>
</div>
<div class="sidebar-wrapper hidden-sidebar" id="counter-wrapper">
	<div class="sidebar-window" id="counter-window">
		<div class="window-container">
			<div class="header-div">
				<span class="sidebar-head" id="counter-head"><strong>Word Count</strong></span>
			</div>
			<div id="stat-div">
				<div class="stat-entry"><span class="no-text">Type Something!</span></div>
			</div>
		</div>
	</div>
</div>
<div class="sidebar-wrapper" id="info-wrapper"><!--none-->
	<div class="sidebar-window" id="info-window"><!--default-->
		<div class="window-container">
			<div class="header-div">
				<span class="sidebar-head" id="info-head"><strong>Note Info</strong></span>
			</div>
			<div class="window-inner-div" id="form-submit-div">
				<form action="" method="post" id="submit-note">
					<div class="row">
						<div class="col">
							<label for="title-input">Title</label>
							<input name="note-title" id="title-input" type="text" required></input>
						</div>
						<div class="col">
							<label for="section-input">Chapter/ Section</label>
							<input name="section-name" id="section-input" type="text" required>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<label for="class-input">Class</label>
							<select name="class-name" id="class-input" required>
							<?php
								$sqlgetclasses = "SELECT * FROM user_classes WHERE username='$username';";
								$getclasses = mysql_query($sqlgetclasses);
								if(mysql_num_rows($getclasses) == 0){
									echo "<option disabled>You have no classes!</option>";
								}else{
									while ($class = mysql_fetch_assoc($getclasses)) {
										$classname = $class['classname'];
										echo '<option value="' . $classname . '">' . $classname . '</option>';
									}
								}
							  ?>
							</select>
						</div>
						<div class="col">
							<label for="teacher-input">Teacher</label>
							<select name="teacher-name" id="teacher-input" required>
								<?php
									$sqlgetteachers = "SELECT * FROM user_teachers WHERE username='$username';";
									$getteachers = mysql_query($sqlgetteachers);
									if(mysql_num_rows($getteachers) == 0){
										echo "<option disabled>You have no teachers!</option>";
									}else{
										while ($teacher = mysql_fetch_assoc($getteachers)) {
											$teachername = $teacher['teacher'];
											echo '<option value="' . $teachername . '">' . $teachername . '</option>';
										}
									}
								  ?>
							</select>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<button type="submit" id="submit-button" class="btn" name="action" value="note-submit">Create</button>
						</div>
						<div class="col">
							<button id="save-button" type="button" onclick="save('manual')" class="btn">Save</button>
						</div>
					</div>
				<div id="error-row">
						<span id="error-text"><?php echo $error; ?></span>
				</div>
				</form>
			</div>
			<div class="header-div">
				<span class="sidebar-head" id="settings-head"><strong>Settings</strong></span>
				<div class="window-inner-div" id="settings-div">
					<div class="row">
						<div id="fontfamily-setting-div" class="col">
							<select id="fontfamily-select" class="font-setting-select" name="fontfamily">
								<option id="ubuntu-mono-option" value="Ubuntu Mono">Ubuntu Mono</option>
								<option id="ubuntu-option" value="Ubuntu">Ubuntu</option>
								<option id="dosis-option" value="Dosis">Dosis</option>
								<option id="eczar-option" value="Eczar">Eczar</option>
								<option id="sharetech-option" value="Share Tech Mono">Share Tech Mono</option>
							</select>
						</div>
						<div id="fontsize-setting-div" class="col">
							<select id="fontsize-select" class="font-setting-select" name="fontsize">
								<option value="16" select="selected">16</option>
								<option value="18">18</option>
								<option value="20">20</option>
								<option value="22">22</option>
								<option value="24">24</option>
								<option value="26">26</option>
								<option value="28">28</option>
								<option value="30">30</option>
								<option value="34">34</option>
								<option value="56">56</option>
							</select>	
						</div>
					</div>
					<div class="row">
						<div class="col setting-desc">
							Spacing
						</div>
						<div class="col">
							<select id="spacing-select" class="font-setting-select" name="linespacing">
								<option value="1">1</option>
								<option value="1.5">1.5</option>
								<option value="1.75">1.75</option>
								<option value="2">2</option>
							</select>
						</div>
					</div>
					<div class="row">
						<div class="col setting-desc">
							Auto Save
						</div>
						<div class="col">
							<button value="on" class="btn setting-btn" type="button" onclick="toggleAutoSave()" id="auto-save-btn">On</button>
						</div>
					</div>
					<div class="row">
						<div class="col setting-desc">
							Private
						</div>
						<div class="col">
							<input type="hidden" form="submit-note" name="private-note" value="public" id="hidden-input-privatenote">
							<button name="private-note" class="btn setting-btn" type="button" onclick="hideNoteToggle()" id="hide-note-btn">Off</button>
						</div>
					</div>
					<div class="row">
						<div class="col setting-desc">
							Protect Note
						</div>
						<div class="col">
							<input type="hidden" form="submit-note" name="protected-note" value="unprotected" id="hidden-input-protectnote">
							<button class="btn setting-btn" type="button" onclick="protectNoteToggle()" id="protect-note-btn">Off</button>
						</div>
					</div>
					<div class="row" id="protectedPasswordRow">
						<input name="protected-password" type="password" form="submit-note" id="protectedPassword" placeholder="Password">
					</div>
					<div class="row">
						<div class="col setting-desc">
							Clear Editor
						</div>
						<div class="col">
							<button class="btn setting-btn" type="button" onclick="wipeEditor()" id="clear-editor-btn">X</button>
						</div>
					</div>
					<div class="row">
						<div class="col setting-desc">
							Wipe Save
						</div>
						<div class="col">
							<button class="btn setting-btn" type="button" onclick="wipeSave()" id="wipe-save-button">X</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="sidebar-wrapper hidden-sidebar" id="help-wrapper">
	<div class="sidebar-window" id="help-window">
		<div class="window-container">
			<div class="header-div">
				<span class="sidebar-head" id="help-head"><strong>Help</strong></span>
			</div>
			<div class="window-inner-div">
				<p>This app allows you to format your note using Markdown, which is parsed when your page is generated.</p>
				<h3>Key</h3>
				<p>What you type:</p>
				<div class="markdown-demo-code">
					<pre>
# Big Header

## Smaller Header

...

###### Smallest Header</pre>
				</div>
				<p>What shows up:</p>
				<div class="markdown-demo-result">
					<h1>Big Header</h1>
					<h2>Smaller Header</h2>
					<h6>Smallest Header</h6>
				</div><br>
				<div class="markdown-demo-code">
					<pre>**Bold**</pre>
				</div>
				<div class="markdown-demo-result">
					<strong>Bold</strong>
				</div>
				<div class="markdown-demo-code">
					<pre>*Italics*</pre>
				</div>
				<div class="markdown-demo-result">
					<em>Italics</em>
				</div>
				<div class="markdown-demo-code">
					<pre>
- An
- Unordered
- List</pre>
				</div>
				<div class="markdown-demo-result">
					<ul>
						<li>An</li>
						<li>Unordered</li>
						<li>List</li>
					</ul>
				</div>
				<div class="markdown-demo-code">
					<pre>
[A hyperlink](https://www.noteside.com)</pre>
				</div>
				<div class="markdown-demo-result">
					<a href="https://www.noteside.com" class="markdown-demo-anchor">A hyperlink</a>
				</div>
				<div class="markdown-demo-code">
					<pre>~~Delete~~</pre>
				</div>
				<div class="markdown-demo-result">
					<del>Delete</del>
				</div>
				<div class="markdown-demo-code">
					<pre>
> You'd be in jail</pre>
				</div>
				<div class="markdown-demo-result">
					<blockquote class="markdown-demo-blockquote">You'd be in jail</blockquote>
				</div>
				<div class="markdown-demo-code">
					<pre>
An inline `code block` denoted by backticks.</pre>
				</div>
				<div class="markdown-demo-result">
					An inline <code class="markdown-demo-inlinecode">code block</code> denoted by backticks.
				</div>
				<div class="markdown-demo-code">
					<pre>
    // Code block indented by 4 spaces
    public int makeNote(int number){
        return number + 2;
        // Subtract -2 from number
    }</pre>
				</div>
				<div class="markdown-demo-result">
					<pre class="markdown-demo-code codeblock-result">
// Code block indented by 4 spaces
public int makeNote(int number){
    return number + 2;
    // Subtract -2 from number		
}</pre>
				</div>
			</div>
		</div>
	</div>
</div>
	<textarea name="note-content" id="text_area" form="submit-note" placeholder="Type here..." required></textarea>
<script src="./js/edittextarea.js"></script>
</body>