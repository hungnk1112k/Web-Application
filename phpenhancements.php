<!DOCTYPE html>
<html lang="en" class="animated fadeIn"> <!-- Reference: https://scotch.io/tutorials/level-up-your-websites-with-animatecss -->
<head>
	<meta charset="utf-8" />
	<meta name="description" content="Assignment 3" />
	<meta name="keywords" content="HTML,CSS" />
	<meta name="author" content="Khanh Hung Nguyen" />
	<link href="styles/style.css" rel="stylesheet"/>
	<link href="styles/animate.css" rel="stylesheet">
	<script src="scripts/jquery-3.4.0.js"></script>  <!-- https://code.jquery.com/jquery-3.4.0.js -->
	<script src="scripts/enhancements.js"></script>
	<title>Hung Tech</title>
</head>
<body>
	<?php
		include('header.inc');
	?>
	<button id="scroll"></button>
	<nav>
	<ul>
		<li><a id="menu" href="index.php">Home</a></li>
		<li><a href="jobs.php">Job Description</a></li>
		<li><a href="apply.php">Job Application</a></li>
		<li><a href="about.php">About Me</a></li>
		<li><a href="enhancements.php">Enhancements</a></li> 
		<li><a href="enhancements2.php">Enhancements Two</a></li>
		<li id="enhancementsphp"><a href="phpenhancements.php">PHP Enhancements</a></li> 		
	</ul>
	</nav>
	<article>
	<h2>PHP Enhancements</h2>
	<div class="tab-panels">
		<ul class="tabs">
			<li rel="panel1" class="active">Enhancement 1</li>
            <li rel="panel2">Enhancement 2</li>
            <li rel="panel3">Reference</li>
        </ul>

    <section id="panel1" class="panel active">
		<h2>Login form</h2>
		<h3><a href="home.php">1. Example of login form</a></h3>
		<h3>2. About this login form</h3>
		<p>In order to prevent user to access the database directly by typing its link, login form is created. User is required to 
		type in username and password before being able to manipulate the database. If users type in the database link instead, they will 
		immidiately be transferred back to the login form.
		</p>
		<h3>3. How I made this login form</h3>
		<p>A database with username and password is created beforehand. If the user type in their username and password, it will check if that 
		username and password exists in the database. If it exists, the users then can access the database.
		</p>
    </section>
	<section id="panel2" class="panel">
		<h2>Sort database</h2>
		<h3>1. About sorting database</h3>
		<p>Sorting database for our own purpose is a critical part of analyzing data and as a result, I made my database sorted by different ways.
		</p>
		<h3>2. How I made this sorting</h3>
		<p>Using sorting algorithm in SQL and data being passed in, it helps me sort the data easily.
		</p>
    </section>
	<section id="panel3" class="panel">
		<h2>Reference</h2>
		<ol>
			<li><a href="https://www.w3schools.com/php/php_form_url_email.asp">Email validation</a></li>
			<li><a href="https://stackoverflow.com/questions/31871199/php-dd-mm-yyyy-validation">Date validation</a></li>
			<li><a href="https://www.tutorialspoint.com/php/php_mysql_login.htm">Login form</a></li>
			<li><a href="https://www.youtube.com/watch?v=E9MyRFjh8oo">Login form</a></li>	
		</ol>
    </section>
	</div>
	</article>
	<hr />
	<?php
		include('footer.inc');
	?>
</body>
</html>