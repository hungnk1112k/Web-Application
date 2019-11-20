<!DOCTYPE html>
<html lang="en">
<head>
<title>Login Page</title>
<link rel="stylesheet" href="styles/home.css">
</head>
<body style="background-color:#bdc3c7">
	<div id="main-wrapper">
	<center><h2>Access to database</h2></center>
			<div class="imgcontainer">
				<img src="images/avatar.png" alt="Avatar" class="avatar">
			</div>
		<form action="home.php" method="post">
			<div class="inner_container">
				<label><strong>Username</strong></label>
				<input type="text" placeholder="Enter Username" name="username" required>
				<label><strong>Password</strong></label>
				<input type="password" placeholder="Enter Password" name="password" required>
				<button class="login_button" name="login" type="submit">Login</button>
			</div>
		</form>
		<?php
		session_start();
		require_once('settings.php');
		if(isset($_POST['login'])) {
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
					echo "<p>Something is wrong with ", $query, "</p>";
				} else {
					if(mysqli_num_rows($result)>0) {
						$_SESSION['login_user'] = $username;
						header("Location: manage.php");
					} else {
						echo '<script type="text/javascript">alert("Incorrect username or password. Please try again!")</script>';
					}
					mysqli_free_result($result);
				} // if successful query operation			
				// close the database connection
				mysqli_close($conn);
			}// if successful database connection
		}
		?>
	</div>
</body>
</html>