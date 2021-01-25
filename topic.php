<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="description" content="index" />
<meta name="keywords" content="css, intro, index, website, assignment, part1, Web Services" />
<meta name="author" content="Ayesha" />
<title> An introduction to Web Services</title>
  <!--other meta details to link to css external file-->
<!--link rel="style sheet" href="styles/style.css"-->

<link rel="stylesheet" href="styles/style.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
</head>

<body>
<div class="wrapper">
    <?php include_once "menu.inc"; ?>
	
	

    <div class="main_content">
	
        <?php include_once "header.inc"; ?>
	<section><h4>   Navigate within the homepage</h4><br />
	<nav id="inpage_links">
         <a href="#sync">Synchrous</a> 
         <a href="#doc">Document Exchange</a> 
		 <a href="#role"> Roles</a>
         <a href="#protocol">Protocol Stack</a> 
         <a href="#transport">Service Transport </a>
         <a href="#drawbacks">Drawbacks</a>
         <a href="#regress">Regression Testing</a>
		    
			<a href="#audio">Lecture</a>
      </nav>
	  <br />
      <hr />
</section>
        <div class="info">
		<article id="definition"><h2 id="welcome">Page 2</h2><br />
 <section id="sync"> <h2>  Ability to be Synchronous or Asynchronous</h2><br />

<p>Synchronicity refers to the binding of the client to the execution of the service. In synchronous invocations, the client blocks and waits for the service to complete its operation before continuing. Asynchronous operations allow a client to invoke a service and then execute other functions.</p>
<p>Asynchronous clients retrieve their result at a later point in time, while synchronous clients receive their result when the service has completed. Asynchronous capability is a key factor in enabling loosely coupled systems.</p>
</section>

<section id="doc"> <h2>Supports Document Exchange</h2>
<p>One of the key advantages of XML is its generic way of representing not only data, but also complex documents. These documents can be as simple as representing a current address, or they can be as complex as representing an entire book or Request for Quotation (RFQ). Web services support the transparent exchange of documents to facilitate business integration.</p>
</section>
<br />
<section id="role">
<h2>Web Service Roles</h2>
<p>There are three major roles within the web service architecture −</p>
<ol id="roles">
<li>Service Provider
<ul><li>This is the provider of the web service.</li>
<li> The service provider implements the service and makes it available on the Internet.</li>
</ul>
</li>
<li>
Service Requestor
<ul>
<li>This is any consumer of the web service. </li>
<li>The requestor utilizes an existing web service by opening a network connection and sending an XML request.</li>
</ul>
</li>
<li>
Service Registry<ul>

<li>This is a logically centralized directory of services.</li>
<li> The registry provides a central place where developers can publish new services or find existing ones. </li>
<li>It therefore serves as a centralized clearing house for companies and their services.</li>
</ul>
</li>
</ol>
</section>

<table>
         <caption>Web Service Frameworks</caption>
         <thead>
            <tr>
            <!-- the scope attribute assists non-visual user agents -->
            <!-- rowspan and colspan allow multiple cells to be merged -->
              <!--th rowspan="2" scope="col"-->
              <!--th colspan="3" scope="col"-->
			  <th> Name</th>
			  <th>Platform</th>
			  <th>Messaging Model- Destination</th>
			  <th> Specifications</th>
			  <th>protocols</th>
            </tr>
			</thead>
			<tbody>
            <tr>
              <th class="name">Apache Axis</th>
              <td>Java/C++</td>
              <td>Client server</td>
			  <td>WS-ReliableMessaging, WS-Coordination, WS-Security, WS-AtomicTransaction, WS-Addressing</td>
            <td>SOAP, WSDL</td>
			</tr>
     
         <tr>
           <th class="name">CodeiGNITER</th>
           <td>PHP</td>
           <td>Client/Server</td>
           <td>An open source MVC web application framework</td>
         <td>XML-RPC</td>
		 </tr>
         <tr>
           <th class="name">Flash Framework</th>
           <td>PHP</td>
           <td>Client/Server</td>
           <td>Flash is a high performance, open source web application framework. flash follows the model-view-template (MVT) architectural pattern.</td>
			<td>JSON, REST, SOAP, XML-RPC</td>
		 </tr>
		 
		 <tr>
		 <th class="name">gSOAP</th>
		 <td>C and C++</td>
		 <td>Client/Server Duplox/Async</td>
		 <td>WS-Addressing, WS-Discovery, WS-Policy, WS-ReliableMessaging, WS-Security, WS-SecurityPolicy</td>
		 <td>SOAP1.1,MTOM,REST,XML-RPC</td>
		 </tr>
        </tbody>
        <tfoot>
         <tr>
            <th class="name">.NET Framework</th>
			<td>C# VB.NET</td>
			<td>Client/Server</td>
			<td>WS-Addressing, WS-MetadataExchange, WS-Security, WS-Policy, WS-SecurityPolicy, WS-Trust, WS-SecureConversation, WS-ReliableMessaging, WS-Coordination, WS-AtomicTransaction</td>
			<td>SOAP, WSDL, MTOM</td>
			
         </tr>
        </tfoot>
		</table>
		<br />
<section id="protocol">
<h2>Web Service Protocol Stack</h2>
<p>Web Service's protocol guidelines act as a second option for viewing the web service architecture is to examine the emerging web service protocol stack. The stack is still evolving, but currently has four main layers.</p>
<ol>
<li><span class="proto">Service Transport</span>
This layer is responsible for transporting messages between applications. Currently, this layer includes Hyper Text Transport Protocol (HTTP), Simple Mail Transfer Protocol (SMTP), File Transfer Protocol (FTP), and newer protocols such as Blocks Extensible Exchange Protocol (BEEP).</li>
<li><span class="proto">XML Messaging</span>
This layer is responsible for encoding messages in a common XML format so that messages can be understood at either end. Currently, this layer includes XML-RPC and SOAP.</li>
<li><span class="proto">Service Description</span>
This layer is responsible for describing the public interface to a specific web service.</li><li> Currently, service description is handled via the Web Service Description Language (WSDL).</li>
<li><span class="proto">Service Discovery-</span><br />
This layer is responsible for centralizing services into a common registry and providing easy publish find functionality.</li><li> In modern times, a service discovery is handled through Universal Description, Discovery, and Integration (UDDI).
As web services evolve, additional layers may be added and additional technologies may be added to each layer.
The next chapter explains the components of web services.</li>
</ol>
</section>
<img src="images/img_3.jpg" alt="web services" class="webimg_3" />
<section id="transport"><h2> Service Transport</h2>
<p>The bottom of the web service protocol stack is service transport. This layer is responsible for actually transporting XML messages between two computers.</p>
<div id="subhead">Hyper Text Transfer Protocol (HTTP)</div>
<p>Currently, HTTP is the most popular option for service transport. HTTP is simple, stable, and widely deployed. Furthermore, most firewalls allow HTTP traffic. This allows XMLRPC or SOAP messages to masquerade as HTTP messages. This is good if you want to integrate remote applications, but it does raise a number of security concerns.ise a number of security concerns.</p>
<div id="subhead2">Blocks Extensible Exchange Protocol (BEEP)</div>
<p>This is a promising alternative to HTTP. BEEP is a new Internet Engineering Task Force (IETF) framework for building new protocols. BEEP is layered directly on TCP and includes a number of built-in features, including an initial handshake protocol, authentication, security, and error handling. Using BEEP, one can create new protocols for a variety of applications, including instant messaging, file transfer, content syndication, and network management.</p>
<p>SOAP is not tied to any specific transport protocol. In fact, you can use SOAP via HTTP, SMTP, or FTP. One promising idea is therefore to use SOAP over BEEP.</p>
</section>
<img src="images/img_4.jpg" alt="web services" class="webimg_3" />
<br />
<section id="app"><h2 id="applicationhead"> Application</h2>
<img src="images/img_5.jpg" alt="web services" class="webimg_3" />
<p>Multiple software systems are used in many companies for management. Different software systems require to exchange data with each other. Here a Web service comes its role as a medium of communication allowing two or more software systems to exchange data over the Internet. A service requester is the software system that requests data. On the other hand, the software system that is assigned to process the request and provide the data is known as a service provider. However, a majority of softwares can interpret XML tags. Thus, Web services can use XML files for data exchange.</p>
<hr />
</section>
<br />

<aside>One interesting application in the contemporary world and one of the major constituted of Web Services today is <span>Amazon Web Services</span>. AWS is a cloud computing platform powered by Amazon. It is a wide-ranging system of pre-paid data centers that provide the infrastructure as extensions of the World Wide Web. With its recent launch in 2006 it gradually rises in popularity and implementing its efficent use of AI services as well.</aside>

<section id="drawbacks"><h2> Drawbacks</h2>
<p>Critics of non-RESTful Web services often complain that they are too complex and based upon large software vendors or integrators, rather than typical open source implementations.
There are also concerns about performance due to Web services' use of XML as a message format and SOAP/HTTP in enveloping and transporting.
</p>
<br />
 <blockquote cite="https://www.w3.org/DesignIssues/WebServices.html">The Web in Web Services is, from the first point, a misuse: the term Internet Services would be more appropriate. The Web comes from the second point - the use of the HTTP and XML is already in use as a well-understood and well-debugged set of protocols which support the Web, and so it makes sense to reuse them in providing remote operations and those things connected with them. The third point is what makes web service requirements so different from a local RPC system. The fact that data is exchanged for business purposes and between different social entities means that accountability is required, rather than just reliable transmission.
<p>
The vendors of software see web services as way to repackage existing capability in a way which makes it interoperable with other systems.</p>
<p>The security requirements for web services are dictated by the trust environments, whether it is intranet or b2b or b2c, etc</p>
<p>For b2b one needs not just reliabilioty but accountability.</p>
<p>The architecture of Web Services is the scope of the W3C Web Service Architecture Working Group.</p>
<footer>-Tim Berners Lee<cite> Web Services metamorphosis into current world scenario</cite></footer></blockquote>
</section>
<br />
<section id="regress"> <h2> Regression Testing</h2>
<p>
 Specification-based regression testing of web services is an important
activity which verifies the quality of web services.</p>
<p> A major problem in web
services is that only provider has the source code and both user and broker only
have the XML based specification. So from the perspective of user and broker,
specification based regression testing of web services is needed. The existing
techniques are code based.</p>
<p> Due to the dynamic behavior of web services, web
services <span id="gen">undergo maintenance and evolution process rapidly.</span> Retesting of web
services is required in order to verify the impact of changes. 
</p>
<img src="images/img_7.jpg" alt="web services" class="webimg_3" />
</section>

<br />
 <section id="audio">
 <h3> Here is a clipping of a lecture recording for your reference</h3>
 <audio>

  <source src="images/audio.mp3" type="audio/mpeg" />
    
  Your browser does not support the audio tag.
</audio>

 </section>
 
 <aside id="emoji"> Interesting technicalities right?!&#128516; </aside>
 <br />
 <hr />
 
 
<br /><br />
<?php include_once "footer.inc"; ?>
	</article>
	</div>
 </div>  
</div>
</body>
</html>