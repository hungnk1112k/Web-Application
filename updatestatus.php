<?php	
	if (!isset ($_POST["eoinumber"])) {
		header("Location: home.php");
	} else {
	
		$eoinumber = trim(htmlspecialchars($_POST["eoinumber"]));
		$newstatus = trim(htmlspecialchars($_POST["Status"]));

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
			$query = "update eoi set Status = '$newstatus' where EOInumber= '$eoinumber'";
			
			//Execute the query and store result into the result pointer
			$result = mysqli_query($conn, $query);
			
			//Checks if the execution was successful
			if(!$result) {
				echo "<p>Something is wrong with ", $query, "</p>";
				//Frees up the memory, after using the result pointer
				mysqli_free_result($result);
			} // if successful query operation
		
			// close the database connection
			mysqli_close($conn);
		}// if successful database connection
		header ("location: manage.php");
	}
?>