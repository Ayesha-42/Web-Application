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

<body id="Results">

<article class="wrapper">
<?php include_once "menu.inc"; ?>

 <div class="main_content">
 <?php include_once "header.inc"; ?>
 
 <article id="definition"><h2 id="welcome">Quiz Results</h2> 
		<br /> <br /> <br />
 
 <h2>Here are the results on the quiz on Web Services!</h2>
 


<?php
/*
* Author: Ayesha Shaikh 103165863
* Target: manage.php 
* Purpose: Runs the queries selected under the 'Quiz supervisor' manage.php page adn displays the results
			displays the missing or incorrect data entry if the query requires it
* Created: 20-10-2020
* Last-updated: 25-10-2020
* Credits: Lectures on Echo360, lab instructions, lecture tasks/folders,
*/
?>


<?php
	$host = "feenix-mariadb.swin.edu.au"; //local host or server name
	$user = "s103165863"; // your user name
	$pwd = "number42"; // your password 
	$sql_db = "s103165863_db"; // your database
?>

<?php function sanitise_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
} ?>

<?php 
	$conn = @mysqli_connect($host, $user, $pwd, $sql_db);
$err_msg="";
if(!$conn) {
	echo "<p> Database connection failure</p>";
}
else{

	//default order of display in case the user does not choose an option for sorting
	$order="Attempt_ID";
	
	//gets the sorting field selected by user
	if (isset ($_POST["order"])) 
	{$order= $_POST["order"];
	$order=sanitise_input($_POST["order"]);}
	
	//gets the query selected by user
	if (isset ($_POST["qq"])) 
	{$qq= $_POST["qq"];
	$qq=sanitise_input($_POST["qq"]);
	
	//if 1st query- list all attempts from the quiz attempt table
	if($qq=="1"){
		$query= "Select * from attempts order by $order";
		
		$result = mysqli_query($conn, $query);
	
	if(!$result) {
	echo "<p class=\"wrong\">Something is wrong with ", $query, "</p>";
		
	}
	else{
	echo "<p class=\"ok\">Your query has been processed here are the results. </p>";
		echo "<table id =\"display\"> \n";
		echo "<tr> \n " . "<th scope=\"col\">Attempt_ID</th>\n" . "<th scope=\"col\">Student_ID</th>\n" . "<th scope=\"col\">First_Name</th>\n" . "<th scope=\"col\">Last_Name</th>\n" . "<th scope=\"col\">Date</th>\n" . "<th scope=\"col\">Time</th>\n" . "<th scope=\"col\">Attempt Number</th>\n" . "<th scope=\"col\">Scores</th>\n". "</tr> \n";
	//tabular display of results
while ($row = mysqli_fetch_assoc($result)){
echo "<tr>\n";
echo "<td>" , $row["Attempt_ID"] , "</td>\n";
echo "<td>" , $row["Student_ID"] , "</td>\n";
	echo "<td>" , $row["First_Name"] , "</td>\n";
	echo "<td>" , $row["Last_Name"] , "</td>\n";
	echo "<td>" , $row["Date"] , "</td>\n";
	echo "<td>" , $row["Time"] , "</td>\n";
	echo "<td>" , $row["Number_of_the_Attempt"] , "</td>\n";
		echo "<td>" , $row["Score_of_the_Attempt"] , "</td>\n";

echo "</tr>\n";}

echo " </table>\n";
	}
	mysqli_free_result($result);
		
	}
		
		}
		
		//2nd query option selected- list all attempts for a student  given their id or name
			if (isset ($_POST["qq"])) 
	{$qq= $_POST["qq"];
	$qq=sanitise_input($_POST["qq"]);
	if($qq=="2"){
		
		
		if (isset($_POST["fname"])) {
		$fname = $_POST["fname"];}
		if (isset($_POST["studentID"])) {
		$stdID = $_POST["studentID"];}
		
		if ((trim($fname)=="")&&(trim($stdID)=="")){
		$err_msg .="Please enter either the first name or the student ID for this query to execute";}
		else{
	
	
		
		
	 //needs name to filter query
	 if(!empty($fname)){
		$fname=sanitise_input($fname);
		if (!preg_match("/^[a-zA-Z -]{2,20}$/",$fname)){
			$err_msg .= "<p>Only letters, hyphens and spaces are allowed in first name upto 20 characters.</p>";
	}
	 }
	 
	 
		//or needs student ID to filter query
		
		$stdID=sanitise_input($stdID);
		if(!empty($std_ID)){
		if (is_numeric($stdID)){
		
		if((strlen((string)$stdID)==7) || (strlen((string)$stdID)==10)){ 
		//acceptable
		}
		else{
		$err_msg .="<p>The student ID has to be 7 or 10 digits. </p>";}}
		else{
	$err_msg .= "<p>Please enter digits as your student number.</p>";}
		}}



		$query="Select * from attempts where Student_ID='$stdID' or First_Name='$fname' order by $order";

		
		$result = mysqli_query($conn, $query);
	
	if(!$result) {
	echo "<p class=\"wrong\">Something is wrong with ", $query, "</p>";
		
	}
	else{
	echo "<p class=\"ok\">Your query has been processed here are the results. </p>";
		echo "<table id =\"display\"> \n";
		echo "<tr> \n " . "<th scope=\"col\">Attempt_ID</th>\n" . "<th scope=\"col\">Student_ID</th>\n" . "<th scope=\"col\">First_Name</th>\n" . "<th scope=\"col\">Last_Name</th>\n" . "<th scope=\"col\">Date</th>\n" . "<th scope=\"col\">Time</th>\n" . "<th scope=\"col\">Attempt Number</th>\n" . "<th scope=\"col\">Scores</th>\n". "</tr> \n";
	
while ($row = mysqli_fetch_assoc($result)){
echo "<tr>\n";
echo "<td>" , $row["Attempt_ID"] , "</td>\n";
echo "<td>" , $row["Student_ID"] , "</td>\n";
	echo "<td>" , $row["First_Name"] , "</td>\n";
	echo "<td>" , $row["Last_Name"] , "</td>\n";
	echo "<td>" , $row["Date"] , "</td>\n";
	echo "<td>" , $row["Time"] , "</td>\n";
	echo "<td>" , $row["Number_of_the_Attempt"] , "</td>\n";
		echo "<td>" , $row["Score_of_the_Attempt"] , "</td>\n";

echo "</tr>\n";}

echo " </table>\n";
	
	mysqli_free_result($result);}
		
	}
		
		}
	
	
	//query 3- list all students' id, first and last name who got 100% in their first attempt
				if (isset ($_POST["qq"])) 
	{$qq= $_POST["qq"];
	$qq=sanitise_input($_POST["qq"]);
	
	if($qq=="3"){
		
		$query= "Select Student_ID, First_Name, Last_Name from attempts where Score_of_the_Attempt='15' and Number_of_the_Attempt='1' order by $order";

		$result = mysqli_query($conn, $query);
	
	if(!$result) {
	echo "<p class=\"wrong\">There is no record that matches that search query </p>";
		
	}
	else{
		//if(!(($row = mysqli_fetch_assoc($result))=="")){
	echo "<p class=\"ok\">Your query has been processed here are the results. </p>";
	echo "<p class=\"caption\"> These students have got 100% on their first attempt</p>";
		echo "<table id =\"display\"> \n";
		echo "<tr> \n " . "<th scope=\"col\">Student_ID</th>\n" . "<th scope=\"col\">First_Name</th>\n" . "<th scope=\"col\">Last_Name</th>\n" . "</tr> \n";
	
while ($row = mysqli_fetch_assoc($result)){
echo "<tr>\n";
echo "<td>" , $row["Student_ID"] , "</td>\n";
	echo "<td>" , $row["First_Name"] , "</td>\n";
	echo "<td>" , $row["Last_Name"] , "</td>\n";

echo "</tr>\n";}


	echo " </table>\n";
	//else {echo "No record of this criteria was found in the quiz attempts table.";}
	

	}
		
	}
		
		}
		
		
		//query 4- list students id, first and last name who got less than 50% on their third attempt
		if (isset ($_POST["qq"])) 
	{$qq= $_POST["qq"];
	$qq=sanitise_input($_POST["qq"]);

	if($qq=="4"){
		
		
	$query= "Select Student_ID, First_Name, Last_Name from attempts where Score_of_the_Attempt<7.5 and Number_of_the_Attempt=3 order by $order";
		
		$result = mysqli_query($conn, $query);
	
	if(!$result) {
	echo "<p class=\"wrong\">There is no record that matches that search query </p>";
		
	}
	else{
		if(!(($row = mysqli_fetch_assoc($result))=="")){
	echo "<p class=\"ok\">Your query has been processed here are the results. </p>";
	echo "<p class=\"caption\"> These students have got less than 50% on their third attempt</p>";
		echo "<table id =\"display\"> \n";
		echo "<tr> \n " . "<th scope=\"col\">Student_ID</th>\n" . "<th scope=\"col\">First_Name</th>\n" . "<th scope=\"col\">Last_Name</th>\n" . "</tr> \n";
	
while ($row = mysqli_fetch_assoc($result)){
echo "<tr>\n";
echo "<td>" , $row["Student_ID"] , "</td>\n";
	echo "<td>" , $row["First_Name"] , "</td>\n";
	echo "<td>" , $row["Last_Name"] , "</td>\n";

echo "</tr>\n";}

		echo " </table>\n";}
		else{echo "there is no record that matches that criteria";}
	
	mysqli_free_result($result);}
		
	}
		
		}
		
		
		
		//query 5- delete all attempts of a student given their student id
					if (isset ($_POST["qq"])) 
	{$qq= $_POST["qq"];
	$qq=sanitise_input($_POST["qq"]);
	//2
	if($qq=="5"){
		
		
		
		if (isset($_POST["studentID"])) {
	
	$stdID = $_POST["studentID"];
	if (trim($stdID)=="")
		$err_msg .= "<p>Please enter your student ID number. </p>";
	else {
		$stdID=sanitise_input($stdID);
		if (is_numeric($stdID)){
		
		if((strlen((string)$stdID)==7) || (strlen((string)$stdID)==10)){ 
		//acceptable
		}
		else{
			$err_msg .="<p>The student ID has to be 7 or 10 digits. </p>";}}
		else{
	$err_msg .= "<p>Please enter digits as your student number.</p>";}
	}
}


	$query= "delete from attempts where Student_ID='$stdID'"; 
		
		$result = mysqli_query($conn, $query);
	
	if(!$result) {
	echo "<p class=\"wrong\">This record was not found </p>";
		
	}
	else{
			//to restore correct order of Attempt ID column after deleting the record
$query= "alter table attempts drop Attempt_ID"; 

		$result = mysqli_query($conn, $query);
		$query= "alter table attempts add Attempt_ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST;"; 
			
		$result = mysqli_query($conn, $query);
	echo "<p class=\"ok\">Your query has been processed all the attempts of the student with that student ID have been deleted. </p>";

	}



	}
	}
		
		//query 6- change the score for a quiz attempt given a student id
		if (isset ($_POST["qq"])) 
	{$qq= $_POST["qq"];
	$qq=sanitise_input($_POST["qq"]);

	if($qq=="6"){
		
		if (isset($_POST["score"])) {
	
	$score = $_POST["score"];
		if (trim($score)=="")
	{$err_msg .= "<p>Please enter the score you want to change to. </p>";}
	else {
		$score=sanitise_input($score);
		if (!preg_match("/^[0-9]{1,2}$/",$score)){
			$err_msg .= "<p>Please enter digits as the score you want to change to.</p>";
	}
		}}
		
		if (isset($_POST["studentID"])) {

	$stdID = $_POST["studentID"];
	if (trim($stdID)=="")
		$err_msg .= "<p>Please enter your student ID number. </p>";
	else {
		$stdID=sanitise_input($stdID);
		if (is_numeric($stdID)){
		
		if((strlen((string)$stdID)==7) || (strlen((string)$stdID)==10)){ 
//acceptable
		}
		else{
			$err_msg .="<p>The student ID has to be 7 or 10 digits. </p>";}}
		else{
	$err_msg .= "<p>Please enter digits as your student number.</p>";}
	}
}
if (isset($_POST["attempt"])) {

	$attempt = $_POST["attempt"];
	if (trim($attempt)=="")
		$err_msg .= "<p>Please enter the attempt number to change the score of. </p>";
	else {
		$attempt=sanitise_input($attempt);
		if (is_numeric($attempt)){
		
		if(($attempt>3) || ($attempt<1)){ 
			$err_msg .= "<p> Please enter valid attempt number to change the score of </p>";
		}
		}
		else{
	$err_msg .= "<p>Please enter digits as the attempt number.</p>";}
}}


	$query= "update attempts set Score_of_the_Attempt='$score' where Student_ID='$stdID' and Number_of_the_Attempt='$attempt' order by $order"; //Number_of_the_Attempt=$attempt and

		
		$result = mysqli_query($conn, $query);
	
	if((!$result) && ($err_msg=="")) {
	echo "<p class=\"wrong\">Could not find a record with that student ID and/or attempt number </p>";
		
	}
	if(($result) && ($err_msg=="")){
	echo "<p class=\"ok\">Your query has been processed and the score of that student ID has been changed </p>";
echo "<p>Successfully updated " . mysqli_affected_rows($conn) . " record(s).</p>";
}	
	
	
	//mysqli_free_result($result);
		
	}
		
		}
		
		
		
		//if no query option selected
		
if(empty($_POST["qq"])){ 
$err_msg.="<p>Please select one of the 6 query requests from <a href='manage.php'> this form </a></p>";}
	
	//if any required data entry for query incorrectly entered or left vacant- feedback message
	if ($err_msg!="")
	{echo $err_msg;}
	mysqli_close($conn);
}


?>


<?php include_once "footer.inc"; ?>

</article>
	</div>
	</article>
	
</body>
</html>