<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="description" content="index" />
<meta name="keywords" content="css, intro, index, website, assignment, part1, Web Services" />
<meta name="author" content="Ayesha" />
<title> An introduction to Web Services</title>
  <!--linking of external javascript file to transfer data using local client-side storage from quiz.html page-->
<!--script src="scripts/quiz.js"></script>
	<linking of external css file for general styling of the website's webpage-->
<link rel="stylesheet" href="styles/style.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

</head>

<?php
/*
* Author: Ayesha Shaikh 103165863
* Purpose: Display all the query options and field setting criteria for selection and retrieving data from the quiz attempts table
* Access: After login and check from the 'user' table in database to access this page under the 'Quiz supervisor' navigation menu's tab
* Created: 20-10-2020
* Last-updated: 24-10-2020
* Credits: Lectures on Echo360, lab instructions, lecture tasks/folders,
*/
?>


<?php
session_start();
if(!isset($_SESSION["username"])){
header("Location: login.php");
exit(); }
?>

<body id="Results">
<article class="wrapper">
<?php include_once "menu.inc"; ?>


 <div class="main_content">
 <?php include_once "header.inc"; ?>
 
 <article id="definition"><h2 id="welcome">Quiz Results</h2> 
		<br /> <br /> <br />
		
 <p>Welcome <?php echo $_SESSION['username']; ?>!</p>
 <h2>Here are the query options for on the quiz attempts on Web Services!</h2>
 
 <a href="logout.php">Logout</a>
 
<br /><br />

	
	<form id="queries" method="post" action="queries.php" novalidate="novalidate">
	
			<fieldset><legend>Select Query</legend>
			<label for="query1"><span class="qno">   Select the query you want to launch and request from the attempts table of the quiz records from the database-</span></label><br />
		<input type="Radio" name="qq" value="1" id="query1" />1. List all the attempts <br />
		<INPUT type="Radio" name="qq" value="2" id="query2" required="required" />2.  List all the attempts for this particular student as entered below<br />
		<INPUT type="Radio" name="qq" value="3" id="query3" required="required" />3. List all the students who got 100% in their first attempt<br />
		<INPUT type="Radio" name="qq" value="4" id="query4" required="required" />4. List all the students who got less than 50% on their third attempt<br />
		<INPUT type="Radio" name="qq" value="5" id="query5" required="required" />5. Delete all the attempts for this particular student<br />
		<INPUT type="Radio" name="qq" value="6" id="query6" required="required" />6. Change the score for a quiz attempt of this student ID<br />

			</fieldset>
			
			<fieldset><legend>Request for record information</legend>
		<p class='row'>	<label for='studentID'>Student ID: </label>
			<input type='text' name='studentID' id='studentID' /></p>
			
		<p class='row'>	<label for='fname'>Student first name: </label>
			<input type='text' name='fname' id='fname' /></p>
		<p class='row'>	<label for='score'>Student's score:  </label>
			<input type='text' name='score' id='score' /></p>
			<br />
			<p class='row'>	<label for='attempt'>Quiz Attempt Number to change score of for query 6: </label>
			<input type='text' name='attempt' id='attempt' /></p>
		
			</fieldset>
			
			<fieldset id="sort">
			<legend>Sorting order</legend>
			<label> Please select the field you want to sort the resultant records by-</label><br />
			<input type="Radio" name="order" value="Attempt_ID" id="Attempt_ID" />Attempt ID number 
		<INPUT type="Radio" name="order" value="Date" id="Date" required="required" />Date
		<INPUT type="Radio" name="order" value="Time" id="Time" required="required" />Time
		<INPUT type="Radio" name="order" value="Student_ID" id="Student_ID" required="required" />Student ID
		<INPUT type="Radio" name="order" value="First_Name" id="First_Name" required="required" />First Name
		<input type="Radio" name="order" value="Last_Name" id="Last_Name" />Last Name
		<INPUT type="Radio" name="order" value="Number_of_the_Attempt" id="Number_of_the_Attempt" required="required" />Attempt number
		<INPUT type="Radio" name="order" value="Score_of_the_Attempt" id="Score_of_the_Attempt" required="required" />Score
			
		<br /><br />
			
		<p>	<input type="submit" value="Search attempts table" /></p>
	</fieldset>
	</form>
	

	
<?php include_once "footer.inc"; ?>

</article>
	</div>
	</article>

</body>
</html>