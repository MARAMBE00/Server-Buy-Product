<?php

session_start();
include("db.php");

$pagename = "clear smart basket"; 
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; 
echo "<title>" . $pagename . "</title>"; 

echo "<body>";

include "headfile.html"; 

echo "<h4>" . $pagename . "</h4>";
unset($_SESSION['basket']);
echo "<p><b>Your basket has been cleared</b>";

include "footfile.html"; 

echo "</body>";
