<!DOCTYPE html>
<html lang="en" class="animated fadeIn"> <!-- Reference: https://scotch.io/tutorials/level-up-your-websites-with-animatecss -->
<head>
	<meta charset="utf-8" />
	<meta name="description" content="Assignment 1" />
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
		include('menu.inc');
	?>
	<article>
	<h2>Welcome to Hung Tech</h2>
	<div class="container">
        <div id="slider">
            <ul id="slides">
                <li class="slide slide1"><a href="https://www.facebook.com/hungnet/"><img src="images/Hung_Tech.jpg" alt="Hung Tech logo" width="300" height="300" /></a></li>
                <li class="slide slide2"><a href="jobs.php#job_image"><img src="images/Job.jpg" alt="Job" width="300" height="300"></a></li>
                <li class="slide slide3"><a href="about.php#myphoto"><img id="myphoto" src="images/myphoto.jpg" alt="My Photo" width="300" height="300"></a></li>
                <li class="slide slide1"><a href="https://www.facebook.com/hungnet/"><img src="images/Hung_Tech.jpg" alt="Hung Tech logo" width="300" height="300" /></a></li>
            </ul>
        </div>
    </div>
	<hr/>
	<section>
	<h2>Hung Tech History</h2>
	<p>
	During 2017, our founder Khanh Hung Nguyen was working for a small shop near where he used to live. Everything about his job was amazing apart from the fact that he had
	to do everything manually. One day, he lost his list for what he sold during the day. Hung spent hours and hours trying to fix his mistakes, however it didn't work 
	and he had to pay a week's worth of salary as a consequence.
	</p>	
	<p>This made Hung extremely frustrated, so he decided to look for some solutions online, and technology was the only option in his opinion that can prevent people from making 
	silly mistakes. So, since then, Hung decided to quit his job and start his own business... and on the 1<sup>st</sup> November 2017 Hung Tech was born!
	</p>
	<p>
	The original idea of Hung Tech is to provide high quality technical services to its clients. Over a year, Hung Tech has provided services to more than 10,000 households and 
	companies. Even though we have greatly envolved with a huge range of technical options, we never lose focus on our customer.
	</p>
	<p>
	No matter what happens to Hung Tech, our main goal will always be bringing technology into everyone's lives.
	</p>
	</section>
	<section>
	<h2>Location</h2>
	<p>We are currently located at Swinburne University Campus</p>
	<ol>
		<li><a href="https://www.google.com/maps/place/Swinburne+University+of+Technology/@-37.8221461,145.0367659,17z/data=!3m1!4b1!4m5!3m4!1s0x6ad642326bae5aaf:0x75e96bbd4988f769!8m2!3d-37.8221504!4d145.0389546">John St, Hawthorn VIC 3122</a></li>
		<li><a href="https://www.google.com/maps/place/Swinburne+University+of+Technology,+Wantirna+Campus,+Wantirna+South+VIC+3152/@-37.8735443,145.2341818,18z/data=!3m1!4b1!4m5!3m4!1s0x6ad63c24e60dd431:0x6e7de52fe2099846!8m2!3d-37.8734845!4d145.2348976">369 Stud Rd, Wantirna VIC 3152</a></li>
		<li><a href="https://www.google.com/maps/place/Swinburne+University+of+Technology+-+Croydon/@-37.801902,145.2834803,17z/data=!3m1!4b1!4m5!3m4!1s0x6ad63a90c4ce7f0d:0x2cfca9b3671e4727!8m2!3d-37.8019063!4d145.285669">12-50 Norton Road, Croydon VIC 3136 Australia</a></li>
	</ol>
	</section>
	</article>
	<hr />
	<?php
		include('footer.inc');
	?>
</body>
</html>