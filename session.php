<?php //https://www.tutorialspoint.com/php/php_mysql_login.htm
	session_start();
	require_once("settings.php"); //connection info	
	$conn = @mysqli_connect($host,
			$user,
			$pwd,
			$sql_db
			);
   
   $user_check = $_SESSION['login_user'];
   
   $query = mysqli_query($conn,"select username from user where username like '$user_check' ");
   
   $row = mysqli_fetch_array($query,MYSQLI_ASSOC);
   
   $login_session = $row['username'];
   
   if(!isset($_SESSION['login_user'])){
      header("location:home.php");
      die();
   }
?>