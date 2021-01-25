<?php
/*

* Author: Ayesha Shaikh 103165863
* Target: login.php 
* Purpose: registeration for first time user's for secure and accountable access
* Created: 20-10-2020
* Last-updated: 24-10-2020
* Reference Website: http://www.allphptricks.com/
* Credit: Javed Ur Rehman
*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="description" content="index" />
<meta name="keywords" content="php, database, mysql, registration_form, website, assignment, part3, Web Services" />
<meta name="author" content="Ayesha" />
<title> An introduction to Web Services- Register</title>
<link rel="stylesheet" href="styles/login.css" />
<link rel="stylesheet" href="styles/style.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
</head>
<body>
<div class="wrapper">
    <?php include_once "menu.inc"; ?>

    <div class="main_content">
<?php include_once "header.inc"; ?>

	<?php
	$host = "####"; //local host or server name
	$user = "#####"; // your user name
	$pwd = "######"; // your password 
	$sql_db = "######"; // your database
?>


<?php 
	$con = @mysqli_connect($host, $user, $pwd, $sql_db);

if(!$con) {
	echo "<p> Database connection failure</p>";
}
else{
	
	
	

    // If form submitted, insert values into the database.
    if (isset($_REQUEST['username'])){
		$username = stripslashes($_REQUEST['username']); // removes backslashes
		$username = mysqli_real_escape_string($con,$username); //escapes special characters in a string
		$email = stripslashes($_REQUEST['email']);
		$email = mysqli_real_escape_string($con,$email);
		$password = stripslashes($_REQUEST['password']);
		$password = mysqli_real_escape_string($con,$password);

		$trn_date = date("Y-m-d H:i:s");
        $query = "INSERT into `users` (username, password, email, trn_date) VALUES ('$username', '".md5($password)."', '$email', '$trn_date')";
        $result = mysqli_query($con,$query);
        if($result){
            echo "<div class='form'><h3>You are registered successfully.</h3><br/>Click here to <a href='login.php'>Login</a></div>";
        }
    }else{
?>
<div class="form">
<br />
<h1>Registration</h1><br />
<form name="registration" method="post" novalidate="novalidate">
<label>Username: </label>
<input type="text" name="username" placeholder="Username" required="required" />
<label>Email: </label>
<input type="email" name="email" placeholder="Email" required="required" />
<label>Password: </label>
<input type="password" name="password" placeholder="Password" required="required" />
<input type="submit" name="submit" value="Register" />
</form>
<br /><br />
</div>
<?php } } ?>
<?php include_once "footer.inc"; ?>
	</div>
 
</div>

</body>
</html>


