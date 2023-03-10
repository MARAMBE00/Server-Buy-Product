<?php
session_start();
$pagename = "login"; 
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; 

echo "<title>" . $pagename . "</title>"; 

echo "<body>";

include ("headfile.html"); 

echo "<h4>" . $pagename . "</h4>"; 

echo "<form action='login_process.php' method='post'>";
echo "<table style='border: 0px' >";
echo "<tr><td style='border: 0px'>Email:</td>";
echo "<td style='border: 0px'><input type=text name=email size=35></td></tr>";
echo "<tr><td style='border: 0px'>Password:</td>";
echo "<td style='border: 0px'><input type=password name=password maxlength=10 size=35></td></tr>";
echo "<tr>";
echo "<td style='border: 0px'><input type=reset value='Clear Form' name='submitbtn' id='submitbtn'></td>";
echo "<td style='border: 0px'><input type=submit value='Log In' name='submitbtn' id='submitbtn'></td>";
echo "</tr>";
echo "</table>";
echo "</form>";

include "footfile.html";

echo "</body>";
?>