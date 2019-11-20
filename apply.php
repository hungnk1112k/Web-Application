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
	<script src="scripts/apply.js"></script>
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
		<li id="apply"><a href="apply.php">Job Application</a></li>
		<li><a href="about.php">About Me</a></li>
		<li><a href="enhancements.php">Enhancements</a></li>
		<li><a href="enhancements2.php">Enhancements Two</a></li>
		<li><a href="phpenhancements.php">PHP Enhancements</a></li> 	
	</ul>
	</nav>
	<article>
	<h2>Job Application Form</h2>
	<p>Please fill in this form below if you want to apply for a position in our company!</p>
	<form id="apply_form" method="post" action="processEOI.php" novalidate="novalidate" >
		<p>
		<label>Job Reference Number: <strong id="Job_Reference_Number_Fill"></strong></label>
		<input type="hidden" name="Job_Reference_Number" id="Job_Reference_Number"/>
		</p>
		<span id="Job_Num_None"></span>
		<fieldset>
			<legend>Personal Information</legend>
			<p>
			<label for="Given_Name">Given Name</label>
			<input type="text" name="Given_Name" id="Given_Name" pattern="^[a-zA-Z ]+$"  required="required"/>
			&emsp;
			<label for="Family_Name">Family Name</label>
			<input type="text" name="Family_Name" id="Family_Name" pattern="^[a-zA-Z ]+$"  required="required"/>
			</p>
			<p><span id="Name_Wrong"></span></p>
			<label for="Date">Date Of Birth <input type="text" name= "Date" id="Date" maxlength="10" size="10" placeholder="dd/mm/yyyy" pattern="(0[1-9]|[12][0-9]|3[01])/(0?[1-9]|1[012])/(19[0-9][0-9]|20[0-1][0-9])" required="required"/></label>
			&emsp;
			<span id="DOB_wrong"></span>
		</fieldset>
		<fieldset id="Gender">
			<legend>Gender</legend>
			<input type="radio" name="Gender" id="Male" value="Male" required><label for="Male">Male</label>
			<input type="radio" name="Gender" id="Female" value="Female"><label for="Female">Female</label>
			<input type="radio" name="Gender" id="No_Answer" value="No Answer"><label for="No_Answer">Prefer Not to Answer!</label>
			<span id="Gender_Wrong"></span>
		</fieldset>
		<fieldset>
			<legend>Address</legend>
			<p>
			<label for="Address">Street Address</label>
			<input type="text" name="Address" id="Address" pattern="^[a-zA-Z\d ]+$" maxlength="40" required="required"/>
			&emsp;
			<label for="Suburb/Town">Suburb/Town</label>
			<input type="text" name="Suburb/Town" id="Suburb/Town" pattern="^[a-zA-Z\d ]+$" maxlength="40" required="required"/>
			</p>
			<p><span id="Street"></span></p>
			<p><label for="State">State</label>
			<select name="State" id="State">
			<option id="VIC" value="VIC" selected="selected">VIC</option>
			<option id="NSW" value="NSW">NSW</option>
			<option id="QLD" value="QLD">QLD</option>
			<option id="NT" value="NT">NT</option>
			<option id="WA" value="WA">WA</option>
			<option id="SA" value="SA">SA</option>
			<option id="TAS" value="TAS">TAS</option>
			<option id="ACT" value="ACT">ACT</option>
			</select>
			&emsp;
			<label for="Postcode">Postcode</label>
			<input type="text" name="Postcode" id="Postcode" maxlength="4" pattern="^[\d]{4}" required="required"/>
			</p>
			<p><span id="postcode_wrong"></span></p>
		</fieldset>
		<fieldset>
			<legend>Contact Detail</legend>
			<p>
			<label for="Email">Email</label>
			<input type="email" name="Email" id="Email" size="27" placeholder="name@domain.com" required="required" />
			&emsp;
			</p>
			<p><span id="Email_Wrong"></span></p>
			<p>
			<label for="Phone">Phone Number</label>
			<input type="text" name="Phone" id="Phone" maxlength="12" pattern="[\d ]{8,12}" required="required"/>
			</p>
			<p><span id="Phone_Wrong"></span></p>
		</fieldset>
		<fieldset>
			<legend>Requirements</legend>
			<p>Please tick the boxes below for your requirement list.</p>
			<ul>
				<li><input id="English" type="checkbox" name="Skills[]" value="English skill" checked="checked" /><label>Can speak English fluently.</label></li>
				<li><input id="Bachelor_Degree" type="checkbox" name="Skills[]" value="Bachelor degree" /><label>Bachelor's degree in Computer Science, Software Engineering, Mathematics or similar areas.</label></li>
				<li><input id="Programming" type="checkbox" name="Skills[]" value="Programming knowledge" /><label>Programming knowledge in either Python, JavaScript, C/C++, C#.</label></li>
				<li><input id="Work_Experience" type="checkbox" name="Skills[]" value="At least 2 years of work experience" /><label>Have at least 2 years of work experience.</label></li>
				<li><input id="Languages" type="checkbox" name="Skills[]" value="Know more than 1 language" /><label>Know more than 1 language</label></li>
				<li><input id="Other" type="checkbox" name="Skills[]" value="Other Skills"/><label>Other skills</label></li>
			</ul>
			<label>Other Skills:<br/>
			<input type="text" name ="Other_Skill" id="Other_Skill" size="70" placeholder="Please type your other skills!"/>
			</label>
			<p><span id="other_skill_wrong"></span></p>
		</fieldset>
		<fieldset>
		<legend>Your photo</legend>
			<input type='file' /><br/>
			<img id="myImg" height="200" src="#" alt="Please upload your image!" />
		</fieldset>
		<input id="button" class="button" type="submit" value="Apply" />
		<input class="button" type="reset" value="Reset form" />
	</form>
	</article>
	<hr />
	<?php
		include('footer.inc');
	?>
</body>
</html>