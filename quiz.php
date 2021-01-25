<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta name="description" content="index" />
	<meta name="keywords" content="css, intro, index, website, assignment, part1, Web Services" />
	<meta name="author" content="Ayesha" />
	<!--meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"-->

		<title> An introduction to Web Services</title>
 	<Additional jQuery libraries only in use for the enhancement javascript file implemented on this page, not for the essential requirements>
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
			<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

			<The main created external javascript files for this website>
			<script src="scripts/quiz.js"></script>
			<script src="scripts/enhancements.js"></script>

		
			<The CSS stylesheets from the previous assignment with minor additions>
			<link rel="stylesheet" href="styles/style.css" />
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

</head>
<body id="Quiz">

<article class="wrapper">
    <?php include_once "menu.inc"; ?>
	

    <div class="main_content">
<?php include_once "header.inc"; ?>

       
		<article id="definition"><h2 id="welcome">Page 3</h2> 
		<br /><br /><br />
 
 <h2>Quiz on web services!</h2>
<p>Following quiz provides a variety of question-answer formats related to Web Services Framework. Choose the correct answer..then submit your result.</p>
<p> Check information on the topics realted to WEB SERVICES in the previous web pages if you need help.</p>
<!--p><span id="newmessage"></span></p>
<div id="submitted"></div>

<p id="time">The Timer has begun! Time left to complete the quiz: <span id="display"></span></p>
 <button>Keep Timer</button>
<p id="hideit"> <a href="quiz.html" id="tryagain">Click here</a> to try again.<span id="hideit2"> Maybe with a different Student ID to regain your three attempts at the quiz</span></p-->
 <br />

<form id="quiz" method="post" action="markquiz.php" novalidate="novalidate">
<fieldset id="ss1">
	<legend> Participant details  </legend>
		<label for="studentID" >Student ID</label>
		<input type="text" name="studentID" id="studentID" pattern="{7,10}" required="required" /> <br /><br />

		<label for="fname">Given Name</label>
		<input type="text" name="fname" id="fname"  maxlength="25" size="30" pattern="^[A-Za-z -]+$" required="required" />
		
		<label for="lname">Family name</label>
		<input type="text" name="lname" id="lname" maxlength="25" size="30" pattern="^[A-Za-z -]+$" required="required" />

</fieldset>


<img src="images/img_q2.jpg" alt="quiz time" class="webimg_3" />

<fieldset id="ss2">
	<legend>Time for Questions!</legend>
		<label for="q1.1"><span class="qno">Q1.</span>   Which of the following is a component of a Web service architechture?</label><br />
		<input type="Radio" name="mcq" value="SOAP" id="q1.1" />SOAP
		<INPUT type="Radio" name="mcq" value="UDDI" id="q1.2" required="required" /> UDDI
		<INPUT type="Radio" name="mcq" value="WSDL" id="q1.3" required="required" />WSDL
		<INPUT type="Radio" name="mcq" value="All the above" id="q1.4" required="required" />All the forementioned<br /><br />
</fieldset>


<fieldset id="ss3">
		<label for="q2"><span class="qno">Q2. </span>  Which of the following layer in Web Service Protocol Stack is responsible for describing the public interface to a specific web service?</label>
		<SELECT Name="list-selection" id="q2">
			<OPTION selected="selected" value="please select">Please select</OPTION>
			<OPTION value="option1">Service Transport</OPTION>
			<OPTION value="XML Messaging">XML Messaging</OPTION>
			<OPTION value="Service Description">Service Description</OPTION>
			<OPTION value="Service Discovery">Service Discovery</OPTION>
			<OPTION value="XML-RPC protocol">XML-RPC protocol</OPTION>
		</SELECT><br /><br />
		<label for="q3"> <span class="qno">Q3.</span>  What does SOAP stand for?</label>
		<input type="text" name="fullform" id="q3"  pattern="^[A-Za-z ]+$" required="required" /> 
</fieldset>

<fieldset  id="ss4" class="second">
	<legend> Detailed </legend>
		<label><span class="qno">Q4.</span>Soap is used to transfer: <input type="checkbox" name="control" id="control" value="control" />control</label>
		<label><input type="checkbox" name="output" id="output" value="output" />output</label>
		<label><input type="checkbox" name="data" id="data" value="data" />data</label>
		<label><input type="checkbox" name="programs" id="programs" value="programs" />programs</label>
		<label><input type="checkbox" name="services" id="services" value="services" />services</label>
		<br /><br />
		
		<label>Define HTTP</label><br />
		<textarea name="describe" rows="6" cols="150" placeholder="Elaborate on the term" id="textans">
			Please type your answer here...
		</textarea>
</fieldset>

<img src="images/img_q1.jpg" alt="quiz time" class="quizimg1" />


<fieldset id="ss5" class="second">
		<legend> Final round</legend>
		<label> Answer true or false</label><br />
		<label for="q5"><span class="qno">Q5.</span>   A web service takes the help of XML to transfer a message.</label><br />
		<input type="Radio" name="t/f" value="true" id="q5" />true<br />
		<INPUT type="Radio" name="t/f" value="false" id="q5f" /> false <br />
			<br />
		<label for="q6"><span class="qno">Q6.</span> A web services takes the help of WSDL to tag the data, format the data.</label><br />
		<input type="Radio" name="t/f2" value="true" id="q6" />true<br />
		<INPUT type="Radio" name="t/f2" value="false" id="q6f" /> false <br />
		<br />
		<label for="q7"><span class="qno">Q7.</span> Service Discovery is responsible for centralizing services into a common registry and providing easy publish/find functionality.</label><br />
		<input type="Radio" name="t/f3" value="true" id="q7" />true<br />
		<INPUT type="Radio" name="t/f3" value="false" id="q7f" /> false <br />
		<br />
		<label for="ref">  Please enter the URL of an online course in web services technologies you would be interested in taking up now!</label>
		<input type="url" name="enter-link" id="ref" /><br />
		<label for="ver"> <span class="qno">Q8. </span>   What is the latest version of SOAP which is used in Adjuncts</label>
		<input type="number" name="q8" id="ver" min="1" max="3" value="0" step='0.01' required="required" /><br />
</fieldset>

<!--fieldset id="ss6">
	<legend>Submission details</legend>
	<label for="date">Date of submission</label>
	<input type="text" name="date" id="date" placeholder="dd/mm/yyyy" pattern="\d{1,2}\/\d{1,2}\/\d{4}" required="required" /> <br />
</fieldset-->

 <input type="submit" value="Submit" id="btn" /> 
 <input type="reset" value="Reset form" />
</form>
<span id="test"></span>
<?php include_once "footer.inc"; ?>
	</article>

	</div>

	</article>
</body>
</html>
