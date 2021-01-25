/**
* Author: Ayesha Shaikh 103165863
* Target: quiz.html and result.html
* Purpose: validating input data of form and saving the data and directing to the page to present it
* Created: 20-09-2020
* Last-updated: 29-09-2020
* Credits: Lectures on Echo360, lab instructions, lecture tasks/folders
*/

"use strict"; //prevents creation of global variable

function init() {
	
	//var name=prompt("Enter participant's name:");
	//alert("Welcome and all the best for the quiz, " + name);

 if (document.getElementById("Quiz")) { 
			alert("Hello! Welcome to giving the quiz on Web Services!"); // quiz page init
		document.getElementById("quiz").onsubmit = validate;
	
	}
	else if (document.getElementById("Results")) {
			alert("Here are the Results of your quiz attempt!");		// result page init
		getResult();		
	}
}

/* *****************************************************
Objective 1: to validate form elements input and if filled correctly calculates their score 
					First Name : only accept alpha characters, hyphens or spaces
					Last Name : only accept alpha characters, hyphens or spaces
					Student ID: number between 7 and 10 digits
					all checkboxes, textareas, url, number input, dropdownlist, date and radio buttons are checked.
					
					*then a score of appropriate weightage is given to each correct answer selected/entered
*********************************************************** */

var attempts = 3; //global variable with declaration and initialization

function validate()
{	//alert("validation taking place of data entered")
	//starting to first validate and check the data entered into the quiz form before redirecting
var errMsg = "";
var result = true; 

	
	
	
var scores = 0; //initializing and declaring variable to hold to marks scored by user
	
// get form data
	var studentID = document.getElementById("studentID").value;
	var fname = document.getElementById("fname").value.trim();
	var lname = document.getElementById("lname").value.trim();
	var fullform = document.getElementById("q3").value;
		
	var count = noOfDigits(studentID)
	if ((isNaN(studentID))||(studentID==""))
	{ errMsg+= " You need to enter the digits of your Student ID. \n";
result=false;
	} //if (studentId.match([0-9]+)
		
	else if ((count<7)||(count>10))
	{errMsg+= "Your student ID's number of digits is not valid. Please enter correct student ID of 7 or 10 digits. \n";
	result=false;}
	
	
	//To first check if that particular student ID has been used before and hence to retrieve that person's previous number of attempts
	checkID()


	if((fname==null)||(fname==""))
	{errMsg+="Please enter your first name. \n";}

	else if(!fname.match(/^[a-zA-Z -]+$/)){
		errMsg+="Your first name must only contain alpha characters, hyphens or space. \n";
		result=false;
	}else if (fname.length>25)
	{errMsg += "First Name cannot exceed 25 characters. \n";}
	
	
	if((lname==null)||(lname==""))
	{errMsg+="Please enter your last name. \n";}
	else if(!lname.match(/^[a-zA-Z -]+$/)){
		errMsg+="Your last name must only contain alpha characters,hyphens or space. \n";
		result=false;
	}else if (lname.length>25)
	{errMsg += "Last Name cannot exceed 25 characters. \n";}
	
	
	var opt1 = document.getElementById("q1").checked;
	var opt2 = document.getElementById("q1.1").checked;
	var opt3 = document.getElementById("q1.2").checked;
	var opt4 = document.getElementById("q1.3").checked;
	
	//one radio button option needs to be selected in question 1 the correct option selected is given marks
	
	if(!(opt1||opt2||opt3||opt4)){
		errMsg+="Please select atleast one option for the Question 1. \n";
		result= false;
	}	else if (opt4){  
			scores += 2;
	}
	
	//one valid answer option from the dropdown list should be selected, the correct is given marks
	
	if (document.getElementById("q2").value=="please select"){
		errMsg+="Please select one option from the drop down menu in Question 2.\n";
		result=false;
	}else if (document.getElementById("q2").value=="Service Description"){
		scores+=2;
	}
		
		
	//checks if an answer is entered in the textbox and checked for correct answer to award marks

		if(!fullform.match(/^[a-zA-Z ]+$/)){
		errMsg+="Please enter your answer in Question 3. \n";
		result=false;
	}else if(fullform.match(/Simple Object Access Protocol/i)){
		scores+=2;
	}
	
	//to check if atleast one option from the checkboxes is selected the completely correct is given full marks, the partially correct is given half those marks
	
	var cb1 = document.getElementById("q4").checked;
	var cb2 = document.getElementById("q4.1").checked;
	var cb3 = document.getElementById("q4.2").checked;
	var cb4 = document.getElementById("q4.3").checked;
	var cb5 = document.getElementById("q4.4").checked;
	//one trip needs to be selected in the checkboxes atleast
	
	if(!((cb1)||(cb2)||(cb3)||(cb4)||(cb5))){
		errMsg+="Please select atleast one option in Question 4. \n";
		result= false;
	}else if((cb2)&&(cb1)){
		scores+=2;
	}
	else if((cb1)||(cb2)){
	scores+=1;}
	
	
		
	//checks if the user has entered the descriptive answer for the question required
	
	var textbox=new String(document.getElementById("textans").value);

		if(((textbox.length)<50)||((textbox.length)==0)){
		errMsg+="Please enter your answer in the long answer question. \n";
		result=false;
	}
	
	
	//first sets the keywords that must be present in the user's answer to make it correct, searches and compares to find if they are present in the answer submitted, accordingly marks are alloted
		
		var wordcount1=textbox.search("Hypertext Transfer Protocol");
		var wordcount2=textbox.search("protocol");
		var wordcount3=textbox.search("communicate");
		var wordcount4=textbox.search("data");
		var wordcount6=textbox.search(" on the World Wide Web");
	 if(((wordcount1)!==(-1))&&((wordcount2)!==(-1))&&((wordcount3)!==(-1))&&((wordcount2)!==(-1))&&((wordcount2)!==(-1)))
{scores+=2;}
else if(((wordcount1)!==(-1))||((wordcount2)!==(-1))||((wordcount3)!==(-1))||((wordcount2)!==(-1))||((wordcount2)!==(-1)))
{scores+=1;
}
	
	//three true and false radio button questions- first checks if each one has a seleted option, then checks for the correct selection to give marks

	var t5 = document.getElementById("q5").checked;
	var f5 = document.getElementById("q5f").checked;
	var t6 = document.getElementById("q6").checked;
	var f6 = document.getElementById("q6f").checked;
	var t7 = document.getElementById("q7").checked;
	var f7 = document.getElementById("q7f").checked;
	
	
	if(!(t5||f5)){
		errMsg+="Please select atleast one option for the Question 5. \n";
		result= false;
	}else if(t5){scores+=1;}
	
	
		if(!(t6||f6)){
		errMsg+="Please select atleast one option for the Question 6. \n";
		result= false;
	}else if(f6){scores+=1;}
	
	
		if(!(t7||f7)){
		errMsg+="Please select atleast one option for the Question 7. \n";
		result= false;
	}else if(t7){scores+=1;}
	
	
	//just checks to see if the url entered by the user is of valid format. no marks are given as this is not a decisive question.
	
		var url=document.getElementById("ref").value;
	
		var check=url.slice(0,[8]) 
		if(check!="https://")
		{errMsg+="Please enter the correct format for the url. \n";}
	   
	// checks if user has entered a value in the number type input and if its in range. then gives marks for correct answer
	
		var ver = document.getElementById("ver").value;
		if ((ver=="")||(ver==null)||(ver==0))
		{ errMsg+= " Please enter the answer for Question 8. \n";
		result=false;} 
		else if ((ver>10)||(ver<0))
		{errMsg+= "Please enter your Question 8 answer between the range of 0 and 10 including decimals. \n";
		result=false;}
		else if(ver==2.1)
		{scores+=2;}
	
	
	
	//checks if value of date is entered by the user
	
	var d = document.getElementById("date").value;
	/*var today = new Date();
var dd = String(today.getDate()).padStart(2, '0');
var mm = String(today.getMonth() + 1).padStart(9, '1'); //January is 0!
var yyyy = today.getFullYear();

today = dd + '/' + mm + '/' + yyyy;*/
	
	if (d==""||d==null)
	{errMsg+="Please enter the date of submission below the quiz. \n";
		result=false;}

		//checks to make sure only digits are entered in the date input
	var tempMsg=isDOK(d);  
			if(tempMsg!=""){
				errMsg+=tempMsg;
				result=false;}
				
		// to check if the date entered by user is the current day's date
		var today = new Date();
				var dd = today.getDate();
				var mm = today.getMonth()+1; 
				var yyyy = today.getFullYear();
						if(dd<10) {dd='0'+dd;}

						if(mm<10) {mm='0'+mm;}
today = dd+'/'+mm+'/'+yyyy;
		if((d!==today)&&(d!==null)&&(d!=="")){errMsg+="Please enter Today's date as the date of submission.";
					result=false;}
		
		
		
		//if there are errors generated in validation it doesn't let the data get processed to move onto the results page.
	if(errMsg!="")
	{alert(errMsg);
	}
	
	
	//After the validation to check if the score is zero or not and to give feedback accordingly and not process onto the results page.
	if ((scores == 0)&&(errMsg==""))
	{ alert("fail");
if(localStorage.getItem("attempts")!=undefined){
		if(document.getElementById("studentID").value===localStorage.getItem("studentID")){
			attempts=localStorage.getItem("attempts");}
			}
attempts=(attempts)-1;
var outputMessage=document.getElementById("newmessage");
	outputMessage.style.visibility = "visible";
	outputMessage.textContent= (" Please attempt the task carefully this time round. \n You have "+ attempts +"left");
	result=false;}



	//To make sure that the person with that student ID has attempts to process their results, otherwise feedback is given and doesn't move onto the results page.
	
	if(attempts===0){alert("You have run out of attempts!");
	//window.location.href("result.html");
	document.getElementById("newmessage").style.visibility= "visible";
	document.getElementById("newmessage").textContent="No more attempts left";
	document.getElementById("quiz").style.visibility = "hidden";	
	document.getElementById("time").style.visibility="hidden";
	document.getElementById("hideit").style.visibility="visible";	
	document.getElementById("hideit2").style.visibility="visible";
	//document.getElementsByName("button").style.visibility="hidden";
	
	result=false;}
	
	
		/*Objective 2-
					*validation is processed and correct. 
					*Store the user's answers into the client-side local storage
			*/
if(result){
	storeAnswers(studentID, fname, lname, scores, attempts)
		}
	
	//finally after validation, alloting scores and storing the required data, function returns true value to move onto the results page.
		
	return result;
}



//checks the number of digits in the studentID entered by user to validate it
function noOfDigits(studentID) {
  var count = 0;

  if (studentID >= 1) {count=(count) +1;}

  while (studentID / 10 >= 1) {
    studentID = (studentID) / 10;
    count= (count)+1;
  }

  return count;
}



//to check if only digits are entered in the data by the user
function isDOK(d){
	var validD = true; //set to false if not ok
	var now = new Date(); //current date-time

	var dateMsg = "";
//split date into array with elements dd mm yyyy using / as a separator
	var dmy = d.split("/");
	for (let i = 0; i < dmy.length; i++){
		if(isNaN(dmy[i])){ //for each part of date check is number
		dateMsg = "You must enter only numbers into the date. \n";
		validD = false;}
	}

return dateMsg;

}

//to store the valid values collected in the quiz form to transfer on to the results page for display
function storeAnswers(studentID, fname, lname, scores, attempts){
	
	if(typeof(Storage)!=="undefined"){
	
	localStorage.setItem("studentID", studentID);
		localStorage.setItem("scores", scores);
		localStorage.setItem("fname", fname);
		localStorage.setItem("lname", lname);
		localStorage.setItem("attempts", attempts);
		
	}
	
}


				/*Objective 3-
								*initiated when the result page is loaded. 
								*recalls all the data values stored in the quiz form page by the user. 
								*displays the caluclated scores of their student ID and name.
								*gives feedback on calculating the scores and the attempts left
				*/


function getResult(){
	//checks if there is some storage to retrive from
	   if(typeof(Storage)!=="undefined"){
	  //getting values stored
	  var studentID= document.getElementById("studentID");
			studentID.textContent = localStorage.getItem("studentID"); 
		
		var scores= document.getElementById("scores");
			scores.textContent = localStorage.getItem("scores");
		var scoreno=localStorage.getItem("scores");
		var name=document.getElementById("username");
		name.textContent=localStorage.getItem("fname") + " " + localStorage.getItem("lname");//sets values on result.html page
	  //calculates the attempts for that student ID
		var attempts=document.getElementById("attempts")
		var aa=localStorage.getItem("attempts");
		attempts.textContent = ((aa)-1);
		//feedback based on calculation
		if(scoreno<5){var outputMessage=document.getElementById("newmessage");
		aa=aa-1; //actual number of attempts left
		 document.getElementById("newmessage").style.visibility = "visible";
		outputMessage.textContent= (" Please attempt the task carefully this time round. \n You have "+ aa +" attempts left");}

		else{var outputMessage=document.getElementById("newmessage");
		
			document.getElementById("newmessage").style.visibility = "visible";
			outputMessage.textContent= (" Great job on your result!");}
		var aa=localStorage.getItem("attempts");
		var attemptscount=document.getElementById("attemptscount"); //which number of attempt has been used by the user for that particular result
	
		switch(aa){
			case '3':
			
		attemptscount.textContent=("First");
				break;
				
				case '2':
				
		attemptscount.textContent=("Second");
				break;
				case '1':
					
		attemptscount.textContent=("Third");
				break;
				default:
					
		attemptscount.textContent=("No more");
				
		}
		
	  }
		//if no attempts left the student cannot attempt the quiz again. does not give redirect option
	   if(attempts===1){ document.getElementById("repeat").style.visibility = "hidden";}
	}
	
	
	
	
	
	
	
	//checks if that particular student ID has attempted the quiz in the past and then retrives the number of attempts they had to work on that
function checkID(){
	//checked if the same user student ID has attempted the quiz to then calculate the number of attempts
	
	if(localStorage.getItem("studentID")!=undefined){
		if(document.getElementById("studentID").value===localStorage.getItem("studentID")){
			attempts=localStorage.getItem("attempts");
			attempts=(attempts)-1;}
		if((document.getElementById("studentID").value)!==(localStorage.getItem("studentID"))){
		attempts=3;}
	
		}
		
	
}



window.onload=init;