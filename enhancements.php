<!DOCTYPE html>
<html lang="en" class="animated fadeIn"> <!-- Reference: https://scotch.io/tutorials/level-up-your-websites-with-animatecss -->
<head>
	<meta charset="utf-8" />
	<meta name="description" content="Assignment 3" />
	<meta name="keywords" content="HTML,CSS, JS, PHP" />
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
		<li id="enhancements"><a href="enhancements.php">Enhancements</a></li> 
		<li><a href="enhancements2.php">Enhancements Two</a></li>
		<li><a href="phpenhancements.php">PHP Enhancements</a></li> 	
	</ul>
	</nav>
	<article>
		<h2 id="enhancements_page">Enhancements</h2>
		<ul class="container">
			<li>
			<input type="checkbox" name="ac[]" id="part_1" />
			<label for="part_1">Animation</label> <!-- Reference: https://job-descriptions.careerplanner.com/Systems-Software-Developer.cfm -->
			<section class="content">
				<p>In this assignment, I am using two different ways to create an animation - using an open source <strong>animate.css</strong> and doing it manually.</p>
				<h2>1. Open source <a href="https://daneden.github.io/animate.css/">animate.css</a></h2>
				<h3>a) Examples of animate.css</h3>
					<ul>
						<li><a id="clickable" href="enhancements.php">Change between pages to see the Fade In animation</a></li>
						<li><a href="#top">Hover on the name of the company to see the animation</a></li>
						<li><a href="#top">Hover on the company's photo to see the animation</a></li>
					</ul>
				<h3>b) How to use animate.css</h3>
				<p><em>Animate.css</em> is a CSS file with many pre-code animations. All you need to do is to put <em>class</em> in the tag that you want to have the animations. The name 
				of <em>class</em> is <em>animated</em> followed by the animation you want (check the list of animations from the original source). Using <em>animate.css</em> isn't difficult
				if you only need to use the animations once when you open the page. However, if you want the animations during an event (for example hovering), you need to add external codes
				for it to work.<br/>
				Example: <em>html lang="en" class="animated fadeIn"</em> is used in html tag to add Fade In animation for the whole page.</p>
				<h3>c) About animate.css</h3>
				<p>For what we are currently doing, we are only learning and using simple CSS to change basic element properties such as color, font, size, etc... When I had to 
				change between pages, I found it extremely irritating because the loading time was long. Therefore, I decided to create some interactions between pages by adding some 
				animations. By doing so, my website is more user-friendly as it shows the change between pages using <strong>activity indicators</strong>.
				</p>
				<h2>2. Making animation manually</h2>
				<h3>a) Examples of animations being made manually</h3>
					<ul>
						<li><a href="#menu">Menu Bar</a></li>
						<li><a href="#clickable">Clickable Link</a></li>
						<li><a href="about.php#myphoto">Hover on my photo</a></li>
						<li><a href="apply.php#radio_ticked">Radio box is ticked</a></li>
						<li><a href="apply.php#checkbox_ticked">Checkbox is ticked</a></li>		
						<li><a href="apply.php#button">Button</a></li>	
					</ul>
				<h3>b) About these animation</h3>
				<p>These animations are added to highlight the element that is being used. For most of these animations, I am using simple properties such as <em>font-size</em>, <em>font-style</em>, <em>background-color</em>, etc... while being hovered to create animations. 
				Apart from that, property <em>transform</em> is used to rotate or make the element bigger during an event. The most difficult animation for me is to rotate my profile picture using
				<em>@keyframes</em> rule. <em>@keyframes</em> helps the element change from the current style to a new style after a certain amount of time using <em>from</em> and <em>to</em>.
				</p>
			</section>
			</li>
			<li>
			<input type="checkbox" name="ac[]" id="part_2" />
			<label for="part_2">Accordion</label>
			<section class="content">
				<h3>a) Examples of Accordion</h3>
				<ul>
					<li><a href="#enhancements_page">In Enhancements page</a></li>
					<li><a href="jobs.php#jobs_page">In Jobs page</a></li> 
				</ul>
				<h3>b) About accordion</h3>
				<p>Accordion is added to divide an article into small sections instead of using a long article so the users can choose which part they want to see. In order to make accordion using CSS only, 
				my biggest problem is to understand that radio buttons or check boxes can be used depending on each situation. In this assignment, I am using checkbox for accordion because my users can open all tabs 
				at the same time if they want to. Additionally, I am also drawing small triangles to show an open tab or a close tab.</p>			
			</section>
			</li>
			<li>
			<input type="checkbox" name="ac[]" id="part_3" />
			<label for="part_3">Reference</label>
			<section class="content">
				<h3>Page Reference for this assignment:</h3>
				<ul>
					<li><a href="https://job-descriptions.careerplanner.com/Systems-Software-Developer.cfm">Systems Software Engineer Job Description</a></li>
					<li><a href="https://www.prospects.ac.uk/job-profiles/database-administrator">Database administrator Job Description</a></li>	
					<li><a href="https://daneden.github.io/animate.css/">Original page for animate.css</a></li>
					<li><a href="https://scotch.io/tutorials/level-up-your-websites-with-animatecss">Animate.css Tutorial</a></li>
					<li><a href="https://www.w3schools.com/css/css3_animations.asp">Picture Rotation</a></li>
					<li><a href="https://www.w3schools.com/css/css3_2dtransforms.asp">2D transformation</a></li>
					<li><a href="https://github.com/daneden/animate.css/issues/170">Animate.css while hovering</a></li>
					<li><a href="https://css-tricks.com/the-shapes-of-css/">How to draw triangles</a></li>			
					<li><a href="https://www.w3schools.com/colors/colors_rgb.asp">Color choosing</a></li>
					<li><a href="https://www.whc2017.org/looking-new-job/">We're hiring photo</a></li>
				</ul>
			</section>
			</li>
		</ul>
	</article>
	<hr />
	<?php
		include('footer.inc');
	?>	
</body>
</html>