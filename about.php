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
	?>
	<button id="scroll"></button>
	<nav>
	<ul>
		<li><a href="index.php">Home</a></li>
		<li><a href="jobs.php">Job Description</a></li>
		<li><a href="apply.php">Job Application</a></li>
		<li id="about"><a href="about.php">About Me</a></li>
		<li><a href="enhancements.php">Enhancements</a></li> 
		<li><a href="enhancements2.php">Enhancements Two</a></li>
		<li><a href="phpenhancements.php">PHP Enhancements</a></li>
	</ul>
	</nav>
	<article>
	<h2>About me</h2>
	<figure>
	<img id="myphoto" src="images/myphoto.jpg" alt="My Photo" width="200" height="200"/>	
	</figure>
	<dl>
	<dt>Full Name</dt>
		<dd>Khanh Hung Nguyen</dd>
	<dt>Age</dt>
		<dd>18</dd>
	<dt>Gender</dt>
		<dd>Male</dd>
	<dt>Student Number</dt>
		<dd>102414836</dd>
	<dt>Tutor's name</dt>
		<dd>Jabed Chowdhury</dd>
	<dt>Courses studying</dt>
		<dd>Bachelor of Computer Science (Professional)</dd>
	<dt>Subjects</dt>
		<dd><ul>
				<li class="first"><strong>COS10003</strong>: Computer & Logic Essentials</li>
				<li><strong>COS10009</strong>: Introduction to Programming</li>
				<li><strong>COS10011</strong>: Creating Web Applications</li>
				<li><strong>TNE10006/TNE60006</strong>: Networks and Switching</li>
		</ul></dd>
	<dt>Favorite desserts</dt>
		<dd><ol type="1">
			<!-- Google image of my favorite dessert!-->
			<li class="first"><a href="https://www.google.com/search?q=ch%C3%A8&source=lnms&tbm=isch&sa=X&ved=0ahUKEwiA_47o9KThAhUKVH0KHcdkAWQQ_AUIDigB&biw=1366&bih=625">Chè</a></li>
			<li>Ice Cream
				<ul>
					<li>Peppermint Ice Cream</li>
					<li>Strawberry Ice Cream</li>
					<li>Butterscotch Ice Cream</li>
				</ul>
			</li>
			<li>Milk Tea</li>
		</ol></dd>
	</dl> 
	<table>		
		<thead>
			<tr>
				<th>&nbsp;</th>
				<th>Monday</th>
				<th>Tuesday</th>
				<th>Wednesday</th>
				<th>Thursday</th>
				<th>Friday</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>8:30 - 9:30</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td class="COS10011" rowspan="2"><strong>COS10011</strong><br/><em>Lecture</em> 1(2)<br/>Hawthorn EN413</td>
				<td class="COS10011" rowspan="2"><strong>COS10011</strong><br/><em>Lab</em> 1(4)<br/>Hawthorn BA407</td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td>9:30 - 10:30</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td class="TNE10006" rowspan="2"><strong>TNE10006</strong><br/><em>Lecture</em> 1(1)<br/>Hawthorn ATC101</td>
			</tr>
			<tr>
				<td>10:30 - 11:30</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td>11:30 - 12:30</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td>12:30 - 13:30</td>
				<td>&nbsp;</td>
				<td class="COS10009" rowspan="2"><strong>COS10009</strong><br/><em>Lecture</em> 1(1)<br/>Hawthorn ATC101</td>
				<td class="COS10003" rowspan="2"><strong>COS10003</strong><br/><em>Lecture</em> 1(1)<br/>Hawthorn ATC101</td>
				<td class="COS10009" rowspan="2"><strong>COS10009</strong><br/><em>Lab</em> 1(19)<br/>Hawthorn ATC625</td>
				<td class="COS10003" rowspan="2"><strong>COS10003</strong><br/><em>Tutorial</em> 1(17)<br/>Hawthorn BA704</td>
			</tr>
			<tr>
				<td>13:30 - 14:30</td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td>14:30 - 15:30</td>
				<td class="TNE10006" rowspan="3"><strong>TNE10006</strong><br/><em>Practical</em> 1(7)<br/>Hawthorn ATC328</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td>15:30 - 16:30</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td>16:30 - 17:30</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			</tr>
		</tbody>	
	</table>
	</article>
	<hr />
	<?php
		include('footer.inc');
	?>
</body>
</html>