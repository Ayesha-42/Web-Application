/**
* Author: Ayesha Shaikh 103165863
* Target: quiz.html 
* Purpose:  Adding enhanced features such as animation and timer to the quiz to create a dynamic and interactive webpage
* Created: 20-09-2020
* Last-updated: 29-09-2020
* Credits: Lectures on Echo360,https://www.careerride.com/jQuery-features.aspx, javatutorialspoint
*/

"use strict"; //prevents creation of global variable  


/*Enhancement feature number 1:
					The timer. 
					the timer is set to count down from 5min. (300 seconds)
					giving the user 5 min to complete the quiz otherwise they have to attempt it all over again and will lose an attempt
					The timer goes in the top right corner if the 'Keep Timer' button is clicked for constant viewing.
					
*/

  function CountDown(duration, display) {
            if (!isNaN(duration)) {
                var timer = duration, minutes, seconds;
                
				var interVal=  setInterval(function () {
                    minutes = parseInt(timer / 60, 10);
                    seconds = parseInt(timer % 60, 10);

                    minutes = minutes < 10 ? "0" + minutes : minutes;
                    seconds = seconds < 10 ? "0" + seconds : seconds;

                    $(display).html("<b>" + minutes + "m : " + seconds + "s" + "</b>");
                    if (--timer < 0) {
                        timer = duration;
                       SubmitFunction();
                       $('#display').empty();
					   $('#time').empty();
                       clearInterval(interVal)
					   alert("time up");
					  
		
		attempts=(attempts)-1;
		localStorage.setItem("attempts", attempts);
				$("#newmessage").css("visibility", "visible");
					   $("#newmessage").text("You've lost an attempt, please try again in the time given." + "You have " + attempts + " attempts left");
					   //window.location.href = "quiz.html";
					   $("#hideit").css("visibility", "visible"); 
					   $("#quiz").css("visibility", "hidden");
                    }
                    },1000);
            }
        }
        
        function SubmitFunction(){
       $('#submitted').html('You have run out of time.');
        
        
		}
		


		
	/* checking or verifying that the jquery (ajax) libraries with are needed have been linked and referred to
    */
        
if(!window.jQuery)
{
   var script = document.createElement('script');
   script.type = "text/javascript";
   script.src = "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js";
   document.getElementsByTagName('head')[0].appendChild(script);
}

if (typeof jQuery == 'undefined') {
    var script = document.createElement('script');
    script.type = "text/javascript";
    script.src = "https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js";
    document.getElementsByTagName('head')[0].appendChild(script);
}



/* function to initialize the two major features into the quiz.html file when it loads in the browser

*/

$(document).ready(function(){
			CountDown(300,$('#display'));
	 
	
	/* Enhancement feature 2:
			The animation resembling an automatted slideshow 
			it dynamically displays the questions in dropdown form on loading
			along with the right picture in smooth transition- using nested functions
			It also includes the enlargment of the navigation bar when the mouse is hovered over one of the webpage links
	*/
			

		$("#ss1").hide();
        $("#ss2").hide();
		$("#ss3").hide();
		$("#ss4").hide();
        $("#ss5").hide();
		$("#ss6").hide();
		$("#ss7").hide();
        $("#ss1").slideDown(3000, function(){ 
        (function() {
                $("#ss2").slideDown(2000, function() {
					$(".webimg_3").animate({width:"500px", marginRight:"30px", borderWidth:"10px"},3000);
                  $("#ss3").slideDown(2000, function(){
                        $("#ss4").slideDown(2000, function(){
                          $("#ss5").slideDown(2000, function(){
							  $("#ss6").slideDown(2000, function(){
								    $("#ss7").fadeIn(2000);
							  });
						  });
                        });
                  });
                });
         })();

			  
			 
		} );
  
		 $("#hideit").css("visibility", "hidden"); 
	
	//animation on the timer
	  $("#time").animate({fontSize:"2em"},1500);

	  $("button").click(function(){
    //$("#display").animate({left: '710px'});
	$("#display").animate({top: '90px'});
	$("#display").css("position", "fixed");
  });
	  
  
  //animation on the navigation panel link sections
  $("#navbar1").mouseover(function(){
    $("#navbar1").animate({width: "300px"});
  });
  $("#navbar1").mouseleave(function(){
    $("#navbar1").animate({width: "200px"});
  });
  $("#navbar2").mouseover(function(){
    $("#navbar2").animate({width: "300px"});
  });
  $("#navbar2").mouseleave(function(){
    $("#navbar2").animate({width: "200px"});
  });
  $("#navbar3").mouseover(function(){
    $("#navbar3").animate({width: "300px"});
  });
  $("#navbar3").mouseleave(function(){
    $("#navbar3").animate({width: "200px"});
  });
  $("#navbar4").mouseover(function(){
    $("#navbar4").animate({width: "300px"});
  });
  $("#navbar4").mouseleave(function(){
    $("#navbar4").animate({width: "200px"});
  });
  $("#navbar5").mouseover(function(){
    $("#navbar5").animate({width: "300px"});
  });
  $("#navbar5").mouseleave(function(){
    $("#navbar5").animate({width: "200px"});
  });
});

