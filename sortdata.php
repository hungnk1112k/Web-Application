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
	<h2>EOI database - Sort by field</h2>
<?php	
	if (!isset ($_POST["Field_Sort"]) or !isset ($_POST["Order"])) {
		header("Location: home.php");
	} else {
		$fieldsort = trim(htmlspecialchars($_POST["Field_Sort"]));
		$order = trim(htmlspecialchars($_POST["Order"]));
		echo "<p style='font-size: 120%'>$fieldsort field is sorted in $order order!";

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
			$query = " select * from $sql_table order by $fieldsort $order";
			
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
						."<th scope=\"col\">Skills</th>\n "
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
	}
?>
	<p><a href="manage.php"><button type="button" id="back">Back</button></a></p>
	<h2><a href = "logout.php">Sign Out</a></h2>
</body>
</html>