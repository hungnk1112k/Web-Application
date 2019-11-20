<!DOCTYPE html>
<html lang="en" class="animated fadeIn"> <!-- Reference: https://scotch.io/tutorials/level-up-your-websites-with-animatecss -->
<head>
	<meta charset="utf-8" />
	<meta name="description" content="Assignment 3" />
	<meta name="keywords" content="HTML,CSS, Js, PHP" />
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
		<li id="enhancements2"><a href="enhancements2.php">Enhancements Two</a></li> 
		<li><a href="phpenhancements.php">PHP Enhancements</a></li> 	
	</ul>
	</nav>
	<article>
	<h2>Enhancements Two</h2>
	<div class="tab-panels">
		<ul class="tabs">
			<li rel="panel1" class="active">jQuery</li>
            <li rel="panel2">Enhancement 1</li>
            <li rel="panel3">Enhancement 2</li>
			<li rel="panel4">Other Enhancements</li>
			<li rel="panel5">Reference</li>
        </ul>

    <section id="panel1" class="panel active">
		<h2>jQuery</h2>
		<h3>1. About jQuery</h3>
		<p>jQuery is a JavaScript library designed to simplify HTML DOM tree traversal and manipulation, as well as event handling, CSS animation, and Ajax. 
		It is free, open-source software using the permissive MIT License. Web analysis indicates that it is the most widely deployed JavaScript library by a large margin. 
		(from <a href="https://en.wikipedia.org/wiki/JQuery">Wikipedia</a>)</p>
		<p>In the second part of this assignment,  jQuery is used in almost all of the enhancements. The amount of work required is significantly less compared to using 
		JavaScript or CSS to make it manually (will be demonstrated in the next panels).</p>
		<h3>2. Example of jQuery being used</h3>
		<ol type="a">
			<li><a href="index.php#slider">Image slider</a></li>
			<li><a href="#panel1">Accordion</a></li>
			<li>Scroll to top/bottom button (Bottom right of each page).</li>
		</ol>
    </section>
	<section id="panel2" class="panel">
		<h2>Image Slider</h2>
		<h3>1. <a href="index.php#slider">Example of Image Slider</a></h3>
		<h3>2. About this slider</h3>
		<p>Image slider is a convenient way to display multiple images or videos on your website. Attractive images can quickly draw new visitors' attention. 
		I use image slider to capture the ideas of the whole website. Moreover, this is also used as a quick navigation for users to go directly to each specific 
		section of my website (such as my web page, job description page etc...). jQuery is used for this slider.
		</p>
		<h3>3. How I made this slider</h3>
		<p>
		Image slider actually consists of multiple images on one line. I need to increment the <em>margin-left</em> property 
		by the width of the page each time I want to view the next picture. Another important thing is to keep track of the last picture. 
		When the last picture is shown, I need to change the <em>margin-left</em> property back to 0 as well as picture count (<em>currentSlide</em> 
		in <em>enhancements.js</em>) to 1. By doing so, I can create a loop for image slider to slide infinitely. Furthermore. I added an event for 
		mouse hovering method. When the users hover on the image, the slide will stop until the cursor is moved out of the image.
		</p>
    </section>
    <section id="panel3" class="panel">
		<h2>Accordion</h2>
		<h3>1. <a href="#panel1">Example of accordion using jQuery</a></h3>
		<h3>2. About this accordion</h3>
		<p>
		Accordion is used again in this assignment using CSS only (see <a href="enhancements.hrml#enhancements_page">Accordion in Enhancements page</a> or 
		<a href="jobs.php#jobs_page">Accordion in Jobs page</a>), however in the second part of this assignment, accordion is made using jQuery. Compared to the 
		previous accordion, it is more simple and more smooth this time (with the help the slide up/slide down panel animation).
		</p>
		<h3>3. How I made this accordion</h3>
		<p>
		In order to make this accordion, the most important thing is to know which panel is being opened. First panel is set to be opened when this page is visted 
		with <em>class="panel active"</em>. If another panel is opened, the class for that panel becomes <em>class="panel active"</em> and the content inside is also opened, 
		while the closed panel turns into <em>class="panel"</em> and the content inside is hidden.
		</p>
	</section>
	<section id="panel4" class="panel">
        <h2>I. Scroll to top/botton button</h2>
		<h3>1. Example of scroll to top/botton button</h3>
		<p>Scroll to top/bottom button is located at fix position (bottom right) of each page.</p>
		<h3>2. About this button</h3>
		<p>
		This button is only visible when the window scroll bar is shown (this can't be shown in this assignment because the length of each page is longer than the height of the window).
		The text in this button depends on which direction the scroll bar is going. The users can use this button to either go to the top of the page or to the end of the page with some sliding animation.
		</p>
		<h3>3. How I made this button</h3>
		<p>
		By checking the position of the scroll bar after scrolling, I can identify the scrolling direction and therefore the text of this button. After figuring out the direction, 
		I only need to use <em>scrollTop</em> property to move the scroll bar to the position that I want.
		</p>
		<h2>II. File Handling</h2>
		<h3>1. <a href="apply.php#myImg">Example of file handling</a></h3>
		<h3>2. About file handling</h3>
		<p>
		File handling plays an important part in every program. For this assignment, I only include file handling for reading in image chosen from local device but not saving it (I haven't been able to do it yet). 
		This is done using jQuery.
		</p>
		<h2>III. Jump to error</h2>
		<h3>1. <a href="apply.php#apply_form">Example of jump to error on apply page</a></h3>
		<h3>2. About this error catching</h3>
		<p>
		Instead of letting window handle the form itself while submiting the form, I purposely handle all the errors myself beforehand in order to print the error message that I want. Additionally, this page can 
		bring the user to where they made a mistake and highlight it for them. This is done without using jQuery.
		</p>
    </section>
	<section id="panel5" class="panel">
		<h2>Reference</h2>
		<ol>
			<li><a href="https://code.jquery.com/jquery-3.4.0.js">jQuery resource</a></li>
			<li>I would like to acknowledge <a href="https://www.youtube.com/playlist?list=PLoYCgNOIyGABdI2V8I_SWo22tFpgh2s6_">Learncode.academy</a> for having such a good tutorial on jQuery.</li>
			<li><a href="http://jsfiddle.net/vacidesign/ja0tyj0f/">Upload and display image on screen</a></li>
			<li><a href="//http://jsfiddle.net/designaroni/sj3euzL7/">Detect scroll up or scroll down</a></li>
			<li><a href="http://jsfiddle.net/didierg/Kwhbv/">Scroll to specific position</a></li>
			<li><a href="//https://www.w3schools.com/jsref/jsref_split.asp">Split string</a></li>
			<li><a href="https://www.w3schools.com/js/js_date_methods.asp">Date</a></li>
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