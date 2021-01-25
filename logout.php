<?php
/*
* Author: Ayesha Shaikh 103165863
* Target: login.php 
* Located: manage.php and queries.php
* Purpose: Secure log out option of users 
* Created: 20-10-2020
* Last-updated: 24-10-2020
* Credits: Lectures on Echo360, lab instructions, lecture tasks/folders, http://www.allphptricks.com/simple-user-registration-login-script-in-php-and-mysqli/- Javed Rehman
*/
?>

<?php

session_start();
if(session_destroy()) // Destroying All Sessions
{
header("Location: login.php"); // Redirecting To Home Page- the login page linked with the 'Quiz Supervisor' navigation tab
}

?>