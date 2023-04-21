<?php
session_start();
$pagename = "logout"; //Create and populate a variable called $pagename
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; //Call in stylesheet

echo "<title>" . $pagename . "</title>"; //display name of the page as window title

echo "<body>";

include ("headfile.html"); //include header layout file
include("detectlogin.php");

echo "<h4>" . $pagename . "</h4>"; //display name of the page on the web page

if(isset($_SESSION['userid'])){
        echo "<p>Thank you. ".$_SESSION['fname']." ".$_SESSION['sname']."";
         // unset session variables
        $_SESSION = array();
        // destroy the session
        session_destroy();
        // display log out confirmation message
        echo "<br>You are now logged out.</p>";
}else {
        // display error message if user is not logged in
        echo "Error: You are not logged in.";
}

include "footfile.html"; //include head layout

echo "</body>";
?>