<?php
	include('session.php');
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="description" content="Assignment 3" />
	<meta name="keywords" content="HTML,CSS" />
	<meta name="author" content="Khanh Hung Nguyen" />
	<link rel="stylesheet" href="styles/manage.css">
	<title>Hung Tech</title>
</head>
<body>
	<h1>Welcome <?php echo $login_session; ?></h1> 
	<h2>EOI database</h2>
<?php
	require_once("settings.php"); //connection info	
	
	$conn = @mysqli_connect($host,
		$user,
		$pwd,
		$sql_db
	);
	//Checks if connection is successful
	if (!$conn) {
		//Displays an error message
		echo "<p>Database connetion failure</p>"; //not in production script
	} else {
		//Upon successful connection
		$sql_table="eoi";
		
		// Set up the SQL command to query or add data into the table
		$query = "select * FROM eoi ORDER BY EOInumber, Job_Reference_Number, Given_Name";
		
		//Execute the query and store result into the result pointer
		$result = mysqli_query($conn, $query);
		
		//Checks if the execution was successful
		if(!$result) {
			echo "<p>Something is wrong with ", $query, "</p>";
		} else {
			if(mysqli_num_rows($result)>0) {
				echo "<table border=\"1\">\n";
				echo "<tr> \n"
					."<th scope=\"col\">EOI</th>\n "
					."<th scope=\"col\">Job</th>\n "
					."<th scope=\"col\">Name</th>\n "
					."<th scope=\"col\">Gender</th>\n "
					."<th scope=\"col\">DOB</th>\n "
					."<th scope=\"col\">Address</th>\n "
					."<th scope=\"col\">Email</th>\n "
					."<th scope=\"col\">Phone</th>\n "
					."<th scope=\"col\">Skill list</th>\n "
					."<th scope=\"col\">Other Skill</th>\n "
					."<th scope=\"col\">Status</th>\n "
					."<tr>\n ";
					
				// retrieve current record pointed by the result pointer
				
				while ($row = mysqli_fetch_assoc($result)) {
					echo "<tr>\n";
					echo "<td>", $row["EOInumber"], "</td>\n ";
					echo "<td>", $row["Job_Reference_Number"], "</td>\n ";
					echo "<td>", $row["Given_Name"], " ", $row["Family_Name"], "</td>\n ";
					echo "<td>", $row["Gender"], "</td>\n ";
					echo "<td>", $row["DOB"], "</td>\n ";
					echo "<td>", $row["Street"], " ", $row["Suburb_Town"]," ", $row["State"]," ", $row["Postcode"] , "</td>\n ";
					echo "<td>", $row["Email"], "</td>\n ";
					echo "<td>", $row["Phone"], "</td>\n ";
					echo "<td>", $row["Skills"], "</td>\n ";
					echo "<td>", $row["Other_Skill"], "</td>\n ";
					echo "<td>", $row["Status"], "</td>\n ";
					echo "</tr>\n ";
				}
			echo "</table>\n ";
			} else {
				echo "<p style='font-size: 120%'>Database is empty!</p>";
			}
		//Frees up the memory, after using the result pointer
		mysqli_free_result($result);
		} // if successful query operation
	
		// close the database connection
		mysqli_close($conn);
	}// if successful database connection
?>
	<form method="post" action="showbyjobnum.php">
		<p><label for="Job_Reference_Number">Search by Job Reference Number: </label>
		<input type="text" name="Job_Reference_Number" id="Job_Reference_Number" required="required"/>
		<input type="submit" value="Search" /></p>
	</form>
	<form method="post" action="showapplicant.php">
		<p><label>Search for applicant: <br/></label>
		<label for="givenname">First name: </label><input type="text" name="givenname" id="givenname" /><br/>
		<label for="familyname">Last name: </label><input type="text" name="familyname" id="familyname" /><br/>
		<input type="submit" value="Search" /></p>
	</form>
	<form method="post" action="deletebyjobnum.php">
		<p><label for="deletejobnum">Delete all records by Job Reference Number: </label>
		<input type="text" name="deletejobnum" id="deletejobnum" required="required"/>
		<input id="delete" type="submit" value="Delete" /></p>
	</form>
	<form method="post" action="updatestatus.php">
		<p><label for="eoinumber">Update status for EOI number:
		<input type="text" name="eoinumber" id="eoinumber" required="required"/>
		to</label>
		<select name="Status" id="Status">
			<option id="New" value="New" selected="selected">New</option>
			<option id="Current" value="Current">Current</option>
			<option id="Final" value="Final">Final</option>
		</select>
		<input id="update" type="submit" value="Update" /></p>
	</form>
	<form method="post" action="sortdata.php">
		<p><label for="Field_Sort">Sort data by field:
		<select name="Field_Sort" id="Field_Sort">
			<option id="EOI" value="EOInumber" selected="selected">EOI</option>
			<option id="Jobnum" value="Job_Reference_Number">Job Reference Number</option>
			<option id="Givenname" value="Given_Name">Given Name</option>
			<option id="Familyname" value="Family_Name">Family Name</option>
			<option id="Gender" value="Gender">Gender</option>
			<option id="DOB" value="DOB">DOB/option>
			<option id="Address" value="Street">Address</option>
			<option id="Email" value="Email">Email</option>
			<option id="Phone" value="Phone">Phone</option>
			<option id="Skills" value="Skills">Skill list</option>
			<option id="Other_Skill" value="Other_Skill">Other Skill</option>
			<option id="Status" value="Status">Status</option>
		</select></label>
		<label for="Order">by order:
		<select name="Order" id="Order">
			<option id="ASC" value="ASC" selected="selected">Ascender</option>
			<option id="DESC" value="DESC">Descender</option>
		</select></label>
		<input id="sort" type="submit" value="Sort" /></p>
	</form>
	<script>
	document.getElementById("delete").onclick = confirmation;
	document.getElementById("update").onclick = confirmation;
	function confirmation() {
		var respond = confirm("Are you sure?");
		if (respond == true) {
			result = true;
		} else {
			result = false;
		}
		return result;
	}
	</script>
	<h2><a href = "logout.php">Sign Out</a></h2>
</body>
</html>