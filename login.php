<?php
/*
* Author: Ayesha Shaikh 
* Target: manage.php 
* Purpose: Secure login option of user's with their username and password after registeration
* Created: 20-10-2020
* Last-updated: 24-10-2020
* Credits: Lectures on Echo360, lab instructions, lecture tasks/folders, http://www.allphptricks.com/simple-user-registration-login-script-in-php-and-mysqli/- Javed Rehman
*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="description" content="index" />
<meta name="keywords" content="css, intro, index, website, assignment, part1, Web Services" />
<meta name="author" content="Ayesha" />
<title> An introduction to Web Services- Login</title>
<link rel="stylesheet" href="styles/login.css" />
<link rel="stylesheet" href="styles/style.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
</head>
<body >
<div class="wrapper">
    <?php include_once "menu.inc"; ?>

    <div class="main_content">
	<?php include_once "header.inc"; ?>

<?php
	$host = "#####"; //local host or server name
	$user = "#####"; // your user name
	$pwd = "#####"; // your password 
	$sql_db = "######"; // your database
?>



<?php 
$err_msg="";
	$con = @mysqli_connect($host, $user, $pwd, $sql_db);

if(!$con) {
	echo "<p> Database connection failure</p>";
}
else{
	$query = "CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL UNIQUE,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL UNIQUE,
  `trn_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;";
$result = mysqli_query($con, $query);
	
	if(!$result) {
		echo "<p class=\"wrong\">Something is wrong with ", $query, "</p>";
		
	}
	//else if ($result && $err_msg==""){
		//echo "<p class=\"ok\"><br />The table has been created. </p>";
	//}
	
}?>



<?php
	
	session_start();
    // If form submitted, insert values into the database.
    if (isset($_POST['username'])){
		
		$username = stripslashes($_REQUEST['username']); // removes backslashes
		$username = mysqli_real_escape_string($con,$username); //escapes special characters in a string
		$password = stripslashes($_REQUEST['password']);
		$password = mysqli_real_escape_string($con,$password);
		
	//Checking is user existing in the database or not - compares the values entered
        $query = "SELECT * FROM `users` WHERE username='$username' and password='".md5($password)."'";
		$result = mysqli_query($con,$query);
		$rows = mysqli_num_rows($result);
        if($rows==1){
			$_SESSION['username'] = $username;
			header("Location: manage.php"); // Redirect user to the actual quiz supervisor queries page
            }else{
				echo "<div class='form'><h3>Username/password is incorrect.</h3><br/>Click here to <a href='login.php'>Login</a></div>";
				}
    }else{
?>

<div class="form"><br /><br />
<h1>Log In</h1><br />
<form method="post" name="login">
<label>Username: </label><br />
<input type="text" name="username" placeholder="Username" required="required" />
<label>Password: </label> <br />
<input type="password" name="password" placeholder="Password" required="required" />
<input name="submit" type="submit" value="Login" />
</form>
<p>New user? <a href='registration.php'>Register Here</a></p>
<br /><br />

</div>

<?php } ?>

<?php include_once "footer.inc"; ?>

	</div>
</div>


</body>
</html>
