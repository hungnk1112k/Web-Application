<?php
	require_once('settings.php');
	$conn = @mysqli_connect($host,
	$user,
	$pwd,
	$sql_db
	);
			
	$username=trim(htmlspecialchars($_POST['username']));
	$password=trim(htmlspecialchars($_POST['password']));
		
	//Checks if connection is successful
	if (!$conn) {
		//Displays an error message
		echo "<p>Database connetion failure</p>"; //not in production script
	} else {
		//Upon successful connection
		$sql_table="user";				
		// Set up the SQL command to query or add data into the table
		$query = "select * FROM $sql_table Where username='$username' and password='$password'";
		//Execute the query and store result into the result pointer
		$result = mysqli_query($conn, $query);
		
		//Checks if the execution was successful
		if(!$result) {
		} else {
			if(mysqli_num_rows($result)>0) {
				header("Location: manage.php");
			} else {
				header("Location: home.php");
			}
			mysqli_free_result($result);
		} // if successful query operation			
		// close the database connection
		mysqli_close($conn);
		}// if successful database connection
?>