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

		<article id="enhancements"><h2 id="welcome">Page 6</h2>
		<br /><br /> <br />
 
 <h2> The core enhancements for this particular assignment:-</h2><br />
		<ul id="mainen">
			<li><a href="login.php">Login security</a> is implemented on the query supervisor webpage of the website which can be found in the left navigation menu bar. Since this age consists of queries to access and retrive data from the quiz attempts database table, it needs to permit only those with secure and legitimate access to those records to maintain data integrity. Hence, this is an essential feature. It directs the 'quiz supervisor' link to a login webpage where it creates a 'user' table and stores all the accounts created with it through register link on the login page to permit on those details to login and access the page. First, a table is created if one doesn't already exist. Then from teh registration form the values are taken and inserted into that table (password is encrypted). Then the login page checks the new inserted values with the pre-exisitng ones in the table and grants access. One also has the logout option on the 'quiz supervisor' webpages. The page always redirects to the login page if incase tried to access directly via url to launch queries. </li>
			<li><a href="manage.php#sort">Sorting</a> was given as an option in the 'quiz supervisor' linked page so that when the user wants to request a query they may also select the table's field according to which they want the results table of that query to be displayed. The 'ORDER BY' clause is used, which is by default Ascending order in the MySQL database system.</li>
		</ul>
 <aside>The references which were very useful and knowledgable in executing these ideas were as follows:-
		<ol id="en">
			<li>The main concept, steps and task specific syntax was taken with reference from <a href="http://www.allphptricks.com/simple-user-registration-login-script-in-php-and-mysqli/">this website</a> </li>
			<li>The mysqli commands and functions was understood from <a href="https://www.w3schools.com/php/php_mysql_select_orderby.asp"> this website</a>and <a href="https://www.w3schools.com/php/php_ref_mysqli.asp"> this one</a>.</li>
			<li>Guidance and holistic knowledge acquired through <a href="https://www.php.net/manual/en/book.mysqli.php"> this book</a></li>
		</ol >
----------------------------------------
 </aside>
 <br />
 <hr />
 
 
 <img src="images/img_7.jpg" alt="webservices" class="webimg_4" />
 
 </article>
 
<br /><br />
<?php include_once "footer.inc"; ?>
	</div>
 
</div>
</body>
</html>