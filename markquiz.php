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
* Author: Ayesha Shaikh 
* Target: quiz.php 
* Purpose: Check, sanitize and validate data input from user in the quiz form- participant details and answers entered. 
			calculate marks for correct answer
			register their attempt as a record in table-'attempts' , if proper answers entered and score not zero
			ensure no more than 3 attempts
* Created: 20-10-2020
* Last-updated: 25-10-2020
* Credits: Lectures on Echo360, lab instructions, lecture tasks/folders, 
*/
?>


<?php
	$host = "####"; //local host or server name
	$user = "#####"; // your user name
	$pwd = "#####"; // your password 
	$sql_db = "######"; // your database
?>

<?php function sanitise_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
} ?>

<?php 
	$conn = @mysqli_connect($host, $user, $pwd, $sql_db);

if(!$conn) {
	echo "<p> Database connection failure</p>";
}
else{
	

$score=0;
$attempt = 1;
$err_msg="";

//checks if process was triggered by submitting the form, if not error message and redirecting is executed
if (isset($_POST["fname"])) {
	
	$fname = $_POST["fname"];
	$lname = $_POST["lname"];
 
	// first name
	if (trim($fname)=="")
	{$err_msg .= "<p>Please enter first name. </p>";}
	else {
		$fname=sanitise_input($fname);
		//checks using regex
		if (!preg_match("/^[a-zA-Z -]{2,20}$/",$fname)){
			$err_msg .= "<p>Only letters, hyphens and spaces are allowed in first name upto 20 characters.</p>";
	}
}}
	// last name
	if (trim($lname)=="")
		$err_msg .= "<p>Please enter last name. </p>";
	else {
		$last_name=sanitise_input($lname);
		//checks using regex
		if (!preg_match("/^[a-zA-Z -]{2,20}$/",$lname)){
			$err_msg .= "<p>Only letters, hyphens and spaces are allowed in last name, upto 20 characters.</p>";
		}
	}

	//student ID
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
			//if not numeric value
		else{
	$err_msg .= "<p>Please enter digits as your student number.</p>";}
	}
}

//validation check and marking of questions

//question 1
if (isset ($_POST["mcq"])) 
	{$q1= $_POST["mcq"];
	$q1=sanitise_input($_POST["mcq"]);
	
	if($q1=="All the above"){
	$score+=2;}}
	else 
		$err_msg.="<p>Please asnwer question 1.</p>";
	
	
	//question2
	if(isset($_POST["list-selection"])) {
			$q2 = $_POST["list-selection"];
			if (trim($q2)=="please select")
		$err_msg .= "<p>Please answer question 2. </p>";
	else {
		$q2=sanitise_input($q2);
		if($q2=="Service Description") $score+=2;
		
	}
			}
		
		//question 3 
	if (isset($_POST["fullform"])) {
	
	$q3 = $_POST["fullform"];
	

	if (trim($q3)=="")
	{$err_msg .= "<p>Please answer question 3. </p>";}
	else {
		$q3=sanitise_input($q3);
		if($q3=="Simple Object Access Protocol") $score+=2;
		if (!preg_match("/^[a-zA-Z -]{2,40}$/",$q3)){
			$err_msg .= "<p>Only letters are allowed in this answer type.</p>";
	}
}}	
		
		//question 4
		$q4="";
	if(isset ($_POST["control"]))	$q4 = $q4. "1";
	if(isset ($_POST["output"]))	{
		
	$q4 = $q4. "2";}
	if(isset ($_POST["data"])){
			
$q4 = $q4. "3";}
if(isset ($_POST["programs"])){
			
$q4 = $q4. "4";}
if(isset ($_POST["services"])){
			
$q4 = $q4. "5";}
if($q4=="12") $score+=2;
	if($q4=="") $err_msg.="<p>Please select atleast one of the options from question 4.</p>";
	
	
	
	//Long answer question
	if (isset($_POST["describe"])) {
	
	$longans = $_POST["describe"];
	

	if (trim($longans)=="")
	{$err_msg .= "<p>Please answer the long answer question. </p>";}
	else {
		$longans=sanitise_input($longans);
		if((strpos($longans, 'HyperText Transport Protocol Secure')) && (strpos($longans, 'internet')) && (strpos($longans, 'connection')))	$score+=2;
		if (strlen($longans)<50){
			$err_msg .= "<p>Please answer the long answer question in appropriate number of words.</p>";
	}
}}	
		
		//question 5
		if (isset ($_POST["t/f"])) 
	{$q5= $_POST["t/f"];
	$q5=sanitise_input($_POST["t/f"]);
	if ($q5=='true') $score+=1;
	}
	else 
		$err_msg.="<p>Please asnwer question 5.</p>";
	
	
	//question 6
	if (isset ($_POST["t/f2"])) 
	{$q6= $_POST["t/f2"];
	$q6=sanitise_input($_POST["t/f2"]);
	if ($q6=='false')  $score+=1; 
	}
	else 
		$err_msg.="<p>Please asnwer question 6.</p>";
	
	
	//question 7
	if (isset ($_POST["t/f3"])) 
		{$q7= $_POST["t/f3"];
		$q7=sanitise_input($_POST["t/f3"]);
			if($q7=='true') $score+=1;
		}
	else 
		$err_msg.="<p>Please asnwer question 7.</p>";
	
	//ref url input 
	$url = $_POST["enter-link"];
if (trim($url) == "")
		$err_msg .= "<p>Please enter the url needed.</p>";
	else {
		$url =  sanitise_input($url);
		if (!filter_var($url, FILTER_VALIDATE_URL)) 
			$err_msg .= "<p>URL link is not valid.</p>";
	}
	
	//question 8
	if (isset($_POST["q8"])) {
	//$err_msg="";
	$q8 = $_POST["q8"];
	if (trim($q8)=="" || trim($q8)==0)
		$err_msg .= "<p>Please answer question 8. </p>";
	else {
		$q8=sanitise_input($q8);
		if($q8 == 2.1)	$score+=2;
		if (!preg_match("/^((\d+)+(\.\d+))$/",$q8)){
			$err_msg .= "<p>Please enter digits as decimal value in question 8.</p>";
	}
}}



	//creates a table in the database if doesn't previously exist to store the quiz attempt records
	$query = "CREATE TABLE IF NOT EXISTS attempts (
				Attempt_ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
				Date Date NOT NULL,
				Time Time NOT NULL,	
				Student_ID int NOT NULL,
				First_Name varchar(20) NOT NULL,
				Last_Name varchar(20) NOT NULL,
				Number_of_the_Attempt int,
				Score_of_the_Attempt INT)";
$result = mysqli_query($conn, $query);
	
	if(!$result) {
		echo "<p class=\"wrong\">Something is wrong with ", $query, "</p>";
		
	}
	//else if ($result && $err_msg==""){
	//	echo "<p class=\"ok\"><br />The table has been created. </p>";
	//}
	
	

	//search for a pre-existing record of that student ID and retrive and check its number of attempts
	$query="SELECT MAX(Number_of_the_Attempt) FROM attempts WHERE Student_ID='$stdID' and First_Name='$fname' and Last_Name='$lname' ";
	
	$result = mysqli_query($conn, $query);
	
	if(!$result) {
		$attempt=1;
	}
	else{
	
$row = mysqli_fetch_assoc($result);
$attempt= $row['MAX(Number_of_the_Attempt)'];
$attempt+=1; //increase the attempt number by one if a previous record is found of the same student ID and first name

	}
	
	//mysqli_free_result($result);
	
		
		//displays feedback on what all data entries are incorrect or vacant
	if ($err_msg!="")
	{echo $err_msg;}

		//displays the results summary if all data entries are valid and score is more than 0
	if($err_msg=="" && $attempt<4 && $score>0){
		echo "<br /><br /><p id='userdets'>Welcome $fname $lname!</p><br />" ; 
		echo "<p id='uname1'>Your student ID number is $stdID</p><br />";
		echo "<p id='scorestyle'>Your score is: $score out of 15.</p><br />";
		echo "<p id='scorecontent'>This is your attempt number $attempt .</p><br /> ";
		
	}
	
	//if all three attempts have been used by the same participant. the result is not processed
	if($attempt>2 && $err_msg=="")
		echo "<p> You have finished all your three attempts on this quiz.</p>";
	
	//if the score calculated is zero. feedback is given and the record is not entered in the table
	if($score==0 && $err_msg=="")
		echo "<p> You have failed in this attempt</p>";


//data and time of submitting the quiz attempt
$date= date("Y-m-d");
$time= date("h:i:sa");
if($err_msg==""){
	//if attempts are upto three
	if(($attempt<4)&&($score>0)){
$query = "insert into attempts (Date, Time, Student_ID, First_Name, Last_Name, Number_of_the_Attempt, Score_of_the_Attempt) values ( '$date' , '$time', '$stdID', '$fname' , '$lname'  , '$attempt' , '$score')";
	}
	
	//check if database exists first
	$result = mysqli_query($conn, $query);
	
	if(!$result) {
		echo "<p class=\"wrong\">Something is wrong with ", $query, "</p>";
		
	}
	if(($result)&& ($attempt<2) && ($score>0)){
		echo "<p class=\"ok\">Successfully added quiz attempt record. </p>";
	}
}

if($attempt<3)    // to try again if attempts is less than three
	echo "<p>Attempt the quiz again for another score <a href=\"quiz.php\">Clicking here.</a></p>";
//header ("location:quiz.php");} //redirect to the form }

}

mysqli_close($conn);

//the results page cannot be directly accessed and the code does not crash
if(!isset($_POST["fname"])){
header("Location: quiz.php");
exit(); }


?>

<?php include_once "footer.inc"; ?>


</article>
	</div>
	</article>
	
</body>
</html>
