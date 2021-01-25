<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="description" content="index" />
<meta name="keywords" content="css, intro, index, website, assignment, part1, Web Services" />
<meta name="author" content="Ayesha" />
<title> An introduction to Web Services</title>
  <!--other meta details to link to css external file-->
<link rel="stylesheet" href="styles/style.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

</head>
<body id="bg">
<div class="wrapper">
   

<?php 
	
	include_once "menu.inc";
?>
    <div class="main_content">
	<?php include_once "header.inc";?>
      
	<section><h4>   Navigate within the homepage</h4><br />
	<nav id="inpage_links">
         <a href="#definition">Description</a> 
         <a href="#features">Key Features</a> 
         <a href="#components">Components</a> 
         <a href="#technologies">Technologies associated </a>
         <a href="#architecture">Architecture</a>
         <a href="#w3">W3 web services</a>
		    <a href="#API">web API</a>
			<a href="#video">Video</a>
      </nav>
	  <br />
      <hr />
</section>
        <div class="info">
		<aside> What exactly does the term Web Services mean? And why has it become a buzzword in the tech industry?</aside>
		<article id="definition"><h2 id="welcome">Welcome!</h2><br />
		
 <section id="define">
 <h2> Description</h2>
 <br /> 
 <br />
 
	<p id="intro_1">A web service is the kind of software that caters for availability over the internet and it utlizes a standardized XML messaging system. All communications to a web service are encoded in XML. For instance, a client invokes a web service by sending an XML message, subsequently a XML response corresponding to the request is received. Since all communications are in XML, web services are not limited to or hindered by any one particular operating system or programming language. This statement can be supported by seeing how Java communicates with Perl and how Windows applications can interact and understand Unix applications.</p>
	<p id="intro_2">Web Services are self-contained, distributed, modular, and dynamic applications that can be described, located, published, or invoked over the network. They are used as tool to create products, processes, and supply chains determining the functioning of the web. </p>
		<img src="images/img_1.jpg" alt="web services" id="webimg_1" />
	<p id="intro_3"> Their information exchange systems are XML-based. Its direct application-to-application interaction is facilitated by the Internet. These systems encompasses and deal with programs, objects, messages and documents.</p>
	<p id="intro_4">Web Services may also be defined on the lines of it being a collection of open protocols and standards used for exchanging data to-and-fro applications. These softwares scripted in a variety of different programming languages as well as running on multiple platforms are enabled to exchange data over computer networks like the Internet using web services. This procedure is similar to inter-process communication done on a single computer. This interoperability visible between Java and Python, or Windows and Linux applications, is a result of having open standards in use.</p>
</section>
<br />

<section class="features">
	<h3> Here are some key features associated with web services:</h3>
	<ul>
		<li>Its availablity ranges from being on the Internet to the intranet (private networks).</li>

		<li>It uses the standardized XML messaging system for its functionality.</li>

		<li>It is not bound to any one<abbr title="Operating System">OS</abbr> or programming languaege.</li>

		<li>It follows a self-describing format based on common XML grammar/syntax and structure.</li>

		<li>It is discoverable and accessible via a simple find or search mechanism.</li>
	</ul>
</section>
 <br />
 <hr />
 <br />
 
 <section id="components">
	<h2>Components of Web Services</h2>
	<p>The basic web services platform comprises of XML &amp; HTTP. All the fundamental web services operate using the following components −</p>
	<ul>
		<li>	SOAP (Simple Object Access Protocol)</li>
		<li>UDDI (Universal Description, Discovery and Integration)</li>
		<li>WSDL (Web Services Description Language)</li>
	</ul>
</section>

<br />

<section id="technologies">
	<h3>Web Technologies</h3>
	<p> Web technology such as HTTP is used for transferring machine-readable file formats such as XML and JSON.</p>
	<p> the portfolios of the forementioned components are- </p>
	<ol id="functions">
		<li>enables communication among various applications by using open standards such as HTML, XML, WSDL, and SOAP. </li>

		<li>XML to tag the data</li>

		<li>SOAP to transfer a message</li>

		<li>WSDL to describe the availability of service.</li>
	</ol>
	<p> one can use Java-based web service on Solaris or use C# to build new web services on Windows</p>
</section>

<br />

<section id="procedure">
	<h3> The general procedure includes-</h3>
	<p>Taking up the case of a simple account-management and order processing system to understand. The accounting personnel uses a client application built using Visual Basic or JSP with the task to create new accounts and enter new customer orders.</p>

	<p>The processing logic for this system is written in Java and is situated on a Solaris machine. The latter interacts with a database in order to store information.</p>
		The steps to perform this operation are as follows −
	<ol>
		<li>The client program bundles the account registration information into a SOAP message.</li>

		<li>This SOAP message is sent to the web service as the body of an HTTP POST request.</li>

		<li>The web service unpacks the SOAP request and converts it into a command that the application can understand.</li>

		<li>The application processes the information as required and responds with a new unique account number for that customer.</li>

		<li>Next, the web service packages the response into another SOAP message, which it sends back to the client program in response to its HTTP request.</li>

		<li>The client program unpacks the SOAP message to obtain the results of the account registration process.</li>
	</ol>
<br />

	<h3> Rules and procedure followed for communication between different systems is defined as:</h3>
	<ul>
		<li>How one system can request data from another system.</li>
		<li>Which specific parameters are needed in the data request.</li>
		<li>What would be the structure of the data produced. (Normally, data is exchanged in XML files, and the structure of the XML file is validated against a .xsd file.</li>
		<li>What error messages to display when a certain rule for communication is not observed, to make troubleshooting easier.</li>
		<li>All of these rules for communication are defined in a file called WSDL (Web Services Description Language), which has a .wsdl extension. (Proposals for Autonomous Web Services (AWS) seek to develop more flexible Web services that do not rely on strict rules.)</li>
	</ul>

</section>


<img src="images/img_11.jpg" alt="web services" id="webimg_2" />
<br />

<section id="architecture">
	<h2> Web Service Architechture</h2><br />
	<h3> There are two ways to view the web service architecture −</h3>

	<ol>
		<li>The first is to examine the individual roles of each web service actor.</li>
		<li>The second is to examine the emerging web service protocol stack.</li>
	</ol>
<br />
<hr />
<br />

<h3> A few web service frameworks:</h3>
</section>

<br />

<section id="API">
<h2>  Web API</h2>
	<p>A Web API is a development in Web services where emphasis has been moving to simpler representational state transfer (REST) based communications.[2] Restful APIs do not require XML-based Web service protocols (SOAP and WSDL) to support their interfaces.</p>
</section>

<section id="W3">
	<h3>the W3C defined a Web service as:</h3><br />
	<p>A web service is a software system designed to support interoperable machine-to-machine interaction over a network. It has an interface described in a machine-processable format (specifically WSDL). Other systems interact with the web service in a manner prescribed by its description using SOAP-messages, typically conveyed using HTTP with an XML serialization in conjunction with other web-related standards.</p>
	<p>The term "Web service" describes a standardized way of integrating Web-based applications using the XML, SOAP, WSDL and UDDI open standards over an Internet Protocol backbone. XML is the data format used to contain the data and provide metadata around it, SOAP is used to transfer the data, WSDL is used for describing the services available and UDDI lists what services are available.</p>
	
</section>

<q>“Let us take you into a deeper experience, make a moment a lasting conveyable memory. Let us help build your tribe.”
― <span id="gen">Deep Immersion</span></q>
<br /><br />


<section id="video">
	<h2> Here's a video explaining the overview of Web Services. A handy Reference!</h2>
	<a href="video_1.mp4"> Click here to start the video</a>

	<video src="images/video.mp4" width='720' height='540'>
the browser does not support the video tag</video>
</section>

<br /><br />
<hr />
<br /><br />

<?php include_once "footer.inc"; ?>
</article>
	</div>
	</div>  
	</div>
</body>
</html>
          
      
