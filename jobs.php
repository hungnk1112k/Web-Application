<!DOCTYPE html>
<html lang="en" class="animated fadeIn"> <!-- Reference: https://scotch.io/tutorials/level-up-your-websites-with-animatecss -->
<head>
	<meta charset="utf-8" />
	<meta name="description" content="Assignment 1" />
	<meta name="keywords" content="HTML,CSS" />
	<meta name="author" content="Khanh Hung Nguyen" />
	<link href="styles/style.css" rel="stylesheet"/>
	<link href="styles/animate.css" rel="stylesheet">
	<script src="scripts/jobs.js"></script>
	<script src="scripts/jquery-3.4.0.js"></script>  <!-- https://code.jquery.com/jquery-3.4.0.js -->
	<script src="scripts/enhancements.js"></script>  <!-- https://code.jquery.com/jquery-3.4.0.js -->
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
		<li id="jobs"><a class="menu" href="jobs.php">Job Description</a></li>
		<li><a href="apply.php">Job Application</a></li>
		<li><a href="about.php">About Me</a></li>
		<li><a href="enhancements.php">Enhancements</a></li> 
		<li><a href="enhancements2.php">Enhancements Two</a></li> 
		<li><a href="phpenhancements.php">PHP Enhancements</a></li> 		
	</ul>
	</nav>
<article>
	<h2 id="jobs_page">Position Description</h2>
	<p>For the position that we are recruiting, you are provided a 2-week trial with standard salary in the position that you are going for as long as you meet all the requirements listed.
	After two weeks, we will evaluate your work based on the results of the tasks you are given as well as feedbacks from co-workers who work with you.</p>
	<span><img id="job_image" src="images/Job.jpg" alt="Job"></span> <!-- Reference: https://www.whc2017.org/looking-new-job/ -->
	<ul class="container">
	  <li>
		<input type="checkbox" name="ac[]" id="part_1" />
		<label for="part_1">Systems Software Engineer</label> <!-- Reference: https://job-descriptions.careerplanner.com/Systems-Software-Developer.cfm -->
		<section class="content">
			<p><a id="job_1" href="apply.php">Apply</a></p>
			<h3>Basic Job Description</h3>
			<p>In order to become a Systems Software Engineer for us, you will be asked to research, design, develop and evaluate multilevel system softwares based on the needs of users. 
			This job will require you to know the principles and techniques of computer science, engineering and data analysis.</p>
			<h3>Position Reference Number</h3>
			<p>Our company’s position description reference number for Systems Software Engineer is SS101.<br/>
			Please use this number while applying for a position.</p>
			<h3>Job Duties</h3>
			<ul>
				<li>Helping users get used to the equipment based on their needs.</li>
				<li>Analyze information to create a plan on improving current systems.</li>
				<li>Modifying or fixing existing software to adapt it to the new hardware or to improve the performance.</li>
				<li>Design or develop software systems.</li>
				<li>Responsible for system security and data assurance.</li>
			</ul>
			<h3>Required qualifications, skills, knowledge and attributes</h3>
			<h4>Essential requirements</h4>
			<ul>
				<li>Must be able to speak English.
				<aside><p>For non-Australian citizenships, an English certificate <strong>might be</strong> required.</p></aside>
				</li>
				<li>Bachelor's degree in at least one of these or similar areas:
				<ul>
					<li>Computer Science</li>
					<li>Software Engineering</li>
					<li>Mathematics</li>
				</ul>
				</li>
				<li>Co-operation</li>
				<li>Critical Thinking</li>
				<li>Programming knowledge in either Python, JavaScript, C/C++, C#</li>
				<li>Active Learning</li>
			</ul>
			<h4>Preferable requirements</h4>
			<ol>
				<li>Master's degree</li>
				<li>At least 2 years of work experience</li>
				<li>Good at working in a team</li>
				<li>Good time management</li>
				<li>Know more than 1 language</li>
			</ol>
			<h3>Salary</h3>
			<p>The starting salary for software systems engineer ranges from $70,000 to $90,000 annually depending on your performance.</p>
		</section>
	  </li>
		<li>
		<input type="checkbox" name="ac[]" id="part_2" />
		<label for="part_2">Database Administrator</label> <!-- Reference: https://www.prospects.ac.uk/job-profiles/database-administrator -->
		<section class="content">
			<p><a id="job_2" href="apply.php">Apply</a></p>
			<h3>Basic Job Description</h3>
			<p>Your responsibility as a database administrator for us is keeping the database up and running securely 24/7.
			You will plan, develop and analyze the database, as well as dealing with any issues from the users.
			This job will require you to know the principles and techniques of computer science, engineering and high level of data analysis.</p>
			<h3>Position Reference Number</h3>
			<p>Our company’s position description reference number for Systems Software Engineer is DA703.<br/>
			Please use this number while applying for a position.</p>
			<h3>Job Duties</h3>
			<ul>
				<li>Analyze the data to figure out users' needs.</li>
				<li>Control access permission to all database.</li>
				<li>Ensure data integrity and security.</li>
				<li>Develop and test recovery plans in case of emergency.</li>
				<li>Manage the security and disaster recovery aspects of a database.</li>
			</ul>
			<h3>Required qualifications, skills, knowledge and attributes</h3>
			<h4>Essential requirements</h4>
			<ul>
				<li>Must be able to speak English
				<aside><p>For non-Australian citizenships, an English certificate <strong>might be</strong> required.</p></aside>
				</li>
				<li>Bachelor's degree in at least one of these or similar areas:
				<ul>
					<li>Computer Science</li>
					<li>Software Engineering</li>
					<li>Mathematics</li>
					<li>Data Analytics</li>
				</ul>
				</li>
				<li>Co-operation</li>
				<li>Critical Thinking</li>
				<li>Programming knowledge in either Python, JavaScript, C/C++, C#</li>
				<li>Active Learning</li>
			</ul>
			<h4>Preferable requirements</h4>
			<ol>
				<li>Master's degree in data analytics</li>
				<li>At least 2 years of work experience</li>
				<li>Good at working in a team</li>
				<li>Good time management</li>
				<li>Know more than 1 language</li>
			</ol>
			<h3>Salary</h3>
			<p>The starting salary for software systems engineer ranges from $80,000 to $100,000 annually depending on your performance.</p>
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