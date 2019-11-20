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
	</ul>
	</nav>
	<article>
	<?php
		function sanitise_input($data) {
			$data = trim($data); //Remove leading or trailing spaces
			$data = stripslashes($data); //Remove backlashes in front of the quotes
			$data = htmlspecialchars($data); //converts HTML control character like < to the HTML code &lt;
			return $data;
		}
		
		if (isset ($_POST["Given_Name"]) && isset ($_POST["Job_Reference_Number"])) {
			$givenname = sanitise_input($_POST["Given_Name"]);
			$jobnum = sanitise_input($_POST["Job_Reference_Number"]);
		} else {
			header ("location: apply.php");
		}
		
		if (isset ($_POST["Family_Name"])) {
			$familyname = sanitise_input($_POST["Family_Name"]);
		}
		
		if (isset ($_POST["Date"])) {
			$dob = sanitise_input($_POST["Date"]);
		}
		
		$gender = "";
		if (isset ($_POST["Gender"])) {
			$gender = sanitise_input($_POST["Gender"]);
		}
		
		if (isset ($_POST["Address"])) {
			$address = sanitise_input($_POST["Address"]);
		}
		
		if (isset ($_POST["Suburb/Town"])) {
			$suburb_town = sanitise_input($_POST["Suburb/Town"]);
		}
		
		if (isset ($_POST["State"])) {
			$state = sanitise_input($_POST["State"]);
		}
		
		if (isset ($_POST["Postcode"])) {
			$postcode = sanitise_input($_POST["Postcode"]);
		}
		
		if (isset ($_POST["Email"])) {
			$email = sanitise_input($_POST["Email"]);
		}
		
		if (isset ($_POST["Phone"])) {
			$phone = sanitise_input($_POST["Phone"]);
		}
		
		$skilllist = "";
		if (isset ($_POST["Skills"])) {
			$skills = $_POST["Skills"];
			foreach($skills as $skill)
				$skilllist = $skilllist . " " . "$skill,";
			$skilllist = rtrim($skilllist,',');
		}
		
		if (isset ($_POST["Other_Skill"])) {
			$other_skill = sanitise_input($_POST["Other_Skill"]);
		}
		
		$errMsg = "";
		if (strlen($jobnum) != 5) {
			$errMsg .= "<p>Job Reference Number must have exactly 5 alphanumeric characters</p>";
		}
		
		if (strlen($givenname) > 20) {
			$errMsg .= "<p>Given name must have maximum 20 alpha characters.</p>";
		} elseif ($givenname == "") {
			$errMsg .= "<p>Given name is empty.</p>";
		}
		
		if (strlen($familyname) > 20) {
			$errMsg .= "<p>Family name must have maximum 20 alpha characters.</p>";
		} elseif ($familyname == "") {
			$errMsg .= "<p>Family name is empty.</p>";
		}
		
		if (!isDate($dob)) {
			$errMsg .= '<p>Invalid date of birth</p>';
		} else {
			$dob_split = explode("/",$dob);
			$current_date_year = date("Y");
			$current_date_month = date("m");
			$current_date_day = date("d");
			if ($current_date_year - $dob_split[2] < 15 || $current_date_year - $dob_split[2] > 80) {		
				$errMsg .= "Age must be between 15 and 80!";		
			} else if ($current_date_year - $dob_split[2] == 15) {
				if ($current_date_month < $dob_split[1]) {			
					$errMsg .= "Age can't be smaller than 15!";		
				} else if ($current_date_month == $dob_split[1]) {
					if ($current_date_day < $dob_split[0]) {			
						$errMsg .= "Age can't be smaller than 15!";			
					}
				}
			} else if ($current_date_year - $dob_split[2] == 80) {
				if ($current_date_month > $dob_split[1]) {		
					$errMsg .= "Age can't be greater than 80!";		
				} else if ($current_date_month == $dob_split[1]) {
					if ($current_date_day >= $dob_split[0]) {		
						$errMsg .= "Age can't be greater than 80!";		
					}
				}
			}	
		}
		
		if ($gender == "") {
			$errMsg .= "Gender wasn't chosen!";
		}
		
		if (strlen($address) > 40) {
			$errMsg .= "<p>Street address must have maximum 40 characters.</p>";
		} elseif ($address == "") {
			$errMsg .= "<p>Street address is empty.</p>";
		}
		
		if (strlen($suburb_town) > 40) {
			$errMsg .= "<p>Suburb/Town must have maximum 40 characters.</p>";
		} elseif ($suburb_town == "") {
			$errMsg .= "<p>Suburb/Town is empty.</p>";
		}
		
		if (strlen($postcode) != 4) {
			$errMsg .= "Postcode must have exacly 4 digits";
		} else {
			switch($state) {
			case "VIC":
				if ($postcode[0] != "3") {
					if ($postcode[0] != "8") {
						$errMsg .= "<p>VIC state must have postcode starts with 3 or 8!</p>";
					}
				}
				break;
			case "NSW":
				if ($postcode[0] != "1") {
					if ($postcode[0] != "2") {
						$errMsg .= "<p>NSW state must have postcode starts with 1 or 2! </p>";
					}
				}
				break;
			case "QLD":
				if ($postcode[0] != "4") {
					if ($postcode[0] != "9") {
						$errMsg .= "<p>QLD state must have postcode starts with 4 or 9! </p>";
					}
				}
				break;
			case "NT":
			case "ACT":
				if ($postcode[0] != "0") {
					$errMsg .= "<p>NT and ACT state must have postcode starts with 0! </p>";
				}
				break;
			case "WA":
				if ($postcode[0] != "6") {
					$errMsg .= "<p>WA state must have postcode starts with 6! </p>";
				}
				break;
			case "SA":
				if ($postcode[0] != "5") {
					$errMsg .= "<p>SA state must have postcode starts with 5! </p>";
				}
				break;
			case "TAS":
				if ($postcode[0] != "7") {
					$errMsg .= "<p>TAS state must have postcode starts with 7! </p>";	
				}
				break;
			}
		}
		
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { //https://www.w3schools.com/php/php_form_url_email.asp
			$errMsg .= "<p>Invalid email format</p>"; 
		}
		
		if (!preg_match("/^[\d ]*$/",$phone) || strlen($phone) > 12 || strlen($phone) < 8) {
			$errMsg .= "<p>Phone number must be from 8 to 12 digits, can include spaces.</p>"; 
		}
		
		if (isset($_POST["Skills"]) && in_array("Other_Skill", $skills) && $other_skill == "") {
			$errMsg .= "<p>Other skill is empty.</p>"; 
		}
		
		if ($errMsg != "") {
			echo "<p>$errMsg</p>";
		} else {
			require_once("settings.php"); //connection info	
			
			$conn = @mysqli_connect($host,
				$user,
				$pwd,
				$sql_db
			);
			
			$adddata = false;
			while (!$adddata) {
				$sql_table="eoi";
				$query = "insert into $sql_table (Job_Reference_Number, Given_Name, Family_Name, Gender, DOB, Street, Suburb_Town, State, Postcode, Email,Phone, Skills, Other_Skill, Status) values ('$jobnum', '$givenname', '$familyname',
				'$gender', '$dob', '$address', '$suburb_town', '$state', '$postcode', '$email', '$phone', '$skilllist', '$other_skill', 'New' )";
				
				if (!$conn) {
					//Displays an error message
					echo "<p>Database connetion failure</p>"; //not in production script
				} else {
					//execute the query - we should really check to see if the database exists first.
					$result = mysqli_query($conn, $query);
					//Checks if the execution was successful
					if(!$result) {
						$query = "CREATE TABLE `eoi` (
						`EOInumber` int(11) NOT NULL,
						`Job_Reference_Number` varchar(5) NOT NULL,
						`Given_Name` varchar(20) NOT NULL,
						`Family_Name` varchar(20) NOT NULL,
						`Gender` varchar(10) NOT NULL,
						`DOB` varchar(10) NOT NULL,
						`Street` varchar(40) NOT NULL,
						`Suburb_Town` varchar(40) NOT NULL,
						`State` varchar(3) NOT NULL,
						`Postcode` int(4) NOT NULL,
						`Email` varchar(100) NOT NULL,
						`Phone` varchar(12) NOT NULL,
						`Skills` varchar(100) NOT NULL,
						`Other_Skill` varchar(100) NOT NULL,
						`Status` varchar(7) NOT NULL
						)";
						$result = mysqli_query($conn, $query);
					} else {
						$adddata = true;
						//display an operation successful message
						$eoi_id = mysqli_insert_id($conn);
						echo "<h2>Successfully added new EOI record number $eoi_id</h2>";
					} // if successful query operation
					
					//close the database connection
					mysqli_close($conn);
				} //if successful database connection
			}
		}
		
		function isDate($string) { //https://stackoverflow.com/questions/31871199/php-dd-mm-yyyy-validation
			$matches = array();
			$pattern = '/^([0-9]{2})\\/([0-9]{2})\\/([0-9]{4})$/';
			if (!preg_match($pattern, $string, $matches)) return false;
			if (!checkdate($matches[2], $matches[1], $matches[3])) return false;
			return true;
		}
	?>
		<fieldset>
			<legend>Your Information</legend>
			<p><strong>Job Reference Number:</strong> <?php echo "$jobnum";?></p>
			<p><strong>Name:</strong> <?php echo "$givenname $familyname";?></p>
			<p><strong>Date Of Birth:</strong> <?php echo "$dob";?></p>
			<p><strong>Gender:</strong> <?php echo "$gender";?></p>
			<p><strong>Address:</strong> <?php echo "$address $suburb_town $state $postcode";?></p>
			<p><strong>Email:</strong> <?php echo "$email";?> </p>
			<p><strong>Phone Number:</strong> <?php echo "$phone";?></p>
			<p><strong>Requirements:</strong> <?php echo "$skilllist";?></p>
			<p><strong>Other skill:</strong> <?php echo "$other_skill";?></p>
		</fieldset>
		<a href="apply.php"><button type="button" id="back">Back</button></a>
	</article>
	<hr />
	<?php
		include('footer.inc');
	?>
</body>
</html>